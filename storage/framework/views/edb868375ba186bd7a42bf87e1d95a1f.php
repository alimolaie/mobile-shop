<?php $__env->startSection('tab',6); ?>
<?php $__env->startSection('content'); ?>
    <div class="allBrandPanel">
        <div class="topBrandPanel">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a href="/admin/wallet">کیف پول</a>
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
                    <form method="GET" action="/admin/wallet" class="filterContent">
                        <div class="filterContentItem">
                            <label>فیلتر نوع شارژ</label>
                            <select name="title">
                                <option value="">همه</option>
                                <option value="0">افزایش شارژ</option>
                                <option value="1">کاهش شارژ</option>
                            </select>
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
        <div class="allTables">
            <div>
                <table>
                    <tr>
                        <th>نوع</th>
                        <th>مبلغ</th>
                        <th>وضعیت پرداخت</th>
                        <th>کاربر</th>
                        <th>عملیات</th>
                    </tr>
                    <?php $__currentLoopData = $wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($item->type == 0): ?>
                                    افزایش شارژ
                                    <?php else: ?>
                                    کاهش شارژ
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(number_format($item->price)); ?> تومان </td>
                            <td>
                                <?php if($item->status == 0): ?>
                                    پرداخت نشده
                                <?php else: ?>
                                    پرداخت موفق
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item->user): ?>
                                    <?php echo e($item->user->name); ?>

                                <?php else: ?>
                                    نامشخص
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="buttons">
                                    <button id="<?php echo e($item->id); ?>" class="editButton">ویرایش</button>
                                    <button id="<?php echo e($item->id); ?>" class="deleteButton">حذف</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php echo e($wallets->links('admin.paginate')); ?>

            </div>
            <div>
                <form action="/admin/wallet" class="createFilled" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="filledItem">
                        <label>مبلغ(تومان)*</label>
                        <input type="text" name="price" placeholder="مبلغ را وارد کنید">
                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="filledItem">
                        <label for="type">نوع شارژ :</label>
                        <select id="type" name="type">
                            <option value="0" selected>افزایش</option>
                            <option value="1">کاهش</option>
                        </select>
                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="filledItem">
                        <label for="status">وضعیت پرداخت :</label>
                        <select id="status" name="status">
                            <option value="0">پرداخت نشده</option>
                            <option value="100" selected>پرداخت شده</option>
                        </select>
                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="filledItem">
                        <label for="user_id">کاربر :</label>
                        <select id="user_id" name="user_id">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="buttonForm">
                        <button type="submit">ثبت اطلاعات</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="popUp" style="display:none;">
            <div class="popUpItem">
                <div class="title">آیا از حذف شارژ مطمئن هستید؟</div>
                <p>با حذف شارژ اطلاعات شارژ به طور کامل حذف میشوند</p>
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
            $('.popUp').hide();
            $('.filemanager').hide();
            $('.filterContent').hide();
            $('.filterTitle').click(function(){
                $('.filterContent').toggle();
            })
            $('.addImageButton').click(function(){
                $('.filemanager').show();
            });
            $('#cancelDelete').click(function(){
                $('.popUp').hide();
                post = 0;
            })
            $('#deletePost').click(function(){
                $('.popUp').hide();
            });
            $('.buttons').on('click' , '.deleteButton' ,function(){
                post = this.id;
                $('.popUp').show();
                $('.buttonsPop form').attr('action' , '/admin/wallet/' + post+'/delete');
            })
            $('.buttons').on('click' , '.editButton' ,function(){
                window.scrollTo(0,0);
                post = this.id;
                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    wallet:post,
                };
                $.ajax({
                    url: "/admin/wallet/" + post + "/edit",
                    type: "get",
                    data: form,
                    success: function (data) {
                        $('.createFilled').attr('action' , '/admin/wallet/' + post+'/edit');
                        $(".createFilled input[name='_method']").remove();
                        $('.createFilled').append(
                            $('<?php echo method_field('put'); ?>')
                        )
                        $('.buttonForm h4').remove();
                        $('.buttonForm').append(
                            $('<h4>لغو</h4>').on('click',function(ss){
                                post = 0;
                                $('.createFilled').attr('action' , '/admin/wallet/');
                                $(".createFilled input[name='_method']").remove();
                                $(this).hide();
                                $("input[name='price']").val('');
                                $("select[name='type']").val(0);
                                $("select[name='status']").val(100);
                            })
                        )
                        $("input[name='price']").val(data.price);
                        $("select[name='type']").val(data.type);
                        $("select[name='status']").val(data.status);
                        $("select[name='user_id']").val(data.user_id);
                    },
                });
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\NewSeo\seoshop\resources\views/admin/wallet/index.blade.php ENDPATH**/ ?>