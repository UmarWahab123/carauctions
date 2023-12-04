@extends('frontend.layout.header')
@section('content')
<section class="section-main section-cabinet pb-70">
		<div class="">
			<div class="row">
				<div class="col-md-5 col-lg-3">
					@include('frontend.dashboard.sidebar')
				</div>
				<div class="col-md-7 col-lg-9">
					<div class="row">
						<div class="col-md-12">
							<div class="card_buy">
								<div class="pb-5">
									<div class="card-tabs">
										<nav>
											<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
												<a class="nav-item nav-link active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1-tab" aria-selected="true">@Lang('betting.current')</a>
												<a class="nav-item nav-link " id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2-tab" aria-selected="false">@Lang('betting.purchased')</a>
												<a class="nav-item nav-link" id="nav-3-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3-tab" aria-selected="false">@Lang('betting.rejected')</a>
												<a class="nav-item nav-link" id="nav-4-tab" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4-tab" aria-selected="false">@Lang('betting.cancel')</a>		
											</div>
										</nav>
										<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
											<div class="tab-pane fade  show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
                                               @include('frontend.betting.current')
					                        </div>
					                        <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
                                               @include('frontend.betting.purchased')
					                        </div>
					                        <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">
                                               @include('frontend.betting.rejected')
					                        </div>
					                        <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">
					                         @include('frontend.betting.canceled')
					                        </div>
					                    </div>
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
	<script>
		$('.btn-detail').click(function() {
			var toggleContent = $(this).parent().find('.card-item-detail');
			toggleContent.slideToggle( "slow" );
			toggleContent.toggleClass('active');
			if((toggleContent).hasClass('active')){
				$(this).text('Свернуть')
			}else{
				$(this).text('Детали')
			}
		});
		$(document).ready(function(){
    $('.betting').addClass('activetab');
          timecounter();
 function timecounter(){
    jQuery('.lotlist').each(function() {
    var currentelem=$(this);
    var eventTime = $(this).attr('data-time');
    var currentTime ='{{strtotime(date('Y-m-d h:i:s'))}}';
    
    // var currentTime = '{{strtotime(date('Y-m-d h:i:s'))}}';
    var leftTime = eventTime - currentTime;//Now i am passing the left time from controller itself which 
    var duration = moment.duration(leftTime, 'seconds');
    console.log(duration.asSeconds());
    var interval = 1000;
    console.log(duration.asSeconds());
     if(duration.asSeconds() <= 0){
       currentelem.find('.countdown').html('Auction closed');
      currentelem.find('.countdown').addClass('auction-close');
       $('.auction-close').addClass('ml-5 mt-1 text-danger');
      }else{
      	     setInterval(function(){
      // Time Out check
      if(duration.asSeconds() <= 0){
        clearInterval(intervalId);
        window.location.reload(true); 
      }
      //Otherwise
      duration = moment.duration(duration.asSeconds() - 1, 'seconds');
       var time=`<div>`+duration.days()+` <span>Days</span></div>
        <div>`+duration.hours()+` <span>Hours</span></div>
        <div>`+duration.minutes()+` <span>Min</span></div>
        <div>`+duration.seconds()+` <span>Sec</span></div>`;
        // console.log('eventTime',eventTime);

        // console.log(time);
      currentelem.find('.countdown').html(time);

    }, interval);
      }

  });
    }

   
    $(document).on('click','.add_bookmark',function(){
     var user_id=$(this).attr('data-id');
     var lot_id=$(this).attr('data-lot');
     var bookmark=$(this).attr('data-bookmark');
     // alert(user_id);
var _token=$('input[name=_token]').val();
     var currentvalue= $(this);
     var formdata={'user_id':user_id,'lot_id':lot_id,"bookmark":bookmark,_token:_token};
     console.log("fomrdata",formdata)
        $.ajax({
                type: "post",
                url: "{{url(app()->getLocale().'/savebookmark') }}",
                data: formdata,
                dataType:'json',
                success: function(data) {
                 console.log(data.response);
                 if(bookmark==0){
                 currentvalue.attr('data-bookmark',1);
                 currentvalue.parents('.card-item').find(".book_mark").addClass('active');
                 }else{
                 	 currentvalue.attr('data-bookmark',0);
                   currentvalue.parents('.card-item').find(".book_mark").removeClass('active');
                 }
                }
            });
    });
 });
	</script>
@endsection