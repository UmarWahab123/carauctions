
<style type="text/css">
	
.card-item-vertical {
    overflow: hidden;
}
.card-item-vertical .card-img-top img
{
    height: 100%;
    object-fit: cover;
}
.card-img-top img {
    width: 100% ;
}

.card-item {
    border-radius: 12px;
    border: 0;
    background: #fff;
}
.card-item-vertical .card-img-top {
    padding: 0;
}
.card-item-vertical .card-img-top {
    max-width: 390px;
}
.card-item .card-img-top {
    border-radius: 12px 12px 0 12px;
    overflow: hidden;
}
.card-item-vertical .card-img-wrap {
    height: 100%;
}
.card-item-vertical .card-title {
    color: #2d2c86;
     padding-right: 0px !important; 
}
.card-img-wrap {
    border-radius: 12px;
    overflow: hidden;
}
.card-img-wrap {
    position: relative;
}
.all-card-photos {
    margin-top: 20px;
}
.all-card-photos {
    position: absolute;
    bottom: 15px;
    left: 10px;
}

element.style {
}
.all-card-photos {
    left: inherit;
    right: 20px;
    bottom: 20px;
}
.all-card-photos {
    margin-top: 20px;
}
.all-card-photos {
    position: absolute;
   /* bottom: 15px;
    left: 10px;*/
}
.all-card-photos{
    font-size: 14px;
    font-weight: 600;
    text-align: center;
    text-transform: uppercase;
    color: #000;
    font-weight: 600;
}
.card-item-vertical .card-content {
    padding: 30px 30px 30px 70px;
}
.card-item-vertical .card-content {
    width: 100%;
}
.card-content {
    /*padding: 20px;*/
    position: relative;
}
.card-info-rate {
    background: rgba(0, 119, 255, .05);
    max-width: 230px;
    width: 100%;
}
.card-title a
{
	color: #000;
}
.card-block .details-list__item span
{
	font-size: 15px;
}
.color_black span 
{
    color: #000;
    font-weight: bold;
}
.details-list__label
{
    font-size: 13px;
}
.card-block .details-list__item span
{
    font-size: 14px;
}
.details-list__item
{
    margin-bottom: 8px;
}
.card-info-rate-price p
{
    color: #1D1C62;
}
.card-block .details-list__item span
{
    font-size: 13px;
}
.label-green
{
    width: 25px;
    height: 25px;
    background: #30CE55;
    color: #fff;
    font-size: 12px;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
}
.catalog-filters .ss-multi-selected,.catalog-filter-item-group .card-personal.h-50px,.card-price-tab.sidebar-nav{
    border-radius: 10px;
}
.label-green 
{
    cursor: pointer;
    display: flex;
}
.label-red
{
    width: 25px;
    height: 25px;
    background: #B32828;
    color: #fff;
    font-size: 12px;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
}
.label-red 
{
    cursor: pointer;
    display: flex;
}
.label-blue
{
    width: 25px;
    height: 25px;
    background: #0465C7;
    color: #fff;
    font-size: 12px;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
}
.label-blue
{
    cursor: pointer;
    display: flex;
}
.linkfocus
{
    background:#0077FF !important;
}
.catalog-paginate ul a:hover
{
    background:#0077FF !important;
}
.popover-header
{
    background-color: #fff;
    border-bottom: 0px;
    color: #30CE55;
}
.empty-message-block {
    color: #888da3;
    padding: 60px 0 36px;
    text-align: center;
}.empty-message-block .icon-xl.gray {
    color: #888da3;
}.empty-message-block .icon-xl {
    display: inline-block;
    font-size: 48px;
}.empty-message-block .title {
    display: block;
    font-size: 32px;
    line-height: 38px;
    margin: 30px 0 21px;

}*, :after, :before {
    box-sizing: border-box;
}
.empty-message-block p {
    display: inline-block;
    font-size: 18px;
    line-height: 32px;
    max-width: 615px;
}
p:last-child {
    margin: 0;
}


