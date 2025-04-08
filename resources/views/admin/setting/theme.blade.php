@extends('admin.master')

@section('tab',4)

@section('content')
    <div class="allManageSetting">
        <div class="topProductIndex">
            <div class="right">
                <a href="/admin">داشبورد</a>
                <span>/</span>
                <a href="/admin/setting/theme">تغییر دمو و رنگ</a>
            </div>
        </div>
        @if (\Session::has('message'))
            <div class="alert">
                {!! \Session::get('message') !!}
            </div>
        @endif
        <form method="post" action="/admin/setting/theme" class="settingMangeItems">
            @csrf
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
                    <input type="color" name="greenColorLight" value="{{$greenColorLight}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پیشفرض دوم(قرمز)</label>
                    <input type="color" name="redColorLight" value="{{$redColorLight}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پس زمینه سایت</label>
                    <input type="color" name="backColorLight1" value="{{$backColorLight1}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ هدر سایت</label>
                    <input type="color" name="headerColorLight" value="{{$headerColorLight}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ هدر سایت 2</label>
                    <input type="color" name="headerColor2Light" value="{{$headerColor2Light}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پس زمینه ویجت</label>
                    <input type="color" name="widgetColorLight" value="{{$widgetColorLight}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ باکس صفحه معرفی محصول</label>
                    <input type="color" name="singleColorLight" value="{{$singleColorLight}}">
                </div>
            </div>
            <h3>حالت دارک</h3>
            <div class="settingItemPage">
                <div class="settingItem">
                    <label for="">رنگ پیشفرض (سبز)</label>
                    <input type="color" name="greenColorDark" value="{{$greenColorDark}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پیشفرض دوم(قرمز)</label>
                    <input type="color" name="redColorDark" value="{{$redColorDark}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پس زمینه سایت</label>
                    <input type="color" name="backColorDark1" value="{{$backColorDark1}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ هدر سایت</label>
                    <input type="color" name="headerColorDark" value="{{$headerColorDark}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ هدر سایت 2</label>
                    <input type="color" name="headerColor2Dark" value="{{$headerColor2Dark}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ پس زمینه ویجت</label>
                    <input type="color" name="widgetColorDark" value="{{$widgetColorDark}}">
                </div>
                <div class="settingItem">
                    <label for="">رنگ باکس صفحه معرفی محصول</label>
                    <input type="color" name="singleColorDark" value="{{$singleColorDark}}">
                </div>
            </div>
            <button>ثبت اطلاعات</button>
        </form>
    </div>
@endsection

@section('scripts3')
    <script>
        $(document).ready(function(){
            var singleDesign = {!! json_encode($singleDesign, JSON_HEX_TAG) !!};
            var font = {!! json_encode($font, JSON_HEX_TAG) !!};
            var headerDesign = {!! json_encode($headerDesign, JSON_HEX_TAG) !!};
            var loginDesign = {!! json_encode($loginDesign, JSON_HEX_TAG) !!};
            var footerDesign = {!! json_encode($footerDesign, JSON_HEX_TAG) !!};
            var floatDesign = {!! json_encode($floatDesign, JSON_HEX_TAG) !!};
            $("select[name='singleDesign']").val(singleDesign);
            $("select[name='font']").val(font);
            $("select[name='headerDesign']").val(headerDesign);
            $("select[name='loginDesign']").val(loginDesign);
            $("select[name='footerDesign']").val(footerDesign);
            $("select[name='floatDesign']").val(floatDesign);
        })
    </script>
@endsection
