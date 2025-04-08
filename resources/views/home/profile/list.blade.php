<div class="allProfileList">
    <div class="allUserIndexList">
        <div class="allUserIndexListsUser">
            <div class="allUserIndexListsUserPic">
                <div class="pic">
                    @if(auth()->user()->profile)
                        <img src="{{auth()->user()->profile}}" alt="{{auth()->user()->name}}">
                    @else
                        <img src="/img/user.png" alt="{{auth()->user()->name}}">
                    @endif
                </div>
            </div>
            <div class="allUserIndexListsUserItem">
                <div class="allUserIndexListsUserName">{{ auth()->user()->name }}</div>
            </div>
            <h4> {{__('messages.identification_code')}} : {{auth()->user()->referral}}</h4>
            <h4> {{__('messages.my_score')}} : {{$scores}}</h4>
        </div>
        @if(!\App\Models\Gift::where('user_id',auth()->id())->whereDate('created_at',now()->today())->where('type',3)->first())
            <div class="collectGift">{{__('messages.collect_gift')}}</div>
        @endif
        <div class="allUserIndexListItems">
            <a href="/profile/personal-info">{{__('messages.user_edit')}}</a>
            <a href="/logout">{{__('messages.exit_user')}}</a>
        </div>
    </div>
    <div class="walletData">
        <i>
            <svg class="icon">
                <use xlink:href="#wallet"></use>
            </svg>
        </i>
        <h3>{{number_format($wallet)}} <span>{{__('messages.arz')}}</span></h3>
        <a href="/charge">{{__('messages.charge1')}}</a>
    </div>
    @if(\App\Models\Setting::where('key' , 'sellerStatus')->pluck('value')->first())
        @if($checkSeller == 1)
            <a class="becomeList" href="/seller/dashboard">
                <h4>
                    <i>
                        <svg class="icon">
                            <use xlink:href="#seller"></use>
                        </svg>
                    </i>
                    {{__('messages.seller_panel')}}
                </h4>
                <div class="pic"></div>
            </a>
        @else
            <a class="becomeList" href="/become-seller">
                <h4>
                    <i>
                        <svg class="icon">
                            <use xlink:href="#seller"></use>
                        </svg>
                    </i>
                    {{__('messages.seller')}}
                </h4>
                <div class="pic"></div>
            </a>
        @endif
    @endif
    <div class="allUserIndexListsItems">
        <div class="allUserIndexListsItem">
            <a href="/profile/subcategory">{{__('messages.sub1')}}</a>
            @if($tab == 6)
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            @endif
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/pay">{{__('messages.order_user')}}</a>
            @if($tab == 1)
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            @endif
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/like">{{__('messages.like_user')}}</a>
            @if($tab == 2)
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            @endif
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/convert">{{__('messages.change_score')}}</a>
            @if($tab == 7)
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            @endif
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/bookmark">{{__('messages.bookmark_user')}}</a>
            @if($tab == 3)
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            @endif
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/comment">{{__('messages.comments')}}</a>
            @if($tab == 4)
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            @endif
        </div>
        <div class="allUserIndexListsItem">
            <a href="/ticket">{{__('messages.ticket1')}}</a>
            @if($tab == 5)
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            @endif
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/counseling">{{__('messages.counseling')}}</a>
            @if($tab == 6)
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            @endif
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile">{{__('messages.dashboard')}}</a>
            @if($tab == 0)
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            @endif
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.collectGift').on('click',function(){
            $(this).text('صبر کنید...');
            var form = {
                "_token": "{{ csrf_token() }}",
            };
            $.ajax({
                url: "/get-collect-gift",
                type: "post",
                data: form,
                success: function (data) {
                    $.toast({
                        text: 'امتیاز ثبت شد', // Text that is to be shown in the toast
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
                    window.location.reload();
                },
            });
        })
    })
</script>
