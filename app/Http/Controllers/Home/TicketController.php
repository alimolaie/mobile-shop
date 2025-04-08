<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Ticket;
use App\Traits\SendSmsTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    use SendSmsTrait;
    public function index(){
        return view('home.ticket.index');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'status' => 'required',
            'answer' => 'required',
        ]);
        Ticket::create([
            'title'=>$request->title,
            'status'=>$request->status,
            'answer'=>$request->answer,
            'body'=>$request->body,
            'type'=>3,
            'user_id'=>0,
        ]);
        return redirect()->back()->with([
            'success' => __('messages.request_back')
        ]);
    }
    public function closeChat(Request $request){
        Ticket::where('customer_id',\auth()->user()->id)->where(function ($query) use($request) {
            $query->where('parent_id' , $request->parent_id)
                ->orWhere('id', $request->parent_id);
        })->delete();
        return 'success';
    }

    public function sendTicket(Request $request){
        if(!auth()->user()){
            return redirect()->back()->with([
                'message' => __('messages.login_first')
            ]);
        }
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'type' => 'required',
        ]);

        $year = Carbon::now()->year;
        $folder = $_SERVER['DOCUMENT_ROOT'] . '/upload/image/' . $year;
        if (!file_exists($folder)){
            mkdir($folder , 0755 , true);
        }
        $file1 = '';
        $file = $request->image;
        if($file&&$file != 'undefined'){
            $type = $file->getClientOriginalExtension();
            $name = time().'.'.$type;
            $sizefile = $file->getsize()/1000;
            if( $sizefile > 1000){
                $size=round($sizefile/1000 ,2) . 'mb';
            }else{
                $size=round($sizefile) . 'kb';
            }
            if ($type == "jpg" or $type == "JPG" or $type == "png" or $type == "PNG" or $type == "webp" or $type == "jpeg" or $type == "svg" or $type == "webp" or $type == "tif" or $type == "gif" or $type == "jfif"){
                $url = "/upload/image/" . $year;
            }
            elseif ($type == "mp3"){
                $url = "/upload/music/" . $year;
            }
            elseif ($type == "mp4" or $type == "mkv"){
                $url = "/upload/movie/" . $year;
            }
            else{
                $url = "/upload/file/" . $year;
            }
            $path = $file->move($_SERVER['DOCUMENT_ROOT'] .$url , $name);
            $img = Gallery::create([
                'name' => $name,
                'size' => $size,
                'type' => $type,
                'user_id' => auth()->user()->id,
                'url' => $url . '/' . $name ,
                'path' => $path->getRealPath(),
            ]);
            $file1 = $img->url;
        }
        $ticket = Ticket::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'property'=>$request->property??0,
            'type'=>$request->type??0,
            'status'=>$request->status??0,
            'parent_id'=>$request->parent_id,
            'customer_id'=>auth()->user()->id,
            'user_id'=>auth()->user()->id,
            'file'=>$file1,
        ]);
        if($request->parent_id == 0){
            $number = Setting::where('key' , 'number')->pluck('value')->first();
            $messageTicket = Setting::where('key' , 'messageTicketManager')->pluck('value')->first();
            if($messageTicket){
                if($number){
                    $this->sendSms($number , [auth()->user()->name,$ticket->id],'',$messageTicket);
                }
            }
        }
        if($request->faq){
            return $ticket;
        }else{
            return redirect()->back()->with([
                'success' => __('messages.show_ticket1')
            ]);
        }
    }

    public function onlineTicket(Request $request){
        if(!auth()->user()){
            return '';
        }
        if($request->parent >= 1){
            return Ticket::where('customer_id',\auth()->user()->id)->where('status' , 1)->where(function ($query) use($request) {
                $query->where('parent_id' , $request->parent)
                    ->orWhere('id', $request->parent);
            })->get();
        }else{
            $pp = Ticket::where('customer_id',\auth()->user()->id)->where('status' , 1)->where('parent_id',0)->latest()->pluck('id')->first();
            return Ticket::where('customer_id',\auth()->user()->id)->where('status' , 1)->where(function ($query) use($pp) {
                $query->where('parent_id' , $pp)
                    ->orWhere('id', $pp);
            })->get();
        }
    }
    public function getChatTicket(Request $request){
        return Ticket::where('parent_id' , 0)->where('id' , $request->ticket)->with(["tickets" => function ($q) {
            $q->with('user');
        }])->with('user','myPay')->first();
    }
    public function sendChat(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $year = Carbon::now()->year;
        $folder = $_SERVER['DOCUMENT_ROOT'] . '/upload/image/' . $year;
        if (!file_exists($folder)){
            mkdir($folder , 0755 , true);
        }
        $file1 = '';
        $file = $request->image;
        if($file&&$file != 'undefined'){
            $type = $file->getClientOriginalExtension();
            $name = time().'.'.$type;
            $sizefile = $file->getsize()/1000;
            if( $sizefile > 1000){
                $size=round($sizefile/1000 ,2) . 'mb';
            }else{
                $size=round($sizefile) . 'kb';
            }
            if ($type == "jpg" or $type == "JPG" or $type == "png" or $type == "PNG" or $type == "webp" or $type == "jpeg" or $type == "svg" or $type == "webp" or $type == "tif" or $type == "gif" or $type == "jfif"){
                $url = "/upload/image/" . $year;
            }
            elseif ($type == "mp3"){
                $url = "/upload/music/" . $year;
            }
            elseif ($type == "mp4" or $type == "mkv"){
                $url = "/upload/movie/" . $year;
            }
            else{
                $url = "/upload/file/" . $year;
            }
            $path = $file->move($_SERVER['DOCUMENT_ROOT'] .$url , $name);
            $img = Gallery::create([
                'name' => $name,
                'size' => $size,
                'type' => $type,
                'user_id' => auth()->user()->id,
                'url' => $url . '/' . $name ,
                'path' => $path->getRealPath(),
            ]);
            $file1 = $img->url;
        }
        Ticket::create([
            'title' => $request->title,
            'body' => $request->body,
            'status' => 0,
            'type' => 0,
            'parent_id' => $request->parent ?? 0,
            'file' => $file1??null,
            'customer_id' => auth()->user()->id,
            'user_id' => auth()->user()->id,
        ]);
        if($request->parent == 0){
            $number = Setting::where('key' , 'number')->pluck('value')->first();
            $messageTicket = Setting::where('key' , 'messageTicket')->pluck('value')->first();
            if($messageTicket){
                if($number){
                    $this->sendSms($number , [auth()->user()->name],'',$messageTicket);
                }
            }
        }
        if($request->faq){
            return redirect()->back();
        }
        return 'ok';
    }
}
