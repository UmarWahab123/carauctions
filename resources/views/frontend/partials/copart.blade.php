<div class="row">

<div class="col-12 col-xl-6 order-first">

<p><strong>@lang('fees.copart_buy_fee')</strong></p>

<p class="mb-md-5">

@lang('fees.buyer_fee_text')

</p>

</div>

<div class="col-12 col-xl-6 order-xl-3">

<table class="table mb-5">

<thead>

<tr>

<th><p class="title-lg">@lang('fees.sale_price')
</p></th>

<th><p class="title-sm">@lang('fees.standard_price')</p></th>

</tr>

</thead>

<tbody>

@foreach($data['coparts'] as $key=>$row)

<tr>
	<td>${{$row->sale_price_start}} @if(!empty($row->sale_price_end))- ${{$row->sale_price_end}}@endif</td>
	<td>${{$row->standard_fee}}</td>
</tr>

@endforeach


</tbody>

</table>

</div>

<div class="col-12 col-xl-6 order-xl-2">

<p><strong>@lang('fees.virtual_bid')</strong></p>

<p class="mb-md-5">

@lang('fees.virtual_bid_text')

</p>

</div>

<div class="col-12 col-xl-6 order-xl-4">

<table class="table mb-4 mb-md-5">

<thead>

<tr>

<th><p class="title-lg">@lang('fees.sale_price')</p></th>

<th><p class="title-md">@lang('fees.pre_bid_fee')</p></th>

<th><p class="title-md">@lang('fees.live_bid_fee')</p></th>

</tr>

</thead>

<tbody>

@foreach($data['copart_sub'] as $key=>$row)

<tr>
	<td>${{$row->sale_price_start}}  @if(!empty($row->sale_price_end))- ${{$row->sale_price_end}}@endif</td>
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

<p class="title">@lang('fees.gate_feee'): $@lang('fees.per_unit')</p>

<p>@lang('fees.include_text')</p>

</div>

<p><strong>@lang('fees.fee_gate')</strong></p>

<p class="mb-5">

@lang('fees.fee_gate_text')

</p>

<p><strong>@lang('fees.late_fee')</strong></p>

<p>

@lang('fees.late_fee_text')

</p>

<p>

<span class="font-weight-bold">@lang('fees.important')</span>

@lang('fees.important_text')

</p>

</div>

</div>