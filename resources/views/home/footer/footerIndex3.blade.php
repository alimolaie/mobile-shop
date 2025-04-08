<footer class="allFooterIndex3">
    <div class="topFooter width">
        <div class="container">
            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                <h2>{{\App\Models\Setting::where('key' , 'footerTitleEn')->pluck('value')->first()}}</h2>
                <p>{{\App\Models\Setting::where('key' , 'aboutEn')->pluck('value')->first()}}</p>
            @elseif(\Illuminate\Support\Facades\App::getLocale() == 'tr')
                <h2>{{\App\Models\Setting::where('key' , 'footerTitleTr')->pluck('value')->first()}}</h2>
                <p>{{\App\Models\Setting::where('key' , 'aboutTr')->pluck('value')->first()}}</p>
            @elseif(\Illuminate\Support\Facades\App::getLocale() == 'ar')
                <h2>{{\App\Models\Setting::where('key' , 'footerTitleAr')->pluck('value')->first()}}</h2>
                <p>{{\App\Models\Setting::where('key' , 'aboutAr')->pluck('value')->first()}}</p>
            @else
                <h2>{{\App\Models\Setting::where('key' , 'footerTitle')->pluck('value')->first()}}</h2>
                <p>{{\App\Models\Setting::where('key' , 'about')->pluck('value')->first()}}</p>
            @endif
            <div class="data">
                <div class="item">
                    {{__('messages.email_us')}} : {{\App\Models\Setting::where('key' , 'email')->pluck('value')->first()}}
                </div>
                <div class="item">
                    {{__('messages.call_us')}} :
                    <span>{{\App\Models\Setting::where('key' , 'number')->pluck('value')->first()}}</span>
                </div>
            </div>
        </div>
        <div class="container">
            <span class="titleFooter">{{__('messages.fast1')}}</span>
            <ul>
                @foreach(\App\Models\Link::orderBy('number')->where('language' , request()->cookie('language')??'fa')->where('type',0)->get() as $item)
                    <li>
                        <a href="{{$item->slug}}">{{$item->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="container">
            <span class="titleFooter">{{__('messages.all_product')}}</span>
            <ul>
                @foreach(\App\Models\Product::where('status',1)->where('language' , request()->cookie('language')??'fa')->latest()->take(3)->get() as $item)
                    <li>
                        <a href="{{$item->type == 0 ? '/product/'.$item->slug:'/download/'.$item->slug}}">{{$item->title}}</a>
                    </li>
                @endforeach
            </ul>
            <a href="/faq" class="detail">{{__('messages.faq')}}</a>
        </div>
        <div class="container grids">
            <span class="titleFooter">{{__('messages.fast1')}}</span>
            <div class="containerRights">
                <ul>
                    @foreach(\App\Models\Page::latest()->where('language' , request()->cookie('language')??'fa')->get() as $item)
                        <li>
                            <a href="/page/{{$item->slug}}">{{$item->title}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="trustFooter">
                    <a>{!! \App\Models\Setting::where('key' , 'etemad')->pluck('value')->first() !!}</a>
                    <a>{!! \App\Models\Setting::where('key' , 'fanavari')->pluck('value')->first() !!}</a>
                </div>
            </div>
        </div>
        <div class="containerRes">
            <div class="trustFooter">
                <a>{!! \App\Models\Setting::where('key' , 'etemad')->pluck('value')->first() !!}</a>
                <a>{!! \App\Models\Setting::where('key' , 'fanavari')->pluck('value')->first() !!}</a>
            </div>
            <a href="/faq" class="detail">{{__('messages.faq')}}</a>
        </div>
    </div>
    <div class="botFooter">
        <div class="blockFooter width">
            <div class="social">
                <a href="{{\App\Models\Setting::where('key' , 'telegram')->pluck('value')->first()}}" title="تلگرام">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#telegram"></use>
                        </svg>
                    </i>
                </a>
                <a href="{{\App\Models\Setting::where('key' , 'facebook')->pluck('value')->first()}}" title="فیسبوک">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#facebook"></use>
                        </svg>
                    </i>
                </a>
                <a href="{{\App\Models\Setting::where('key' , 'instagram')->pluck('value')->first()}}" title="اینستاگرام">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#instagram"></use>
                        </svg>
                    </i>
                </a>
                <a href="{{\App\Models\Setting::where('key' , 'twitter')->pluck('value')->first()}}" title="توییتر">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#twitter"></use>
                        </svg>
                    </i>
                </a>
            </div>
            <div class="emails">{{\App\Models\Setting::where('key' , 'email')->pluck('value')->first()}}</div>
            <div class="copyWrite">{{__('messages.copy1' , ['name' => \App\Models\Setting::where('key' , 'name')->pluck('value')->first()])}}</div>
        </div>
    </div>
    <div class="fixedTab">
        <div class="tabs">
            <div class="rightTab">
                <div class="tab resAlign">
                    <a>
                        <i>
                            <svg class="icon">
                                <use xlink:href="#align"></use>
                            </svg>
                        </i>
                    </a>
                </div>
                <div class="tab">
                    @if(Request::is('profile*') || Request::is('login*'))
                        <a href="/profile" class="active">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#user"></use>
                                </svg>
                            </i>
                        </a>
                    @else
                        <a href="/profile">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#user"></use>
                                </svg>
                            </i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="tab homeTab">
                <a href="/">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#home2"></use>
                        </svg>
                    </i>
                </a>
            </div>
            <div class="leftTab">
                <div class="tab">
                    @if(Request::is('cart'))
                        <a href="/cart" class="active">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#cart"></use>
                                </svg>
                            </i>
                        </a>
                    @else
                        <a href="/cart">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#cart"></use>
                                </svg>
                            </i>
                        </a>
                    @endif
                </div>
                <div class="tab resSearch">
                    <a>
                        <i>
                            <svg class="icon">
                                <use xlink:href="#search"></use>
                            </svg>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
