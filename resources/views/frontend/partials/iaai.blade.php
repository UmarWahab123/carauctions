  <div class="row">

<div class="col-12 col-xl-6 order-first">

<p><strong>@lang('fees.iaai_buyer_fee')</strong></p>

<p class="mb-md-5">

@lang('fees.iaai_buyer_text')

</p>

</div>

<div class="col-12 col-xl-6 order-xl-3">

<table class="table mb-5">

<thead>

<tr>

<th><p class="title-lg">@lang('fees.sale_price') IAAI</p></th>

<th><p class="title-sm">@lang('fees.standard_fee')</p></th>

<th><p class="title-sm">@lang('fees.heavy_fee')</p></th>

</tr>

</thead>

<tbody>

@foreach($data['iaai'] as $key=>$row)

<tr>
	<td>${{$row->sale_price_start}}
	 @if(!empty($row->sale_price_end))- ${{$row->sale_price_end}}@endif
	</td>
	<td>${{$row->standard_fee}}</td>
	<td>${{$row->heavy_fee}}</td>
</tr>

@endforeach

</tbody>

</table>

</div>

<div class="col-12 col-xl-6 order-xl-2">

<p><strong>@lang('fees.internet_bid_fee')</strong></p>

<p class="mb-md-5">

@lang('fees.internet_bid_text')

</p>

</div>

<div class="col-12 col-xl-6 order-xl-4">

<table class="table mb-4 mb-md-5">

<thead>

<tr>

<th><p class="title-lg">@lang('fees.sale_price') IAAI</p></th>

<th><p class="title-md">@lang('fees.proxy_bid_fee')</p></th>

<th><p class="title-md">@lang('fees.live_bid_fee')</p></th>

</tr>

</thead>

<tbody>
@foreach($data['iaai_sub'] as $key=>$row)
	
<tr>
	<td>${{$row->sale_price_start}} @if(!empty($row->sale_price_end))- ${{$row->sale_price_end}}@endif</td>
	<td>
		@if(!empty($row->prebid_proxy_fee))
			${{$row->prebid_proxy_fee}}
		@else
		-
		@endif
	</td>
	<td>
		@if(!empty($row->live_fee))
			${{$row->live_fee}}
		@else
		-
		@endif

	</td>
</tr>

@endforeach

</tbody>

</table>

</div>

<div class="col-12 order-5">

<div class="tab-info-marked">

<p class="title">@lang('fees.service_fee'): $@lang('fees.service_fee_unit')</p>

<p>@lang('fees.service_fee_text')</p>

</div>

<p><strong>@lang('fees.fee_service')</strong></p>

<p class="mb-5">

@lang('fees.fee_service_text')

</p>

</div>