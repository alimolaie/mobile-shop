@extends('admin.master')

@section('tab',1)
@section('content')
    <div class="allCreateGroup">
        <form action="/admin/comment/create" method="post" class="createGroup">
            @csrf
            <div class="products"></div>
            <div class="buttons">
                <div class="add">+افزودن دیدگاه</div>
                <button class="createF" style="background: blue">جهت ثبت نهایی کلیک کنید</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts3')
    <script>
        $(document).ready(function(){
            var products = {!! json_encode($products, JSON_HEX_TAG) !!};
            var products1 = '<option value="0" selected>رندوم و شانسی</option>'
            $.each(products,function (){
                products1 += `<option value="${this.id}">${this.title}</option>`
            });
            $(".createGroup .add").click(function (){
                $(".createGroup .products").append(
                    $(`<div class="container">
                    <div class="items">
                        <div class="item">
                            <label>نام کاربر* :</label>
                            <input type="text" name="user_name[]" placeholder="نام دلخواه را وارد کنید">
                            <div id="validation-title"></div>
                        </div>
                        <div class="item">
                            <label>عنوان* :</label>
                            <input type="text" name="title[]" placeholder="عنوان را وارد کنید">
                            <div id="validation-title"></div>
                        </div>
                        <div class="item">
                            <label>امتیاز* :</label>
                            <input type="range" name="rate[]" min="0" max="5">
                            <div id="validation-rate"></div>
                        </div>
                        <div class="item2">
                            <label>محصول :</label>
                            <select class="products-multiple" name="product_id[]">${products1}</select>
                        </div>
                    </div>
                    <div class="items">
                        <div class="item">
                            <label>توضیحات :</label>
                            <textarea name="body[]" class="body"></textarea>
                        </div>
                    </div>
                </div>`));
            })
        })
    </script>
@endsection

@section('jsScript')
    <script src="/js/persian-date.min.js"></script>
    <script src="/js/persian-datepicker.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/editor/ckeditor.js"></script>
    <script src="/js/editor/adapters/jquery.js"></script>
@endsection

@section('links')
    <link rel="stylesheet" href="/css/persian-datepicker.min.css"/>
    <link rel="stylesheet" href="/css/select2.min.css"/>
@endsection
