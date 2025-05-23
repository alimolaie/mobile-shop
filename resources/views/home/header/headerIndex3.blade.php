<header class="allHeader">
    <div class="allHeaderHome" style="background-image: url({{\App\Models\Setting::where('key' , 'backIndex')->pluck('value')->first()}})">
        <div class="block width">
            <div class="topHeader">
                <a href="/" class="pic">
                    <img src="{{\App\Models\Setting::where('key' , 'logo')->pluck('value')->first()}}" alt="{{\App\Models\Setting::where('key' , 'name')->pluck('value')->first()}}">
                </a>
                <div class="left">
                    <div class="themeButton1">
                        <button class="theme-toggle  js-theme-toggle"
                                aria-label="auto"
                                aria-live="polite">
                            <svg>
                                <use xlink:href="#sun"></use>
                            </svg>
                        </button>
                    </div>
                    @if(auth()->user())
                        <div class="user">
                            <div class="pic">
                                <img src="/img/user.png" alt="{{auth()->user()->name}}">
                            </div>
                            <ul style="display:none;">
                                <li>
                                    <div class="picUser">
                                        <img src="/img/user.png" alt="{{auth()->user()->name}}">
                                    </div>
                                    <div class="infoUser">
                                        <span>{{auth()->user()->name}}</span>
                                        <span>{{auth()->user()->created_at}}</span>
                                    </div>
                                </li>
                                <li>
                                    <a href="/profile">
                                        <i>
                                            <svg class="icon">
                                                <use xlink:href="#home2"></use>
                                            </svg>
                                        </i>
                                        مدیریت حساب
                                    </a>
                                </li>
                                <li>
                                    <a href="/profile/pay">
                                        <i>
                                            <svg class="icon">
                                                <use xlink:href="#pay"></use>
                                            </svg>
                                        </i>
                                        سفارشات
                                    </a>
                                </li>
                                <li>
                                    <a href="/logout">
                                        <i>
                                            <svg class="icon">
                                                <use xlink:href="#exit"></use>
                                            </svg>
                                        </i>
                                        خروج
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="/login" class="loginTopHeader" title="ورود / ثبت نام">
                            ورود / ثبت نام
                        </a>
                    @endif
                    <div class="alert">
                        <i class="alertIcon">
                            <svg class="icon">
                                <use xlink:href="#bell2"></use>
                            </svg>
                        </i>
                        <div class="alerts">
                            <div class="titleAlert">عضویت در خبرنامه</div>
                            <div class="send">
                                <input type="text" name="subscribe" placeholder="ایمیل را وارد کنید ...">
                                <button>عضویت</button>
                            </div>
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
                            <p>
                                پشتیبانی :  {{\App\Models\Setting::where('key' , 'number')->pluck('value')->first()}}
                            </p>
                        </div>
                    </div>
                    <a href="/cart" class="alert2">
                        <i class="alertIcon">
                            <svg class="icon">
                                <use xlink:href="#cart"></use>
                            </svg>
                        </i>
                        <div class="cartShowBtn">
                            <div class="cartCount">0</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="topHeaderRes">
                <div class="justify">
                    <svg class="icon">
                        <use xlink:href="#align"></use>
                    </svg>
                </div>
                <a href="/" class="pic">
                    <img src="{{\App\Models\Setting::where('key' , 'logo')->pluck('value')->first()}}" alt="{{\App\Models\Setting::where('key' , 'name')->pluck('value')->first()}}">
                </a>
                <div class="left">
                    <div class="leftItems">
                        @if(auth()->user())
                            <div class="user">
                                <div class="pic">
                                    <img src="/img/user.png" alt="{{auth()->user()->name}}">
                                </div>
                                <ul style="display:none;">
                                    <li>
                                        <div class="picUser">
                                            <img src="/img/user.png" alt="{{auth()->user()->name}}">
                                        </div>
                                        <div class="infoUser">
                                            <span>{{auth()->user()->name}}</span>
                                            <span>{{auth()->user()->created_at}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="/profile">
                                            <i>
                                                <svg class="icon">
                                                    <use xlink:href="#home2"></use>
                                                </svg>
                                            </i>
                                            مدیریت حساب
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profile/pay">
                                            <i>
                                                <svg class="icon">
                                                    <use xlink:href="#pay"></use>
                                                </svg>
                                            </i>
                                            سفارشات
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/logout">
                                            <i>
                                                <svg class="icon">
                                                    <use xlink:href="#exit"></use>
                                                </svg>
                                            </i>
                                            خروج
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="/login" class="loginTopHeader" title="ورود / ثبت نام">
                                <span>ورود / ثبت نام</span>
                            </a>
                        @endif
                    </div>
                    <a href="/cart" class="alert2">
                        <i class="alertIcon">
                            <svg class="icon">
                                <use xlink:href="#cart"></use>
                            </svg>
                        </i>
                        <div class="cartShowBtn">
                            <div class="cartCount">0</div>
                        </div>
                    </a>
                </div>
            </div>
            <form class="headerHomeContentSearch" action="/search" method="GET">
                <label>
                    <input type="text" name="search" id="searching" placeholder="جستجو...">
                </label>
                <div class="searchLists">
                    <div class="searchList"></div>
                </div>
            </form>
            <div class="headerLink">
                <div class="more">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#more"></use>
                        </svg>
                    </i>
                    <span>مشاهده همه</span>
                </div>
                <ul>
                    @foreach($catHeader as $item)
                        <li>
                            <a href="{{$item->type == 0 ? '/category/':'/blog/category/'}}{{$item->slug}}" title="{{$item->name}}">
                                <div class="pic">
                                    <img lazy="loading" class="lazyload" src="/img/404Image.png" data-src="{{$item->image}}" alt="{{$item->name}}">
                                </div>
                                {{$item->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <p>{{\App\Models\Setting::where('key' , 'headerText')->pluck('value')->first()}}</p>
        </div>
        <div class="moreSites">
            <div class="moreItems">
                <ul>
                    @foreach($catHeader as $item)
                        <li>
                            <a href="{{$item->type == 0 ? '/category/':'/blog/category/'}}{{$item->slug}}" title="{{$item->name}}">
                                <div class="pic">
                                    <img lazy="loading" class="lazyload" src="/img/404Image.png" data-src="{{$item->image}}" alt="{{$item->name}}">
                                </div>
                                <a href="{{$item->slug}}" target="_blank" title="{{$item->name}}">{{$item->name}}</a>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="allHeaderHomeContentBotCats" style="display:none;">
            <ul>
                <li>
                    <div class="pic">
                        <a href="">
                            <img src="{{\App\Models\Setting::where('key' , 'logo')->pluck('value')->first()}}" alt="{{\App\Models\Setting::where('key' , 'name')->pluck('value')->first()}}">
                        </a>
                    </div>
                    <i class="closeSidebar">
                        <svg class="icon">
                            <use xlink:href="#cancel"></use>
                        </svg>
                    </i>
                </li>
                <li>
                    <div class="titleCat">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#page"></use>
                            </svg>
                        </i>
                        <span>دسترسی سریع</span>
                    </div>
                </li>
                @foreach(\App\Models\Link::orderBy('number')->where('type',0)->get() as $data)
                    <li>
                        <a href="{{$data->slug}}" title="{{$data->name}}">
                            {{$data->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="topLink">
        <div class="width">
            <i>
                <svg class="icon">
                    <use xlink:href="#grid2"></use>
                </svg>
            </i>
            <ul>
                @if(auth()->user())
                    @if(auth()->user()->admin == 1)
                        <li>
                            <a href="/admin">داشبورد پنل مدیریت</a>
                        </li>
                    @endif
                @endif
                <li>
                    <a href="/">خانه</a>
                </li>
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
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</header>

<script>
    $(document).mouseup(function(e)
    {
        var userUl = $(".user");
        var container = $(".alert");
        var moreSites = $(".moreSites");
        if (container.is(e.target) == false && container.has(e.target).length === 0)
        {
            $('.alert .alerts').hide();
        }
        if (userUl.is(e.target) == false && userUl.has(e.target).length === 0)
        {
            $('.user ul').hide();
        }
        if (moreSites.is(e.target) && moreSites.has(e.target).length === 0)
        {
            $('.moreSites').hide();
        }
    });
    $(document).ready(function (){
        var themes = {!! json_encode($theme, JSON_HEX_TAG) !!};
        $(".allSingleIndex").css({'margin-top' : '0'})
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        $('.headerLink .more').click(function (){
            $('.moreSites').toggle();
        })
        $('.topHeaderRes .justify').click(function (){
            $('.allHeaderHomeContentBotCats').toggle();
        })
        $('.allHeaderHomeContentBotCats .closeSidebar').click(function (){
            $('.allHeaderHomeContentBotCats').toggle();
        })
        $('.alert button').click(function(){
            var name = $(".alert input[name='subscribe']").val();
            if(isEmail(name)){
                var form = {
                    "_token": "{{ csrf_token() }}",
                    email:name,
                };
                $.ajax({
                    url: "/send-sub",
                    type: "post",
                    data: form,
                    success: function (data) {
                        if(data == 'ok'){
                            $.toast({
                                text: "ایمیل شما ثبت شد", // Text that is to be shown in the toast
                                heading: 'موفقیت آمیز', // Optional heading to be shown on the toast
                                icon: 'success', // Type of toast icon
                                showHideTransition: 'fade', // fade, slide or plain
                                allowToastClose: true, // Boolean value true or false
                                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                textAlign: 'left',  // Text alignment i.e. left, right or center
                                loader: true,  // Whether to show loader or not. True by default
                                loaderBg: '#9EC600',  // Background color of the toast loader
                            });
                            $(".alert input[name='subscribe']").val('');
                        }else{
                            $.toast({
                                text: "ایمیل قبلا ثبت شده بود", // Text that is to be shown in the toast
                                heading: 'دقت کنید', // Optional heading to be shown on the toast
                                icon: 'error', // Type of toast icon
                                showHideTransition: 'fade', // fade, slide or plain
                                allowToastClose: true, // Boolean value true or false
                                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                textAlign: 'left',
                                loader: true,
                                loaderBg: '#c60000',
                            });
                        }
                    },
                });
            }else{
                $.toast({
                    text: "ایمیل اشتباه است", // Text that is to be shown in the toast
                    heading: 'دقت کنید', // Optional heading to be shown on the toast
                    icon: 'error', // Type of toast icon
                    showHideTransition: 'fade', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    textAlign: 'left',
                    loader: true,
                    loaderBg: '#c60000',
                });
            }
        })
        $('.alert i').click(function (){
            $('.alert .alerts').toggle();
        })
        $('.user .pic').click(function (){
            $('.user ul').toggle();
        })
        $('.js-theme-toggle').on('click' , function(){
            theme.value = theme.value === 'light'
                ? 'dark'
                : 'light'
            if(theme.value == 'dark'){
                $.cookie('theme' , true , { path: '/' });
                $('head').append('<link rel="stylesheet" href="/css/dark-home.css?v=1c1" type="text/css" />');
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
                $('head').append('<link rel="stylesheet" href="/css/home.css?v=11as" type="text/css" />');
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

        var typingTimer;
        var doneTypingInterval = 500;
        var $input = $('.headerHomeContentSearch #searching');
        $input.on('keyup', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });
        $input.on('keydown', function () {
            clearTimeout(typingTimer);
        });
        function doneTyping () {
            $('.headerHomeContentSearch .searchLists .searchList').remove();
            if($(".headerHomeContentSearch input[name='search']").val().length >= 1){
                $('.headerHomeContentSearch .searchLoad').show();
                var form = {
                    "_token": "{{ csrf_token() }}",
                    'search' : $(".headerHomeContentSearch input[name='search']").val(),
                };
                $.ajax({
                    url: "/search",
                    type: "post",
                    data: form,
                    success: function (data) {
                        $('.headerHomeContentSearch .searchLoad').hide();
                        $('.headerHomeContentSearch form').append(
                            '<ul></ul>'
                        );
                        $.each(data,function(){
                            $('.headerHomeContentSearch .searchLists').append(
                                '<div class="searchList">'+
                                (this.type == 1 ?'<a href="/download/'+this.slug+'">':'<a href="/product/'+this.slug+'">')+
                                '<div class="pic">'+
                                '<img src="'+JSON.parse(this.image)[0]+'" alt="'+this.title+'">'+
                                '</div>'+
                                '<div class="subject">'+
                                '<h3>'+this.title+'</h3>'+
                                '<h5>'+this.product_id+'</h5>'+
                                '</div>'+
                                '</a>'+
                                '</div>'
                            );
                        })
                    },
                });
            }
        }

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
</script>
