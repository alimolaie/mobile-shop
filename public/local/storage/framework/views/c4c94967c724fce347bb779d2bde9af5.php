<div class="allSliderIndex width">
    <div class="title">
        <div class="title1"><?php echo e($data['title']); ?></div>
        <a href="/archive/<?php echo e($data['slug']); ?>"><?php echo e($data['more']); ?></a>
    </div>
    <div class="slider-products move-products<?php echo e($data['move']); ?> owl-carousel owl-theme">
        <?php $__currentLoopData = $data['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <a href="/product/<?php echo e($item->slug); ?>" title="<?php echo e($item->titleSeo); ?>" name="<?php echo e($item->title); ?>">
                    <article>
                        <figure class="pic">
                            <?php if($item->image != '[]'): ?>
                                <img lazy="loading" class="lazyload" style="height:<?php echo e($data['height']); ?>rem" src="/img/404Image.png" data-src="<?php echo e(json_decode($item->image)[0]); ?>" alt="<?php echo e($item->imageAlt); ?>">
                                <?php if(count(json_decode($item->image)) >= 2): ?>
                                    <img lazy="loading" class="lazyload" style="height:<?php echo e($data['height']); ?>rem" src="/img/404Image.png" data-src="<?php echo e(json_decode($item->image)[1]); ?>" alt="<?php echo e($item->imageAlt); ?>">
                                <?php else: ?>
                                    <img lazy="loading" class="lazyload" style="height:<?php echo e($data['height']); ?>rem" src="/img/404Image.png" data-src="<?php echo e(json_decode($item->image)[0]); ?>" alt="<?php echo e($item->imageAlt); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                        </figure>
                        <div class="title2"><?php echo e($item->title); ?></div>
                        <?php if($item->count >= 1): ?>
                            <div class="price">
                                <div>
                                    <?php if($item->off): ?>
                                        <s><?php echo e(number_format($item->offPrice)); ?></s>
                                    <?php endif; ?>
                                </div>
                                <div class="price1"><?php echo e(number_format($item->price)); ?> <?php echo e(__('messages.arz')); ?></div>
                            </div>
                            <div class="addCartSlide">
                                <div class="showAddData">
                                    <div class="adds" data-max="<?php echo e($item->maxCart); ?>" data-min="<?php echo e($item->minCart); ?>" data-count="<?php echo e($item->count); ?>">
                                        <button class="minus">-</button>
                                        <span class="cartWant"><?php echo e($item->minCart); ?></span>
                                        <button class="add">+</button>
                                    </div>
                                    <div class="addData" data-id="<?php echo e($item->id); ?>">
                                        <i>
                                            <svg class="icon">
                                                <use xlink:href="#cart"></use>
                                            </svg>
                                        </i>
                                        <span class="textCart">
                                            <?php echo e(__('messages.add_cart')); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($item->count <= 0 && $item->prebuy == 0): ?>
                            <div class="emptyProduct"></div>
                        <?php endif; ?>
                        <?php if($item->count <= 0 && $item->prebuy == 1): ?>
                            <div class="preProduct"></div>
                        <?php endif; ?>
                    </article>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH G:\Laravel\NewSeo\seoshop\resources\views/home/index/sliderIndex.blade.php ENDPATH**/ ?>