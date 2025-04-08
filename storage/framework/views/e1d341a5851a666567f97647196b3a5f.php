<div class="allSplash">
    <div class="allLoadings">
        <div class="pic">
            <img src="<?php echo e(\App\Models\Setting::where('key' , 'logo')->pluck('value')->first()); ?>"
                 alt="<?php echo e(\App\Models\Setting::where('key' , 'title')->pluck('value')->first()); ?>">
        </div>
        <p><?php echo e(\App\Models\Setting::where('key' , 'title')->pluck('value')->first()); ?></p>
        <i>
            <svg class="loading">
                <use xlink:href="#loading"></use>
            </svg>
        </i>
    </div>
</div>
<?php /**PATH /home/myizonek/public_html/local/resources/views/home/splash.blade.php ENDPATH**/ ?>