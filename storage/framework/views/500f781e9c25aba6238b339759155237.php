<div class="allChatIndex">
    <div class="allChatIndexBlock">
        <div class="chatContents">
            <div class="chatContent" id="chatContent1">
                <div class="header">
                    <div class="title2">انتخاب پشتیبانی</div>
                    <i class="cancelChat">
                        <svg class="icon">
                            <use xlink:href="#cancel"></use>
                        </svg>
                    </i>
                </div>
                <div class="body content1">
                    <p>با انتخاب یکی از گذینه ها با ما در ارتباط باشید</p>
                    <?php if(\App\Models\Setting::where('key' , 'ticketStatus')->pluck('value')->first()): ?>
                        <div class="choice" data-id="chatContent2">پیام به پشتیبانی</div>
                    <?php endif; ?>
                    <?php if(\App\Models\Setting::where('key' , 'chatStatus')->pluck('value')->first()): ?>
                        <div class="choice" data-id="chatContent3">گفتگو آنلاین</div>
                    <?php endif; ?>
                    <?php $__currentLoopData = \App\Models\FloatAccess::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($item->link); ?>" target="_blank" class="choice">
                            <?php echo e($item->title); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="chatContent" id="chatContent2" style="display: none">
                <div class="header">
                    <div class="title2">پیام به پشتیبانی</div>
                    <div class="leftHeader">
                        <i class="backChat">
                            <svg class="icon">
                                <use xlink:href="#left"></use>
                            </svg>
                        </i>
                        <i class="cancelChat">
                            <svg class="icon">
                                <use xlink:href="#cancel"></use>
                            </svg>
                        </i>
                    </div>
                </div>
                <div class="body">
                    <p>در صورت تمایل میتوانید پیام خودتان را ثبت کنید</p>
                    <label class="bodyLabel" for="ticket1name">
                        عنوان* :
                        <input type="text" id="ticket1name" name="title" placeholder="عنوان خود را وارد کنید">
                    </label>
                    <label class="bodyLabel" for="ticket1type">
                        موضوع :
                        <select name="type" id="ticket1type">
                            <option value="0">واحد فروش</option>
                            <option value="1">واحد پشتیبانی</option>
                            <option value="2">واحد خدمات</option>
                        </select>
                    </label>
                    <label class="bodyLabel" for="ticket1body">
                        توضیح* :
                        <textarea id="ticket1body" name="body" placeholder="توضیح خود را وارد کنید"></textarea>
                    </label>
                    <div class="sendImage">
                        <input type="file" id="post_cover" class="dropify" name="image"/>
                    </div>
                    <?php if(auth()->user()): ?>
                        <button class="submit">ارسال پیام</button>
                    <?php else: ?>
                        <a href="/login" class="loginChat typeLogin1">وارد حساب خود شوید (کلیک کنید)</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="chatContent" id="chatContent3" style="display: none">
                <div class="header">
                    <div class="title2">گفتگو آنلاین</div>
                    <div class="leftHeader">
                        <i class="backChat">
                            <svg class="icon">
                                <use xlink:href="#left"></use>
                            </svg>
                        </i>
                        <i class="cancelChat">
                            <svg class="icon">
                                <use xlink:href="#cancel"></use>
                            </svg>
                        </i>
                    </div>
                </div>
                <div class="body">
                    <p>
                        شما در حال اتصال به اولین کارشناس آزاد هستید، از صبر و شکیبایی شما سپاسگزاریم.
                        <span class="closeChats">بستن گفتگو</span>
                    </p>
                    <div class="messages opp">
                        <div class="text">سلام چطور میتونیم کمکتون کنیم؟</div>
                        <div class="time"><?php echo e(verta()->format('H:i')); ?></div>
                    </div>
                </div>
                <?php if(auth()->user()): ?>
                    <div class="send">
                        <input type="text" name="body" placeholder="پیغام خود را بنویسید">
                        <button>ارسال</button>
                    </div>
                <?php else: ?>
                    <a href="/login" class="loginChat">وارد حساب خود شوید (کلیک کنید)</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="chatButton">
            <i>
                <svg class="icon">
                    <use xlink:href="#user-headset"></use>
                </svg>
            </i>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var userId = <?php echo json_encode(auth()->user()?auth()->user()->id:0, JSON_HEX_TAG); ?>;
        var parent = 0;
        var check = 0;
        $(".allChatIndex .chatContent .choice").click(function (){
            $('.allChatIndex .chatContent').hide();
            $('.allChatIndex #'+$(this).attr('data-id')).show();
        })
        $(".allChatIndex .chatContent .backChat").click(function (){
            $('.allChatIndex .chatContent').hide();
            $('.allChatIndex #chatContent1').show();
        })
        $(".allChatIndex .chatButton,.allChatIndex .cancelChat").click(function (){
            $('.allChatIndex .chatContents').toggle();
        })
        $(".allChatIndex #chatContent2 .submit").click(function (){
            $(".allChatIndex #chatContent2 .submit").text('صبر کنید');
            let formData = new FormData();
            formData.append('_token', "<?php echo e(csrf_token()); ?>");
            formData.append('title', $(".allChatIndex #chatContent2 input[name='title']").val());
            formData.append('type', $(".allChatIndex #chatContent2 select[name='type']").val());
            formData.append('body', $(".allChatIndex #chatContent2 textarea[name='body']").val());
            formData.append('parent_id', 0);
            formData.append('faq', 1);
            var fileInput = $(".allChatIndex #chatContent2 input[name='image']")[0];
            formData.append('image', fileInput.files[0]);
            $.ajax({
                url: "/send-ticket",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    $.toast({
                        text: "پیام ثبت شد", // Text that is to be shown in the toast
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
                    check = 0;
                    window.location.href='/profile/ticket';
                },
                error: function (xhr) {
                    $.toast({
                        text: "فیلد ستاره دار را پر کنید", // Text that is to be shown in the toast
                        heading: 'دقت کنید', // Optional heading to be shown on the toast
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
                    $(".allChatIndex #chatContent2 .submit").text('ارسال پیام');
                }
            });
        })
        $(".allChatIndex #chatContent3 .send button").click(function (){
            $(".allChatIndex #chatContent3 .send button").text('صبر کنید');
            let formData = new FormData();
            formData.append('_token', "<?php echo e(csrf_token()); ?>");
            formData.append('type', 0);
            formData.append('title', 'چت آنلاین');
            formData.append('body', $(".allChatIndex #chatContent3 .send input[name='body']").val());
            formData.append('parent_id', parent);
            formData.append('faq', 1);
            formData.append('status', 1);
            $.ajax({
                url: "/send-ticket",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(parent == 0){parent = data.id;}
                    $('.allChatIndex #chatContent3 .body').animate({ scrollTop: $('.allChatIndex #chatContent3 .body').height() + 20000 }, 1000);
                    $('.allChatIndex #chatContent3 .body').append(
                        $(`<div class="messages me new">
                            <div class="text">${data.body}</div>
                            <div class="time">${data.created_at}</div>
                        </div>`)
                    );
                    $(".allChatIndex #chatContent3 .send input[name='body']").val('');
                    $(".allChatIndex #chatContent3 .send button").text('ارسال');
                    $(".allChatIndex #chatContent3 .closeChats").show();
                    check = 0;
                },
                error: function (xhr) {
                    $.toast({
                        heading: 'مشکلی پیش امده', // Optional heading to be shown on the toast
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
                    $(".allChatIndex #chatContent3 .send button").text('ارسال پیام');
                }
            });
        })
        $(".allChatIndex #chatContent3 .closeChats").click(function (){
            $(".allChatIndex #chatContent3 .closeChats").text('صبر کنید');
            let formData = new FormData();
            formData.append('_token', "<?php echo e(csrf_token()); ?>");
            formData.append('parent_id', parent);
            $.ajax({
                url: "/close-chat",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    parent = 0;
                    $('.allChatIndex #chatContent3 .body .new').remove();
                    $(".allChatIndex #chatContent3 .send input[name='body']").val('');
                    $(".allChatIndex #chatContent3 .closeChats").text('بستن گفتگو');
                    $(".allChatIndex #chatContent3 .closeChats").hide();
                    check = 0;
                },
                error: function (xhr) {
                    $.toast({
                        heading: 'مشکلی پیش امده', // Optional heading to be shown on the toast
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
                    $(".allChatIndex #chatContent3 .closeChats").text('بستن گفتگو');
                }
            });
        })

        $('.dropify').dropify({
            messages: {
                default: "فایل پیوست خود را اینجا قرار دهید.",
                replace: "برای جایگزین کردن تصویر بکشید و رها کنید.",
                remove: "حذف تصویر",
                error: "خطایی به وجود آمده است. دوباره تلاش کنید.",
            }
        });
        getMessage();
        setInterval(getMessage,10000);
        function getMessage(){
            if(userId >= 1 && check == 0){
                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'parent':parent,
                };
                $.ajax({
                    url: "/get-online-ticket",
                    type: "post",
                    data: form,
                    success: function (data) {
                        $('.allChatIndex #chatContent3 .body .new').remove();
                        if(data.length >= 1){
                            if(parent == 0 && data[0].parent_id == 0){
                                parent = data[0].id;
                            }
                        }else{
                            parent = 0;
                            check = 1;
                        }
                        $.each(data,function (){
                            $('.allChatIndex #chatContent3 .body').append(
                                $(`<div class="messages ${userId==this.user_id?'me':''} new">
                            <div class="text">${this.body}</div>
                            <div class="time">${this.created_at}</div>
                        </div>`)
                            );
                            $(".allChatIndex #chatContent3 .closeChats").show();
                        })
                        $('.allChatIndex #chatContent3 .body').animate({ scrollTop: $('.allChatIndex #chatContent3 .body').height() + 20000 }, 1000);
                    },
                    error: function (xhr) {
                        $(".allChatIndex #chatContent3 .send button").text('ارسال پیام');
                    }
                });
            }
        }
    })
</script>
<?php /**PATH D:\laravel projects\shop_mobile\resources\views/home/chat.blade.php ENDPATH**/ ?>