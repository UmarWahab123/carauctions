@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">



<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">



@endsection

@section('content')

    {{ csrf_field() }}

    <section id="basic-datatable">

                    <div class="row">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header border-bottom">

                                    <h4 class="card-title">@lang('contact.contact_us')</h4>

                                </div>

                                <div class="card-datatable p-2">

                                    <table class="table dynamic_table font-weight-bold">

                                        <thead>

                                             <tr role="row">

                                                <th>@lang('contact.s_no')</th>

                                                <th> @lang('contact.name')</th>

                                                <th> @lang('contact.email')</th>

                                                <th> @lang('contact.subject')</th>

                                                <th> @lang('contact.message')</th>

                                                <th> @lang('contact.action')</th>

                                                

                                             </tr>

                                        </thead>

                                        <tbody>

                                           @foreach($data['contact'] as $key=>$value)

                                         <tr>

                                        <td> {{$key+1}}</td>

                                        <td>{{$value->name}}</td>

                                        <td>{{$value->email}}</td>

                                        <td>{{$value->subject}}</td>

                                        <td>{{$value->message}}</td>

                                         <td> <a data-href="{{url(app()->getLocale().'/admin/deletecontactus/'.$value->id)}}" data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                                          <i data-feather="trash" class="mr-50"></i>
                                        </a>
                                     </td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>

 @include('includes.delete')





@endsection





@section('js')

<script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>



<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}">

@endsection

