<div class="faqHome width">
    <div id="faq" class="faq-body">
        <div class="faq-header">
            <div class="faq-title">{{$data['title']}}</div>
        </div>
        <div class="faq-list">
            @foreach(\App\Models\Ask::latest()->where('language' , request()->cookie('language')??'fa')->get() as $item)
                <div>
                    <details>
                        <summary title="{{$item->title}}">{{$item->title}}</summary>
                        <p class="faq-content">{{$item->body}}</p>
                    </details>
                </div>
            @endforeach
        </div>
    </div>
</div>
