<header class="allHeaderIndex">
    @if($adHeaderStatus == 1)
    <a class="topFixed" href="{{$linkHeader}}" style="background-image:url({{$imageHeader}});height: {{$heightHeader}}px"></a>
    @endif
    <div class="headerFix">
        <div class="headerTop">
            <div class="block width">
                <a href="/" title="{{$title}}" name="{{$name}}" class="pic">
                    <img class="lazyload" src="/img/404Image.png" data-src="{{$logo}}" alt="{{$title}}">
                </a>
                <form action="/search" method="GET">
                    <label for="searching">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#search"></use>
                            </svg>
                        </i>
                        <input type="search" id="searching" name="search" placeholder="{{__('messages.search_product')}}">
                        <select name="categorySearch">
                            <option value="0" selected>{{__('messages.all_cat')}}</option>
                            @foreach($catTop as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </label>
                    <i style="display: none" class="searchLoad">
                        <svg class="loading">
                            <use xlink:href="#loading"></use>
                        </svg>
                    </i>
                </form>
                <div class="left">
                    <div class="cityChoice">
                        <i>
                            <svg class="loading">
                                <use xlink:href="#location"></use>
                            </svg>
                        </i>
                        <div class="leftCity">
                            <div class="title1">{{__('messages.select_loc')}}</div>
                            <div class="title2">{{__('messages.filter_city')}}</div>
                        </div>
                    </div>
                    @if(\App\Models\Setting::where('key' , 'darkStatus')->pluck('value')->first() == 1)
                        <div class="themeButton1">
                            <button class="theme-toggle  js-theme-toggle"
                                    aria-label="auto"
                                    aria-live="polite">
                                <svg>
                                    <use xlink:href="#sun"></use>
                                </svg>
                            </button>
                        </div>
                    @endif
                    @if(auth()->user())
                        <div class="user">
                            <div class="pic" id="userPic" aria-haspopup="true">
                                @if(auth()->user()->profile)
                                    <img src="{{auth()->user()->profile}}" alt="{{auth()->user()->name}}">
                                @else
                                    <img src="/img/user.png" alt="{{auth()->user()->name}}">
                                @endif
                            </div>
                            <ul id="showUser">
                                <li>
                                    <div class="picUser">
                                        <img src="/img/user.png" alt="user">
                                    </div>
                                    <div class="infoUser">
                                        <span>{{auth()->user()->name}}</span>
                                    </div>
                                </li>
                                <li>
                                    <a href="/profile">
                                        {{__('messages.panel_user')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="/profile/bookmark">
                                        {{__('messages.bookmark_user')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="/profile/like">
                                        {{__('messages.like_user')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="/profile/pay">
                                        {{__('messages.order_user')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="/logout">
                                        {{__('messages.exit_user')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="/login" class="login" name="{{__('messages.login_user')}}" title="{{__('messages.login_user')}}">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#user"></use>
                                </svg>
                            </i>
                            {{__('messages.login_user')}}
                        </a>
                    @endif
                    <div class="headerCart">
                        <div class="headerCartItems">
                            <div class="cartShowBtn">
                                <i>
                                    <svg class="icon">
                                        <use xlink:href="#cart"></use>
                                    </svg>
                                </i>
                                <span>{{__('messages.header_cart')}}</span>
                                <div class="cartCount">0</div>
                            </div>
                            <div class="showCart">
                                <ul id="showCartLi"></ul>
                                <div class="showCartEmpty">
                                    <i>
                                        <svg class="icon">
                                            <use xlink:href="#cart"></use>
                                        </svg>
                                    </i>
                                    <div class="title1">{{__('messages.empty_cart')}}</div>
                                </div>
                                <div class="showCartBot">
                                    <a href="/cart">{{__('messages.show_cart')}}</a>
                                    <a href="/checkout">{{__('messages.checkout_cart')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="/search" method="GET" class="searchData" style="display:none">
                <label for="search1">
                    <input type="text" id="search1" name="search" placeholder="{{__('messages.search_product')}}">
                </label>
                <button>
                    <svg class="icon">
                        <use xlink:href="#search"></use>
                    </svg>
                </button>
                <i id="btnSearchClose">
                    <svg class="icon">
                        <use xlink:href="#cancel"></use>
                    </svg>
                </i>
            </form>
            <div class="categoryHeaderResponsive">
                <div class="title">
                    <span>{{__('messages.header_menu')}}</span>
                    <i id="btnShowMenu">
                        <svg class="icon">
                            <use xlink:href="#cancel"></use>
                        </svg>
                    </i>
                </div>
                <ul class="allCats">
                    <li>
                        <div class="allCatsTitle">
                            <a href="/login" name="{{__('messages.login_user')}}" title="{{__('messages.login_user')}}">{{__('messages.login_user')}}</a>
                        </div>
                    </li>
                    <li>
                        <div class="allCatsTitle">
                            <a href="/order-tracking" name="{{__('messages.header_track')}}" title="{{__('messages.header_track')}}">
                                {{__('messages.header_track')}}
                            </a>
                        </div>
                    </li>
                    @foreach($catHeader as $lists)
                        <li>
                            <div class="allCatsTitle">
                                <a href="/category/{{$lists->slug}}" name="{{$lists->name}}" title="{{$lists->name}}">{{$lists->name}}</a>
                                <i>
                                    <svg class="icon">
                                        <use xlink:href="#down"></use>
                                    </svg>
                                </i>
                            </div>
                            <ul class="allCatsList">
                                @foreach($lists->cats as $list)
                                    <li>
                                        <div class="allCatsTitle">
                                            <a href="/category/{{$list->slug}}" name="{{$list->name}}" title="{{$list->name}}">{{$list->name}}</a>
                                        </div>
                                        <ul>
                                            @foreach($list->cats as $item)
                                                <li>
                                                    <div class="allCatsTitle">
                                                        <a href="/category/{{$item->slug}}" name="{{$item->name}}" title="{{$item->name}}">{{$item->name}}</a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    @if(\App\Models\Link::where('parent_id',0)->where('type',0)->where('language', request()->cookie('language') ?? 'fa')->whereHas('children')->count() >= 1)
                        @foreach(\App\Models\Link::where('parent_id',0)->where('type',0)->where('language', request()->cookie('language') ?? 'fa')->whereHas('children')->get() as $lists1)
                            <li>
                                <div class="allCatsTitle">
                                    <a href="{{$lists1->slug}}" name="{{$lists1->name}}" title="{{$lists1->name}}">{{$lists1->name}}</a>
                                    <i>
                                        <svg class="icon">
                                            <use xlink:href="#down"></use>
                                        </svg>
                                    </i>
                                </div>
                                <ul class="allCatsList">
                                    @foreach(\App\Models\Link::where('parent_id',$lists1->id)->get() as $list)
                                        <li>
                                            <div class="allCatsTitle">
                                                <a href="{{$list->slug}}" name="{{$list->name}}" title="{{$list->name}}">{{$list->name}}</a>
                                            </div>
                                            <ul>
                                                @foreach(\App\Models\Link::where('parent_id',$list->id)->get() as $item)
                                                    <li>
                                                        <div class="allCatsTitle">
                                                            <a href="{{$item->slug}}" name="{{$item->name}}" title="{{$item->name}}">{{$item->name}}</a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    @endif
                    @foreach(\App\Models\Link::where('parent_id',0)->where('type',0)->where('language', request()->cookie('language') ?? 'fa')->doesntHave('children')->get() as $lists)
                        <li>
                            <div class="allCatsTitle">
                                <a href="{{$lists->slug}}" name="{{$lists->name}}" title="{{$lists->name}}">
                                    {{$lists->name}}
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if(\Illuminate\Support\Facades\App::getLocale() == 'fa')
                <div class="allFilterCity">
                    <div class="filterCity">
                        <div class="titleAddress">
                            <span>{{__('messages.filter_city')}}</span>
                            <i id="btnCloseAddress">
                                <svg class="icon">
                                    <use xlink:href="#cancel"></use>
                                </svg>
                            </i>
                        </div>
                        <div class="form">
                            <div class="item">
                                <label for="state">استان</label>
                                <select id="state" name="state">
                                    <option value="">همه استان ها</option>
                                    <option value="تهران">تهران</option>
                                    <option value="خراسان رضوی">خراسان رضوی</option>
                                    <option value="اصفهان">اصفهان</option>
                                    <option value="فارس">فارس</option>
                                    <option value="خوزستان">خوزستان</option>
                                    <option value="آذربایجان شرقی">آذربایجان شرقی</option>
                                    <option value="مازندران">مازندران</option>
                                    <option value="آذربایجان غربی">آذربایجان غربی</option>
                                    <option value="کرمان">کرمان</option>
                                    <option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
                                    <option value="البرز">البرز</option>
                                    <option value="گیلان">گیلان</option>
                                    <option value="کرمانشاه">کرمانشاه</option>
                                    <option value="گلستان">گلستان</option>
                                    <option value="هرمزگان">هرمزگان</option>
                                    <option value="لرستان">لرستان</option>
                                    <option value="همدان">همدان</option>
                                    <option value="کردستان">کردستان</option>
                                    <option value="مرکزی">مرکزی</option>
                                    <option value="قم">قم</option>
                                    <option value="قزوین">قزوین</option>
                                    <option value="اردبیل">اردبیل</option>
                                    <option value="بوشهر">بوشهر</option>
                                    <option value="یزد">یزد</option>
                                    <option value="زنجان">زنجان</option>
                                    <option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
                                    <option value="خراسان شمالی">خراسان شمالی</option>
                                    <option value="خراسان جنوبی">خراسان جنوبی</option>
                                    <option value="کهگیلویه و بویراحمد">کهگیلویه و بویراحمد</option>
                                    <option value="سمنان">سمنان</option>
                                    <option value="ایلام">ایلام</option>
                                </select>
                            </div>
                            <div class="item" id="cityContainer">
                                <label for="city">شهر</label>
                                <select name="city" id="city" class="city1">
                                    <option value="">همه شهر ها</option>
                                    <option value="شاهدشهر">شاهدشهر</option>
                                    <option value="پیشوا">پیشوا</option>
                                    <option value="جوادآباد">جوادآباد</option>
                                    <option value="ارجمند">ارجمند</option>
                                    <option value="ری">ری</option>
                                    <option value="نصیرشهر">نصیرشهر</option>
                                    <option value="رودهن">رودهن</option>
                                    <option value="اندیشه">اندیشه</option>
                                    <option value="نسیم شهر">نسیم شهر</option>
                                    <option value="صباشهر">صباشهر</option>
                                    <option value="ملارد">ملارد</option>
                                    <option value="شمشک">شمشک</option>
                                    <option value="پاکدشت">پاکدشت</option>
                                    <option value="باقرشهر">باقرشهر</option>
                                    <option value="احمد آباد مستوفی">احمد آباد مستوفی</option>
                                    <option value="کیلان">کیلان</option>
                                    <option value="قرچک">قرچک</option>
                                    <option value="فردوسیه">فردوسیه</option>
                                    <option value="گلستان">گلستان</option>
                                    <option value="ورامین">ورامین</option>
                                    <option value="فیروزکوه">فیروزکوه</option>
                                    <option value="فشم">فشم</option>
                                    <option value="پرند">پرند</option>
                                    <option value="آبعلی">آبعلی</option>
                                    <option value="چهاردانگه">چهاردانگه</option>
                                    <option value="تهران">تهران</option>
                                    <option value="بومهن">بومهن</option>
                                    <option value="وحیدیه">وحیدیه</option>
                                    <option value="صفادشت">صفادشت</option>
                                    <option value="لواسان">لواسان</option>
                                    <option value="فرون اباد">فرون اباد</option>
                                    <option value="کهریزک">کهریزک</option>
                                    <option value="رباطکریم">رباطکریم</option>
                                    <option value="آبسرد">آبسرد</option>
                                    <option value="باغستان">باغستان</option>
                                    <option value="صالحیه">صالحیه</option>
                                    <option value="شهریار">شهریار</option>
                                    <option value="قدس">قدس</option>
                                    <option value="تجریش">تجریش</option>
                                    <option value="	شریف آباد">	شریف آباد</option>
                                    <option value="حسن آباد">حسن آباد</option>
                                    <option value="اسلامشهر">اسلامشهر</option>
                                    <option value="دماوند">دماوند</option>
                                    <option value="پردیس">پردیس</option>
                                </select>
                                <select name="city" id="city" class="city2">
                                    <option value="">همه شهر ها</option>
                                    <option value="نیل شهر">نیل شهر</option>
                                    <option value="بار">بار</option>
                                    <option value="جنگل">جنگل</option>
                                    <option value="درود">درود</option>
                                    <option value="رباط سنگ">رباط سنگ</option>
                                    <option value="سلطان آباد">سلطان آباد</option>
                                    <option value="فریمان">فریمان</option>
                                    <option value="گناباد">گناباد</option>
                                    <option value="کاریز">کاریز</option>
                                    <option value="همت آباد">همت آباد</option>
                                    <option value="سلامی">سلامی</option>
                                    <option value="باجگیران">باجگیران</option>
                                    <option value="بجستان">بجستان</option>
                                    <option value="چناران">چناران</option>
                                    <option value="درگز">درگز</option>
                                    <option value="کلات">کلات</option>
                                    <option value="چکنه">چکنه</option>
                                    <option value="نصرآباد">نصرآباد</option>
                                    <option value="بردسکن">بردسکن</option>
                                    <option value="مشهد">مشهد</option>
                                    <option value="کدکن">کدکن</option>
                                    <option value="نقاب">نقاب</option>
                                    <option value="قلندرآباد">قلندرآباد</option>
                                    <option value="کاشمر">کاشمر</option>
                                    <option value="شاندیز">شاندیز</option>
                                    <option value="نشتیفان">نشتیفان</option>
                                    <option value="ششتمد">ششتمد</option>
                                    <option value="شادمهر">شادمهر</option>
                                    <option value="عشق آباد">عشق آباد</option>
                                    <option value="چاپشلو">چاپشلو</option>
                                    <option value="رشتخوار">رشتخوار</option>
                                    <option value="قدمگاه">قدمگاه</option>
                                    <option value="صالح آباد">صالح آباد</option>
                                    <option value="داورزن">داورزن</option>
                                    <option value="فرهادگرد">فرهادگرد</option>
                                    <option value="کاخک">کاخک</option>
                                    <option value="مشهدریزه">مشهدریزه</option>
                                    <option value="جغتای">جغتای</option>
                                    <option value="مزدآوند">مزدآوند</option>
                                    <option value="قوچان">قوچان</option>
                                    <option value="یونسی">یونسی</option>
                                    <option value="سنگان">سنگان</option>
                                    <option value="نوخندان">نوخندان</option>
                                    <option value="کندر">کندر</option>
                                    <option value="نیشابور">نیشابور</option>
                                    <option value="احمدابادصولت">احمدابادصولت</option>
                                    <option value="شهراباد">شهراباد</option>
                                    <option value="رضویه">رضویه</option>
                                    <option value="تربت حیدریه">تربت حیدریه</option>
                                    <option value="باخرز">باخرز</option>
                                    <option value="سفیدسنگ">سفیدسنگ</option>
                                    <option value="بیدخت">بیدخت</option>
                                    <option value="تایباد">تایباد</option>
                                    <option value="فیروزه">فیروزه</option>
                                    <option value="قاسم آباد">قاسم آباد</option>
                                    <option value="سبزوار">سبزوار</option>
                                    <option value="فیض آباد">فیض آباد</option>
                                    <option value="گلمکان">گلمکان</option>
                                    <option value="لطف آباد">لطف آباد</option>
                                    <option value="شهرزو">شهرزو</option>
                                    <option value="خرو">خرو</option>
                                    <option value="تربت جام">تربت جام</option>
                                    <option value="انابد">انابد</option>
                                    <option value="ملک آباد">ملک آباد</option>
                                    <option value="بایک">بایک</option>
                                    <option value="دولت آباد">دولت آباد</option>
                                    <option value="سرخس">سرخس</option>
                                    <option value="طرقبه">طرقبه</option>
                                    <option value="ریوش">ریوش</option>
                                    <option value="خواف">خواف</option>
                                    <option value="روداب">روداب</option>
                                    <option value="خلیل آباد">خلیل آباد</option>
                                </select>
                                <select name="city" id="city" class="city3">
                                    <option value="">همه شهر ها</option>
                                    <option value="گزبرخوار">گزبرخوار</option>
                                    <option value="زیار">زیار</option>
                                    <option value="زرین شهر">زرین شهر</option>
                                    <option value="گلشن">گلشن</option>
                                    <option value="پیربکران">پیربکران</option>
                                    <option value="خالدآباد">خالدآباد</option>
                                    <option value="سجزی">سجزی</option>
                                    <option value="گوگد">گوگد</option>
                                    <option value="تیران">تیران</option>
                                    <option value="ونک">ونک</option>
                                    <option value="دهق">دهق</option>
                                    <option value="زواره">زواره</option>
                                    <option value="ابوزیدآباد">ابوزیدآباد</option>
                                    <option value="کاشان">کاشان</option>
                                    <option value="اصغرآباد">اصغرآباد</option>
                                    <option value="بافران">بافران</option>
                                    <option value="شهرضا">شهرضا</option>
                                    <option value="خور">خور</option>
                                    <option value="مجلسی">مجلسی</option>
                                    <option value="هرند">هرند</option>
                                    <option value="فولادشهر">فولادشهر</option>
                                    <option value="کمشچه">کمشچه</option>
                                    <option value="کلیشادوسودرجان">کلیشادوسودرجان</option>
                                    <option value="لای بید">لای بید</option>
                                    <option value="قهجاورستان">قهجاورستان</option>
                                    <option value="چرمهین">چرمهین</option>
                                    <option value="رزوه">رزوه</option>
                                    <option value="فریدونشهر">فریدونشهر</option>
                                    <option value="طرق رود">طرق رود</option>
                                    <option value="نصرآباد">نصرآباد</option>
                                    <option value="برزک">برزک</option>
                                    <option value="سفیدشهر">سفیدشهر</option>
                                    <option value="سمیرم">سمیرم</option>
                                    <option value="گلدشت">گلدشت</option>
                                    <option value="اردستان">اردستان</option>
                                    <option value="جوشقان قالی">جوشقان قالی</option>
                                    <option value="بویین ومیاندشت">بویین ومیاندشت</option>
                                    <option value="کرکوند">کرکوند</option>
                                    <option value="درچه">درچه</option>
                                    <option value="انارک">انارک</option>
                                    <option value="دولت آباد">دولت آباد</option>
                                    <option value="ایمانشهر">ایمانشهر</option>
                                    <option value="گرگاب">گرگاب</option>
                                    <option value="حسن اباد">حسن اباد</option>
                                    <option value="سده لنجان">سده لنجان</option>
                                    <option value="حبیب آباد">حبیب آباد</option>
                                    <option value="بهاران شهر">بهاران شهر</option>
                                    <option value="میمه">میمه</option>
                                    <option value="تودشک">تودشک</option>
                                    <option value="گلشهر">گلشهر</option>
                                    <option value="رضوانشهر">رضوانشهر</option>
                                    <option value="داران">داران</option>
                                    <option value="علویجه">علویجه</option>
                                    <option value="نیک آباد">نیک آباد</option>
                                    <option value="مشکات">مشکات</option>
                                    <option value="آران وبیدگل">آران وبیدگل</option>
                                    <option value="خوانسار">خوانسار</option>
                                    <option value="نجف آباد">نجف آباد</option>
                                    <option value="منظریه">منظریه</option>
                                    <option value="فرخی">فرخی</option>
                                    <option value="دیزیچه">دیزیچه</option>
                                    <option value="اژیه">اژیه</option>
                                    <option value="زاینده رود">زاینده رود</option>
                                    <option value="خورزوق">خورزوق</option>
                                    <option value="قهدریجان">قهدریجان</option>
                                    <option value="شاهین شهر">شاهین شهر</option>
                                    <option value="بهارستان">بهارستان</option>
                                    <option value="چمگردان">چمگردان</option>
                                    <option value="دهاقان">دهاقان</option>
                                    <option value="برف انبار">برف انبار</option>
                                    <option value="بادرود">بادرود</option>
                                    <option value="کوهپایه">کوهپایه</option>
                                    <option value="گلپایگان">گلپایگان</option>
                                    <option value="عسگران">عسگران</option>
                                    <option value="حنا">حنا</option>
                                    <option value="کهریزسنگ">کهریزسنگ</option>
                                    <option value="مهاباد">مهاباد</option>
                                    <option value="کامو و چوگان">کامو و چوگان</option>
                                    <option value="افوس">افوس</option>
                                    <option value="زیباشهر">زیباشهر</option>
                                    <option value="کوشک">کوشک</option>
                                    <option value="نایین">نایین</option>
                                    <option value="سین">سین</option>
                                    <option value="زازران">زازران</option>
                                    <option value="مبارکه">مبارکه</option>
                                    <option value="ورزنه">ورزنه</option>
                                    <option value="ورنامخواست">ورنامخواست</option>
                                    <option value="شاپورآباد">شاپورآباد</option>
                                    <option value="فلاورجان">فلاورجان</option>
                                    <option value="وزوان">وزوان</option>
                                    <option value="باغ بهادران">باغ بهادران</option>
                                    <option value="اصفهان">اصفهان</option>
                                    <option value="چادگان">چادگان</option>
                                    <option value="دامنه">دامنه</option>
                                    <option value="نطنز">نطنز</option>
                                    <option value="محمدآباد">محمدآباد</option>
                                    <option value="اصفهان">اصفهان</option>
                                    <option value="نیاسر">نیاسر</option>
                                    <option value="نوش آباد">نوش آباد</option>
                                    <option value="کمه">کمه</option>
                                    <option value="جوزدان">جوزدان</option>
                                    <option value="قمصر">قمصر</option>
                                    <option value="جندق">جندق</option>
                                    <option value="طالخونچه">طالخونچه</option>
                                    <option value="خمینی شهر">خمینی شهر</option>
                                    <option value="باغشاد">باغشاد</option>
                                    <option value="دستگرد">دستگرد</option>
                                    <option value="ابریشم">ابریشم</option>
                                </select>
                                <select name="city" id="city" class="city4">
                                    <option value="">همه شهر ها</option>
                                    <option value="کازرون">کازرون</option>
                                    <option value="کارزین (فتح آباد)">کارزین (فتح آباد)</option>
                                    <option value="فدامی">فدامی</option>
                                    <option value="خومه زار">خومه زار</option>
                                    <option value="سلطان شهر">سلطان شهر</option>
                                    <option value="فیروزآباد">فیروزآباد</option>
                                    <option value="دبیران">دبیران</option>
                                    <option value="باب انار">باب انار</option>
                                    <option value="رامجرد">رامجرد</option>
                                    <option value="سروستان">سروستان</option>
                                    <option value="قره بلاغ">قره بلاغ</option>
                                    <option value="ارسنجان">ارسنجان</option>
                                    <option value="دژکرد">دژکرد</option>
                                    <option value="بیرم">بیرم</option>
                                    <option value="دهرم">دهرم</option>
                                    <option value="شیراز">شیراز</option>
                                    <option value="ایزدخواست">ایزدخواست</option>
                                    <option value="علامرودشت">علامرودشت</option>
                                    <option value="اوز">اوز</option>
                                    <option value="وراوی">وراوی</option>
                                    <option value="بیضا">بیضا</option>
                                    <option value="نی ریز">نی ریز</option>
                                    <option value="کنارتخته">کنارتخته</option>
                                    <option value="امام شهر">امام شهر</option>
                                    <option value="جهرم">جهرم</option>
                                    <option value="بابامنیر">بابامنیر</option>
                                    <option value="گراش">گراش</option>
                                    <option value="فسا">فسا</option>
                                    <option value="شهرپیر">شهرپیر</option>
                                    <option value="حسن اباد">حسن اباد</option>
                                    <option value="کامفیروز">کامفیروز</option>
                                    <option value="خنج">خنج</option>
                                    <option value="خانه زنیان">خانه زنیان</option>
                                    <option value="استهبان">استهبان</option>
                                    <option value="بوانات">بوانات</option>
                                    <option value="لطیفی">لطیفی</option>
                                    <option value="فراشبند">فراشبند</option>
                                    <option value="زرقان">زرقان</option>
                                    <option value="صغاد">صغاد</option>
                                    <option value="اشکنان">اشکنان</option>
                                    <option value="قایمیه">قایمیه</option>
                                    <option value="گله دار">گله دار</option>
                                    <option value="دوبرجی">دوبرجی</option>
                                    <option value="آباده طشک">آباده طشک</option>
                                    <option value="خرامه">خرامه</option>
                                    <option value="میمند">میمند</option>
                                    <option value="افزر">افزر</option>
                                    <option value="دوزه">دوزه</option>
                                    <option value="سیدان">سیدان</option>
                                    <option value="کوپن">کوپن</option>
                                    <option value="زاهدشهر">زاهدشهر</option>
                                    <option value="قادراباد">قادراباد</option>
                                    <option value="سده">سده</option>
                                    <option value="بنارویه">بنارویه</option>
                                    <option value="سعادت شهر">سعادت شهر</option>
                                    <option value="شهرصدرا">شهرصدرا</option>
                                    <option value="سورمق">سورمق</option>
                                    <option value="حسامی">حسامی</option>
                                    <option value="جویم">جویم</option>
                                    <option value="خوزی">خوزی</option>
                                    <option value="اردکان">اردکان</option>
                                    <option value="قطرویه">قطرویه</option>
                                    <option value="نودان">نودان</option>
                                    <option value="مبارک آباددیز">مبارک آباددیز</option>
                                    <option value="داراب">داراب</option>
                                    <option value="نورآباد">نورآباد</option>
                                    <option value="کوار">کوار</option>
                                    <option value="نوبندگان">نوبندگان</option>
                                    <option value="حاجی آباد">حاجی آباد</option>
                                    <option value="خاوران">خاوران</option>
                                    <option value="مرودشت">مرودشت</option>
                                    <option value="کوهنجان">کوهنجان</option>
                                    <option value="ششده">ششده</option>
                                    <option value="مزایجان">مزایجان</option>
                                    <option value="ایج">ایج</option>
                                    <option value="خور">خور</option>
                                    <option value="نوجین">نوجین</option>
                                    <option value="لپویی">لپویی</option>
                                    <option value="بهمن">بهمن</option>
                                    <option value="اهل">اهل</option>
                                    <option value="خشت">خشت</option>
                                    <option value="مهر">مهر</option>
                                    <option value="جنت شهر">جنت شهر</option>
                                    <option value="مشکان">مشکان</option>
                                    <option value="بالاده">بالاده</option>
                                    <option value="قیر">قیر</option>
                                    <option value="قطب آباد">قطب آباد</option>
                                    <option value="خانیمن">خانیمن</option>
                                    <option value="مصیری">مصیری</option>
                                    <option value="میانشهر">میانشهر</option>
                                    <option value="صفاشهر">صفاشهر</option>
                                    <option value="اقلید">اقلید</option>
                                    <option value="عمادده">عمادده</option>
                                    <option value="مادرسلیمان">مادرسلیمان</option>
                                    <option value="داریان">داریان</option>
                                    <option value="رونیز">رونیز</option>
                                    <option value="کره ای">کره ای</option>
                                    <option value="لار">لار</option>
                                    <option value="اسیر">اسیر</option>
                                    <option value="هماشهر">هماشهر</option>
                                    <option value="آباده">آباده</option>
                                    <option value="لامرد">لامرد</option>
                                </select>
                                <select name="city" id="city" class="city5">
                                    <option value="">همه شهر ها</option>
                                    <option value="هفتگل">هفتگل</option>
                                    <option value="بیدروبه">بیدروبه</option>
                                    <option value="شاوور">شاوور</option>
                                    <option value="حمزه">حمزه</option>
                                    <option value="گتوند">گتوند</option>
                                    <option value="شرافت">شرافت</option>
                                    <option value="منصوریه">منصوریه</option>
                                    <option value="زهره">زهره</option>
                                    <option value="رامهرمز">رامهرمز</option>
                                    <option value="بندرامام خمینی">بندرامام خمینی</option>
                                    <option value="کوت عبداله">کوت عبداله</option>
                                    <option value="میداود">میداود</option>
                                    <option value="چغامیش">چغامیش</option>
                                    <option value="ملاثانی">ملاثانی</option>
                                    <option value="چم گلک">چم گلک</option>
                                    <option value="حر">حر</option>
                                    <option value="شمس آباد">شمس آباد</option>
                                    <option value="آبژدان">آبژدان</option>
                                    <option value="چویبده">چویبده</option>
                                    <option value="مسجدسلیمان">مسجدسلیمان</option>
                                    <option value="مقاومت">مقاومت</option>
                                    <option value="ترکالکی">ترکالکی</option>
                                    <option value="دارخوین">دارخوین</option>
                                    <option value="سردشت">سردشت</option>
                                    <option value="لالی">لالی</option>
                                    <option value="کوت سیدنعیم">کوت سیدنعیم</option>
                                    <option value="حمیدیه">حمیدیه</option>
                                    <option value="دهدز">دهدز</option>
                                    <option value="قلعه تل">قلعه تل</option>
                                    <option value="میانرود">میانرود</option>
                                    <option value="رفیع">رفیع</option>
                                    <option value="اندیمشک">اندیمشک</option>
                                    <option value="الوان">الوان</option>
                                    <option value="سالند">سالند</option>
                                    <option value="صالح شهر">صالح شهر</option>
                                    <option value="اروندکنار">اروندکنار</option>
                                    <option value="سرداران">سرداران</option>
                                    <option value="تشان">تشان</option>
                                    <option value="شادگان">شادگان</option>
                                    <option value="بندرماهشهر">بندرماهشهر</option>
                                    <option value="جایزان">جایزان</option>
                                    <option value="بستان">بستان</option>
                                    <option value="ویس">ویس</option>
                                    <option value="اهواز">اهواز</option>
                                    <option value="فتح المبین">فتح المبین</option>
                                    <option value="شهر امام">شهر امام</option>
                                    <option value="قلعه خواجه">قلعه خواجه</option>
                                    <option value="حسینیه">حسینیه</option>
                                    <option value="گلگیر">گلگیر</option>
                                    <option value="مینوشهر">مینوشهر</option>
                                    <option value="سماله">سماله</option>
                                    <option value="شوشتر">شوشتر</option>
                                    <option value="بهبهان">بهبهان</option>
                                    <option value="هندیجان">هندیجان</option>
                                    <option value="ابوحمیظه">ابوحمیظه</option>
                                    <option value="آغاجاری">آغاجاری</option>
                                    <option value="ایذه">ایذه</option>
                                    <option value="صیدون">صیدون</option>
                                    <option value="سیاه منصور">سیاه منصور</option>
                                    <option value="هویزه">هویزه</option>
                                    <option value="آزادی">آزادی</option>
                                    <option value="شوش">شوش</option>
                                    <option value="دزفول">دزفول</option>
                                    <option value="جنت مکان">جنت مکان</option>
                                    <option value="آبادان">آبادان</option>
                                    <option value="گوریه">گوریه</option>
                                    <option value="خرمشهر">خرمشهر</option>
                                    <option value="مشراگه">مشراگه</option>
                                    <option value="خنافره">خنافره</option>
                                    <option value="چمران">چمران</option>
                                    <option value="امیدیه">امیدیه</option>
                                    <option value="سوسنگرد">سوسنگرد</option>
                                    <option value="شیبان">شیبان</option>
                                    <option value="الهایی">الهایی</option>
                                    <option value="باغ ملک">باغ ملک</option>
                                    <option value="صفی آباد">صفی آباد</option>
                                    <option value="رامشیر">رامشیر</option>
                                </select>
                                <select name="city" id="city" class="city6">
                                    <option value="">همه شهر ها</option>
                                    <option value="کشکسرای">کشکسرای</option>
                                    <option value="سهند">سهند</option>
                                    <option value="سیس">سیس</option>
                                    <option value="دوزدوزان">دوزدوزان</option>
                                    <option value="تیمورلو">تیمورلو</option>
                                    <option value="صوفیان">صوفیان</option>
                                    <option value="سردرود">سردرود</option>
                                    <option value="هادیشهر">هادیشهر</option>
                                    <option value="هشترود">هشترود</option>
                                    <option value="زرنق">زرنق</option>
                                    <option value="ترکمانچای">ترکمانچای</option>
                                    <option value="ورزقان">ورزقان</option>
                                    <option value="تسوج">تسوج</option>
                                    <option value="زنوز">زنوز</option>
                                    <option value="ایلخچی">ایلخچی</option>
                                    <option value="شرفخانه">شرفخانه</option>
                                    <option value="مهربان">مهربان</option>
                                    <option value="مبارک شهر">مبارک شهر</option>
                                    <option value="تیکمه داش">تیکمه داش</option>
                                    <option value="باسمنج">باسمنج</option>
                                    <option value="سیه رود">سیه رود</option>
                                    <option value="میانه">میانه</option>
                                    <option value="خمارلو">خمارلو</option>
                                    <option value="خواجه">خواجه</option>
                                    <option value="بناب مرند">بناب مرند</option>
                                    <option value="قره آغاج">قره آغاج</option>
                                    <option value="وایقان">وایقان</option>
                                    <option value="مراغه">مراغه</option>
                                    <option value="ممقان">ممقان</option>
                                    <option value="خامنه">خامنه</option>
                                    <option value="خسروشاه">خسروشاه</option>
                                    <option value="لیلان">لیلان</option>
                                    <option value="نظرکهریزی">نظرکهریزی</option>
                                    <option value="اهر">اهر</option>
                                    <option value="بخشایش">بخشایش</option>
                                    <option value="آقکند">آقکند</option>
                                    <option value="جوان قلعه">جوان قلعه</option>
                                    <option value="کلیبر">کلیبر</option>
                                    <option value="مرند">مرند</option>
                                    <option value="اسکو">اسکو</option>
                                    <option value="شندآباد">شندآباد</option>
                                    <option value="شربیان">شربیان</option>
                                    <option value="گوگان">گوگان</option>
                                    <option value="بستان آباد">بستان آباد</option>
                                    <option value="تبریز">تبریز</option>
                                    <option value="جلفا">جلفا</option>
                                    <option value="اچاچی">اچاچی</option>
                                    <option value="هریس">هریس</option>
                                    <option value="یامچی">یامچی</option>
                                    <option value="خاروانا">خاروانا</option>
                                    <option value="کوزه کنان">کوزه کنان</option>
                                    <option value="خداجو(خراجو)">خداجو(خراجو)</option>
                                    <option value="آذرشهر">آذرشهر</option>
                                    <option value="شبستر">شبستر</option>
                                    <option value="سراب">سراب</option>
                                    <option value="ملکان">ملکان</option>
                                    <option value="بناب">بناب</option>
                                    <option value="هوراند">هوراند</option>
                                    <option value="کلوانق">کلوانق</option>
                                    <option value="ترک">ترک</option>
                                    <option value="عجب شیر">عجب شیر</option>
                                    <option value="آبش احمد">آبش احمد</option>
                                </select>
                                <select name="city" id="city" class="city7">
                                    <option value="">همه شهر ها</option>
                                    <option value="گلوگاه">گلوگاه</option>
                                    <option value="پل سفید">پل سفید</option>
                                    <option value="دابودشت">دابودشت</option>
                                    <option value="چالوس">چالوس</option>
                                    <option value="کیاسر">کیاسر</option>
                                    <option value="بهنمیر">بهنمیر</option>
                                    <option value="تنکابن">تنکابن</option>
                                    <option value="کلاردشت">کلاردشت</option>
                                    <option value="ایزدشهر">ایزدشهر</option>
                                    <option value="گتاب">گتاب</option>
                                    <option value="سلمان شهر">سلمان شهر</option>
                                    <option value="ارطه">ارطه</option>
                                    <option value="امیرکلا">امیرکلا</option>
                                    <option value="کوهی خیل">کوهی خیل</option>
                                    <option value="پایین هولار">پایین هولار</option>
                                    <option value="گزنک">گزنک</option>
                                    <option value="محمودآباد">محمودآباد</option>
                                    <option value="رامسر">رامسر</option>
                                    <option value="نوشهر">نوشهر</option>
                                    <option value="خلیل شهر">خلیل شهر</option>
                                    <option value="کیاکلا">کیاکلا</option>
                                    <option value="نور">نور</option>
                                    <option value="مرزیکلا">مرزیکلا</option>
                                    <option value="فریدونکنار">فریدونکنار</option>
                                    <option value="زیرآب">زیرآب</option>
                                    <option value="امامزاده عبدالله">امامزاده عبدالله</option>
                                    <option value="هچیرود">هچیرود</option>
                                    <option value="فریم">فریم</option>
                                    <option value="هادی شهر">هادی شهر</option>
                                    <option value="نشتارود">نشتارود</option>
                                    <option value="پول">پول</option>
                                    <option value="بهشهر">بهشهر</option>
                                    <option value="کلارآباد">کلارآباد</option>
                                    <option value="بلده">بلده</option>
                                    <option value="بابل">بابل</option>
                                    <option value="جویبار">جویبار</option>
                                    <option value="آلاشت">آلاشت</option>
                                    <option value="آمل">آمل</option>
                                    <option value="نکا">نکا</option>
                                    <option value="کتالم وسادات شهر">کتالم وسادات شهر</option>
                                    <option value="بابلسر">بابلسر</option>
                                    <option value="شیرود">شیرود</option>
                                    <option value="شیرگاه">شیرگاه</option>
                                    <option value="رویان">رویان</option>
                                    <option value="زرگرمحله">زرگرمحله</option>
                                    <option value="عباس اباد">عباس اباد</option>
                                    <option value="قایم شهر">قایم شهر</option>
                                    <option value="خوش رودپی">خوش رودپی</option>
                                    <option value="مرزن آباد">مرزن آباد</option>
                                    <option value="ساری">ساری</option>
                                    <option value="رینه">رینه</option>
                                    <option value="سرخرود">سرخرود</option>
                                    <option value="خرم آباد">خرم آباد</option>
                                    <option value="کجور">کجور</option>
                                    <option value="رستمکلا">رستمکلا</option>
                                    <option value="سورک">سورک</option>
                                    <option value="چمستان">چمستان</option>
                                </select>
                                <select name="city" id="city" class="city8">
                                    <option value="">همه شهر ها</option>
                                    <option value="تازه شهر">تازه شهر</option>
                                    <option value="نالوس">نالوس</option>
                                    <option value="ایواوغلی">ایواوغلی</option>
                                    <option value="شاهین دژ">شاهین دژ</option>
                                    <option value="گردکشانه">گردکشانه</option>
                                    <option value="باروق">باروق</option>
                                    <option value="سیلوانه">سیلوانه</option>
                                    <option value="بازرگان">بازرگان</option>
                                    <option value="نازک علیا">نازک علیا</option>
                                    <option value="ربط">ربط</option>
                                    <option value="تکاب">تکاب</option>
                                    <option value="دیزج دیز">دیزج دیز</option>
                                    <option value="سیمینه">سیمینه</option>
                                    <option value="نوشین">نوشین</option>
                                    <option value="میاندوآب">میاندوآب</option>
                                    <option value="مرگنلر">مرگنلر</option>
                                    <option value="سلماس">سلماس</option>
                                    <option value="آواجیق">آواجیق</option>
                                    <option value="قطور">قطور</option>
                                    <option value="محمودآباد">محمودآباد</option>
                                    <option value="خوی">خوی</option>
                                    <option value="نقده">نقده</option>
                                    <option value="سرو">سرو</option>
                                    <option value="خلیفان">خلیفان</option>
                                    <option value="پلدشت">پلدشت</option>
                                    <option value="میرآباد">میرآباد</option>
                                    <option value="اشنویه">اشنویه</option>
                                    <option value="زرآباد">زرآباد</option>
                                    <option value="بوکان">بوکان</option>
                                    <option value="پیرانشهر">پیرانشهر</option>
                                    <option value="چهاربرج">چهاربرج</option>
                                    <option value="قوشچی">قوشچی</option>
                                    <option value="شوط">شوط</option>
                                    <option value="ماکو">ماکو</option>
                                    <option value="سیه چشمه">سیه چشمه</option>
                                    <option value="سردشت">سردشت</option>
                                    <option value="کشاورز">کشاورز</option>
                                    <option value="فیرورق">فیرورق</option>
                                    <option value="محمدیار">محمدیار</option>
                                    <option value="ارومیه">ارومیه</option>
                                    <option value="مهاباد">مهاباد</option>
                                    <option value="قره ضیاءالدین">قره ضیاءالدین</option>
                                </select>
                                <select name="city" id="city" class="city9">
                                    <option value="">همه شهر ها</option>
                                    <option value="کهنوج">کهنوج</option>
                                    <option value="بلوک">بلوک</option>
                                    <option value="پاریز">پاریز</option>
                                    <option value="گنبکی">گنبکی</option>
                                    <option value="زنگی آباد">زنگی آباد</option>
                                    <option value="بم">بم</option>
                                    <option value="خانوک">خانوک</option>
                                    <option value="کیانشهر">کیانشهر</option>
                                    <option value="جوپار">جوپار</option>
                                    <option value="عنبرآباد">عنبرآباد</option>
                                    <option value="جوزم">جوزم</option>
                                    <option value="نظام شهر">نظام شهر</option>
                                    <option value="لاله زار">لاله زار</option>
                                    <option value="کشکوییه">کشکوییه</option>
                                    <option value="زیدآباد">زیدآباد</option>
                                    <option value="هنزا">هنزا</option>
                                    <option value="چترود">چترود</option>
                                    <option value="جبالبارز">جبالبارز</option>
                                    <option value="سیرجان">سیرجان</option>
                                    <option value="رودبار">رودبار</option>
                                    <option value="کرمان">کرمان</option>
                                    <option value="بافت">بافت</option>
                                    <option value="صفاییه">صفاییه</option>
                                    <option value="منوجان">منوجان</option>
                                    <option value="اندوهجرد">اندوهجرد</option>
                                    <option value="هجدک">هجدک</option>
                                    <option value="خورسند">خورسند</option>
                                    <option value="امین شهر">امین شهر</option>
                                    <option value="بردسیر">بردسیر</option>
                                    <option value="رفسنجان">رفسنجان</option>
                                    <option value="هماشهر">هماشهر</option>
                                    <option value="محمدآباد">محمدآباد</option>
                                    <option value="اختیارآباد">اختیارآباد</option>
                                    <option value="بروات">بروات</option>
                                    <option value="ریحان">ریحان</option>
                                    <option value="کوهبنان">کوهبنان</option>
                                    <option value="ماهان">ماهان</option>
                                    <option value="دوساری">دوساری</option>
                                    <option value="دهج">دهج</option>
                                    <option value="فاریاب">فاریاب</option>
                                    <option value="گلزار">گلزار</option>
                                    <option value="بهرمان">بهرمان</option>
                                    <option value="بلورد">بلورد</option>
                                    <option value="فهرج">فهرج</option>
                                    <option value="کاظم آباد">کاظم آباد</option>
                                    <option value="جیرفت">جیرفت</option>
                                    <option value="نجف شهر">نجف شهر</option>
                                    <option value="قلعه گنج">قلعه گنج</option>
                                    <option value="باغین">باغین</option>
                                    <option value="بزنجان">بزنجان</option>
                                    <option value="زرند">زرند</option>
                                    <option value="نودژ">نودژ</option>
                                    <option value="گلباف">گلباف</option>
                                    <option value="راور">راور</option>
                                    <option value="خاتون اباد">خاتون اباد</option>
                                    <option value="نرماشیر">نرماشیر</option>
                                    <option value="دشتکار">دشتکار</option>
                                    <option value="مس سرچشمه">مس سرچشمه</option>
                                    <option value="خواجو شهر">خواجو شهر</option>
                                    <option value="رابر">رابر</option>
                                    <option value="راین">راین</option>
                                    <option value="درب بهشت">درب بهشت</option>
                                    <option value="یزدان شهر">یزدان شهر</option>
                                    <option value="زهکلوت">زهکلوت</option>
                                    <option value="محی آباد">محی آباد</option>
                                    <option value="مردهک">مردهک</option>
                                    <option value="شهداد">شهداد</option>
                                    <option value="ارزوییه">ارزوییه</option>
                                    <option value="نگار">نگار</option>
                                    <option value="شهربابک">شهربابک</option>
                                    <option value="انار">انار</option>
                                </select>
                                <select name="city" id="city" class="city10">
                                    <option value="">همه شهر ها</option>
                                    <option value="محمدی">محمدی</option>
                                    <option value="شهرک علی اکبر">شهرک علی اکبر</option>
                                    <option value="بنجار">بنجار</option>
                                    <option value="گلمورتی">گلمورتی</option>
                                    <option value="نگور">نگور</option>
                                    <option value="راسک">راسک</option>
                                    <option value="بنت">بنت</option>
                                    <option value="قصرقند">قصرقند</option>
                                    <option value="جالق">جالق</option>
                                    <option value="هیدوچ">هیدوچ</option>
                                    <option value="نوک آباد">نوک آباد</option>
                                    <option value="زهک">زهک</option>
                                    <option value="بمپور">بمپور</option>
                                    <option value="پیشین">پیشین</option>
                                    <option value="گشت">گشت</option>
                                    <option value="محمدآباد">محمدآباد</option>
                                    <option value="زاهدان">زاهدان</option>
                                    <option value="زابلی">زابلی</option>
                                    <option value="چاه بهار">چاه بهار</option>
                                    <option value="زرآباد">زرآباد</option>
                                    <option value="بزمان">بزمان</option>
                                    <option value="اسپکه">اسپکه</option>
                                    <option value="فنوج">فنوج</option>
                                    <option value="سراوان">سراوان</option>
                                    <option value="ادیمی">ادیمی</option>
                                    <option value="زابل">زابل</option>
                                    <option value="دوست محمد">دوست محمد</option>
                                    <option value="ایرانشهر">ایرانشهر</option>
                                    <option value="سرباز">سرباز</option>
                                    <option value="سیرکان">سیرکان</option>
                                    <option value="میرجاوه">میرجاوه</option>
                                    <option value="نصرت آباد">نصرت آباد</option>
                                    <option value="سوران">سوران</option>
                                    <option value="خاش">خاش</option>
                                    <option value="کنارک">کنارک</option>
                                    <option value="محمدان">محمدان</option>
                                    <option value="نیک شهر">نیک شهر</option>
                                </select>
                                <select name="city" id="city" class="city11">
                                    <option value="">همه شهر ها</option>
                                    <option value="چهارباغ">چهارباغ</option>
                                    <option value="آسارا">آسارا</option>
                                    <option value="کرج">کرج</option>
                                    <option value="طالقان">طالقان</option>
                                    <option value="شهرجدیدهشتگرد">شهرجدیدهشتگرد</option>
                                    <option value="محمدشهر">محمدشهر</option>
                                    <option value="مشکین دشت">مشکین دشت</option>
                                    <option value="نظرآباد">نظرآباد</option>
                                    <option value="هشتگرد">هشتگرد</option>
                                    <option value="ماهدشت">ماهدشت</option>
                                    <option value="اشتهارد">اشتهارد</option>
                                    <option value="کوهسار">کوهسار</option>
                                    <option value="گرمدره">گرمدره</option>
                                    <option value="تنکمان">تنکمان</option>
                                    <option value="گلسار">گلسار</option>
                                    <option value="کمال شهر">کمال شهر</option>
                                    <option value="فردیس">فردیس</option>
                                </select>
                                <select name="city" id="city" class="city12">
                                    <option value="">همه شهر ها</option>
                                    <option value="منجیل">منجیل</option>
                                    <option value="شلمان">شلمان</option>
                                    <option value="خشکبیجار">خشکبیجار</option>
                                    <option value="ماکلوان">ماکلوان</option>
                                    <option value="سنگر">سنگر</option>
                                    <option value="مرجقل">مرجقل</option>
                                    <option value="لیسار">لیسار</option>
                                    <option value="رضوانشهر">رضوانشهر</option>
                                    <option value="رحیم آباد">رحیم آباد</option>
                                    <option value="لوندویل">لوندویل</option>
                                    <option value="احمدسرگوراب">احمدسرگوراب</option>
                                    <option value="لوشان">لوشان</option>
                                    <option value="اطاقور">اطاقور</option>
                                    <option value="لشت نشاء">لشت نشاء</option>
                                    <option value="فومن">فومن</option>
                                    <option value="چوبر">چوبر</option>
                                    <option value="بازار جمعه">بازار جمعه</option>
                                    <option value="کلاچای">کلاچای</option>
                                    <option value="بندرانزلی">بندرانزلی</option>
                                    <option value="املش">املش</option>
                                    <option value="رستم آباد">رستم آباد</option>
                                    <option value="لاهیجان">لاهیجان</option>
                                    <option value="توتکابن">توتکابن</option>
                                    <option value="لنگرود">لنگرود</option>
                                    <option value="کوچصفهان">کوچصفهان</option>
                                    <option value="صومعه سرا">صومعه سرا</option>
                                    <option value="اسالم">اسالم</option>
                                    <option value="دیلمان">دیلمان</option>
                                    <option value="رودسر">رودسر</option>
                                    <option value="کیاشهر">کیاشهر</option>
                                    <option value="شفت">شفت</option>
                                    <option value="رودبار">رودبار</option>
                                    <option value="کومله">کومله</option>
                                    <option value="رشت">رشت</option>
                                    <option value="ماسوله">ماسوله</option>
                                    <option value="خمام">خمام</option>
                                    <option value="ماسال">ماسال</option>
                                    <option value="واجارگاه">واجارگاه</option>
                                    <option value="هشتپر (تالش)">هشتپر (تالش)</option>
                                    <option value="پره سر">پره سر</option>
                                    <option value="بره سر">بره سر</option>
                                    <option value="آستارا">آستارا</option>
                                    <option value="رودبنه">رودبنه</option>
                                    <option value="جیرنده">جیرنده</option>
                                    <option value="چاف و چمخاله">چاف و چمخاله</option>
                                    <option value="لولمان">لولمان</option>
                                    <option value="گوراب زرمیخ">گوراب زرمیخ</option>
                                    <option value="حویق">حویق</option>
                                    <option value="سیاهکل">سیاهکل</option>
                                    <option value="چابکسر">چابکسر</option>
                                    <option value="آستانه اشرفیه">آستانه اشرفیه</option>
                                    <option value="رانکوه">رانکوه</option>
                                </select>
                                <select name="city" id="city" class="city13">
                                    <option value="">همه شهر ها</option>
                                    <option value="سنقر">سنقر</option>
                                    <option value="شاهو">شاهو</option>
                                    <option value="بانوره">بانوره</option>
                                    <option value="تازه آباد">تازه آباد</option>
                                    <option value="هلشی">هلشی</option>
                                    <option value="جوانرود">جوانرود</option>
                                    <option value="قصرشیرین">قصرشیرین</option>
                                    <option value="نوسود">نوسود</option>
                                    <option value="کرند">کرند</option>
                                    <option value="کوزران">کوزران</option>
                                    <option value="بیستون">بیستون</option>
                                    <option value="حمیل">حمیل</option>
                                    <option value="گیلانغرب">گیلانغرب</option>
                                    <option value="سطر">سطر</option>
                                    <option value="روانسر">روانسر</option>
                                    <option value="پاوه">پاوه</option>
                                    <option value="ازگله">ازگله</option>
                                    <option value="کرمانشاه">کرمانشاه</option>
                                    <option value="میان راهان">میان راهان</option>
                                    <option value="کنگاور">کنگاور</option>
                                    <option value="سرپل ذهاب">سرپل ذهاب</option>
                                    <option value="ریجاب">ریجاب</option>
                                    <option value="باینگان">باینگان</option>
                                    <option value="هرسین">هرسین</option>
                                    <option value="اسلام آبادغرب">اسلام آبادغرب</option>
                                    <option value="سرمست">سرمست</option>
                                    <option value="سومار">سومار</option>
                                    <option value="نودشه">نودشه</option>
                                    <option value="گهواره">گهواره</option>
                                    <option value="رباط">رباط</option>
                                    <option value="صحنه">صحنه</option>
                                    <option value="گودین">گودین</option>
                                </select>
                                <select name="city" id="city" class="city14">
                                    <option value="">همه شهر ها</option>
                                    <option value="سیمین شهر">سیمین شهر</option>
                                    <option value="مزرعه">مزرعه</option>
                                    <option value="رامیان">رامیان</option>
                                    <option value="فراغی">فراغی</option>
                                    <option value="گنبدکاووس">گنبدکاووس</option>
                                    <option value="کردکوی">کردکوی</option>
                                    <option value="مراوه">مراوه</option>
                                    <option value="بندرترکمن">بندرترکمن</option>
                                    <option value="نگین شهر">نگین شهر</option>
                                    <option value="آق قلا">آق قلا</option>
                                    <option value="سرخنکلاته">سرخنکلاته</option>
                                    <option value="گالیکش">گالیکش</option>
                                    <option value="سنگدوین">سنگدوین</option>
                                    <option value="دلند">دلند</option>
                                    <option value="بندرگز">بندرگز</option>
                                    <option value="نوده خاندوز">نوده خاندوز</option>
                                    <option value="مینودشت">مینودشت</option>
                                    <option value="گرگان">گرگان</option>
                                    <option value="گمیش تپه">گمیش تپه</option>
                                    <option value="علی اباد">علی اباد</option>
                                    <option value="خان ببین">خان ببین</option>
                                    <option value="کلاله">کلاله</option>
                                    <option value="اینچه برون">اینچه برون</option>
                                    <option value="فاضل آباد">فاضل آباد</option>
                                    <option value="تاتارعلیا">تاتارعلیا</option>
                                    <option value="نوکنده">نوکنده</option>
                                    <option value="آزادشهر">آزادشهر</option>
                                    <option value="انبارآلوم">انبارآلوم</option>
                                    <option value="جلین">جلین</option>
                                </select>
                                <select class="city15" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="بیکاء">بیکاء</option>
                                    <option value="تیرور">تیرور</option>
                                    <option value="گروک">گروک</option>
                                    <option value="قشم">قشم</option>
                                    <option value="کوشکنار">کوشکنار</option>
                                    <option value="کیش">کیش</option>
                                    <option value="سرگز">سرگز</option>
                                    <option value="بندرعباس">بندرعباس</option>
                                    <option value="زیارتعلی">زیارتعلی</option>
                                    <option value="سندرک">سندرک</option>
                                    <option value="کوهستک">کوهستک</option>
                                    <option value="لمزان">لمزان</option>
                                    <option value="رویدر">رویدر</option>
                                    <option value="قلعه قاضی">قلعه قاضی</option>
                                    <option value="فارغان">فارغان</option>
                                    <option value="ابوموسی">ابوموسی</option>
                                    <option value="هشتبندی">هشتبندی</option>
                                    <option value="سردشت">سردشت</option>
                                    <option value="درگهان">درگهان</option>
                                    <option value="پارسیان">پارسیان</option>
                                    <option value="کنگ">کنگ</option>
                                    <option value="جناح">جناح</option>
                                    <option value="تازیان پایین">تازیان پایین</option>
                                    <option value="دهبارز">دهبارز</option>
                                    <option value="میناب">میناب</option>
                                    <option value="سیریک">سیریک</option>
                                    <option value="سوزا">سوزا</option>
                                    <option value="خمیر">خمیر</option>
                                    <option value="چارک">چارک</option>
                                    <option value="حاجی اباد">حاجی اباد</option>
                                    <option value="فین">فین</option>
                                    <option value="بندرجاسک">بندرجاسک</option>
                                    <option value="گوهران">گوهران</option>
                                    <option value="هرمز">هرمز</option>
                                    <option value="دشتی">دشتی</option>
                                    <option value="بندرلنگه">بندرلنگه</option>
                                    <option value="بستک">بستک</option>
                                    <option value="تخت">تخت</option>
                                </select>
                                <select class="city16" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="چالانچولان">چالانچولان</option>
                                    <option value="بیران شهر">بیران شهر</option>
                                    <option value="ویسیان">ویسیان</option>
                                    <option value="شول آباد">شول آباد</option>
                                    <option value="پلدختر">پلدختر</option>
                                    <option value="کوهدشت">کوهدشت</option>
                                    <option value="هفت چشمه">هفت چشمه</option>
                                    <option value="بروجرد">بروجرد</option>
                                    <option value="الشتر">الشتر</option>
                                    <option value="مومن آباد">مومن آباد</option>
                                    <option value="دورود">دورود</option>
                                    <option value="زاغه">زاغه</option>
                                    <option value="چقابل">چقابل</option>
                                    <option value="الیگودرز">الیگودرز</option>
                                    <option value="معمولان">معمولان</option>
                                    <option value="کوهنانی">کوهنانی</option>
                                    <option value="نورآباد">نورآباد</option>
                                    <option value="سپیددشت">سپیددشت</option>
                                    <option value="سراب دوره">سراب دوره</option>
                                    <option value="ازنا">ازنا</option>
                                    <option value="گراب">گراب</option>
                                    <option value="خرم آباد">خرم آباد</option>
                                    <option value="اشترینان">اشترینان</option>
                                    <option value="فیروزآباد">فیروزآباد</option>
                                    <option value="درب گنبد">درب گنبد</option>
                                </select>
                                <select class="city17" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="زنگنه">زنگنه</option>
                                    <option value="دمق">دمق</option>
                                    <option value="سرکان">سرکان</option>
                                    <option value="آجین">آجین</option>
                                    <option value="جورقان">جورقان</option>
                                    <option value="برزول">برزول</option>
                                    <option value="فامنین">فامنین</option>
                                    <option value="سامن">سامن</option>
                                    <option value="بهار">بهار</option>
                                    <option value="فرسفج">فرسفج</option>
                                    <option value="شیرین سو">شیرین سو</option>
                                    <option value="مریانج">مریانج</option>
                                    <option value="فیروزان">فیروزان</option>
                                    <option value="قروه درجزین">قروه درجزین</option>
                                    <option value="ازندریان">ازندریان</option>
                                    <option value="لالجین">لالجین</option>
                                    <option value="گل تپه">گل تپه</option>
                                    <option value="گیان">گیان</option>
                                    <option value="ملایر">ملایر</option>
                                    <option value="صالح آباد">صالح آباد</option>
                                    <option value="تویسرکان">تویسرکان</option>
                                    <option value="اسدآباد">اسدآباد</option>
                                    <option value="همدان">همدان</option>
                                    <option value="نهاوند">نهاوند</option>
                                    <option value="رزن">رزن</option>
                                    <option value="جوکار">جوکار</option>
                                    <option value="مهاجران">مهاجران</option>
                                    <option value="کبودرآهنگ">کبودرآهنگ</option>
                                    <option value="قهاوند">قهاوند</option>
                                </select>
                                <select class="city18" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="قروه">قروه</option>
                                    <option value="توپ آغاج">توپ آغاج</option>
                                    <option value="سروآباد">سروآباد</option>
                                    <option value="بویین سفلی">بویین سفلی</option>
                                    <option value="زرینه">زرینه</option>
                                    <option value="دلبران">دلبران</option>
                                    <option value="سنندج">سنندج</option>
                                    <option value="یاسوکند">یاسوکند</option>
                                    <option value="موچش">موچش</option>
                                    <option value="بانه">بانه</option>
                                    <option value="مریوان">مریوان</option>
                                    <option value="سریش آباد">سریش آباد</option>
                                    <option value="صاحب">صاحب</option>
                                    <option value="دهگلان">دهگلان</option>
                                    <option value="بابارشانی">بابارشانی</option>
                                    <option value="دیواندره">دیواندره</option>
                                    <option value="برده رشه">برده رشه</option>
                                    <option value="شویشه">شویشه</option>
                                    <option value="بیجار">بیجار</option>
                                    <option value="اورامان تخت">اورامان تخت</option>
                                    <option value="کانی سور">کانی سور</option>
                                    <option value="کانی دینار">کانی دینار</option>
                                    <option value="دزج">دزج</option>
                                    <option value="سقز">سقز</option>
                                    <option value="بلبان آباد">بلبان آباد</option>
                                    <option value="پیرتاج">پیرتاج</option>
                                    <option value="کامیاران">کامیاران</option>
                                    <option value="آرمرده">آرمرده</option>
                                    <option value="چناره">چناره</option>
                                </select>
                                <select class="city19" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="آستانه">آستانه</option>
                                    <option value="خنجین">خنجین</option>
                                    <option value="نراق">نراق</option>
                                    <option value="کمیجان">کمیجان</option>
                                    <option value="آشتیان">آشتیان</option>
                                    <option value="رازقان">رازقان</option>
                                    <option value="مهاجران">مهاجران</option>
                                    <option value="غرق آباد">غرق آباد</option>
                                    <option value="خنداب">خنداب</option>
                                    <option value="قورچی باشی">قورچی باشی</option>
                                    <option value="خشکرود">خشکرود</option>
                                    <option value="ساروق">ساروق</option>
                                    <option value="محلات">محلات</option>
                                    <option value="شازند">شازند</option>
                                    <option value="ساوه">ساوه</option>
                                    <option value="میلاجرد">میلاجرد</option>
                                    <option value="تفرش">تفرش</option>
                                    <option value="زاویه">زاویه</option>
                                    <option value="اراک">اراک</option>
                                    <option value="توره">توره</option>
                                    <option value="نوبران">نوبران</option>
                                    <option value="فرمهین">فرمهین</option>
                                    <option value="دلیجان">دلیجان</option>
                                    <option value="پرندک">پرندک</option>
                                    <option value="کارچان">کارچان</option>
                                    <option value="نیمور">نیمور</option>
                                    <option value="هندودر">هندودر</option>
                                    <option value="آوه">آوه</option>
                                    <option value="جاورسیان">جاورسیان</option>
                                    <option value="خمین">خمین</option>
                                    <option value="مامونیه">مامونیه</option>
                                    <option value="داودآباد">داودآباد</option>
                                    <option value="شهباز">شهباز</option>
                                </select>
                                <select class="city20" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="کهک">کهک</option>
                                    <option value="قم">قم</option>
                                    <option value="سلفچگان">سلفچگان</option>
                                    <option value="جعفریه">جعفریه</option>
                                    <option value="قنوات">قنوات</option>
                                    <option value="دستجرد">دستجرد</option>
                                </select>
                                <select class="city21" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="سگزآباد">سگزآباد</option>
                                    <option value="بیدستان">بیدستان</option>
                                    <option value="کوهین">کوهین</option>
                                    <option value="رازمیان">رازمیان</option>
                                    <option value="خرمدشت">خرمدشت</option>
                                    <option value="آبگرم">آبگرم</option>
                                    <option value="شال">شال</option>
                                    <option value="شریفیه">شریفیه</option>
                                    <option value="اقبالیه">اقبالیه</option>
                                    <option value="نرجه">نرجه</option>
                                    <option value="ارداق">ارداق</option>
                                    <option value="الوند">الوند</option>
                                    <option value="خاکعلی">خاکعلی</option>
                                    <option value="سیردان">سیردان</option>
                                    <option value="ضیاڈآباد">ضیاڈآباد</option>
                                    <option value="بویین زهرا">بویین زهرا</option>
                                    <option value="محمدیه">محمدیه</option>
                                    <option value="محمودآبادنمونه">محمودآبادنمونه</option>
                                    <option value="معلم کلایه">معلم کلایه</option>
                                    <option value="اسفرورین">اسفرورین</option>
                                    <option value="آوج">آوج</option>
                                    <option value="دانسفهان">دانسفهان</option>
                                    <option value="آبیک">آبیک</option>
                                    <option value="قزوین">قزوین</option>
                                    <option value="تاکستان">تاکستان</option>
                                </select>
                                <select class="city22" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="پارس آباد">پارس آباد</option>
                                    <option value="فخراباد">فخراباد</option>
                                    <option value="کلور">کلور</option>
                                    <option value="نیر">نیر</option>
                                    <option value="اردبیل">اردبیل</option>
                                    <option value="اسلام اباد">اسلام اباد</option>
                                    <option value="تازه کندانگوت">تازه کندانگوت</option>
                                    <option value="مشگین شهر">مشگین شهر</option>
                                    <option value="جعفرآباد">جعفرآباد</option>
                                    <option value="نمین">نمین</option>
                                    <option value="اصلاندوز">اصلاندوز</option>
                                    <option value="مرادلو">مرادلو</option>
                                    <option value="خلخال">خلخال</option>
                                    <option value="کوراییم">کوراییم</option>
                                    <option value="هیر">هیر</option>
                                    <option value="گیوی">گیوی</option>
                                    <option value="گرمی">گرمی</option>
                                    <option value="لاهرود">لاهرود</option>
                                    <option value="هشتجین">هشتجین</option>
                                    <option value="عنبران">عنبران</option>
                                    <option value="تازه کند">تازه کند</option>
                                    <option value="قصابه">قصابه</option>
                                    <option value="رضی">رضی</option>
                                    <option value="سرعین">سرعین</option>
                                    <option value="بیله سوار">بیله سوار</option>
                                    <option value="آبی بیگلو">آبی بیگلو</option>
                                </select>
                                <select class="city23" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="ریز">پارس آباد</option>
                                    <option value="برازجان">ریز</option>
                                    <option value="بندرریگ">برازجان</option>
                                    <option value="اهرم">بندرریگ</option>
                                    <option value="دوراهک">اهرم</option>
                                    <option value="خورموج">دوراهک</option>
                                    <option value="نخل تقی">خورموج</option>
                                    <option value="کلمه">نخل تقی</option>
                                    <option value="بندردیلم">کلمه</option>
                                    <option value="وحدتیه">بندردیلم</option>
                                    <option value="بنک">وحدتیه</option>
                                    <option value="چغادک">بنک</option>
                                    <option value="بندردیر">چغادک</option>
                                    <option value="کاکی">بندردیر</option>
                                    <option value="جم">کاکی</option>
                                    <option value="دالکی">جم</option>
                                    <option value="بندرگناوه">دالکی</option>
                                    <option value="آباد">بندرگناوه</option>
                                    <option value="آبدان">آباد</option>
                                    <option value="خارک">آبدان</option>
                                    <option value="شنبه">خارک</option>
                                    <option value="بوشکان">شنبه</option>
                                    <option value="انارستان">بوشکان</option>
                                    <option value="شبانکاره">انارستان</option>
                                    <option value="سیراف">شبانکاره</option>
                                    <option value="دلوار">سیراف</option>
                                    <option value="بردستان">دلوار</option>
                                    <option value="بادوله">بردستان</option>
                                    <option value="عسلویه">بادوله</option>
                                    <option value="تنگ ارم">عسلویه</option>
                                    <option value="امام حسن">تنگ ارم</option>
                                    <option value="سعد آباد">امام حسن</option>
                                    <option value="بندرکنگان">سعد آباد</option>
                                    <option value="بوشهر">بندرکنگان</option>
                                    <option value="بردخون">بوشهر</option>
                                    <option value="آب پخش">بردخون</option>
                                </select>
                                <select class="city24" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="مروست">مروست</option>
                                    <option value="مهردشت">مهردشت</option>
                                    <option value="حمیدیا">حمیدیا</option>
                                    <option value="تفت">تفت</option>
                                    <option value="اشکذر">اشکذر</option>
                                    <option value="ندوشن">ندوشن</option>
                                    <option value="یزد">یزد</option>
                                    <option value="عقدا">عقدا</option>
                                    <option value="بهاباد">بهاباد</option>
                                    <option value="ابرکوه">ابرکوه</option>
                                    <option value="زارچ">زارچ</option>
                                    <option value="نیر">نیر</option>
                                    <option value="اردکان">اردکان</option>
                                    <option value="هرات">هرات</option>
                                    <option value="بفروییه">بفروییه</option>
                                    <option value="شاهدیه">شاهدیه</option>
                                    <option value="بافق">بافق</option>
                                    <option value="خضرآباد">خضرآباد</option>
                                    <option value="میبد">میبد</option>
                                    <option value="مهریز">مهریز</option>
                                    <option value="احمدآباد">احمدآباد</option>
                                </select>
                                <select class="city25" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="سجاس">سجاس</option>
                                    <option value="زرین رود">زرین رود</option>
                                    <option value="آب بر">آب بر</option>
                                    <option value="ارمغانخانه">ارمغانخانه</option>
                                    <option value="کرسف">کرسف</option>
                                    <option value="هیدج">هیدج</option>
                                    <option value="سلطانیه">سلطانیه</option>
                                    <option value="خرمدره">خرمدره</option>
                                    <option value="نیک پی">نیک پی</option>
                                    <option value="قیدار">قیدار</option>
                                    <option value="ابهر">ابهر</option>
                                    <option value="دندی">دندی</option>
                                    <option value="حلب">حلب</option>
                                    <option value="نوربهار">نوربهار</option>
                                    <option value="گرماب">گرماب</option>
                                    <option value="چورزق">چورزق</option>
                                    <option value="زنجان">زنجان</option>
                                    <option value="سهرورد">سهرورد</option>
                                    <option value="صایین قلعه">صایین قلعه</option>
                                    <option value="ماه نشان">ماه نشان</option>
                                    <option value="زرین آباد">زرین آباد</option>
                                </select>
                                <select class="city26" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="وردنجان">وردنجان</option>
                                    <option value="گوجان">گوجان</option>
                                    <option value="گهرو">گهرو</option>
                                    <option value="سورشجان">سورشجان</option>
                                    <option value="سرخون">سرخون</option>
                                    <option value="شهرکرد">شهرکرد</option>
                                    <option value="منج">منج</option>
                                    <option value="بروجن">بروجن</option>
                                    <option value="پردنجان">پردنجان</option>
                                    <option value="سامان">سامان</option>
                                    <option value="فرخ شهر">فرخ شهر</option>
                                    <option value="صمصامی">صمصامی</option>
                                    <option value="طاقانک">طاقانک</option>
                                    <option value="کاج">کاج</option>
                                    <option value="نقنه">نقنه</option>
                                    <option value="لردگان">لردگان</option>
                                    <option value="باباحیدر">باباحیدر</option>
                                    <option value="دستنا">دستنا</option>
                                    <option value="سودجان">سودجان</option>
                                    <option value="بازفت">بازفت</option>
                                    <option value="هفشجان">هفشجان</option>
                                    <option value="سردشت">سردشت</option>
                                    <option value="فرادبنه">فرادبنه</option>
                                    <option value="چلیچه">چلیچه</option>
                                    <option value="بن">بن</option>
                                    <option value="فارسان">فارسان</option>
                                    <option value="شلمزار">شلمزار</option>
                                    <option value="نافچ">نافچ</option>
                                    <option value="دشتک">دشتک</option>
                                    <option value="بلداجی">بلداجی</option>
                                    <option value="آلونی">آلونی</option>
                                    <option value="گندمان">گندمان</option>
                                    <option value="جونقان">جونقان</option>
                                    <option value="ناغان">ناغان</option>
                                    <option value="هارونی">هارونی</option>
                                    <option value="چلگرد">چلگرد</option>
                                    <option value="کیان">کیان</option>
                                    <option value="اردل">اردل</option>
                                    <option value="سفیددشت">سفیددشت</option>
                                    <option value="مال خلیفه">مال خلیفه</option>
                                </select>
                                <select class="city27" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="چناران شهر">چناران شهر</option>
                                    <option value="راز">راز</option>
                                    <option value="پیش قلعه">پیش قلعه</option>
                                    <option value="قوشخانه">قوشخانه</option>
                                    <option value="شوقان">شوقان</option>
                                    <option value="اسفراین">اسفراین</option>
                                    <option value="گرمه">گرمه</option>
                                    <option value="قاضی">قاضی</option>
                                    <option value="شیروان">شیروان</option>
                                    <option value="حصارگرمخان">حصارگرمخان</option>
                                    <option value="آشخانه">آشخانه</option>
                                    <option value="تیتکانلو">تیتکانلو</option>
                                    <option value="جاجرم">جاجرم</option>
                                    <option value="بجنورد">بجنورد</option>
                                    <option value="درق">درق</option>
                                    <option value="آوا">آوا</option>
                                    <option value="زیارت">زیارت</option>
                                    <option value="سنخواست">سنخواست</option>
                                    <option value="صفی آباد">صفی آباد</option>
                                    <option value="ایور">ایور</option>
                                    <option value="فاروج">فاروج</option>
                                    <option value="لوجلی">لوجلی</option>
                                </select>
                                <select class="city28" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="اسلامیه">اسلامیه</option>
                                    <option value="شوسف">شوسف</option>
                                    <option value="قاین">قاین</option>
                                    <option value="عشق آباد">عشق آباد</option>
                                    <option value="طبس مسینا">طبس مسینا</option>
                                    <option value="ارسک">ارسک</option>
                                    <option value="آیسک">آیسک</option>
                                    <option value="نیمبلوک">نیمبلوک</option>
                                    <option value="دیهوک">دیهوک</option>
                                    <option value="سربیشه">سربیشه</option>
                                    <option value="محمدشهر">محمدشهر</option>
                                    <option value="بیرجند">بیرجند</option>
                                    <option value="فردوس">فردوس</option>
                                    <option value="نهبندان">نهبندان</option>
                                    <option value="اسفدن">اسفدن</option>
                                    <option value="گزیک">گزیک</option>
                                    <option value="حاجی آباد">حاجی آباد</option>
                                    <option value="سه قلعه">سه قلعه</option>
                                    <option value="آرین شهر">آرین شهر</option>
                                    <option value="مود">مود</option>
                                    <option value="خوسف">خوسف</option>
                                    <option value="قهستان">قهستان</option>
                                    <option value="بشرویه">بشرویه</option>
                                    <option value="سرایان">سرایان</option>
                                    <option value="خضری دشت بیاض">خضری دشت بیاض</option>
                                    <option value="طبس">طبس</option>
                                    <option value="اسدیه">اسدیه</option>
                                    <option value="زهان">زهان</option>
                                </select>
                                <select class="city29" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="گراب سفلی">گراب سفلی</option>
                                    <option value="لنده">لنده</option>
                                    <option value="سی سخت">سی سخت</option>
                                    <option value="دهدشت">دهدشت</option>
                                    <option value="یاسوج">یاسوج</option>
                                    <option value="سرفاریاب">سرفاریاب</option>
                                    <option value="دوگنبدان">دوگنبدان</option>
                                    <option value="چیتاب">چیتاب</option>
                                    <option value="لیکک">لیکک</option>
                                    <option value="دیشموک">دیشموک</option>
                                    <option value="مادوان">مادوان</option>
                                    <option value="باشت">باشت</option>
                                    <option value="پاتاوه">پاتاوه</option>
                                    <option value="قلعه رییسی">قلعه رییسی</option>
                                    <option value="مارگون">مارگون</option>
                                    <option value="چرام">چرام</option>
                                    <option value="سوق">سوق</option>
                                </select>
                                <select class="city30" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="ایوانکی">ایوانکی</option>
                                    <option value="مجن">مجن</option>
                                    <option value="دامغان">دامغان</option>
                                    <option value="سرخه">سرخه</option>
                                    <option value="مهدی شهر">مهدی شهر</option>
                                    <option value="شاهرود">شاهرود</option>
                                    <option value="سمنان">سمنان</option>
                                    <option value="کهن آباد">کهن آباد</option>
                                    <option value="گرمسار">گرمسار</option>
                                    <option value="کلاته خیج">کلاته خیج</option>
                                    <option value="دیباج">دیباج</option>
                                    <option value="درجزین">درجزین</option>
                                    <option value="رودیان">رودیان</option>
                                    <option value="بسطام">بسطام</option>
                                    <option value="امیریه">امیریه</option>
                                    <option value="میامی">میامی</option>
                                    <option value="شهمیرزاد">شهمیرزاد</option>
                                    <option value="بیارجمند">بیارجمند</option>
                                    <option value="کلاته">کلاته</option>
                                    <option value="آرادان">آرادان</option>
                                </select>
                                <select class="city31" name="city" id="city">
                                    <option value="">همه شهر ها</option>
                                    <option value="آبدانان">آبدانان</option>
                                    <option value="شباب">شباب</option>
                                    <option value="موسیان">موسیان</option>
                                    <option value="بدره">بدره</option>
                                    <option value="ایلام">ایلام</option>
                                    <option value="ایوان">ایوان</option>
                                    <option value="مهران">مهران</option>
                                    <option value="آسمان آباد">آسمان آباد</option>
                                    <option value="پهله">پهله</option>
                                    <option value="مهر">مهر</option>
                                    <option value="سراب باغ">سراب باغ</option>
                                    <option value="بلاوه">بلاوه</option>
                                    <option value="میمه">میمه</option>
                                    <option value="دره شهر">دره شهر</option>
                                    <option value="ارکواز">ارکواز</option>
                                    <option value="مورموری">مورموری</option>
                                    <option value="توحید">توحید</option>
                                    <option value="دهلران">دهلران</option>
                                    <option value="لومار">لومار</option>
                                    <option value="چوار">چوار</option>
                                    <option value="زرنه">زرنه</option>
                                    <option value="صالح آباد">صالح آباد</option>
                                    <option value="سرابله">سرابله</option>
                                    <option value="ماژین">ماژین</option>
                                    <option value="دلگشا">دلگشا</option>
                                </select>
                                <div id="validation-city"></div>
                            </div>
                        </div>
                        <div class="bottomAddress">
                            <button id="btnFilterCity">فیلتر شهر</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <nav class="headerBot width">
            <ul class="headerList">
                @if(auth()->user())
                    @if(auth()->user()->admin == 1)
                        <li>
                            <a href="/admin">{{__('messages.header_dashboard')}}</a>
                        </li>
                    @endif
                @endif
                @foreach($catHeader as $lists)
                    <li>
                        <a href="/category/{{$lists->slug}}" name="{{$lists->name}}" title="{{$lists->name}}">
                            {{$lists->name}}
                            @if(count($lists->cats) >= 1)
                                <i>
                                    <svg class="icon">
                                        <use xlink:href="#down"></use>
                                    </svg>
                                </i>
                            @endif
                        </a>
                        @if(count($lists->cats) >= 1)
                            <div class="divListContainer">
                                <div class="divListsContainer">
                                    <div class="listsContainer">
                                        @foreach($lists->cats as $item)
                                            <a class="active" href="/category/{{$item->slug}}" name="{{$item->name}}" title="{{$item->name}}">
                                                {{$item->name}}
                                                <i>
                                                    <svg class="icon">
                                                        <use xlink:href="#left"></use>
                                                    </svg>
                                                </i>
                                            </a>
                                            @foreach($item->cats as $value)
                                                <a href="/category/{{$value->slug}}" name="{{$value->name}}" title="{{$value->name}}">{{$value->name}}</a>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </li>
                @endforeach
                @if(\App\Models\Link::where('parent_id',0)->where('type',0)->where('language', request()->cookie('language') ?? 'fa')->whereHas('children')->count() >= 1)
                    @foreach(\App\Models\Link::where('parent_id',0)->where('type',0)->where('language', request()->cookie('language') ?? 'fa')->whereHas('children')->get() as $lists)
                        <li>
                            <a href="{{$lists->slug}}" name="{{$lists->name}}" title="{{$lists->name}}">
                                {{$lists->name}}
                                @if(\App\Models\Link::where('parent_id',$lists->id)->where('language', request()->cookie('language') ?? 'fa')->count() >= 1)
                                    <i>
                                        <svg class="icon">
                                            <use xlink:href="#down"></use>
                                        </svg>
                                    </i>
                                @endif
                            </a>
                            <div class="divListContainer">
                                <div class="divListsContainer">
                                    <div class="listsContainer">
                                        @foreach(\App\Models\Link::where('parent_id',$lists->id)->where('language', request()->cookie('language') ?? 'fa')->get() as $item)
                                            <a class="active" href="{{$item->slug}}" name="{{$item->name}}" title="{{$item->name}}">
                                                {{$item->name}}
                                                <i>
                                                    <svg class="icon">
                                                        <use xlink:href="#left"></use>
                                                    </svg>
                                                </i>
                                            </a>
                                            @foreach(\App\Models\Link::where('parent_id',$item->id)->where('language', request()->cookie('language') ?? 'fa')->get() as $value)
                                                <a href="{{$value->slug}}" name="{{$value->name}}" title="{{$value->name}}">{{$value->name}}</a>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
                @foreach(\App\Models\Link::where('parent_id',0)->where('type',0)->where('language', request()->cookie('language') ?? 'fa')->doesntHave('children')->get() as $lists)
                    <li class="linkHead">
                        <a href="{{$lists->slug}}" name="{{$lists->name}}" title="{{$lists->name}}">
                            {{$lists->name}}
                        </a>
                        @if($lists->tooltip)
                            <div class="tooltip">{{$lists->tooltip}}</div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>

<script>
    $(document).ready(function (){
        var themes = {!! json_encode($theme, JSON_HEX_TAG) !!};
        var stateContainer = {!! json_encode($stateContainer, JSON_HEX_TAG) !!};
        var arz1 = {!! json_encode(__('messages.arz'), JSON_HEX_TAG) !!};
        $.cookie('theme' , themes , { path: '/' });
        $('#showUser').hide();
        $('.searchData').hide();
        $('#userPic').click(function (){
            $('#showUser').toggle(50);
            $('.showCart').hide();
        })
        $(".allFilterCity select[name='state']").val(stateContainer[0]);
        $(".allFilterCity select[name='city']").val(stateContainer[1]);
        if($(".allFilterCity select[name='state']").val() != ''){
            $(".allFilterCity #cityContainer").show();
            var cityText = stateContainer[1] ? ' - ' +  stateContainer[1] : ' - همه شهر ها';
            $(".cityChoice .leftCity h5").text(stateContainer[0] + cityText);
            $(".cityChoice .leftCity h4").remove();
            $(".cityChoice").css('padding','.5rem');
            if($(".allFilterCity select[name='state']").val() == 'تهران'){
                $('.allFilterCity .city1').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'خراسان رضوی'){
                $('.allFilterCity .city2').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'اصفهان'){
                $('.allFilterCity .city3').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'فارس'){
                $('.allFilterCity .city4').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'خوزستان'){
                $('.allFilterCity .city5').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'آذربایجان شرقی'){
                $('.allFilterCity .city6').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'مازندران'){
                $('.allFilterCity .city7').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'آذربایجان غربی'){
                $('.allFilterCity .city8').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'کرمان'){
                $('.allFilterCity .city9').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'سیستان و بلوچستان'){
                $('.allFilterCity .city10').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'البرز'){
                $('.allFilterCity .city11').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'گیلان'){
                $('.allFilterCity .city12').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'کرمانشاه'){
                $('.allFilterCity .city13').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'گلستان'){
                $('.allFilterCity .city14').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'هرمزگان'){
                $('.allFilterCity .city15').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'لرستان'){
                $('.allFilterCity .city16').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'همدان'){
                $('.allFilterCity .city17').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'کردستان'){
                $('.allFilterCity .city18').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'مرکزی'){
                $('.allFilterCity .city19').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'قم'){
                $('.allFilterCity .city20').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'قزوین'){
                $('.allFilterCity .city21').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'اردبیل'){
                $('.allFilterCity .city22').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'بوشهر'){
                $('.allFilterCity .city23').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'یزد'){
                $('.allFilterCity .city24').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'زنجان'){
                $('.allFilterCity .city25').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'چهارمحال و بختیاری'){
                $('.allFilterCity .city26').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'خراسان شمالی'){
                $('.allFilterCity .city27').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'خراسان جنوبی'){
                $('.allFilterCity .city28').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'کهگیلویه و بویراحمد'){
                $('.allFilterCity .city29').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'سمنان'){
                $('.allFilterCity .city30').show();
            }
            if($(".allFilterCity select[name='state']").val() == 'ایلام'){
                $('.allFilterCity .city31').show();
            }
        }
        $('.allFilterCity #btnCloseAddress').click(function (){
            $('.allFilterCity').hide();
            $('.filterCity').hide();
        })
        $('.allFilterCity #btnFilterCity').click(function (){
            var state = $(".allFilterCity select[name='state']").val();
            if($(".allFilterCity select[name='state']").val() == 'تهران'){
                var city = $('.allFilterCity .city1').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'خراسان رضوی'){
                var city = $('.allFilterCity .city2').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'اصفهان'){
                var city = $('.allFilterCity .city3').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'فارس'){
                var city = $('.allFilterCity .city4').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'خوزستان'){
                var city = $('.allFilterCity .city5').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'آذربایجان شرقی'){
                var city = $('.allFilterCity .city6').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'مازندران'){
                var city = $('.allFilterCity .city7').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'آذربایجان غربی'){
                var city = $('.allFilterCity .city8').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'کرمان'){
                var city = $('.allFilterCity .city9').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'سیستان و بلوچستان'){
                var city = $('.allFilterCity .city10').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'البرز'){
                var city = $('.allFilterCity .city11').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'گیلان'){
                var city = $('.allFilterCity .city12').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'کرمانشاه'){
                var city = $('.allFilterCity .city13').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'گلستان'){
                var city = $('.allFilterCity .city14').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'هرمزگان'){
                var city = $('.allFilterCity .city15').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'لرستان'){
                var city = $('.allFilterCity .city16').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'همدان'){
                var city = $('.allFilterCity .city17').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'کردستان'){
                var city = $('.allFilterCity .city18').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'مرکزی'){
                var city = $('.allFilterCity .city19').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'قم'){
                var city = $('.allFilterCity .city20').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'قزوین'){
                var city = $('.allFilterCity .city21').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'اردبیل'){
                var city = $('.allFilterCity .city22').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'بوشهر'){
                var city = $('.allFilterCity .city23').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'یزد'){
                var city = $('.allFilterCity .city24').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'زنجان'){
                var city = $('.allFilterCity .city25').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'چهارمحال و بختیاری'){
                var city = $('.allFilterCity .city26').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'خراسان شمالی'){
                var city = $('.allFilterCity .city27').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'خراسان جنوبی'){
                var city = $('.allFilterCity .city28').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'کهگیلویه و بویراحمد'){
                var city = $('.allFilterCity .city29').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'سمنان'){
                var city = $('.allFilterCity .city30').val();
            }
            if($(".allFilterCity select[name='state']").val() == 'ایلام'){
                var city = $('.allFilterCity .city31').val();
            }
            var cityText = city?'&city='+city:'';
            window.location.href= '?state='+state + cityText;
        })
        $(".allFilterCity select[name='state']").on('change' , function(e){
            $(".allFilterCity select[name='city']").hide();
            $(".allFilterCity #cityContainer").show();
            if(this.value == 'تهران'){
                $('.allFilterCity .city1').show();
            }
            if(this.value == 'خراسان رضوی'){
                $('.allFilterCity .city2').show();
            }
            if(this.value == 'اصفهان'){
                $('.allFilterCity .city3').show();
            }
            if(this.value == 'فارس'){
                $('.allFilterCity .city4').show();
            }
            if(this.value == 'خوزستان'){
                $('.allFilterCity .city5').show();
            }
            if(this.value == 'آذربایجان شرقی'){
                $('.allFilterCity .city6').show();
            }
            if(this.value == 'مازندران'){
                $('.allFilterCity .city7').show();
            }
            if(this.value == 'آذربایجان غربی'){
                $('.allFilterCity .city8').show();
            }
            if(this.value == 'کرمان'){
                $('.allFilterCity .city9').show();
            }
            if(this.value == 'سیستان و بلوچستان'){
                $('.allFilterCity .city10').show();
            }
            if(this.value == 'البرز'){
                $('.allFilterCity .city11').show();
            }
            if(this.value == 'گیلان'){
                $('.allFilterCity .city12').show();
            }
            if(this.value == 'کرمانشاه'){
                $('.allFilterCity .city13').show();
            }
            if(this.value == 'گلستان'){
                $('.allFilterCity .city14').show();
            }
            if(this.value == 'هرمزگان'){
                $('.allFilterCity .city15').show();
            }
            if(this.value == 'لرستان'){
                $('.allFilterCity .city16').show();
            }
            if(this.value == 'همدان'){
                $('.allFilterCity .city17').show();
            }
            if(this.value == 'کردستان'){
                $('.allFilterCity .city18').show();
            }
            if(this.value == 'مرکزی'){
                $('.allFilterCity .city19').show();
            }
            if(this.value == 'قم'){
                $('.allFilterCity .city20').show();
            }
            if(this.value == 'قزوین'){
                $('.allFilterCity .city21').show();
            }
            if(this.value == 'اردبیل'){
                $('.allFilterCity .city22').show();
            }
            if(this.value == 'بوشهر'){
                $('.allFilterCity .city23').show();
            }
            if(this.value == 'یزد'){
                $('.allFilterCity .city24').show();
            }
            if(this.value == 'زنجان'){
                $('.allFilterCity .city25').show();
            }
            if(this.value == 'چهارمحال و بختیاری'){
                $('.allFilterCity .city26').show();
            }
            if(this.value == 'خراسان شمالی'){
                $('.allFilterCity .city27').show();
            }
            if(this.value == 'خراسان جنوبی'){
                $('.allFilterCity .city28').show();
            }
            if(this.value == 'کهگیلویه و بویراحمد'){
                $('.allFilterCity .city29').show();
            }
            if(this.value == 'سمنان'){
                $('.allFilterCity .city30').show();
            }
            if(this.value == 'ایلام'){
                $('.allFilterCity .city31').show();
            }
        });
        $('.cityChoice').click(function (){
            $('.allFilterCity').show();
            $('.filterCity').show(200);
        })
        $('.cartShowBtn').click(function(){
            $('#showUser').hide();
            $('.showCart').toggle(300);
        })
        $('.resSearch,#btnSearchClose').click(function(){
            $('.searchData').toggle();
        })
        $('.allCats li').on('click' ,function(){
            $($(this).children()[1]).toggle();
        })
        $('.categoryHeaderResponsive #btnShowMenu').on('click' ,function(){
            $('.categoryHeaderResponsive').toggle();
        })
        $('.resAlign').on('click' ,function(){
            $('.categoryHeaderResponsive').toggle();
        })
        var typingTimer;
        var doneTypingInterval = 500;
        var $input = $('.headerTop .block #searching');
        $input.on('keyup', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });
        $input.on('keydown', function () {
            clearTimeout(typingTimer);
        });
        function doneTyping () {
            $('.headerTop .block form ul').remove();
            if($(".headerTop .block input[name='search']").val().length >= 1){
                $('.headerTop .block .searchLoad').show();
                var form = {
                    "_token": "{{ csrf_token() }}",
                    'search' : $(".headerTop .block input[name='search']").val(),
                    'categorySearch' : $(".headerTop .block select[name='categorySearch']").val()
                };
                $.ajax({
                    url: "/search",
                    type: "post",
                    data: form,
                    success: function (data) {
                        $('.headerTop .block .searchLoad').hide();
                        $('.headerTop .block form').append(
                            '<ul></ul>'
                        );
                        $.each(data,function(){
                            $('.headerTop .block form ul').append(
                                '<li>'+
                                    '<a href="/product/'+this.slug+'">'+
                                    '<div class="pic">'+
                                    '<img src="'+JSON.parse(this.image)[0]+'" alt="'+this.title+'">'+
                                    '</div>'+
                                    '<div class="subject">'+
                                    '<h3>'+this.title+'</h3>'+
                                    '<h5>'+this.product_id+'</h5>'+
                                    '</div>'+
                                    '<div class="price">'+makePrice(this.price)+ arz1 +'  </div>'+
                                    '</a>'+
                                '</li>'
                            );
                        })
                    },
                });
            }
        }
        function makePrice(price){
            price += '';
            x = price.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            finalPrice = x1 + x2;
            return finalPrice;
        }
        $('.js-theme-toggle').on('click' , function(){
            theme.value = theme.value === 'light'
                ? 'dark'
                : 'light'
            if(theme.value == 'dark'){
                $.cookie('theme' , true , { path: '/' });
                $('head').append('<link rel="stylesheet" href="/css/dark-home.css?v=11" type="text/css" />');
                var greenColor = {!! json_encode(\App\Models\Setting::where('key' , 'greenColorDark')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var redColor = {!! json_encode(\App\Models\Setting::where('key' , 'redColorDark')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var backColor1 = {!! json_encode(\App\Models\Setting::where('key' , 'backColorDark1')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var headerColor = {!! json_encode(\App\Models\Setting::where('key' , 'headerColorDark')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var headerColor2 = {!! json_encode(\App\Models\Setting::where('key' , 'headerColor2Dark')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var widgetColor = {!! json_encode(\App\Models\Setting::where('key' , 'widgetColorDark')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var singleColor = {!! json_encode(\App\Models\Setting::where('key' , 'singleColorDark')->pluck('value')->first(), JSON_HEX_TAG) !!};
                document.documentElement.style.setProperty('--green-color', greenColor);
                document.documentElement.style.setProperty('--red-color', redColor);
                document.documentElement.style.setProperty('--header-color', headerColor);
                document.documentElement.style.setProperty('--header2-color', headerColor2);
                document.documentElement.style.setProperty('--widget-color', widgetColor);
                document.documentElement.style.setProperty('--single-color', singleColor);
                document.documentElement.style.setProperty('--back4-color', backColor1);
            }else{
                $.cookie('theme' , false , { path: '/' });
                $('head').append('<link rel="stylesheet" href="/css/home.css?v=11" type="text/css" />');
                var greenColor = {!! json_encode(\App\Models\Setting::where('key' , 'greenColorLight')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var redColor = {!! json_encode(\App\Models\Setting::where('key' , 'redColorLight')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var backColor1 = {!! json_encode(\App\Models\Setting::where('key' , 'backColorLight1')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var headerColor = {!! json_encode(\App\Models\Setting::where('key' , 'headerColorLight')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var headerColor2 = {!! json_encode(\App\Models\Setting::where('key' , 'headerColor2Light')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var widgetColor = {!! json_encode(\App\Models\Setting::where('key' , 'widgetColorLight')->pluck('value')->first(), JSON_HEX_TAG) !!};
                var singleColor = {!! json_encode(\App\Models\Setting::where('key' , 'singleColorLight')->pluck('value')->first(), JSON_HEX_TAG) !!};
                document.documentElement.style.setProperty('--green-color', greenColor);
                document.documentElement.style.setProperty('--red-color', redColor);
                document.documentElement.style.setProperty('--header-color', headerColor);
                document.documentElement.style.setProperty('--header2-color', headerColor2);
                document.documentElement.style.setProperty('--widget-color', widgetColor);
                document.documentElement.style.setProperty('--single-color', singleColor);
                document.documentElement.style.setProperty('--back4-color', backColor1);
            }
            setPreference()
        })
        var gg = $("body").height();
        var st = $("body").scrollTop();
        $.each($(".allIndex .indexData"),function (){
            if (st + gg  + 100 >= $(this).offset().top && $(this).attr('id') != 'done') {
                $(this).attr('id','done');
                $(this).animate({"opacity":"1","margin-top":"2rem"},500);
            }
        })

        const getColorPreference = () => {
            return themes == 1 ? 'dark' : 'light'
        }

        const setPreference = () => {
            reflectPreference()
        }

        const reflectPreference = () => {
            if(theme.value == 'dark'){
                $('.js-theme-toggle svg').remove();
                $('.js-theme-toggle').append(
                    $('<svg class="dark" style="width:2rem;height:2rem"><use xlink:href="#moon"></use></svg>')
                )
            }else{
                $('.js-theme-toggle svg').remove();
                $('.js-theme-toggle').append(
                    $('<svg class="light" style="width:2rem;height:2rem"><use xlink:href="#sun"></use></svg>')
                )
            }
            document.firstElementChild
                .setAttribute('color-scheme', theme.value)

            document
                .querySelector('.js-theme-toggle')
                ?.setAttribute('aria-label', theme.value)
        }

        const theme = {
            value: getColorPreference(),
        }
        reflectPreference()

        window.onload = () => {
            reflectPreference()
        }
        window
            .addEventListener('change', ({matches:isDark}) => {
                theme.value = isDark ? 'dark' : 'light'
                setPreference()
            })
    })
    var lastScrollTop = 0;
    var dd = 0;
    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        var gg = $(this).height();
        if(st >= 200){
            $(".allHeaderIndex .headerFix").css({"top": "0","position": "fixed","right": "0","left": "0","z-index": "100"});
            $("main").css({"padding-top": "7rem"});
            if (st > lastScrollTop){
                if(dd == 0){
                    $(".allHeaderIndex .headerFix .headerBot").animate({"margin-top": "-4rem"},300);
                }
                dd = 1;
            }else{
                if(dd == 1) {
                    $(".allHeaderIndex .headerFix .headerBot").animate({"margin-top": "0"}, 300);
                }
                dd = 0;
            }
        }else{
            $(".allHeaderIndex .headerFix").css({"position": "relative"});
            $("main").css({"padding-top": "0"});
        }
        lastScrollTop = st;
        $.each($(".allIndex .indexData"),function (){
            if (st + gg >= $(this).offset().top && $(this).attr('id') != 'done') {
                $(this).attr('id','done');
                $(this).animate({"opacity":"1","margin-top":"2"},500);
            }
        })
    });
</script>
