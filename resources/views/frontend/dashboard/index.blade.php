@extends('frontend.layout.header')

@section('content')

	<section class="section-main section-cabinet">

		<div class="">

			<div class="row">

				<div class="col-md-3">

					@include('frontend.dashboard.sidebar')

				</div>

				<div class="col-md-9">

					<div class="row">

						<div class="col-md-4">

							@if ($data['personalinfo']==0)

								<div class="card card-personal">

                                <div class="card-body text-center">

                                    <div class="card-image card-circle-img d-flex-center">

                                    	<img class="img-fluid" src="{{asset('/frontend/images/icon-new/person.svg')}}" alt="card image">

                                    </div>

                                    <h4 class="card-title">@lang('side_bar.personal_detail')</h4>

                                    <p class="card-text">@lang('side_bar.place_bid')</p>

                                    <a href="{{url(app()->getLocale().'/usersettings/'.Auth::user()->id).'?'."type=Address"}}" class="btn btn-dark-blue btn-block">@lang('side_bar.edit')</a>

                                </div>

                            </div>

                            @elseif($data['personalinfo']==1)

                            <div class="card card-personal">

                                <div class="card-body text-center">

                                    <div class="card-image card-circle-img d-flex-center">

                                    	<img class="img-fluid" src="{{asset('/frontend/images/icon-new/person.svg')}}" alt="card image">

                                    </div>

                                    <h4 class="card-title">@lang('side_bar.personal_detail')</h4>

                                    <p class="card-text">@lang('side_bar.place_bid')</p>

                                    <a href="{{url(app()->getLocale().'/usersettings/'.Auth::user()->id).'?'."type=Address"}}" class="btn btn-success btn-block">@lang('side_bar.done')</a>

                                </div>

                            </div>

							@endif

							

						</div>

						<div class="col-md-4">

							@if ($data['docinfo']==0)

							<div class="card card-personal">

                                <div class="card-body text-center">

                                    <div class="card-image card-circle-img d-flex-center">

                                    	<img class="img-fluid" src="{{asset('/frontend/images/icon-new/file-earmark-medical.svg')}}" alt="card image">

                                    </div>

                                    <h4 class="card-title">@lang('side_bar.upload_document')</h4>

                                    <p class="card-text">@lang('side_bar.download_file')</p>

                                    <a href="{{url(app()->getLocale().'/document/'.Auth::user()->id)}}" class="btn btn-dark-blue btn-block">@lang('side_bar.edit') </a>

                                </div>

                            </div>

                            @elseif($data['docinfo']==1)

                            <div class="card card-personal">

                                <div class="card-body text-center">

                                    <div class="card-image card-circle-img d-flex-center">

                                    	<img class="img-fluid" src="{{asset('/frontend/images/icon-new/file-earmark-medical.svg')}}" alt="card image">

                                    </div>

                                    <h4 class="card-title">@lang('side_bar.upload_document')</h4>

                                    <p class="card-text">@lang('side_bar.download_file')</p>

                                    <a href="{{url(app()->getLocale().'/document/'.Auth::user()->id)}}" class="btn btn-success btn-block">@lang('side_bar.done') </a>

                                </div>

                            </div>

                            @endif

						</div>

						<div class="col-md-4">


							<div class="card card-personal">

                                <div class="card-body text-center">

                                    <div class="card-image card-circle-img d-flex-center">

                                    	<img class="img-fluid" src="{{asset('/frontend/images/icon-new/dollar.svg')}}" alt="card image">

                                    </div>

                                    <h4 class="card-title">@lang('side_bar.top_deposit')</h4>

                                    <p class="card-text">@lang('side_bar.planned_rate') USD.</p>

                                    <a href="{{url(app()->getLocale().'/deposit')}}" class="btn btn-dark-blue btn-block">@lang('side_bar.deposit')</a>

                                </div>

                            </div>

                           





						</div>

					</div>

				<div class="row-bookmarks">

						<h2 class="h2-style mb-4">@lang('side_bar.my_bookmark')<span>{{count($data['bookmark'])}}</span></h2>

					<div class="row">

						<div class="col-md-8">

							@if (count($data['bookmark'])==0)

							<div class="card card-personal">

                                <div class="card-body text-center">

                                    <div class="card-image card-circle-img d-flex-center">

                                    	<img class="img-fluid" src="{{asset('/frontend/images/icon-new/bookmark.svg')}}" alt="card image">

                                    </div>

                                    <h4 class="card-title">@lang('side_bar.single_lot')</h4>

                                    <p class="card-text">@lang('side_bar.bookmark_tool')</p>

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

					                			<img src="{{url($lot->lot->feature_image)}}">

						                		<div class="all-card-photos"><a href="{{url(app()->getLocale().'/lotdetail').'/'.$lot->lot->id}}">@lang('side_bar.photo')</a></div>

						                		</div>

						                	</div>

						                	<div class="card-content card-bookmarks-item">

						                		<div class="text-right"><span class="book_mark fas fa-bookmark {{$lot->bookmark==1?"active":''}} add_bookmark" data-lot="{{$lot->lot->id}}" data-id="{{isset(Auth::user()->id)?Auth::user()->id:''}}" data-bookmark="{{$lot->bookmark==1?1:0}} "></span></div>

						                		<div class="card-block">

							                        <h4 class="card-title"><img src=" {{url($lot->lot->brand_logo)}}" alt=""><a href="{{url(app()->getLocale().'/lotdetail/'.$lot->lot->id)}}">{{$lot->lot->lot_title}}</a></h4>

							                        <div class="char-card">

							                        	<p><span>@lang('side_bar.lot')</span>{{$lot->lot->lot_no}} - <strong> @lang('side_bar.start_up')</strong></p>

							                        	<p><span>@lang('side_bar.vin')</span>{{$lot->lot->vin}}</p>

							                        </div>

						                    	</div>

							                    <div class="card-footer-vertical">

							                    	<div class="card-footer-info">

							                    		<span>@lang('side_bar.current_rate'):</span>

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



						<div class="col-md-4">

							<div class="card card-personal">

                                <div class="card-body text-center">

                                    <div class="card-image card-circle-img d-flex-center">

                                    	<img class="img-fluid" src="{{asset('/frontend/images/icon-new/dollar.svg')}}" alt="card image">

                                    </div>

                                    <h4 class="card-title">@lang('side_bar.vin_inspector') - @lang('side_bar.vin_check')</h4>

                                    <p class="card-text">@lang('side_bar.planning_buy')</p>

                                    <a href="https://vin.doctor/en/" class="btn btn-dark-blue">@lang('side_bar.check_vin')</a>

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

	 

 $(document).ready(function(){

    $('.cabinet').addClass('activetab');

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

                 currentvalue.parents('.card').find(".book_mark").addClass('active');

                 }else{

                 	 currentvalue.attr('data-bookmark',0);

                  currentvalue.parents('.card').find(".book_mark").removeClass('active');

                 }

                }

            });

    });

 

 }); 

	

</script>

@endsection