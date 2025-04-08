@extends('home.master')

@section('title' , $post->titleSeo)
@section('content')
    <main class="allSingleDownload width">
        <section class="address">
            <a href="/">خانه</a>
            @if(count($post->category) >= 1)
                <a href="/category/{{$post->category[0]->slug}}">{{$post->category[0]->name}}</a>
            @endif
            <a href="/product/{{$post->slug}}">{{ $post->title }}</a>
        </section>
        <h1>{{$post->title}}</h1>
        <section class="singleTop">
            <div class="right">
                <div class="rightItems">
                    <div class="pic">
                        <div class="image">
                            <figure>
                                <img src="{{json_decode($post->image)[0]}}" alt="{{$post->title}}">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="tabs" id="tapData">
                    <div class="tab" id="0">
                        <a class="active">نقد و بررسی</a>
                    </div>
                    <div class="tab" id="1">
                        <a>
                            نظرات کاربران
                            <span>{{$post->comments_count}}</span>
                        </a>
                    </div>
                    @if(auth()->user())
                        @if($paid)
                            <div class="tab" id="3">
                                <a>دانلود فایل ها</a>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="review" id="tab0">
                    <p>{!! $post->body !!}</p>
                </div>
                <div class="comment" id="tab1">
                    @include('home.single.comment' , ['post' => $post , 'comments' => $comments])
                </div>
                @if(auth()->user())
                    @if($paid)
                        <div class="files" id="tab3" style="display: none">
                            @foreach ($post->video as $item)
                                <a href="/download/{{$post->slug}}/download?id={{$loop->index}}" class="file">دانلود فایل شماره {{++$loop->index}}</a>
                            @endforeach
                        </div>
                    @endif
                @endif
{{--                <div class="related">--}}
{{--                    <div class="allFileIndex">--}}
{{--                        <div class="allFileTitle">--}}
{{--                            <h3>محصولات مرتبط</h3>--}}
{{--                        </div>--}}
{{--                        <div class="fileItems">--}}
{{--                            @foreach($related as $item)--}}
{{--                                <a class="fileItem" href="/download/{{$item->slug}}" title="{{$item->title}}">--}}
{{--                                    <div class="pic">--}}
{{--                                        <img src="{{$item->image}}" alt="{{$item->title}}">--}}
{{--                                    </div>--}}
{{--                                    <div class="titleTop">--}}
{{--                                        <i>--}}
{{--                                            <svg class="icon">--}}
{{--                                                <use xlink:href="#link"></use>--}}
{{--                                            </svg>--}}
{{--                                        </i>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>{{ $item->title }}</h3>--}}
{{--                                            @if(count($item->category) >= 1)--}}
{{--                                                <h4>{{ $item->category[0]->name }}</h4>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p>{{$item->short}}</p>--}}
{{--                                    <div class="options">--}}
{{--                                        <div class="option">--}}
{{--                                            <span>{{ number_format($item->price) }}</span>--}}
{{--                                            <span>تومان</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="option">--}}
{{--                                            <i>--}}
{{--                                                <svg class="icon">--}}
{{--                                                    <use xlink:href="#left"></use>--}}
{{--                                                </svg>--}}
{{--                                            </i>--}}
{{--                                            <h4>مشاهده بیشتر</h4>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="left">
                <div class="detail">
                    <div class="detailPrice">
                        <div class="item">
                            <h4>امتیاز خریداران</h4>
                            <h5>
                                @if($post->rates_count)
                                    {{$post->rates_count}}
                                @else
                                    5
                                @endif
                                <span>/ 5</span>
                            </h5>
                        </div>
                        <div class="item">
                            <h4>قیمت محصول</h4>
                            <h5>
                                {{ number_format($post->price) }}
                                <span>تومان</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="addCart">
                    <div class="addItems">
                        @if($paid)
                            <a href="#tapData">
                                <svg class="icon">
                                    <use xlink:href="#free"></use>
                                </svg>
                                <span>دانلود محصول</span>
                            </a>
                        @else
                            @if($cart)
                                <a class="buyBtn" style="background: red">
                                    <svg class="icon">
                                        <use xlink:href="#free"></use>
                                    </svg>
                                    <span>حذف از سبد</span>
                                </a>
                            @else
                                <a class="buyBtn">
                                    <svg class="icon">
                                        <use xlink:href="#free"></use>
                                    </svg>
                                    <span>افزودن به سبد</span>
                                </a>
                            @endif
                        @endif
                    </div>
                    <p>این محصول را به لیست علاقه مندی های خود اضافه کنید</p>
                    <div class="options">
                        <div class="option">
                            <h3>پیشنهاد به دیگران</h3>
                            <i id="likeBtn">
                                @if($like == '')
                                    <svg class="icon">
                                        <use xlink:href="#unlike"></use>
                                    </svg>
                                @else
                                    <svg class="icon">
                                        <use xlink:href="#like"></use>
                                    </svg>
                                @endif
                            </i>
                        </div>
                        <div class="option">
                            <h3>ذخیره برای خود</h3>
                            <i id="bookmarkBtn">
                                @if($bookmark == '')
                                    <svg class="icon">
                                        <use xlink:href="#unbookmark"></use>
                                    </svg>
                                @else
                                    <svg class="icon">
                                        <use xlink:href="#bookmark"></use>
                                    </svg>
                                @endif
                            </i>
                        </div>
                    </div>
                </div>
                <div class="description">
                    <div class="item">
                        <h4>شناسه محصول :</h4>
                        <span>{{ $post->product_id }}</span>
                    </div>
                    <div class="item">
                        <h4>تاریخ ثبت :</h4>
                        <span>{{ $post->created_at }}</span>
                    </div>
                    <div class="item">
                        <h4>دسته بندی :</h4>
                        @if(count($post->category) >= 1)
                            <a href="/category/{{$post->category[0]->slug}}">
                                <span>{{ $post->category[0]->name }}</span>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="gifOptions options">
                    <div class="productVideo">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#video"></use>
                            </svg>
                        </i>
                        <p>ویدئو محصول</p>
                    </div>
                    <div class="optionItem" name="counselingBtn" title="مشاوره فوری" data="{{$post->title}}" id="{{$post->id}}">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#counseling"></use>
                            </svg>
                        </i>
                        <p>مشاوره فوری</p>
                    </div>
                    <div class="originalItem">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#shield"></use>
                            </svg>
                        </i>
                        <p>پرداخت امن</p>
                    </div>
                    <div class="warnGift">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#share"></use>
                            </svg>
                        </i>
                        <p>اشتراک گذاری</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="allShare" style="display:none;">
            @include('home.single.share' , ['slug' => $post->product_id])
        </section>
    </main>
@endsection

@section('jsScript')
    <link rel="stylesheet" href="/css/jquery.raty.css"/>
    <script src="/js/jquery.raty.js"></script>
    <link rel="stylesheet" href="/css/jquery.toast.min.css"/>
    <script src="/js/jquery.toast.min.js"></script>
    @include('feed::links')
@endsection

@section('script1')
    <script>
        $(document).mouseup(function(e)
        {
            var container = $(".floatLogin");
            var shopPop = $(".shopPop");
            var showAllShare = $(".showAllShare");

            if (container.is(e.target) && container.has(e.target).length === 0)
            {
                container.hide();
            }

            if (shopPop.is(e.target) && shopPop.has(e.target).length === 0)
            {
                shopPop.hide();
            }
            if (showAllShare.is(e.target) && showAllShare.has(e.target).length === 0)
            {
                showAllShare.hide();
            }
        });
        $(document).ready(function(){
            var user = {!! json_encode(auth()->user() ? auth()->user() : '') !!};
            var post = {!! json_encode($post, JSON_HEX_TAG) !!};
            $(document).on('click','.buyBtn',function (){
                var form = {
                    "_token": "{{ csrf_token() }}",
                    "color": '',
                    "size": '',
                    "guarantee": '',
                    "product": post.id,
                };

                $.ajax({
                    url: "/add-cart",
                    type: "post",
                    data: form,
                    success: function (data) {
                        window.location.href= '/cart';
                    },
                    error: function (xhr) {
                        $('#addCart').find('button').text('افزودن به سبد');
                        $.toast({
                            text: 'مجدد چک کنید', // Text that is to be shown in the toast
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
                });
            });
            $('.gifOptions .productVideo').click(function (){
                $('#tab0').hide();
                $('.tab a').attr('class','');
                $('#tab1').hide();
                $('#tab2').show();
                $('.tabs #2 a').attr('class','active');
            })
            $('.warnGift').click(function (){
                $('.allShare').show();
            })
            $('.tabs .tab').click(function (){
                $('#tab0').hide();
                $('.tab a').attr('class','');
                $('#tab1').hide();
                $('#tab2').hide();
                $('#tab3').hide();
                $('#tab'+this.id).show();
                $(this.firstElementChild).attr('class','active');
            })
            if(user){
                $('.discounts button').click(function (e){
                    e.preventDefault();
                    var form = {
                        "_token": "{{ csrf_token() }}",
                        discount:$(".shopPop input[name='discount']").val(),
                    };
                    $.ajax({
                        url: "/check-discount-cart",
                        type: "post",
                        data: form,
                        success: function (data) {
                            if(data == 'no'){
                                $.toast({
                                    text: "کد تخفیف وجود ندارد", // Text that is to be shown in the toast
                                    heading: 'اعمال نشد', // Optional heading to be shown on the toast
                                    icon: 'error', // Type of toast icon
                                    showHideTransition: 'fade', // fade, slide or plain
                                    allowToastClose: true, // Boolean value true or false
                                    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                    position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                    textAlign: 'left',  // Text alignment i.e. left, right or center
                                    loader: true,  // Whether to show loader or not. True by default
                                    loaderBg: '#9EC600',  // Background color of the toast loader
                                });
                            }else{
                                $.toast({
                                    text: "کد تخفیف اعمال شد", // Text that is to be shown in the toast
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
                                $('.lice2 h5').attr('id',data);
                                var priceF = ($('.lice3 h5').attr('id') * data) / 100 ;
                                $('.lice2 h5').text(makePrice(priceF)+' تومان');
                                $('.lice3 h5').text(makePrice($('.lice3 h5').attr('id') - priceF)+' تومان');
                            }
                        },
                        error: function (xhr) {
                            $.toast({
                                text: "کد تخفیف وجود ندارد", // Text that is to be shown in the toast
                                heading: 'اعمال نشد', // Optional heading to be shown on the toast
                                icon: 'error', // Type of toast icon
                                showHideTransition: 'fade', // fade, slide or plain
                                allowToastClose: true, // Boolean value true or false
                                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                textAlign: 'left',  // Text alignment i.e. left, right or center
                                loader: true,  // Whether to show loader or not. True by default
                                loaderBg: '#9EC600',  // Background color of the toast loader
                            });
                        }
                    });
                })
            }else{
                $('.loginBtn').click(function (){
                    $('.loginFloat').show();
                    $('.floatLogin').show();
                })
                $('.buyLicence form').submit(function(e) {
                    e.preventDefault();
                    $('.loginFloat').show();
                    $('.floatLogin').show();
                })
            }
            $('.allSingleDownload .gateItem').on('click' , function(){
                $.each($('.gateItem'),function(){
                    $(this).attr('class' , 'gateItem');
                })
                $(this).attr('class','gateItem active');
                $(".allSingleDownload form input[name='gateway']").val($(this).attr('id'));
            });
            $(".allSingleDownload form select[name='methods']").change(function (){
                if(this.value == 2){
                    $('.allSingleDownload form').attr('action' , '/wallet-download');
                    $('.gatePay').hide();
                }else{
                    $('.allSingleDownload form').attr('action' , '/shop');
                    $('.gatePay').show();
                }
            })
            $('#likeBtn').click(function (){
                var form = {
                    "_token": "{{ csrf_token() }}",
                    "product": post.id,
                };

                $.ajax({
                    url: "/like",
                    type: "post",
                    data: form,
                    success: function (data) {
                        if(data == 'success'){
                            $.toast({
                                text: "به علاقه مندی اضافه شد", // Text that is to be shown in the toast
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
                            $('#likeBtn svg').remove();
                            $('#likeBtn').append(
                                $('<svg class="icon"><use xlink:href="#like"></use></svg>')
                            );
                        }
                        if(data == 'noUser'){
                            $.toast({
                                text: "ابتدا عضو شوید", // Text that is to be shown in the toast
                                heading: 'عضو شوید', // Optional heading to be shown on the toast
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
                        if(data == 'delete'){
                            $.toast({
                                text: "از علاقه مندی حذف شد", // Text that is to be shown in the toast
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
                            $('#likeBtn svg').remove();
                            $('#likeBtn').append(
                                $('<svg class="icon"><use xlink:href="#unlike"></use></svg>')
                            );
                        }
                    },
                });
            });
            $('#bookmarkBtn').click(function (){
                var form = {
                    "_token": "{{ csrf_token() }}",
                    "product": post.id,
                };

                $.ajax({
                    url: "/bookmark",
                    type: "post",
                    data: form,
                    success: function (data) {
                        if(data == 'success'){
                            $.toast({
                                text: "به نشانه هایتان اضافه شد", // Text that is to be shown in the toast
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
                            $('#bookmarkBtn svg').remove();
                            $('#bookmarkBtn').append(
                                $('<svg class="icon"><use xlink:href="#bookmark"></use></svg>')
                            );
                        }
                        if(data == 'noUser'){
                            $.toast({
                                text: "ابتدا عضو شوید", // Text that is to be shown in the toast
                                heading: 'عضو شوید', // Optional heading to be shown on the toast
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
                        if(data == 'delete'){
                            $.toast({
                                text: "از نشانه هایتان حذف شد", // Text that is to be shown in the toast
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
                            $('#bookmarkBtn svg').remove();
                            $('#bookmarkBtn').append(
                                $('<svg class="icon"><use xlink:href="#unbookmark"></use></svg>')
                            );
                        }
                    },
                });
            });
            function makePrice(price){
                price += '';
                x = price.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }

            var form = {
                "_token": "{{ csrf_token() }}",
                "productId": post.id,
            };
            $.ajax({
                url: "/view",
                type: "post",
                data: form,
            });
        })
    </script>
@endsection

@section('torobTag')
    <meta name="og:image" content="{{$post->image}}">
    <meta name="product_id" content="{{$post->product_id}}">
    <meta name="product_name" content="{{$post->title}}">
    <meta name="product_price" content="{{$post->price}}">
    <meta name="product_old_price" content="{{$post->offPrice}}">
    <meta name="availability" content="instock">
@endsection
