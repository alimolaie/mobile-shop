@extends('home.master')

@section('title' , $post->titleSeo)
@section('content')
    <main class="allSingleIndex4 width">
        <div class="leftSingle">
            <div class="titleRes" style="display:none;">
                <div class="rightRes">
                    <div class="title1">{{$post->title}}</div>
                </div>
            </div>
            <div class="imageContainer">
                <div class="showImage">
                    <img class="zoom lazyload" lazy="loading" src="/img/404Image.png" data-src="" alt="{{$post->imageAlt}}"/>
                </div>
                <div class="imageSlider">
                    <div class="slider-image owl-carousel owl-theme">
                        @foreach (json_decode($post['image']) as $item)
                            <figure>
                                <img class="lazyload" lazy="loading" src="/img/404Image.png" data-src="{{$item}}" alt="{{$post->imageAlt}}">
                            </figure>
                        @endforeach
                    </div>
                </div>
            </div>
            @if($post->colors)
                @if($post['colors'] != '[]')
                    <div class="optionAdd colorContainer" style="display:none;">
                        <div class="swatch clearfix" data-option-index="1">
                            @foreach (json_decode($post['colors']) as $item)
                                <div data-value="{{$item->name}}" class="swatch-element color blue available">
                                    <div class="tooltip">{{$item->name}}</div>
                                    <input quickbeam="color" id="{{$item->name}}2" count="{{$item->count}}" type="radio" name="color" price="{{$item->price}}" value="{{$item->name}}"  />
                                    <label for="{{$item->name}}2" style="border-color: {{$item->color}}">
                                        <span style="background-color: {{$item->color}}"></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
            @if($post->size)
                @if($post['size'] != '[]')
                    <div class="optionAdd" style="display:none;">
                        <select name="size" id="size">
                            @foreach (json_decode($post['size']) as $item)
                                <option value="{{$item->name}}" data="{{$item->price}}" count="{{$item->count}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            @endif
            <div class="titleRes" style="display:none;">
                <div class="leftRes">
                    <div class="price">
                        <div class="prices">
                            <div class="price1">
                                {{number_format($post->price)}}
                                <span>{{__('messages.arz')}}</span>
                            </div>
                            @if($post->off)
                                <s>{{number_format($post->offPrice)}}</s>
                            @endif
                            @if($post->off)
                                <div class="offContainer">
                                    <div class="offData">%{{$post->off}}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div style="display:none;" class="gifOptions options">
                <a href="/gift" class="warnGift">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#gift"></use>
                        </svg>
                    </i>
                    <p>{{__('messages.get_discount')}}</p>
                </a>
                <a href="#videos" class="productVideo">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#video"></use>
                        </svg>
                    </i>
                    <p>{{__('messages.product_video')}}</p>
                </a>
                <div class="optionItem" name="quickBuy" title="{{__('messages.order_method4')}}" id="{{$post->id}}">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#time-fast"></use>
                        </svg>
                    </i>
                    <p>{{__('messages.order_method4')}}</p>
                </div>
                <div class="optionItem" name="counselingBtn" title="{{__('messages.counseling_fast')}}" data="{{$post->title}}" id="{{$post->id}}">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#counseling"></use>
                        </svg>
                    </i>
                    <p>{{__('messages.counseling_fast')}}</p>
                </div>
            </div>
            <div class="tabs">
                <a href="#ability">{{__('messages.property1')}}</a>
                <a href="#body">{{__('messages.body')}}</a>
                <a href="#properties">{{__('messages.product_property2')}}</a>
                <a href="#comment">{{__('messages.comments')}}</a>
                <a href="#videos">{{__('messages.videos')}}</a>
                <a href="#rel">{{__('messages.products')}}</a>
            </div>
            <div class="ability" id="ability">
                <div class="bodyTitle">{{__('messages.product_property')}}</div>
                <ul>
                    @foreach(json_decode($post->ability) as $ability)
                        <li>
                            <svg class="icon">
                                <use xlink:href="#checkmark"></use>
                            </svg>
                            <span>{{$ability->name}}</span>
                        </li>
                    @endforeach
                    @foreach($fields as $item)
                        <li>
                            <svg class="icon">
                                <use xlink:href="#checkmark"></use>
                            </svg>
                            <span>{{\App\Models\Field::where('id' , $item->field_id)->pluck('name')->first()}} : {{$item->value}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="body" id="body">
                <div class="bodyItem">
                    <div class="bodyTitle">{{__('messages.body1')}}</div>
                    <p>{{ $post->short }}</p>
                </div>
                @if($post->body)
                    <div class="bodyItem">
                        <p>{!! $post->body !!}</p>
                    </div>
                @endif
            </div>
            @if($post->specifications)
                <div class="property" id="properties">
                    <div class="bodyTitle">{{__('messages.techno_body')}}</div>
                    <ul>
                        @foreach (json_decode($post->specifications) as $item)
                            <li>
                                <div class="title2">
                                    <span>{{$item->title}}</span>
                                </div>
                                <p>
                                    <span>{{$item->body}}</span>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('home.single.comment' , ['post' => $post , 'comments' => $comments])
            @if($post->video)
                <div class="video" id="videos">
                    <div class="bodyTitle">{{__('messages.product_videos')}}</div>
                    <ul>
                        @foreach ($post->video as $item)
                            <li>
                                <video
                                    id="vid1"
                                    controls
                                    preload="auto" width="640" height="264"
                                    class="video-js vjs-fluid vjs-default-skin vjs-big-play-centered"
                                    data-setup="{}"
                                    poster="{{json_decode($post->image)[0]}}"
                                    style="height: 100%;"
                                >
                                    <source src="{{$item->url}}" type="video/mp4">
                                </video>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="allProductList" id="rel">
                <div class="bodyTitle">{{__('messages.product_rel')}}</div>
                <div class="slider-productList owl-carousel owl-theme">
                    @foreach ($related as $item)
                        <div>
                            <a href="/product/{{$item->slug}}" title="{{$item->titleSeo}}" name="{{$item->title}}">
                                <article>
                                    <figure class="pic">
                                        @if($item->image != '[]')
                                            <img lazy="loading" class="lazyload" style="height:15rem" src="/img/404Image.png" data-src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                                            @if(count(json_decode($item->image)) >= 2)
                                                <img lazy="loading" class="lazyload" style="height:15rem" src="/img/404Image.png" data-src="{{json_decode($item->image)[1]}}" alt="{{$item->imageAlt}}">
                                            @else
                                                <img lazy="loading" class="lazyload" style="height:15rem" src="/img/404Image.png" data-src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                                            @endif
                                        @endif
                                        @if($item->lotteryStatus == 1 && $item->count >= 1)
                                            <div class="lotteryStatus">
                                                <svg class="icon">
                                                    <use xlink:href="#lotteryShow"></use>
                                                </svg>
                                            </div>
                                        @endif
                                        @if($item->colors != '[]')
                                            <div class="colors">
                                                @foreach(json_decode($item->colors) as $value)
                                                    <div class="color" style="background-color: {{$value->color}}"></div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </figure>
                                    @if($item->count >= 1)
                                        <div class="options">
                                            @if($item->inquiry == 0)
                                                <div class="optionItem" name="quickBuy" title="{{__('messages.order_method4')}}" id="{{$item->id}}">
                                                    <svg class="icon">
                                                        <use xlink:href="#time-fast"></use>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="optionItem" name="addCart" title="{{__('messages.add_cart')}}" id="{{$item->id}}">
                                                <svg class="icon">
                                                    <use xlink:href="#add-cart"></use>
                                                </svg>
                                            </div>
                                            <div class="optionItem" name="counselingBtn" title="{{__('messages.counseling_fast')}}" data="{{$item->title}}" id="{{$item->id}}">
                                                <svg class="icon">
                                                    <use xlink:href="#counseling"></use>
                                                </svg>
                                            </div>
                                            <div class="optionItem" name="compareBtn" title="{{__('messages.compare')}}" id="{{$item->product_id}}">
                                                <svg class="icon">
                                                    <use xlink:href="#chart"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="title2">{{$item->title}}</div>
                                    @if($item->count >= 1)
                                        <div class="price">
                                            @if($item->off)
                                                <div class="off">
                                                    <s>{{number_format($item->offPrice)}}</s>
                                                    <div class="offProduct">
                                                        <div class="offProductItem">
                                                            <svg class="icon">
                                                                <use xlink:href="#off-tag"></use>
                                                            </svg>
                                                            <div>
                                                                <span>%{{$item->off}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="price1">{{number_format($item->price)}} {{__('messages.arz')}}</div>
                                        </div>
                                    @endif
                                    @if($item->count <= 0 && $item->prebuy == 0)
                                        <div class="emptyProduct"></div>
                                    @endif
                                    @if($item->count <= 0 && $item->prebuy == 1)
                                        <div class="preProduct"></div>
                                    @endif
                                    @if($item->note)
                                        <div class="note">
                                            <h4>{{$item->note}}</h4>
                                        </div>
                                    @elseif($item->suggest)
                                        <div class="countdown" data-time="{{$item->suggest}}"></div>
                                    @else
                                        <div class="optionDown">
                                            <div class="optionItem" name="addCart" title="{{__('messages.add_cart')}}" id="{{$item->id}}">
                                                <svg class="icon">
                                                    <use xlink:href="#add-cart"></use>
                                                </svg>
                                                {{__('messages.add_cart')}}
                                            </div>
                                            <div class="optionItem" name="counselingBtn" title="{{__('messages.counseling_fast')}}" data="{{$item->title}}" id="{{$item->id}}">
                                                <svg class="icon">
                                                    <use xlink:href="#counseling"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                </article>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div>
            <div class="rightSingle">
                <div class="rightSingleContent">
                    <div class="title1">{{$post->title}}</div>
                    <div class="rate">
                        <div class="rates">
                            <div class="rateItem">
                                @if($post->rates_count >= 1)
                                    <img src="/img/star-on.png" alt="{{__('messages.star1')}}">
                                @elseif($post->rates_count == .5)
                                    <img src="/img/star-half.png" alt="{{__('messages.star2')}}">
                                @else
                                    <img src="/img/star-off.png" alt="{{__('messages.star3')}}">
                                @endif
                            </div>
                            <div class="rateItem">
                                @if($post->rates_count >= 2)
                                    <img src="/img/star-on.png" alt="{{__('messages.star1')}}">
                                @elseif($post->rates_count == 1.5)
                                    <img src="/img/star-half.png" alt="{{__('messages.star2')}}">
                                @else
                                    <img src="/img/star-off.png" alt="{{__('messages.star3')}}">
                                @endif
                            </div>
                            <div class="rateItem">
                                @if($post->rates_count >= 3)
                                    <img src="/img/star-on.png" alt="{{__('messages.star1')}}">
                                @elseif($post->rates_count == 2.5)
                                    <img src="/img/star-half.png" alt="{{__('messages.star2')}}">
                                @else
                                    <img src="/img/star-off.png" alt="{{__('messages.star3')}}">
                                @endif
                            </div>
                            <div class="rateItem">
                                @if($post->rates_count >= 4)
                                    <img src="/img/star-on.png" alt="{{__('messages.star1')}}">
                                @elseif($post->rates_count == 3.5)
                                    <img src="/img/star-half.png" alt="{{__('messages.star2')}}">
                                @else
                                    <img src="/img/star-off.png" alt="{{__('messages.star3')}}">
                                @endif
                            </div>
                            <div class="rateItem">
                                @if($post->rates_count >= 5)
                                    <img src="/img/star-on.png" alt="{{__('messages.star1')}}">
                                @elseif($post->rates_count == 4.5)
                                    <img src="/img/star-half.png" alt="{{__('messages.star2')}}">
                                @else
                                    <img src="/img/star-off.png" alt="{{__('messages.star3')}}">
                                @endif
                            </div>
                        </div>
                        <div class="options">
                            <div class="option" id="likeBtn">
                                @if($like == '')
                                    <svg class="icon">
                                        <use xlink:href="#unlike"></use>
                                    </svg>
                                @else
                                    <svg class="icon">
                                        <use xlink:href="#like"></use>
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="price">
                        @if($levelUser)
                            @if($post->levels)
                                @if($post['levels'] != '[]')
                                    @foreach(json_decode($post['levels']) as $item)
                                        @if(in_array($item->name, $levelUser))
                                            <div class="priceItem">
                                                <div class="title2">{{__('messages.price_me')}} :</div>
                                                <div class="prices">
                                                    <div class="price1">{{number_format($post->price)}}</div>
                                                    <span>{{__('messages.arz')}}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="priceItem">
                                        <div class="title2">{{__('messages.product_price')}} :</div>
                                        <div class="prices">
                                            @if($post->off)
                                                <s>{{number_format($post->offPrice)}}</s>
                                                <div class="offData">%{{$post->off}}</div>
                                            @endif
                                            <div class="price2">{{number_format($post->price)}}</div>
                                            <span>{{__('messages.arz')}}</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="priceItem">
                                        <div class="title2">{{__('messages.product_price')}} :</div>
                                        <div class="prices">
                                            @if($post->off)
                                                <div class="off">
                                                    <s>{{number_format($post->offPrice)}}</s>
                                                    <div class="offData">%{{$post->off}}</div>
                                                </div>
                                            @endif
                                            <div class="priceData">
                                                <div class="price1">{{number_format($post->price)}}</div>
                                                <span>{{__('messages.arz')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="priceItem">
                                    <div class="title2">{{__('messages.product_price')}} :</div>
                                    <div class="prices">
                                        @if($post->off)
                                            <s>{{number_format($post->offPrice)}}</s>
                                            <div class="offData">%{{$post->off}}</div>
                                        @endif
                                        <div class="price1">{{number_format($post->price)}}</div>
                                        <span>{{__('messages.arz')}}</span>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="priceItem">
                                <div class="title2">{{__('messages.product_price')}} :</div>
                                <div class="prices">
                                    @if($post->off)
                                        <s>{{number_format($post->offPrice)}}</s>
                                        <div class="offData">%{{$post->off}}</div>
                                    @endif
                                    <div class="price1">{{number_format($post->price)}}</div>
                                    <span>{{__('messages.arz')}}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($post->colors)
                        @if($post['colors'] != '[]')
                            <div class="optionAdd colorContainer">
                                <div class="swatch clearfix" data-option-index="1">
                                    @foreach (json_decode($post['colors']) as $item)
                                        <div data-value="{{$item->name}}" class="swatch-element color blue available">
                                            <input quickbeam="color" id="{{$item->name}}" count="{{$item->count}}" type="radio" name="color" price="{{$item->price}}" value="{{$item->name}}"  />
                                            <label for="{{$item->name}}" style="{{strpos($item->color, '#') !== false ? 'border-color: '. $item->color : ''}}">
                                                @if(strpos($item->color, '#') !== false)
                                                    <span style="background-color: {{$item->color}}"></span>
                                                @endif
                                                {{$item->name}}
                                                @if(strpos($item->color, '#') === false && $item->color)
                                                    {{$item->color}}
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif
                    @if($post->size)
                        @if($post['size'] != '[]')
                            <div class="optionAdd">
                                <select name="size" id="size">
                                    @foreach (json_decode($post['size']) as $item)
                                        <option value="{{$item->name}}" data="{{$item->price}}" count="{{$item->count}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    @endif
                    <div class="buttonData">
                        <div class="addButton" id="addCart">
                            <button>{{__('messages.add_cart')}}</button>
                        </div>
                    </div>
                    <div class="calls">
                        <a target="_blank" href="https://wa.me/{{\App\Models\Setting::where('key' , 'number')->pluck('value')->first()}}?text=سلام سوال داشتم در مورد {{$post->title}}">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#whatsapp"></use>
                                </svg>
                            </i>
                            {{__('messages.contact1')}}
                        </a>
                        <a href="tel:{{\App\Models\Setting::where('key' , 'number')->pluck('value')->first()}}">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#phone-call"></use>
                                </svg>
                            </i>
                            {{__('messages.contact2')}}
                        </a>
                    </div>
                    <div class="gifOptions options">
                        <a href="/gift" class="warnGift">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#gift"></use>
                                </svg>
                            </i>
                            <p>{{__('messages.get_discount')}}</p>
                        </a>
                        <a href="#videos" class="productVideo">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#video"></use>
                                </svg>
                            </i>
                            <p>{{__('messages.product_video')}}</p>
                        </a>
                        <div class="optionItem" name="quickBuy" title="{{__('messages.order_method4')}}" id="{{$post->id}}">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#time-fast"></use>
                                </svg>
                            </i>
                            <p>{{__('messages.order_method4')}}</p>
                        </div>
                        <div class="optionItem" name="counselingBtn" title="{{__('messages.counseling_fast')}}" data="{{$post->title}}" id="{{$post->id}}">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#counseling"></use>
                                </svg>
                            </i>
                            <p>{{__('messages.counseling_fast')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="floatShop" style="display:none;">
            <div class="addButton" id="addCart">
                <button>{{__('messages.add_cart')}}</button>
            </div>
            <div class="up">
                <i>
                    <svg class="icon">
                        <use xlink:href="#up"></use>
                    </svg>
                </i>
            </div>
        </div>
        @if(!$post->skima)
            <div style="display: none" itemscope itemtype="http://schema.org/Product">
                <h1 itemprop="name">{{$post->title}}</h1>
                <p itemprop="description">{{$post->bodySeo}}</p>
                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <meta itemprop="price" content="{{$post->price}}"/>
                    <meta itemprop="priceCurrency" content="IRR"/>
                    <meta itemprop="availability" content="https://schema.org/InStock"/>
                </div>
                <img itemprop="image" src="{{json_decode($post->image)[0]}}" alt="{{$post->imageAlt}}"/>
                <a itemprop="url" href="/product/{{$post->slug}}">مشاهده محصول</a>
            </div>
        @endif
    </main>
@endsection

@section('jsScript')
    <script src="/js/blowup.min.js"></script>
    <link rel="stylesheet" href="/css/owl.carousel.min.css"/>
    <script src="/js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="/css/jquery.raty.css"/>
    <script src="/js/jquery.raty.js"></script>
    <link rel="stylesheet" href="/css/jquery.toast.min.css"/>
    <script src="/js/jquery.toast.min.js"></script>
    <script src="/js/spritespin.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script src="/js/chart.js"></script>
    <script src="/js/countdown.min.js"></script>
    @include('feed::links')
@endsection

@section('script1')
    <script>
        $(document).ready(function(){
            var post = {!! $post->toJson() !!};
            var finalPrices = {!! json_encode($finalPrices, JSON_HEX_TAG) !!};
            var images = JSON.parse(post.image);
            var tt1 = window.innerWidth <= 800 ? '.leftRes' : '.rightSingle';
            $(".fixedTab").remove();
            var price = finalPrices;
            var price2 = post.price;
            var color = '';
            var size = '';
            var guarantee = '';
            var myStyle = '';
            var unavailable1 = {!! json_encode(__('messages.unavailable1'), JSON_HEX_TAG) !!};
            if(post.colors){
                if(post.colors.length){
                    if(JSON.parse(post.colors)[0]){
                        color = JSON.parse(post.colors)[0].name;
                        if(JSON.parse(post.colors)[0].count <= 0){
                            $('.allSingleIndex4 .rightSingle .addButton').remove();
                            $('.allSingleIndex4 .rightSingle .emptyProduct').remove();
                            $('.detailProducts .addButton').remove();
                            $('.detailProducts .emptyProduct').remove();
                            $('.detailProducts .detailBox').append(
                                $('<div class="emptyProduct"><button>'+unavailable1+'</button></div>')
                            )
                            $('.allSingleIndex4 .rightSingle .buttonData').append(
                                $('<div class="emptyProduct"><button>'+unavailable1+'</button></div>')
                            )
                        }
                    }
                }
            }
            if(post.size){
                if(post.size.length){
                    if(JSON.parse(post.size)[0]){
                        size = JSON.parse(post.size)[0].name;
                        if(JSON.parse(post.size)[0].count <= 0){
                            $('.allSingleIndex4 .rightSingle .addButton').remove();
                            $('.allSingleIndex4 .rightSingle .emptyProduct').remove();
                            $('.detailProducts .addButton').remove();
                            $('.detailProducts .emptyProduct').remove();
                            $('.allSingleIndex4 .rightSingle .buttonData').append(
                                $('<div class="emptyProduct"><button>'+unavailable1+'</button></div>')
                            )
                            $('.detailProducts .detailBox').append(
                                $('<div class="emptyProduct"><button>'+unavailable1+'</button></div>')
                            )
                        }
                    }
                }
            }
            var prebuy1 = {!! json_encode(__('messages.prebuy'), JSON_HEX_TAG) !!};
            var unavailable_size1 = {!! json_encode(__('messages.unavailable_size'), JSON_HEX_TAG) !!};
            var unavailable_color1 = {!! json_encode(__('messages.unavailable_color'), JSON_HEX_TAG) !!};
            var add_cart1 = {!! json_encode(__('messages.add_cart'), JSON_HEX_TAG) !!};
            if(post.count <= 0){
                if(post.prebuy == 1){
                    $('.allSingleIndex4 .rightSingle .addButton').remove();
                    $('.allSingleIndex4 .rightSingle .emptyProduct').remove();
                    $('.allSingleIndex4 .rightSingle .buttonData').append(
                        $('<div class="addButton" id="addCart"><button>'+prebuy1+'</button></div>')
                    )
                }else{
                    $('.allSingleIndex4 .rightSingle .addButton').remove();
                    $('.allSingleIndex4 .rightSingle .emptyProduct').remove();
                }
            }
            if(post.guarantee.length){
                guarantee = post.guarantee[0].id;
            }
            $('.slider-productList').owlCarousel({
                loop:false,
                rtl:true,
                nav:false,
                items:6,
                responsive:{
                    0:{
                        items:2,
                    },
                    800:{
                        items:3,
                    }
                }
            })
            $(".allSingleIndex4 .rightSingle input[name='color']:first").prop("checked", true );
            $(".allSingleIndex4 .leftSingle input[name='color']:first").prop("checked", true );
            $('.countdown').each(function() {
                    var $this = $(this), finalDate = $(this).attr('data-time');
                    $this.countdown(finalDate, function(event) {
                            $this.html(event.strftime(''
                                + '<span class="countdown-section"><span class="countdown-time">%D</span></span>'
                                + '<span class="countdown-section"><span class="countdown-time">%H</span></span>'
                                + '<span class="countdown-section"><span class="countdown-time">%M</span></span>'
                                + '<span class="countdown-section"><span class="countdown-time">%S</span></span>'));
                        }
                    );
                }
            );
            getPrice();
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
            function makePrice2(){
                price2 += '';
                x = price2.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                var finalPrice2 = x1 + x2;
                $(`.allSingleIndex4 ${tt1} .price1`).text(finalPrice2);
                if(post.off){
                    $(`.allSingleIndex4 ${tt1} s`).text(makePrice(parseInt((price2*100)/post.off)));
                }
            }
            $(`.allSingleIndex4 ${tt1} .colorContainer input`).on('change' , function(){
                getPrice()
                color = $(this).attr('id');
                size = $(`.allSingleIndex4 ${tt1} select[name='size']`).val();
                if($(this).attr('count') <= 0){
                    $('.allSingleIndex4 .rightSingle .addButton').remove();
                    $('.allSingleIndex4 .rightSingle .emptyProduct').remove();
                    if(post.prebuy == 1 && post.count <= 0){
                        $('.allSingleIndex4 .rightSingle .buttonData').append(
                            $('<div class="addButton" id="addCart"><button>'+prebuy1+'</button></div>')
                        )
                    }else{
                        $('.allSingleIndex4 .rightSingle .buttonData').append(
                            $('<div class="emptyProduct"><button>'+unavailable_color1+'</button></div>')
                        )
                    }
                }
                else{
                    $('.allSingleIndex4 .rightSingle .addButton').remove();
                    $('.allSingleIndex4 .rightSingle .emptyProduct').remove();
                    if(post.prebuy == 1 && post.count <= 0){
                        $('.allSingleIndex4 .rightSingle .buttonData').append(
                            $('<div class="addButton" id="addCart"><button>'+prebuy1+'</button></div>')
                        )
                    }else{
                        $('.allSingleIndex4 .rightSingle .buttonData').append(
                            $('<div class="addButton" id="addCart"><button>'+add_cart1+'</button></div>')
                        )
                    }
                }
                if(!myStyle){
                    myStyle = $(".imageSlider .owl-item").attr('style');
                }
                $(".imageSlider .owl-stage").css({'width' : 'auto'});
                $(".imageSlider .owl-item").remove();
                if(post.colors){
                    if(post.colors.length){
                        $(JSON.parse(post.colors)).each(function (){
                            if(this.name == color){
                                if(this.image){
                                    var image1 = this.image.split(',');
                                    $(image1).each(function (){
                                        $(".imageSlider .owl-stage").append(
                                            `<div class="owl-item" style="${myStyle}">
                                                <figure>
                                                    <img src="${this}">
                                                </figure>
                                            </div>`
                                        )
                                    })
                                }
                                else{
                                    $(images).each(function (){
                                        $(".imageSlider .owl-stage").append(
                                            `<div class="owl-item" style="${myStyle}">
                                                <figure>
                                                    <img src="${this}">
                                                </figure>
                                            </div>`
                                        )
                                    })
                                }
                            }
                        })
                    }
                }
            })
            $(`.allSingleIndex4 ${tt1} select[name='size']`).on('change' , function(){
                getPrice()
                color = $(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('id');
                size = $(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('value');
                if($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('count') <= 0){
                    $('.allSingleIndex4 .addButton').remove();
                    $('.allSingleIndex4 .emptyProduct').remove();
                    $('.detailProducts .addButton').remove();
                    $('.detailProducts .emptyProduct').remove();
                    if(post.prebuy == 1 && post.count <= 0){
                        $('.allSingleIndex4 .buttonData').append(
                            $('<div class="addButton" id="addCart"><button>'+prebuy1+'</button></div>')
                        )
                    }else{
                        $('.allSingleIndex4 .buttonData').append(
                            $('<div class="emptyProduct"><button>'+unavailable_size1+'</button></div>')
                        )
                    }
                }
                else{
                    $('.allSingleIndex4 .addButton').remove();
                    $('.allSingleIndex4 .emptyProduct').remove();
                    $('.detailProducts .addButton').remove();
                    $('.detailProducts .emptyProduct').remove();
                    if(post.prebuy == 1 && post.count <= 0){
                        $('.allSingleIndex4 .buttonData').append(
                            $('<div class="addButton" id="addCart"><button>'+prebuy1+'</button></div>')
                        )
                    }else{
                        $('.allSingleIndex4 .buttonData').append(
                            $('<div class="addButton" id="addCart"><button>'+add_cart1+'</button></div>')
                        )
                    }
                }

                if(!myStyle){
                    myStyle = $(".imageSlider .owl-item").attr('style');
                }
                $(".imageSlider .owl-stage").css({'width' : 'auto'});
                $(".imageSlider .owl-item").remove();
                if(post.size){
                    if(post.size.length){
                        $(JSON.parse(post.size)).each(function (){
                            if(this.name == size){
                                if(this.image){
                                    var image1 = this.image.split(',');
                                    $(image1).each(function (){
                                        $(".imageSlider .owl-stage").append(
                                            `<div class="owl-item" style="${myStyle}">
                                                <figure>
                                                    <img src="${this}">
                                                </figure>
                                            </div>`
                                        )
                                    })
                                }
                                else{
                                    $(images).each(function (){
                                        $(".imageSlider .owl-stage").append(
                                            `<div class="owl-item" style="${myStyle}">
                                                <figure>
                                                    <img src="${this}">
                                                </figure>
                                            </div>`
                                        )
                                    })
                                }
                            }
                        })
                    }
                }
            })
            $(".allSingleIndex4 .floatShop .up").on('click' , function(){
                window.scrollTo(0, 0);
            })
            $(".allSingleIndex4 .rightSingle .leftRate").on('click' , function(){
                $('.addComments').show();
                $('.btnComment').hide();
                $('.showComments').hide();
                $('html, body').animate({
                    scrollTop: $("#comment").offset().top
                }, 1000);
            })
            $(".allSingleIndex4 .rightSingle select[name='guarantee']").on('change' , function(){
                guarantee = $(".allSingleIndex4 .rightSingle select[name='guarantee'] option:selected").attr('value');
            })
            $('.zoom').attr('src' , images[0]);
            if(window.innerWidth >= 800){
                $(".zoom").blowup({
                    "scale" : 1
                })
            }
            $('.slider-image').owlCarousel({
                loop:false,
                rtl:true,
                nav:true,
                margin:10,
                responsive:{
                    0:{
                        items:4
                    },
                    800:{
                        items:8
                    }
                }
            })
            $(document).on('click', '.slider-image img' , function(){
                $('.zoom').attr('src' , this.currentSrc);
                if(window.innerWidth >= 800) {
                    $(".zoom").blowup({
                        "scale": 1
                    })
                }
            })

            var wait1 = {!! json_encode(__('messages.wait'), JSON_HEX_TAG) !!};
            var success1 = {!! json_encode(__('messages.success'), JSON_HEX_TAG) !!};
            var add_cart21 = {!! json_encode(__('messages.add_cart'), JSON_HEX_TAG) !!};
            var number1 = {!! json_encode(__('messages.number'), JSON_HEX_TAG) !!};
            var arz1 = {!! json_encode(__('messages.arz'), JSON_HEX_TAG) !!};
            var login_attention1 = {!! json_encode(__('messages.login_attention'), JSON_HEX_TAG) !!};
            var error1 = {!! json_encode(__('messages.error1'), JSON_HEX_TAG) !!};
            var no_count1 = {!! json_encode(__('messages.no_count'), JSON_HEX_TAG) !!};
            var count11 = {!! json_encode(__('messages.count1'), JSON_HEX_TAG) !!};
            var max_cart1 = {!! json_encode(__('messages.max_cart1'), JSON_HEX_TAG) !!};
            var max22 = {!! json_encode(__('messages.max2'), JSON_HEX_TAG) !!};
            $(document).on('click','#addCart',function (){
                var addButtonText = $(this).find('button').text();
                $(this).find('button').text(wait1);
                var form = {
                    "_token": "{{ csrf_token() }}",
                    "color": color,
                    "size": size,
                    "guarantee": guarantee,
                    "product": post.id,
                };

                $.ajax({
                    url: "/add-cart",
                    type: "post",
                    data: form,
                    success: function (data) {
                        $('.allSingleIndex4 #addCart').find('button').text(addButtonText);
                        if (data == 'limit'){
                            $.toast({
                                text: no_count1, // Text that is to be shown in the toast
                                heading: count11, // Optional heading to be shown on the toast
                                icon: 'error', // Type of toast icon
                                showHideTransition: 'fade', // fade, slide or plain
                                allowToastClose: true, // Boolean value true or false
                                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                textAlign: 'left',  // Text alignment i.e. left, right or center
                                loader: true,  // Whether to show loader or not. True by default
                                loaderBg: '#c60000',  // Background color of the toast loader
                            });
                        }else if (data == 'maxCart'){
                            $.toast({
                                text: max_cart1, // Text that is to be shown in the toast
                                heading: max22, // Optional heading to be shown on the toast
                                icon: 'error', // Type of toast icon
                                showHideTransition: 'fade', // fade, slide or plain
                                allowToastClose: true, // Boolean value true or false
                                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                textAlign: 'left',  // Text alignment i.e. left, right or center
                                loader: true,  // Whether to show loader or not. True by default
                                loaderBg: '#c60000',  // Background color of the toast loader
                            });
                        }else{
                            Swal.fire({
                                title: success1,
                                text: false,
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'بستن',
                                footer: '<a style="color: red" href="/cart">رفتن به سبد خرید</a>',
                                confirmButtonColor: '#30d633',
                                reverseButtons: true
                            })
                            $.each($('#showCartLi li'), function(key,value) {
                                this.remove();
                            });
                            var count = 0;
                            $.each(data[1],function(){
                                count = count +this.count;
                                var prices = cartPrice(this.price*this.count);
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
                    },
                    error: function (xhr) {
                        $('#addCart').find('button').text(addButtonText);
                        $.toast({
                            text: error1, // Text that is to be shown in the toast
                            heading: login_attention1, // Optional heading to be shown on the toast
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

            var like_add = {!! json_encode(__('messages.like_add'), JSON_HEX_TAG) !!};
            var book_add = {!! json_encode(__('messages.book_add'), JSON_HEX_TAG) !!};
            var log_first = {!! json_encode(__('messages.log_first'), JSON_HEX_TAG) !!};
            var need_login2 = {!! json_encode(__('messages.need_login2'), JSON_HEX_TAG) !!};
            var like_delete = {!! json_encode(__('messages.like_delete'), JSON_HEX_TAG) !!};
            var book_delete = {!! json_encode(__('messages.book_delete'), JSON_HEX_TAG) !!};
            var price1 = {!! json_encode(__('messages.price1'), JSON_HEX_TAG) !!};
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
                                text: like_add, // Text that is to be shown in the toast
                                heading: success1, // Optional heading to be shown on the toast
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
                                text: log_first, // Text that is to be shown in the toast
                                heading: need_login2, // Optional heading to be shown on the toast
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
                                text: like_delete, // Text that is to be shown in the toast
                                heading: success1, // Optional heading to be shown on the toast
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
                                text: book_add, // Text that is to be shown in the toast
                                heading: success1, // Optional heading to be shown on the toast
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
                                text: log_first, // Text that is to be shown in the toast
                                heading: need_login2, // Optional heading to be shown on the toast
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
                                text: book_delete, // Text that is to be shown in the toast
                                heading: success1, // Optional heading to be shown on the toast
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

            function cartPrice(price){
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
            function getPrice(){
                if($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('data')){
                    if($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price') >= 1){
                        if(post.prebuy == 1 && post.count == 0){
                            price = parseInt(post.prePrice) + parseInt($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price')) + parseInt($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('data'));
                            price2 = parseInt(post.prePrice) + parseInt($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price')) + parseInt($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('data'));
                        }else{
                            price = parseInt(finalPrices) + parseInt($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price')) + parseInt($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('data'));
                            price2 = parseInt(post.price) + parseInt($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price')) + parseInt($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('data'));
                        }
                    }
                    else{
                        if(post.prebuy == 1 && post.count == 0 ){
                            price = parseInt(post.prePrice) + parseInt($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('data'));
                            price2 = parseInt(post.prePrice) + parseInt($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('data'));
                        }else{
                            price = parseInt(finalPrices) + parseInt($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('data'));
                            price2 = parseInt(post.price) + parseInt($(`.allSingleIndex4 ${tt1} select[name='size'] option:selected`).attr('data'));
                        }
                    }
                }
                else{
                    if($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price') >= 1){
                        if(post.prebuy == 1 && post.count == 0){
                            price = parseInt(post.prePrice) + parseInt($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price'));
                            price2 = parseInt(post.prePrice) + parseInt($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price'));
                        }else{
                            price = parseInt(finalPrices) + parseInt($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price'));
                            price2 = parseInt(post.price) + parseInt($(`.allSingleIndex4 ${tt1} input[name='color']:checked`).attr('price'));
                        }
                    }
                    else{
                        if(post.prebuy == 1 && post.count == 0){
                            price = parseInt(post.prePrice);
                            price2 = parseInt(post.prePrice);
                        }else{
                            price = parseInt(finalPrices);
                            price2 = parseInt(post.price);
                        }
                    }
                }
                makePrice();
                makePrice2();
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
            $("select[name='tabs']").change(function (){
                var dd = $(this).val();
                $('html, body').animate({
                    scrollTop: $("#"+dd).offset().top
                }, 1000);
            });
        })
        var lastScrollTop = 0;
        var dd = 0;
        $(window).scroll(function(event){
            var st = $(this).scrollTop();
            if(st >= 200){
                $(".allHeaderIndex,.allHeaderIndex2").css({"visibility": "hidden","opacity": "0"});
            }else{
                $(".allHeaderIndex,.allHeaderIndex2").css({"visibility": "visible","opacity": "1"});
            }
            if(st >= 1){
                $(".categoryRes").css({"visibility": "hidden","opacity": "0"});
            }else{
                $(".categoryRes").css({"visibility": "visible","opacity": "1"});
            }
            lastScrollTop = st;
        });
    </script>
@endsection

@section('torobTag')
    <meta name="og:image" content="{{json_decode($post->image)[0]}}">
    <meta name="product_id" content="{{$post->product_id}}">
    <meta name="product_old_price" content="{{$post->offPrice}}">
    <meta name="product_name" content="{{$post->title}}">
    <meta http-equiv="content-language" content="{{$post->language}}">
    <meta name="date" content="{{$post->updated_at}}" />
    <meta name="subject" content="{{$post->short}}">
    @if($post->user)
        <meta name="author" content="{{$post->user->name}}">
        <meta name="creator" content="{{$post->user->name}}">
    @endif
    {!! $post->skima !!}
    {!! $post->rating !!}
    {!! $post->meta !!}
    @if($post->robots)
        <meta name="robots" content="{{$post->robots}}">
    @endif
    @if($post->colors)
        @if($post['colors'] != '[]')
            @if($post->size)
                @if($post['size'] != '[]')
                    <meta name="product_price" content="{{$post->price + json_decode($post['colors'],true)[0]['price'] + json_decode($post['size'],true)[0]['price']}}">
                @else
                    <meta name="product_price" content="{{$post->price + json_decode($post['colors'],true)[0]['price']}}">
                @endif
            @else
                <meta name="product_price" content="{{$post->price + json_decode($post['colors'],true)[0]['price']}}">
            @endif
        @elseif($post->size)
            @if($post['size'] != '[]')
                <meta name="product_price" content="{{$post->price + json_decode($post['size'],true)[0]['price']}}">
            @else
                <meta name="product_price" content="{{$post->price}}">
            @endif
        @else
            <meta name="product_price" content="{{$post->price}}">
        @endif
    @elseif($post->size)
        @if($post['size'] != '[]')
            <meta name="product_price" content="{{$post->price + json_decode($post['size'],true)[0]['price']}}">
        @else
            <meta name="product_price" content="{{$post->price}}">
        @endif
    @else
        <meta name="product_price" content="{{$post->price}}">
    @endif
    @if($post->count == 0)
        <meta name="availability" content="outofstock">
    @else
        <meta name="availability" content="instock">
    @endif
@endsection
