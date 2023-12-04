@extends('../../layout.header')
@section('title',$data['page_title'])
@section('content')
        <!-- BEGIN: Subheader -->

        @section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{$data['page_title']}}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/alltrainings')}}">Trainings</a>
            </li>
            <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
            </li>
        </ol>
    </div>
@endsection
    <!-- END: Subheader -->

    <div class="m-content">

        <div class="m-portlet__body">
            <ul class="nav nav-pills" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active show gettraining tutorial " id="account-pill-general" data-toggle="pill" href="#tutorials" aria-expanded="true" data-type='tutorial'>
                    <i data-feather='save'></i>
                    <span class="font-weight-bold">Tutorials</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gettraining" id="account-pill-general" data-toggle="pill" href="#courses" aria-expanded="true" data-type='course'>
                    <i data-feather='file-text'></i>
                    <span class="font-weight-bold">Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gettraining" id="account-pill-general" data-toggle="pill" href="#video" aria-expanded="true" data-type='video'>
                    <i data-feather='globe'></i>
                    <span class="font-weight-bold">Video</span>
                    </a>
                </li>
            </ul>
            <div class="card">
            <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active show " id="tutorials" role="tabpanel" >
                     <div class="trainings-div">
                     </div>
                </div>
                <div class="tab-pane" id="courses" role="tabpanel">
                      <div class="trainings-div">
                     </div>
                </div>
                <div class="tab-pane" id="video" role="tabpanel">
                     <div class="trainings-div">
                     </div>
                </div>
            </div>
            </div>
            </div>

        </div>
    </div>

    <div class="loader text-center hide">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>
 @include('includes.delete')

@section('js')
  <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script type="text/javascript">

    $(document).ready(function() {
        setTimeout(function(){ $('.tutorial').trigger('click'); }, 1000);
 $('.tariningR').addClass('sidebar-group-active');
            $('.alltrainings').addClass('active');

        $(".gettraining").on('click',function(){
            var type=$(this).attr('data-type');
            $.ajax(
                {
                    type:"get",
                    url: "{{url('admin/getalltraining')}}/"+type,
                    dataType: "json",
                    success:function(data)
                    {


                     $('.trainings-div').html(data.response);
                      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
                    }
                });
        });


    });
</script>
@endsection

@endsection
