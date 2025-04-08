<div class="allBigIndex">
    <div class="slider-bigIndex owl-carousel owl-theme">
        @foreach(json_decode($data['ads1']) as $item)
            <div class="adsItem">
                <a href="{{$item->address}}">
                    <img lazy="loading" width="1500" height="400" src="{{$item->image}}" alt="{{$item->address}}">
                </a>
            </div>
        @endforeach
    </div>
</div>
