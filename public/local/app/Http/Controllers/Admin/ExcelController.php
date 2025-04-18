<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CommentExport;
use App\Exports\EventExport;
use App\Exports\NewsExport;
use App\Exports\PayExport;
use App\Exports\PayMetaExport;
use App\Exports\PostExport;
use App\Exports\TicketExport;
use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Imports\BlogImport;
use App\Imports\ProductImport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index(){
        return view('admin.excel.index');
    }
    public function import(){
        return view('admin.excel.import');
    }
    public function import_user(Request $request){
        $file = $request->image;
        $import = new UserImport();
        Excel::import($import, $file);
        return 'success';
    }
    public function import_blog(Request $request){
        $file = $request->image;
        $import = new BlogImport();
        Excel::import($import, $file);
        return 'success';
    }
    public function import_product(Request $request){
        $file = $request->image;
        $import = new ProductImport();
        Excel::import($import, $file);
        return 'success';
    }
    public function getExcel($data , Request $request){
        if($data == 'allUser'){
            return Excel::download(new UserExport('allUser',''), 'users.xlsx');
        }
        if($data == 'todayUser'){
            return Excel::download(new UserExport('todayUser' , ''), 'todayUsers.xlsx');
        }
        if($data == 'seller'){
            return Excel::download(new UserExport('seller' , $request->seller), 'seller.xlsx');
        }
        if($data == 'pay'){
            return Excel::download(new PayExport('pay' , $request->pay), 'pay.xlsx');
        }
        if($data == 'allPay'){
            return Excel::download(new PayExport('allPay',''), 'pays.xlsx');
        }
        if($data == 'todayPay'){
            return Excel::download(new PayExport('todayPay',''), 'todayPays.xlsx');
        }
        if($data == 'allPayMeta'){
            return Excel::download(new PayMetaExport('allPayMeta',''), 'payMetas.xlsx');
        }
        if($data == 'todayPayMeta'){
            return Excel::download(new PayMetaExport('todayPayMeta',''), 'todayPayMetas.xlsx');
        }
        if($data == 'allProduct'){
            return Excel::download(new PostExport('allProduct',''), 'products.xlsx');
        }
        if($data == 'todayProduct'){
            return Excel::download(new PostExport('todayProduct',''), 'todayProducts.xlsx');
        }
        if($data == 'allComment'){
            return Excel::download(new CommentExport('allComment',''), 'comments.xlsx');
        }
        if($data == 'todayComment'){
            return Excel::download(new CommentExport('todayComment',''), 'todayComment.xlsx');
        }
        if($data == 'allTicket'){
            return Excel::download(new TicketExport('allTicket',''), 'tickets.xlsx');
        }
        if($data == 'todayTicket'){
            return Excel::download(new TicketExport('todayTicket',''), 'todayTicket.xlsx');
        }
        if($data == 'allNews'){
            return Excel::download(new NewsExport('allNews',''), 'news.xlsx');
        }
        if($data == 'todayNews'){
            return Excel::download(new NewsExport('todayNews',''), 'todayNews.xlsx');
        }
        if($data == 'allEvent'){
            return Excel::download(new EventExport('allEvent',''), 'events.xlsx');
        }
        if($data == 'todayEvent'){
            return Excel::download(new EventExport('todayEvent',''), 'todayEvents.xlsx');
        }
    }
}
