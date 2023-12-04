<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    @include('layout.css')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-chat.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-chat-list.css">
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern content-left-sidebar navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">
	@include('layout.topbar')
    <!-- BEGIN: Main Menu-->
   @include('layout.main_navigation')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content chat-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
	             @include('chats.currentusermodal')
                 @include('chats.sidebar')
                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <!-- Main chat area -->
                        <section class="chat-app-window">
                            <!-- To load Conversation -->
                            <div class="start-chat-area">
                                <div class="mb-1 start-chat-icon">
                                    <i data-feather="message-square"></i>
                                </div>
                                <h4 class="sidebar-toggle start-chat-text">Start Conversation</h4>
                            </div>
                            <!--/ To load Conversation -->
                            <!-- Active Chat -->
                            <div class="active-chat">
                                @include('chats.message_content')
                                @include('chats.chat-form')
                            </div>
                            <!--/ Active Chat -->
                        </section>
                        <!--/ Main chat area -->

                        <!-- User Chat profile right area  sds-->
                        <div class="user-profile-sidebar">

                         </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->
@include('layout.js')
    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-chat.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <!-- END: Page JS-->
    <script>
            @php $id=Auth::user()->id; @endphp
    $(document).ready(function() {
        $(document).on('click','.user-profile-toggle',function(e){
             var id =$(this).attr('data-id');
              $('.user-profile-sidebar').addClass('show');

              $.ajax({
            url: "chatuser/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {

            $('.user-profile-sidebar').html(data.modal);
            },
            error: function (error) {
                console.log(`Error ${error}`);
            },
        });
            });

       $(document).on('click','.close-icon',function(e){
              $('.user-profile-sidebar').removeClass('show');

        });

            $('.chat').addClass('active');
                $(document).on('click','.start-chat-text',function(){
                    $('.chat-list li:first').click();
                        });
            var pusher = new Pusher('fc9ff1a436e2f0610719', {
                cluster: 'ap2',
                forceTLS: true
            });
            var channel = pusher.subscribe('chat');
            var channelname='chatevent';
        channel.bind('<?php echo 'chatevent'.$id?>', function(data) {
            var json = JSON.parse(data);
            console.log(json);
            var to=$('input[name=receiver]').val();
            if(json.sender==to){
                if(json.count > 0){
                    $('.chat:last-child .chat-body').append(json.response);
                 }
                else{
                    $('.chats').append(json.response);
                    }
                $('.user-chats').scrollTop($('.user-chats > .chats').height());
            }
        });
        });
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->
</html>
