<?php $__env->startSection('title' , __('messages.checkout_cart') . ' - '); ?>
<?php $__env->startSection('content'); ?>
    <main class="allCartIndex width">
        <?php if(\Session::has('message')): ?>
            <div class="alert">
                <?php echo \Session::get('message'); ?>

            </div>
        <?php endif; ?>
        <?php if(\Session::has('success')): ?>
            <div class="success">
                <?php echo \Session::get('success'); ?>

            </div>
        <?php endif; ?>
        <div class="checkoutItems">
            <div class="checkoutOptions">
                <div class="addresses">
                    <div class="checkoutTitle"><?php echo e(__('messages.select_address')); ?></div>
                    <ul>
                        <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <form action="/select-address" method="post" class="address">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('post'); ?>
                                    <input type="hidden" name="address" value="<?php echo e($item->id); ?>">
                                    <?php if($item->status == 1): ?>
                                    <div class="titleAddress active">
                                        <i>
                                            <svg class="icon">
                                                <use xlink:href="#location"></use>
                                            </svg>
                                        </i>
                                        <span><?php echo e(__('messages.select_address2')); ?></span>
                                    </div>
                                    <?php else: ?>
                                    <div class="titleAddress">
                                        <i>
                                            <svg class="icon">
                                                <use xlink:href="#location"></use>
                                            </svg>
                                        </i>
                                        <span><?php echo e(__('messages.select_address1')); ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <p><?php echo e($item->address); ?></p>
                                    <div class="nameAddress">
                                        <h5><?php echo e($item->name); ?></h5>
                                        <div class="buttons">
                                            <?php if($item->status == 0): ?>
                                                <button><?php echo e(__('messages.select')); ?></button>
                                            <?php endif; ?>
                                            <div id="editAddress" class="<?php echo e($item->id); ?>"><?php echo e(__('messages.edit')); ?></div>
                                            <div id="deleteAddress" class="<?php echo e($item->id); ?>"><?php echo e(__('messages.delete')); ?></div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li id="btnOpenAddress">
                            <div class="address">
                                <div class="titleAddress add">
                                    <i>
                                        <svg class="icon">
                                            <use xlink:href="#plus2"></use>
                                        </svg>
                                    </i>
                                    <span><?php echo e(__('messages.add_address')); ?></span>
                                </div>
                                <p><?php echo e(__('messages.add_address1')); ?></p>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php if(\App\Models\Setting::where('key' , 'deliverStatus')->pluck('value')->first() == 1): ?>
                    <div id="days" class="days">
                        <div class="checkoutTitle"><?php echo e(__('messages.time_cart')); ?></div>
                        <ul>
                            <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <h3><?php echo e($item['dayL']); ?></h3>
                                    <p>
                                        <span><?php echo e($item['day']); ?></span>
                                        <span><?php echo e($item['month']); ?></span>
                                    </p>
                                    <div class="dayItem">
                                        <div class="dayUn" id="dayItem">
                                            <h4 id="<?php echo e(json_encode($item)); ?>" class="timeData">
                                                <?php echo e(__('messages.period_cart')); ?>

                                                <?php echo e($item['from']); ?>

                                                -
                                                <?php echo e($item['to']); ?>

                                            </h4>
                                            <i>
                                                <h4>
                                                    <svg class="icon">
                                                        <use xlink:href="#check3"></use>
                                                    </svg>
                                                </h4>
                                            </i>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="days" id="carrier">
                    <div class="checkoutTitle"><?php echo e(__('messages.carrier_cart')); ?></div>
                    <ul>
                        <?php $__currentLoopData = $carriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="dayItem">
                                    <div class="dayUn" id="dayItem">
                                        <h4 id="<?php echo e($item['id']); ?>" class="carrierData"><?php echo e($item['name']); ?></h4>
                                        <?php if($item['limit'] > $prices+(int)($weights*$item->weightPrice)): ?>
                                            <?php if(\App\Models\CarrierCity::where('carrier' , $item['id'])->where('city' , auth()->user()->address()->where('show' , 1)->where('status',1)->pluck('city')->first())->first()): ?>
                                                <h5 id="<?php echo e(\App\Models\CarrierCity::where('carrier' , $item['id'])->where('city' , auth()->user()->address()->where('show' , 1)->where('status',1)->pluck('city')->first())->pluck('price')->first()+(int)($weights*$item->weightPrice)); ?>" class="priceCarrier"><?php echo e(number_format(\App\Models\CarrierCity::where('carrier' , $item['id'])->where('city' , auth()->user()->address()->where('show' , 1)->where('status',1)->pluck('city')->first())->pluck('price')->first()+(int)($weights*$item->weightPrice))); ?> تومان</h5>
                                            <?php else: ?>
                                            <h5 id="<?php echo e($item['price']+(int)($weights*$item->weightPrice)); ?>" class="priceCarrier"><?php echo e(number_format($item['price']+(int)($weights*$item->weightPrice))); ?> تومان</h5>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <h6 id="0" class="priceCarrier"><?php echo e(__('messages.free')); ?></h6>
                                        <?php endif; ?>
                                        <i>
                                            <h4>
                                                <svg class="icon">
                                                    <use xlink:href="#carrier-check"></use>
                                                </svg>
                                            </h4>
                                        </i>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="payMethod" id="method">
                    <div class="checkoutTitle"><?php echo e(__('messages.method_cart')); ?></div>
                    <ul>
                        <?php if($gateway): ?>
                            <li>
                                <button class="active" id="shop">
                                    <i class="icon">
                                        <svg class="icon">
                                            <use xlink:href="#payment2"></use>
                                        </svg>
                                    </i>
                                    <span><?php echo e(__('messages.method_cart1')); ?></span>
                                </button>
                            </li>
                        <?php endif; ?>
                        <?php if($spot && $prebuy == 0 ): ?>
                            <li>
                                <button id="payment-spot">
                                    <i class="icon">
                                        <svg class="icon">
                                            <use xlink:href="#payment1"></use>
                                        </svg>
                                    </i>
                                    <span><?php echo e(__('messages.method_cart2')); ?></span>
                                </button>
                            </li>
                        <?php endif; ?>
                        <?php if($wallet): ?>
                            <li>
                                <button id="wallet-shop">
                                    <i class="icon">
                                        <svg class="icon">
                                            <use xlink:href="#wallet"></use>
                                        </svg>
                                    </i>
                                    <span><?php echo e(__('messages.method_cart3')); ?></span>
                                </button>
                            </li>
                        <?php endif; ?>
                        <?php if($installment && $prebuy == 0): ?>
                            <li>
                            <button id="installment">
                                <i class="icon">
                                    <svg class="icon">
                                        <use xlink:href="#diploma"></use>
                                    </svg>
                                </i>
                                <span><?php echo e(__('messages.method_cart4')); ?></span>
                            </button>
                        </li>
                        <?php endif; ?>
                        <?php if($card): ?>
                            <li>
                            <button id="card">
                                <i class="icon">
                                    <svg class="icon">
                                        <use xlink:href="#receipt"></use>
                                    </svg>
                                </i>
                                <span><?php echo e(__('messages.method_cart5')); ?></span>
                            </button>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="left">
                <div class="discount">
                    <h4><?php echo e(__('messages.discount')); ?> :</h4>
                    <label for="dis">
                        <input type="text" id="dis" name="discount" placeholder="<?php echo e(__('messages.discount')); ?>">
                        <button class="fail"><?php echo e(__('messages.action')); ?></button>
                    </label>
                </div>
                <div class="cartNext">
                    <div class="cartPriceItem">
                        <h4><?php echo e(__('messages.price_cart')); ?></h4>
                        <span><?php echo e(number_format($cartPrice)); ?> <?php echo e(__('messages.arz')); ?> </span>
                    </div>
                    <div class="cartPriceItem">
                        <h4><?php echo e(__('messages.count_cart')); ?></h4>
                        <span><?php echo e($count); ?></span>
                    </div>
                    <div class="cartPriceItem">
                        <h4><?php echo e(__('messages.tax1')); ?>:</h4>
                        <span> %<?php echo e($tax); ?> ( <?php echo e(number_format($taxPrice)); ?> <?php echo e(__('messages.arz')); ?> )</span>
                    </div>
                    <div class="cartPriceItem" id="finalPrice">
                        <h4><?php echo e(__('messages.amount_cart')); ?></h4>
                        <h3><?php echo e(number_format($prices)); ?> <?php echo e(__('messages.arz')); ?></h3>
                    </div>
                </div>
                <div class="cartPay">
                    <div class="gatePay">
                        <?php if($statusSadad): ?>
                            <label class="gateItem" id="5">
                                <img src="/img/sadad.png" alt="method">
                            </label>
                        <?php endif; ?>
                        <?php if($statusBeh): ?>
                            <label class="gateItem" id="4">
                                <img src="/img/behpardakht.png" alt="method">
                            </label>
                        <?php endif; ?>
                        <?php if($idpayStatus): ?>
                            <label class="gateItem" id="3">
                                <img src="/img/idpay.png" alt="method">
                            </label>
                        <?php endif; ?>
                        <?php if($nextpayStatus): ?>
                            <label class="gateItem" id="2">
                                <img src="/img/nextpay.png" alt="method">
                            </label>
                        <?php endif; ?>
                        <?php if($zarinpalStatus): ?>
                            <label class="gateItem active" id="0">
                                <img src="/img/zarinpal.svg" alt="method">
                            </label>
                        <?php endif; ?>
                        <?php if($zibalStatus): ?>
                            <label class="gateItem" id="1">
                                <img src="/img/zibal.png" alt="method">
                            </label>
                        <?php endif; ?>
                        <?php if($statusAsan): ?>
                            <label class="gateItem" id="6">
                                <img src="/img/asanPardakht.jpg" alt="method">
                            </label>
                        <?php endif; ?>
                        <?php if($statusPasargad): ?>
                            <label class="gateItem" id="7">
                                <img src="/img/pasargad.png" alt="method">
                            </label>
                        <?php endif; ?>
                        <?php if($statusSaman): ?>
                            <label class="gateItem" id="8">
                                <img src="/img/saman.jpg" alt="method">
                            </label>
                        <?php endif; ?>
                    </div>
                    <?php if($statusSnap && !empty($eligible['response'])): ?>
                        <div class="gateItem" data="snappay" id="9">
                            <img src="/img/snappay.svg" alt="snappay">
                            <div class="snapDes">
                                <h4><?php echo e($eligible['response']['title_message']); ?></h4>
                                <p><?php echo e($eligible['response']['description']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form action="/shop" method="get" class="nextItem">
                        <?php echo csrf_field(); ?>
                        <div class="note">
                            <label for="notes"><?php echo e(__('messages.note_cart')); ?></label>
                            <textarea name="note" id="notes" placeholder="<?php echo e(__('messages.note_cart2')); ?>"></textarea>
                        </div>
                        <input type="hidden" name="time">
                        <input type="hidden" name="carrier">
                        <input type="hidden" name="gateway" value="<?php echo e(\App\Models\Setting::where('key' , 'choicePay')->pluck('value')->first()); ?>">
                        <button><?php echo e(__('messages.continue_cart')); ?></button>
                    </form>
                    <div class="installmentType" style="display:none">
                        <button><?php echo e(__('messages.select_install')); ?></button>
                    </div>
                    <div class="cardType" style="display:none">
                        <button><?php echo e(__('messages.submit_cart')); ?></button>
                    </div>
                </div>
                <div class="scoreProduct">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#score"></use>
                        </svg>
                    </i>
                    <span><?php echo e(__('messages.score_cart',['score' => $scores])); ?></span>
                </div>
            </div>
        </div>
        <?php echo $__env->make('home.cart.addAddress',['address' =>$address], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="allPack">
            <div class="showPack">
                <form action="/installments-shop" method="GET" class="showPackItems">
                    <input type="hidden" name="pack">
                    <input type="hidden" name="time">
                    <input type="hidden" name="carrier">
                    <div class="title">
                        <div class="right">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#diploma"></use>
                                </svg>
                            </i>
                            <span><?php echo e(__('messages.install_type1')); ?></span>
                        </div>
                        <div class="close">
                            <svg class="icon">
                                <use xlink:href="#cancel"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="showPackItem">
                        <label><?php echo e(__('messages.install_type2')); ?></label>
                        <select class="allPacks">
                            <?php $__currentLoopData = $packs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" count="<?php echo e($item->count); ?>"><?php echo e($item->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <ul></ul>
                    <button><?php echo e(__('messages.send_submit')); ?></button>
                </form>
            </div>
        </div>
        <div class="allCard">
            <div class="showCard">
                <form action="/card-by-card" method="GET" class="showPackItems">
                    <input type="hidden" name="time">
                    <input type="hidden" name="carrier">
                    <div class="title">
                        <div class="right">
                            <i>
                                <svg class="icon">
                                    <use xlink:href="#receipt"></use>
                                </svg>
                            </i>
                            <span><?php echo e(__('messages.card_info')); ?></span>
                        </div>
                        <div class="close">
                            <svg class="icon">
                                <use xlink:href="#cancel"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="description">
                        <?php echo $cardText; ?>

                    </div>
                    <div class="note">
                        <label for="notes"><?php echo e(__('messages.note_cart')); ?></label>
                        <textarea name="note" id="notes" placeholder="<?php echo e(__('messages.note_cart2')); ?>"></textarea>
                    </div>
                    <button><?php echo e(__('messages.send_submit')); ?></button>
                </form>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script1'); ?>
    <script>
        $(document).ready(function(){
            var discount_fail1 = <?php echo json_encode(__('messages.discount_fail'), JSON_HEX_TAG); ?>;
            var fail1 = <?php echo json_encode(__('messages.fail'), JSON_HEX_TAG); ?>;
            var success1 = <?php echo json_encode(__('messages.success'), JSON_HEX_TAG); ?>;
            var discount_success1 = <?php echo json_encode(__('messages.discount_success'), JSON_HEX_TAG); ?>;
            var first_carrier1 = <?php echo json_encode(__('messages.first_carrier'), JSON_HEX_TAG); ?>;
            var delete_address1 = <?php echo json_encode(__('messages.delete_address'), JSON_HEX_TAG); ?>;
            var pack1 = <?php echo json_encode(__('messages.pack1'), JSON_HEX_TAG); ?>;
            var arz1 = <?php echo json_encode(__('messages.arz'), JSON_HEX_TAG); ?>;
            var statusSnap = <?php echo json_encode($statusSnap, JSON_HEX_TAG); ?>;
            var weights = <?php echo json_encode($weights, JSON_HEX_TAG); ?>;
            var allPrices = <?php echo $prices; ?>;
            var cartPrice = <?php echo $cartPrice; ?>;
            var taxPrice = <?php echo $taxPrice; ?>;
            var packs = <?php echo $packs->toJson(); ?>;
            var getCarrier = '';
            var getTime = '';
            var discount = '';
            var i;
            $('.discount button').click(function(){
                if(getCarrier){
                    var form = {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        discount:$("input[name='discount']").val(),
                    };
                    $.ajax({
                        url: "/check-discount-cart",
                        type: "get",
                        data: form,
                        success: function (data) {
                            if(data == 'no'){
                                $.toast({
                                    text: discount_fail1, // Text that is to be shown in the toast
                                    heading: fail1, // Optional heading to be shown on the toast
                                    icon: 'error', // Type of toast icon
                                    showHideTransition: 'fade', // fade, slide or plain
                                    allowToastClose: true, // Boolean value true or false
                                    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                    position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                    textAlign: 'left',  // Text alignment i.e. left, right or center
                                    loader: true,  // Whether to show loader or not. True by default
                                    loaderBg: '#9EC600',  // Background color of the toast loader
                                });
                            }else{
                                $.toast({
                                    text: discount_success1, // Text that is to be shown in the toast
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
                                if(discount == ''){
                                    var dis1 = parseInt(cartPrice)+parseInt($('#carrier .active .priceCarrier').attr('id'))+parseInt(taxPrice);
                                    var dis = parseInt(dis1) - parseInt((parseInt(dis1) * data['percent']) / 100);
                                    $('#finalPrice h3').text(makePrice(dis)+arz1);
                                    if(statusSnap){
                                        var form = {
                                            "_token": "<?php echo e(csrf_token()); ?>",
                                            price: dis,
                                        };
                                        $.ajax({
                                            url: "/change-snap",
                                            type: "post",
                                            data: form,
                                            success: function (data) {
                                                if(data.successful){
                                                    $('.snapDes p').text(data.response.description)
                                                }
                                            },
                                        });
                                    }
                                }
                                discount = data;
                            }
                        },
                    });
                }else{
                    $.toast({
                        text: first_carrier1, // Text that is to be shown in the toast
                        heading: fail1, // Optional heading to be shown on the toast
                        icon: 'error', // Type of toast icon
                        showHideTransition: 'fade', // fade, slide or plain
                        allowToastClose: true, // Boolean value true or false
                        hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                        position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                        textAlign: 'left',  // Text alignment i.e. left, right or center
                        loader: true,  // Whether to show loader or not. True by default
                        loaderBg: '#9EC600',  // Background color of the toast loader
                    });
                }
            })
            $('.allCartIndex #deleteAddress').on('click',function(){
                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    id:$(this).attr('class'),
                };
                $.ajax({
                    url: "/delete-address",
                    type: "delete",
                    data: form,
                    success: function (data) {
                        if(data == 'ok'){
                            $.toast({
                                text: delete_address1, // Text that is to be shown in the toast
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
                            window.location.reload();
                        }
                    },
                });
            })
            $('.close').click(function(){
                $('.allPack').hide();
                $('.allCard').hide();
            })
            $('.allAddAddress #btnCloseAddress').click(function (){
                if($('.allAddAddress').attr('class') == 'allAddAddress activesAddress'){
                    $('.allAddAddress').attr('class','allAddAddress');
                }else{
                    $('.allAddAddress').attr('class','allAddAddress activesAddress');
                }
            })
            $('#btnOpenAddress').on( 'click' , function (){
                if($('.allAddAddress').attr('class') == 'allAddAddress activesAddress'){
                    $('.allAddAddress').attr('class','allAddAddress');
                }else{
                    $('.allAddAddress').attr('class','allAddAddress activesAddress');
                }
                $(".CreateAddress input[name='address']").val('');
                $(".CreateAddress input[name='plaque']").val('');
                $(".CreateAddress input[name='unit']").val('');
                $(".CreateAddress input[name='post']").val('');
                $(".CreateAddress input[name='name']").val('');
                $(".CreateAddress input[name='number']").val('');
                $(".CreateAddress select[name='state']").val('تهران');
                $.each($(".CreateAddress select[name='city']"), function() {
                    $(this).hide();
                });
                $('.city1').show();
                $(".CreateAddress select[name='city']:visible").val('شاهدشهر');
                $(".CreateAddress .bottomAddress #btnCreateAddress").show();
                $(".CreateAddress .bottomAddress #btnEditAddress").hide();
            })
            $('.cartPay .gateItem').on('click' , function(){
                $.each($('.cartPay .gateItem'),function(){
                    $(this).attr('class' , 'gateItem');
                })
                $(this).attr('class','gateItem active');
                $(".cartPay form input[name='gateway']").val($(this).attr('id'));
            });
            $('#days .dayItem .dayUn').on('click' , function(){
                $.each($('#days #dayItem'),function(){
                    $(this).attr('class' , 'dayUn');
                })
                $(this).attr('class' , 'active');
                getTime = $('#days .active .timeData').attr('id');
                $(".cartPay form input[name='time']").val(getTime);
                $(".allPack .showPackItems input[name='time']").val(getTime);
                $(".allCard .showPackItems input[name='time']").val(getTime);
            })
            $('.payMethod button').on('click' , function(){
                $.each($('.payMethod button'),function(){
                    $(this).attr('class' , 'unActive');
                })
                $(this).attr('class' , 'active');
                if($(this).attr('id') == 'installment'){
                    $(".cartPay form").hide();
                    $(".cartPay .cardType").hide();
                    $(".cartPay .installmentType").show();
                }else if($(this).attr('id') == 'card'){
                    $(".cartPay form").hide();
                    $(".cartPay .installmentType").hide();
                    $(".cartPay .cardType").show();
                }else{
                    $(".cartPay form").show();
                    $(".cartPay .installmentType").hide();
                    $(".cartPay .cardType").hide();
                    $(".cartPay form").attr('action' , $(this).attr('id'));
                }
            })
            $('#carrier .dayItem .dayUn').on('click' , function(){
                $.each($('#carrier #dayItem'),function(){
                    $(this).attr('class' , 'dayUn');
                })
                $(this).attr('class' , 'active');
                var finalP = parseInt(allPrices) + parseInt($('#carrier .active .priceCarrier').attr('id'));
                $('#finalPrice h3').text(makePrice(finalP) + ' تومان');
                getCarrier = $('#carrier .active .carrierData').attr('id');
                $(".cartPay form input[name='carrier']").val(getCarrier);
                $(".allPack .showPackItems input[name='carrier']").val(getCarrier);
                $(".allCard .showPackItems input[name='carrier']").val(getCarrier);
                discount = '';
                if(statusSnap){
                    var form = {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        price: finalP,
                    };
                    $.ajax({
                        url: "/change-snap",
                        type: "post",
                        data: form,
                        success: function (data) {
                            if(data.successful){
                                $('.snapDes p').text(data.response.description)
                            }
                        },
                    });
                }
            })
            $(".cardType").click(function(){
                $('.allCard').show();
            });
            if(packs.length){
                $(".installmentType").click(function(){
                    $('.allPack').show();
                });
                $(".showPack input[name='pack']").val(packs[0].id);
                $(".showPack .allPacks").val(packs[0].id);
                for (i = 1; i <= packs[0]['count']; ++i) {
                    $('.showPack .showPackItems ul').append(
                        $('<li><span>'+i+'</span><input type="text" name="installName[]" placeholder="'+pack1+'"></li>')
                    );
                }
            }
            $(".showPack .allPacks option").click(function(){
                $.each($('.showPack .showPackItems ul li') , function(){
                    this.remove();
                })
                for (i = 1; i <= $(this).attr('count'); ++i) {
                    $('.showPack .showPackItems ul').append(
                        $('<li><span>'+i+'</span><input type="text" name="installName[]" placeholder="'+pack1+'"></li>')
                    );
                }
            })
            function makePrice(price){
                price += '';
                x = price.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('torobTag'); ?>
    <meta name="robots" content="noindex">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\NewSeo\seoshop\resources\views/home/cart/checkoutIndex.blade.php ENDPATH**/ ?>