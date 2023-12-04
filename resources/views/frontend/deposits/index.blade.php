@extends('frontend.layout.header')
@section('content')
<section class="section-main section-cabinet pb-70">
		<div class="">
			<div class="row">
				<div class="col-md-5 col-lg-3">
					<div class="section-sidebar">
						@include('frontend.dashboard.sidebar')
					</div>
				</div>
				<div class="col-md-7 col-lg-9">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-white">
                                <div class="card-body px-sm-70 pb-5">
                                    <h4 class="card-title h4-style text-left">@lang('deposits.choose_payment')</h4>
                               <div class="card-tabs">
                                    	 <nav>
						                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						                      <a class="nav-item nav-link methodtype d-none" data-type="Credit Card" id="nav-home-tab" data-toggle="tab" href="#nav-credit" role="tab" aria-controls="nav-home-tab" aria-selected="true"><span class="fal fa-credit-card"></span>@lang('deposits.credit_card')</a>
						                      <a class="nav-item nav-link active methodtype" id="nav-profile-tab" data-toggle="tab" href="#nav-transfer" role="tab" data-type="Bank Transfer" aria-controls="nav-profile-tab" aria-selected="false"><span class="fal fa-university"></span>@lang('deposits.bank_transfer')</a>
						                    </div>
						                  </nav>
						    <form action="{{ url(app()->getLocale().'/savedeposit') }}" method="post">
						    	{{csrf_field()}}
						       <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
						      <div class="tab-pane fade " id="nav-credit" role="tabpanel" aria-labelledby="nav-home-tab">
						   <div class="col-md-12 mt-5">
							<div class=" step-2">
                                <div class="">
                                    <h4 class="card-title h4-style text-left">@lang('deposits.your_credit') USD</h4>
                                    <span class="font-small">@lang('deposits.accounting').</span>
                                    <div class="card-tabs">
					                      	<div class="row">
					                      		<div class="col-md-12">
					                      			<div class="card-price-tab mt-5 mb-5 valid">
								                      	<span class="fal fa-credit-card mr-2"></span>
								                      	<input type="text" placeholder="0000 0000 0000 0000" name="card_number" maxlength="16">
								                     </div>
					                      		</div>
					                      		<div class="col-md-4">
					                      			<div class="form-proup card-input">
					                      				<label for="">@lang('deposits.valid_until')</label>
					                      				<input type="text" placeholder="00 / 00" name="card_expiry" maxlength="5">
					                      			</div>
					                      		</div>
					                      		<div class="col-md-4">
					                      			<div class="form-proup card-input">
					                      				<label for="">@lang('deposits.cvc')</label>
					                      				<input type="password" class="valid" name="cvc" maxlength="3">
					                      			</div>
					                      		</div>
					                      		<div class="col-md-4">
					                      			<div class="form-proup card-input">
					                      				<label for="">@lang('deposits.index')</label>
					                      				<input type="text" name="index">
					                      			</div>
					                      		</div>
					                      		<div class="col-md-12">
					                      			<div class="check-wrap">
					                      				<label for="check" class="chek-label">
														  <input type="checkbox" id="check" class="chek-styled">
														  <span class="checkmark"></span></label>
														  <p>@lang('deposits.agree').</p>
					                      			</div>
					                      		</div>
					                      	</div>
                                    </div>
                                </div>
                            </div>
						</div>
						                    </div>
						        <div class="tab-pane fade show active" id="nav-transfer" role="tabpanel" aria-labelledby="nav-profile-tab">
                                </div>
                           </div>
                            <h4 class="card-title h4-style text-left mt-5">@lang('deposits.amount')</h4>
						           <p>@lang('deposits.enter_amount').</p>
							         <div class="card-price-tab sidebar-nav">
								         <span class="fal fa-dollar-sign"></span>
								         <input class="amount" type="text" placeholder="200" name="amount" required>
							        </div>
							        <div>
							        </div>
							        	<span class="amount-error text-danger d-none"> @lang('deposits.deposit_amount') USD</span>
                                    <p class="mt-4 mb-5 depositstatus d-none">@lang('deposits.top_deposit') $ <span class="deposit_amount"></span> USD. @lang('deposits.after_replacement') $ <span class="deposit_amount"></span>USD.  @lang('deposits.amount_allow') $ <span class="deposit_limit"></span> USD.</p>
                                   <button type="submit" class="btn btn-dark-blue btn-w-short submitbutton mt-2" disabled>@lang('deposits.farther')</button>
                                   <input type="hidden" name="payment_method" value="Bank Transfer">
                                   <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						     </form>
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
    $('.deposits').addClass('activetab');
 	$(document).on('click','.methodtype',function(){
      var type=$(this).attr('data-type');
     $('input[name=payment_method]').val(type);
   	});
   	$(document).on('keyup','.amount',function(){
    var amount=$('input[name=amount]').val();
     var depositlimit=amount*10;
    // alert(amount);
    if(amount<600){
	  $('.submitbutton').addClass("d-none");
      $('.amount-error').removeClass("d-none");
      $('.depositstatus').addClass("d-none");
    }else{
    	 $('.amount-error').addClass("d-none");
    	  $('.submitbutton').removeClass("d-none");
    	  $('.submitbutton').removeAttr("disabled");

    	  $('.depositstatus').removeClass("d-none");
    	  $('.deposit_amount').html(amount);
    	  $('.deposit_limit').html(depositlimit);
    }
   	});
 });
</script>
@endsection