@media only screen and (max-width:1400px) {
    .card-item-vertical .card-img-top{
        max-width: 325px;
    }
}
</style>
@if(count($data['search']) > 0)
<b class="text-right ml-3">Page {{$data['offset']}} of {{round($data['total']/env('PER_PAGE'))}} </b>
@foreach($data['search'] as $search)
	<div class="col-md-12 filter_search">
		<div class="card card-item card-item-vertical lotlist" data-currunttime="{{strtotime(date('Y-m-d h:i:s'))}}"  data-time="{{strtotime(isset($search->lot->start_date)?$search->lot->start_date:'')}}">
			<div class="card-img-top">
			    <div class="card-img-wrap">
                    @if(isset($search->feature_image) && (strpos($search->feature_image,'cvis') !== false))
			          <main class="lightgallery">   
                        <a  class="lot-img" href="{{url($search->feature_image)}}">
                          <img src="{{url($search->feature_image)}}" class="product-image" alt="">
                        </a>  
                        @foreach ($search->gallery as $value)
                        <a  class="lot-img d-none" href="{{url($value->images)}}">
                          <img src="{{url($value->images)}}" class="product-image" alt="">
                        </a> 
                        @endforeach

                    <div class="all-card-photos">
                        <a  class="lot-img" href="#">
                        SEE ALL PHOTOS
                    </div>
                      </main>

                    @elseif(isset($search->feature_image) && (strpos($search->feature_image,'cs') !== false))
                      <main class="lightgallery">   
                        <a  class="lot-img" href="{{url($search->feature_image)}}">
                          <img src="{{url($search->feature_image)}}" class="product-image" alt="">
                        </a>  
                          @foreach ($search->gallery as $value)
                        <a  class="lot-img d-none" href="{{url($value->images)}}">
                          <img src="{{url($value->images)}}" class="product-image" alt="">
                        </a> 
                        @endforeach

                    <div class="all-card-photos">
                        <a  class="lot-img" href="#">
                        SEE ALL PHOTOS
                        </a>  
                    </div>
                      </main>
                    @else
                      <main class="lightgallery">
                        <a href="{{url($search->feature_image)}}">
                          <img src="{{url($search->feature_image)}}" class="product-image" alt="">
                        </a>
                          @foreach ($search->gallery as $value)
                        <a  class="lot-img d-none" href="{{url($value->images)}}">
                          <img src="{{url($value->images)}}" class="product-image" alt="">
                        </a> 
                        @endforeach

                      <div class="all-card-photos"><a href="#">SEE ALL PHOTOS</a></div>

                      </main>
                    @endif
			    </div>
			</div>
			<div class="card-content">
			    <div class="card-block">
				    <h4 class="card-title"><img src="{{check_file($search->brand_logo)}}" alt="">
                        @if($search->vehicleCondition=='wont-start')
                        <span data-trigger="hover" class="card-block__label label-red number p-1" rel="tooltip" title="The vehicle does not start and does not drive." data-content="Auction checked that the vehicle wouldn’t start or wasn’t tested yet. It is the buyer’s responsibility to accept it.
                        " >N</span>
                        @elseif($search->vehicleCondition=='starts')
                        <span  data-trigger="hover" class="card-block__label label-blue number p-1" rel="tooltip" title="The car starts but does not drive." data-content="
                        Auction verified that the vehicle started, and ran at idle. There is no guarantee that at the time of receiving the vehicle is in starts condition. It is the buyer’s responsibility to accept it
                        ">S</span>
                        @elseif($search->vehicleCondition=='runs')
                         <span  data-trigger="hover" class="card-block__label label-green number p-1" rel="tooltip" title="The vehicle starts and drives and which may imply that the car can only go one meter forward or one meter back." data-content="At the auction, the vehicle’s state is declared as Run and Drive - moving forward/backwards three feet under its own power. There is no guarantee that at the time of receiving the vehicle is in running condition and you can take it right away on highway. It is the buyer’s responsibility to accept it 
                        ">R</span>
                        @endif
                        
                       <a href="{{url(app()->getLocale().'/lotdetail/'.$search->id)}}"> {{isset($search->trading_date) ? date('Y', strtotime($search->trading_date)) : ''}}  {{$search->lot_title}}</a></h4>
                  
				    <div class="text-right">
                          @if(Auth::check())
                          <span class="book_mark fas fa-bookmark {{$search->bookmark==1?"active":''}} add_bookmark" data-lot="{{$search->id}}" data-id="{{isset(Auth::user()->id)?Auth::user()->id:''}}" data-bookmark="{{$search->bookmark==1?1:0}}"></span> 
                         @endif
				    	{{csrf_field()}}
				    </div>
				    <div class="details-list">
				        <div class="details-list__item mb-3">
                            <div class="details-list__label-wrap">
                                <div class="card-product__notify">Скопировано</div>
                               	<p class="details-list__label">VIN<span class="text-copy"> {{$search->vin}}</span></p>
                               	<span class="copy-value copy-btn"><img src="{{asset('/images/copy-icon.svg')}}" alt=""></span>
                            </div>       
                    	</div>
				        <div class="details-list__item mb-3">
                            <div class="details-list__label-wrap">
                                <div class="card-product__notify">Скопировано</div>
                                <p class="details-list__label">LOT<span class="text-copy"> {{$search->lot_no}}</span></p>
                                <span class="copy-value copy-btn"><img src="{{asset('/images/copy-icon.svg')}}" alt=""></span>
                            </div>     
                        </div>
                        <div class="details-list__item">
                            <p class="color_black f-bold"><img src="{{asset('/images/calendar-week-icon.png')}}" alt=""><span>{{isset($search->trading_date) ? date('F-d-Y H:i A' , strtotime($search->trading_date)) : ''}}</span></p>
                        </div>
                        <div class="details-list__item">
                            <p class="color_black f-bold"><img src="{{asset('/images/pin-icon.png')}}" alt=""><span>{{$search->locationName}}</span></p>
                        </div>
                        <div class="details-list__item">
                            <p class="color_black f-bold"><img src="{{asset('/images/car-crash-icon.png')}}" class="ml-md-n1" alt=""><span class="ml-lg-0">{{$search->primary_damage}}</span></p>
                        </div>
                        <div class="details-list__item">
                            <p class="color_black f-bold"><img src="{{asset('/images/speed-icon.png')}}" alt=""><span>{{$search->mileage}}</span></p>
                        </div>
				    </div>            
			    </div>
		    </div>
		    <div class="card-info-rate">
		        <div class="card-info-rate-timer countdown">
		            {{-- <div>0 <span>days</span></div>
		            <div>06 <span>Hour</span></div>
		            <div>45 <span>Min</span></div>
		            <div>33 <span>sec</span></div> --}}
		        </div>
		        @if ($search->buy_now>0)
    		        <div class="card-info-rate-price">
    		           	<p>${{$search->buy_now}} USD</p>
    		           	<span>@lang('main_section.buy_price')</span>
    		        </div>
                    @if(Auth::check())
    		        <div class="card-btn">
    				    <a href="" class="btn btn-register btn-dark-blue ">@lang('main_section.buy_now')</a>
    				</div>
                    @else
                    <div class="card-btn">
                        <a href="" data-toggle="modal" data-target="#loginModal" class="btn btn-register btn-dark-blue"><i class="fa fa-lock" aria-hidden="true"></i>  Buy Now</a>
                    </div>
                    @endif
				@else
				<div class="card-info-rate-price">
		            <!-- <p>${{check_starting_price($search,$search->id)}}USD</p> -->
		            <span>@lang('main_section.current_rate')</span>
		        </div>
                    @if(Auth::check())
                    
    		        <div class="card-btn">

    				   	<a href="{{url(app()->getLocale().'/lotdetail/'.$search->id)}}" class="btn btn-register btn-dark-blue ">@lang('main_section.place_bid')</a>
    				</div>
                    @else
                        <div class="card-btn">
                            <a href="{{url(app()->getLocale().'/lotdetail/'.$search->id)}}" data-toggle="modal" data-target="#loginModal" class="btn btn-register btn-dark-blue"><i class="fa fa-lock mr-2" aria-hidden="true"></i> @lang('main_section.place_bid')</a>
                        </div>
                    @endif
				@endif
		    </div>
	    </div>
	</div>
