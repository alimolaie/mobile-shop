<footer class="allFooterIndex3">
    <div class="topFooter width">
        <div class="container">
            <h2><?php echo e(\App\Models\Setting::where('key' , 'footerTitle')->pluck('value')->first()); ?></h2>
            <p><?php echo e(\App\Models\Setting::where('key' , 'about')->pluck('value')->first()); ?></p>
            <div class="data">
                <div class="item">
                    پشتیبانی : <?php echo e(\App\Models\Setting::where('key' , 'email')->pluck('value')->first()); ?>

                </div>
                <div class="item">
                    شماره تماس :
                    <span><?php echo e(\App\Models\Setting::where('key' , 'number')->pluck('value')->first()); ?></span>
                </div>
            </div>
        </div>
        <div class="container">
            <span class="titleFooter">دسترسی سریع</span>
            <ul>
                <?php $__currentLoopData = \App\Models\Link::orderBy('number')->where('type',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="container">
            <span class="titleFooter">آخرین محصولات</span>
            <ul>
                <?php $__currentLoopData = \App\Models\Product::where('status',1)->latest()->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e($item->type == 0 ? '/product/'.$item->slug:'/download/'.$item->slug); ?>"><?php echo e($item->title); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <a href="/faq" class="detail">ارسال درخواست</a>
        </div>
        <div class="container grids">
            <span class="titleFooter">برگه ها</span>
            <div class="containerRights">
                <ul>
                    <?php $__currentLoopData = \App\Models\Page::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="/page/<?php echo e($item->slug); ?>"><?php echo e($item->title); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="trustFooter">
                    <a><?php echo \App\Models\Setting::where('key' , 'etemad')->pluck('value')->first(); ?></a>
                    <a><?php echo \App\Models\Setting::where('key' , 'fanavari')->pluck('value')->first(); ?></a>
                </div>
            </div>
        </div>
        <div class="containerRes">
            <div class="trustFooter">
                <a><?php echo \App\Models\Setting::where('key' , 'etemad')->pluck('value')->first(); ?></a>
                <a><?php echo \App\Models\Setting::where('key' , 'fanavari')->pluck('value')->first(); ?></a>
            </div>
            <a href="/faq" class="detail">سوالات متداول</a>
        </div>
    </div>
    <div class="botFooter">
        <div class="blockFooter width">
            <div class="social">
                <a href="<?php echo e(\App\Models\Setting::where('key' , 'telegram')->pluck('value')->first()); ?>" title="تلگرام">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#telegram"></use>
                        </svg>
                    </i>
                </a>
                <a href="<?php echo e(\App\Models\Setting::where('key' , 'facebook')->pluck('value')->first()); ?>" title="فیسبوک">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#facebook"></use>
                        </svg>
                    </i>
                </a>
                <a href="<?php echo e(\App\Models\Setting::where('key' , 'instagram')->pluck('value')->first()); ?>" title="اینستاگرام">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#instagram"></use>
                        </svg>
                    </i>
                </a>
                <a href="<?php echo e(\App\Models\Setting::where('key' , 'twitter')->pluck('value')->first()); ?>" title="توییتر">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#twitter"></use>
                        </svg>
                    </i>
                </a>
            </div>
            <div class="emails"><?php echo e(\App\Models\Setting::where('key' , 'email')->pluck('value')->first()); ?></div>
            <div class="copyWrite"> کلیه حقوق این وبسایت برای <?php echo e(\App\Models\Setting::where('key' , 'name')->pluck('value')->first()); ?> محفوظ است. </div>
        </div>
    </div>
</footer>
<?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/home/footer/footerIndex3.blade.php ENDPATH**/ ?>