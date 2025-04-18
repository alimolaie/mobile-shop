<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Story;
use App\Models\Widget;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class WidgetController extends Controller
{
    public function index(){
        $widgets = Widget::orderBy('number')->where('responsive' , 0)->select(['id','name','language','title','status'])->get();
        $type = 0;
        return view('admin.widget.index',compact('widgets','type'));
    }
    public function mobileIndex(){
        $widgets = Widget::orderBy('number')->where('responsive' , 1)->select(['id','name','language','title','status'])->get();
        $type = 1;
        return view('admin.widget.index',compact('widgets','type'));
    }
    public function change(Request $request){
        for ( $i = 0; $i < count($request->widget); $i++) {
            Widget::where('id' , $request->widget[$i])->where('responsive' , $request->type)->update([
                'number' => $i
            ]);
        }
        return 'success';
    }
    public function create(){
        $cats = Category::select(['id','name'])->get();
        $brands = Brand::select(['id','name'])->get();
        return view('admin.widget.create',compact('cats' , 'brands'));
    }
    public function edit(Widget $widget){
        $cats = Category::select(['id','name'])->get();
        $brands = Brand::select(['id','name'])->get();
        $stories = Story::get();
        $catId = [];
        $brandId = [];
        if($widget['brands'] != '[]'){
            $brand0 = str_replace('"', '', $widget['brands']);
            $brand1 = str_replace('[', '', $brand0);
            $brand2 = str_replace(']', '', $brand1);
            $brandId = explode(',' , $brand2);
        }
        if($widget['cats'] != '[]'){
            $cat0 = str_replace('"', '', $widget['cats']);
            $cat1 = str_replace('[', '', $cat0);
            $cat2 = str_replace(']', '', $cat1);
            $catId = explode(',' , $cat2);
        }
        return view('admin.widget.edit',compact('cats' , 'catId' , 'stories' , 'brandId' , 'brands','widget'));
    }
    public function store(Request $request){
        $widget = Widget::orderBy('number','DESC')->where('responsive' , $request->responsive)->pluck('number')->first();
        if($widget){
            $number = (int)$widget++;
        }else{
            $number = 0;
        }
        if($request->name == 'جشنواره'){
            if($request->number){
                $ss =strtr($request->number, array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
                $times = Verta::parse($ss)->toCarbon();
                $times2 = explode('T',$times);
                $height = implode(' ',$times2);
            }else{
                $height = 0;
            }
        }else{
            $height = $request->height;
        }
        Widget::create([
            'name'=> $request->name,
            'title'=> $request->title,
            'more'=> $request->more,
            'description'=> $request->description,
            'background'=> $request->background,
            'slug'=> $request->slug,
            'background2'=> $request->background2,
            'count'=> $request->count,
            'sort'=> $request->sort,
            'type'=> $request->type,
            'status'=> $request->status,
            'brands'=> $request->brands,
            'language'=> $request->language,
            'height'=> $request->height?$height:20,
            'responsive'=> $request->responsive,
            'move'=> $request->move?$request->move:0,
            'number'=> $number,
            'cats'=> $request->cats,
            'ads1'=> $request->ads1,
            'ads2'=> $request->ads2,
            'ads3'=> $request->ads3,
        ]);
        if($request->name =='استوری'){
            foreach (json_decode($request->positions) as $item) {
                $parent = Story::create([
                    'title' => $item->title,
                    'cover' => $item->cover,
                    'parent_id' => 0,
                ]);
                foreach ($item->rows as $val){
                    $parent = Story::create([
                        'cover' => $val->image,
                        'type' => $val->type,
                        'image' => $val->url,
                        'day' => $val->day,
                        'title' => $item->title,
                        'parent_id' => $parent->id,
                    ]);
                }
            }
        }
        return 'success';
    }
    public function update(Request $request , Widget $widget){
        if($request->name == 'جشنواره'){
            if($request->number[0] != 2){
                $ss =strtr($request->number, array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
                $times = Verta::parse($ss)->toCarbon();
                $times2 = explode('T',$times);
                $height = implode(' ',$times2);
            }else{
                $height = $request->number;
            }
        }else{
            $height = $request->height;
        }
        $widget->update([
            'name'=> $request->name,
            'title'=> $request->title,
            'more'=> $request->more,
            'description'=> $request->description,
            'background'=> $request->background,
            'slug'=> $request->slug,
            'background2'=> $request->background2,
            'count'=> $request->count,
            'sort'=> $request->sort,
            'type'=> $request->type,
            'status'=> $request->status,
            'brands'=> $request->brands,
            'height'=> $request->height?$height:20,
            'responsive'=> $request->responsive,
            'move'=> $request->move,
            'language'=> $request->language,
            'cats'=> $request->cats,
            'ads1'=> $request->ads1,
            'ads2'=> $request->ads2,
            'ads3'=> $request->ads3,
        ]);
        if($request->name =='استوری'){
            DB::table('stories')->delete();
            foreach (json_decode($request->positions) as $item) {
                $parent = Story::create([
                    'title' => $item->title,
                    'cover' => $item->cover,
                    'parent_id' => 0,
                ]);
                foreach ($item->rows as $val){
                    Story::create([
                        'cover' => $val->image,
                        'type' => $val->type,
                        'image' => $val->url,
                        'day' => $val->day,
                        'title' => $item->title,
                        'parent_id' => $parent->id,
                    ]);
                }
            }
        }
        return 'success';
    }
    public function delete(Widget $widget){
        $widget->delete();
        return redirect()->back()->with([
            'message' => 'ویجت با موفقیت حذف شد'
        ]);
    }
}
