<div class="allBigIndex">
    <div class="slider-bigIndex owl-carousel owl-theme">
        <?php $__currentLoopData = json_decode($data['ads1']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="adsItem">
                <a href="<?php echo e($item->address); ?>">
                    <img lazy="loading" width="1500" height="400" src="<?php echo e($item->image); ?>" alt="<?php echo e($item->address); ?>">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/home/index/bigIndex.blade.php ENDPATH**/ ?>