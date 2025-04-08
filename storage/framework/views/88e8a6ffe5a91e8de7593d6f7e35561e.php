<?php $__env->startSection('tab',14); ?>
<?php $__env->startSection('content'); ?>
    <div class="allProduct">
        <div class="topProductIndex">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a href="/admin/page">همه برگه ها</a>
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
                    <form method="GET" action="/admin/page" class="filterContent">
                        <div class="filterContentItem">
                            <label>فیلتر عنوان و آیدی</label>
                            <input type="text" name="title" placeholder="عنوان یا آیدی را وارد کنید" value="<?php echo e($title); ?>">
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
        <table>
            <tr>
                <th>آیدی</th>
                <th>عنوان</th>
                <th>پیوند</th>
                <th>زمان ثبت</th>
                <th>عملیات</th>
            </tr>
            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->title); ?></td>
                    <td><?php echo e($item->slug); ?></td>
                    <td><?php echo e($item->created_at); ?></td>
                    <td>
                        <div class="buttons">
                            <a href="/admin/page/<?php echo e($item->id); ?>/edit">ویرایش</a>
                            <button id="<?php echo e($item->id); ?>">حذف</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <?php echo e($pages->links('admin.paginate')); ?>

        <div class="popUp" style="display:none;">
            <div class="popUpItem">
                <div class="title">آیا از حذف برگه مطمئن هستید؟</div>
                <p>با حذف برگه اطلاعات برگه به طور کامل حذف میشوند</p>
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
            $('.filterContent').hide();
            $('.filemanager').show();
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
            $('.buttons').on('click' , 'button' ,function(){
                post = this.id;
                $('.popUp').show();
                $('.buttonsPop form').attr('action' , '/admin/page/' + post+'/delete');
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myizonek/public_html/local/resources/views/admin/page/index.blade.php ENDPATH**/ ?>