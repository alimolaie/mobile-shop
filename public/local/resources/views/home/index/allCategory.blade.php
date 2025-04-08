<div class="allCategoryIndex width">
    <div class="title">
        <div class="title1">{{$data['title']}}</div>
    </div>
    <div class="catItems">
        @foreach ($data['post'] as $item)
            <div class="item">
                <div class="rightCat">
                    <div class="title2">{{$item['name']}}</div>
                    <a href="/category/{{$item['slug']}}">مشاهده محصولات</a>
                </div>
                <div class="leftCat">
                    <img src="{{$item['image']}}" alt="{{$item['name']}}">
                </div>
            </div>
        @endforeach
    </div>
</div>
