<?php $__env->startSection('tab' , 3); ?>
<?php $__env->startSection('content'); ?>
<div class="allCreateWidget">
    <div class="topProductIndex">
        <div class="right">
            <a href="/admin">داشبورد</a>
            <span>/</span>
            <a href="/admin/widget">ویجت ها</a>
            <span>/</span>
            <a href="/admin/widget/create">افزودن ویجت</a>
        </div>
    </div>
    <div class="createWidget">
        <div class="createItem change1">
            <label for="name">نوع ویجت</label>
            <select name="name">
                <option value="تبلیغ اسلایدری">تبلیغ اسلایدری</option>
                <option value="تبلیغ ساده">تبلیغ ساده</option>
                <option value="محصولات با پس زمینه">محصولات با پس زمینه</option>
                <option value="محصول تصویر چپ">محصول تصویر چپ</option>
                <option value="محصول تصویر بالا">محصول تصویر بالا</option>
                <option value="محصولات عمودی با پس زمینه">محصولات عمودی با پس زمینه</option>
                <option value="محصولات افقی با دسته بندی">محصولات افقی با دسته بندی</option>
                <option value="محصولات با فیلتر">محصولات با فیلتر</option>
                <option value="اسلایدر بزرگ">اسلایدر بزرگ</option>
                <option value="دسته بندی">دسته بندی</option>
                <option value="خبر">خبر</option>
                <option value="خبر2">خبر2</option>
                <option value="درباره ما">درباره ما</option>
                <option value="دسته بندی 2">دسته بندی 2</option>
                <option value="بنر با عنوان">بنر با عنوان</option>
                <option value="گردونه دسته بندی">گردونه دسته بندی</option>
                <option value="پک محصولات">پک محصولات</option>
                <option value="لیستی">لیستی</option>
                <option value="محصول2">محصول2</option>
                <option value="محصول3">محصول3</option>
                <option value="مقایسه">مقایسه</option>
                <option value="جستجو2">جستجو2</option>
                <option value="جستجو">جستجو</option>
                <option value="بهترین ها">بهترین ها</option>
                <option value="شگفت انگیز">شگفت انگیز</option>
                <option value="پیشنهاد لحظه ای">پیشنهاد لحظه ای</option>
                <option value="محصولات اسلایدری" selected>محصولات اسلایدری</option>
                <option value="محصول عرضی">محصول عرضی</option>
                <option value="استوری">استوری</option>
                <option value="وام">وام</option>
                <option value="جشنواره">جشنواره</option>
                <option value="سوال متداول">سوال متداول</option>
                <option value="فروشندگان">فروشندگان</option>
                <option value="متن">متن</option>
            </select>
        </div>
        <div class="createItems">
            <div class="createItem change2">
                <label>نمایش عنوان :</label>
                <input type="text" placeholder="عنوان را وارد کنید" name="title">
            </div>
            <div class="createItem change3">
                <label>عنوان مشاهده بیشتر :</label>
                <input type="text" placeholder="عنوان را وارد کنید" name="more">
            </div>
            <div class="createItem change5">
                <label>توضیحات :</label>
                <input type="text" placeholder="توضیحات را وارد کنید" name="description">
            </div>
            <div class="createItem change6">
                <label>رنگ پس زمینه :</label>
                <input type="color" placeholder="کد رنگ را وارد کنید" name="background">
            </div>
            <div class="createItem change7">
                <label>پیوند یکتا (slug) :</label>
                <input type="text" placeholder="پیوند را وارد کنید" name="slug">
            </div>
            <div class="createItem change8">
                <label>آدرس تصویر :</label>
                <input type="text" placeholder="آدرس را وارد کنید" name="background2">
            </div>
            <div class="createItem change9">
                <label>تعداد نمایش :</label>
                <input type="text" placeholder="تعداد را وارد کنید" name="count">
            </div>
            <div class="createItem change18">
                <label>ارتفاع تصویر(rem) :</label>
                <input type="number" placeholder="ارتفاع را وارد کنید" name="height">
            </div>
            <div class="createItem change21">
                <label>زمان شروع یا پایان جشنواره :</label>
                <input type="text" placeholder="زمان را وارد کنید" name="number">
            </div>
            <div class="createItem change19">
                <label>امکان حرکت :</label>
                <select name="move">
                    <option value="0" selected>بدون حرکت</option>
                    <option value="1">حرکت اسلایدر</option>
                </select>
            </div>
            <div class="createItem">
                <label>نوع :</label>
                <select name="responsive">
                    <option value="0" selected>حالت دسکتاپ</option>
                    <option value="1">حالت موبایل</option>
                </select>
            </div>
            <div class="createItem change10">
                <label for="cats">دسته بندی :</label>
                <select class="cats-multiple" name="cats" id="cats" multiple="multiple">
                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="createItem change11">
                <label for="brands">برند :</label>
                <select class="brands-multiple" name="brands" id="brands" multiple="multiple">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="createItem change12">
                <label for="sort">نمایش براساس :</label>
                <select name="sort" id="sort">
                    <option value="0">جدید ترین</option>
                    <option value="1">محبوب ترین</option>
                    <option value="2">پربازدید ترین</option>
                    <option value="3">ارزان ترین</option>
                    <option value="4">گران ترین</option>
                    <option value="5">پرفروش ترین</option>
                </select>
            </div>
            <div class="createItem change13">
                <label>نوع کالا :</label>
                <select name="type">
                    <option value="3">همه</option>
                    <option value="0">فقط موجود</option>
                    <option value="1">تخفیف خورده</option>
                    <option value="2">پیشنهادی</option>
                </select>
            </div>
            <div class="createItem change14">
                <label>وضعیت نمایش :</label>
                <select name="status">
                    <option value="0">پیشنویس</option>
                    <option value="1" selected>انتشار</option>
                </select>
            </div>
            <div class="createItem">
                <label>زبان* :</label>
                <select name="language">
                    <option value="fa" selected>فارسی</option>
                    <option value="en">انگلیسی</option>
                    <option value="ar">عربی</option>
                    <option value="tr">ترکی</option>
                </select>
                <div id="validation-language"></div>
            </div>
        </div>
        <div class="abilityPost change15">
            <table class="abilityTable" id="ads1">
                <tr>
                    <th>تصویر تبلیغ</th>
                    <th>آدرس تبلیغ</th>
                    <th>
                        <i id="addAd1">
                            <svg class="icon">
                                <use xlink:href="#add"></use>
                            </svg>
                        </i>
                    </th>
                </tr>
            </table>
        </div>
        <div class="abilityPost change16">
            <table class="abilityTable" id="ads2">
                <tr>
                    <th>تصویر تبلیغ سمت راست</th>
                    <th>آدرس تبلیغ سمت راست</th>
                    <th>
                        <i id="addAd2">
                            <svg class="icon">
                                <use xlink:href="#add"></use>
                            </svg>
                        </i>
                    </th>
                </tr>
            </table>
        </div>
        <div class="abilityPost change17">
            <table class="abilityTable" id="ads3">
                <tr>
                    <th>تصویر تبلیغ سمت چپ</th>
                    <th>آدرس تبلیغ سمت چپ</th>
                    <th>
                        <i id="addAd3">
                            <svg class="icon">
                                <use xlink:href="#add"></use>
                            </svg>
                        </i>
                    </th>
                </tr>
            </table>
        </div>
        <div class="abilityPost change20">
            <div id="chair" class="chairs container">
                <button class="titleChair">+ افزودن استوری</button>
                <div class="hallPosition"></div>
            </div>
        </div>
        <button class="button" name="createPost" type="submit">ثبت ویجت</button>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts3'); ?>
    <script>
        $(document).ready(function(){
            $('.brands-multiple').select2({
                placeholder: 'برند را انتخاب کنید ...',
                "language": {
                    "noResults": function(){
                        return "موردی پیدا نشد";
                    }
                },
            });
            $('.cats-multiple').select2({
                placeholder: 'دسته بندی را انتخاب کنید ...',
                "language": {
                    "noResults": function(){
                        return "موردی پیدا نشد";
                    }
                },
            });
            $(".change21 input").persianDatepicker({
                showGregorianDate: true,
                formatPersian: false,
                months: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                dowTitle: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه"],
                shortDowTitle: ["ش", "ی", "د", "س", "چ", "پ", "ج"],
                persianNumbers: true,
                responsive:true,
                isRTL: true,
                persianDigit: false,
                selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                selectedBefore: false,
                selectedDate: null,
                startDate: null,
                endDate: null,
                theme: 'default',
                alwaysShow: false,
                selectableYears: null,
                cellWidth: 25,
                cellHeight: 20,
                fontSize: 13,
                format: 'YYYY-MM-DD H:m:ss',
                observer: true,
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    },
                },
            });
            $(".chairs .titleChair").on("click",function(e){
                $('.chairs .hallPosition').append(
                    $(`<div class="positionItem">
                            <div class="titlePosition">
                                <input type="text" name="titleStory" placeholder="عنوان">
                                <input type="text" name="coverStory" placeholder="تصویر کاور">
                                <i class="addStory1">
                                    <svg class="icon">
                                        <use xlink:href="#add"></use>
                                    </svg>
                                </i>
                                <i class="deleteStory1">
                                    <svg class="icon">
                                        <use xlink:href="#trash"></use>
                                    </svg>
                                </i>
                            </div>
                        </div>`)
                );
            });
            $(document).on('click','.chairs .hallPosition .positionItem .addStory1',function (){
                $($(this)[0]['parentElement']['parentElement']).append(
                    $(`<div class="chairsData"><input type="text" name="urlStory1" placeholder="لینک جهت باز شدن"><select name="typeStory1"><option selected value="0">عکس</option><option value="1">فیلم</option></select><input type="text" name="imageStory1" placeholder="لینک ویدئو / تصویر"><input type="text" name="dayStory1" placeholder="زمان هر استوری (ثانیه)"><i class="deleteStory"><svg class="icon"><use xlink:href="#trash"></use></svg></i></div>`)
                );
            })
            $(document).on('click','.chairs .hallPosition .positionItem .deleteStory',function (){
                $($(this)[0]['parentElement']).remove();
            })
            $(document).on('click','.chairs .hallPosition .positionItem .deleteStory1',function (){
                $($(this)[0]['parentElement']['parentElement']).remove();
            })
            $('#addAd1').click(function (){
                $('#ads1').append(
                    $('<tr><td><input type="text" name="image" placeholder="تصویر را وارد کنید"></td><td><input type="text" name="address" placeholder="آدرس را وارد کنید"></td><td><i id="deleteAbility"><svg class="icon"><use xlink:href="#trash"></use></svg></i></td></tr>')
                        .on('click' , '#deleteAbility',function(ss){
                            ss.currentTarget.parentElement.parentElement.remove();
                        })
                );
            })
            $('#addAd2').click(function (){
                $('#ads2').append(
                    $('<tr><td><input type="text" name="image" placeholder="تصویر را وارد کنید"></td><td><input type="text" name="address" placeholder="آدرس را وارد کنید"></td><td><i id="deleteAbility"><svg class="icon"><use xlink:href="#trash"></use></svg></i></td></tr>')
                        .on('click' , '#deleteAbility',function(ss){
                            ss.currentTarget.parentElement.parentElement.remove();
                        })
                );
            })
            $('#addAd3').click(function (){
                $('#ads3').append(
                    $('<tr><td><input type="text" name="image" placeholder="تصویر را وارد کنید"></td><td><input type="text" name="address" placeholder="آدرس را وارد کنید"></td><td><i id="deleteAbility"><svg class="icon"><use xlink:href="#trash"></use></svg></i></td></tr>')
                        .on('click' , '#deleteAbility',function(ss){
                            ss.currentTarget.parentElement.parentElement.remove();
                        })
                );
            })
            $('#addAd4').click(function (){
                $('#ads4').append(
                    $('<tr><td><input type="text" name="image" placeholder="آدرس تصویر یا ویدئو را وارد کنید"></td><td><input type="text" name="cover" placeholder="آدرس تصویر را وارد کنید"></td><td><select name="type"><option value="0">تصویر</option><option value="1">ویدئو</option></select></td><td><input type="text" name="day" placeholder="تعداد روز"></td><td><i id="deleteAbility"><svg class="icon"><use xlink:href="#trash"></use></svg></i></td></tr>')
                        .on('click' , '#deleteAbility',function(ss){
                            ss.currentTarget.parentElement.parentElement.remove();
                        })
                );
            })
            if($("select[name='name']").val() == 'لیستی'){
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change8').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'تبلیغ اسلایدری'){
                $('.change2').hide();
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change20').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'تبلیغ ساده'){
                $('.change2').hide();
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'اسلایدر بزرگ'){
                $('.change2').hide();
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'دسته بندی' || $("select[name='name']").val() == 'دسته بندی 2' || $("select[name='name']").val() == 'محصولات افقی با دسته بندی' || $("select[name='name']").val() == 'محصولات با فیلتر'){
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'خبر' || $("select[name='name']").val() == 'خبر2' || $("select[name='name']").val() == 'پک محصولات' || $("select[name='name']").val() == 'سوال متداول' || $("select[name='name']").val() == 'فروشندگان'){
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'درباره ما'){
                $('.change3').hide();
                $('.change4').hide();
                $('.change7').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'جستجو' ||$("select[name='name']").val() == 'جستجو2'){
                $('.change2').hide();
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'استوری'){
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'وام' || $("select[name='name']").val() == 'مقایسه'){
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'جشنواره'){
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
            }
            if($("select[name='name']").val() == 'متن'){
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change19').hide();
                $('.change18').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'بنر با عنوان'){
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'گردونه دسته بندی'){
                $('.change2').hide();
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change11').hide();
                $('.change12').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'بهترین ها'){
                $('.change3').hide();
                $('.change4').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change7').hide();
                $('.change8').hide();
                $('.change9').hide();
                $('.change10').hide();
                $('.change11').hide();
                $('.change13').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change18').hide();
                $('.change19').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'شگفت انگیز'){
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'محصولات اسلایدری' || $("select[name='name']").val() == 'محصول2' || $("select[name='name']").val() == 'محصول3'){
                $('.change6').hide();
                $('.change8').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'محصولات با پس زمینه' || $("select[name='name']").val() == 'محصولات با پس زمینه'){
                $('.change6').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'محصول تصویر چپ' || $("select[name='name']").val() == 'محصول تصویر بالا'){
                $('.change6').hide();
                $('.change21').hide();
                $('.change19').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
            }
            if($("select[name='name']").val() == 'محصول عرضی'){
                $('.change6').hide();
                $('.change8').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change21').hide();
            }
            if($("select[name='name']").val() == 'پیشنهاد لحظه ای'){
                $('.change4').hide();
                $('.change3').hide();
                $('.change7').hide();
                $('.change5').hide();
                $('.change6').hide();
                $('.change8').hide();
                $('.change15').hide();
                $('.change16').hide();
                $('.change17').hide();
                $('.change20').hide();
                $('.change21').hide();
                $('.change18').hide();
                $('.change19').hide();
            }
            $("select[name='name']").change(function (){
                $('.change2').show();
                $('.change3').show();
                $('.change4').show();
                $('.change5').show();
                $('.change6').show();
                $('.change7').show();
                $('.change8').show();
                $('.change9').show();
                $('.change10').show();
                $('.change11').show();
                $('.change12').show();
                $('.change13').show();
                $('.change14').show();
                $('.change15').show();
                $('.change16').show();
                $('.change17').show();
                $('.change18').show();
                $('.change19').show();
                if(this.value == 'لیستی'){
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change8').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change19').hide();
                }
                if(this.value == 'پیشنهاد لحظه ای'){
                    $('.change4').hide();
                    $('.change3').hide();
                    $('.change7').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change8').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                }
                if(this.value == 'تبلیغ اسلایدری'){
                    $('.change2').hide();
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                    $('.change20').hide();
                }
                if(this.value == 'بنر با عنوان'){
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change20').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                    $('.change21').hide();
                }
                if(this.value == 'تبلیغ ساده'){
                    $('.change2').hide();
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                }
                if(this.value == 'اسلایدر بزرگ'){
                    $('.change2').hide();
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change20').hide();
                }
                if(this.value == 'دسته بندی' || this.value == 'دسته بندی 2' || this.value == 'محصولات افقی با دسته بندی' || this.value == 'محصولات با فیلتر'){
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                }
                if(this.value == 'خبر' ||this.value == 'خبر2' ||this.value == 'سوال متداول' ||this.value == 'پک محصولات' || this.value == 'فروشندگان'){
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                }
                if(this.value == 'درباره ما'){
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change7').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change17').hide();
                    $('.change20').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                    $('.change21').hide();
                }
                if(this.value == 'جستجو' || this.value == 'جستجو2'){
                    $('.change2').hide();
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                }
                if(this.value == 'متن'){
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change20').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                    $('.change21').hide();
                }
                if(this.value == 'استوری'){
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                    $('.change20').show();
                }
                if(this.value == 'وام' || this.value == 'مقایسه'){
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                    $('.change20').hide();
                }
                if(this.value == 'جشنواره'){
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                    $('.change20').hide();
                    $('.change21').show();
                }
                if( this.value == 'گردونه دسته بندی'){
                    $('.change2').hide();
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change11').hide();
                    $('.change12').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change20').hide();
                }
                if(this.value == 'بهترین ها'){
                    $('.change3').hide();
                    $('.change4').hide();
                    $('.change5').hide();
                    $('.change6').hide();
                    $('.change7').hide();
                    $('.change8').hide();
                    $('.change9').hide();
                    $('.change10').hide();
                    $('.change11').hide();
                    $('.change13').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change18').hide();
                    $('.change19').hide();
                    $('.change20').hide();
                }
                if(this.value == 'شگفت انگیز'){
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change20').hide();
                    $('.change17').hide();
                }
                if(this.value == 'محصولات اسلایدری' || this.value == 'محصول2' || this.value == 'محصول3'){
                    $('.change6').hide();
                    $('.change8').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change20').hide();
                }
                if(this.value == 'محصولات با پس زمینه' || this.value == 'محصولات عمودی با پس زمینه'){
                    $('.change6').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change20').hide();
                }
                if(this.value == 'محصول تصویر چپ' || this.value == 'محصول تصویر بالا'){
                    $('.change6').hide();
                    $('.change21').hide();
                    $('.change19').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change20').hide();
                }
                if(this.value == 'محصول عرضی'){
                    $('.change6').hide();
                    $('.change8').hide();
                    $('.change15').hide();
                    $('.change16').hide();
                    $('.change17').hide();
                    $('.change20').hide();
                }
            })
            $("button[name='createPost']").click(function(event){
                var name = $("select[name='name']").val();
                var title = $("input[name='title']").val();
                var more = $("input[name='more']").val();
                var move = $("select[name='move']").val();
                var height = $("input[name='height']").val();
                var number = $("input[name='number']").val();
                var description = $("input[name='description']").val();
                var background = $("input[name='background']").val();
                var slug = $("input[name='slug']").val();
                var background2 = $("input[name='background2']").val();
                var count = $("input[name='count']").val();
                var sort = $("select[name='sort']").val();
                var type = $("select[name='type']").val();
                var status = $("select[name='status']").val();
                var responsive = $("select[name='responsive']").val();
                var language = $("select[name='language']").val();

                var brands = [];
                var cats = [];
                $("select[name='brands'] :selected").each(function(){
                    brands.push($(this).val());
                });
                $("select[name='cats'] :selected").each(function(){
                    cats.push($(this).val());
                });
                var ads1 = [];
                $("#ads1 tr").each(function(){
                    if($(this).find("input").length >= 1){
                        var ad1 = {
                            image:"",
                            address:"",
                        };
                        $(this).find("input").each(function(){
                            if (this.name == 'image') {
                                ad1.image = this.value;
                            }
                            if (this.name == 'address') {
                                ad1.address = this.value;
                            }
                        })
                        ads1.push(ad1);
                    }
                });

                var ads2 = [];
                $("#ads2 tr").each(function(){
                    if($(this).find("input").length >= 1){
                        var ad2 = {
                            image:"",
                            address:"",
                        };
                        $(this).find("input").each(function(){
                            if (this.name == 'image') {
                                ad2.image = this.value;
                            }
                            if (this.name == 'address') {
                                ad2.address = this.value;
                            }
                        })
                        ads2.push(ad2);
                    }
                });

                var ads3 = [];
                $("#ads3 tr").each(function(){
                    if($(this).find("input").length >= 1){
                        var ad3 = {
                            image:"",
                            address:"",
                        };
                        $(this).find("input").each(function(){
                            if (this.name == 'image') {
                                ad3.image = this.value;
                            }
                            if (this.name == 'address') {
                                ad3.address = this.value;
                            }
                        })
                        ads3.push(ad3);
                    }
                });

                var positions = [];
                $.each($(".chairs .positionItem"),function (){
                    var position = {
                        title : $(this).find("input[name='titleStory']").val(),
                        cover : $(this).find("input[name='coverStory']").val(),
                        rows : [],
                    };
                    $.each($(this).find('.chairsData'),function (){
                        var row = {
                            url: $(this).find("input[name='urlStory1']").val(),
                            type: $(this).find("select[name='typeStory1']").val(),
                            image: $(this).find("input[name='imageStory1']").val(),
                            day: $(this).find("input[name='dayStory1']").val(),
                        };
                        position.rows.push(row);
                    })
                    positions.push(position);
                })

                var form = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    name:name,
                    title:title,
                    more:more,
                    description:description,
                    background:background,
                    slug:slug,
                    background2:background2,
                    count:count,
                    sort:sort,
                    type:type,
                    status:status,
                    number:number,
                    responsive:responsive,
                    move:move,
                    height:height,
                    language:language,
                    brands:JSON.stringify(brands),
                    cats:JSON.stringify(cats),
                    ads1:JSON.stringify(ads1),
                    ads2:JSON.stringify(ads2),
                    ads3:JSON.stringify(ads3),
                    positions:JSON.stringify(positions),
                };

                $.ajax({
                    url: "/admin/widget/create",
                    type: "post",
                    data: form,
                    success: function (data) {
                        $.toast({
                            text: "ویجت اضافه شد", // Text that is to be shown in the toast
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
                        window.location.href="/admin/widget";
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
    <script src="/js/persian-date.min.js"></script>
    <script src="/js/persian-datepicker.min.js"></script>
    <link rel="stylesheet" href="/css/persian-datepicker.min.css"/>
    <script src="/js/select2.min.js"></script>
    <script src="/js/jquery.toast.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
    <link rel="stylesheet" href="/css/select2.min.css"/>
    <link rel="stylesheet" href="/css/jquery.toast.min.css"/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myizonek/public_html/local/resources/views/admin/widget/create.blade.php ENDPATH**/ ?>