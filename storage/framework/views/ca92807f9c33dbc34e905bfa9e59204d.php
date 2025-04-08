<div class="allAboutIndex width">
    <div class="rightAbout">
        <div class="top">
            <div class="title"><?php echo e($data['title']); ?></div>
            <p><?php echo e($data['description']); ?></p>
        </div>
        <div class="bottom">
            <?php $__currentLoopData = json_decode($data['ads2']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($item->address); ?>" id="<?php echo e($item->address); ?>">
                    <img lazy="loading" src="<?php echo e($item->image); ?>" alt="<?php echo e($item->address); ?>">
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="leftAbout">
        <img lazy="loading" src="<?php echo e($data['background2']); ?>" alt="<?php echo e($data['title']); ?>">
    </div>
</div>
<?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/home/index/aboutIndex.blade.php ENDPATH**/ ?>