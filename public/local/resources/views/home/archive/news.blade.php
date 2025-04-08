@extends('home.master')

@section('title' , $category->name . ' - ')
@section('content')
    <div class="allNews width">
        <div class="topBlogs">
            <div class="allNewsRight">
                <div class="allNewsRightItems">
                    @foreach ($news as $item)
                        <a class="allNewsRightItem" href="/blog/{{$item->slug}}" title="{{$item->titleSeo}}">
                            <figure>
                                <img src="{{$item->image}}" alt="{{$item->imageAlt}}">
                            </figure>
                            <div class="allNewsRightItemOver">
                                <div class="title2">{{$item->title}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="allNewsSideBar">
                <div class="allNewsSideBarItem">
                    <label>{{__('messages.suggest')}}</label>
                    <ul>
                        @foreach($suggest as $item)
                            <li>
                                <article>
                                    <a href="/blog/{{$item->slug}}" title="{{$item->titleSeo}}">
                                        <figure>
                                            <img src="{{$item->image}}" alt="{{$item->imageAlt}}">
                                        </figure>
                                        <div class="showInfo">
                                            <div class="title2">{{$item->title}}</div>
                                            <span>{{$item->created_at}}</span>
                                        </div>
                                    </a>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="description">
            <h1>{{$category->name}}</h1>
            <p>{!! $category->body !!}</p>
        </div>
    </div>
@endsection
