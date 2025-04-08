<?php $__env->startSection('tab',29); ?>
<?php $__env->startSection('content'); ?>
    <div class="allProduct">
        <div class="topProductIndex">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a href="/admin/land">لندینگ پیج</a>
            </div>
        </div>
        <?php if(\Session::has('message')): ?>
            <div class="alert">
                <?php echo \Session::get('message'); ?>

            </div>
        <?php endif; ?>
        <table>
            <tr>
                <th>آیدی</th>
                <th>عنوان</th>
                <th>پیوند</th>
                <th>عملیات</th>
            </tr>
            <?php $__currentLoopData = $lands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->slug); ?></td>
                    <td>
                        <div class="buttons">
                            <a href="/admin/land/<?php echo e($item->id); ?>/edit" class="editButton">ویرایش</a>
                            <button id="<?php echo e($item->id); ?>" class="deleteButton">حذف</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <?php echo e($lands->links('admin.paginate')); ?>

        <div class="popUp" style="display:none;">
            <div class="popUpItem">
                <div class="title">آیا از حذف صفحه مطمئن هستید؟</div>
                <p>با حذف صفحه اطلاعات صفحه به طور کامل حذف میشوند</p>
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
                $('.buttonsPop form').attr('action' , '/admin/land/' + post+'/delete');
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsScript'); ?>
    <script src="/js/jquery.toast.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
    <link rel="stylesheet" href="/css/jquery.toast.min.css"/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myizonek/public_html/local/resources/views/admin/land/index.blade.php ENDPATH**/ ?>