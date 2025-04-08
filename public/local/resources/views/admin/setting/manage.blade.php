@extends('admin.master')

@section('tab',4)

@section('content')
    <div class="allManageSetting">
        <div class="topProductIndex">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a href="/admin/setting/manage">تنظیمات سایت</a>
            </div>
        </div>
        @if (\Session::has('message'))
            <div class="alert">
                {!! \Session::get('message') !!}
            </div>
        @endif
        <div class="forms">
            <div>
                <form method="post" action="/admin/setting/manage" class="settingMangeItems">
                    @csrf
                    <h3>مدیریت سایت</h3>
                    <div class="tabsM">
                        <div class="tab active" data-type="fa">فارسی</div>
                        <div class="tab" data-type="en">انگلیسی</div>
                        <div class="tab" data-type="ar">عربی</div>
                        <div class="tab" data-type="tr">ترکی</div>
                    </div>
                    <div class="langContainer" data-count="fa">
                        <div class="settingItemPage">
                            <div class="settingItem">
                                <label for="">نام وبسایت </label>
                                <input type="text" name="name" value="{{$name}}" placeholder="نام را وارد کنید">
                            </div>
                            <div class="settingItem">
                                <label for="">عنوان فعالیت </label>
                                <input type="text" name="title" value="{{$title}}" placeholder="عنوان را وارد کنید">
                            </div>
                        </div>
                        <div class="settingItem">
                            <label for="">آدرس شرکت </label>
                            <input type="text" name="address" value="{{$address}}" placeholder="تهران">
                        </div>
                        <div class="settingItem">
                            <label for="">متن شناور سمت چپ</label>
                            <input type="text" name="textFloat" value="{{$textFloat}}" placeholder="متن را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">درباره ما</label>
                            <textarea name="about" placeholder="توضیحات را وارد کنید">{{$about}}</textarea>
                        </div>
                    </div>
                    <div class="langContainer" style="display: none" data-count="en">
                        <div class="settingItemPage">
                            <div class="settingItem">
                                <label for="">نام وبسایت </label>
                                <input type="text" name="nameEn" value="{{$nameEn}}" placeholder="نام را وارد کنید">
                            </div>
                            <div class="settingItem">
                                <label for="">عنوان فعالیت </label>
                                <input type="text" name="titleEn" value="{{$titleEn}}" placeholder="عنوان را وارد کنید">
                            </div>
                        </div>
                        <div class="settingItem">
                            <label for="">آدرس شرکت </label>
                            <input type="text" name="addressEn" value="{{$addressEn}}" placeholder="تهران">
                        </div>
                        <div class="settingItem">
                            <label for="">متن شناور سمت چپ</label>
                            <input type="text" name="textFloatEn" value="{{$textFloatEn}}" placeholder="متن را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">درباره ما</label>
                            <textarea name="aboutEn" placeholder="توضیحات را وارد کنید">{{$aboutEn}}</textarea>
                        </div>
                    </div>
                    <div class="langContainer" style="display: none" data-count="ar">
                        <div class="settingItemPage">
                            <div class="settingItem">
                                <label for="">نام وبسایت </label>
                                <input type="text" name="nameAr" value="{{$nameAr}}" placeholder="نام را وارد کنید">
                            </div>
                            <div class="settingItem">
                                <label for="">عنوان فعالیت </label>
                                <input type="text" name="titleAr" value="{{$titleAr}}" placeholder="عنوان را وارد کنید">
                            </div>
                        </div>
                        <div class="settingItem">
                            <label for="">آدرس شرکت </label>
                            <input type="text" name="addressAr" value="{{$addressAr}}" placeholder="تهران">
                        </div>
                        <div class="settingItem">
                            <label for="">متن شناور سمت چپ</label>
                            <input type="text" name="textFloatAr" value="{{$textFloatAr}}" placeholder="متن را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">درباره ما</label>
                            <textarea name="aboutAr" placeholder="توضیحات را وارد کنید">{{$aboutAr}}</textarea>
                        </div>
                    </div>
                    <div class="langContainer" style="display: none" data-count="tr">
                        <div class="settingItemPage">
                            <div class="settingItem">
                                <label for="">نام وبسایت </label>
                                <input type="text" name="nameTr" value="{{$nameTr}}" placeholder="نام را وارد کنید">
                            </div>
                            <div class="settingItem">
                                <label for="">عنوان فعالیت </label>
                                <input type="text" name="titleTr" value="{{$titleTr}}" placeholder="عنوان را وارد کنید">
                            </div>
                        </div>
                        <div class="settingItem">
                            <label for="">آدرس شرکت </label>
                            <input type="text" name="addressTr" value="{{$addressTr}}" placeholder="تهران">
                        </div>
                        <div class="settingItem">
                            <label for="">متن شناور سمت چپ</label>
                            <input type="text" name="textFloatTr" value="{{$textFloatTr}}" placeholder="متن را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">درباره ما</label>
                            <textarea name="aboutTr" placeholder="توضیحات را وارد کنید">{{$aboutTr}}</textarea>
                        </div>
                    </div>
                    <div class="addImageButton">برای افزودن تصویر کلیک کنید</div>
                    <div class="sendGallery">
                        <div class="getImageItem">
                            <span id="imageTooltip">تصاویر خود را وارد کنید</span>
                        </div>
                    </div>
                    <div class="settingItem">
                        <label for="">ایمیل وبسایت</label>
                        <input type="text" name="email" value="{{$email}}" placeholder="email@example.ir">
                    </div>
                    <div class="settingItemPage">
                        <div class="settingItem">
                            <label for="">رنگ هدر</label>
                            <input type="color" name="headerColor" value="{{$headerColor}}" placeholder="کد را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">رنگ ساید بار</label>
                            <input type="color" name="sideColor" value="{{$sideColor}}" placeholder="کد را وارد کنید">
                        </div>
                    </div>
                    <div class="settingItemPage">
                        <div class="settingItem">
                            <label for="">کد نماد فناوری اطلاعات</label>
                            <input type="text" name="fanavari" value="{{$fanavari}}" placeholder="کد را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">کد نماد اعتماد</label>
                            <input type="text" name="etemad" value="{{$etemad}}" placeholder="کد را وارد کنید">
                        </div>
                    </div>
                    <div class="settingItemPage">
                        <div class="settingItem">
                            <label for="">شماره تماس</label>
                            <input type="text" name="number" value="{{$number}}" placeholder="شماره را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">حروف قبل کد محصول</label>
                            <input type="text" name="productId" value="{{$productId}}" placeholder="DM">
                        </div>
                    </div>
                    <div class="settingItemPage">
                        <div class="settingItem">
                            <label for="">صفحه فیسبوک</label>
                            <input type="text" name="facebook" value="{{$facebook}}" placeholder="لینک را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">صفحه اینستاگرام</label>
                            <input type="text" name="instagram" value="{{$instagram}}" placeholder="لینک را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">صفحه توییتر</label>
                            <input type="text" name="twitter" value="{{$twitter}}" placeholder="لینک را وارد کنید">
                        </div>
                        <div class="settingItem">
                            <label for="">صفحه تلگرام</label>
                            <input type="text" name="telegram" value="{{$telegram}}" placeholder="لینک را وارد کنید">
                        </div>
                    </div>
                    <div class="settingItem">
                        <label>درصد شارژ حساب معرف در هر خرید زیرمجموعه معرف</label>
                        <input type="text" name="cooperationPercent" value="{{$cooperationPercent}}" placeholder="مثال : 2">
                    </div>
                    <div class="settingItem">
                        <label>حداکثر کد تخفیف در جعبه جادویی</label>
                        <input type="text" name="giftDis" value="{{$giftDis}}" placeholder="مثال : 2">
                    </div>
                    <div class="settingItem">
                        <label>امتیاز روزانه به کاربر</label>
                        <input type="text" name="scoreDay" value="{{$scoreDay}}" placeholder="مثال : 2">
                    </div>
                    <div class="settingItem">
                        <label for="">مالیات / افزایش قیمت (0 - 100)</label>
                        <input type="text" name="tax" value="{{$tax}}" placeholder="مثال : 20">
                    </div>
                    <div class="settingItem">
                        <label>روز های تعطیل هفته</label>
                        <select class="free-multiple" name="holidays[]" multiple="multiple">
                            <option value="شنبه">شنبه</option>
                            <option value="یکشنبه">یکشنبه</option>
                            <option value="دوشنبه">دوشنبه</option>
                            <option value="سه شنبه">سه شنبه</option>
                            <option value="چهارشنبه">چهارشنبه</option>
                            <option value="پنجشنبه">پنجشنبه</option>
                            <option value="جمعه">جمعه</option>
                        </select>
                    </div>
                    <div class="settingItem">
                        <label>محدودیت زمانی دریافت جایزه</label>
                        <input type="text" name="maxGift" value="{{$maxGift}}" placeholder="مثال : 7">
                    </div>
                    <div class="settingItem">
                        <label>تصویر هدر شماره 3</label>
                        <input type="text" name="backIndex" value="{{$backIndex}}" placeholder="لینک تصویر">
                    </div>
                    <div class="settingItem">
                        <label>نوع کپچا</label>
                        <select name="captchaType">
                            <option value="0">ریاضی</option>
                            <option value="1">پیچیده</option>
                            <option value="2">سه حرفی</option>
                            <option value="3">حروف زیاد واضح</option>
                            <option value="4">کوچیک</option>
                        </select>
                    </div>
                    <div class="settingItemChecked">
                        <label for="cooperationStatus" class="item">
                            دریافت پورسانت از زیرمجموعه گیری(با ثبت سفارش زیرمجموعه)
                            <input id="cooperationStatus" type="checkbox" name="cooperationStatus" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="minifySource" class="item">
                            مینیفای کردن سورس
                            <input id="minifySource" type="checkbox" name="minifySource" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="google" class="item">
                            ورود با جیمیل
                            <input id="google" type="checkbox" name="google" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="github" class="item">
                            ورود با گیت هاب
                            <input id="github" type="checkbox" name="github" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="captchaStatus" class="item">
                            اجبار کپچا
                            <input id="captchaStatus" type="checkbox" name="captchaStatus" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="languageStatus" class="item">
                            چند زبانه
                            <input id="languageStatus" type="checkbox" name="languageStatus" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="darkStatus" class="item">
                            دارک و لایت
                            <input id="darkStatus" type="checkbox" name="darkStatus" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="deliverStatus" class="item">
                            انتخاب زمان دریافت سفارش توسط کاربر
                            <input id="deliverStatus" type="checkbox" name="deliverStatus" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="sellerStatus" class="item">
                            چند فروشندگی
                            <input id="sellerStatus" type="checkbox" name="sellerStatus" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="chatStatus" class="item">
                            گفتگو آنلاین
                            <input id="chatStatus" type="checkbox" name="chatStatus" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="ticketStatus" class="item">
                            پیام به پشتیبانی
                            <input id="ticketStatus" type="checkbox" name="ticketStatus" class="switch">
                        </label>
                    </div>
                    <div class="settingItemChecked">
                        <label for="preLoaderStatus" class="item">
                            صفحه بارگذاری
                            <input id="preLoaderStatus" type="checkbox" name="preLoaderStatus" class="switch">
                        </label>
                    </div>
                    <button>ثبت اطلاعات</button>
                </form>
            </div>
            <div>
                <form method="post" action="/admin/setting/redirect" class="settingMangeItems">
                    @csrf
                    <h3>تنظیمات ریدایرکت 404</h3>
                    <div class="settingItem">
                        <label>ریدایرکت به :</label>
                        <input type="text" name="newRedirect" value="{{$newRedirect}}" placeholder="مثال : /newlink">
                    </div>
                    <div class="settingItemChecked">
                        <label for="redirectStatus" class="item">
                            فعال شدن ریدایرکت خودکار
                            <input id="redirectStatus" type="checkbox" name="redirectStatus" class="switch">
                        </label>
                    </div>
                    <button>ثبت اطلاعات</button>
                </form>
                <form method="post" action="/admin/setting/ads-header" class="settingMangeItems">
                    @csrf
                    <h3>تنظیمات تبلیغ بالا هدر</h3>
                    <div class="settingItem">
                        <label>ارتفاع تبلیغ بالا هدر(px)</label>
                        <input type="text" name="heightHeader" value="{{$heightHeader}}" placeholder="مثال : 5">
                    </div>
                    <div class="settingItem">
                        <label>لینک تصویر را قرار بدید</label>
                        <input type="text" name="imageHeader" value="{{$imageHeader}}" placeholder="مثال : example.com/test.jpg">
                    </div>
                    <div class="settingItem">
                        <label>آدرس (url)</label>
                        <input type="text" name="linkHeader" value="{{$linkHeader}}" placeholder="مثال : example.com/products">
                    </div>
                    <div class="settingItemChecked">
                        <label for="s2" class="item">
                            فعال شدن تبلیغ بالا سایت
                            <input id="s2" type="checkbox" name="adHeaderStatus" class="switch">
                        </label>
                    </div>
                    <button>ثبت اطلاعات</button>
                </form>
                <form method="post" action="/admin/setting/pop-up" class="settingMangeItems">
                    @csrf
                    <h3>تنظیمات پاپ آپ</h3>
                    <div class="settingItem">
                        <label>لینک تصویر را قرار بدید</label>
                        <input type="text" name="imagePopUp" value="{{$imagePopUp}}" placeholder="مثال : example.com/test.jpg">
                    </div>
                    <div class="settingItem">
                        <label>عنوان پاپ آپ*</label>
                        <input type="text" name="titlePopUp" value="{{$titlePopUp}}" placeholder="مثال : عنوان">
                    </div>
                    <div class="settingItem">
                        <label>آدرس (url) انتقال</label>
                        <input type="text" name="addressPopUp" value="{{$addressPopUp}}" placeholder="مثال : example.com/products">
                    </div>
                    <div class="settingItem">
                        <label>توضیحات پاپ آپ</label>
                        <textarea name="descriptionPopUp" placeholder="توضیحات را وارد کنید ...">{{$descriptionPopUp}}</textarea>
                    </div>
                    <div class="settingItem">
                        <label>عنوان دکمه</label>
                        <input type="text" name="buttonPopUp" value="{{$buttonPopUp}}" placeholder="مثال : مشاهده">
                    </div>
                    <div class="settingItemChecked">
                        <label for="s3" class="item">
                            فعال شدن پاپ آپ
                            <input id="s3" type="checkbox" name="popUpStatus" class="switch">
                        </label>
                    </div>
                    <button>ثبت اطلاعات</button>
                </form>
            </div>
        </div>
        <div class="filemanager">
            @include('admin.filemanager')
        </div>
    </div>
