@extends('home.master')

@section('title' , __('messages.all_cat') . ' - ')
@section('content')
    <main class="allCategoriesIndex width">
        <h1>{{__('messages.all_cat')}}</h1>
        <ul>
            @foreach($cats as $item)
                <li>
                    <a href="/category/{{$item->slug}}">
                        <figure class="pic">
                            <img src="{{$item->image}}" alt="{{$item->name}}">
                        </figure>
                        <div class="title2">{{$item->name}}</div>
                    </a>
                </li>
            @endforeach
        </ul>
    </main>
@endsection
