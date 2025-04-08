<div class="allFileManagers">
    <div class="fileManagers">
        <div class="closeFile">
            <svg class="icon">
                <use xlink:href="#cancel"></use>
            </svg>
        </div>
        <div class="tabs">
            <div class="tab" id="showImageContainer">نمایش تصاویر</div>
            <div class="tab" id="addImageContainer">افزودن تصویر</div>
        </div>
        <div class="allImages">
            <ul id="images"></ul>
            <div class="pages">
                <div class="page" id="page1">قبلی</div>
                <div class="page" id="page2">بعدی</div>
            </div>
        </div>
        <div class="upload1">
            <form action="/admin/upload-image" class="dropzone" id="dropzone">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>
</div>

<?php $__env->startSection('scripts4'); ?>
    <script src="/js/dropzone.min.js"></script>
    <link rel="stylesheet" href="/css/dropzone.min.css">
<script>
    Dropzone.autoDiscover = false;
    $(document).ready(function(){
        var page1 = 0;
        $('.upload1').hide();
        $('#showImageContainer').attr('class' , 'tab active');
        $('.closeFile').click(function(){
            $('.filemanager').toggle();
        });
        $('#addImageContainer').click(function (){
            $('.upload1').toggle();
            $('#addImageContainer').attr('class' , 'tab active');
            $('#showImageContainer').attr('class' , 'tab');
            $('.allImages').toggle();
        });
        $('#showImageContainer').click(function (){
            $('#showImageContainer').attr('class' , 'tab active');
            $('#addImageContainer').attr('class' , 'tab');
            $('.upload1').toggle();
            $('.allImages').toggle();
        });
        getImages();
        $('.allFileManagers .pages #page1').click(function(e) {
            page1 != 0 ? page1 = parseInt(page1) - 1 : 0;
            getImages();
        })
        $('.allFileManagers .pages #page2').click(function(e) {
            page1 = parseInt(page1) + 1;
            getImages();
        })
        function getImages(){
            $.ajax({
                type:'GET',
                url: `/admin/get-image?page=${page1}`,
                contentType: false,
                processData: false,
                success: (response) => {
                    if(response['data'].length >= 1){
                        $('.allImages ul').children('li').remove();
                        $.each(response['data'],function(){
                            $('#images').append(
                                $('<li><img src="'+this.url+'" alt=""></li>')
                                    .click(function(){
                                        $('.filemanager').hide();
                                        $('#imageTooltip').hide();
                                        $('.getImageItem').append(
                                            $('<div class="getImagePic"><input type="hidden" name="image" value="'+this.lastChild.src+'"><i><svg class="deleteImg"><use xlink:href="#trash"></use></svg></i><img src="'+this.lastChild.src+'"></div>')
                                                .on('click' , '.deleteImg',function(ss){
                                                    ss.currentTarget.parentElement.parentElement.remove();
                                                })
                                        );
                                    })
                            );
                        });
                    }
                    if(response['data'].length == 0 && page1 != 0){
                        page1 = parseInt(page1) - 1;
                        $.toast({
                            text: "اتمام تصاویر", // Text that is to be shown in the toast
                            heading: 'پایان', // Optional heading to be shown on the toast
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
                    }
                },
            });
        }
        let myDropzone = new Dropzone("#dropzone", {
            paramName: "image",
            acceptedFiles: "image/*",
            dictDefaultMessage: "تصاویر خود را اینجا بکشید یا کلیک کنید",
            autoProcessQueue: true,
            init: function () {
                this.on("success", function (file, response) {
                    $.toast({
                        text: "فایل اضافه شد", // Text that is to be shown in the toast
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
                    $('.getImageItem').append(
                        $('<div class="getImagePic"><input type="hidden" name="image" value="'+response.url+'"><i><svg class="deleteImg"><use xlink:href="#trash"></use></svg></i><img src="'+response.url+'"></div>')
                            .on('click' , '.deleteImg',function(ss){
                                ss.currentTarget.parentElement.parentElement.remove();
                            })
                    );
                    $('.filemanager').hide();
                    $('#imageTooltip').hide();
                });
            }
        });
    })
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/myizonek/public_html/local/resources/views/admin/filemanager.blade.php ENDPATH**/ ?>