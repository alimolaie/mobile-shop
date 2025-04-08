<div class="allHorizonProduct width">
    <div class="title">
        <div class="title1"><?php echo e($data['title']); ?></div>
        <div class="items catFilter">
            <?php $__currentLoopData = \App\Models\Category::whereIn('id',json_decode($data['cats'],true))->get(['name','id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item <?php echo e($loop->index == 0 ?'active' : ''); ?>" data-type="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="products">
        <?php $__currentLoopData = $data['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/product/<?php echo e($item->slug); ?>" class="item">
                <figure>
                    <img src="<?php echo e(json_decode($item->image)[0]); ?>" alt="<?php echo e($item->imageAlt); ?>">
                </figure>
                <div class="detail">
                    <div class="title2"><?php echo e($item->title); ?></div>
                    <div class="title3"><?php echo e($item->titleEn); ?></div>
                    <div class="price"><?php echo e(number_format($item->price)); ?> <?php echo e(__('messages.arz')); ?></div>
                </div>
                <i>
                    <svg class="icon">
                        <use xlink:href="#cart"></use>
                    </svg>
                </i>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH G:\Laravel\NewSeo\seoshop\resources\views/home/index/horizonProduct.blade.php ENDPATH**/ ?>