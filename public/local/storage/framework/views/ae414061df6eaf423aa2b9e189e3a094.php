<?php $__env->startSection('tab' , 6); ?>
<?php $__env->startSection('content'); ?>
    <div class="allNote">
        <?php if(\Session::has('message')): ?>
            <div class="alert">
                <?php echo \Session::get('message'); ?>

            </div>
        <?php endif; ?>
        <div class="allTables">
            <div>
                <table>
                    <tr style="grid-template-columns: 1fr 8rem 8rem;">
                        <th>ایمیل</th>
                        <th>زمان ثبت</th>
                        <th>عملیات</th>
                    </tr>
                    <?php $__currentLoopData = $sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="grid-template-columns: 1fr 8rem 8rem;">
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->created_at); ?></td>
                            <td>
                                <div class="buttons">
                                    <button id="<?php echo e($item->id); ?>" class="deleteButton">حذف</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php echo e($sub->links('admin.paginate')); ?>

            </div>
            <div>
                <form action="/admin/subscribe" class="createFilled" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="filledItem">
                        <label>ایمیل :*</label>
                        <input type="text" name="email" placeholder="ایمیل را وارد کنید">
                        <?php $__errorArgs = ['email'];
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
                <div class="title">آیا از حذف ایمیل مطمئن هستید؟</div>
                <p>با حذف ایمیل اطلاعات ایمیل به طور کامل حذف میشوند</p>
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
            $('#deletePost').click(function(){
                $('.popUp').hide();
            });
            $('.buttons').on('click' , '.deleteButton' ,function(){
                post = this.id;
                $('.popUp').show();
                $('.buttonsPop form').attr('action' , '/admin/subscribe/' + post+'/delete');
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\NewSeo\seoshop\resources\views/admin/event/subscribe.blade.php ENDPATH**/ ?>