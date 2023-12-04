@extends('frontend.layout.header')



@section('content')

  



	<div class="login-page">

		<div class="login-page-form">

			<div class="login-page-form-wrap">

				<h2 class="h2-style">@lang('register_page.registration')</h2>



				<div class="form-row-social-account list-inline">



					

						<a href="{{ url('/redirectfacebook')}}" class="s-facebook active"><img src="{{asset('/frontend/images/icon/facebook.svg')}}" alt=""> @lang('register_page.facebook_login')</a>

			



						<a href="{{url('/redirect')}}" class="s-google"><img src="{{asset('/frontend/images/icon/google.svg')}}" alt="">@lang('register_page.google_login')</a>

			

				



				</div>



				<h4>@lang('register_page.login_account')</h4>



			  <form action=""  method="post" id="register_form">

			  	 {{csrf_field()}}

					<div class="row">

						<div class="col-md-12">

              			<div class="form-group card-input">

 
                      <label for="input-1" class="form-label" ></label>
              				<input type="text" id="input-1" name='name' required placeholder="@lang('register_page.name')">

              			</div>

              		</div>

              		<div class="col-md-12">

              			<div class="form-group card-input">

                      <label for="input-1" class="form-label" ></label>

              				<input type="text" id="input-1" name='email' required placeholder="@lang('register_page.email')">


              			</div>

              		</div>

              		<div class="col-md-12">

              			<div class="form-group card-input">

                      <label for="input-2" class="form-label" ></label>
              				<input type="password" class="password" id="input-2"  name='password' minlength="6"required placeholder="@lang('register_page.password')">

              			</div>

              		</div>

              		<div class="col-md-12">

              			<div class="form-group card-input">
                      <label for="input-3" class="form-label" ></label>
                      
              				<input type="password" id="input-3" class="confirm_password" id="confirm_password" required placeholder="@lang('register_page.confirm_password')">


              				<span id='message'></span>

              			</div>

              		</div>

              		<div class="col-md-12 mt-4">

					   <div class="check-wrap check-register">

					      <label for="check" class="chek-label">

						  <input type="checkbox" id="check" class="chek-styled ">

						  <span class="checkmark"></span></label>

						  <p style="font-size: 14px;">@lang('register_page.confirmation_text')<a href="" style="color: #0000ff;">@lang('register_page.term_policy')</a></p>

					     </div>

					 </div>

              	</div>

              	<button type="submit" class="btn btn-register btn-dark-blue" id="button_disable">@lang('register_page.registration')</button>

				</form>

				<div class="register-page-link"><p>@lang('register_page.register')<a href="{{url('/login')}}">@lang('register_page.login')</a></p></div>

			</div>

		</div>



	</div>



@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script>

	$('#password, #confirm_password').on('keyup', function () {

    if ($('#password').val() == $('#confirm_password').val()) {

        $('#message').html('Matching').css('color', 'green');

    } else 

        $('#message').html('Not Matching').css('color', 'red');

});


  $("#button_disable").prop('disabled', true);
    
    $( "#check" ).click(function() {


      if ($(this).is(':checked')) {
            $('#button_disable').prop('disabled', false);
        } else {
            $('#button_disable').prop('disabled',true);
        }
  });
  


          $(document).ready(function () {

        $(document).on('keyup','.password, .confirm_password',function(){

        	// console.log($('.confirm_password'));

            if ($('.password').val() == $('.confirm_password').val()) {

        $('#message').html('Matching').css('color', 'green');

  			  } else {

      	  $('#message').html('Not Matching').css('color', 'red');

      	}

          });  


        $("#register_form").submit(function(e) {

         e.preventDefault();

         var formdata = $(this).serialize();

         $.ajax({
                    type:"post",
                    headers: "{'X-CSRF-TOKEN': token}",
                    url: "{{url(app()->getLocale().'/userregister') }}",
                    dataType: "json",
                    data:formdata,
                    success:function(data)
                    {
                        if(data.status==1)
                        {
                          Swal.fire({
                            icon: 'success',
                            title: 'Congratulation!',
                            text: data.response,

                          })

                        }
                        else
                        {
                            Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: data.response,

                          })
                        }

                        $("#register_form").trigger("reset");

                    }
                })

        });


          });  



</script>



@endsection









