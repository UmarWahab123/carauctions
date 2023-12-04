@extends('frontend.layout.header')


@section('content')



<section class="section-main section-cabinet pb-70">
    <div class="">
        <div class="row">
            <div class="col-md-5 col-lg-3">
                <div class="section-sidebar">
                    @include('frontend.dashboard.sidebar')
                </div>
            </div>
            <div class="col-md-7 col-lg-9">
                <div class="row card">
                    <table class="responsive table sticky-header" style="width: 100%!important">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="">
                                        <span class="">
                                            <img src="{{url('/')}}{{$data['results']->feature_image}}" class="new-shadow-all contest-item round-10">
                                        </span>
                                    </a>
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <a href="{{url(app()->getLocale().'/dealer/'.$data['results']->id)}}" class="btn btn-block btn-outline-primary mt-2">
                                                <span class="">@lang('dealer.edit')</span>
                                            </a>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>
                                                <i class="fas fa-gamepad"></i>
                                                <span class="">@lang('dealer.lot_title')</span>
                                            </label><br>
                                            <h3 class="zero"><b>
                                                <span class="darkgreen-color">{{$data['results']->lot_title}}</span>
                                                </b>
                                            </h3>
                                        </div>
                                        <div class="col-md-2">
                                            <label>
                                                <i class="fas fa-gamepad"></i>
                                                <span class="">@lang('dealer.body_style')</span>
                                            </label><br>
                                            <span class=" green-color fsize13">
                                            {{$data['results']->body_style}}
                                             </span>
                                        </div>
                                        <div class="col-md-2">
                                            <label>
                                                <i class="fas fa-users"></i>
                                                <span class="">@lang('dealer.color')</span>
                                            </label><br>
                                            <span class=" green-color fsize13 ">
                                            {{$data['results']->color}}
                                            </span>
                                        </div>
                                        <div class="col-md-2">
                                            <label>
                                                <i class="fas fa-users"></i>
                                                <span class="">@lang('dealer.color')</span>
                                            </label><br>
                                            <span class=" green-color fsize13 ">
                                            {{$data['results']->color}}
                                            </span>
                                        </div>
                                        <div class="col-md-2">
                                            <label>
                                                <i class="fas fa-users"></i>
                                                <span class="">@lang('dealer.mileage')</span>
                                            </label><br>
                                            <span class=" green-color fsize13 ">
                                            {{$data['results']->mileage}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>
                                                <i class="fas fa-gamepad"></i>
                                                <span class="">@lang('dealer.cyclinder')</span>
                                            </label><br>
                                            <span class="green-color fsize13">{{$data['results']->cylinder}}</span>
                                        </div>
                                        <div class="col-md-2">
                                            <label>
                                                <i class="fas fa-gamepad"></i>
                                                <span class="">@lang('dealer.drive')</span>
                                            </label><br>
                                            <span class=" green-color fsize13">
                                            {{$data['results']->drive}}
                                            </span>
                                        </div>
                                        <div class="col-md-2">
                                            <label>
                                                <i class="fas fa-users"></i>
                                                <span class="">@lang('dealer.engine_type')</span>
                                            </label><br>
                                            <span class=" green-color fsize13 ">
                                            {{$data['results']->engine_type}}
                                            </span>
                                        </div>
                                        <div class="col-md-2">
                                            <label>
                                                <i class="fas fa-users"></i>
                                                <span class="">@lang('dealer.retail_value')</span>
                                            </label><br>
                                            <span class=" green-color fsize13 ">
                                            {{$data['results']->est_retail_value}}
                                            </span>
                                        </div>
                                        <div class="col-md-2">
                                            <label>
                                                <i class="fas fa-users"></i>
                                                <span class="">@lang('dealer.fuel')</span>
                                            </label><br>
                                            <span class=" green-color fsize13 ">
                                            {{$data['results']->fuel}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-money-bill-alt"></i>@lang('dealer.highlight')</label><br>
                                                            <h5 class="zero"><b>
                                                                <span class="darkgreen-color">{{$data['results']->highlights}}</span>
                                                                </b>
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.key')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->key}}</span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.lot_number')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->lot_no}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-money-bill-alt"></i>@lang('dealer.primary_damage')</label><br>
                                                            <h5 class="zero"><b>
                                                                <span class="darkgreen-color">
                                                                {{$data['results']->primary_damage}}</span>
                                                                </b>
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.secondary_damage')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->secondary_damage}}</span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.title_code')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->title_code}}</span>
                                                        </div>   
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.transmission')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->transmission}}</span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.odometer')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->odometer}}</span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.vechile_type')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->vehicle_type}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-money-bill-alt"></i> @lang('dealer.vin')</label><br>
                                                            <h5 class="zero"><b>
                                                                <span class="darkgreen-color">{{$data['results']->vin}}</span></b>
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.document_type')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->document_type}}</span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.repair_cost')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->repair_cost}}</span>
                                                        </div>
                                                            @if ($data['results']->starting_price>0)
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.starting_price')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->starting_price}}</span>
                                                        </div>  
                                                            @endif
                                                            
                                                            @if ($data['results']->buy_now>0)
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i> @lang('dealer.buy_now_price')</label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->buy_now}}</span>
                                                        </div>
                                                            @endif
                                                        <div class="col-md-4">
                                                            <label><i class="fas fa-file"></i>@lang('dealer.model') </label><br>
                                                            <span class="fsize13 blue-color font-weight-bold">{{$data['results']->model->name}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label><b>@lang('dealer.description')</b></label><br>
                                                            <span>{{$data['results']->description}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>@lang('dealer.lot_image')</h2>
                                        </div>
                                        @foreach($data['lotimages'] as $key=>$lotimage)
                                        <div class="col-md-3">
                                            <img src="{{url('')}}/{{$lotimage->images}}" style="height: 100px; width: 100px;">
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

