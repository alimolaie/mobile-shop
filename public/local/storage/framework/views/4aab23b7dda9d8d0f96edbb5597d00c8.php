<?php $__env->startSection('tab',2); ?>
<?php $__env->startSection('content'); ?>
    <div class="allBrandPanel">
        <div class="topBrandPanel">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a>تاکسونامی</a>
                <span>/</span>
                <a href="/admin/category">دسته بندی</a>
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
                    <form method="GET" action="/admin/category" class="filterContent">
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
        <div class="allTables">
            <div>
                <table>
                    <tr>
                        <th>آیدی</th>
                        <th>عنوان</th>
                        <th>عملیات</th>
                    </tr>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->name); ?></td>
                            <td>
                                <div class="buttons">
                                    <a href="/admin/category/<?php echo e($item->id); ?>/show">آمارگیری</a>
                                    <button id="<?php echo e($item->id); ?>" class="editButton">ویرایش</button>
                                    <button id="<?php echo e($item->id); ?>" class="deleteButton">حذف</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php echo e($categories->links('admin.paginate')); ?>

            </div>
            <div>
                <form action="/admin/category" class="createFilled" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="filledItem">
                        <label>عنوان*</label>
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
                    <div class="filledItem">
                        <label>زبان* :</label>
                        <select name="language">
                            <option value="fa" selected>فارسی</option>
                            <option value="en">انگلیسی</option>
                            <option value="ar">عربی</option>
                            <option value="tr">ترکی</option>
                        </select>
                        <div id="validation-language"></div>
                    </div>
                    <div class="filledItem">
                        <label>پیوند</label>
                        <input type="text" name="slug" placeholder="پیوند را وارد کنید">
                    </div>
                    <div class="filledItem">
                        <label>توضیحات*</label>
                        <textarea name="body" placeholder="توضیحات را وارد کنید"></textarea>
                    </div>
                    <div class="filledItem">
                        <label>عنوان سئو*</label>
                        <input type="text" name="nameSeo" placeholder="عنوان را وارد کنید">
                        <?php $__errorArgs = ['nameSeo'];
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
                        <label>کلمات کلیدی*</label>
                        <input name="keyword" placeholder="با , جدا کنید"/>
                        <?php $__errorArgs = ['keyword'];
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
                        <label>پورسانت*</label>
                        <input name="percent" placeholder="بین 1 تا 99 وارد کنید"/>
                        <?php $__errorArgs = ['percent'];
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
                        <label>توضیحات سئو*</label>
                        <textarea name="bodySeo" placeholder="توضیحات را وارد کنید"></textarea>
                        <?php $__errorArgs = ['bodySeo'];
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
                        <label>نوع دسته بندی :</label>
                        <select name="type">
                            <option value="0" selected>محصول</option>
                            <option value="1">بلاگ</option>
                            <option value="2">فروشنده</option>
                        </select>
                    </div>
                    <div class="filledItem2">
                        <label>زیر مجموعه های این دسته :</label>
                        <select class="cats-multiple" name="cats[]" multiple="multiple">
                            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="addImageButton">برای افزودن تصویر کلیک کنید</div>
                    <div class="sendGallery">
                        <div class="getImageItem">
                            <span id="imageTooltip">تصاویر خود را وارد کنید</span>
                        </div>
                    </div>
                    <div class="buttonForm">
                        <button type="submit">ثبت اطلاعات</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="popUp" style="display:none;">
            <div class="popUpItem">
                <div class="title">آیا از حذف دسته بندی مطمئن هستید؟</div>
                <p>با حذف دسته بندی اطلاعات دسته بندی به طور کامل حذف میشوند</p>
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
    <div class="filemanager">
        <?php echo $__env->make('admin.filemanager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts3'); ?>
    <script>
        $(document).ready(function(){
            var post = 0;
            $('.cats-multiple').val([]);
            $('.cats-multiple').select2({
                placeholder: 'دسته بندی را انتخاب کنید ...',
                "language": {
                    "noResults": function(){
                        return "موردی پیدا نشد";
                    }
                },
            });
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
            $("textarea[name='body']").ckeditor();
            $('.allTables .buttons').on('click' , '.deleteButton' ,function(){
                post = this.id;
                $('.popUp').show();
                $('.buttonsPop form').attr('action' , '/admin/category/' + post+'/delete');
            })
            $('.allTables .buttons').on('click' , '.editButton' ,function(){
                window.scrollTo(0,0);
                post = this.id;
                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    category:post,
                };
                $.ajax({
                    url: "/admin/category/" + post + "/edit",
                    type: "get",
                    data: form,
                    success: function (data) {
                        $('.createFilled').attr('action' , '/admin/category/' + post+'/edit');
                        $(".createFilled input[name='_method']").remove();
                        $('.createFilled').append(
                            $('<?php echo method_field('put'); ?>')
                        )
                        $('.buttonForm h4').remove();
                        $('.buttonForm').append(
                            $('<h4>لغو</h4>').on('click',function(ss){
                                post = 0;
                                $('.createFilled').attr('action' , '/admin/category/');
                                $(".createFilled input[name='_method']").remove();
                                $(this).hide();
                                $("input[name='name']").val('');
                                $("input[name='slug']").val('');
                                $("input[name='nameSeo']").val('');
                                $("input[name='keyword']").val('');
                                $("input[name='percent']").val('');
                                $("textarea[name='body']").val('');
                                $("textarea[name='bodySeo']").val('');
                                $("input[name='image']").val('');
                                $('.cats-multiple').val([]);
                                $("select[name='type']").val(0);
                                $('.getImageItem .getImagePic').remove()
                            })
                        )
                        $("input[name='name']").val(data.name);
                        $("input[name='slug']").val(data.slug);
                        $("input[name='nameSeo']").val(data.nameSeo);
                        $("input[name='keyword']").val(data.keyword);
                        $("input[name='percent']").val(data.percent);
                        $("textarea[name='body']").val(data.body);
                        $("textarea[name='bodySeo']").val(data.bodySeo);
                        $("select[name='type']").val(data.type);
                        $("select[name='language']").val(data.language);
                        var cats2 = []
                        $('.cats-multiple').val(cats2);
                        $('.cats-multiple').select2({
                            placeholder: 'محصول را انتخاب کنید ...',
                            "language": {
                                "noResults": function(){
                                    return "موردی پیدا نشد";
                                }
                            },
                        });
                        if(data.cats.length){
                            $.each(data.cats,function(){
                                cats2.push(this.id);
                            });
                            $('.cats-multiple').val(cats2);
                            $('.cats-multiple').select2({
                                placeholder: 'محصول را انتخاب کنید ...',
                                "language": {
                                    "noResults": function(){
                                        return "موردی پیدا نشد";
                                    }
                                },
                            });
                        }
                        $('.getImageItem').append(
                            $('<div class="getImagePic"><input type="hidden" name="image" value="'+data.image+'"><i><svg class="deleteImg"><use xlink:href="#trash"></use></svg></i><img src="'+data.image+'"></div>')
                                .on('click' , '.deleteImg',function(ss){
                                    ss.currentTarget.parentElement.parentElement.remove();
                                })
                        );
                        $("input[name='image']").val(data.image);
                    },
                });
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsScript'); ?>
    <script src="/js/select2.min.js"></script>
    <script src="/js/editor/ckeditor.js"></script>
    <script src="/js/editor/adapters/jquery.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
    <link rel="stylesheet" href="/css/select2.min.css"/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/admin/taxonomy/index/category.blade.php ENDPATH**/ ?>