<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index(Request $request){
        $status = $request->status;
        $currentUrl = url()->current().'?status='.$request->status;
        if($status != 2 && $status != '' || $status === 0){
            $comments = Comment::where('status' , $status)->with('user','product')->latest()->paginate(30)->setPath($currentUrl);
        }else{
            $comments = Comment::with('user','product')->latest()->paginate(30)->setPath($currentUrl);
        }
        return view('admin.comment.index' , compact('comments'));
    }
    public function create(Request $request){
        $products = Product::where('variety',0)->latest()->take(300)->get(['title','id']);
        return view('admin.comment.create',compact('products'));
    }
    public function store(Request $request){
        $i = 0;
        foreach ($request->title as $item){
            if ($request->title[$i]){
                $product_id = $request->product_id[$i];
                if($product_id == 0){
                    $product_id = Product::inRandomOrder()->value('id');
                }
                Comment::create([
                    'title' => $request->title[$i],
                    'body' => $request->body[$i],
                    'rate' => $request->rate[$i],
                    'user_name' => $request->user_name[$i],
                    'product_id' => $product_id,
                    'user_id' => 0,
                    'status' => 1,
                ]);
            }
            ++$i;
        }
        return redirect('/admin/comment')->with([
            'message' => 'دیدگاه ها با موفقیت اضافه شد'
        ]);
    }
    public function edit(Comment $comment){
        return view('admin.comment.edit' , compact('comment'));
    }
    public function update(Comment $comment , Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $comment->update([
            'title' => $request->title,
            'body' => $request->body,
            'bad' => $request->bad,
            'good' => $request->good,
            'status' => $request->status,
        ]);
        return 'success';
    }
    public function delete(Comment $comment){
        $comment->delete();
        return redirect()->back()->with([
            'message' => 'دیدگاه با موفقیت حذف شد'
        ]);
    }
}
