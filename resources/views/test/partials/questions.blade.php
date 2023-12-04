   <ul class="nav nav-tabs  m-tabs-line" role="tablist">
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link active show fontblack" data-toggle="tab" href="#qtypea" role="tab" aria-selected="false" style="color: black !important;width:200px;text-align: center">Question Type A</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link fontblack" data-toggle="tab" href="#qtypeb" role="tab" aria-selected="true" style="color: black !important;width:200px;text-align: center">Question Type B</a>
                </li>
            </ul>
              <div class="tab-content">
                <div class="tab-pane active show" id="qtypea" role="tabpanel">
                    @include('test.questions.type_a')
                </div>
                <div class="tab-pane" id="qtypeb" role="tabpanel">
                     @include('test.questions.type_b')
                </div>

            </div>

            @include('includes.save_lg_modal')
            @include('includes.delete_modal')

  @section('subjs')
<script>
    var parentrow="";
    $(document).on('click','.type_a_question',function(){
        var token = $('input[name=_token]').val();
        var id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        var transid = $(this).attr('data-transid');
parentrow=$(this).parents('tr');
        $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('admin/questionmodal') }}",
                    dataType: "json",
                    data:{'id':id,'type':type,'trans_id':transid},
                    success:function(data)
                    {
                        $('.modal-div').html(data.response);
                        $('#savemodal').modal('show');
                        $('select[data-option-id]').each(function() {
                         $(this).val($(this).data('option-id'));
                         });
                    }
                });
    });
    $(document).on('click','.savequestion',function(e){
        // $(document).off('click','.savequestion');
        e.preventDefault();
        //   if ( $.fn.DataTable.isDataTable('.dynamic-table') ) {
        //     $('.dynamic-table').DataTable().destroy();
        // }
        var token = $('input[name=_token]').val();
        var id = $('#questionform input[name=id]').val();
        var type = $('#questionform input[name=type]').val();
        var formdata=$('#questionform').serialize();
        $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('admin/savequestion') }}",
                    dataType: "json",
                    data:formdata,
                    success:function(data)
                    {
                        if(data.status==0){
                            alert('This rank is already taken');
                            return false;
                        }

                        if(id > 0){
                            parentrow.html(data.response);
                        }
                        else{
                            if(type=="A"){
                            $('.atbody').append(data.response);
                            }
                            else{
                            $('.btbody').append(data.response);
                            }
                        }
                        //  jqDatatable('dynamic-table');
                        $('#savemodal').modal('hide');
                        setTimeout(function(){
                            window.scrollTo(0,document.body.scrollHeight);
                        }, 500);

                    }
                });
    })
</script>
@endsection
