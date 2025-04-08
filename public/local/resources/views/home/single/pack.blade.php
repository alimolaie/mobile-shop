@extends('home.master')

@section('title' , $packs->titleSeo)
@section('content')
    <main class="allPackSingle">
        <div class="allPackSingleTop">
            <div class="allPackSingleTopBlock">
                <h1>{{$packs->title}}</h1>
                <p>{{__('messages.pack_body')}}</p>
            </div>
        </div>
        <div class="allPackSingleTopBlockInfo width">
            <div class="topInfo">
                @if($packs->count >= 1)
                    <div class="allPackSingleTopBlockInfoItem">
                        <button class="addCollectS" id="{{$packs->id}}">{{__('messages.add_cart')}}</button>
                        <h3 class="price1">
                            {{number_format($packs->price)}}
                            تومان
                        </h3>
                    </div>
                @else
                    <div class="allPackSingleTopBlockInfoItem">
                        <h3>{{__('messages.unavailable1')}}</h3>
                    </div>
                @endif
                <h4>
                    <svg-icon :icon="'#product'"></svg-icon>
                    {{__('messages.count')}} : {{count($packs->product)}}
                </h4>
            </div>
            @if($packs->options != '' && $packs->options != '[]')
                <div class="botInfo">
                    @foreach(json_decode($packs->options) as $val)
                        <label for="option{{$loop->index}}" class="option">
                            <span class="rightO">
                                <input type="checkbox" id="option{{$loop->index}}" name="option[]" value="{{$val->title}}" data-num="{{$val->price}}">
                                <span class="titleO">{{$val->title}}</span>
                            </span>
                            <span class="leftO">
                                <span class="price">{{number_format($val->price)}} تومان</span>
                                <span class="body">
                                    <i>
                                        <svg class="icon">
                                            <use xlink:href="#info"></use>
                                        </svg>
                                    </i>
                                    <span class="tooltip">{{$val->body}}</span>
                                </span>
                            </span>
                        </label>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="allPackSinglePosts width">
            @foreach($packs->product as $item)
                <div class="allPackSinglePost">
                    <a href="/product/{{$item->slug}}">
                        <article class="allHoopersPost">
                            @if($item->off)
                            <div class="offProduct">
                                <div class="offProductItem">
                                    <svg class="icon">
                                        <use xlink:href="#off-tag"></use>
                                    </svg>
                                    <div>
                                        <span>٪{{$item->off}}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="allHoopersPostPic">
                                <img src="{{json_decode($item->image)[0]}}" alt="{{$item->title}}">
                            </div>
                            <h3>{{$item->title}}</h3>
                            <div class="allHoopersPostData">
                                <h4>
                                    <svg class="icon">
                                        <use xlink:href="#info"></use>
                                    </svg>
                                    <span>{{__('messages.detail')}}</span>
                                </h4>
                                <div class="allHoopersPostDataPrice">
                                    <h6>{{__('messages.arz')}}</h6>
                                    <h5>{{number_format($item->price)}}</h5>
                                </div>
                            </div>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    </main>
@endsection

