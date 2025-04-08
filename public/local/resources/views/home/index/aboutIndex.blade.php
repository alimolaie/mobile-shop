<div class="allAboutIndex width">
    <div class="rightAbout">
        <div class="top">
            <div class="title">{{$data['title']}}</div>
            <p>{{$data['description']}}</p>
        </div>
        <div class="bottom">
            @foreach (json_decode($data['ads2']) as $item)
                <a href="{{$item->address}}" id="{{$item->address}}">
                    <img lazy="loading" src="{{$item->image}}" alt="{{$item->address}}">
                </a>
            @endforeach
        </div>
    </div>
    <div class="leftAbout">
        <img lazy="loading" src="{{$data['background2']}}" alt="{{$data['title']}}">
    </div>
</div>
