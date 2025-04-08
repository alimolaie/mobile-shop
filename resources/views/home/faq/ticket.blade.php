@extends('home.master')

@section('title' , 'تیکت')
@section('content')
    <div class="allTicketForm width">
        <div class="tabs">
            <div class="tab active" data-type="profileIndexTicket">همه تیکت ها</div>
            <div class="tab" data-type="createTicket">ارسال تیکت</div>
        </div>
        <div class="createTicket" style="display: none">
            <div class="body">
                <p>در صورت تمایل میتوانید پیام خودتان را ثبت کنید</p>
                <label class="bodyLabel" for="ticket1name">
                    عنوان* :
                    <input type="text" id="ticket1name" name="title" placeholder="عنوان خود را وارد کنید">
                </label>
                <label class="bodyLabel" for="ticket1type">
                    دپارتمان :
                    <select name="type" id="ticket1type">
                        @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="bodyLabel" for="ticket1body">
                    توضیح* :
                    <textarea id="ticket1body" name="body" placeholder="توضیح خود را وارد کنید"></textarea>
                </label>
                <label class="bodyLabel" for="ticket1property">
                    شماره سفارش (اختیاری) :
                    <select name="property">
                        @foreach($pays as $item)
                            <option value="{{$item->property}}">سفارش شماره : {{$item->property}} - در تاریخ {{$item->created_at}}</option>
                        @endforeach
                    </select>
                </label>
                <div class="sendImage">
                    <input type="file" id="post_cover" class="dropify" name="image"/>
                </div>
                @if(auth()->user())
                    <button class="submit">ارسال پیام</button>
                @else
                    <a href="/login" class="submit">وارد حساب خود شوید (کلیک کنید)</a>
                @endif
            </div>
        </div>
        <div class="profileIndexTicket">
            @if (\Session::has('message'))
                <div class="alert">
                    {!! \Session::get('message') !!}
                </div>
            @endif
            <form action="/ticket" class="search22">
                <label for="ss22">
                    <input type="text" value="{{$title}}" name="title" id="ss22" placeholder="جستجو براساس شناسه">
                </label>
                <button>جستجو</button>
            </form>
            <table>
                <tr>
                    <th>{{__('messages.title1')}}</th>
                    <th>{{__('messages.order_created')}}</th>
                    <th>{{__('messages.action1')}}</th>
                </tr>
                @foreach($tickets as $item)
                    <tr>
                        <td>
                            <span>{{$item->body}}</span>
                        </td>
                        <td>
                            <span>{{$item->updated_at}}</span>
                        </td>
                        <td>
                            <div class="buttons">
                                <button id="{{$item->id}}" class="editButton">{{__('messages.show_all')}}</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if(auth()->user())
                    <div class="allTickets" style="display: none">
                        <div class="container clearfix">
                            <div class="chat">
                                <div class="chat-header clearfix">
                                    @if(auth()->user()->profile)
                                        <img src="{{auth()->user()->profile}}" alt="{{auth()->user()->name}}">
                                    @else
                                        <img src="/img/user.png" alt="{{auth()->user()->name}}">
                                    @endif
                                    <div class="chat-with">گفتگو با مدیریت</div>
                                </div>
                                <div class="chat-history" style="height: auto;min-height: 400px">
                                    <ul></ul>
                                </div>
                                <div class="chat-message clearfix">
                                    <div class="messageData">
                                        <textarea name="body" placeholder ="متن خود را وارد کنید..."></textarea>
                                        <span id="btnFileTicket" style="display:none;">یک فایل آماده وجود دارد</span>
                                    </div>
                                    <div class="chatButtons">
                                        <button class="sendTicket">
                                            <i>
                                                <svg class="icon">
                                                    <use xlink:href="#sendTicket"></use>
                                                </svg>
                                            </i>
                                            ارسال
                                        </button>
                                        <button class="btnFile">
                                            <i>
                                                <svg class="icon">
                                                    <use xlink:href="#add-document"></use>
                                                </svg>
                                            </i>
                                            پیوست فایل
                                        </button>
                                        <a href="#" target="_blank" class="move1">
                                            <i>
                                                <svg class="icon">
                                                    <use xlink:href="#pay"></use>
                                                </svg>
                                            </i>
                                            جزییات سفارش
                                        </a>
                                        <button class="btnBack">
                                            <i>
                                                <svg class="icon">
                                                    <use xlink:href="#cancel"></use>
                                                </svg>
                                            </i>
                                            بازگشت
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sendFiles" style="display:none;">
                        <div class="sendPos">
                            <div class="sendImage">
                                <input type="file" id="post_cover" class="dropify" name="image"/>
                            </div>
                        </div>
                    </div>
            @endif
        </div>
    </div>
@endsection

