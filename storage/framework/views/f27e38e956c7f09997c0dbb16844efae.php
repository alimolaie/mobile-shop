<div class="allAdsIndex width">
    <div class="adsItems">
        <?php $__currentLoopData = json_decode($data['ads1']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="adsItem">
                <a href="<?php echo e($item->address); ?>">
                    <img lazy="loading" src="<?php echo e($item->image); ?>" alt="<?php echo e($item->address); ?>">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/myizonek/public_html/local/resources/views/home/index/adIndex.blade.php ENDPATH**/ ?>