<div class="allHorizonProduct width">
    <div class="title">
        <div class="title1">{{$data['title']}}</div>
        <div class="items catFilter">
            @foreach(\App\Models\Category::whereIn('id',json_decode($data['cats'],true))->get(['name','id']) as $item)
                <div class="item {{$loop->index == 0 ?'active' : ''}}" data-type="{{$item->id}}">{{$item->name}}</div>
            @endforeach
        </div>
    </div>
    <div class="products">
        @foreach($data['post'] as $item)
            <a href="/product/{{$item->slug}}" class="item">
                <figure>
                    <img src="{{json_decode($item->image)[0]}}" alt="{{$item->imageAlt}}">
                </figure>
                <div class="detail">
                    <div class="title2">{{$item->title}}</div>
                    <div class="title3">{{$item->titleEn}}</div>
                    <div class="price">{{number_format($item->price)}} {{__('messages.arz')}}</div>
                </div>
                <i>
                    <svg class="icon">
                        <use xlink:href="#cart"></use>
                    </svg>
                </i>
            </a>
        @endforeach
    </div>
</div>