@section('script1')
    <script>
        $(document).mouseup(function(e)
        {
            var container = $(".sendFiles");

            if (container.is(e.target) && container.has(e.target).length === 0)
            {
                if($(".sendFiles input[name='image']").val()){
                    $('#btnFileTicket').show()
                }else{
                    $('#btnFileTicket').hide()
                }
                container.hide();
            }
        });
        $(document).ready(function(){
            var ticket = 0;
            $('.btnFile').click(function (){
                $('.sendFiles').toggle();
            })
            $('.tab').click(function (){
                $('.tab').attr('class','tab');
                $(this).attr('class','tab active');
                $('.profileIndexTicket,.createTicket').hide();
                $('.'+$(this).attr('data-type')).show();
            })
            $(document).on('click','.profileIndexTicket table tr .editButton',function () {
                ticket = $(this).attr('id');
                $('.allTickets').show();
                $('.allTicketForm table').hide();
                getMyTicket();
            })
            $(document).on('click','.profileIndexTicket .btnBack',function () {
                ticket = 0;
                $('.chat .chat-history .clearfix').remove();
                $('.allTickets').hide();
                $('.allTicketForm table').show();
            })
            $(".allTicketForm .submit").click(function (){
                $(".allTicketForm .submit").text('صبر کنید');
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('title', $(".allTicketForm .createTicket input[name='title']").val());
                formData.append('property', $(".allTicketForm .createTicket select[name='property']").val());
                formData.append('type', $(".allTicketForm .createTicket select[name='type']").val()??0);
                formData.append('body', $(".allTicketForm .createTicket textarea[name='body']").val());
                formData.append('parent_id', 0);
                formData.append('faq', 1);
                var fileInput = $(".allTicketForm .createTicket input[name='image']")[0];
                formData.append('image', fileInput.files[0]);
                $.ajax({
                    url: "/send-ticket",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $.toast({
                            text: "پیام ثبت شد", // Text that is to be shown in the toast
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
                        check = 0;
                        window.location.reload();
                    },
                    error: function (xhr) {
                        $.toast({
                            text: "فیلد ستاره دار را پر کنید", // Text that is to be shown in the toast
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
                        $(".allTicketForm .createTicket .submit").text('ارسال پیام');
                    }
                });
            })
            $('.chat-message .sendTicket').click(function (){
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('title', 'پاسخ تیکت');
                formData.append('type', 0);
                formData.append('body', $('.chat-message textarea').val());
                formData.append('parent', ticket);
                var fileInput = $(".sendFiles input[name='image']")[0];
                formData.append('image', fileInput.files[0]);
                $.ajax({
                    url: '/profile/ticket/send-ticket',
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('.chat-message textarea').val('');
                        $('.chat .chat-history .clearfix').remove();
                        getMyTicket();
                    },
                    error: function (xhr) {
                        alert('متن خود را وارد کنید.')
                    }
                });
            })
            function getMyTicket(){
                if(ticket >= 1){
                    var form = {
                        "_token": "{{ csrf_token() }}",
                        ticket:ticket,
                    };
                    $.ajax({
                        url: '/profile/ticket/get-ticket',
                        type: "post",
                        data: form,
                        success: function (data) {
                            var gs = (data.my_pay ? `<a target="_blank" href="/show-pay/${data.my_pay.property}">( جزییات سفارش )</a>` : null);
                            $(".chat .move1").attr('href' , '/show-pay/'+data.property);
                            data.my_pay ? $(".chat .move1").show() : $(".chat .move1").hide();
                            $(".chat .chat-with").text('گفتگو با مدیریت ')
                            $(".chat .chat-with").append(gs);
                            $('.chat .chat-history ul').append(
                                '<li class="clearfix">'+
                                '<div class="message-data '+(data.user.id != user.id ? 'align-left' : '')+'">'+
                                '<span class="message-data-name" >'+data.user.name+'</span>'+
                                '<span class="message-data-time" >('+data.created_at+')</span>'+
                                '</div>'+
                                '<div class="message ' + (data.user.id != user.id ? 'other-message float-left' : 'my-message') + '">' + data.body.replace(/\n/g, '<br>')+
                                (data.file != '' && data.file != null ? '<a download href="'+data.file+'"><i><svg class="icon"><use xlink:href="#files"></use></svg></i></a>' : '')+
                                '</div></li>'
                            );
                            if(data.tickets.length >= 1) {
                                $.each(data.tickets, function () {
                                    $('.chat .chat-history ul').append(
                                        '<li class="clearfix">' +
                                        '<div class="message-data ' + (this.user.id != user.id ? 'align-left' : '') + '">' +
                                        '<span class="message-data-name">' + this.user.name + '</span>' +
                                        '<span class="message-data-time" >('+this.created_at+')</span>'+
                                        '</div>' +
                                        '<div class="message ' + (this.user.id != user.id ? 'other-message float-left' : 'my-message') + '">' + this.body.replace(/\n/g, '<br>')+
                                        (this.file != '' && this.file != null ? '<a download href="'+this.file+'"><i><svg class="icon"><use xlink:href="#files"></use></svg></i></a>' : '') +
                                        '</div></li>'
                                    );
                                })
                            }
                            $('.allTickets .chat .chat-history').animate({ scrollTop: $('.allTickets .chat .chat-history').height()+2000 }, 1000);
                        },
                    });
                }
            }
            $('.dropify').dropify({
                messages: {
                    default: "فایل پیوست خود را اینجا قرار دهید.",
                    replace: "برای جایگزین کردن تصویر بکشید و رها کنید.",
                    remove: "حذف تصویر",
                    error: "خطایی به وجود آمده است. دوباره تلاش کنید.",
                }
            });
        })
    </script>
@endsection
