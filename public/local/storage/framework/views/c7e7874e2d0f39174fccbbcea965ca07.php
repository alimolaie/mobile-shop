<footer class="allFooterIndex">
    <div class="blockFooter width">
        <div class="topFooterIndex">
            <div class="item">
                <div class="itemPic">
                    <svg class="icon">
                        <use xlink:href="#fastGive"></use>
                    </svg>
                </div>
                <div>
                    <div class="title2"><?php echo e(__('messages.type_footer1')); ?></div>
                    <div class="title3"><?php echo e(__('messages.status_footer1')); ?></div>
                </div>
            </div>
            <div class="item">
                <div class="itemPic">
                    <svg class="icon">
                        <use xlink:href="#7day"></use>
                    </svg>
                </div>
                <div>
                    <div class="title2"><?php echo e(__('messages.type_footer2')); ?></div>
                    <div class="title3"><?php echo e(__('messages.status_footer2')); ?></div>
                </div>
            </div>
            <div class="item">
                <div class="itemPic">
                    <svg class="icon">
                        <use xlink:href="#homePay"></use>
                    </svg>
                </div>
                <div>
                    <div class="title2"><?php echo e(__('messages.type_footer3')); ?></div>
                    <div class="title3"><?php echo e(__('messages.status_footer3')); ?></div>
                </div>
            </div>
            <div class="item">
                <div class="itemPic">
                    <svg class="icon">
                        <use xlink:href="#securePay"></use>
                    </svg>
                </div>
                <div>
                    <div class="title2"><?php echo e(__('messages.type_footer4')); ?></div>
                    <div class="title3"><?php echo e(__('messages.status_footer4')); ?></div>
                </div>
            </div>
        </div>
        <div class="midFooter">
            <div class="items">
                <div class="title3"><?php echo e(__('messages.fast1')); ?></div>
                <ul>
                    <?php $__currentLoopData = \App\Models\Link::where('type' , 1)->where('language' , request()->cookie('language')??'fa')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e($item->slug); ?>" title="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="subscribe">
                <div class="subscribeItems">
                    <label for="subscribe"><?php echo e(__('messages.sub_footer')); ?></label>
                    <p><?php echo e(__('messages.sub_footer2')); ?></p>
                    <input type="email" id="subscribe" placeholder="<?php echo e(__('messages.sub_email')); ?>" name="subscribe">
                    <div class="buttons">
                        <button><?php echo e(__('messages.action')); ?></button>
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="title3"><?php echo e(__('messages.trust1')); ?></div>
                <div class="trustFooter">
                    <div><?php echo $etemad; ?></div>
                    <div><?php echo $fanavari; ?></div>
                </div>
            </div>
        </div>
        <div class="botFooter">
            <div class="right"><?php echo e(__('messages.copy1' , ['name' => $name])); ?></div>
            <div class="left">
                <span><?php echo e(__('messages.social1')); ?> :</span>
                <div class="communicationFooterItem">
                    <a href="<?php echo e($telegram); ?>">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#telegram"></use>
                            </svg>
                        </i>
                    </a>
                    <a href="<?php echo e($facebook); ?>">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#facebook"></use>
                            </svg>
                        </i>
                    </a>
                    <a href="<?php echo e($instagram); ?>">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#instagram"></use>
                            </svg>
                        </i>
                    </a>
                    <a href="<?php echo e($twitter); ?>">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#twitter"></use>
                            </svg>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="fixedTab">
        <div class="tabs">
            <div class="rightTab">
                <div class="tab resAlign">
                    <a>
                        <i>
                            <svg class="icon">
                                <use xlink:href="#align"></use>
                            </svg>
                        </i>
                    </a>
                </div>
                <div class="tab">
                    <?php if(Request::is('profile*') || Request::is('login*')): ?>
                        <a href="/profile" class="active">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#user"></use>
                                </svg>
                            </i>
                        </a>
                    <?php else: ?>
                        <a href="/profile">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#user"></use>
                                </svg>
                            </i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="tab homeTab">
                <a href="/">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#home2"></use>
                        </svg>
                    </i>
                </a>
            </div>
            <div class="leftTab">
                <div class="tab">
                    <?php if(Request::is('cart')): ?>
                        <a href="/cart" class="active">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#cart"></use>
                                </svg>
                            </i>
                        </a>
                    <?php else: ?>
                        <a href="/cart">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#cart"></use>
                                </svg>
                            </i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="tab resSearch">
                    <a>
                        <i>
                            <svg class="icon">
                                <use xlink:href="#search"></use>
                            </svg>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    $(document).ready(function(){
        var success1 = <?php echo json_encode(__('messages.success'), JSON_HEX_TAG); ?>;
        var req_email1 = <?php echo json_encode(__('messages.req_email'), JSON_HEX_TAG); ?>;
        var login_attention1 = <?php echo json_encode(__('messages.login_attention'), JSON_HEX_TAG); ?>;
        var email_submit1 = <?php echo json_encode(__('messages.email_submit'), JSON_HEX_TAG); ?>;
        var email_error1 = <?php echo json_encode(__('messages.email_error'), JSON_HEX_TAG); ?>;
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        $('.subscribe button').click(function(){
            var name = $(".subscribe input[name='subscribe']").val();
            if(isEmail(name)){
                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    email:name,
                };
                $.ajax({
                    url: "/send-sub",
                    type: "post",
                    data: form,
                    success: function (data) {
                        if(data == 'ok'){
                            $.toast({
                                text: req_email1, // Text that is to be shown in the toast
                                heading: success1, // Optional heading to be shown on the toast
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
                            $(".subscribe input[name='subscribe']").val('');
                        }else{
                            $.toast({
                                text: email_submit1, // Text that is to be shown in the toast
                                heading: login_attention1, // Optional heading to be shown on the toast
                                icon: 'error', // Type of toast icon
                                showHideTransition: 'fade', // fade, slide or plain
                                allowToastClose: true, // Boolean value true or false
                                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                textAlign: 'left',
                                loader: true,
                                loaderBg: '#c60000',
                            });
                        }
                    },
                });
            }else{
                $.toast({
                    text: email_error1, // Text that is to be shown in the toast
                    heading: login_attention1, // Optional heading to be shown on the toast
                    icon: 'error', // Type of toast icon
                    showHideTransition: 'fade', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    textAlign: 'left',
                    loader: true,
                    loaderBg: '#c60000',
                });
            }
        })
    })
</script>
<?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/home/footer/footerIndex.blade.php ENDPATH**/ ?>