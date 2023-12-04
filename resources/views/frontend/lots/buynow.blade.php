 <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">@lang('lotdetail.buy_now_price')</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true"  class="fal fa-times"></span>
	        </button>
	      </div>
	      <div class="modal-body">
			<form action="#" id="buynow">
        {{ csrf_field() }}
				<label for="" class="starting_price">@lang('lotdetail.buy_now') : $ {{$data['lot']->buy_now}} USD</label>
				@if (!Auth::check())
				<a href="{{url(app()->getLocale().'/userregister')}}" class="btn btn-big btn-blue ">@lang('lotdetail.registration')</a>
				@else
				<input  type="hidden" placeholder="value..." name="buy_amount" value="{{ $data['lot']->buy_now}}" />
				<input  type="hidden" placeholder="value..." name="lot_id" value="{{isset($data['lot']->id)?$data['lot']->id: '' }}" />
				<input  type="hidden" placeholder="value..." name="user_id" value="{{Auth::user()->id}}" />
				<input  type="hidden" placeholder="value..." name="auction_id" value="{{$data['auction']->id}}" />
        @if(!empty(Auth::user()->address) &&  Auth::user()->document_status=="Approved" && 
        !empty($data['deposit']->amount)  && $data['deposit']->amount>=600 && !empty(Auth::user()->document))
				     <button  class="btn btn-dark-blue btn-big mb-4 mt-4 bidplace">@lang('lotdetail.buy_now')</button>
				@elseif(empty(Auth::user()->document))
                  <a href="{{url(app()->getLocale().'/document/'.Auth::user()->id)}}">@lang('lotdetail.upload_doc') </a>
                @elseif(isset($data['deposit']->amount) && $data['deposit']->amount <600)
                  <a href="{{ url(app()->getLocale().'/deposit') }}">@lang('lotdetail.deposit_amount') </a>
                 @elseif(Auth::user()->document_status=="Pending")
                 <a href="{{ url(app()->getLocale().'/document/'.Auth::user()->id) }}">@lang('lotdetail.document_status') </a>
				@endif
				@endif
			</form>
	      </div>
	       @if (empty(Auth::user()->address))
	      <div class="modal-footer">
               @php
					$user_id=0;
				@endphp
                     @if(Auth::check())
                      @php
                        $user_id=Auth::user()->id;
                      @endphp
                     @endif
	        <div class="modal-footer-block-red">
	        	<p><a href="{{url(app()->getLocale()."/usersettings/'.$user_id.'?'.'type=Address")}}" class="link-decor-blue">@lang('lotdetail.profiles')</a> 
          @lang('lotdetail.fill_address')</p>
	        </div>
	      </div>
	       @endif
	    </div>