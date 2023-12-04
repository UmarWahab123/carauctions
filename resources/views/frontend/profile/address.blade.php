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

							<form action="{{ url(app()->getLocale().'/updateprofile') }}" method="post">

								 {{ csrf_field() }}

								<div class="card card-white">

                                <div class="card-body pb-5">

                                    <h4 class="card-title h4-style text-left">@lang('account.payment_address')</h4>

                                    <span class="font-small">@lang('account.use_only')</span>

                                    <div class="card-tabs mt-5">

					                      	<div class="row select-styled">

					                      		<div class="col-md-6">

					                      			<div class="row">

					                      				<div class="col-md-12 mb-4">

							                      			<label for="">@lang('account.country')</label>

					                                    	<select class="slim-select-2 country" data-select2  data-placeholder="Select Country ..." name="country">

																<option data-placeholder="true"></option>

																@foreach ($data['countries'] as $value)

															  	<option value="{{$value->id}}" {{$data['results']->country==$value->id?'Selected':''}}>{{ $value->name}}</option>

																@endforeach

															</select>

															<input type="hidden" name="country" value="{{isset($data['results']->country)?$data['results']->country:''}}">

							                      		</div>

							                      		<div class="col-md-12 mb-4">

							                      			<label for="">@lang('account.region')</label>

					                                    	<select class="slim-select-2" data-region name="region"  data-placeholder="Region" id="region">

																<option data-placeholder="true"></option>

																@foreach ($data['state'] as $state)

															  	<option value="{{$state->id}}" {{$data['results']->region==$state->id?'Selected':''}}>{{ $state->name}}</option>

																@endforeach

															</select>

															<input type="hidden" name="region" value="{{isset($data['results']->region)?$data['results']->region:''}}">



							                      		</div>

							                      		<div class="col-md-12 mb-4">

							                      			<label for="">@lang('account.town')</label>

					                                    	<select class="slim-select-2" data-city name="town" id="cities">

																<option data-placeholder="true"></option>

																@foreach ($data['town'] as $town)

															  	<option value="{{$town->id}}" {{$data['results']->town==$town->id?'Selected':''}}>{{ $town->name}}</option>

																@endforeach

															</select>

															{{-- <input type="hidden" name="region"> --}}



							                      		</div>

							                      		<div class="col-md-12 mb-4 d-none">

							                      			<div class="form-proup card-input">

							                      				<label for="">@lang('account.town')</label>

							                      				<input type="text" name="town" class="form-control" value="{{isset($data['results']->town)?$data['results']->town:''}}">

							                      			</div>

					                      				</div>

					                      			</div>

					                      		</div>

					                      		<div class="col-md-6">

					                      			<div class="row">

					                      				<div class="col-md-12">

							                      			<div class="form-proup card-input">

							                      				<label for="">@lang('account.index')</label>

							                      				<input type="text" name="index" class="form-control" value="{{isset($data['results']->index)?$data['results']->index:''}}">

							                      			

							                      			</div>

					                      				</div>

					                      				<div class="col-md-12 mb-4">

							                      			<div class="form-proup card-input">

							                      				<label for="">@lang('account.the_address')</label>

							                      				<input type="text" name="address" class="form-control" value="{{isset($data['results']->address)?$data['results']->address:''}}">

							                      			

							                      			</div>

					                      				</div>

					                      			</div>

					                      		</div>

					                      	</div>



					                      	</div>

                                    </div>

                                    <div class="card-body px-sm-70 pb-5">

                                    <h4 class="card-title h4-style text-left">@lang('account.delivery_address')</h4>

                                    <div class="card-tabs mt-5">

					                      	<div class="row select-styled">

					                      		<div class="col-md-6">

					                      			<div class="row">

					                      				<div class="col-md-12 mb-4">

							                      			<label for="">@lang('account.country')</label>

					                                    	<select class="slim-select-2 " data-deliverycountry data-placeholder="Country">

																<option data-placeholder="true"></option>

																@foreach ($data['countries'] as $value)

															  	<option value="{{$value->id}}" {{$data['results']->delivery_country==$value->id?'Selected':''}}>{{ $value->name}}</option>

																@endforeach

															</select>

															<input type="hidden" name="delivery_country"  value="{{isset($data['results']->delivery_country)?$data['results']->delivery_country:''}}">

							                      		</div>

							                      		<div class="col-md-12 mb-4">

							                      			<label for="">@lang('account.region')</label>

					                                    	<select class="slim-select-2" data-deliveryregion name="delivery_region" id="delivery_region"  data-placeholder="Region">

																<option data-placeholder="true"></option>

																@foreach ($data['deliverystate'] as $deliverystate)

															  	<option value="{{$deliverystate->id}}" {{$data['results']->delivery_region==$deliverystate->id?'Selected':''}}>{{ $deliverystate->name}}</option>

																@endforeach

															</select>

															<input type="hidden" name="delivery_region"  value="{{isset($data['results']->delivery_region)?$data['results']->delivery_region:''}}">



							                      		</div>

							                      		<div class="col-md-12 mb-4">

							                      			<label for="">@lang('account.town')</label>

					                                    	<select class="slim-select-2" data-deliverytown name="delivery_town" id="delivery_town"  data-placeholder="Town">

																<option data-placeholder="true"></option>

																@foreach ($data['deliverytown'] as $deliverytown)

															  	<option value="{{$deliverytown->id}}" {{$data['results']->delivery_town==$deliverytown->id?'Selected':''}}>{{ $deliverytown->name}}</option>

																@endforeach

															</select>

															{{-- <input type="hidden" name="delivery_region"> --}}



							                      		</div>

							                      		<div class="col-md-12 mb-4 d-none">

							                      			<div class="form-proup card-input">

							                      				<label for="">@lang('account.town') </label>

							                      				<input type="text" name="delivery_town" class="form-control"  value="{{isset($data['results']->delivery_town)?$data['results']->delivery_town:''}}">

							                      			

							                      			</div>

					                      				</div>

					                      			</div>

					                      		</div>

					                      		<div class="col-md-6">

					                      			<div class="row">

					                      				<div class="col-md-12">

							                      			<div class="form-proup card-input">

							                      				<label for="">@lang('account.town')</label>

							                      				<input type="text" name="delivery_index" class="form-control" value="{{isset($data['results']->delivery_index)?$data['results']->delivery_index:''}}">

							                      			

							                      			</div>

					                      				</div>

					                      				<div class="col-md-12 mb-4">

							                      			<div class="form-proup card-input">

							                      				<label for="">@lang('account.the_address')</label>

							                      				<input type="text" name="delivery_address" class="form-control" value="{{isset($data['results']->delivery_address)?$data['results']->delivery_address:''}}">

							                      			

							                      			</div>

					                      				</div>

					                      			</div>

					                      		</div>

					                      	</div>



					                      	</div>

					                      	<div class="profile-submit">

					                      		<input type="hidden" name="id" value="{{Auth::user()->id}}">

					                      		<button type="submit" class="btn btn-dark-blue btn-w-short">@lang('account.save')</button>

                                    

                                			</div>

                                    </div>

                            	</div>



							</form>

						</div>



					</div>

				</div>

			</div>

		</div>



	</section>

@endsection 



@section('js')



<script type="text/javascript">

	  

	   $(document).on('change','select[name=country]',function () {

            alert('test');

         });



</script>

@endsection 

