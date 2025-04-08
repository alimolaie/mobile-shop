<div class="allStoryContainer width">
    <div class="allStoryIndex">
        <div class="titleStory">{{$data['title']}}</div>
        <div class="storyItems">
            @foreach($data['post'] as $item)
                <div class="storyItem" id="story{{$item->id}}">
                    @if(in_array($item->id, $storySeen))
                        <div class="storyPic unActive">
                            <img src="{{$item->cover}}" alt="{{$item->id}}">
                        </div>
                    @else
                        <div class="storyPic">
                            <img src="{{$item->cover}}" alt="{{$item->id}}">
                        </div>
                    @endif
                    <div class="storyName">{{$item->title}}</div>
                </div>
            @endforeach
        </div>
        @foreach($data['post'] as $parent)
            <div class="storyFloatHide" data-num="story{{$parent->id}}">
                <div class="storyFloats">
                    <div class="storyFloatShow" role="main">
                        <div class="daily-stories">
                            <div class="daily-stories__outer">
                                <div class="daily-stories__container">
                                    @foreach($parent['children'] as $item)
                                        <div class="slide" data-link="{{$item->image}}" data-timeout="{{$item->day}}000">
                                            @if($item->type == 0)
                                                <img src="{{$item->cover}}" alt="{{$item->title}}" title="{{$item->title}}" />
                                            @else
                                                <video src="{{$item->cover}}" loop autoplay preload="true"></video>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="progress-bars" data-count="4">
                                @foreach($parent['children'] as $item)
                                    <div class="bar {{$item->type ? 'video' : ''}}" data-index="{{$loop->index}}"><span style="animation-duration: {{$item->day}}000ms;"></span></div>
                                @endforeach
                            </div>
                            <div class="context-menu-container">
                                <a href="#" class="button">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <circle fill="red" cx="7" cy="16" r="2" />
                                        <circle fill="red" cx="16" cy="16" r="2" />
                                        <circle fill="red" cx="25" cy="16" r="2" />
                                    </svg>
                                </a>
                                <div class="context-menu">
                                    <a href="#" id="c-menu_save" download="" class="link">ذخیره</a>
                                    <a href="#" id="c-menu_copy" class="link">خرید محصول</a>
                                    <a href="#" id="c-menu_cancel" class="link">انصراف</a>
                                </div>
                            </div>
                        </div>
                        <span id="prev-slide"></span>
                        <span id="next-slide"></span>
                        <div class="closeStory">
                            <svg class="icon">
                                <use xlink:href="#cancel"></use>
                            </svg>
                        </div>
                        <div class="central-area" data-state="playing">
                            <div class="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path id="path_play" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 8l6 4-6 4V8z" />
                                    <path id="path_pause" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 15V9M14 15V9" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="downStory">
        <div class="data">
            <i class="downData">
                <svg class="icon">
                    <use xlink:href="#down"></use>
                </svg>
            </i>
            <i>
                <svg class="icon">
                    <use xlink:href="#shape3"></use>
                </svg>
            </i>
        </div>
    </div>
</div>

