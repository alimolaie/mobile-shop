<div class="momentProduct width">
    <div class="rightMoment">
        <div class="rightMomentTitle">{{$data['title']}}</div>
        <div class="slider-moment owl-carousel owl-theme">
            @foreach ($data['post'] as $item)
                <div>
                    <a href="/product/{{$item->slug}}" title="{{$item->titleSeo}}" name="{{$item->title}}">
                        <article>
                            <figure class="pic">
                                <div class="picBlock">
                                    @if($item->image != '[]')
                                        <img lazy="loading" class="lazyload" src="/img/404Image.png" data-src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                                    @endif
                                    @if($item->colors != '[]' && $item->colors != "[]" && $item->colors)
                                        <div class="colors">
                                            @foreach(json_decode($item->colors) as $value)
                                                <div class="color" style="background-color: {{$value->color}}"></div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </figure>
                            <div class="leftProduct">
                                <div class="title2">{{$item->title}}</div>
                                <div class="starProduct">
                                    <svg class="icon">
                                        <use xlink:href="#star"></use>
                                    </svg>
                                    @if($item->rates_count)
                                        <span>{{$item->rates_count}}</span>
                                    @else
                                        <span>0</span>
                                    @endif
                                </div>
                                <div class="price">
                                    @if($item->off)
                                        <s>{{number_format($item->offPrice)}}</s>
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
                                @if($item->ability != '[]' && $item->ability != "[]" && $item->ability)
                                    <div class="ability">
                                        <h4>{{__('messages.product_property')}} :</h4>
                                        <ul>
                                            @foreach(json_decode($item->ability) as $value)
                                                @if($loop->index <= 3)
                                                <li>{{$value->name}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="leftMoment">
        <div class="title1">
            <svg class="icon">
                <use xlink:href="#clock"></use>
            </svg>
            {{__('messages.suggest_moment')}}
        </div>
        <div class="slider-moment2 owl-carousel owl-theme">
            @foreach ($moment as $item)
                <div>
                    <a href="/product/{{$item->slug}}" name="{{$item->title}}" title="{{$item->title}}">
                        <article>
                            <div class="timer"></div>
                            <div class="momentPic">
                                @if($item->image != '[]')
                                    <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                                @endif
                            </div>
                            <div class="title2">{{$item->title}}</div>
                            <div class="price1">{{number_format($item->price)}} {{__('messages.arz')}}</div>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
