<div class="productList3 width">
    <div class="image">
        <div class="pic">
            <img src="{{$data['background2']}}" alt="{{$data['title']}}">
        </div>
        <div class="detail">
            <div class="title">{{$data['title']}}</div>
            <a href="/archive/{{$data['slug']}}">{{$data['more']}}</a>
        </div>
    </div>
    <div class="products">
        @foreach ($data['post'] as $item)
            <a href="/product/{{$item->slug}}" class="product">
                <div class="pic">
                    @if($item->image != '[]')
                        <img lazy="loading" class="lazyload" style="height:{{$data['height']}}rem" src="/img/404Image.png" data-src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                    @endif
                </div>
                <div class="title">{{$item->title}}</div>
                @if($item->count >= 1)
                    <div class="price">
                        @if($item->off)
                            <div class="off">
                                <s>{{number_format($item->offPrice)}}</s>
                            </div>
                        @else
                            <div class="off"></div>
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
                @else
                    <div class="empty">ناموجود</div>
                @endif
            </a>
        @endforeach
    </div>
</div>
