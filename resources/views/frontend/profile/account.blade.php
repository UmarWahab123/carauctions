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

					<div class="row">



						<div class="col-md-12">

							<div class="card card-white">

                                <div class="card-body pb-5">

                                    <h4 class="card-title h4-style text-left">@lang('account.personal_information')</h4>

                                    <span class="font-small">@lang('account.use_only')</span>

                                    <div class="card-tabs">

					                      <form action="{{ url(app()->getLocale().'/updateprofile') }}" method="post">

					                      	{{csrf_field()}}

					                      	<div class="row">

					                      		<div class="col-md-12 mt-5">

					                      			<div class="form-proup card-input">

					                      				<label for="">@lang('account.first_name')</label>

					                      				<input type="text" placeholder="Имя" class="form-control" name="first_name"

					                      				value="{{isset($data['results']->first_name)?$data['results']->first_name:''}}">

					                      			</div>

					                      		</div>

					                      		<div class="col-md-12 mt-5">

					                      			<div class="form-proup card-input">

					                      				<label for="">@lang('account.last_name')</label>

					                      				<input type="text" placeholder="Имя" class="form-control" name="last_name"

					                      				value="{{isset($data['results']->last_name)?$data['results']->last_name:''}}">

					                      			

					                      			</div>

					                      		</div>



					                      		<div class="col-md-12 mt-5">

					                      			<div class="form-proup card-input">

					                      				<label for="">@lang('account.company_name')</label>

					                      				<input type="text" placeholder="" class="form-control">

					                      			

					                      			</div>

					                      		</div>

					                      		<div class="col-md-12 mt-5 d-none">

					                      			<div class="form-proup card-input">

					                      				<label for="">@lang('account.index')</label>

					                      				<input type="text" class="form-control" name="index" value="{{isset($data['results']->index)?$data['results']->index:''}}">

					                      			</div>

					                      		</div>

					                      		<div class="col-md-12 mt-10">

					                      			<h4 class="card-title h4-style text-left">@lang('account.contact')</h4>

					                      		</div>

					                      		<div class="col-md-12 mt-5">

					                      			<div class="form-group form-group-number">

									                  <label>@lang('account.phone_number')</label>

									                    <div class="form-proup card-input">

									                        <input id="phone1" name="phone" type="tel" class="form-control form-control-sm w-100" value="{{isset($data['results']->phone)?$data['results']->phone:''}}">

									                    </div>

									                </div>	

					                      		</div>

					                      		<div class="col-md-12 mt-4">

					                      			<div class="form-group form-group-number">

									                  <label>@lang('account.phone_optional')</label>

									                    <div class="form-proup card-input">

									                        <input id="phone2" name="phone2" type="tel" class="form-control form-control-sm w-100" value="{{isset($data['results']->phone2)?$data['results']->phone2:''}}">

									                    </div>

									                </div>	

					                      		</div>

					                      	</div>





					                      	<div class="profile-submit">

					                      		<input type="hidden" name="id" value="{{Auth::user()->id}}">

					                      		<button type="submit" class="btn btn-dark-blue btn-w-short">@lang('account.save')</button>

					                      	</div>

					                      </form>



					                      

                                    </div>

                                </div>

                            </div>

						</div>



					</div>

				</div>

			</div>

		</div>



	</section>



@endsection

