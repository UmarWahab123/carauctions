<!DOCTYPE html>

<html>

<head>

    <title>@lang('payment.invoice')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet"  href="{{asset('/frontend/css/app.min.css')}}" >

</head>

<body>

  <div class="invoce-center">

                            <div class="invoce-document printinvoice">

                                <h2>@lang('payment.invoice')</h2>

                                <div class="">

                                    @if($data['deposit']->payment_method=='Bank Transfer')

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

                                      <table class="table table-borderless">

                                      <thead>

                                        <tr>

                                          <th scope="col"><strong>@lang('payment.date')</strong></th>

                                          <th scope="col"><strong>@lang('payment.invoice_no')</strong></th>

                                          <th scope="col"><strong>@lang('payment.invoice_to')</strong></th>

                                        </tr>

                                      </thead>

                                          <tbody>

                                            <tr>

                                              <th scope="row">{{$data['deposit']->created_at->format('Y-m-d')}}</th>

                                              <td>{{$data['deposit']->transaction_no}}</td>

                                              <td>{{Auth::user()->name}}<br>

                                                {{Auth::user()->email}}</td>

                                            </tr>

                                           

                                          </tbody>

                                    </table>

                                    <br>

                                    <br>

                                    <table class="table table-bordered">

                                    <thead>

                                        <tr>

                                            <th class="per70 text-center" colspan="2">@lang('payment.description')</th>

                                            <th class="per25 text-center">@lang('payment.amount')</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>

                                            <td colspan="2">@lang('payment.security_deposit')</td>

                                            <td class="text-center">${{$data['deposit']->amount}} USD</td>

                                        </tr>

                                       

                                    </tbody>

                                    <tfoot>

                                        <tr>

                                            <th colspan="2" class="text-right">@lang('payment.subtotal'):</th>

                                            <th class="text-center">${{$data['deposit']->amount}} USD</th>

                                        </tr>

                                        <tr>

                                            <th colspan="2" class="text-right">@lang('payment.total'):</th>

                                            <th class="text-center">${{$data['deposit']->amount}} USD</th>

                                        </tr>

                                    </tfoot>

                                </table>

                                   

                                </div>

                            </div>

                            <div class="document-row flex-end d-flex text-right mt-3">
                                <p><img src="{{url('/public/images/stamp.jpg')}}" width="100px"></p>
                            </div>
                         
                        </div>

</body>

</html>