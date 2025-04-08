<div class="allFilterProduct width">
    <div class="filters">
        <div class="title1">بهترین محصولات ما</div>
        <div class="items catFilter">
            @foreach(\App\Models\Category::whereIn('id',json_decode($data['cats'],true))->get(['name','id']) as $item)
                <div class="item {{$loop->index == 0 ?'active' : ''}}" data-type="{{$item->id}}">{{$item->name}}</div>
            @endforeach
        </div>
        <div class="items optionFilter">
            <div class="item active" data-type="0">{{__('messages.order_new')}}</div>
            <div class="item" data-type="1">{{__('messages.order_visit')}}</div>
            <div class="item" data-type="2">{{__('messages.order_sell')}}</div>
            <div class="item" data-type="3">{{__('messages.order_like')}}</div>
            <div class="item" data-type="4">{{__('messages.order_cheap')}}</div>
            <div class="item" data-type="5">{{__('messages.order_expensive')}}</div>
        </div>
    </div>
    <div class="products">
        <div class="productItems right">
            @if(count($data['post']) >= 1)
                @foreach($data['post']->slice(0,4) as $item)
                    <a href="/product/{{$item->slug}}" class="product">
                        <div class="pic">
                            <img src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                        </div>
                        <div class="title">{{$item->title}}</div>
                        <div class="price">{{number_format($item->price)}} {{__('messages.arz')}}</div>
                    </a>
                @endforeach
            @endif
        </div>
        <div class="center">
            @if(count($data['post']) >= 5)
                <a href="/product/{{$data['post'][4]->slug}}" class="product">
                    <div class="pic">
                        <img src="{{json_decode($data['post'][4]->image)[0]}}" alt="{{$data['post'][4]->imageAlt}}">
                    </div>
                    <div class="title">{{$data['post'][4]->title}}</div>
                    <div class="price">{{number_format($data['post'][4]->price)}} {{__('messages.arz')}}</div>
                </a>
            @endif
        </div>
        <div class="productItems left">
            @if(count($data['post']) >= 7)
                @foreach($data['post']->slice(6,9) as $item)
                    <a href="/product/{{$item->slug}}" class="product">
                        <div class="pic">
                            <img src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                        </div>
                        <div class="title">{{$item->title}}</div>
                        <div class="price">{{number_format($item->price)}} {{__('messages.arz')}}</div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>
