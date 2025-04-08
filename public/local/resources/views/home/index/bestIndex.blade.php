<div class="bestIndex width">
    <div class="bestTitle">
        <svg class="icon">
            <use xlink:href="#pay"></use>
        </svg>
        <div class="title1">{{$data['title']}}</div>
    </div>
    <div class="slider-bestIndex owl-carousel owl-theme">
        <div class="bestItems">
            @if(!empty($data['post'][0]))
            <a href="/product/{{$data['post'][0]->slug}}" title="{{$data['post'][0]->titleSeo}}" name="{{$data['post'][0]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][0]->image != '[]')
                            <img lazy="loading" class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][0]->image)[0]}}" alt="{{$data['post'][0]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">1</div>
                    <div class="title2">{{$data['post'][0]->title}}</div>
                </article>
            </a>
            @endif
            @if(!empty($data['post'][1]))
            <a href="/product/{{$data['post'][1]->slug}}" title="{{$data['post'][1]->titleSeo}}" name="{{$data['post'][1]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][1]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][1]->image)[0]}}" alt="{{$data['post'][1]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">2</div>
                    <div class="title2">{{$data['post'][1]->title}}</div>
                </article>
            </a>
            @endif
            @if(!empty($data['post'][2]))
            <a href="/product/{{$data['post'][2]->slug}}" title="{{$data['post'][2]->titleSeo}}" name="{{$data['post'][2]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][2]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][2]->image)[0]}}" alt="{{$data['post'][2]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">3</div>
                    <div class="title2">{{$data['post'][2]->title}}</div>
                </article>
            </a>
            @endif
        </div>
        <div class="bestItems">
            @if(!empty($data['post'][3]))
            <a href="/product/{{$data['post'][3]->slug}}" title="{{$data['post'][3]->titleSeo}}" name="{{$data['post'][3]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][3]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][3]->image)[0]}}" alt="{{$data['post'][3]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">4</div>
                    <div class="title2">{{$data['post'][3]->title}}</div>
                </article>
            </a>
            @endif
            @if(!empty($data['post'][4]))
            <a href="/product/{{$data['post'][4]->slug}}" title="{{$data['post'][4]->titleSeo}}" name="{{$data['post'][4]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][4]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][4]->image)[0]}}" alt="{{$data['post'][4]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">5</div>
                    <div class="title2">{{$data['post'][4]->title}}</div>
                </article>
            </a>
            @endif
            @if(!empty($data['post'][5]))
            <a href="/product/{{$data['post'][5]->slug}}" title="{{$data['post'][5]->titleSeo}}" name="{{$data['post'][5]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][5]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][5]->image)[0]}}" alt="{{$data['post'][5]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">6</div>
                    <div class="title2">{{$data['post'][5]->title}}</div>
                </article>
            </a>
            @endif
        </div>
        <div class="bestItems">
            @if(!empty($data['post'][6]))
            <a href="/product/{{$data['post'][6]->slug}}" title="{{$data['post'][6]->titleSeo}}" name="{{$data['post'][6]->title}}">
            <article>
                <figure class="pic">
                    @if($data['post'][6]->image != '[]')
                        <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][6]->image)[0]}}" alt="{{$data['post'][6]->imageAlt}}">
                    @endif
                </figure>
                <div class="articleCount">7</div>
                <div class="title2">{{$data['post'][6]->title}}</div>
            </article>
        </a>
            @endif
            @if(!empty($data['post'][7]))
            <a href="/product/{{$data['post'][7]->slug}}" title="{{$data['post'][7]->titleSeo}}" name="{{$data['post'][7]->title}}">
        <article>
            <figure class="pic">
                @if($data['post'][7]->image != '[]')
                    <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][7]->image)[0]}}" alt="{{$data['post'][7]->imageAlt}}">
                @endif
            </figure>
            <div class="articleCount">8</div>
            <div class="title2">{{$data['post'][7]->title}}</div>
        </article>
    </a>
            @endif
            @if(!empty($data['post'][8]))
            <a href="/product/{{$data['post'][8]->slug}}" title="{{$data['post'][8]->titleSeo}}" name="{{$data['post'][8]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][8]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][8]->image)[0]}}" alt="{{$data['post'][8]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">9</div>
                    <div class="title2">{{$data['post'][8]->title}}</div>
                </article>
            </a>
            @endif
        </div>
        <div class="bestItems">
            @if(!empty($data['post'][9]))
                <a href="/product/{{$data['post'][9]->slug}}" title="{{$data['post'][9]->titleSeo}}" name="{{$data['post'][9]->title}}">
                    <article>
                        <figure class="pic">
                            @if($data['post'][9]->image != '[]')
                                <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][9]->image)[0]}}" alt="{{$data['post'][9]->imageAlt}}">
                            @endif
                        </figure>
                        <div class="articleCount">10</div>
                        <div class="title2">{{$data['post'][9]->title}}</div>
                    </article>
                </a>
            @endif
            @if(!empty($data['post'][10]))
            <a href="/product/{{$data['post'][10]->slug}}" title="{{$data['post'][10]->titleSeo}}" name="{{$data['post'][10]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][10]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][10]->image)[0]}}" alt="{{$data['post'][10]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">11</div>
                    <div class="title2">{{$data['post'][10]->title}}</div>
                </article>
            </a>
            @endif
            @if(!empty($data['post'][11]))
            <a href="/product/{{$data['post'][11]->slug}}" title="{{$data['post'][11]->titleSeo}}" name="{{$data['post'][11]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][11]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][11]->image)[0]}}" alt="{{$data['post'][11]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">12</div>
                    <div class="title2">{{$data['post'][11]->title}}</div>
                </article>
            </a>
            @endif
        </div>
        <div class="bestItems">
            @if(!empty($data['post'][12]))
            <a href="/product/{{$data['post'][12]->slug}}" title="{{$data['post'][12]->titleSeo}}" name="{{$data['post'][12]->title}}">
            <article>
                <figure class="pic">
                    @if($data['post'][12]->image != '[]')
                        <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][12]->image)[0]}}" alt="{{$data['post'][12]->imageAlt}}">
                    @endif
                </figure>
                <div class="articleCount">13</div>
                <div class="title2">{{$data['post'][12]->title}}</div>
            </article>
        </a>
            @endif
            @if(!empty($data['post'][13]))
            <a href="/product/{{$data['post'][13]->slug}}" title="{{$data['post'][13]->titleSeo}}" name="{{$data['post'][13]->title}}">
        <article>
            <figure class="pic">
                @if($data['post'][13]->image != '[]')
                    <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][13]->image)[0]}}" alt="{{$data['post'][13]->imageAlt}}">
                @endif
            </figure>
            <div class="articleCount">14</div>
            <div class="title2">{{$data['post'][13]->title}}</div>
        </article>
    </a>
            @endif
            @if(!empty($data['post'][14]))
            <a href="/product/{{$data['post'][14]->slug}}" title="{{$data['post'][14]->titleSeo}}" name="{{$data['post'][14]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][14]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][14]->image)[0]}}" alt="{{$data['post'][14]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">15</div>
                    <div class="title2">{{$data['post'][14]->title}}</div>
                </article>
            </a>
            @endif
        </div>
        <div class="bestItems">
            @if(!empty($data['post'][15]))
            <a href="/product/{{$data['post'][15]->slug}}" title="{{$data['post'][15]->titleSeo}}" name="{{$data['post'][15]->title}}">
            <article>
                <figure class="pic">
                    @if($data['post'][15]->image != '[]')
                        <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][15]->image)[0]}}" alt="{{$data['post'][15]->imageAlt}}">
                    @endif
                </figure>
                <div class="articleCount">16</div>
                <div class="title2">{{$data['post'][15]->title}}</div>
            </article>
        </a>
            @endif
            @if(!empty($data['post'][16]))
            <a href="/product/{{$data['post'][16]->slug}}" title="{{$data['post'][16]->titleSeo}}" name="{{$data['post'][16]->title}}">
        <article>
            <figure class="pic">
                @if($data['post'][16]->image != '[]')
                    <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][16]->image)[0]}}" alt="{{$data['post'][16]->imageAlt}}">
                @endif
            </figure>
            <div class="articleCount">17</div>
            <div class="title2">{{$data['post'][16]->title}}</div>
        </article>
    </a>
            @endif
            @if(!empty($data['post'][17]))
            <a href="/product/{{$data['post'][17]->slug}}" title="{{$data['post'][17]->titleSeo}}" name="{{$data['post'][17]->title}}">
                <article>
                    <figure class="pic">
                        @if($data['post'][17]->image != '[]')
                            <img class="lazyload" src="/img/404Image.png" data-src="{{json_decode($data['post'][17]->image)[0]}}" alt="{{$data['post'][17]->imageAlt}}">
                        @endif
                    </figure>
                    <div class="articleCount">18</div>
                    <div class="title2">{{$data['post'][17]->title}}</div>
                </article>
            </a>
            @endif
        </div>
    </div>
</div>
