@extends('admin.master')

@section('tab',1)
@section('content')
    <div class="allCreatePost">
        <div class="allCreatePost">
            <div class="allPostPanelTop">
                <h1>تنظیمات همه محصولات</h1>
                <div class="allPostTitle">
                    <a href="/admin">داشبورد</a>
                    <span>/</span>
                    <a href="/admin/product/setting">تنظیمات همه محصولات</a>
                </div>
            </div>
            <form method="POST" action="/admin/product/setting" class="allCreatePostData">
                @csrf
                <input type="hidden" name="type" value="2">
                <div class="allCreatePostSubject">
                    <div class="allCreatePostItem">
                        <label>موجودی کل :</label>
                        <input type="text" name="count">
                    </div>
                    <button class="button" name="createPost" type="submit">ثبت اطلاعات</button>
                </div>
            </form>
            <form method="POST" action="/admin/product/setting" class="allCreatePostData">
                @csrf
                <input type="hidden" name="type" value="3">
                <div class="allCreatePostSubject">
                    <div class="allCreatePostItem">
                        <label>قیمت کل :</label>
                        <input type="text" name="price">
                    </div>
                    <button class="button" name="createPost" type="submit">ثبت اطلاعات</button>
                </div>
            </form>
            <form method="POST" action="/admin/product/setting" class="allCreatePostData">
                @csrf
                <input type="hidden" name="type" value="4">
                <div class="allCreatePostSubject">
                    <div class="allCreatePostItem">
                        <label>تخفیف :</label>
                        <input type="text" name="off">
                    </div>
                    <button class="button" name="createPost" type="submit">ثبت اطلاعات</button>
                </div>
            </form>
            <form method="POST" action="/admin/product/setting" class="allCreatePostData">
                @csrf
                <input type="hidden" name="type" value="5">
                <div class="allCreatePostSubject">
                    <div class="allCreatePostItem">
                        <label>نکته کلیدی :</label>
                        <input type="text" name="note">
                    </div>
                    <button class="button" name="createPost" type="submit">ثبت اطلاعات</button>
                </div>
            </form>
            <form method="POST" action="/admin/product/setting" class="allCreatePostData">
                @csrf
                <input type="hidden" name="type" value="6">
                <div class="allCreatePostSubject">
                    <div class="allCreatePostItem">
                        <label>وزن :</label>
                        <input type="text" name="weight">
                    </div>
                    <button class="button" name="createPost" type="submit">ثبت اطلاعات</button>
                </div>
            </form>
            <form method="POST" action="/admin/product/setting" class="allCreatePostData">
                @csrf
                <input type="hidden" name="type" value="7">
                <div class="allCreatePostSubject">
                    <div class="allCreatePostItem">
                        <label>وضعیت نمایش :</label>
                        <select name="status">
                            <option value="0">پیشنویس</option>
                            <option value="1">منتشر شده</option>
                        </select>
                    </div>
                    <button class="button" name="createPost" type="submit">ثبت اطلاعات</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts3')
    <script>
        $(document).ready(function(){

        })
    </script>
@endsection
