@extends('frontend.layout.header')



@section('content')

<section class="section-main section-cabinet">



<div class="row">

		<div class="col-md-3">

					@include('frontend.dashboard.sidebar')

		</div>

		<div class="col-md-9">

			<div class="row-bookmarks">

						<h2 class="h2-style mb-4">@lang('bookmark.my_bookmark') <span class="bookmarkcount">{{count($data['bookmark'])}}</span></h2>

					<div class="row">

						<div class="col-md-10">

							@if (count($data['bookmark'])==0)

							<div class="card card-personal">

                                <div class="card-body text-center">

                                    <div class="card-image card-circle-img d-flex-center">

                                    	<img class="img-fluid" src="{{asset('/frontend/images/icon-new/bookmark.svg')}}" alt="card image">

                                    </div>

                                    <h4 class="card-title">@lang('bookmark.single_lot')</h4>

                                    <p class="card-text">@lang('bookmark.bookmark')</p>

                                </div>

                            </div>

							@endif

                            @if (!empty($data['bookmark']))

                            <div class="row">

                            	

                           @foreach ($data['bookmark'] as $lot)

							<div class="col-md-12">

										<div class="card card-item card-item-vertical card-bg-gray">



						                	<div class="card-img-top">

						                		<div class="card-img-wrap">
			                               <main class="lightgallery">   
                                         <a  class="lot-img" href="{{url($lot->lot->feature_image)}}">
					                			  <img src="{{url($lot->lot->feature_image)}}">
					                		    </a>
					                		     @foreach ($lot->lot->gallery as $value)
						                        <a  class="lot-img d-none" href="{{url($value->images)}}">
						                          <img src="{{url($value->images)}}" class="product-image" alt="">
						                        </a> 
						                        @endforeach

						                		<div class="all-card-photos"><a href="{{url(app()->getLocale().'/lotdetail').'/'.$lot->lot->id}}">@lang('bookmark.photo')</a></div>
                                       </main>


						                		</div>

						                	</div>

						                	<div class="card-content card-bookmarks-item">

						                		<div class="text-right"><span class="book_mark fas fa-bookmark {{$lot->bookmark==1?"active":''}} add_bookmark" data-lot="{{$lot->lot->id}}" data-id="{{isset(Auth::user()->id)?Auth::user()->id:''}}" data-bookmark="{{$lot->bookmark==1?1:0}} "></span>

						                			{{csrf_field()}}

						                		</div>

						                		<div class="card-block">

							                        <h4 class="card-title"><img src=" {{url($lot->lot->brand_logo)}}" alt=""><a href="{{url(app()->getLocale().'/lotdetail/'.$lot->lot->id)}}">{{$lot->lot->lot_title}}</a></h4>

							                        <div class="char-card">

							                        	<p><span>@lang('bookmark.lot')</span>{{$lot->lot->lot_no}} - <strong>@lang('bookmark.start_up')</strong></p>

							                        	<p><span>@lang('bookmark.vin')</span>{{$lot->lot->vin}}</p>

							                        </div>

						                    	</div>

							                    <div class="card-footer-vertical">

							                    	<div class="card-footer-info">

							                    		<span>@lang('bookmark.current_rate'):</span>

                                                        @if ($lot->lot->buy_now>0)

                                                         <p>$ {{$lot->lot->buy_now}} USD</p>

                                                        @else

							                    		<p>$ {{check_starting_price($lot->lot,$lot->lot->id)}} USD</p>

                                                        @endif

							                    	</div>

							                    </div>

					                		</div>

		                				</div>

							 </div>

                           @endforeach

							 

							</div>

                            	@endif

                          

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

    $('.bookmarks').addClass('activetab');

    $(document).on('click','.add_bookmark',function(){

     var user_id=$(this).attr('data-id');

     var lot_id=$(this).attr('data-lot');

     var bookmark=$(this).attr('data-bookmark');

     // alert(user_id);

     var _token=$('input[name=_token]').val();

     var currentvalue= $(this);
      var bookmarkcount=parseFloat($('.bookmarkcount').html());
      var bookmarkremove=bookmarkcount-1;
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

                 currentvalue.parents('.card').find(".book_mark").addClass('active');
                 Swal.fire('Bookmark Successfully.')

                 }else{

                 	 currentvalue.attr('data-bookmark',0);
                    currentvalue.parents('.card').find(".book_mark").removeClass('active');
                    Swal.fire('Removed From Bookmark Successfully.')
                   currentvalue.parents('.card').remove();

                    $('.bookmarkcount').html(bookmarkremove);





                 }

                }

            });

    });

 

 }); 

	

</script>

@endsection