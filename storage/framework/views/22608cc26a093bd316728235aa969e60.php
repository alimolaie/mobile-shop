<div class="allFooter">
    <i class="shape1">
        <svg class="icon">
            <use xlink:href="#shape1"></use>
        </svg>
    </i>
    <div class="width">
        <div class="topFooter">
            <div class="option">
                <i>
                    <svg class="icon">
                        <use xlink:href="#phone-call"></use>
                    </svg>
                </i>
                <div class="des">
                    <div class="desT"><?php echo e(__('messages.call_us')); ?></div>
                    <?php echo e(\App\Models\Setting::where('key' , 'number')->pluck('value')->first()); ?>

                </div>
            </div>
            <div class="option">
                <i>
                    <svg class="icon">
                        <use xlink:href="#email"></use>
                    </svg>
                </i>
                <div class="des">
                    <div class="desT"><?php echo e(__('messages.email_us')); ?></div>
                    <?php echo e(\App\Models\Setting::where('key' , 'email')->pluck('value')->first()); ?>

                </div>
            </div>
            <div class="option">
                <i>
                    <svg class="icon">
                        <use xlink:href="#location"></use>
                    </svg>
                </i>
                <div class="des">
                    <div class="desT"><?php echo e(__('messages.address_us')); ?></div>
                    <?php echo e(\Illuminate\Support\Facades\App::getLocale() == 'fa' ? \App\Models\Setting::where('key' , 'address')->pluck('value')->first():''); ?>

                    <?php echo e(\Illuminate\Support\Facades\App::getLocale() == 'en' ? \App\Models\Setting::where('key' , 'addressEn')->pluck('value')->first():''); ?>

                    <?php echo e(\Illuminate\Support\Facades\App::getLocale() == 'ar' ? \App\Models\Setting::where('key' , 'addressAr')->pluck('value')->first():''); ?>

                    <?php echo e(\Illuminate\Support\Facades\App::getLocale() == 'tr' ? \App\Models\Setting::where('key' , 'addressTr')->pluck('value')->first():''); ?>

                </div>
            </div>
        </div>
        <div class="centerFooter">
            <div class="right">
                <figure class="pic">
                    <a href="/">
                        <img src="<?php echo e(\App\Models\Setting::where('key' , 'logo')->pluck('value')->first()); ?>" alt="<?php echo e(\App\Models\Setting::where('key' , 'title')->pluck('value')->first()); ?>">
                    </a>
                </figure>
                <p>
                    <?php echo e(\Illuminate\Support\Facades\App::getLocale() == 'fa' ? \App\Models\Setting::where('key' , 'about')->pluck('value')->first():''); ?>

                    <?php echo e(\Illuminate\Support\Facades\App::getLocale() == 'en' ? \App\Models\Setting::where('key' , 'aboutEn')->pluck('value')->first():''); ?>

                    <?php echo e(\Illuminate\Support\Facades\App::getLocale() == 'ar' ? \App\Models\Setting::where('key' , 'aboutAr')->pluck('value')->first():''); ?>

                    <?php echo e(\Illuminate\Support\Facades\App::getLocale() == 'tr' ? \App\Models\Setting::where('key' , 'aboutTr')->pluck('value')->first():''); ?>

                </p>
            </div>
            <div class="left">
                <div class="item">
                    <div class="itemTitle"><?php echo e(__('messages.fast1')); ?></div>
                    <ul>
                        <?php $__currentLoopData = \App\Models\Link::where('type' , 1)->where('language' , request()->cookie('language')??'fa')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e($item->slug); ?>">
                                    <i>
                                        <svg class="icon">
                                            <use xlink:href="#left"></use>
                                        </svg>
                                    </i>
                                    <?php echo e($item->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="item">
                    <div class="itemTitle"><?php echo e(__('messages.link_footer')); ?></div>
                    <ul>
                        <?php $__currentLoopData = \App\Models\Page::latest()->where('language' , request()->cookie('language')??'fa')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="/page/<?php echo e($item->slug); ?>">
                                    <i>
                                        <svg class="icon">
                                            <use xlink:href="#left"></use>
                                        </svg>
                                    </i>
                                    <?php echo e($item->title); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="item">
                    <div class="itemTitle"><?php echo e(__('messages.sub_footer')); ?></div>
                    <p><?php echo e(__('messages.sub_footer2')); ?></p>
                    <label for="sub1" class="subscribe">
                        <input type="text" id="sub1" name="subscribe" placeholder="<?php echo e(__('messages.sub_email')); ?>">
                        <button><?php echo e(__('messages.action')); ?></button>
                    </label>
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
</div>

<script>
    $(document).ready(function(){
        var success1 = <?php echo json_encode(__('messages.success'), JSON_HEX_TAG); ?>;
        var req_email1 = <?php echo json_encode(__('messages.req_email'), JSON_HEX_TAG); ?>;
        var login_attention1 = <?php echo json_encode(__('messages.login_attention'), JSON_HEX_TAG); ?>;
        var email_submit1 = <?php echo json_encode(__('messages.email_submit'), JSON_HEX_TAG); ?>;
        var email_error1 = <?php echo json_encode(__('messages.email_error'), JSON_HEX_TAG); ?>;
        var ticket_submit1 = <?php echo json_encode(__('messages.ticket_submit'), JSON_HEX_TAG); ?>;
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
        $('.allContactIndex .left button').click(function(e){
            var title = $(".allContactIndex .left input[name='title']").val();
            var number = $(".allContactIndex .left input[name='number']").val();
            var body = $(".allContactIndex .left textarea[name='body']").val();
            var form = {
                "_token": "<?php echo e(csrf_token()); ?>",
                title:title,
                number:number,
                body:body,
            };
            $.ajax({
                url: "/send-contact",
                type: "post",
                data: form,
                success: function (data) {
                    $.toast({
                        text: ticket_submit1, // Text that is to be shown in the toast
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
                },
            });
        })
    })
</script>
<?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/home/footer/footer2.blade.php ENDPATH**/ ?>