<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Document;
use App\Models\Gallery;
use App\Models\Genuine;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BecomeController extends Controller
{
    public function becomeSeller(){
        $sellerStatus = Setting::where('key' , 'sellerStatus')->pluck('value')->first();
        if(!$sellerStatus){
            return abort(404);
        }
        $doc = Document::where('user_id' , auth()->user()->id)->where('status' , 0)->first();
        $docSuccess = Document::where('user_id' , auth()->user()->id)->where('status' , 2)->first();
        $documents = Document::where('user_id' , auth()->user()->id)->latest()->get();
        if(auth()->user()->seller == 0){
            $category = Category::where('type' , 2)->select(['name','id'])->get();
            return view('home.become.become' , compact('category'));
        }elseif(auth()->user()->seller >= 1 && $docSuccess){
            return view('home.become.seller');
        }elseif(auth()->user()->seller >= 1 && !$doc){
            return view('home.become.document');
        }elseif(auth()->user()->seller >= 1 && $doc){
            return view('home.become.check',compact('documents'));
        }else{
            return view('home.become.become');
        }
    }
    public function level1(Request $request){
        if($request->seller == 2){
            $request->validate([
                'post' => 'required',
                'residenceAddress' => 'required',
                'landlinePhone' => 'required',
//                'category' => 'required',
                'companyName' => 'required',
                'registrationNumber' => 'required',
                'nationalID' => 'required',
                'signatureOwners' => 'required',
                'economicCode' => 'required',
                'shaba' => 'required',
                'name' => 'required',
                'seller' => 'required',
                'type' => 'required',
            ]);
            auth()->user()->update([
                'name' => $request->name,
                'seller' => $request->seller,
                'shaba' => $request->shaba,
                'landlinePhone'=>$request->landlinePhone,
            ]);
            $check = Auth::user()->company()->count();
            if ($check >= 1){
                Auth::user()->company()->update([
                    'name' => $request->companyName,
                    'type' => $request->type,
                    'registration' => $request->registrationNumber,
                    'NationalID' => $request->nationalID,
                    'economicCode' => $request->economicCode,
                    'signer' => $request->signatureOwners,
                    'residenceAddress' => $request->residenceAddress,
                ]);
            }
            else{
                Company::create([
                    'name' => $request->companyName,
                    'type' => $request->type,
                    'registration' => $request->registrationNumber,
                    'NationalID' => $request->nationalID,
                    'economicCode' => $request->economicCode,
                    'signer' => $request->signatureOwners,
                    'residenceAddress' => $request->residenceAddress,
                    'user_id' => auth()->user()->id,
                ]);
            }
        }
        else{
            $request->validate([
                'code' => 'required',
                'name' => 'required',
                'post' => 'required',
                'residenceAddress' => 'required|max:255',
                'landlinePhone' => 'required',
                'category' => 'required',
                'shaba' => 'required',
                'firstName' => 'required',
                'seller' => 'required',
                'gender' => 'required',
            ]);
            auth()->user()->update([
                'name' => $request->name,
                'shaba' => $request->shaba,
                'seller' => $request->seller,
                'landlinePhone'=>$request->landlinePhone,
            ]);
            $check = Auth::user()->genuine()->count();
            if ($check >= 1){
                Auth::user()->genuine()->first()->update([
                    'name'=>$request->firstName,
                    'post'=>$request->post,
                    'gender'=>$request->gender,
                    'code'=>$request->code,
                    'residenceAddress' => $request->residenceAddress,
                ]);
            }
            else{
                $userMeta = Genuine::create([
                    'name'=>$request->firstName,
                    'post'=>$request->post,
                    'landlinePhone'=>$request->landlinePhone,
                    'gender'=>$request->gender,
                    'code'=>$request->code,
                    'residenceAddress' => $request->residenceAddress,
                    'user_id' => auth()->user()->id
                ]);
            }
        }
        Auth::user()->category()->detach();
        Auth::user()->category()->sync($request->category);
        return redirect()->back()->with([
            'success' => 'مدارک خود را بارگذاری کنید.'
        ]);
    }
    public function sendDocument(Request $request){
        $request->validate([
            'frontImage' => 'required|max:100',
            'backImage' => 'required|max:100',
        ]);
        $year = Carbon::now()->year;
        $folder = public_path('upload/user/' . auth()->user()->id . '/');
        if (!file_exists($folder)){
            mkdir($folder , 0755 , true);
        }
        $file = $request->frontImage;
        $name = $file->getClientOriginalName();
        $type = $file->getClientOriginalExtension();
        $sizefile = $file->getsize()/1000;
        if( $sizefile > 1000){
            $size=round($sizefile/1000 ,2) . 'mb';
        }else{
            $size=round($sizefile) . 'kb';
        }
        if ($type == "jpg" or $type == "webp" or $type == "WEBP" or $type == "JPG" or $type == "png" or $type == "PNG" or $type == "jpeg" or $type == "svg" or $type == "tif" or $type == "gif" or $type == "jfif"){
            $url = "/upload/user/" . auth()->user()->id;
            $time = time();
            $path = $file->move($_SERVER['DOCUMENT_ROOT'] .$url , $time.$name);
            $frontImage = Gallery::create([
                'name' => $time,
                'size' => $size,
                'type' => $type,
                'user_id' => auth()->user()->id,
                'url' => $url . '/' . $time.$name ,
                'path' => $path->getRealPath(),
            ]);
        }else{
            return redirect()->back()->with([
                'success' => __('messages.no_doc')
            ]);
        }

        $file = $request->backImage;
        $name = $file->getClientOriginalName();
        $type = $file->getClientOriginalExtension();
        $sizefile = $file->getsize()/1000;
        if( $sizefile > 1000){
            $size=round($sizefile/1000 ,2) . 'mb';
        }else{
            $size=round($sizefile) . 'kb';
        }
        if ($type == "jpg" or $type == "webp" or $type == "WEBP" or $type == "JPG" or $type == "png" or $type == "PNG" or $type == "jpeg" or $type == "svg" or $type == "tif" or $type == "gif" or $type == "jfif"){
            $url = "/upload/user/" . auth()->user()->id;
            $time = time();
            $path = $file->move($_SERVER['DOCUMENT_ROOT'] .$url , $time.$name);
            $backImage = Gallery::create([
                'name' => $time.$name,
                'size' => $size,
                'type' => $type,
                'user_id' => auth()->user()->id,
                'url' => $url . '/' . time().$name ,
                'path' => $path->getRealPath(),
            ]);
        }else{
            return redirect()->back()->with([
                'success' => __('messages.no_doc')
            ]);
        }
        Document::create([
            'status' => 0,
            'frontNaturalId' => $frontImage['url'],
            'backNaturalId' => $backImage['url'],
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with([
            'success' => __('messages.wait_doc')
        ]);
    }
}
