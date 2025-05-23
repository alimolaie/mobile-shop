<?php $__env->startSection('tab',14); ?>
<?php $__env->startSection('content'); ?>
    <div class="allCreatePost">
        <div class="allCreatePost">
            <div class="allPostPanelTop">
                <h1>ویرایش برگه</h1>
                <div class="allPostTitle">
                    <a href="/admin">داشبورد</a>
                    <span>/</span>
                    <a href="/admin/page">همه برگه ها</a>
                    <span>/</span>
                    <a href="/admin/page/<?php echo e($posts->id); ?>/edit">ویرایش برگه</a>
                </div>
            </div>
            <div class="allCreatePostData">
                <div class="allCreatePostSubject">
                    <div class="allCreatePostItem">
                        <label>عنوان سئو :</label>
                        <input type="text" name="titleSeo" value="<?php echo e(old('titleSeo', $posts->titleSeo)); ?>" placeholder="عنوان را وارد کنید">
                        <div id="validation-titleSeo"></div>
                    </div>
                    <div class="allCreatePostItem">
                        <label>توضیحات سئو :</label>
                        <textarea name="bodySeo" placeholder="توضیحات را وارد کنید"><?php echo e($posts->bodySeo); ?></textarea>
                        <div id="validation-bodySeo"></div>
                    </div>
                    <div class="allCreatePostItem">
                        <label>کلمات کلیدی :</label>
                        <input type="text" name="keywordSeo" placeholder="با , جدا کنید" value="<?php echo e(old('keywordSeo', $posts->keyword)); ?>">
                        <div id="validation-keywordSeo"></div>
                    </div>
                    <div class="allCreatePostItem">
                        <label>توضیحات :</label>
                        <textarea name="body" class="editor"><?php echo e($posts->body); ?></textarea>
                        <div id="validation-body"></div>
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
                                <input type="text" name="title" value="<?php echo e(old('title', $posts->title)); ?>" placeholder="عنوان را وارد کنید">
                                <div id="validation-title"></div>
                            </div>
                            <div class="allCreatePostDetailItem">
                                <label>زبان* :</label>
                                <select name="language">
                                    <option value="fa" selected>فارسی</option>
                                    <option value="en">انگلیسی</option>
                                    <option value="ar">عربی</option>
                                    <option value="tr">ترکی</option>
                                </select>
                                <div id="validation-language"></div>
                            </div>
                            <div class="allCreatePostDetailItem">
                                <label>پیوند(slug) :</label>
                                <input type="text" name="slug" value="<?php echo e(old('slug', $posts->slug)); ?>" placeholder="پیوند را وارد کنید">
                            </div>
                            <div class="allCreatePostDetailItem">
                                <label>موقعیت جغرافیایی (Latitude) :</label>
                                <input type="text" name="lat" value="<?php echo e(old('lat', $posts->lat)); ?>" placeholder="موقعیت را وارد کنید">
                            </div>
                            <div class="allCreatePostDetailItem">
                                <label>موقعیت جغرافیایی (Longitude) :</label>
                                <input type="text" name="longitude" value="<?php echo e(old('longitude', $posts->longitude)); ?>" placeholder="موقعیت را وارد کنید">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts3'); ?>
    <script>
        $(document).ready(function(){
            var posts = <?php echo $posts->toJson(); ?>;
            $( 'textarea.editor' ).ckeditor();
            $("select[name='language']").val(posts.language);
            $("button[name='createPost']").click(function(event){
                var title = $(".allCreatePostDetailItems input[name='title']").val();
                var slug = $("input[name='slug']").val();
                var body = $(".allCreatePostItem textarea[name='body']").val();
                var titleSeo = $("input[name='titleSeo']").val();
                var bodySeo = $("textarea[name='bodySeo']").val();
                var keywordSeo = $("input[name='keywordSeo']").val();
                var lat = $("input[name='lat']").val();
                var longitude = $("input[name='longitude']").val();
                var language = $("select[name='language']").val();

                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    title:title,
                    slug:slug,
                    body:body,
                    titleSeo:titleSeo,
                    bodySeo:bodySeo,
                    keywordSeo:keywordSeo,
                    lat:lat,
                    longitude:longitude,
                    language:language,
                };

                $.ajax({
                    url: "/admin/page/"+posts.id+"/edit",
                    type: "put",
                    data: form,
                    success: function (data) {
                        $.toast({
                            text: "برگه ویرایش شد", // Text that is to be shown in the toast
                            heading: 'موفقیت آمیز', // Optional heading to be shown on the toast
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
                        window.location.href="/admin/page";
                    },
                    error: function (xhr) {
                        $.toast({
                            text: "فیلد های ستاره دار را پر کنید", // Text that is to be shown in the toast
                            heading: 'دقت کنید', // Optional heading to be shown on the toast
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
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#validation-' + key).append('<div class="alert alert-danger">'+value+'</div');
                        });
                    }
                });
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsScript'); ?>
    <script src="/js/jquery.toast.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/editor/ckeditor.js"></script>
    <script src="/js/editor/adapters/jquery.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
    <link rel="stylesheet" href="/css/select2.min.css"/>
    <link rel="stylesheet" href="/css/jquery.toast.min.css"/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myizonek/public_html/local/resources/views/admin/page/edit.blade.php ENDPATH**/ ?>