<div class="allHeaderPanel">
    <div class="right">
        <i class="alignIcon">
            <svg class="icon">
                <use xlink:href="#align"></use>
            </svg>
        </i>
        <h2>{{__('messages.seller_panel')}}</h2>
    </div>
    <div></div>
    <div class="left">
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
                        @if(auth()->user()->profile)
                            <img src="{{auth()->user()->profile}}" alt="{{auth()->user()->name}}">
                        @else
                            <img src="/img/user.png" alt="{{auth()->user()->name}}">
                        @endif
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
            </ul>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        $(document).ready(function(){
            var res = 0;
            $('#showUser').hide();
            $('#userPic').click(function (){
                $('#showUser').toggle(50);
            })
            if(window.innerWidth <= 700){
                res = 1;
                $(".allPanel").animate({"margin": "7rem 1rem 1rem 1rem"},300);
                $(".allHeaderPanel").animate({"right": "1rem"},300);
                $(".allSideBar").animate({"right": "-20rem"},50);
            }
            if(window.innerWidth > 700) {
                $('.allHeaderPanel .alignIcon').click(function () {
                    if (res == 0) {
                        $(".allPanel").animate({"margin": "7rem 1rem 1rem 1rem"}, 300);
                        $(".allHeaderPanel").animate({"right": "1rem"}, 300);
                        res = 1;
                        $(".allSideBar").animate({"right": "-20rem"}, 50);
                    } else {
                        $(".allPanel").animate({"margin": "7rem 19rem 1rem 1rem"}, 300);
                        $(".allHeaderPanel").animate({"right": "19rem"}, 300);
                        $(".allSideBar").animate({"right": "1rem"}, 50);
                        res = 0;
                    }
                })
            }
            else{
                $('.allHeaderPanel .alignIcon').click(function () {
                    if (res == 0) {
                        $(".allPanel").animate({"margin": "7rem 1rem 1rem 1rem"}, 300);
                        $(".allHeaderPanel").animate({"right": "1rem"}, 300);
                        res = 1;
                        $(".allSideBar").animate({"right": "-20rem"}, 50);
                    } else {
                        $(".allHeaderPanel").animate({"right": "19rem"}, 300);
                        $(".allSideBar").animate({"right": "1rem"}, 50);
                        res = 0;
                    }
                })
            }
        })
    </script>
@endsection
