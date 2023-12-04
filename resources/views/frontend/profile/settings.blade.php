@extends('frontend.layout.header')

@section('content')

<section class="section-main section-cabinet pb-70">

		<div class="">

			<div class="row">

				<div class="col-md-5 col-lg-3">

					<div class="section-sidebar">

						@include('frontend.dashboard.sidebar')

					</div>

				</div>

				<div class="col-md-7 col-lg-9">

					<div class="row">



						<div class="col-md-12">

							<div class="card card-white">

                                <div class="card-body pb-5">

                                    <h4 class="card-title h4-style text-left">@lang('account.change_password')</h4>

                                    <span class="font-small">@lang('account.strong_password')</span>

                                    <div class="card-tabs">

					                      <form action="" method="post" id="updateprofile">

					                      	{{csrf_field()}}

					                      	<div class="row">

					                      		<div class="col-md-6">

					                      			<div class="row">

					                      				<div class="col-md-12 mt-4">

							                      			<div class="form-proup card-input ">

							                      				<label for="">@lang('account.current_password')</label>

							                      				<input type="password" name="current_password" class="form-control" value="" >

							                      			

							                      			</div>

					                      				</div>

					                      				<div class="col-md-12 mt-4">

							                      			<div class="form-proup card-input">

							                      				<label for="">@lang('account.new_password')</label>

							                      				<input type="password" placeholder="" name="password" class="form-control" class="password" id="password">

							                      			

							                      			</div>

							                      		</div>

							                      		<div class="col-md-12 mt-4">

							                      			<div class="form-proup card-input">

							                      				<label for="">@lang('account.confirm_new')</label>

							                      				<input type="password" placeholder="" name="confrim_password" class="form-control" id="confirm_password" class="confirm_password">

							                      			

							                      			</div>

							                      		</div>

							                      		<span id='message'></span>

					                      			</div>

					                      		</div>

					                      	</div>





					                      	<div class="profile-submit">

					                      		<input type="hidden" name="id" value="{{Auth::user()->id}}">

					                      		<button type="submit" class="btn btn-dark-blue btn-w-short submitbutton">@lang('account.save')</button>

					                      	</div>

					                      </form>



					                      

                                    </div>

                                </div>

                            </div>

						</div>



					</div>

				</div>

			</div>

		</div>



	</section>

@endsection

@section('js')



<script type="text/javascript">

	 

	$('#password, #confirm_password').on('keyup', function () {

    if ($('#password').val() == $('#confirm_password').val()) {

        $('#message').html('Password Matching').css('color', 'green');

        $('.submitbutton').removeClass('d-none');



    } else {

        $('#message').html('Password Not Matching').css('color', 'red');

        $('.submitbutton').addClass('d-none');

    }

});



$(document).ready(function () {

        $(document).on('keyup','.password, .confirm_password',function(){

        	// console.log($('.confirm_password'));

            if ($('.password').val() == $('.confirm_password').val()) {

        $('#message').html('Password Matching').css('color', 'green');

  			  } else {

      	  $('#message').html('Password Not Matching').css('color', 'red');

      	}

          });  



	 $(document).on('submit','#updateprofile',function (e) {

           e.preventDefault();

           var formdata=$('#updateprofile').serialize();

         console.log(formdata);

      //      	

            $.ajax({

                type: "post",

                url: "{{url(app()->getLocale().'/updatepassword') }}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                	// $('#updateprofile').reset();

                	 $('#updateprofile')[0].reset();

                	if(data.status==0){

                	Swal.fire({

						  icon: 'error',

						  title: 'Invalid Current Password!',

						  // text: data.response,

						  // footer: '<a href="">Why do I have this issue?</a>'

						});

                	}else{

                	Swal.fire({

						  icon: 'success',

						  title: 'Password Changed!',

						  // text: 'Bid Placed!',

						  // footer: '<a href="">Why do I have this issue?</a>'

						})

                }

                

                }

            });





      });





          });  





</script>

@endsection