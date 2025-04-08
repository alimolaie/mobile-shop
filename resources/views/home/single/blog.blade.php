@extends('home.master')

@section('title' , $post->titleSeo)
@section('content')
    <main class="allSingleNews width">
    <div class="right">
        <figure class="pic">
            <img class="lazyload" src="/img/404Image.png" data-src="{{$post->image}}" alt="{{$post->imageAlt}}">
        </figure>
        <div class="postsList">
            <div class="titleList">
                {{__('messages.suggest')}}
            </div>
            <ul>
                @foreach($suggest as $item)
                    <li>
                        <a href="/blog/{{$item->slug}}" title="{{$item->titleSeo}}">
                            <img src="{{$item->image}}" alt="{{$item->imageAlt}}">
                            <div class="showInfo">
                                <div class="title1">{{$item->title}}</div>
                                <span>{{$item->created_at}}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="postsList">
            <div class="titleList">
                {{__('messages.blog_rel')}}
            </div>
            <ul>
                @foreach($related as $item)
                    <li>
                        <a href="/blog/{{$item->slug}}" title="{{$item->titleSeo}}">
                            <img src="{{$item->image}}" alt="{{$item->imageAlt}}">
                            <div class="showInfo">
                                <div class="title1">{{$item->title}}</div>
                                <span>{{$item->created_at}}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="left">
        <h1>{{$post->title}}</h1>
        <div class="leftItem">
            <div class="option">
                <div class="title1">{{__('messages.cats')}}</div>
                @if(count($post->category) >= 1)
                    <a href="/blog/category/{{$post->category[0]->slug}}">{{$post->category[0]->name}}</a>
                @else
                    <a>{{__('messages.empty_cats')}}</a>
                @endif
            </div>
            <div class="option">
                <div class="title2">{{__('messages.blog_time')}}</div>
                <a>
                    <span>
                        {{$post->time}}
                    </span>
                    {{__('messages.minute')}}
                </a>
            </div>
        </div>
        @if(count($fields) >= 1)
            <div class="fieldData">
                @foreach($fields as $item)
                    <div class="option">
                        <div class="title1">{{\App\Models\Field::where('id' , $item->field_id)->pluck('name')->first()}}</div>
                        <div class="title3">{{$item->value}}</div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="leftP">{!! $post->body !!}</div>
        @if($post->video)
            <video
                id="vid1"
                controls
                preload="auto"
                class="video-js vjs-fluid vjs-default-skin vjs-big-play-centered"
                data-setup="{}"
                poster="{{$post->image}}"
                style="height: 15rem;"
            >
                <source src="{{$post->video}}" type="video/mp4">
            </video>
        @endif
        <div class="tags">
            <div class="title1">{{__('messages.tags')}} :</div>
            <ul>
                @foreach($post->tag as $item)
                    <li>
                        <a href="/blog/tag/{{$item->slug}}" title="{{$item->nameSeo}}">#{{$item->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</main>
@endsection
