@extends('admin.master')

@section('tab',1)
@section('content')
    <div class="allShowBrand">
        <div class="topBrandPanel">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a href="/admin/product">همه محصولات</a>
                <span>/</span>
                <a href="/admin/product/{{$posts->id}}/seo">بررسی سئو محصولات</a>
            </div>
        </div>
        <div class="showData">
            <div class="googleShow">
                <div class="googleTitle">پیشنمایش صفحه شما در گوگل :</div>
                <div class="preview">
                    <a target="_blank" href="/product/{{$posts->slug}}">{{url('/product/'.$posts->slug)}}</a>
                    <h3>{{$posts->titleSeo}}</h3>
                    <p>{{$posts->bodySeo}}</p>
                </div>
            </div>
            <div class="showDataItems">
                <div class="showDataItem">
                    <h3>عنوان سئو</h3>
                    @if(strlen($posts->titleSeo) >= 60)
                        <h4 class="error">عنوان سئو شما بیشتر از 60 حرف هست</h4>
                    @elseif(strlen($posts->titleSeo) <= 10)
                        <h4 class="warning">عنوان سئو شما کمتر از 10 حرف هست</h4>
                    @else
                        <h4 class="success">عنوان سئو شما کاملا درست هست.</h4>
                    @endif
                </div>
                <div class="showDataItem">
                    <h3>توضیحات سئو</h3>
                    @if(strlen($posts->bodySeo) >= 160)
                        <h4 class="error">توضیحات سئو شما بیشتر از 160 حرف هست</h4>
                    @elseif(strlen($posts->bodySeo) <= 30)
                        <h4 class="warning">توضیحات سئو شما کمتر از 30 حرف هست</h4>
                    @else
                        <h4 class="success">توضیحات سئو شما کاملا درست هست.</h4>
                    @endif
                </div>
                <div class="showDataItem">
                    <h3>کلمات کلیدی</h3>
                    @if($posts->keywordSeo == '')
                        <h4 class="warning">بهتر هست از کلمات کلیدی استفاده کنید</h4>
                    @elseif(strpos($posts->bodySeo, explode(',',$posts->keywordSeo)[0]) === false)
                        <h4 class="error">کلمه کلیدی شما در متن پیدا نشد</h4>
                    @else
                        <h4 class="success">کلمات کلیدی شما کاملا درست هست.</h4>
                    @endif
                </div>
                <div class="showDataItem">
                    <h3>تصویر محصول</h3>
                    @if($posts->image == '[]')
                        <h4 class="error">برای محصول خود تصویر قرار ندادید</h4>
                    @else
                        <h4 class="success">تصویر شما کاملا درست هست.</h4>
                    @endif
                </div>
                <div class="showDataItem">
                    <h3>Alt تصویر</h3>
                    @if($posts->imageAlt == '')
                        <h4 class="error">برای تصویر خود عنوانی قرار ندادید</h4>
                    @else
                        <h4 class="success">عنوان تصویر شما کاملا درست هست.</h4>
                    @endif
                </div>
                <div class="showDataItem">
                    <h3>توضیحات تکمیلی</h3>
                    @if(count(explode('<h3',$posts->body)) == 1 ||count(explode('<h4',$posts->body)) == 1||count(explode('<h5',$posts->body)) == 1)
                        <h4 class="error">
                            تگ های
                            @if(count(explode('<h3',$posts->body)) == 1)
                                h3
                            @endif
                            @if(count(explode('<h4',$posts->body)) == 1)
                                h4
                            @endif
                            @if(count(explode('<h5',$posts->body)) == 1)
                                h5
                            @endif
                            در توضیحات خود قرار ندادید
                        </h4>
                    @else
                        <h4 class="success">تمام تگ ها را در توضیحات تکمیلی خود قرار دادید </h4>
                    @endif
                </div>
                <div class="showDataItem">
                    <h3>پیوند یکتا (slug)</h3>
                    @if(strlen($posts->slug) >= 75)
                        <h4 class="error">پیوند یکتا شما بیشتر از 75 حرف هست</h4>
                    @elseif(strlen($posts->slug) <= 10)
                        <h4 class="warning">پیوند یکتا شما کمتر از 10 حرف هست و بهتر هست کمی طولانی تر باشه</h4>
                    @else
                        <h4 class="success">پیوند یکتا شما کاملا درست هست.</h4>
                    @endif
                </div>
                <div class="showDataItem">
                    <h3>ایندکس شدن در گوگل</h3>
                    @if($posts->robots == 'noindex')
                        <h4 class="error">تگ ربات حالت noindex هست و باعث میشود صفحه شما در گوگل نمایش داده نشود</h4>
                    @else
                        <h4 class="success">صفحه شما در گوگل نمایش داده میشود.</h4>
                    @endif
                </div>
                <div class="showDataItem">
                    <h3>تگ اسکیما</h3>
                    @if($posts->skima)
                        <h4 class="success">اسکیما به صورت دستی توسط خودتان قرار گرفت</h4>
                    @else
                        <h4 class="success">اسکیما به صورت اتومات برای شما قرار گرفت</h4>
                    @endif
                </div>
            </div>
            <form method="post" action="/admin/product/{{$posts->id}}/seo" class="links">
                @csrf
                <div class="googleShow">
                    <div class="googleTitle">لینک های داخلی در توضیحات :</div>
                    <ul>
                        @foreach($internalLinks as $item)
                            <li>
                                <select name="rel[]">
                                    <option value="follow" {{$item['rel'] == 'follow' || $item['rel'] == ''? 'selected':''}}>فالو</option>
                                    <option value="nofollow" {{$item['rel'] == 'nofollow' ? 'selected':''}}>نوفالو</option>
                                </select>
                                <p>{{$item['tag']}}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="googleShow">
                    <div class="googleTitle">لینک های خارجی در توضیحات :</div>
                    <ul>
                        @foreach($externalLinks as $item)
                            <li>
                                <select name="rel[]">
                                    <option value="follow" {{$item['rel'] == 'follow' || $item['rel'] == ''? 'selected':''}}>فالو</option>
                                    <option value="nofollow" {{$item['rel'] == 'nofollow' ? 'selected':''}}>نوفالو</option>
                                </select>
                                <p>{{$item['tag']}}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <button>تغییر لینک های داخلی و خارجی</button>
            </form>
        </div>
    </div>
@endsection()
