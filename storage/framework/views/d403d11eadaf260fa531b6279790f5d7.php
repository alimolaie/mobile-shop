<?php $__env->startSection('tab' , 34); ?>
<?php $__env->startSection('content'); ?>
    <div class="allPayPanel">
        <div class="topProductIndex">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a href="/admin/cost">همه هزینه ها</a>
            </div>
            <div class="allTopTableItem">
                <div class="filterItems">
                    <div class="filterTitle">
                        <i>
                            <svg class="icon">
                                <use xlink:href="#filter"></use>
                            </svg>
                        </i>
                        فیلتر اطلاعات
                    </div>
                    <form method="GET" action="/admin/cost" class="filterContent">
                        <div class="filterContentItem">
                            <label>فیلتر حامل و شماره سفارش و آیدی کاربر و آیدی</label>
                            <input type="text" name="title" placeholder="مثال: 10" value="<?php echo e($title); ?>">
                        </div>
                        <button type="submit">اعمال</button>
                    </form>
                </div>
            </div>
        </div>
        <?php if(\Session::has('message')): ?>
            <div class="alert">
                <?php echo \Session::get('message'); ?>

            </div>
        <?php endif; ?>
        <div class="allTableContainer">
            <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="postItem" id="<?php echo e($item->id); ?>">
                    <div class="postTop">
                        <div class="postTitle">
                            <ul>
                                <li>
                                    <span>توضیح :</span>
                                    <span><?php echo e($item->note); ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="postOptions">
                            <a href="/admin/pay/invoice/<?php echo e($item->id); ?>" title="پرینت خرید">
                                <svg class="icon">
                                    <use xlink:href="#print"></use>
                                </svg>
                            </a>
                            <a href="/admin/cost/<?php echo e($item->id); ?>" title="مشاهده هزینه">
                                <svg class="icon">
                                    <use xlink:href="#edit"></use>
                                </svg>
                            </a>
                            <i title="حذف هزینه" class="deletePay" id="<?php echo e($item->id); ?>">
                                <svg class="icon">
                                    <use xlink:href="#trash"></use>
                                </svg>
                            </i>
                        </div>
                    </div>
                    <div class="postBot">
                        <ul>
                            <li>
                                <span>زمان ثبت :</span>
                                <span><?php echo e($item->created_at); ?></span>
                            </li>
                            <li>
                                <span>نوع پرداخت :</span>
                                <?php if($item->method == 0): ?>
                                    <span>پرداخت از درگاه</span>
                                <?php endif; ?>
                                <?php if($item->method == 1): ?>
                                    <span>پرداخت از کیف پول</span>
                                <?php endif; ?>
                                <?php if($item->method == 2): ?>
                                    <span>پرداخت در محل</span>
                                <?php endif; ?>
                                <?php if($item->method == 3): ?>
                                    <span>پرداخت اقساطی</span>
                                <?php endif; ?>
                                <?php if($item->method == 4): ?>
                                    <span>خرید فوری</span>
                                <?php endif; ?>
                                <?php if($item->method == 5): ?>
                                    <span>کارت به کارت</span>
                                <?php endif; ?>
                                <?php if($item->method == 6): ?>
                                    <span>پرداخت مستقیم</span>
                                <?php endif; ?>
                            </li>
                            <li>
                                <span>مبلغ هزینه :</span>
                                <span><?php echo e(number_format($item->price)); ?> تومان</span>
                            </li>
                            <li>
                                <span>وضعیت پرداخت :</span>
                                <?php if($item->status == 100): ?>
                                    <span class="status100">پرداخت شده</span>
                                <?php endif; ?>
                                <?php if($item->status == 50): ?>
                                    <span class="status50">پرداخت بیعانه</span>
                                <?php endif; ?>
                                <?php if($item->status == 0): ?>
                                    <span class="status0">پرداخت نشده</span>
                                <?php endif; ?>
                                <?php if($item->status == 20): ?>
                                    <span class="status20">در حال پرداخت</span>
                                <?php endif; ?>
                                <?php if($item->status == 10): ?>
                                    <span class="status10">پرداخت اقساطی</span>
                                <?php endif; ?>
                                <?php if($item->status == 1): ?>
                                    <span class="status1">لغو شده</span>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo e($pays->links('admin.paginate')); ?>

        <div class="popUp" style="display:none;">
            <div class="popUpItem">
                <div class="title">آیا از حذف هزینه مطمئن هستید؟</div>
                <p>با حذف هزینه اطلاعات هزینه به طور کامل حذف میشوند</p>
                <div class="buttonsPop">
                    <form method="POST" action="" id="deletePost">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">حذف شود</button>
                    </form>
                    <button id="cancelDelete">منصرف شدم</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts3'); ?>
    <script>
        $(document).ready(function(){
            var post = 0;
            var checked = 0;
            $('.popUp').hide();
            $('.filterContent').hide();
            $('.filterTitle').click(function(){
                $('.filterContent').toggle();
            })
            $('#cancelDelete').click(function(){
                $('.popUp').hide();
                post = 0;
            })
            $('#deletePost').click(function(){
                $('.popUp').hide();
            });
            $('.allTableContainer .postItem').on('click' , '.deletePay' ,function(){
                post = this.id;
                $('.popUp').show();
                $('.buttonsPop form').attr('action' , '/admin/pay/' + post+'/delete');
            });
        })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/admin/cost/index.blade.php ENDPATH**/ ?>