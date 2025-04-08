<div class="allNewsIndex width">
    <div class="title">
        <div class="title1">{{$data['title']}}</div>
        <a href="/blogs">{{__('messages.show_all')}}</a>
    </div>
    <ul>
        @foreach ($data['post'] as $item)
            <li>
                <a href="/blog/{{$item['slug']}}" title="{{$item->titleSeo}}">
                    <article>
                        <figure class="pic">
                            <img lazy="loading" class="lazyload" src="/img/404Image.png" data-src="{{$item['image']}}" alt="{{$item['imageAlt']}}">
                        </figure>
                        <div class="title2">{{$item['title']}}</div>
                    </article>
                </a>
            </li>
        @endforeach
    </ul>
</div>
