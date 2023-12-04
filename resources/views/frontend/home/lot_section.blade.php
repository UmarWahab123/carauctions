	<div class="container">
		
	
	<div class="card-slider">

		

		@foreach ($data['results'] as $row)

				<div class="card card-item card-slider-item">

					<div class="card-image">

						<a href="{{url(app()->getLocale().'/lotdetail/'.$row->id)}}"><img src="{{url($row->feature_image)}}"></a>

					</div>

					<div class="card-content card-content-item">
            @if(Auth::check())
						<div class="text-right"><span class="book_mark fas fa-bookmark {{$row->bookmark==1?"active":''}} add_bookmark" data-lot="{{$row->id}}" data-id="{{isset(Auth::user()->id)?Auth::user()->id:''}}" data-bookmark="{{$row->bookmark==1?1:0}} "></span> {{csrf_field()}}</div>
             @else
          	<div class="text-right" data-toggle="modal" data-target="#loginModal"><span class="book_mark fas fa-bookmark {{$row->bookmark==1?"active":''}} add_bookmark" data-lot="{{$row->id}}" data-id="{{isset(Auth::user()->id)?Auth::user()->id:''}}" data-bookmark="{{$row->bookmark==1?1:0}} "></span> {{csrf_field()}}</div>
          	@endif
                                  
						<div class="card-block">

							<h4 class="card-title"><img src="{{url($row->brand_logo)}}" alt="">{{$row->lot_title}}</h4>

							<div class="char-card">

								<p><span>@lang('home_page.lot')</span>#{{$row->lot_no}} - <strong>@lang('home_page.starts')</strong></p>

								<p><span>VIN</span>{{$row->vin}}</p>

							</div>
                              @php
                              	$starting_price=check_starting_price($row,$row->id);
                              	if($row->est_retail_value > 0){
                              	if($starting_price==0){
                              	if($row->buy_now > 0){

                              		$res=$row->est_retail_value-$row->buy_now;
                              	}else{
                              		$res=$row->est_retail_value-0;

                              }
                              	$save=$res/$row->est_retail_value*100;
                              }else{
                              	$res=$row->est_retail_value-$starting_price;
                              	$save=$res/$row->est_retail_value*100;
                              }}else{
                              $save=$starting_price;
                          }
                              	
                              @endphp
							<div class="card-saving">

								@lang('home_page.save_percent') {{round($save)}}%

							</div>

						</div>

						<div class="card-footer">

							<div>

								<span>@lang('home_page.retail_price')</span>

								<p>${{$row->est_retail_value}}  USD</p>

							</div>

							<div>

								<span>@lang('home_page.starting_price')</span>

								<p>${{$starting_price}}  USD</p>

							</div>

						</div>

						<div class="card-btn">

							<a href="{{url(app()->getLocale().'/lotsearch')}}" class="btn btn-dark-blue">@lang('home_page.search_for_items')</a>

						</div>

					</div>

				</div>

		@endforeach

							</div>

							</div>	

							<div class="modal" tabindex="-1" role="dialog" id="loginModal">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title">@lang('main_section.login_or_register')</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <p class="war-message"></p>
@lang('main_section.functionality_is_for_registered')
      <div class="row">
        
        <div class="col-md-6">
        <a href="{{url(app()->getLocale().'/userregister')}}" class="btn-blue btn-red btn btn-primary w-100">@lang('main_section.create_new_account')</a>
        </div>
        <div class="col-md-6">
        <a href="{{url(app()->getLocale().'/login')}}" class="btn-blue btn-red btn btn-secondary w-100">@lang('main_section.login_now2')</a>
        </div>
     </div>
      </div>
    </div>
  </div>
</div>