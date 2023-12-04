@extends('frontend.layout.header')

@section('content')

<section class="section-main section-cabinet">

		<div class="">

			<div class="row">

				<div class="col-md-5 col-lg-3">

					@include('frontend.dashboard.sidebar')

				</div>

				<div class="col-md-7 col-lg-9">

					<div class="section-info section-invoce">

						@if ($data['deposit']->send==0)

							{{-- expr --}}

						<div class="invoce-top">

						<form action="{{url(app()->getLocale().'/senddeposit')}}" method="post">

							{{csrf_field()}}

							<div class="invoce-info">

								<h3>@lang('payment.view_account')</h3>

								<p>@lang('payment.amount_transfer')</p>

								<div class="check-wrap check-register">

							           <label for="check" class="chek-label">

									  <input type="checkbox" id="check" class="chek-styled" name="check" required>

									  <span class="checkmark"></span></label>

									  <p style="font-size: 14px;">@lang('payment.agree').</p>

							    </div>

							</div>

							<div class="invoce-btn">

								<input type="hidden" name="id" value="{{$data['deposit']->id}}">

								<button type="submit" class="btn btn-register btn-dark-blue">@lang('payment.confirm')</button>

							</div>

							</form>

						</div>

						@endif


						<div class="invoce-center {{$data['deposit']->send==1?'':'d-none'}}" >

							<div class="invoce-document printinvoice">

								<h2>@lang('payment.invoice')</h2>

								<div class="">

									@if($data['deposit']->payment_method=='Bank Transfer')

										{{-- expr --}}

									<p><strong>@lang('payment.wire_instruction')</strong></p>

									<table>

										<tr>

											<td><strong>@lang('payment.bank_name')</strong></td>

											<td>{{get_settings()->bank_name}}</td>

										</tr>

										<tr>

											<td><strong>@lang('payment.bank_address')</strong></td>

											<td>{{get_settings()->bank_address}}</td>

										</tr>

										<tr>

											<td><strong>@lang('payment.swift')</strong></td>

											<td>{{get_settings()->swift}}</td>

										</tr>

										<tr>

											<td><strong>@lang('payment.routing')</strong></td>

											<td>{{get_settings()->routing_no}}</td>

										</tr>

										<tr>

											<td><strong>@lang('payment.accounting')</strong></td>

											<td>{{get_settings()->account_no}}</td>

										</tr>

										<tr>

											<td></td>

											<td></td>

										</tr>

										<tr>

											<td><strong>@lang('payment.beneficary_name')</strong></td>

											<td>{{get_settings()->beneficiary_name}}</td>

										</tr>

									</table>

									@elseif($data['deposit']->payment_method=='Credit Card')

									<table>

										<tr>

											<td><strong>@lang('payment.card_number')</strong></td>

											<td>{{$data['deposit']->card_number}}</td>

										</tr>

										<tr>

											<td><strong>@lang('payment.cvc')</strong></td>

											<td>{{$data['deposit']->cvc}}</td>

										</tr>

										<tr>

											<td><strong>@lang('payment.swift')</strong></td>

											<td>{{$data['deposit']->card_expiry}}</td>

										</tr>

										

										<tr>

											<td><strong>@lang('payment.beneficary_name')</strong></td>

											<td>{{Auth::user()->name}}</td>

										</tr>

									</table>

									@endif



									<hr>

									<div class="row document-row mb-4">

										<div class="col-md-4">

											<p><strong>@lang('payment.date')</strong></p>

											<p>{{$data['deposit']->created_at->format('Y-m-d')}}</p>

										</div>

										<div class="col-md-4">

											<p><strong>@lang('payment.invoice_no')</strong></p>

											<p>{{$data['deposit']->transaction_no}}</p>

										</div>

										<div class="col-md-4">

											<p><strong>@lang('payment.invoice_to')</strong></p>

											<p>{{Auth::user()->name}}<br>

												{{Auth::user()->email}}</p>

										</div>

									</div>

									<br>

									<br>

									<div class="document-row space-between d-flex">

										<p><strong>@lang('payment.description')</strong></p>

										<p><strong>@lang('payment.amount')</strong></p>

									</div>

									<hr>
									
									<div class="document-row space-between d-flex">

										<p class="color-red"><strong>@lang('payment.security_deposit')</strong></p>

										<p class="color-red"><strong>${{$data['deposit']->amount}} USD</strong></p>

									</div>

									<hr>

									<div class="document-row space-between d-flex">

										<p class="color-red"><strong>@lang('payment.wire_fee')</strong></p>

										<p class="color-red"><strong>$@lang('payment.price') USD</strong></p>

									</div>
									<hr>

									<div class="document-row flex-end d-flex">

										<p><strong>@lang('payment.subtotal')</strong></p>

										<p class="color-red"><strong>${{$data['deposit']->amount}} USD</strong></p>

									</div>

									

									<div class="document-row flex-end d-flex">

										<p><strong>@lang('payment.total')</strong></p>
										@php
											$bank_comission = 25;
											$deposit = $data['deposit']->amount;
											$total = $deposit + 25;											
										@endphp
										<p class="color-red"><strong>$<span class="total"><?php echo $total?></span> USD</strong></p>


									</div>
									<div class="document-row flex-end d-flex mt-5">
									
									<p><img src="{{url('/public/images/stamp.jpg')}}" width="100px"></p>
									</div>

								</div>



							</div>

							<a href="javascript:void(0)" class="download-btn printPage">

									<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;@lang('payment.ms_filter'):;"><path d="M19 7h-1V2H6v5H5c-1.654 0-3 1.346-3 3v7c0 1.103.897 2 2 2h2v3h12v-3h2c1.103 0 2-.897 2-2v-7c0-1.654-1.346-3-3-3zM8 4h8v3H8V4zm8 16H8v-4h8v4zm4-3h-2v-3H6v3H4v-7c0-.551.449-1 1-1h14c.552 0 1 .449 1 1v7z"></path><path d="M14 10h4v2h-4z"></path></svg>

								</a>

							<div class="invoce-download">
								<a href="{{ url(app()->getLocale().'/generatepdf').'/'.$data['deposit']->id }}" class="download-btn ">
									<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;@lang('payment.ms_filter'):;"><path d="m12 16 4-5h-3V4h-2v7H8z"></path><path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path></svg>
								</a>

							</div>

						</div>


					</div>

				</div>

			</div>

		</div>

		
	</section>

@endsection	

@section('js')

 <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>

<script type="text/javascript">

	 $('a.printPage').click(function(){

    $(".printinvoice").print();

    return false;

});

	 @if($data['type']=="print")

       $("a.printPage").trigger('click');

    @endif

	$(document).ready(function(){

 

	});

	$('input[type=checkbox]').change(function () {
     if($(this).is(":checked")){
     	$('.invoce-center').removeClass('d-none');
    
  	} else if($(this).is(":not(:checked)")){
     	$('.invoce-center').addClass('d-none');

  }	
});



</script>

@endsection



