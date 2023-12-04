<div class="modal fade modal-rate" id="modal-rate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	   @if ($data['lot']->buy_now>0)
	    @include('frontend.lots.buynow')
	   
{{-- start else --}}
	    @else
	    @include('frontend.lots.placebid')
	    @endif 
  {{-- End Main if --}}
	  </div>
	</div>