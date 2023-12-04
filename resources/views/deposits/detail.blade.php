@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

@endsection

@section('content')

    <section class="invoice-preview-wrapper">

                    <div class="row invoice-preview">

                        <!-- Invoice -->

                        <div class="col-xl-9 col-md-8 col-12 printinvoice" >

                            <div class="card invoice-preview-card">

                                <div class="card-body invoice-padding pb-0">

                                    <!-- Header starts -->

                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">

                                        <div>

                                            <div class="logo-wrapper mb-2">

                                             <span class="brand-logo">

                                             <img src="{{asset('/')}}/images/logo.svg" alt="Global Motors" style="max-width: 200px" ></span>

                                            </div>

                                            <p class="card-text mb-25">@lang('deposit.office')</p>

                                            <p class="card-text mb-25">@lang('deposit.address')</p>

                                            <p class="card-text mb-0">@lang('deposit.phone')</p>

                                        </div>

                                        <div class="mt-md-0 mt-2">

                                            <h4 class="invoice-title">

                                                @lang('deposit.invoice')

                                                <span class="invoice-number">#{{(isset($data['results']->transaction_no) ? $data['results']->transaction_no : '')}}
                                                    </span>

                                            </h4>

                                            <div class="invoice-date-wrapper">

                                                <p class="invoice-date-title">@lang('deposit.date_issued'): 
                                                    {{(isset($data['results']->created_at) ? $data['results']->created_at : '')}}</p>

                                            </div>

                                            

                                        </div>

                                    </div>

                                    <!-- Header ends -->

                                </div>



                                <hr class="invoice-spacing" />



                                <!-- Address and Contact starts -->

                                <div class="card-body invoice-padding pt-0">

                                    <div class="row invoice-spacing">

                                        <div class="col-xl-6 p-0">

                                            <h6 class="mb-2">@lang('deposit.invoice_to'):</h6>

                                            <h6 class="mb-25"> {{(isset($data['results']->user->name) ? $data['results']->user->name : '')}}</h6>

                                            <p class="card-text mb-25"> {{(isset($data['results']->user->address) ? $data['results']->user->address : '')}}</p>

                                            <p class="card-text mb-25">

                                            {{(isset($data['results']->user->town) ? $data['results']->user->town : '')}}
                                            {{(isset($data['results']->user->city) ? $data['results']->user->city : '')}}
                                            {{(isset($data['results']->user->country) ? $data['results']->user->country : '')}}
                                            </p>

                                            <p class="card-text mb-25">{{(isset($data['results']->user->phone) ? $data['results']->user->phone : '')}}</p>

                                            <p class="card-text mb-0">{{(isset($data['results']->user->email) ? $data['results']->user->email : '')}}</p>

                                        </div>

                                        <div class="col-xl-6 p-0 mt-xl-0 mt-2">

                                            <h6 class="mb-2">@lang('deposit.payment_detail'):</h6>

                                            <table>

                                                <tbody>

                                                    <!-- <tr>

                                                        <td class="pr-1">@lang('deposit.payment_method')s:</td>

                                                        <td><span class="font-weight-bold">{{$data['results']->payment_method}} </span></td>

                                                    </tr> -->
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

                                                        <td><strong>@lang('payment.beneficary_name')</strong></td>

                                                        <td>{{get_settings()->beneficiary_name}}</td>

                                                    </tr>

                                                   <!--  @if ($data['results']->payment_method=="Credit Card")

                                                     <tr>

                                                        <td class="pr-1 mt-2">@lang('deposit.card_number'):</td>

                                                        <td>{{$data['results']->card_number}}</td>

                                                    </tr>

                                                    <tr>

                                                        <td class="pr-1">@lang('deposit.cvc'):</td>

                                                        <td>{{$data['results']->cvc}}</td>

                                                    </tr>

                                                    <tr>

                                                        <td class="pr-1">@lang('deposit.card_expiry'):</td>

                                                        <td>{{$data['results']->card_expiry}}</td>

                                                    </tr>


                                                   @elseif($data['results']->payment_method=="Bank Transfer")

                                                    <tr>

                                                        <td class="pr-1 mt-2">@lang('deposit.bank_name'):</td>

                                                        <td>{{$data['results']->bank_name}}</td>

                                                    </tr>

                                                    <tr>

                                                        <td class="pr-1">@lang('deposit.bank_address'):</td>

                                                        <td>{{$data['results']->bank_address}}</td>

                                                    </tr>

                                                    <tr>

                                                        <td class="pr-1">@lang('deposit.routing'):</td>

                                                        <td>{{$data['results']->routing}}</td>

                                                    </tr>

                                                    <tr>

                                                        <td class="pr-1">@lang('deposit.account_no'):</td>

                                                        <td>{{$data['results']->account_no}}</td>

                                                    </tr>

                                                    <tr>

                                                        <td class="pr-1">@lang('deposit.swift_code'):</td>

                                                        <td>{{$data['results']->swift}}</td>

                                                    </tr>

                                                     @endif -->

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                                <!-- Address and Contact ends -->



                                <!-- Invoice Description starts -->

                                <div class="table-responsive">

                                    <table class="table">

                                        <thead>

                                            <tr>

                                                <th class="py-1">@lang('deposit.sr_no')</th>

                                                <th class="py-1">@lang('deposit.description')</th>

                                                <th class="py-1 text-right">@lang('deposit.total')</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                        	<tr>

                                                <td class="py-1">1</td>

                                                <td class="py-1">@lang('deposit.security_deposit')</td>

                                                <td class="py-1 text-right">

                                                    <span class="font-weight-bold">${{$data['results']->amount}}</span>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td class="py-1">2</td>

                                                <td class="py-1">Wire Fee</td>

                                                <td class="py-1 text-right">

                                                    <span class="font-weight-bold">$25</span>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                                <div class="card-body invoice-padding pb-0">

                                    <div class="row invoice-sales-total-wrapper">

                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">

                                            {{-- <p class="card-text mb-0">

                                                <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">Alfie Solomons</span>

                                            </p> --}}

                                        </div>

                                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">

                                            <div class="invoice-total-wrapper">

                                                

                                                <hr class="my-50" />

                                                <div class="invoice-total-item">
                                                    @php
                                                        $bank_comission = 25;
                                                        $deposit = $data['results']->amount;
                                                        $total = $deposit + 25;                                         
                                                    @endphp
                                                    <p class="invoice-total-title font-weight-bold">@lang('deposit.total'): 
                                                        $<?php echo $total?></p>

                                                </div>
                                               <div class="document-row flex-end d-flex text-right">
                                <p><img src="{{url('/public/images/stamp.jpg')}}" width="100px"></p>
                            </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <hr class="invoice-spacing" />



                            </div>

                        </div>

                        <!-- /Invoice -->



                        <!-- Invoice Actions -->

                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">

                            <div class="card">

                                <div class="card-body">

                                    <a class="btn btn-outline-secondary btn-block mb-75 printPage" href="javascript:void(0);" target="_blank" >

                                        @lang('deposit.print')

                                    </a>

                                    

                                </div>

                            </div>

                        </div>

                        <!-- /Invoice Actions -->

                    </div>

@endsection