@endsection

@section('scripts3')
    <script>
        $(document).ready(function(){
            var images = {!! json_encode($logo, JSON_HEX_TAG) !!};
            var adHeaderStatus = {!! json_encode($adHeaderStatus, JSON_HEX_TAG) !!};
            var popUpStatus = {!! json_encode($popUpStatus, JSON_HEX_TAG) !!};
            var cooperationStatus = {!! json_encode($cooperationStatus, JSON_HEX_TAG) !!};
            var minifySource = {!! json_encode($minifySource, JSON_HEX_TAG) !!};
            var holidays = {!! json_encode($holidays, JSON_HEX_TAG) !!};
            var google = {!! json_encode($google, JSON_HEX_TAG) !!};
            var github = {!! json_encode($github, JSON_HEX_TAG) !!};
            var captchaStatus = {!! json_encode($captchaStatus, JSON_HEX_TAG) !!};
            var captchaType = {!! json_encode($captchaType, JSON_HEX_TAG) !!};
            var darkStatus = {!! json_encode($darkStatus, JSON_HEX_TAG) !!};
            var deliverStatus = {!! json_encode($deliverStatus, JSON_HEX_TAG) !!};
            var sellerStatus = {!! json_encode($sellerStatus, JSON_HEX_TAG) !!};
            var languageStatus = {!! json_encode($languageStatus, JSON_HEX_TAG) !!};
            var chatStatus = {!! json_encode($chatStatus, JSON_HEX_TAG) !!};
            var ticketStatus = {!! json_encode($ticketStatus, JSON_HEX_TAG) !!};
            var redirectStatus = {!! json_encode($redirectStatus, JSON_HEX_TAG) !!};
            var preLoaderStatus = {!! json_encode($preLoaderStatus, JSON_HEX_TAG) !!};
            $("select[name='captchaType']").val(captchaType);
            var holidays1 = [];
            if(holidays){
                $.each(JSON.parse(holidays),function(){
                    holidays1.push(this);
                });
                $('.free-multiple').val(holidays1);
            }
            $('.free-multiple').select2({
                placeholder: 'روز های تعطیل را انتخاب کنید ...',
                "language": {
                    "noResults": function(){
                        return "موردی پیدا نشد";
                    }
                },
            });
            if(adHeaderStatus == 1){
                $("input[name='adHeaderStatus']").prop("checked", true );
            }else{
                $("input[name='adHeaderStatus']").prop("checked", false );
            }
            if(popUpStatus == 1){
                $("input[name='popUpStatus']").prop("checked", true );
            }else{
                $("input[name='popUpStatus']").prop("checked", false );
            }
            if(deliverStatus == 1){
                $("input[name='deliverStatus']").prop("checked", true );
            }else{
                $("input[name='deliverStatus']").prop("checked", false );
            }
            if(sellerStatus == 1){
                $("input[name='sellerStatus']").prop("checked", true );
            }else{
                $("input[name='sellerStatus']").prop("checked", false );
            }
            if(cooperationStatus == 1){
                $("input[name='cooperationStatus']").prop("checked", true );
            }else{
                $("input[name='cooperationStatus']").prop("checked", false );
            }
            if(minifySource == 1){
                $("input[name='minifySource']").prop("checked", true );
            }else{
                $("input[name='minifySource']").prop("checked", false );
            }
            if(google == 1){
                $("input[name='google']").prop("checked", true );
            }else{
                $("input[name='google']").prop("checked", false );
            }
            if(github == 1){
                $("input[name='github']").prop("checked", true );
            }else{
                $("input[name='github']").prop("checked", false );
            }
            if(captchaStatus == 1){
                $("input[name='captchaStatus']").prop("checked", true );
            }else{
                $("input[name='captchaStatus']").prop("checked", false );
            }
            if(languageStatus == 1){
                $("input[name='languageStatus']").prop("checked", true );
            }else{
                $("input[name='languageStatus']").prop("checked", false );
            }
            if(darkStatus == 1){
                $("input[name='darkStatus']").prop("checked", true );
            }else{
                $("input[name='darkStatus']").prop("checked", false );
            }
            if(chatStatus == 1){
                $("input[name='chatStatus']").prop("checked", true );
            }else{
                $("input[name='chatStatus']").prop("checked", false );
            }
            if(ticketStatus == 1){
                $("input[name='ticketStatus']").prop("checked", true );
            }else{
                $("input[name='ticketStatus']").prop("checked", false );
            }
            if(redirectStatus == 1){
                $("input[name='redirectStatus']").prop("checked", true );
            }else{
                $("input[name='redirectStatus']").prop("checked", false );
            }
            if(preLoaderStatus == 1){
                $("input[name='preLoaderStatus']").prop("checked", true );
            }else{
                $("input[name='preLoaderStatus']").prop("checked", false );
            }
            $('.filemanager').hide();
            $('.tabsM .tab').click(function(){
                $('.tabsM .tab').attr('class','tab');
                $(this).addClass('active');
                $('.langContainer').hide();
                $('.langContainer[data-count='+$(this).attr('data-type')+']').show();
            })
            $('.addImageButton').click(function(){
                $('.filemanager').show();
            });
            if(images){
                $('.getImageItem').append(
                    $('<div class="getImagePic"><input type="hidden" name="image" value="'+images+'"><i><svg class="deleteImg"><use xlink:href="#trash"></use></svg></i><img src="'+images+'"></div>')
                        .on('click' , '.deleteImg',function(ss){
                            ss.currentTarget.parentElement.parentElement.remove();
                        })
                );
                $("input[name='image']").val(images);
            }
        })
    </script>
@endsection

@section('jsScript')
    <script src="/js/select2.min.js"></script>
    <link rel="stylesheet" href="/css/select2.min.css"/>
@endsection
