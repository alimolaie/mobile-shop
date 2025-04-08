

<?php $__env->startSection('tab',4); ?>

<?php $__env->startSection('content'); ?>
    <div class="allManageSetting">
        <div class="topProductIndex">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a href="/admin/setting/theme">تغییر دمو و رنگ</a>
            </div>
        </div>
        <?php if(\Session::has('message')): ?>
            <div class="alert">
                <?php echo \Session::get('message'); ?>

            </div>
        <?php endif; ?>
        <form method="post" action="/admin/setting/theme" class="settingMangeItems">
            <?php echo csrf_field(); ?>
            <div class="settingItem">
                <label for="">تغییر ویجت دمو</label>
                <select name="demo">
                    <option value="0" selected>انتخاب در صورت نیاز</option>
                    <option value="1">کلاسیک 1</option>
                    <option value="2">کلاسیک 2</option>
                    <option value="3">کلاسیک 3</option>
                    <option value="4">کلاسیک 4</option>
                    <option value="5">کلاسیک 5</option>
                    <option value="6">کلاسیک 6</option>
                    <option value="7">کلاسیک 7</option>
                    <option value="8">کلاسیک 8</option>
                </select>
            </div>
            <div class="settingItem">
                <label>نوع نمایش  صفحه معرفی محصول</label>
                <select name="singleDesign">
                    <option value="0">سه ردیف</option>
                    <option value="1">دو ردیف</option>
                    <option value="2">تصویر وسط</option>
                    <option value="3">باکس متحرک چپ</option>
                </select>
            </div>
            <div class="settingItem">
                <label>فونت سایت</label>
                <select name="font">
                    <option value="0">ایران سانس</option>
                    <option value="1">وزیر</option>
                    <option value="2">ساحل</option>
                </select>
            </div>
            <div class="settingItem">
                <label>نوع نمایش هدر سایت</label>
                <select name="headerDesign">
                    <option value="0">هدر 1</option>
                    <option value="1">هدر 2</option>
                    <option value="2">هدر 3</option>
                </select>
            </div>
            <div class="settingItem">
                <label>نوع نمایش فوتر سایت</label>
                <select name="footerDesign">
                    <option value="0">فوتر 1</option>
                    <option value="1">فوتر 2</option>
                    <option value="2">فوتر 3</option>
                </select>
            </div>
            <div class="settingItem">
                <label>نوع نمایش صفحه لاگین</label>
                <select name="loginDesign">
                    <option value="0">لاگین 1</option>
                    <option value="1">لاگین 2</option>
                </select>
            </div>
            <div class="settingItem">
                <label>نوع نمایش شبکه اجتماعی</label>
                <select name="floatDesign">
                    <option value="0">نوع 1</option>
                    <option value="1">نوع 2</option>
                </select>
            </div>
            <h3>حالت روشن</h3>
            <div class="settingItemPage">
                <div class="settingItem">
                    <label for="">رنگ پیشفرض (سبز)</label>
                    <input type="color" name="greenColorLight" value="<?php echo e($greenColorLight); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پیشفرض دوم(قرمز)</label>
                    <input type="color" name="redColorLight" value="<?php echo e($redColorLight); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پس زمینه سایت</label>
                    <input type="color" name="backColorLight1" value="<?php echo e($backColorLight1); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ هدر سایت</label>
                    <input type="color" name="headerColorLight" value="<?php echo e($headerColorLight); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ هدر سایت 2</label>
                    <input type="color" name="headerColor2Light" value="<?php echo e($headerColor2Light); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پس زمینه ویجت</label>
                    <input type="color" name="widgetColorLight" value="<?php echo e($widgetColorLight); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ باکس صفحه معرفی محصول</label>
                    <input type="color" name="singleColorLight" value="<?php echo e($singleColorLight); ?>">
                </div>
            </div>
            <h3>حالت دارک</h3>
            <div class="settingItemPage">
                <div class="settingItem">
                    <label for="">رنگ پیشفرض (سبز)</label>
                    <input type="color" name="greenColorDark" value="<?php echo e($greenColorDark); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پیشفرض دوم(قرمز)</label>
                    <input type="color" name="redColorDark" value="<?php echo e($redColorDark); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پس زمینه سایت</label>
                    <input type="color" name="backColorDark1" value="<?php echo e($backColorDark1); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ هدر سایت</label>
                    <input type="color" name="headerColorDark" value="<?php echo e($headerColorDark); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ هدر سایت 2</label>
                    <input type="color" name="headerColor2Dark" value="<?php echo e($headerColor2Dark); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پس زمینه ویجت</label>
                    <input type="color" name="widgetColorDark" value="<?php echo e($widgetColorDark); ?>">
                </div>
                <div class="settingItem">
                    <label for="">رنگ باکس صفحه معرفی محصول</label>
                    <input type="color" name="singleColorDark" value="<?php echo e($singleColorDark); ?>">
                </div>
            </div>
            <button>ثبت اطلاعات</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts3'); ?>
    <script>
        $(document).ready(function(){
            var singleDesign = <?php echo json_encode($singleDesign, JSON_HEX_TAG); ?>;
            var font = <?php echo json_encode($font, JSON_HEX_TAG); ?>;
            var headerDesign = <?php echo json_encode($headerDesign, JSON_HEX_TAG); ?>;
            var loginDesign = <?php echo json_encode($loginDesign, JSON_HEX_TAG); ?>;
            var footerDesign = <?php echo json_encode($footerDesign, JSON_HEX_TAG); ?>;
            var floatDesign = <?php echo json_encode($floatDesign, JSON_HEX_TAG); ?>;
            $("select[name='singleDesign']").val(singleDesign);
            $("select[name='font']").val(font);
            $("select[name='headerDesign']").val(headerDesign);
            $("select[name='loginDesign']").val(loginDesign);
            $("select[name='footerDesign']").val(footerDesign);
            $("select[name='floatDesign']").val(floatDesign);
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myizonek/public_html/local/resources/views/admin/setting/theme.blade.php ENDPATH**/ ?>