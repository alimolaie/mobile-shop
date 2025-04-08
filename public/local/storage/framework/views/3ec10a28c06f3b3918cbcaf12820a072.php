<div class="allCategoryIndex width">
    <div class="title">
        <div class="title1"><?php echo e($data['title']); ?></div>
    </div>
    <div class="catItems">
        <?php $__currentLoopData = $data['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <div class="rightCat">
                    <div class="title2"><?php echo e($item['name']); ?></div>
                    <a href="/category/<?php echo e($item['slug']); ?>">مشاهده محصولات</a>
                </div>
                <div class="leftCat">
                    <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>">
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/home/index/allCategory.blade.php ENDPATH**/ ?>