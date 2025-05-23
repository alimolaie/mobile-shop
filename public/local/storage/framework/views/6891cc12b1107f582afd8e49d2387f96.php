<div class="allQuickBuy">
    <div class="quickBuy">
        <div class="title">
            <div class="title1"><?php echo e(__('messages.order_method4')); ?></div>
            <i class="closeQuick">
                <svg class="icon">
                    <use xlink:href="#cancel"></use>
                </svg>
            </i>
        </div>
        <div class="productQuick">
            <a href="" class="pic">
                <img src="" alt="صبرکنید...">
            </a>
            <div class="description">
                <div class="title2"></div>
                <div class="optionAdd countQuick">
                    <label for="counts"><?php echo e(__('messages.count2')); ?></label>
                    <input type="range" min="1" value="1" max="8" oninput="this.nextElementSibling.value = this.value" id="counts" name="countQuick" placeholder="تعداد را وارد کنید">
                    <output>1</output>
                </div>
                <div class="optionAdd" id="sizeQuick">
                    <label for="sizeQuick2"><?php echo e(__('messages.size')); ?></label>
                    <select name="sizeQuick" id="sizeQuick2"></select>
                </div>
                <div class="optionAdd" id="guaranteeQuick">
                    <label for="guarantee2"><?php echo e(__('messages.guarantee')); ?></label>
                    <select name="guarantee" id="guarantee2"></select>
                </div>
                <div class="optionAdd colorContainer" id="colorQuick">
                    <label for="color2"><?php echo e(__('messages.color')); ?></label>
                    <div class="swatch clearfix" data-option-index="1" id="color2"></div>
                </div>
            </div>
        </div>
        <div class="addressQuick">
            <div class="itemAddress">
                <label for="address"><?php echo e(__('messages.full_address')); ?>*</label>
                <input id="address" type="text" placeholder="<?php echo e(__('messages.full_address')); ?>" name="address">
                <div id="validation-address"></div>
            </div>
            <div class="itemAddress">
                <label for="number"><?php echo e(__('messages.number1')); ?>*</label>
                <?php if(auth()->user()): ?>
                    <input id="number" type="text" placeholder="<?php echo e(__('messages.buyer_number')); ?>" value="<?php echo e(auth()->user()->number); ?>" name="number">
                <?php else: ?>
                    <input id="number" type="text" placeholder="<?php echo e(__('messages.buyer_number')); ?>" name="number">
                <?php endif; ?>
                <div id="validation-address"></div>
            </div>
        </div>
        <div class="optionAdd" id="carrierQuick">
            <label for="carrier"><?php echo e(__('messages.carrier')); ?></label>
            <select name="carrierQuick" id="carrier"></select>
        </div>
        <?php if(\App\Models\Setting::where('key' , 'captchaStatus')->pluck('value')->first()): ?>
            <div class="addressQuick">
                <div class="itemAddress">
                    <label for="captcha"><?php echo e(__('messages.security_code')); ?></label>
                    <input type="text" id="captcha" name="captcha" placeholder="<?php echo e(__('messages.security_code')); ?>">
                    <div id="validation-captcha"></div>
                </div>
            </div>
            <div class="captchaQuick">
                <?php echo $captcha; ?>

            </div>
        <?php endif; ?>
        <div class="buyFast">
            <div class="right">
                <div class="title3">
                    <?php echo e(__('messages.carrier_time')); ?> :
                    <span></span>
                </div>
                <div class="title4">
                    <?php echo e(__('messages.amount_cart')); ?>

                    <span>0</span>
                </div>
            </div>
            <div class="left">
                <button><?php echo e(__('messages.checkout')); ?></button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var tax = <?php echo json_encode(\App\Models\Setting::where('key' , 'tax')->pluck('value')->first(), JSON_HEX_TAG); ?>;
        var fill_time = <?php echo json_encode(__('messages.fill_time'), JSON_HEX_TAG); ?>;
        var login_attention = <?php echo json_encode(__('messages.login_attention'), JSON_HEX_TAG); ?>;
        var error1 = <?php echo json_encode(__('messages.error1'), JSON_HEX_TAG); ?>;
        var wait1 = <?php echo json_encode(__('messages.wait'), JSON_HEX_TAG); ?>;
        var unavailable_color = <?php echo json_encode(__('messages.unavailable_color'), JSON_HEX_TAG); ?>;
        var unavailable_size = <?php echo json_encode(__('messages.unavailable_size'), JSON_HEX_TAG); ?>;
        var no_count = <?php echo json_encode(__('messages.no_count'), JSON_HEX_TAG); ?>;
        var success1 = <?php echo json_encode(__('messages.success'), JSON_HEX_TAG); ?>;
        var buyer_number = <?php echo json_encode(__('messages.buyer_number'), JSON_HEX_TAG); ?>;
        var fill_number = <?php echo json_encode(__('messages.fill_number'), JSON_HEX_TAG); ?>;
        var send_gate = <?php echo json_encode(__('messages.send_gate'), JSON_HEX_TAG); ?>;
        var checkout1 = <?php echo json_encode(__('messages.checkout'), JSON_HEX_TAG); ?>;
        var arz1 = <?php echo json_encode(__('messages.arz'), JSON_HEX_TAG); ?>;
        var price1 = 0;
        var price = 0;
        var finalPrice = 0;
        var color = '';
        var size = '';
        var guarantee = '';
        var carrier = '';
        var product = '';
        var count = 1;
        $(".allQuickBuy .closeQuick").click(function(event){
            $('.quickBuy').hide();
            $('.allQuickBuy').hide();
            $('.quickBuy .productQuick #sizeQuick select').html('');
            $('.quickBuy .productQuick #colorQuick .clearfix').html('');
            $('.quickBuy #carrierQuick select').html('');
            $('.quickBuy #guaranteeQuick select').html('');
        })
        $(document).on('click',".options div[name='quickBuy']",function(event){
            event.preventDefault();
            $('.allLoading').show();
            product = $(this).attr('id');
            var form = {
                "_token": "<?php echo e(csrf_token()); ?>",
                "product": $(this).attr('id'),
            };
            $.ajax({
                url: "/quick-buy",
                type: "post",
                data: form,
                success: function (data) {
                    $('.allLoading').hide();
                    price1 = parseInt(data[0].price);
                    price = parseInt(data[0].price);
                    finalPrice = parseInt(data[0].price);
                    color = '';
                    size = '';
                    guarantee = '';
                    $('.allQuickBuy').show();
                    $('.quickBuy').show(100);
                    $('.quickBuy .productQuick .pic img').attr('src' , JSON.parse(data[0].image)[0]);
                    $('.quickBuy .productQuick .pic').attr('href' , '/product/'+data[0].slug);
                    $('.quickBuy .productQuick .description .title2').text(data[0].title);
                    $(".quickBuy .countQuick input[type='range']").val(data[0].minCart);
                    $(".quickBuy .countQuick input[type='range']").attr('value',data[0].minCart);
                    $(".quickBuy .countQuick input[type='range']").attr('min',data[0].minCart);
                    if(data[0].count <= data[0].maxCart){
                        $(".quickBuy .countQuick input[type='range']").attr('max',data[0].count);
                    }else{
                        $(".quickBuy .countQuick input[type='range']").attr('max',data[0].maxCart);
                    }
                    if(data[0].size != '[]'){
                        $('.quickBuy .productQuick #sizeQuick').show();
                        $.each(JSON.parse(data[0].size),function(){
                            $('.quickBuy .productQuick #sizeQuick select').append(
                                '<option value="'+this.name+'" data="'+this.price+'">'+this.name+'</option>'
                            );
                        })
                        size = JSON.parse(data[0].size)[0].name;
                    }else{
                        $('.quickBuy .productQuick #sizeQuick').hide();
                    }
                    if(data[0].colors != '[]'){
                        color = JSON.parse(data[0].colors)[0].name;
                        $('.quickBuy .productQuick #colorQuick').show();
                        $.each(JSON.parse(data[0].colors),function(){
                            $('.quickBuy .productQuick #colorQuick .clearfix').append(
                                '<div data-value="'+this.name+'" class="swatch-element color blue available">'+
                                '<div class="tooltip">'+this.name+'</div>'+
                                '<input quickbeam="color" id="'+this.name+'1" type="radio" name="colorQuick" price="'+this.price+'" value="'+this.name+'"  />'+
                                '<label for="'+this.name+'1" style="border-color: '+this.color+'">'+
                                '<span style="background-color: '+this.color+'"></span>'+
                                '</label>'+
                                '</div>'
                            );
                        })
                    }else{
                        $('.quickBuy .productQuick #colorQuick').hide();
                    }
                    if(data[0].guarantee.length){
                        guarantee = data[0].guarantee[0].id;
                        $('.quickBuy .productQuick #guaranteeQuick').show();
                        $.each(data[0].guarantee,function(){
                            $('.quickBuy .productQuick #guaranteeQuick select').append(
                                '<option value="'+this.name+'">'+this.name+'</option>'
                            );
                        })
                    }else{
                        $('.quickBuy .productQuick #guaranteeQuick').hide();
                    }
                    if(data[1]){
                        carrier = data[1][0]['name'];
                        $('.quickBuy #carrierQuick').show();
                        $.each(data[1],function(){
                            $('.quickBuy #carrierQuick select').append(
                                '<option value="'+this.name+'" id="'+this.price+'">'+this.name+'</option>'
                            );
                        })
                    }else{
                        $('.quickBuy #carrierQuick').hide();
                    }
                    if(data[0].time.length){
                        $('.buyFast .right .title3 span').text(data[0].time[0].name);
                    }else{
                        $('.buyFast .right .title3 span').text(fill_time);
                    }
                    getData();
                },
                error: function (xhr) {
                    $('.allLoading').hide();
                    $.toast({
                        text: error1, // Text that is to be shown in the toast
                        heading: login_attention, // Optional heading to be shown on the toast
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
                    setTimeout(function() { window.location.reload() }, 1000);
                }
            });
        })
        $(document).on('change' , ".allQuickBuy .colorContainer input[name='colorQuick']:checked" , function(){
            getData();
        })
        $(document).on('change' , ".allQuickBuy #sizeQuick select" , function(){
            getData();
        })
        $(document).on('change' , ".allQuickBuy #carrierQuick select" , function(){
            getData();
        })
        $(document).on('change' , ".allQuickBuy input[name='countQuick']" , function(){
            count = $(this).val();
            getData();
        })
        $('.buyFast .left button').click(function(){
            var buttonText = $(this)
            buttonText.text(wait1);
            var form = {
                "_token": "<?php echo e(csrf_token()); ?>",
                "carrier": carrier,
                "size": size,
                "color": color,
                "guarantee": guarantee,
                "count": $(".quickBuy .countQuick input[type='range']").val(),
                "product": product,
                "address": $(".allQuickBuy input[name='address']").val(),
                "number": $(".allQuickBuy input[name='number']").val(),
                'captcha' : $(".allQuickBuy input[name='captcha']").val()
            };
            $.ajax({
                url: "/check-quick-buy",
                type: "post",
                data: form,
                success: function (data) {
                    if(data == 'color'){
                        $.toast({
                            text: unavailable_color, // Text that is to be shown in the toast
                            heading: no_count, // Optional heading to be shown on the toast
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
                    if(data == 'number'){
                        $.toast({
                            text: fill_number, // Text that is to be shown in the toast
                            heading: buyer_number, // Optional heading to be shown on the toast
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
                        setTimeout(function() { window.location.reload() }, 1000);
                    }
                    if(data == 'size'){
                        $.toast({
                            text: unavailable_size, // Text that is to be shown in the toast
                            heading: no_count, // Optional heading to be shown on the toast
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
                        setTimeout(function() { window.location.reload() }, 1000);
                    }
                    if(data == 'count'){
                        $.toast({
                            heading: no_count, // Optional heading to be shown on the toast
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
                        setTimeout(function() { window.location.reload() }, 1000);
                    }
                    if(data == 'success'){
                        $.toast({
                            text: send_gate, // Text that is to be shown in the toast
                            heading: success1, // Optional heading to be shown on the toast
                            icon: 'success', // Type of toast icon
                            showHideTransition: 'fade', // fade, slide or plain
                            allowToastClose: true, // Boolean value true or false
                            hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                            stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                            position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                            textAlign: 'left',
                            loader: true,
                            loaderBg: '#9EC600',
                        });
                        window.location.href= "/quick-buy";
                    }
                },
                error: function (xhr) {
                    buttonText.text(checkout1);
                    $.toast({
                        text: error1, // Text that is to be shown in the toast
                        heading: login_attention, // Optional heading to be shown on the toast
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
                    setTimeout(function() { window.location.reload() }, 1000);
                }
            });
        })
        $(document).on('change' , ".allQuickBuy select[name='guarantee']" , function(){
            guarantee = $(".allQuickBuy select[name='guarantee'] option:selected").attr('value');
        })
        function getData(){
            var carPrice = parseInt($(".allQuickBuy select[name='carrierQuick'] option:selected").attr('id'));
            price = parseInt(price1);
            if($(".allQuickBuy input[name='colorQuick']:checked").attr('price')){
                price = parseInt(price) + parseInt($(".allQuickBuy input[name='colorQuick']:checked").attr('price'));
            }
            if(parseInt($(".allQuickBuy select[name='sizeQuick'] option:selected").attr('data'))){
                price = parseInt(price) + parseInt($(".allQuickBuy select[name='sizeQuick'] option:selected").attr('data'));
            }
            color = $(".allQuickBuy input[name='colorQuick']:checked").attr('id');
            size = $(".allQuickBuy select[name='sizeQuick'] option:selected").attr('value');
            carrier = $(".allQuickBuy select[name='carrierQuick'] option:selected").attr('value');
            count = $(".quickBuy .countQuick input[type='range']").val();
            price = price * parseInt(count);
            price = parseInt(price) + ((parseInt(price) * parseInt(tax)) / 100);
            price = parseInt(price) + carPrice;
            makePrice3(price);
        }
        function makePrice3(price){
            price += '';
            x = price.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            finalPrice = x1 + x2;
            $('.allQuickBuy .buyFast .right .title4 span').text(arz1 + finalPrice);
        }
    })
</script>
<?php /**PATH G:\Laravel\NewSeo\seoshop\resources\views/home/quickBuy.blade.php ENDPATH**/ ?>