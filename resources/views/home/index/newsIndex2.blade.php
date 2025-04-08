<div class="allNewsIndex2 width">
    <div class="title">
        <div class="title1">{{$data['title']}}</div>
        <a href="/blogs">{{__('messages.show_all')}}</a>
    </div>
    <div class="posts">
        @if(count($data['post']) >= 1)
            <div class="right">
                <a href="/blog/{{$data['post'][0]['slug']}}" title="{{$data['post'][0]->titleSeo}}">
                    <article>
                        <figure class="pic">
                            <img lazy="loading" class="lazyload" src="/img/404Image.png" data-src="{{$data['post'][0]['image']}}" alt="{{$data['post'][0]['imageAlt']}}">
                        </figure>
                        <div class="title2">{{$data['post'][0]['title']}}</div>
                    </article>
                </a>
            </div>
        @endif
        @if(count($data['post']) >= 2)
            <div class="left">
                <ul>
                    @foreach ($data['post']->slice(1,4) as $item)
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
        @endif
    </div>
</div>
