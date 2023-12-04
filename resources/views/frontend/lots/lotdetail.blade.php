@extends('frontend.layout.header')



@section('content')



	<section class="section-main pb-70 ">

		<div class="container">

			<div class="row">

			@include('frontend.lots.info')

			{{-- <div class="countdown"></div> --}}

			@include('frontend.lots.bet_info')

			@include('frontend.lots.bid_info')

			</div>

		</div>

		

	</section>



<!-- END -->

	@endsection


@section('js')

	<script type="text/javascript">

     $(document).ready(function() {

     	 $(document).on('submit','#buynow',function (e) {

           // alert('test');

           e.preventDefault();

           var min_price=parseFloat($('input[name="min_price"]').val());

           var bid_amount=parseFloat($('input[name="bid_amount"]').val());

           var lot_id=$('input[name="lot_id"]').val();

           var auction_id=$('input[name="auction_id"]').val();

           var user_id=$('input[name="user_id"]').val();

           // var formdata={"min_price":min_price,'bid_amount':bid_amount,'lot_id':lot_id,'auction_id':auction_id,'user_id':user_id};

           var formdata=$('#buynow').serialize();

           // console.log('bid_amount',bid_amount);

           // console.log('min_price',min_price);



           // console.log(formdata);



      //      if(bid_amount<min_price){

      //      	Swal.fire({

						//   icon: 'error',

						//   title: 'Invalid Bid!',

						//   text: 'Minimun bid must be greater than '+min_price,

						//   // footer: '<a href="">Why do I have this issue?</a>'

						// });

      //      	return null;

      //      }

            $.ajax({

                type: "post",

                url: "{{url(app()->getLocale().'/buynow') }}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                	// console.log(data.response);

                	Swal.fire({

						  icon: 'success',

						  title: 'Congratulation!',

						  text: 'Buy Now Request Send!',

						  // footer: '<a href="">Why do I have this issue?</a>'

						})

                 // $('.starting_price').html('$'+data.response.bid_amount+" USD");

                 // $('input[name="bid_amount"]').val(data.response.bid_amount);

                 // $('input[name="min_price"]').val(data.response.bid_amount);

                 $("#modal-rate").modal('hide');

                }

            });





      });



        $(document).on('submit','#bidform',function (e) {

           // alert('test');

           e.preventDefault();

           var min_price=parseFloat($('input[name="min_price"]').val());

           var bid_amount=parseFloat($('input[name="bid_amount"]').val());

           var lot_id=$('input[name="lot_id"]').val();

           var auction_id=$('input[name="auction_id"]').val();

           var user_id=$('input[name="user_id"]').val();

           // var formdata={"min_price":min_price,'bid_amount':bid_amount,'lot_id':lot_id,'auction_id':auction_id,'user_id':user_id};

           var formdata=$('#bidform').serialize();

           // console.log('bid_amount',bid_amount);

           // console.log('min_price',min_price);



           // console.log(formdata);



           if(bid_amount<min_price){

            Swal.fire({

              icon: 'error',

              title: 'Invalid Bid!',

              text: 'Minimun bid must be greater than '+min_price,

              // footer: '<a href="">Why do I have this issue?</a>'

            });

            return null;

           }

            $.ajax({

                type: "post",

                url: "{{url(app()->getLocale().'/placebid') }}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                  // console.log(data.response);

                  Swal.fire({

              icon: 'success',

              title: 'Congratulation!',

              text: 'Bid Placed!',

              // footer: '<a href="">Why do I have this issue?</a>'

            })

                 $('.starting_price').html('$'+data.response.bid_amount+" USD");

                 $('input[name="bid_amount"]').val(data.response.bid_amount);

                 $('input[name="min_price"]').val(data.response.bid_amount);

                 $("#modal-rate").modal('hide');

                }

            });





      });




     	 $.each( $(".lot_timer"), function() {

			$(this).countdown(moment.tz($(this).text(), "Europe/Berlin").toDate(), function (event) {

				$(this).html(event.strftime('%D DAYS %H:%M:%S'));

				if($(this).text()=="00 DAYS 00:00:00")

				{

					// location.reload();

				}

			});

		});
    var eventTime = $('input[name="start_date"]').val();
    // alert(eventTime);
    var currentTime = '{{$data['auction']->current_date}}';
    // alert(currentTime);
    var leftTime = eventTime - currentTime;//Now i am passing the left time from controller itself which handles timezone stuff (UTC), just to simply question i used harcoded values.
    // alert(eventTime);
    var currentelem=$(this);
    var duration = moment.duration(leftTime, 'seconds');
    var interval = 1000;
    if(duration.asSeconds() <= 0){
       currentelem.find('.countdown').html('Auction Closed');
         currentelem.find('.countdown').addClass('auction-close');
         // currentelem.find('.bidbutton').addClass('bidbutton');
       $('.auction-close').addClass('ml-5 mt-1 text-danger ');
       $('.bidbutton').attr('disabled','disabled');
      }
    setInterval(function(){
      // Time Out check
      if(duration.asSeconds() <= 0) {
        clearInterval(intervalId);
        window.location.reload(true); 
         $('.countdown').html('Auction closed');
      }
       //Otherwise
      duration = moment.duration(duration.asSeconds() - 1, 'seconds');
       var time=`<div>`+duration.days()+` <span>Days</span></div>
				<div>`+duration.hours()+` <span>Hours</span></div>
				<div>`+duration.minutes()+` <span>Min</span></div>
				<div>`+duration.seconds()+` <span>Sec</span></div>`;
      $('.countdown').html(time);
    }, interval);
      })

      $('.bid_value').on('change', function() {
          var token = $('input[name=_token]').val();
          var bid_value = $('input[name=bid_value]').val();
          var type = "{{$data['lot']->brand}}";
          var formdata = {'_token':token,'bid_value':bid_value,'brand':type};
          $.ajax({

                type: "POST",

                headers: "{'X-CSRF-TOKEN':_token}",

                url: "{{url(app()->getLocale().'/bid_value')}}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                  $('.copart_fee').html(data.response);
                  var copart_fee = $('.copart_fee').html();
                  var document_fee = $('input[name=document_fee]').val();
                  var transction_price = $('input[name=transction_price]').val();
                  var total_price = Number(document_fee) + Number(transction_price) + Number(bid_value) + Number(copart_fee);
                  $('.total_price_fee').html(total_price);

              }
        
           });
        });

        $('.zip_code').addClass('d-none');
        // $('.total_cost_usa').addClass('d-none');
        $('.usa').on('click', function() {

          var delivery_to = $('input[name=usa]:checked').val();

         if(delivery_to=="USA")
         {
            $('.zip_code').removeClass('d-none');
            $('.delivery').addClass('d-none');
            $('.delivery1').addClass('d-none');
         }
         else if(delivery_to=="Others")
         {
            $('.zip_code').addClass('d-none');
            $('.delivery').removeClass('d-none');
            $('.delivery1').removeClass('d-none');
         }
          $('.zip_code_search').on('change', function() {
            var token = $('input[name=_token]').val();
            var zip_code = $('input[name=zip_code]').val();
            var formdata = {'_token':token,'zip_code':zip_code,'type':delivery_to};
            $.ajax({
                  type: "POST",

                  headers: "{'X-CSRF-TOKEN':_token}",

                  url: "{{url(app()->getLocale().'/zip_code_search')}}",

                  data: formdata,

                  dataType:'json',

                  success: function(data) {

                    $('.total_cost_price').html(data.response);

                }
          
             });

           });

          $('.ground_shipping_dataa').on('change', function() {

            var token = $('input[name=_token]').val();
            var id = $('select[name=id]').val();
            var formdata = {'_token':token,'id':id};

            $.ajax({

                  type: "POST",

                  headers: "{'X-CSRF-TOKEN':_token}",

                  url: "{{url(app()->getLocale().'/ground_shipping_search')}}",

                  data: formdata,

                  dataType:'json',

                  success: function(data) {

                    $('.ground_fee').html(data.response);

                    $('.ocean_shipping').html(data.ocean);

                }
          
             });

          });

          $('.ocean_data').on('change', function() {

            var token = $('input[name=_token]').val();
            var id = $('select[name=ocean_id]').val();
            var formdata = {'_token':token,'ocean_id':id};

            $.ajax({

                  type: "POST",

                  headers: "{'X-CSRF-TOKEN':_token}",

                  url: "{{url(app()->getLocale().'/ocean_shipping_search')}}",

                  data: formdata,

                  dataType:'json',

                  success: function(data) {

                  $('.ocean_fee').html(data.response);

                  var ground_fee = $('.ground_fee').html();
                  var ocean_fee = $('.ocean_fee').html();

                  var total_ground_fee = Number(ground_fee) + Number(ocean_fee);

                  $('.total_cost_price').html(total_ground_fee);
                }
          
             });

          });

       });
	</script>

@endsection	

