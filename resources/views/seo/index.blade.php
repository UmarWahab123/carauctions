@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<style>
.table-responsive {
    display: table !important;
}
</style>

@endsection

@section('content')

                <section id="basic-datatable">

                    <div class="row">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header border-bottom">

                                    <h4 class="card-title">{{$data['page_title']}}</h4>

                                    <a class="btn btn-primary" href="{{url(app()->getLocale().'/admin/add_seo')}}">@lang('seo.add_seo')</a>

                                </div>

                                <div class="card-datatable p-2">

                                    <table class="table dynamic_table  font-weight-bold table-responsive">

                                        <thead>

                                            <tr>
                                              <th>@lang('seo.sr_no')</th>
                                              <th>@lang('seo.site_name')</th>
                                              <th>@lang('seo.keyword')</th>
                                              <th>@lang('seo.meta_decription')</th>
                                              <th>@lang('seo.title')</th>
                                              <th>@lang('seo.image')</th>
                                              <th>@lang('seo.page')</th>
                                              <th>@lang('seo.action')</th>
                                            </tr>

                                        </thead>

                                       <tbody>
                                            @foreach($data['results'] as $key=>$row)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$row->site_name}}</td>
                                                <td>{{$row->keywords}}</td>
                                                <td>{{$row->meta_desc}}</td>
                                                <td>{{$row->title}}</td>
                                                <td><img src="{{url('/')}}{{$row->image}}" class="img-fluid" width="100px"></td>
                                                <td>{{$row->page}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{url(app()->getLocale().'/admin/add_seo/'.$row->id)}}">
                                                                <i data-feather="edit-2" class="mr-50"></i>
                                                                <span>@lang('seo.edit')</span>
                                                            </a>
                                                            <a data-href="{{url(app()->getLocale().'/admin/deleteseo/'.$row->id)}}"  data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                                                                <i data-feather="trash" class="mr-50"></i>
                                                                <span>@lang('seo.delete')</span>
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

        $('.seomgt').addClass('sidebar-group-active');

        $('.view_seo').addClass('active');

        $('.dynamic_table').DataTable();

    });

</script>



@endsection

