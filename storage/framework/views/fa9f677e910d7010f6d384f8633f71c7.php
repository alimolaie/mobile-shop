<?php $__env->startSection('tab',15); ?>
<?php $__env->startSection('content'); ?>
    <div class="allBrandPanel">
        <div class="topBrandPanel">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a>تاکسونامی</a>
                <span>/</span>
                <a href="/admin/link">لینک هدر</a>
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
                    <form method="GET" action="/admin/link" class="filterContent">
                        <div class="filterContentItem">
                            <label>فیلتر عنوان و آیدی</label>
                            <input type="text" name="name" placeholder="عنوان یا آیدی را وارد کنید" value="<?php echo e($title); ?>">
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
                <div class="notes">
                    <div class="noteItem">به سمت <span>"چپ"</span> بکشید تا زیرمنو لینک بالایی شود.</div>
                    <div class="noteItem">به سمت <span>"راست"</span> بکشید تا از زیرمنو لینک بالایی خارج شود.</div>
                </div>
                <div class="parentTr">
                    <div class="titleTr">عنوان</div>
                    <div class="titleTr">عملیات</div>
                </div>
                <ul id="sortable">
                    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="parentTr change1" id="<?php echo e($item->id); ?>">
                            <div class="titleTr nameT"><?php echo e($item->name); ?></div>
                            <div class="titleTr">
                                <div class="buttons">
                                    <button id="<?php echo e($item->id); ?>" class="editButton">ویرایش</button>
                                    <button id="<?php echo e($item->id); ?>" class="deleteButton">حذف</button>
                                </div>
                            </div>
                        </li>
                        <?php $__currentLoopData = \App\Models\Link::where('parent_id' , $item->id)->orderBy('number')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="parentTr change1 submenu" id="<?php echo e($val->id); ?>" data-id="<?php echo e($item->id); ?>">
                                <div class="titleTr nameT"><?php echo e($val->name); ?></div>
                                <div class="titleTr">
                                    <div class="buttons">
                                        <button id="<?php echo e($val->id); ?>" class="editButton">ویرایش</button>
                                        <button id="<?php echo e($val->id); ?>" class="deleteButton">حذف</button>
                                    </div>
                                </div>
                            </li>
                            <?php $__currentLoopData = \App\Models\Link::where('parent_id' , $val->id)->orderBy('number')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="parentTr change1 submenu2" id="<?php echo e($el->id); ?>" data-id="<?php echo e($val->id); ?>">
                                    <div class="titleTr nameT"><?php echo e($el->name); ?></div>
                                    <div class="titleTr">
                                        <div class="buttons">
                                            <button id="<?php echo e($el->id); ?>" class="editButton">ویرایش</button>
                                            <button id="<?php echo e($el->id); ?>" class="deleteButton">حذف</button>
                                        </div>
                                    </div>
                                </li>
                                <?php $__currentLoopData = \App\Models\Link::where('parent_id' , $el->id)->orderBy('number')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="parentTr change1 submenu3" id="<?php echo e($data->id); ?>" data-id="<?php echo e($el->id); ?>">
                                        <div class="titleTr nameT"><?php echo e($data->name); ?></div>
                                        <div class="titleTr">
                                            <div class="buttons">
                                                <button id="<?php echo e($data->id); ?>" class="editButton">ویرایش</button>
                                                <button id="<?php echo e($data->id); ?>" class="deleteButton">حذف</button>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <button id="logButton">ذخیره جایگاه</button>
                <?php echo e($links->links('admin.paginate')); ?>

            </div>
            <div>
                <form action="/admin/link" class="createFilled" method="post">
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
                        <label>ریز عنوان*</label>
                        <input type="text" name="tooltip" placeholder="مثال : جدید">
                        <?php $__errorArgs = ['tooltip'];
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
                        <label>نوع*</label>
                        <select name="type" id="">
                            <option value="0" selected>داخل هدر</option>
                            <option value="1">داخل فوتر</option>
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
                        <label>آدرس*</label>
                        <input type="text" name="slug" placeholder="آدرس را وارد کنید">
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
                    <div class="buttonForm">
                        <button type="submit">ثبت اطلاعات</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="popUp" style="display:none;">
            <div class="popUpItem">
                <div class="title">آیا از حذف لینک مطمئن هستید؟</div>
                <p>با حذف لینک اطلاعات لینک به طور کامل حذف میشوند</p>
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
            $('.buttons').on('click' , '.deleteButton' ,function(){
                post = this.id;
                $('.popUp').show();
                $('.buttonsPop form').attr('action' , '/admin/link/' + post+'/delete');
            })
            $('.buttons').on('click' , '.editButton' ,function(){
                window.scrollTo(0,0);
                post = this.id;
                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    link:post,
                };
                $.ajax({
                    url: "/admin/link/" + post + "/edit",
                    type: "get",
                    data: form,
                    success: function (data) {
                        $('.createFilled').attr('action' , '/admin/link/' + post+'/edit');
                        $(".createFilled input[name='_method']").remove();
                        $('.createFilled').append(
                            $('<?php echo method_field('put'); ?>')
                        )
                        $('.buttonForm h4').remove();
                        $('.buttonForm').append(
                            $('<h4>لغو</h4>').on('click',function(ss){
                                post = 0;
                                $('.createFilled').attr('action' , '/admin/link/');
                                $(".createFilled input[name='_method']").remove();
                                $(this).hide();
                                $("input[name='name']").val('');
                                $("input[name='tooltip']").val('');
                                $("input[name='slug']").val('');
                                $("select[name='type']").val(0);
                            })
                        )
                        $("input[name='name']").val(data.name);
                        $("input[name='tooltip']").val(data.tooltip);
                        $("input[name='slug']").val(data.slug);
                        $("select[name='type']").val(data.type);
                        $("select[name='language']").val(data.language);
                    },
                });
            })

            var lastDraggedLeft = false;

            $("#sortable").sortable({
                start: function(event, ui) {
                    lastDraggedLeft = ui.helper.hasClass("submenu");
                },
                beforeStop: function(event, ui) {
                    getChange(ui);
                },
                stop: function(event, ui) {
                    var item = ui.item;
                    if (item.hasClass("submenu")) {
                        var container = $("#sortable");
                        var containerOffset = container.offset();
                        var itemOffset = item.offset();
                        if (itemOffset.left < containerOffset.left || itemOffset.left + item.width() > containerOffset.left + container.width()) {
                            item.removeClass("submenu");
                            item.removeClass("submenu2");
                            item.removeClass("submenu3");
                        }
                    }
                },
            });
            $("#sortable").disableSelection();

            $("#logButton").on("click", function() {
                var links = [];
                $.each($('.change1') , function (){
                    var list = {
                        mine : $(this).attr('id'),
                        parent : $(this).attr('data-id'),
                    };
                    links.push(list);
                })

                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    links:JSON.stringify(links),
                };
                $.ajax({
                    url: "/admin/link/change",
                    type: "post",
                    data: form,
                    success: function (data) {
                        $.toast({
                            text: "ذخیره شد", // Text that is to be shown in the toast
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
                        window.location.reload();
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
                        $("button[name='createPost']").text('ذخیره جایگاه');
                    }
                });
            });
            function getChange(ui) {
                var item = ui.item;
                var draggedLeft = ui.position.left < 300;
                if (draggedLeft) {
                    var upperItem = item.prev();
                    item.attr('data-id',upperItem.attr('id'))
                    if(upperItem.hasClass("change1")){
                        item.addClass("submenu")
                    }
                    if (upperItem.hasClass("submenu")) {
                        if (upperItem.hasClass("submenu2")) {
                            item.addClass("submenu3");
                            if (upperItem.hasClass("submenu3")) {
                                item.attr('data-id',upperItem.attr('data-id'))
                            }
                        }else{
                            item.removeClass("submenu3");
                        }
                        item.addClass("submenu2");
                    }else{
                        item.removeClass("submenu2");
                        item.removeClass("submenu3");
                    }
                } else if (ui.position.left >= 500) {
                    item.attr('class',"parentTr change1");
                    item.attr('data-id','')
                }
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsScript'); ?>
    <script src="/js/jquery-ui.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/admin/taxonomy/index/link.blade.php ENDPATH**/ ?>