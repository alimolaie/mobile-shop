<div class="allSplash">
    <div class="allLoadings">
        <div class="pic">
            <img src="{{\App\Models\Setting::where('key' , 'logo')->pluck('value')->first()}}"
                 alt="{{\App\Models\Setting::where('key' , 'title')->pluck('value')->first()}}">
        </div>
        <p>{{\App\Models\Setting::where('key' , 'title')->pluck('value')->first()}}</p>
        <i>
            <svg class="loading">
                <use xlink:href="#loading"></use>
            </svg>
        </i>
    </div>
</div>
