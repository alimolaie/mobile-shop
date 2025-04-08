<?php $__env->startSection('tab',4); ?>

<?php $__env->startSection('content'); ?>
    <div class="allManageSetting">
        <div class="topProductIndex">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a href="/admin/setting/cache">تنظیمات کش</a>
            </div>
        </div>
        <?php if(\Session::has('message')): ?>
            <div class="alert">
                <?php echo \Session::get('message'); ?>

            </div>
        <?php endif; ?>
        <form method="post" action="/admin/setting/cache" class="settingMangeItems">
            <?php echo csrf_field(); ?>
            <div class="settingItem">
                <label>زمان ذخیره کش (دقیقه)</label>
                <input type="text" name="cacheTime" value="<?php echo e($cacheTime); ?>" placeholder="مثال : 2">
            </div>
            <div class="settingItem">
                <label for="">وضعیت کش</label>
                <select name="cacheStatus">
                    <option value="0">غیرفعال</option>
                    <option value="1">فعال</option>
                </select>
            </div>
            <button>ثبت اطلاعات</button>
            <div class="buttons" style="margin-top: 3rem">
                <button style="background: red" class="cacheDelete" data-type="0" data-num="0">حذف کش صفحه اصلی</button>
                <button style="background: red" class="cacheDelete" data-type="0" data-num="1">حذف کش آدرس ها</button>
                <button style="background: red" class="cacheDelete" data-type="0" data-num="2">حذف کش کانفیگ ها</button>
                <button style="background: red" class="cacheDelete" data-type="0" data-num="3">حذف کش صفحات</button>
                <button style="background: red" class="cacheDelete" data-type="0" data-num="4">حذف کش پکیج</button>
            </div>
            <div class="buttons" style="margin-top: 1rem">
                <button class="cacheDelete" data-type="1" data-num="0">کش آدرس ها</button>
                <button class="cacheDelete" data-type="1" data-num="2">کش صفحات</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts3'); ?>
    <script>
        $(document).ready(function(){
            var cacheStatus = <?php echo json_encode($cacheStatus, JSON_HEX_TAG); ?>;
            $("select[name='cacheStatus']").val(cacheStatus == 1?1:0);
            $(".settingMangeItems .buttons .cacheDelete").click(function (e) {
                e.preventDefault();
                var btn = $(this);
                var btnText = $(this).text();
                btn.text('منتظر بمانید');
                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'type': $(this).attr('data-type'),
                    'num': $(this).attr('data-num'),
                };
                $.ajax({
                    url: "/admin/setting/change-cache",
                    type: "post",
                    data: form,
                    success: function (data) {
                        btn.text(btnText);
                    },
                });
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\NewSeo\seoshop\resources\views/admin/setting/cache.blade.php ENDPATH**/ ?>