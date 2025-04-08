<div class="allFastSearch width">
    <div class="titleFastSearch"><?php echo e(__('messages.help_search')); ?></div>
    <div class="taxChoice firstTax">
        <div class="title1"><?php echo e(__('messages.help_cat')); ?></div>
        <div class="buttons">
            <button class="cancelCat"><?php echo e(__('messages.no')); ?></button>
            <button class="choiceCat" disabled><?php echo e(__('messages.select_cat')); ?></button>
        </div>
        <div class="categories">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="cat" data="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="taxChoice secTax" style="display:none;">
        <div class="title1"><?php echo e(__('messages.help_brand')); ?></div>
        <div class="buttons">
            <button class="cancelCat"><?php echo e(__('messages.no')); ?></button>
            <button class="choiceCat" disabled><?php echo e(__('messages.select_brand')); ?></button>
        </div>
        <div class="categories">
            <?php $__currentLoopData = $brandIndex; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="brand" data="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="taxChoice thirdTax" style="display:none;">
        <div class="title1"><?php echo e(__('messages.help_property')); ?></div>
        <div class="buttons">
            <button class="choiceCat"><?php echo e(__('messages.search_product')); ?></button>
        </div>
        <div class="categories">
            <div class="brand active" data="0"><?php echo e(__('messages.order_new')); ?></div>
            <div class="brand" data="1"><?php echo e(__('messages.order_cheap')); ?></div>
            <div class="brand" data="2"><?php echo e(__('messages.order_expensive')); ?></div>
            <div class="brand" data="3"><?php echo e(__('messages.order_sell')); ?></div>
            <div class="brand" data="4"><?php echo e(__('messages.order_like')); ?></div>
            <div class="brand" data="5"><?php echo e(__('messages.order_off')); ?></div>
            <div class="brand" data="6"><?php echo e(__('messages.order_suggest')); ?></div>
            <div class="brand" data="7"><?php echo e(__('messages.order_exist')); ?></div>
        </div>
    </div>
    <div class="productShow" style="display:none;">
        <div class="rightProduct">
            <div class="title1"><?php echo e(__('messages.suggest_buy')); ?></div>
            <a href="/" class="productItem">
                <figure class="productPic">
                    <img src="" alt="">
                </figure>
                <h4></h4>
                <div class="price">
                    <s>0</s>
                    <h5>0</h5>
                </div>
                <div class="buttons options">
                    <div name="quickBuy"><?php echo e(__('messages.buy_fast')); ?></div>
                    <div name="addCart"><?php echo e(__('messages.add_cart')); ?></div>
                </div>
            </a>
        </div>
        <div class="leftProduct">
            <h3><?php echo e(__('messages.help_product')); ?></h3>
            <div class="slider-fastSearch owl-carousel owl-theme"></div>
        </div>
    </div>
</div>
<?php /**PATH D:\laravel projects\shop_mobile\resources\views/home/index/fastSearch.blade.php ENDPATH**/ ?>