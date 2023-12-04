@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

@endsection

@section('content')

                <section id="basic-datatable">

                    <div class="row">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header border-bottom">

                                    <h4 class="card-title">@lang('copart.copart')</h4>

                                    <a class="btn btn-primary" href="{{url(app()->getLocale().'/admin/copart')}}">@lang('copart.add_copart')</a>

                                </div>

                                <div class="card-datatable p-2">

                                    <table class="table dynamic_table  font-weight-bold table-responsive">

                                        <thead>

                                            <tr>

                                              <th>@lang('copart.sr_no')</th>
                                              <th>@lang('copart.type')</th>
                                              <th>@lang('copart.sub_type')</th>
                                              <th>@lang('copart.sale_price')</th>
                                              <th>@lang('copart.sale_price_end')</th>
                                              <th>@lang('copart.standard_fee')</th>
                                              <th>@lang('copart.pre_bid_fee')</th>
                                              <th>@lang('copart.live_fee')</th>
                                              <th>@lang('copart.action')</th>
                                            </tr>

                                        </thead>

                                        <tbody>
                                            @foreach($data['results'] as $key=>$row)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$row->type}}</td>
                                                    <td>{{$row->sub_type}}</td>
                                                    <td>
                                                        @if(!empty($row->sale_price_start))
                                                            {{$row->sale_price_start}}$
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(!empty($row->sale_price_end))
                                                            {{$row->sale_price_end}}$
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(!empty($row->standard_fee))
                                                            {{$row->standard_fee}}$
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if(!empty($row->prebid_proxy_fee))
                                                            {{$row->prebid_proxy_fee}}$
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(!empty($row->live_fee))
                                                            {{$row->live_fee}}$
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/copart/'.$row->id)}}">
                                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                                    <span>@lang('copart.edit')</span>
                                                                </a>
                                                                <a data-href="{{url(app()->getLocale().'/admin/deletecopart/'.$row->id)}}"  data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                                                                    <i data-feather="trash" class="mr-50"></i>
                                                                    <span>@lang('copart.delete')</span>
                                                                </a>
                                                            </div>
                                                        </div>
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





<script type="text/javascript">

    $(document).ready(function() {

        $('.feemgt').addClass('sidebar-group-active');

        $('.copart').addClass('active');

        $('.dynamic_table').DataTable();

        $('.dynamic_table').on( 'draw.dt', function () {
            feather.replace();
        });

    });

</script>



@endsection

