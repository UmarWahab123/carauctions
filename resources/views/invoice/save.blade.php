@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

@endsection
@section('breadcrumb')

    <h2 class="content-header-title float-left mb-0">Make Invoice</h2>

    <div class="breadcrumb-wrapper">         

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/invoices')}}">Invoice</a>
            </li>
            <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
            </li>
        </ol>

    </div>
@endsection
@section('content')
 <form action="{{ url('admin/saveinvoice') }}" class="" id="invoice_form" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}
        <div class="row mb-2">
      <div class="col-md-12 mt-2 text-right">
    
        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
        <a href="{{url('admin/invoices')}}" class="btn btn-outline-secondary">Back</a>
      </div>
    </div>

<div class="content-body">
    <section id="basic-input">
        <div class="card">
<div class="card-body">
    <div class="col-md-12">
            <div class="row align-items-center ">
                <div class="col-4">
                    <label>Bank Name</label>
                </div>
                <div class="col-6">
                     <div class="form-group m-form__group">
                        <input type="text" name="bank_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->bank_name) ? $data['results']->bank_name : '')}}">
                    </div>
                 </div>
                   <div class="col-4">
                    <label>Bank Address</label>
                </div>
                <div class="col-6">
                     <div class="form-group m-form__group">
                        <input type="text" name="bank_address" class="form-control m-input m-input--square" value="{{(isset($data['results']->bank_address) ? $data['results']->bank_address : '')}}">
                    </div>
                 </div>
                   <div class="col-4">
                    <label>Swift Code</label>
                </div>
                <div class="col-6">
                     <div class="form-group m-form__group">
                        <input type="text" name="swift" class="form-control m-input m-input--square" value="{{(isset($data['results']->swift) ? $data['results']->swift : '')}}">
                    </div>
                 </div>
                   <div class="col-4">
                    <label>Routing</label>
                </div>
                <div class="col-6">
                     <div class="form-group m-form__group">
                        <input type="text" name="routing" class="form-control m-input m-input--square" value="{{(isset($data['results']->routing) ? $data['results']->routing : '')}}">
                    </div>
                 </div>
                   <div class="col-4">
                    <label>Account</label>
                </div>
                <div class="col-6">
                     <div class="form-group m-form__group">
                        <input type="text" name="account_no" class="form-control m-input m-input--square" value="{{(isset($data['results']->account_no) ? $data['results']->account_no : '')}}">
                    </div>
                 </div>
                   <div class="col-4">
                    <label>Beneficiary Name</label>
                </div>
                <div class="col-6">
                     <div class="form-group m-form__group">
                        <input type="text" name="beneficiary_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->beneficiary_name) ? $data['results']->beneficiary_name : '')}}">
                    </div>
                 </div>
            </div>
            <hr>
            <div class="row">
               <div class="col-4">
                 <div class="form-group m-form__group">
                        <label>Date</label>
                        <input type="text" name="date" id="start-date" class="form-control m-input m-input--square" value="{{(isset($data['results']->date) ? $data['results']->date : '')}}">
                    </div>
                </div>
                <div class="col-4">
                 <div class="form-group m-form__group">
                        <label>Invoice To</label>
                        <input type="text" name="invoice_to" class="form-control m-input m-input--square" value="{{(isset($data['results']->invoice_to) ? $data['results']->invoice_to : '')}}">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6"><label>Description</label></div>
                <div class="col-6 text-right"><label>Amount</label></div>
            </div>
            <hr>
            @if (!isset($data['item']))
                {{-- expr --}}

            <div class="row mt-2 align-items-center">
                <div class="col-6">
                            <input class="form-control " name="item[0][description]" type="text" value="{{(isset($data['results']->description) ? $data['results']->description : '')}}">
                            </input>
                   
                </div>
                <div class="col-6 text-right">
                  <input type="text" name="item[0][amount]" class="form-control m-input m-input--square total" value="{{(isset($data['results']->amount) ? $data['results']->amount : '')}}">
                </div>
                
            </div>
            @endif

             @if (isset($data['item']))
              @foreach($data['item'] as $key=>$value)
              <div class="row mt-2 align-items-center invoice-row">
                <div class="col-5">
                <input class="form-control " name="olditem[{{$key}}][description]" type="text" value="{{(isset($value->description) ? $value->description : '')}}">
                            </input>
                   
                </div>
                 <input class="form-control oldid" name="olditem[{{$key}}][id]" type="hidden" value="{{$value->id}}">
                                </input>
                <div class="col-5 text-right">
                  <input type="text" name="olditem[{{$key}}][amount]" class="form-control m-input m-input--square total" value="{{(isset($value->amount) ? $value->amount : '')}}">
                </div>
                 <div class="col-md-2 btn-remove ">
                        <div class="form-group">
                            <a class="btn btn-info btn-sm-1 active mt-2">
                                -
                            </a>
                        </div>
                    </div>
                
            </div>
              @endforeach
            @endif

             <div class="add-row">
                 </div>
             <div class="row">
            <div class="col-4 mt-2">
                <a class="btn btn-primary btn-sm active add" role="button">
                    +
                </a>
            </div>
        </div>
             <div class="row mt-2 text-right align-items-center">
                <div class="col-8">
                    <label>SubTotal</label>
                </div>
                <div class="col-4 text-left">
                  <input type="hidden" name="total" class="form-control m-input m-input--square" value="{{(isset($data['results']->total) ? $data['results']->total : '')}}">
                 <label ><h2 class="subtotal">{{(isset($data['results']->total) ? $data['results']->total : 0)}}</h2></label>
                </div>
            </div>
            <input type="hidden" name="id" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
            <input type="hidden" name="lot_id" value="{{(isset($data['bid']->lot_id) ? $data['bid']->lot_id : '')}}">
            <input type="hidden" name="auction_id" value="{{(isset($data['bid']->auction_id) ? $data['bid']->auction_id : '')}}">
    </div>
