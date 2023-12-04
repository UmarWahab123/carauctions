<table class="table-style">

								<tr>

									<td width="30%">@lang('payment.no')</td>

									<td>@lang('payment.dates')</td>

									<td>@lang('payment.sum')</td>

									<td>@lang('payment.status')</td>

									<td></td>

								</tr>

								@foreach ($data['results'] as $value)

									{{-- expr --}}

							

								<tr>

									<td width="30%">{{$value->transaction_no}}</td>

									<td width="30%">{{$value->created_at}}</td>

									<td width="30%">$ <strong>{{$value->amount}}</strong></td>

									<td>{{$value->status}}</td>

									<td>

										<div class="group-btn-interaction">

								<a href="{{ url(app()->getLocale().'/paymentdetail/'.$value->id) }}" class="download-btn-small">

									<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;@lang('payment.ms_filter'):;"><path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h16l.002 14H4z"></path><path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z"></path></svg>

								</a>

								<a href="{{ url(app()->getLocale().'/generatepdf').'/'.$value->id }}" class="download-btn-small">

									<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;@lang('payment.ms_filter'):;"><path d="m12 16 4-5h-3V4h-2v7H8z"></path><path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path></svg>

								</a>

								<a href="{{ url(app()->getLocale().'/paymentdetail/'.$value->id.'/'.'print')}}" class="download-btn-small">

									<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;@lang('payment.ms_filter'):;"><path d="M19 7h-1V2H6v5H5c-1.654 0-3 1.346-3 3v7c0 1.103.897 2 2 2h2v3h12v-3h2c1.103 0 2-.897 2-2v-7c0-1.654-1.346-3-3-3zM8 4h8v3H8V4zm8 16H8v-4h8v4zm4-3h-2v-3H6v3H4v-7c0-.551.449-1 1-1h14c.552 0 1 .449 1 1v7z"></path><path d="M14 10h4v2h-4z"></path></svg>

								</a>

							

							</div>

									</td>

								</tr>

							@endforeach

							</table>

							@php

							    $offset=(int)$data['offset'];

							    $per_page=(int)$data['per_page'];

								$total=$offset+$per_page;

								$entries=[];

								for($i=$offset; $i<=$total; $i++){

								    $entries[]=$i;

								}

								$start=$entries[0]==0 ? 1 : $entries[0];


							    $end=$entries[count($entries)-1];
							    if($end  > $data['total']){
							    $end=$data['total'];
							}

							@endphp

							<div class="text-right">

                                	<h5>{{$start}}-{{$end}} of {{$data['total']}}</h3>

                                </div>