<?php $__env->startSection('tab',29); ?>
<?php $__env->startSection('content'); ?>
    <div class="allCreatePost">
        <div class="allCreatePost">
            <div class="allPostPanelTop">
                <h1>افزودن صفحه</h1>
                <div class="allPostTitle">
                    <a href="/admin">داشبورد</a>
                    <span>/</span>
                    <a href="/admin/land">همه صفحه ها</a>
                    <span>/</span>
                    <a href="/admin/land/create">افزودن صفحه</a>
                </div>
            </div>
            <?php if(\Session::has('message')): ?>
                <div class="success">
                    <?php echo \Session::get('message'); ?>

                </div>
            <?php endif; ?>
            <form action="/admin/land/create" method="post" class="allCreatePostData">
                <?php echo csrf_field(); ?>
                <div class="allCreatePostSubject">
                    <div class="allCreatePostItem">
                        <label>صفحه html خود را قرار دهید :</label>
                        <textarea name="body" style="direction: ltr;text-align: left"></textarea>
                        <?php $__errorArgs = ['html'];
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
                    <button class="button" name="createPost" type="submit">ارسال اطلاعات</button>
                </div>
                <div class="allCreatePostDetails">
                    <div class="allCreatePostDetail">
                        <div class="allCreatePostDetailItemsTitle">
                            جزییات
                        </div>
                        <div class="allCreatePostDetailItems">
                            <div class="allCreatePostDetailItem">
                                <label>عنوان* :</label>
                                <input type="text" name="name" placeholder="عنوان را وارد کنید">
                                <?php $__errorArgs = ['name'];
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
                            <div class="allCreatePostDetailItem">
                                <label>پیوند(slug) :</label>
                                <input type="text" name="slug" placeholder="پیوند را وارد کنید">
                                <?php $__errorArgs = ['slug'];
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
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myizonek/public_html/local/resources/views/admin/land/create.blade.php ENDPATH**/ ?>