</div>
</div>

</section>

</div>
</form>

@endsection

@section('js')
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
     <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
        <script src="{{asset('/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
 
    <script type="text/javascript">
        $('.usermgt').addClass('sidebar-group-active');
        $('.users').addClass('active');
        $('#form_submit').validate({
            rules: {
                'role_id': {
                    required: true
                },
                'first_name': {
                    required: true
                },
                'last_name': {
                    required: true
                },
                'email': {
                    required: true,
                    email: true
                },

                'cpassword': {
                    equalTo: '.password'
                },
                'status': {
                    required: true
                },
            }
        });
          DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpeg',1,'dp');
            $(document).ready(function() {
        var i = 1;
        $(document).on('click', '.add', function() {
            // alert('test');

            var htmlContent = '';
            htmlContent += `
     <div class=" row invoice-row mt-2 align-items-end">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input class="form-control " name="item[`+i+`][description]" type="text" value="{{(isset($data['results']->day) ? $data['results']->day : '')}}">
                            </input>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input  class="form-control pickatime-intervals total" name="item[`+i+`][amount]" type="text" value="{{(isset($data['results']->amount) ? $data['results']->amount : '')}}">
                            </input>
                        </div>


                    </div>
                    
                    <div class="col-md-1 btn-remove ">
                        <div class="form-group">
                             <a  class="btn btn-info btn-sm active remove-partner mt-2">-</a> 
                        </div>
                    </div>
                </div>

     `;
            $(".add-row").append(htmlContent);
            i++;
            $('.pickatime-intervals').pickatime({
                interval: 150
            });


        });


        $(document).on('click', '.btn-remove', function() {
            $(this).parents('.invoice-row').remove();

            $(this).parents('.invoice-row').find('.oldid').each(function(i, obj) {
                //console.log($(this).val());
                // alert($(this).val() );
                $('#invoice_form').append('<input type="hidden" name="removed_entries[]" value="' + $(this).val() + '"/>');
            });
            i--;
            $('.total').trigger('keyup');


        });
    
    $(document).on('keyup','.total',function(){
      // alert('test');
      var total=0;
      $( ".total" ).each(function() {
          total+=parseFloat($(this).val());
        });
      $('.subtotal').html(total);
      $('input[name="total"]').val(total);
      console.log('total',total);
    });




    });
    </script>
@endsection

