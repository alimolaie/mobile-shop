<div class="allAdsIndex2 width">
    <div class="title">
        <div class="title1">{{$data['title']}}</div>
    </div>
    <div class="adsItems">
        @foreach(json_decode($data['ads1']) as $item)
            <div class="adsItem">
                <a href="{{$item->address}}">
                    <img lazy="loading" src="{{$item->image}}" alt="{{$item->address}}">
                </a>
            </div>
        @endforeach
    </div>
</div>