@section('script4')
    <script>
        $(document).ready(function () {
            $('.storyItem').click(function (){
                $(".storyFloatHide[data-num="+$(this).attr('id')+"]").attr('class','storyFloat');
                openStory();
            })
            $('.closeStory').click(function (){
                $('.storyFloat').attr('class','storyFloatHide')
            })
            function openStory(){
                var container = $(".storyFloat .daily-stories__outer");
                var imgs_wrapper = $(".storyFloat .daily-stories__container");
                imgs_wrapper.css({'transform':'translate3d(0px, 0px, 0px)'});
                var imgs = $(".storyFloat .daily-stories .slide");
                var bars = $(".storyFloat .progress-bars .bar");
                var prevBtn = $(".storyFloat #prev-slide");
                var nextBtn = $(".storyFloat #next-slide");
                var centralArea = $(".storyFloat .central-area");
                var total_imgs = imgs.length;
                var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
                var ss = 0;

                var CM_container = $(".storyFloat .context-menu-container");
                var CM_button = CM_container.find("a.button");
                var cm_link_save = $(".storyFloat #c-menu_save");
                var cm_link_copy = $(".storyFloat #c-menu_copy");
                var cm_link_cancel = $(".storyFloat #c-menu_cancel");
                var container_width = container.width();
                var current_index = 0;
                var pointer_is_down = false;
                var [start_x, end_x] = [0, 0];
                var move_distance = 0;
                var timersSet = [];
                var dataSet = [];
                var timer;

                function init() {
                    container_width = container.width();
                    CM_container.width(container_width - 30);
                    imgs_wrapper.width(container_width * total_imgs);
                }

                function collections() {
                    imgs.each(function (i) {
                        timersSet.push($(this).data("timeout"));

                        if ($(this).hasClass("video")) {
                            dataSet.push($(this).find("video").attr("src"));
                        } else {
                            dataSet.push($(this).find("img").attr("src"));
                        }
                    });
                }

                function slidesAutoPlay() {
                    if($(imgs.eq(0)).parents('.storyFloat').length == 0){
                        return
                    }
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                        if (current_index < total_imgs - 1) {
                            nextSlide();
                        } else {
                            if(ss == 1){
                                var parent = $(".storyFloat");
                                $(parent[0]).attr('class','storyFloatHide');
                                current_index = 0;
                                total_imgs = 0;
                                ss = 0;
                                setTimeout(function () {
                                    if($(parent[0]['previousElementSibling']).attr('class') == 'storyFloatHide'){
                                        $(parent[0]['previousElementSibling']).attr('class','storyFloat');
                                        openStory();
                                    }
                                }, 50)
                            }
                        }
                    }, timersSet[current_index]);
                }

                function createDraggingEffects() {
                    if ($("body").hasClass("menu-open")) return;
                    let max_distance = 2;
                    let scrolled_distance = current_index * container_width + (start_x - end_x) / max_distance;
                    switchImages(-scrolled_distance);
                }

                function setSlideActive(i) {
                    let currentSlide = imgs.eq(i);
                    imgs.removeClass("active");
                    currentSlide.addClass("active");
                    playVideo();
                }

                function setBarActive(i) {
                    bars.each(function (index) {
                        var el = $(this);

                        if (index >= i) {
                            el.removeClass("animate");
                        }
                        if (index < i) {
                            el.addClass("seen").removeClass("animate");
                        } else {
                            el.removeClass("seen");
                        }
                    });

                    bars.eq(i).addClass("animate");
                }

                function setActive() {
                    if (current_index < total_imgs - 1) {
                        setBarActive(parseInt(current_index, 10) + 1);
                    } else {
                        setBarActive(0);
                    }

                    setTimeout(function () {
                        setBarActive(current_index);
                        setSlideActive(current_index);
                    }, 1);
                }

                function calculateFinalMoveDistance() {
                    var scrolled_distance = Math.abs(start_x - end_x);
                    var minimum_distance = 50;

                    if ($("body").hasClass("menu-open")) return;

                    if (scrolled_distance < minimum_distance && current_index !== 0) {
                        move_distance = -(current_index * container_width);
                        switchImages();
                        return false;
                    }

                    stopVideo();
                    if (start_x > end_x && current_index < total_imgs - 1) {
                        current_index++;
                    } else if (start_x < end_x && current_index > 0) {
                        current_index--;
                    } else if (current_index === 0) {
                        setBarActive(1);
                    }

                    move_distance = -(current_index * container_width);
                    switchImages(move_distance);

                    updateSaveImgSrc();

                    setActive();

                    slidesAutoPlay();
                }

                function nextSlide() {
                    if($(imgs.eq(0)).parents('.storyFloat').length == 0){
                        return
                    }
                    if (current_index < total_imgs - 1) {
                        ss = 1;
                        document.body.classList.remove("menu-open");
                        stopVideo();
                        current_index++;
                        move_distance = -(current_index * container_width);
                        switchImages(move_distance);
                        updateSaveImgSrc();
                        setActive();
                        slidesAutoPlay();
                    }else{
                        if(ss == 1){
                            var parent = $(".storyFloat");
                            $(parent[0]).attr('class','storyFloatHide');
                            current_index = 0;
                            total_imgs = 0;
                            ss = 0;
                            clearTimeout(timer);
                            setTimeout(function () {
                                if($(parent[0]['previousElementSibling']).attr('class') == 'storyFloatHide'){
                                    $(parent[0]['previousElementSibling']).attr('class','storyFloat');
                                    openStory();
                                }
                            }, 50)
                        }
                    }
                }

                function prevSlide() {
                    if (current_index > 0) {
                        document.body.classList.remove("menu-open");
                        stopVideo();
                        if (current_index > 0) {
                            current_index--;
                        }
                        move_distance = -(current_index * container_width);
                        switchImages(move_distance);
                        updateSaveImgSrc();
                        setActive();
                        slidesAutoPlay();
                    }else{
                        var parent = $(".storyFloat");
                        $(parent[0]).attr('class','storyFloatHide');
                        current_index = 0;
                        total_imgs = 0;
                        ss = 0;
                        clearTimeout(timer);
                        setTimeout(function () {
                            if($(parent[0]['nextElementSibling']).attr('class') == 'storyFloatHide'){
                                $(parent[0]['nextElementSibling']).attr('class','storyFloat');
                                openStory();
                            }
                        }, 50)
                    }
                }

                function slideTo(i) {
                    document.body.classList.remove("menu-open");
                    stopVideo();
                    current_index = i;
                    move_distance = -(current_index * container_width);
                    switchImages(move_distance);
                    updateSaveImgSrc();
                    setActive();
                    slidesAutoPlay();
                }

                function pauseVideo() {
                    if (isVideo()) {
                        var v = imgs.eq(current_index).find("video")[0];
                        v.muted = true;
                        v.pause();
                    }
                }

                function playVideo() {
                    if (isVideo()) {
                        var v = imgs.eq(current_index).find("video")[0];
                        v.muted = true;
                        v.play();
                    }
                }

                function stopVideo() {
                    if (isVideo()) {
                        var v = imgs.eq(current_index).find("video")[0];
                        v.pause();
                        v.currentTime = 0;
                    }
                }

                function toggleMute() {
                    if (isVideo()) {
                        var v = imgs.eq(current_index).find("video")[0];
                        v.muted = !v.muted;
                    }
                }

                function cancelAnimation() {
                    clearTimeout(timer);
                }

                function switchImages(scrolled_number) {
                    var distance = scrolled_number || move_distance;
                    imgs_wrapper.css("transform", `translate3d(${distance}px, 0px, 0px)`);
                }

                function handleMouseLeave(e) {
                    if (!pointer_is_down) return false;
                    pointer_is_down = false;
                    [start_x, end_x] = [0, 0];
                    switchImages();
                }

                function updateSaveImgSrc() {
                    cm_link_save.attr("href", dataSet[current_index]);
                }

                function toggleSliderAutoplay(e) {
                    var state = e.target.getAttribute("data-state");

                    if (CM_container.hasClass("active")) {
                        return;
                    }

                    if (state === "paused") {
                        centralArea.attr("data-state", "playing");
                        document.body.classList.remove("paused");
                        setActive();
                        slidesAutoPlay();
                        stopVideo();
                        playVideo();
                    } else {
                        centralArea.attr("data-state", "paused");
                        document.body.classList.add("paused");
                        cancelAnimation();
                        pauseVideo();
                    }
                }

                function isVideo() {
                    return imgs.eq(current_index).hasClass("video");
                }

                function CM_Handle(e) {
                    e.preventDefault();
                    CM_container.toggleClass("active");

                    if (CM_container.hasClass("active")) {
                        document.body.classList.add("menu-open");
                        cancelAnimation();
                        pauseVideo();
                        updateSaveImgSrc();
                    } else {
                        document.body.classList.remove("menu-open");
                        setActive();
                        slidesAutoPlay();
                        stopVideo();
                        playVideo();
                    }
                }

                init();
                collections();

                setSlideActive(0);
                setBarActive(0);

                slidesAutoPlay();

                if (isMobile) {
                    $("body").addClass("mobile");
                }

                prevBtn.on("click", function (e) {
                    e.preventDefault();
                    centralArea.attr("data-state", "playing");
                    document.body.classList.remove("paused");
                    prevSlide();
                });

                nextBtn.on("click", function (e) {
                    e.preventDefault();
                    centralArea.attr("data-state", "playing");
                    document.body.classList.remove("paused");
                    nextSlide();
                });

                centralArea.on("click", function (e) {
                    e.preventDefault();
                    toggleSliderAutoplay(e);
                });

                container.on("mousedown", function (e) {
                    e.preventDefault();
                    pointer_is_down = true;
                    start_x = e.pageX;
                });

                container.on("mousemove", function (e) {
                    e.preventDefault();
                    if (!pointer_is_down) return false;
                    end_x = e.pageX;
                    createDraggingEffects();
                });

                container.on("mouseup", function (e) {
                    e.preventDefault();
                    pointer_is_down = false;
                    calculateFinalMoveDistance();
                });

                container.on("mouseleave", handleMouseLeave);

                container.on("touchstart", function (e) {
                    pointer_is_down = true;
                    start_x = e.touches[0].pageX;
                });

                container.on("touchmove", function (e) {
                    if (!pointer_is_down) return false;
                    end_x = e.touches[0].pageX;
                    createDraggingEffects();
                });

                container.on("touchend", function (e) {
                    pointer_is_down = false;
                    calculateFinalMoveDistance();
                });

                CM_button.on("click", CM_Handle);

                cm_link_cancel.on("click", CM_Handle);

                cm_link_copy.on("click", function (e) {
                    e.preventDefault();
                    window.location.href = $('.storyFloat .daily-stories__container .active').attr('data-link');
                });

                bars.each(function () {
                    var bar = $(this);
                    bar.on("click", function () {
                        slideTo(bar.data("index"));
                    });
                });
            }
        });
    </script>
@endsection
