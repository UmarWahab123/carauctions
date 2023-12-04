@if (count($data['current'])<1)



						                    	<div class="card card-personal mb-5 mt-4">

					                                <div class="card-body text-center">

					                                    <div class=" card-circle-img d-flex-center">

					                                    	<img class="img-fluid" src="{{ asset('/frontend/images/icon/hand.png') }}" alt="card image">

					                                    </div>

					                                    <h4 class="card-title">@lang('betting.no_applictant')</h4>

					                                </div>

					                            </div>

@else					                            
 @foreach ($data['current'] as $value)
 @include('frontend.includes.lot-card')
 @endforeach

@endif

