@extends('frontend.layout.header')

@section('content')

<div class="container">

  <h1 class="mt-2">FAQ: Frequently Asked Questions</h1>

   <div class="row mt-5 mb-4">

  <div class="col-2">

    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

       @foreach (faqs_types() as $key=>$types)

      <a class="nav-link faqs_type  type{{$key}}" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" data-type='{{$types}}'>{{$types}}{{csrf_field()}}</a>

        @endforeach

    </div>

  </div>

  <div class="col-9 ">

    <div class="tab-content" id="v-pills-tabContent">

      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

         <div class="faqs">

           

         </div>

      </div>

      

    </div>

  </div>

</div>

</div>

@endsection	

@section('js')

<script type="text/javascript">

    setTimeout(

      getfaqs('Registration')

      , 1000);

    

 $(document).on('click','.faqs_type',function(){

     var type=$(this).attr('data-type');

   getfaqs(type);



   });

 function getfaqs(type){

     var _token = $("input[name=_token]").val();

      var formdata={'type':type,_token:_token};



     $.ajax({

                type: "post",

                url: "{{url(app()->getLocale().'/get_faqs') }}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                  // console.log(data.response);

                 $('.faqs').html(data.response);

                  $('.collapse').collapse();

                }

            });

 }

  $(document).ready(function(){

$('a.faqs_type:first-child').trigger('click');

  

  });

</script>	

@endsection	

