<?php $__env->startSection('title' , __('messages.dashboard') . ' - '); ?>
<?php $__env->startSection('content'); ?>
    <div class="allProfileIndex width">
        <?php echo $__env->make('home.profile.list' , ['tab' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="profileIndex">
            <div class="notes">
                <div class="noteTitle"><?php echo e(__('messages.my_note')); ?></div>
                <div class="items">
                    <?php $__currentLoopData = \App\Models\Event::where('customer_id' , auth()->user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <h4><?php echo e($item->title); ?></h4>
                            <p><?php echo e($item->body); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="profileIndexTop">
                <div class="profileIndexTopItem">
                    <label><?php echo e(__('messages.latest_like')); ?></label>
                    <ul>
                        <?php $__currentLoopData = $likePost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="/product/<?php echo e($item->slug); ?>">
                                    <div class="userItemPic">
                                        <img src="<?php echo e(json_decode($item->image)[0]); ?>" alt="<?php echo e($item->titleSeo); ?>">
                                    </div>
                                    <div class="userItemSubject">
                                        <div class="userItemSubjectTitle"><?php echo e($item->title); ?></div>
                                        <div class="postPriceItem">
                                            <?php if($item->off): ?>
                                                <div class="offPrice">
                                                    <s><?php echo e(number_format($item->offPrice)); ?> <?php echo e(__('messages.arz')); ?></s>
                                                </div>
                                            <?php endif; ?>
                                            <h3><?php echo e(number_format($item->price)); ?> <?php echo e(__('messages.arz')); ?></h3>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="profileIndexTopItemAddress">
                        <a href="/profile/like"><?php echo e(__('messages.all_like')); ?></a>
                    </div>
                </div>
                <div class="profileIndexTopItem">
                    <label><?php echo e(__('messages.latest_book')); ?></label>
                    <ul>
                        <?php $__currentLoopData = $bookmarkPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="/product/<?php echo e($item->slug); ?>">
                                    <div class="userItemPic">
                                        <img src="<?php echo e(json_decode($item->image)[0]); ?>" alt="<?php echo e($item->titleSeo); ?>">
                                    </div>
                                    <div class="userItemSubject">
                                        <div class="userItemSubjectTitle"><?php echo e($item->title); ?></div>
                                        <div class="postPriceItem">
                                            <?php if($item->off): ?>
                                                <div class="offPrice">
                                                    <s><?php echo e(number_format($item->offPrice)); ?> <?php echo e(__('messages.arz')); ?></s>
                                                </div>
                                            <?php endif; ?>
                                            <h3><?php echo e(number_format($item->price)); ?> <?php echo e(__('messages.arz')); ?></h3>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="profileIndexTopItemAddress">
                        <a href="/profile/bookmark"><?php echo e(__('messages.all_book')); ?></a>
                    </div>
                </div>
            </div>
            <div class="profileIndexPay">
                <label><?php echo e(__('messages.latest_order')); ?></label>
                <table>
                    <tr>
                        <th><?php echo e(__('messages.order_deliver')); ?></th>
                        <th><?php echo e(__('messages.order_property')); ?></th>
                        <th><?php echo e(__('messages.buy_status')); ?></th>
                        <th><?php echo e(__('messages.order_created')); ?></th>
                        <th><?php echo e(__('messages.action1')); ?></th>
                    </tr>
                    <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($item->deliver == 0): ?>
                                    <span class="unActive"><?php echo e(__('messages.order_deliver1')); ?></span>
                                <?php endif; ?>
                                <?php if($item->deliver == 1): ?>
                                    <span class="unActive"><?php echo e(__('messages.order_deliver2')); ?></span>
                                <?php endif; ?>
                                <?php if($item->deliver == 2): ?>
                                    <span class="unActive"><?php echo e(__('messages.order_deliver3')); ?></span>
                                <?php endif; ?>
                                <?php if($item->deliver == 3): ?>
                                    <span class="unActive"><?php echo e(__('messages.order_deliver4')); ?></span>
                                <?php endif; ?>
                                <?php if($item->deliver == 4): ?>
                                    <span class="active"><?php echo e(__('messages.order_deliver5')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span><?php echo e($item->property); ?></span>
                            </td>
                            <td>
                                <?php if($item->status == 100): ?>
                                    <span class="active"><?php echo e(__('messages.order_status2')); ?></span>
                                <?php endif; ?>
                                <?php if($item->status == 50): ?>
                                    <span class="active"><?php echo e(__('messages.order_status3')); ?></span>
                                <?php endif; ?>
                                <?php if($item->status == 20): ?>
                                    <span class="active"><?php echo e(__('messages.order_status4')); ?></span>
                                <?php endif; ?>
                                <?php if($item->status == 10): ?>
                                    <span class="unActive"><?php echo e(__('messages.order_status5')); ?></span>
                                <?php endif; ?>
                                <?php if($item->status == 0): ?>
                                    <span class="unActive"><?php echo e(__('messages.order_status6')); ?></span>
                                <?php endif; ?>
                                <?php if($item->status == 1): ?>
                                    <span class="unActive"><?php echo e(__('messages.order_status7')); ?></span>
                                <?php endif; ?>
                                <?php if($item->status == 2): ?>
                                    <span class="unActive"><?php echo e(__('messages.order_status8')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span><?php echo e($item->created_at); ?></span>
                            </td>
                            <td>
                                <a href="/show-pay/<?php echo e($item->property); ?>">
                                    <svg class="icon">
                                        <use xlink:href="#left"></use>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myizonek/public_html/local/resources/views/home/profile/index.blade.php ENDPATH**/ ?>