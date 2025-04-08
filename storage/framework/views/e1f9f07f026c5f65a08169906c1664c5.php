<div class="allFilterProduct width">
    <div class="filters">
        <div class="title1">بهترین محصولات ما</div>
        <div class="items catFilter">
            <?php $__currentLoopData = \App\Models\Category::whereIn('id',json_decode($data['cats'],true))->get(['name','id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item <?php echo e($loop->index == 0 ?'active' : ''); ?>" data-type="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="items optionFilter">
            <div class="item active" data-type="0"><?php echo e(__('messages.order_new')); ?></div>
            <div class="item" data-type="1"><?php echo e(__('messages.order_visit')); ?></div>
            <div class="item" data-type="2"><?php echo e(__('messages.order_sell')); ?></div>
            <div class="item" data-type="3"><?php echo e(__('messages.order_like')); ?></div>
            <div class="item" data-type="4"><?php echo e(__('messages.order_cheap')); ?></div>
            <div class="item" data-type="5"><?php echo e(__('messages.order_expensive')); ?></div>
        </div>
    </div>
    <div class="products">
        <div class="productItems right">
            <?php $__currentLoopData = $data['post']->slice(0,4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/product/<?php echo e($item->slug); ?>" class="product">
                    <div class="pic">
                        <img src="<?php echo e(json_decode($item->image)[0]); ?>" alt="<?php echo e($item->imageAlt); ?>">
                    </div>
                    <div class="title"><?php echo e($item->title); ?></div>
                    <div class="price"><?php echo e(number_format($item->price)); ?> <?php echo e(__('messages.arz')); ?></div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="center">
            <?php if(count($data['post']) >= 5): ?>
                <a href="/product/<?php echo e($data['post'][4]->slug); ?>" class="product">
                    <div class="pic">
                        <img src="<?php echo e(json_decode($data['post'][4]->image)[0]); ?>" alt="<?php echo e($data['post'][4]->imageAlt); ?>">
                    </div>
                    <div class="title"><?php echo e($data['post'][4]->title); ?></div>
                    <div class="price"><?php echo e(number_format($data['post'][4]->price)); ?> <?php echo e(__('messages.arz')); ?></div>
                </a>
            <?php endif; ?>
        </div>
        <div class="productItems left">
            <?php $__currentLoopData = $data['post']->slice(6,9); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/product/<?php echo e($item->slug); ?>" class="product">
                    <div class="pic">
                        <img src="<?php echo e(json_decode($item->image)[0]); ?>" alt="<?php echo e($item->imageAlt); ?>">
                    </div>
                    <div class="title"><?php echo e($item->title); ?></div>
                    <div class="price"><?php echo e(number_format($item->price)); ?> <?php echo e(__('messages.arz')); ?></div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH G:\Laravel\NewSeo\seoshop\resources\views/home/index/filterProduct.blade.php ENDPATH**/ ?>