@section('script1')
    <script>
        $(document).ready(function(){
            var packs = {!! json_encode($packs, JSON_HEX_TAG) !!};
            var add_cart21 = {!! json_encode(__('messages.add_cart2'), JSON_HEX_TAG) !!};
            var success1 = {!! json_encode(__('messages.success'), JSON_HEX_TAG) !!};
            var no_count = {!! json_encode(__('messages.no_count'), JSON_HEX_TAG) !!};
            var count1 = {!! json_encode(__('messages.count1'), JSON_HEX_TAG) !!};
            var error1 = {!! json_encode(__('messages.error1'), JSON_HEX_TAG) !!};
            var login_attention = {!! json_encode(__('messages.login_attention'), JSON_HEX_TAG) !!};
            var number1 = {!! json_encode(__('messages.number'), JSON_HEX_TAG) !!};
            var arz1 = {!! json_encode(__('messages.arz'), JSON_HEX_TAG) !!};
            var price = packs.price;
            $(".botInfo input[name='option[]']").prop('checked',false);
            $(".botInfo input[name='option[]']").click(function (){
                price = packs.price;
                $.each($(".botInfo input[name='option[]']:checked"),function (){
                    price += parseInt($(this).attr('data-num'));
                })
                $(".price1").text(makePrice(price) + ' تومان');
            })
            $(document).on('click',".addCollectS",function(event){
                event.preventDefault();
                var options = [];
                $.each($(".botInfo input[name='option[]']:checked"),function (){
                    options.push($(this).val());
                })
                var form = {
                    "_token": "{{ csrf_token() }}",
                    "collect": $(this).attr('id'),
                    "price": price,
                    "options": JSON.stringify(options),
                };
                $.ajax({
                    url: "/add-pack",
                    type: "post",
                    data: form,
                    success: function (data) {
                        $('.allLoading').hide();
                        if(data[0] == 'success'){
                            $.toast({
                                text: add_cart21, // Text that is to be shown in the toast
                                heading: success1, // Optional heading to be shown on the toast
                                icon: 'success', // Type of toast icon
                                showHideTransition: 'fade', // fade, slide or plain
                                allowToastClose: true, // Boolean value true or false
                                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                textAlign: 'left',
                                loader: true,
                                loaderBg: '#9EC600',
                            });
                            $.each($('#showCartLi li'), function(key,value) {
                                this.remove();
                            });
                            var count = 0;
                            $.each(data[1],function(){
                                count = count +this.count;
                                var prices = makePrice(this.price*this.count);
                                $('#showCartLi').append(
                                    $('<li id="'+this.slug+'" pack="'+this.pack+'" count="'+this.count+'" price="'+this.price+'"><div class="cartPic">' +
                                        (this.pack == 1 ? '<a href="/pack/'+this.slug+'"><img src="'+this.image+'" alt="'+this.title+'"></a>':'<a href="/product/'+this.slug+'"><img src="'+JSON.parse(this.image)[0]+'" alt="'+this.title+'"></a>') +
                                        '</div><div class="cartText"><div class="cartTitle"><div class="title2">'+this.title+
                                        (this.color ? '<p> - '+this.color+'</p>': '')+
                                        (this.size ? '<p> - '+this.size+'</p>': '') +
                                        (this.count ? '<p class="countCart"> - '+this.count+number1+' </p>': '') +
                                        '</div><i id="deleteCart" pack="'+this.pack+'" size="'+this.size+'" color="'+this.color+'" guarantee="'+this.guarantee_id+'" product="'+this.product+'"><svg class="icon"><use xlink:href="#cancel"></use></svg></i></div><div class="cartTextItem"><div class="cartPrice"><span>'+prices+arz1+'</span></div></div></div></li>')
                                        .on('click' , '#deleteCart',function(ss){
                                            $('.allLoading').show();
                                            var form = {
                                                "_token": "{{ csrf_token() }}",
                                                "color": $(this).attr('color'),
                                                "pack": $(this).attr('pack'),
                                                "size": $(this).attr('size'),
                                                "guarantee": $(this).attr('guarantee'),
                                                "product": $(this).attr('product'),
                                            };

                                            $.ajax({
                                                url: "/delete-cart",
                                                type: "post",
                                                data: form,
                                                success: function (data) {
                                                    $('.allLoading').hide();
                                                    if(window.location.pathname == '/checkout'){
                                                        window.location.reload();
                                                    }else{
                                                        var cartCounts = $('.cartShowBtn .cartCount').text();
                                                        $('.cartShowBtn .cartCount').text(parseInt(cartCounts) - parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('count')));
                                                        $('#allCountCart span').text(parseInt(cartCounts) - parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('count')));
                                                        $('.tabs .active span').text(parseInt(cartCounts) - parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('count')));
                                                        $('#allPrice2 h3').text(makePrice(parseInt($('#allPrice2 h3').attr('id')) - parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('count')) * parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('price'))));
                                                        $('#allPrice1 span').text(makePrice(parseInt($('#allPrice2 h3').attr('id')) - parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('count')) * parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('price'))) + ' ' + arz1);
                                                        $('#allPrice2 h3').attr('id',parseInt($('#allPrice2 h3').attr('id') - parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('count')) * parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('price'))));
                                                        $('#allPrice1 span').attr('id',parseInt($('#allPrice2 h3').attr('id') - parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('count')) * parseInt($(ss.currentTarget.parentElement.parentElement.parentElement).attr('price'))));
                                                        $('.cartIndex .cartItems #'+$(ss.currentTarget.parentElement.parentElement.parentElement).attr('id')).remove();
                                                        if($('.cartShowBtn .cartCount').text() <= 0){
                                                            $('.showCartEmpty').show();
                                                            $('.allCartIndexEmpty').show();
                                                            $('.cartIndex').hide();
                                                            $('.topCartIndex').hide();
                                                        }
                                                        ss.currentTarget.parentElement.parentElement.parentElement.remove();
                                                    }
                                                },
                                            });
                                        })
                                );
                            })
                            if(data[1].length){
                                $('.headerCart .showCartEmpty').hide();
                            }
                            $('.cartShowBtn .cartCount').text(count);
                        }
                        else{
                            $.toast({
                                text: no_count, // Text that is to be shown in the toast
                                heading: count1, // Optional heading to be shown on the toast
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
                    error: function (xhr) {
                        $('.allLoading').hide();
                        $.toast({
                            text: error1, // Text that is to be shown in the toast
                            heading: login_attention, // Optional heading to be shown on the toast
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
            })
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
        })
    </script>
@endsection

@section('jsScript')
    <link rel="stylesheet" href="/css/jquery.toast.min.css"/>
    <script src="/js/jquery.toast.min.js"></script>
    @include('feed::links')
@endsection
