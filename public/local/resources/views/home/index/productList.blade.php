<div class="allProductList width">
    <div class="title">
        <div class="title1">{{$data['title']}}</div>
        <a href="/archive/{{$data['slug']}}">{{$data['more']}}</a>
    </div>
    <div class="slider-productList move-productList{{$data['move']}} owl-carousel owl-theme">
        @foreach ($data['post'] as $item)
            <div>
                <a href="/product/{{$item->slug}}" title="{{$item->titleSeo}}" name="{{$item->title}}">
                    <article>
                        <figure class="pic">
                            @if($item->image != '[]')
                                <img lazy="loading" class="lazyload" style="height:{{$data['height']}}rem" src="/img/404Image.png" data-src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                                @if(count(json_decode($item->image)) >= 2)
                                    <img lazy="loading" class="lazyload" style="height:{{$data['height']}}rem" src="/img/404Image.png" data-src="{{json_decode($item->image)[1]}}" alt="{{$item->imageAlt}}">
                                @else
                                    <img lazy="loading" class="lazyload" style="height:{{$data['height']}}rem" src="/img/404Image.png" data-src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                                @endif
                            @endif
                            @if($item->lotteryStatus == 1 && $item->count >= 1)
                                <div class="lotteryStatus">
                                    <svg class="icon">
                                        <use xlink:href="#lotteryShow"></use>
                                    </svg>
                                </div>
                            @endif
                            @if($item->rate != '[]' && $item->rate != '')
                                <div class="allRateProduct">
                                    @foreach(json_decode($item->rate) as $val)
                                        <div class="rateItem1">
                                            <div class="rateTitle">{{$val->name}}</div>
                                            <div class="rateBody">{{($val->rate * 100) / 4}}%</div>
                                        </div>
                                    @endforeach
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
                                @if($item->inquiry == 0 && $item->type == 0)
                                    <div class="optionItem" name="quickBuy" title="{{__('messages.buy_fast')}}" id="{{$item->id}}">
                                        <svg class="icon">
                                            <use xlink:href="#time-fast"></use>
                                        </svg>
                                    </div>
                                @endif
                                <div class="optionItem" name="addCart" title="{{__('messages.add_cart')}}"  id="{{$item->id}}">
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
                                <div class="price1">
                                    @if(auth()->user())
                                        @if(auth()->user()->roles()->whereIn('name' , collect(json_decode($item['levels']))->pluck('name'))->first())
                                            @if($item->levels)
                                                @if($item['levels'] != '[]')
                                                    @foreach(json_decode($item['levels']) as $val)
                                                        @if(in_array($val->name, auth()->user()->roles()->pluck('name')->toArray()))
                                                            {{number_format($val->price)}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @else
                                            {{number_format($item->price)}}
                                        @endif
                                    @else
                                        {{number_format($item->price)}}
                                    @endif
                                    {{__('messages.arz')}}
                                </div>
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
                                <p>{{$item->note}}</p>
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