@endforeach
@else
<div class="col-12 col-lg content-search"><div class="empty-message-block"><span class="icon-xl icon-ic-search-empty gray"></span><div class="title">@lang('main_section.no_lots_found')</div><p>@lang('main_section.matching_your_search_criteria')</p></div><div></div><div class="modal fade" id="register-popup" tabindex="-1" role="dialog" aria-labelledby="register-popup-label" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="register-popup-label"><span class="icon-ic_info warning"></span>@lang('main_section.login_or_register')</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="icon-close"></span></button></div><div class="modal-body"><p>@lang('main_section.registered_users_only')</p></div><div class="modal-footer"><div class="footer-buttons-row"><a class="btn btn-primary w-100" href="/en/register">@lang('main_section.new_account')</a><a class="btn btn-secondary w-100" href="/en/login">@lang('main_section.login_now')</a></div></div></div></div></div><div class="notification-container notification-container-empty"><div></div></div></div>
@endif
<div class="modal fade" tabindex="-1" role="dialog" id="loginModal">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title">@lang('main_section.login_or_register')</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true" class="fal fa-times"></span>

        </button>

      </div>

      <div class="modal-body">

        <p class="war-message"></p>
        <div class="modal-body__decs">
            @lang('main_section.functionality_is_for_registered')
        </div>

      <div class="row">
        
        <div class="col-md-12">
        <a href="{{url(app()->getLocale().'/userregister')}}" class="btn-blue btn-red btn btn-primary w-100">@lang('main_section.create_new_account')</a>
        </div>
        <div class="col-md-12">
        <a href="{{url(app()->getLocale().'/login')}}" class="btn-blue btn btn-secondary btn-transparent w-100">@lang('main_section.login_now2')</a>
        </div>
     </div>
      </div>
    </div>
  </div>
</div>