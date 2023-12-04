@extends('frontend.layout.header')



@section('content')





	<section class="section-main section-cabinet">

		<div class="">

			<div class="row">

				<div class="col-md-5 col-lg-3">

					@include('frontend.dashboard.sidebar')

					

				</div>

				<div class="col-md-7 col-lg-9">

					<div class="section-info section-invoce">

						<div class="invoce-top">

							<div class="invoce-info">

								<h3>@lang('payment.payment_history')</h3>

							</div>

							<div class="invoce-btn">

								<a href="{{url(app()->getLocale().'/deposit')}}" class="btn btn-register btn-dark-blue pl-4 pr-4">@lang('payment.make_deposit')</a>

							</div>

						</div>

						<div class="styled-table payment-table">

							<div class="paymenttable">

								@include('frontend.payment.table')

							</div>

                            @php

                            	$total_record=$data['total'];

                            	$perpage=$data['per_page'];

                            	$totla_link=round($total_record/$perpage+0.5);
                            
                            @endphp

                           

							<div class="catalog-paginate">

								

								<ul>

									<li><a class="fal fa-angle-left previous" ></a></li>

									@for($i=1; $i<=$totla_link; $i++)
									<li ><a class="pagination pointer link{{$i}} {{$i==1?'linkfocus':'';}}" data-page='{{$i}}'>{{$i}}</a></li>
                    @endfor
                             	     {{csrf_field()}}
                   <li><a  class="fal fa-angle-right next" id="button_next"></a></li>



								</ul>

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

       $(document).ready(function(){
         $('.payment_history').addClass('activetab');
        $(document).on('click','.pagination',function(){

        	 var _token = $("input[name=_token]").val();

        	var page=$(this).attr('data-page');
          $('.catalog-paginate').find('.pagination').removeClass('linkfocus');
          $(this).addClass('linkfocus');
          // alert(page);  

          var formdata={'pageno':page, _token:_token};         

          $.ajax({

                type: "post",

                url:"{{url(app()->getLocale().'/paymentpagination')}}",

                data:formdata,

                dataType:'json',

                success: function(data) {

                  // console.log(data.response);

                   // $('#multiplemodel').html('');

                  $('.paymenttable').html(data.response);

                }

            });

        });

        $(document).on('click','.next',function(){

    var current = parseFloat($('.linkfocus').html());
    var link = current+1;

    $('.link'+link).trigger('click');



  });
 
    $(document).on('click','.previous',function(){

      var current = parseFloat($('.linkfocus').html());
      var link = current-1;
      $('.link'+link).trigger('click');


  });

       });

	</script>

@endsection	