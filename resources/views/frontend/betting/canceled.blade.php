
  	@if (count($data['canceled'])<1)
  	                                      <div class="card card-personal mb-5 mt-4">

					                                <div class="card-body text-center">

					                                    <div class="card-circle-img d-flex-center">

					                                    	<img class="img-fluid" src="{{asset('/frontend/images/icon/hand.png')}}" alt="card image">

					                                    </div>

					                                    <h4 class="card-title">@lang('betting.no_applictant')</h4>

					                                </div>

					                            </div>

		@else	
@foreach ($data['canceled'] as $value)
@include('frontend.includes.lotcard')
@endforeach

@endif