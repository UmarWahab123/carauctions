@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
     <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper mb-2">
                                             <span class="brand-logo">
                                             <img src="{{asset('/')}}/images/logo.svg" alt="Global Motors" style="max-width: 200px" ></span>
                                            </div>
                                            <p class="card-text mb-25">Office 149, 450 South Brand Brooklyn</p>
                                            <p class="card-text mb-25">San Diego County, CA 91905, USA</p>
                                            <p class="card-text mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                                        </div>
                                        <div class="mt-md-0 mt-2">
                                            <h4 class="invoice-title">
                                                Invoice
                                                <span class="invoice-number">#{{$data['results']->invoice_no}}</span>
                                            </h4>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Date Issued:</p>
                                                <p class="invoice-date">25/08/2020</p>
                                            </div>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Due Date:</p>
                                                <p class="invoice-date">29/08/2020</p>
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
                                            <h6 class="mb-2">Invoice To:</h6>
                                            <h6 class="mb-25">Thomas shelby</h6>
                                            <p class="card-text mb-25">Shelby Company Limited</p>
                                            <p class="card-text mb-25">Small Heath, B10 0HF, UK</p>
                                            <p class="card-text mb-25">718-986-6062</p>
                                            <p class="card-text mb-0">peakyFBlinders@gmail.com</p>
                                        </div>
                                        <div class="col-xl-6 p-0 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Payment Details:</h6>
                                            <table>
                                                <tbody>
                                                   {{--  <tr>
                                                        <td class="pr-1">Total Due:</td>
                                                        <td><span class="font-weight-bold">$12,110.55</span></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td class="pr-1">Bank name:</td>
                                                        <td>{{$data['results']->bank_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Bank Address:</td>
                                                        <td>{{$data['results']->bank_address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Routing:</td>
                                                        <td>{{$data['results']->routing}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Account No:</td>
                                                        <td>{{$data['results']->account_no}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">SWIFT code:</td>
                                                        <td>{{$data['results']->swift}}</td>
                                                    </tr>
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
                                                <th class="py-1">SR No</th>
                                                <th class="py-1">Description</th>
                                                <th class="py-1 text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($data['item'] as $key=>$value)
                                        		<tr>
                                                <td class="py-1">{{$key+1}}</td>
                                                <td class="py-1">{{$value->description}}</td>
                                                <td class="py-1 text-right">
                                                    <span class="font-weight-bold">${{$value->amount}}</span>
                                                </td>
                                            </tr>
                                        	@endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body invoice-padding pb-0">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                            <p class="card-text mb-0">
                                                <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">Alfie Solomons</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Subtotal:</p>
                                                    <p class="invoice-total-amount">${{$data['results']->total}}</p>
                                                </div>
                                                <hr class="my-50" />
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Total:</p>
                                                    <p class="invoice-total-amount">${{$data['results']->total}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Description ends -->

                                <hr class="invoice-spacing" />

                                <!-- Invoice Note starts -->
                              
                                <!-- Invoice Note ends -->
                            </div>
                        </div>
                        <!-- /Invoice -->

                        <!-- Invoice Actions -->
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <a class="btn btn-outline-secondary btn-block mb-75" href="{{url('/admin/printinvoicedetail/'.$data['results']->id)}}" target="_blank">
                                        Print
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Actions -->
                    </div>
                </section>
@endsection
