<div class="allProfileList">
    <div class="allUserIndexList">
        <div class="allUserIndexListsUser">
            <div class="allUserIndexListsUserPic">
                <div class="pic">
                    <?php if(auth()->user()->profile): ?>
                        <img src="<?php echo e(auth()->user()->profile); ?>" alt="<?php echo e(auth()->user()->name); ?>">
                    <?php else: ?>
                        <img src="/img/user.png" alt="<?php echo e(auth()->user()->name); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="allUserIndexListsUserItem">
                <div class="allUserIndexListsUserName"><?php echo e(auth()->user()->name); ?></div>
            </div>
            <h4> <?php echo e(__('messages.identification_code')); ?> : <?php echo e(auth()->user()->referral); ?></h4>
            <h4> <?php echo e(__('messages.my_score')); ?> : <?php echo e($scores); ?></h4>
        </div>
        <?php if(!\App\Models\Gift::where('user_id',auth()->id())->whereDate('created_at',now()->today())->where('type',3)->first()): ?>
            <div class="collectGift"><?php echo e(__('messages.collect_gift')); ?></div>
        <?php endif; ?>
        <div class="allUserIndexListItems">
            <a href="/profile/personal-info"><?php echo e(__('messages.user_edit')); ?></a>
            <a href="/logout"><?php echo e(__('messages.exit_user')); ?></a>
        </div>
    </div>
    <div class="walletData">
        <i>
            <svg class="icon">
                <use xlink:href="#wallet"></use>
            </svg>
        </i>
        <h3><?php echo e(number_format($wallet)); ?> <span><?php echo e(__('messages.arz')); ?></span></h3>
        <a href="/charge"><?php echo e(__('messages.charge1')); ?></a>
    </div>
    <?php if(\App\Models\Setting::where('key' , 'sellerStatus')->pluck('value')->first()): ?>
        <?php if($checkSeller == 1): ?>
            <a class="becomeList" href="/seller/dashboard">
                <h4>
                    <i>
                        <svg class="icon">
                            <use xlink:href="#seller"></use>
                        </svg>
                    </i>
                    <?php echo e(__('messages.seller_panel')); ?>

                </h4>
                <div class="pic"></div>
            </a>
        <?php else: ?>
            <a class="becomeList" href="/become-seller">
                <h4>
                    <i>
                        <svg class="icon">
                            <use xlink:href="#seller"></use>
                        </svg>
                    </i>
                    <?php echo e(__('messages.seller')); ?>

                </h4>
                <div class="pic"></div>
            </a>
        <?php endif; ?>
    <?php endif; ?>
    <div class="allUserIndexListsItems">
        <div class="allUserIndexListsItem">
            <a href="/profile/subcategory"><?php echo e(__('messages.sub1')); ?></a>
            <?php if($tab == 6): ?>
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            <?php endif; ?>
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/pay"><?php echo e(__('messages.order_user')); ?></a>
            <?php if($tab == 1): ?>
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            <?php endif; ?>
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/like"><?php echo e(__('messages.like_user')); ?></a>
            <?php if($tab == 2): ?>
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            <?php endif; ?>
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/convert"><?php echo e(__('messages.change_score')); ?></a>
            <?php if($tab == 7): ?>
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            <?php endif; ?>
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/bookmark"><?php echo e(__('messages.bookmark_user')); ?></a>
            <?php if($tab == 3): ?>
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            <?php endif; ?>
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/comment"><?php echo e(__('messages.comments')); ?></a>
            <?php if($tab == 4): ?>
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            <?php endif; ?>
        </div>
        <div class="allUserIndexListsItem">
            <a href="/ticket"><?php echo e(__('messages.ticket1')); ?></a>
            <?php if($tab == 5): ?>
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            <?php endif; ?>
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile/counseling"><?php echo e(__('messages.counseling')); ?></a>
            <?php if($tab == 6): ?>
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            <?php endif; ?>
        </div>
        <div class="allUserIndexListsItem">
            <a href="/profile"><?php echo e(__('messages.dashboard')); ?></a>
            <?php if($tab == 0): ?>
                <i>
                    <svg class="icon">
                        <use xlink:href="#left"></use>
                    </svg>
                </i>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.collectGift').on('click',function(){
            $(this).text('صبر کنید...');
            var form = {
                "_token": "<?php echo e(csrf_token()); ?>",
            };
            $.ajax({
                url: "/get-collect-gift",
                type: "post",
                data: form,
                success: function (data) {
                    $.toast({
                        text: 'امتیاز ثبت شد', // Text that is to be shown in the toast
                        heading: 'موفقیت آمیز', // Optional heading to be shown on the toast
                        icon: 'success', // Type of toast icon
                        showHideTransition: 'fade', // fade, slide or plain
                        allowToastClose: true, // Boolean value true or false
                        hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                        position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                        textAlign: 'left',  // Text alignment i.e. left, right or center
                        loader: true,  // Whether to show loader or not. True by default
                        loaderBg: '#9EC600',  // Background color of the toast loader
                    });
                    window.location.reload();
                },
            });
        })
    })
</script>
<?php /**PATH D:\laravel projects\shop_mobile\resources\views/home/profile/list.blade.php ENDPATH**/ ?>