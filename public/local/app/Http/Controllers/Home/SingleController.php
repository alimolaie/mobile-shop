<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Cart;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\FieldData;
use App\Models\Like;
use App\Models\LotteryCode;
use App\Models\News;
use App\Models\Pack;
use App\Models\PayMeta;
use App\Models\PriceChange;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Video;
use App\Traits\SeoHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class SingleController extends Controller
{
    use SeoHelper;
    public function single(Product $product){
        $title = Setting::where('key' , 'title')->pluck('value')->first();
        $singleDesign = Setting::where('key' , 'singleDesign')->pluck('value')->first();
        $this->seoSingleSeo( $product->titleSeo . "$title - " , $product->bodySeo , 'store' , 'product/'."$product->slug" , json_decode($product->image)[0] , $product->keywordSeo );

        $cacheTime = Setting::where('key' , 'cacheTime')->pluck('value')->first();
        $cacheStatus = Setting::where('key' , 'cacheStatus')->pluck('value')->first();
        if($cacheStatus) {
            $post = Cache::remember('product_' . $product->id, $cacheTime, function () use ($product) {
                return $post = Product::withCount([
                    'comments' => fn($q) => $q->where('status', 1),
                    'rates' => fn($q) => $q->selectRaw('round(avg(rate), 1)')
                ])->with([
                    'category', 'brand', 'time', 'guarantee', 'tag',
                    'product' => fn($q) => $q->where('status', 1)->with('user', 'guarantee'),
                    'collection.product' => fn($q) => $q->where('id', '!=', $product->id),
                    'lottery' => fn($q) => $q->where('parent_id', 0)->with('winner')
                ])->withCount('like')->find($product->id);
            });
        }else{
            $post = Product::withCount([
                'comments' => fn($q) => $q->where('status', 1),
                'rates' => fn($q) => $q->selectRaw('round(avg(rate), 1)')
            ])->with([
                'category', 'brand', 'time', 'guarantee', 'tag',
                'product' => fn($q) => $q->where('status', 1)->with('user', 'guarantee'),
                'collection.product' => fn($q) => $q->where('id', '!=', $product->id),
                'lottery' => fn($q) => $q->where('parent_id', 0)->with('winner')
            ])->withCount('like')->find($product->id);
        }

        if ($post->lotteryStatus == 1) {
            $allLottery = $post->numLottery2 - $post->numLottery1 + 1;
            $lastLottery1 = LotteryCode::where('product_id', $post->id)
                ->where('active', 0)
                ->latest('round')
                ->first();

            $lastLottery = $lastLottery1 ? $lastLottery1->code : 0;
            $lastLottery = $lastLottery == $allLottery ? 0 : $lastLottery;
        } else {
            $allLottery = 0;
            $lastLottery = 0;
        }
        $related = Product::orderByRaw('count > 0 DESC')->where('id', '!=', $product->id)
            ->where('status', 1)
            ->where('variety', 0)
            ->whereHas('category', function ($q) use ($product) {
                $q->whereIn('name', $product->category()->pluck('name'));
            })
            ->take(10)
            ->get();

        $finalPrices = $product->price;
        $like = $bookmark = $levelUser = null;
        $paid = false;
        $cart = '';
        if (auth()->check()) {
            $like = Like::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
            $bookmark = Bookmark::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
            $levelUser = auth()->user()->roles()->pluck('name')->toArray();
            if ($post->levels && $post['levels'] != '[]') {
                foreach (json_decode($post['levels']) as $item) {
                    if (in_array($item->name, $levelUser)) {
                        $finalPrices = $item->price;
                        break;
                    }
                }
            }
            $cart = Cart::where('product_id',$product->id)->where('number',0)->where('user_id',auth()->id())->first();
            $paid1 = PayMeta::where('status' , 100)->where('user_id' , auth()->user()->id)->where('product_id' , $post->id)->first();
            if ($paid1){
                $paid = true;
            }
        }else{
            $myCart = request()->cookie('myCart');
            $c = collect($myCart?json_decode($myCart):'[]');
            $cart = $c->where('id', '=' , $product->id)->where('number' , 0)->first();
        }

        $pays1 = PayMeta::where('product_id' , $post->id)->sum('count');
        $comments = Comment::where('product_id' , $product->id)->where('status',1)->with('user')->latest()->get();
        $priceChange = PriceChange::latest()->where('product_id' , $product->id)->take(5)->get();
        $fields = FieldData::where('model_id' , $post->id)->whereHas('field', function($q){
            $q->where('status' , 1)->where('show_status', 1);
        })->get();

        if($product->type){
            $viewName = 'home.single.download';
        }else{
            $viewName = 'home.single.product';
            if ($singleDesign == 1) {
                $viewName = 'home.single.product2';
            } elseif ($singleDesign == 2) {
                $viewName = 'home.single.product3';
            } elseif ($singleDesign == 3) {
                $viewName = 'home.single.product4';
            }
        }
        return view($viewName, compact('post', 'levelUser','paid','cart', 'finalPrices', 'pays1', 'fields', 'priceChange', 'allLottery', 'lastLottery', 'bookmark', 'like', 'related', 'comments'));
    }

    public function pack(Collection $collection){
        $title = Setting::where('key' , 'title')->pluck('value')->first();
        $this->seoSingleSeo( $collection->titleSeo . "$title - " , $collection->bodySeo , 'store' , 'pack/'."$collection->slug" , $collection->image , $collection->keywordSeo );
        $packs = Collection::where('id' , $collection->id)->with('product')->first();
        return view('home.single.pack' , compact('packs'));
    }

    public function blog(News $news){
        $title = Setting::where('key' , 'title')->pluck('value')->first();
        $this->seoSingleSeo( $news->titleSeo . "$title - " , $news->bodySeo , 'store' , 'blog/'."$news->slug" , $news->image , $news->keywordSeo );

        $related =  News::whereHas('category', function ($q) use ($news){
            return $q->whereIn('name', $news->category()->pluck('name'));
        })->where('id' , '!=' , $news->id)->where('status' , 1)->take(6)->get();
        $suggest = News::where('suggest',1)->inRandomOrder()->where('status',1)->latest()->get();
        $post = News::where('id',$news->id)->with('category','tag')->first();
        $fields = FieldData::where('model_id' , $post->id)->whereHas('field', function($q){
            $q->where('status' , 2)->where('show_status', 1);
        })->get();
        return view('home.single.blog' , compact('related','fields','suggest','post'));
    }
    public function downloadFile(Product $product){
        $access = PayMeta::where('user_id',auth()->user()->id)->where('status' , 100)->where('product_id',$product->id)->first();
        if($access){
            $video = Video::where('videoable_id',$product->id)->get();
            if (Storage::disk('download')->exists($video[request()->id]->url)) {
                return Storage::disk('download')->download($video[request()->id]->url);
            }else{
                $fileUrl = $video[request()->id]->url;
                return redirect($fileUrl);
            }
        }else{
            return abort(404);
        }
    }
}
