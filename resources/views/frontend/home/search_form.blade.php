	<form action="{{url(app()->getLocale().'/filter')}}" class="form-search-lots" method="post">
		{{csrf_field()}}
							<div class="form-group-select">

								<div class="select-item">
									<select class="slim-select-2 js-select" data-brand name="brand" data-placeholder="All Brands">
										<option value="all-make" selected>@lang('home_page.all_make')</option>
										@foreach ($data['make'] as $make)
										<option value="{{$make->id}}">{{$make->name}}</option>
										@endforeach
									</select>
									  {{csrf_field()}}
									{{-- <input type="text" name="brand" > --}}
						<input type="hidden" name="lang" value="{{app()->getLocale()}}">

								</div>

								<div class="select-item">
									<select class="slim-select-2 js-select" data-select id="model"  name="model" data-select data-placeholder="All Model">
										<option value="all-model" selected>@lang('home_page.all_model')</option>
										{{-- 	@foreach ($data['models'] as $model)
										<option value="{{$model->id}}">{{$model->name}}</option>
										@endforeach --}}
									</select>
								</div>

								<div class="select-item">
									<select class="slim-select-2 js-select" data-year name="year" data-placeholder="Все марки">
										<option value="" selected>@lang('home_page.year_from')</option>
										  @foreach(range(date('Y')-50, date('Y')) as $y)
										<option >{{$y}}</option>
										@endforeach
									</select>
								</div>

								<div class="select-item">
									<select class="slim-select-2 js-select" data-select name="year_to" id="year_to" data-select data-placeholder="Все марки">
										<option value="" selected>@lang('home_page.year_to')</option>
										 {{-- @foreach(range(date('Y')-50, date('Y')) as $y)
										<option >{{$y}}</option>
										@endforeach --}}
									</select>
								</div>

							</div>
							<button type="submit" class="form-search-btn btn btn-dark-blue">@lang('home_page.search_button')</button>
						</form>