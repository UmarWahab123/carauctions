<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">@lang('dashboard.copy_right') &copy; {{date('Y')}}
            <a class="ml-25" href="https://newrich.com" target="_blank">@lang('dashboard.global_motor')</a><span class="d-none d-sm-inline-block">, @lang('dashboard.all_right')</span></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
@if(Session::has('message'))
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <script src="{{asset('/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/extensions/ext-component-toastr.js')}}"></script>
@endif
<script>
    $('select[data-option-id]').each(function() {
        $(this).val($(this).data('option-id'));
    });
    $('.setmode').click(function () {
                            $.ajax({
                            type:'get',
                            dataType:'json',
                            url: '{{url('admin/layoutmode')}}',
                            success: function(response){
                                var layoutmode=response.layoutmode;
                                window.location.reload();
                                return false;
                                if(layoutmode=="light-layout"){
                                    $('body').removeClass('dark-layout');
                                    $('body').addClass('light-layout');
                                }
                                else{
                                     $('body').addClass('dark-layout');
                                     $('body').removeClass('light-layout');
                                }
                            }
                        });
                    });
    function tags() {
        tags = $('.tags'),
                tags.wrap('<div class="position-relative"></div>').select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    maximumSelectionLength: 3,
                    dropdownParent: tags.parent(),
                    placeholder: 'Select maximum 3 items'
                });
    }
    function DropzoneSinglefunc(id,filetypes,maxFiles,inputname){
        
        var i=0;
        Dropzone.autoDiscover = false;
        $('#'+id).dropzone({
            paramName: 'file',
            maxFiles: maxFiles,
            acceptedFiles:filetypes,
            addRemoveLinks:!0,
            accept:function(e, o) {
                "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
            },
            success:function(file, serverFileName) {
                
                $('input[name="'+inputname+'"]').val(serverFileName);
                i++;
            },
        });
    }

    var fileListinput = new Array;
         var i = 0;
    function DropzoneMultiplefunc(id,filetypes,maxFiles,inputname){
        Dropzone.autoDiscover = false;
        $('#'+id).dropzone({
            paramName: 'file',
            maxFiles: maxFiles,
            acceptedFiles:filetypes,
            addRemoveLinks:!0,
            accept:function(e, o) {
                "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
            },
            success:function(file, serverFileName) {
                fileListinput[i] = serverFileName;
                i++;
                $('input[name="'+inputname+'"]').val(JSON.stringify(fileListinput));
            },
        });
    }

      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    
    $('#confirm-save').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    
    $('select[data-option-id]').each(function() {
        $(this).val($(this).data('option-id'));
    });
    $('.logout').click(function () {
        $('#frm-logout').submit();
    });
    <?php  if(Session::has('message')):  ?>
<?php $message = Session::get('message');
           $msg= $message['text'];
            ?>
    <?php  if($message['title'] == 'Success'): ?>
toastr['success']('👋 {{$msg}}', 'Success!', {
closeButton: true,
tapToDismiss: true,
progressBar: true,

    });
<?php else: ?>
        toastr['error']('👋 {{$msg}}', 'Success!', {
    closeButton: true,
    tapToDismiss: true,
    progressBar: true,
});
<?php
endif;
Session::forget('message');
endif;
?>
</script>
