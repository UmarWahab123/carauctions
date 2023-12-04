@extends('../../layout.header')

@section('title','Role Access')

@section('content')
    <form id="role_access_form" class="card p-5" method="post" action="{{ url(app()->getLocale().'/admin/saveroleaccess') }}">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">{{$data['page_title']}}</h3>
            </div>
            <div class="pull-right">
                <div class="form-group m-form__group">
                    <button type="submit" class="btn btn-primary">@lang('roles.save')</button>
                </div>
            </div>
        </div>
    </div>
        {{ csrf_field() }}
        <div class="m-content">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group" >
                    <select required class="form-control"  name="role_id" data-live-search="true">
                        <option value="">Select Role</option>
                        @foreach ($data['roles'] as $row)
                            <option  value="{{$row->id}}"> {{$row->role_title}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_3">
            <div class="m-portlet__head d-none">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text"> @lang('roles.user_role')</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="#" m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-angle-down"></i></a>
                        </li>
                        <li class="m-portlet__nav-item">
                            <a href="#" m-portlet-tool="fullscreen" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-expand"></i></a>
                        </li>
                        <li class="m-portlet__nav-item hide">
                            <a href="#" m-portlet-tool="remove" class="m-portlet__nav-link m-portlet__nav-link--icon btn-removeaccount"><i class="la la-close"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <ul class="treeview">
                    <li>
                        <a href="javascript:void(0)">@lang('roles.user')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="user|saveuser" name="role_access[]" value="user|saveuser" {{in_array("user|saveuser", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usaveuser" name="role_access[]" value="usaveuser" {{in_array("usaveuser", $data['access']) ?
                        'checked' : ''}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deleteuser" name="role_access[]" value="deleteuser" {{in_array("deleteuser", $data['access']) ?
                        'checked' : ''}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="users" name="role_access[]" value="users" {{in_array("users", $data['access']) ?
                        'checked' : ''}}> @lang('roles.view')<<span></span></label> </a></li>
                         <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="userprofile" name="role_access[]" value="userprofile" {{in_array("userprofile", $data['access']) ?
                        'checked' : ''}}> @lang('roles.detail')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="purchasedhistory" name="role_access[]" value="purchasedhistory" {{in_array("purchasedhistory", $data['access']) ?
                        'checked' : ''}}> @lang('roles.purchased_history')<span></span></label> </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">@lang('roles.roles')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="role|saverole" name="role_access[]" value="role|saverole" {{in_array("role|saverole", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usaverole" name="role_access[]" value="usaverole" {{(isset($data['access']) ? (in_array("usaverole", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deleterole" name="role_access[]" value="deleterole" {{(isset($data['access']) ? (in_array("deleterole", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="roles" name="role_access[]" value="roles" {{(isset($data['access']) ? (in_array("roles", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="role_access|saveroleaccess" name="role_access[]" value="role_access|saveroleaccess" {{(isset($data['access']) ? (in_array("role_access|saveroleaccess", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.role_access')<span></span></label> </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">@lang('roles.auction')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="auction|saveauction" name="role_access[]" value="auction|saveauction" {{in_array("auction|saveauction", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usaveauction" name="role_access[]" value="usaveauction" {{(isset($data['access']) ? (in_array("usaveauction", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deleteauction" name="role_access[]" value="deleteauction" {{(isset($data['access']) ? (in_array("deleteauction", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="auctions" name="role_access[]" value="auctions" {{(isset($data['access']) ? (in_array("auctions", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label></a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="auctiondetail" name="role_access[]" value="auctiondetail" {{in_array("auctiondetail", $data['access']) ?
                        'checked' : ''}}> @lang('roles.detail')<span></span></label> </a></li>
                        </ul>
                    </li>
                      <li>
                        <a href="javascript:void(0)">@lang('roles.lots')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="lot|savelot" name="role_access[]" value="lot|savelot" {{in_array("lot|savelot", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usavelot" name="role_access[]" value="usavelot" {{(isset($data['access']) ? (in_array("usavelot", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deletelot" name="role_access[]" value="deletelot" {{(isset($data['access']) ? (in_array("deletelot", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="lots" name="role_access[]" value="lots" {{(isset($data['access']) ? (in_array("lots", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="lotdetail" name="role_access[]" value="lotdetail" {{in_array("lotdetail", $data['access']) ?
                        'checked' : ''}}> @lang('roles.detail')<span></span></label> </a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:void(0)">@lang('roles.models')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="model|savemodel" name="role_access[]" value="model|savemodel" {{in_array("model|savemodel", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usavemodel" name="role_access[]" value="usavemodel" {{(isset($data['access']) ? (in_array("usavemodel", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deletemodel" name="role_access[]" value="deletemodel" {{(isset($data['access']) ? (in_array("deletemodel", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="models" name="role_access[]" value="models" {{(isset($data['access']) ? (in_array("models", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        </ul>
                    </li>
                        <li>
                        <a href="javascript:void(0)">@lang('roles.makes')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="make|savemake" name="role_access[]" value="make|savemake" {{in_array("make|savemake", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usavemake" name="role_access[]" value="usavemake" {{(isset($data['access']) ? (in_array("usavemake", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deletemake" name="role_access[]" value="deletemake" {{(isset($data['access']) ? (in_array("deletemake", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="makes" name="role_access[]" value="makes" {{(isset($data['access']) ? (in_array("makes", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">@lang('roles.copart')</a>
                        <ul>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="copart|savecopart" name="role_access[]" value="copart|savecopart" {{in_array("copart|savecopart", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usavecopart" name="role_access[]" value="usavecopart" {{(isset($data['access']) ? (in_array("usavecopart", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deletecopart" name="role_access[]" value="deletecopart" {{(isset($data['access']) ? (in_array("deletecopart", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="coparts" name="role_access[]" value="coparts" {{(isset($data['access']) ? (in_array("coparts", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        </ul>
                    </li>
                     <li>
                     <a href="javascript:void(0)">@lang('roles.iaai')</a>
                        <ul>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="iaai|saveiaai" name="role_access[]" value="iaai|saveiaai" {{in_array("iaai|saveiaai", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usaveiaai" name="role_access[]" value="usaveiaai" {{(isset($data['access']) ? (in_array("usaveiaai", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deleteiaai" name="role_access[]" value="deleteiaai" {{(isset($data['access']) ? (in_array("deleteiaai", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="iaais" name="role_access[]" value="iaais" {{(isset($data['access']) ? (in_array("iaais", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        </ul>
                    </li>
                      <li>
                     <a href="javascript:void(0)">@lang('roles.shipping')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="add_shipping|saveshipping" name="role_access[]" value="add_shipping|saveshipping" {{in_array("add_shipping|saveshipping", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usaveshipping" name="role_access[]" value="usaveshipping" {{(isset($data['access']) ? (in_array("usaveshipping", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deleteshipping" name="role_access[]" value="deleteshipping" {{(isset($data['access']) ? (in_array("deleteshipping", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="view_shippment" name="role_access[]" value="view_shippment" {{(isset($data['access']) ? (in_array("view_shippment", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        </ul>
                    </li>
                       <li>
                     <a href="javascript:void(0)">@lang('roles.ground_shipping')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="addground_shipping|savegroundshipping" name="role_access[]" value="addground_shipping|savegroundshipping" {{in_array("addground_shipping|savegroundshipping", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label></a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usavegroundshipping" name="role_access[]" value="usavegroundshipping" {{(isset($data['access']) ? (in_array("usavegroundshipping", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deletegroundshipping" name="role_access[]" value="deletegroundshipping" {{(isset($data['access']) ? (in_array("deletegroundshipping", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="ground_shipping" name="role_access[]" value="ground_shipping" {{(isset($data['access']) ? (in_array("ground_shipping", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        </ul>
                    </li>
                    <li>
                     <a href="javascript:void(0)">@lang('roles.ocean_shipping')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="addocean_shipping|saveoceanshipping" name="role_access[]" value="addocean_shipping|saveoceanshipping" {{in_array("addocean_shipping|saveoceanshipping", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label></a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usaveoceanshipping" name="role_access[]" value="usaveoceanshipping" {{(isset($data['access']) ? (in_array("usaveoceanshipping", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deleteoceanshipping" name="role_access[]" value="deleteoceanshipping" {{(isset($data['access']) ? (in_array("deleteoceanshipping", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="ocean_shipping" name="role_access[]" value="ocean_shipping" {{(isset($data['access']) ? (in_array("ocean_shipping", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        </ul>
                    </li>
                      <li>
                     <a href="javascript:void(0)">@lang('roles.email_template')</a>
                        <ul>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="templetes|savetemplete" name="role_access[]" value="templetes|savetemplete" {{in_array("templetes|savetemplete", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usavetemplete" name="role_access[]" value="usavetemplete" {{(isset($data['access']) ? (in_array("usavetemplete", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deletetemplete" name="role_access[]" value="deletetemplete" {{(isset($data['access']) ? (in_array("deletetemplete", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                            <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="templete" name="role_access[]" value="templete" {{(isset($data['access']) ? (in_array("templete", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        </ul>
                    </li>
                       <li>
                     <a href="javascript:void(0)">@lang('roles.faq')</a>
                        <ul>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="faq|savefaq" name="role_access[]" value="faq|savefaq" {{in_array("faq|savefaq", $data['access']) ?
                        'checked' : ''}}> @lang('roles.add')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="usavefaq" name="role_access[]" value="usavefaq" {{(isset($data['access']) ? (in_array("usavefaq", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.edit')<span></span></label> </a></li>
                         <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deletefaqs" name="role_access[]" value="deletefaqs" {{(isset($data['access']) ? (in_array("deletefaqs", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.delete')<span></span></label> </a></li>
                         <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="faqs" name="role_access[]" value="faqs" {{(isset($data['access']) ? (in_array("faqs", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.view')<span></span></label> </a></li>
                        </ul>
                    </li>
                    <li>
                     <a href="javascript:void(0)">@lang('roles.cars')</a>
                        <ul>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="bids" name="role_access[]" value="bids" {{(isset($data['access']) ? (in_array("bids", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.bids')<span></span></label> </a></li>
                         <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="approvebid" name="role_access[]" value="approvebid" {{(isset($data['access']) ? (in_array("approvebid", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.approve_bids')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="bidstatus" name="role_access[]" value="bidstatus" {{(isset($data['access']) ? (in_array("bidstatus", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.update_bids')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="filter_bids" name="role_access[]" value="filter_bids" {{(isset($data['access']) ? (in_array("filter_bids", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.filter_bids')<span></span></label> </a></li>
                         <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="buynow" name="role_access[]" value="buynow" {{(isset($data['access']) ? (in_array("buynow", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.bids_buy_now')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="approvebuynow" name="role_access[]" value="approvebuynow" {{(isset($data['access']) ? (in_array("approvebuynow", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.approve_request')<span></span></label> </a></li>
                         <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="rejectrequest" name="role_access[]" value="rejectrequest" {{(isset($data['access']) ? (in_array("rejectrequest", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.rejected_request')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="buynowstatus" name="role_access[]" value="buynowstatus" {{(isset($data['access']) ? (in_array("buynowstatus", $data['access']) ?
                        'checked' : '') : '')}}> @lang('roles.update_buy_now')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="purchased" name="role_access[]" value="purchased" {{(isset($data['access']) ? (in_array("purchased", $data['access']) ?
                        'checked' : '') : '')}}>@lang('roles.purchased_history')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deposits" name="role_access[]" value="deposits" {{(isset($data['access']) ? (in_array("deposits", $data['access']) ?
                        'checked' : '') : '')}}>@lang('roles.deposit')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="depositdetail" name="role_access[]" value="depositdetail" {{(isset($data['access']) ? (in_array("depositdetail", $data['access']) ?
                        'checked' : '') : '')}}>@lang('roles.deposit_detail')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deletedeposit" name="role_access[]" value="deletedeposit" {{(isset($data['access']) ? (in_array("deletedeposit", $data['access']) ?
                        'checked' : '') : '')}}>@lang('roles.delete_deposit')<span></span></label> </a></li>
                        </ul>
                    </li>
                        <li>
                     <a href="javascript:void(0)">@lang('roles.others')</a>
                        <ul>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="contactus" name="role_access[]" value="contactus" {{(isset($data['access']) ? (in_array("contactus", $data['access']) ?
                        'checked' : '') : '')}}><span>@lang('roles.contact_us')</span></label></a></li>
                         <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="deletecontactus" name="role_access[]" value="deletecontactus" {{(isset($data['access']) ? (in_array("deletecontactus", $data['access']) ?
                        'checked' : '') : '')}}><span>@lang('roles.contact_delete')</span></label> </a></li>
                         <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="add_seo" name="role_access[]" value="add_seo" {{(isset($data['access']) ? (in_array("add_seo", $data['access']) ?
                        'checked' : '') : '')}}>@lang('roles.seo')<span></span></label> </a></li>
                        <li><a href="javascript:void(0)"><label class="m-checkbox"><input type="checkbox" data-access="settings" name="role_access[]" value="settings" {{(isset($data['access']) ? (in_array("settings", $data['access']) ?
                        'checked' : '') : '')}}>@lang('roles.settings')<span></span></label> </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
      
    </div>
    </form>

@section('js')

        <?php
        $role_id="";
        if($data['role']){
            $role_id=$data['role']->id;
        }
        ?>

    <script type="text/javascript">
        $(document).ready(function () {

            $('select[name="role_id"]').val(<?=$role_id ?>);

            $('select[name=role_id]').change(function () {
                if ($(this).val() != "") {
                    var href="{{url(app()->getLocale().'/admin/role_access')}}/"+ $(this).val();
                    window.location=href;
                }
            });
      $('.usermgt').addClass('sidebar-group-active');
        $('.access').addClass('active');

        });
        var access = "<?=$data['role_access']?>";
        console.log(access);
        var accessList = access.split(',');
        //        var accessList = [];
        //        console.log(accessList);
        var $form = $('#role_access_form');

        for (var i = 0; i < accessList.length; i++) {
            //   var $elem = $("input[data-access*='" + accessList[i] + "']").prop("checked", true);
        }




        $.fn.extend({
            treeview: function () {
                return this.each(function () {
                    // Initialize the top levels;
                    var tree = $(this);

                    tree.addClass('treeview-tree');
                    tree.find('li').each(function () {
                        var stick = $(this);
                    });
                    tree.find('li').has("ul").each(function () {
                        var branch = $(this); //li with children ul

                        branch.prepend("<i class='tree-indicator fa fa-arrow-right'></i>");
                        branch.addClass('tree-branch');
                        branch.on('click', function (e) {
                            if (this == e.target) {
                                var icon = $(this).children('i:first');

                                icon.toggleClass("fa fa-arrow-down fa fa-arrow-right");
                                $(this).children().children().toggle();
                            }
                        })
                        branch.children().children().toggle();

                        /**
                         *	The following snippet of code enables the treeview to
                         *	function when a button, indicator or anchor is clicked.
                         *
                         *	It also prevents the default function of an anchor and
                         *	a button from firing.
                         */
                        branch.children('.tree-indicator, button, a').click(function (e) {
                            branch.click();

                            e.preventDefault();
                        });
                    });
                });
            }
        });
        var cbCount = 0;
        $('.treeview').treeview();


        $('.treeview input[type=checkbox]').each(function () {
            $(this).attr('data-index', cbCount++);

            var className = $(this).data('index') + "hidden";
            var $form = $('#role_access_form');

            if (this.checked) {

                var funcs = $(this).data('access').split('|');
                for (var i = 0, l = funcs.length; i < l; ++i) {
                    $form.append('<input type="hidden" name="access[]" value="' + funcs[i] + '" class="' + className + '">');
                }

            }
            else {
                $('.' + className).remove();
            }

        });

        $(document).on('change', '.treeview input[type=checkbox]', function () {

            var className = $(this).data('index') + "hidden";
            var $form = $('#role_access_form');

            if (this.checked) {

                var funcs = $(this).data('access').split('|');
                for (var i = 0, l = funcs.length; i < l; ++i) {
                    $form.append('<input type="hidden" name="access[]" value="'+funcs[i]+'" class="'+className+'">');
                }

            }
            else {
                $('.' + className).remove();
            }

        });





    </script>
@endsection
@endsection