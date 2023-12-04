<div class="col-lg-4 col-xl-3">

	

<form action="" id="filter_form" method="post" enctype="multipart/form-data">

                  {{csrf_field()}}

					<div class="catalog-filters">

						<div class="catalog-filter-title">

							<img src="{{asset('/frontend/images/filter.svg')}}" class="icon w-20" alt="">

							<h2>@lang('side_filter.filter_result')</h2>

						</div>

						<input type="hidden" name="page" value="0">

						<div class="catalog-filter-item">

							<p>@lang('side_filter.auction')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2 filter" data-auction multiple data-placeholder="Choose Option" class="single" name="brand[]">

									<option data-placeholder="true"></option>

									<option selected>COPART</option>

									<option  selected>IAAI</option>

								</select>

							</div>

						</div>

						<input type="hidden" name="lang" value="{{app()->getLocale()}}">

						<div class="catalog-filter-item d-none">

							<p>@lang('side_filter.transport_type')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2" data-type name="type"  data-placeholder="Select vehicle Type">

									 <option></option>
									 <option value="Automobile">@lang('side_filter.automobile')</option>

                                    <option value="ATV">@lang('side_filter.atv')</option>

                                    <option value="Boat">@lang('side_filter.boat')</option>

                                    <option value="Bus, minibus">@lang('side_filter.bus_minibus')</option>

                                    <option value="Industrial equipment">@lang('side_filter.industrial_equipment')</option>

                                    <option value="Jet ski">@lang('side_filter.jet_ski')</option>

                                    <option value="Motorcycle">@lang('side_filter.motorcycle')</option>

                                    <option value="Recreational vehicle">@lang('side_filter.recreational_vehicle')</option>

                                    <option value="Snowmobile">@lang('side_filter.snowmobile')</option>

                                    <option value="Trailer">@lang('side_filter.trailer')</option>

                                    <option value="Truck">@lang('side_filter.truck')</option>

                                    <option value="Other">@lang('side_filter.other')</option>

								</select>

							</div>	

						</div>

						<div class="catalog-filter-item">

							<p>@lang('side_filter.brand')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2" data-make multiple name="make[]" data-placeholder="Select Brand">

									<option data-placeholder="true"></option>
									 @foreach ($data['make'] as $make)

										<option value="{{$make->id}}" {{isset($data['post']['brand'])?$data['post']['brand']==$make->id?"Selected":'':''}}>{{$make->name}}</option>

									 @endforeach

								</select>

							</div>	

						</div>



						<div class="catalog-filter-item">

							<p>@lang('side_filter.model')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2" data-multiplemodel multiple id='multiplemodel' name="model[]"  data-placeholder="Select model">

									<option data-placeholder="true"></option>

									  	@foreach ($data['models'] as $model)

										<option value="{{$model->id}}" {{isset($data['post']['model'])?$data['post']['model']==$model->id?"Selected":'':''}}>{{$model->name}}</option>

										@endforeach

									 

								</select>

							</div>	

						</div>



						<div class="catalog-filter-item">

							<p class="mb-0">@lang('side_filter.year')</p>

							<div class="catalog-filter-item-group">

								<div class="catalog-filter-item-select">

									<small>@lang('side_filter.from')</small>

									<select class="slim-select-2 filter" data-year name="year" data-placeholder="Any">

										<option data-placeholder="true"></option>

										<option >Any</option>

										 @foreach(range(date('Y')-50, date('Y')) as $y)

										<option {{isset($data['post']['year'])?$data['post']['year']==$y?"Selected":'':''}}>{{$y}}</option>

										@endforeach

										

									</select>

								</div>

								<div class="catalog-filter-item-select">

									<small>@lang('side_filter.to')</small>

									<select class="slim-select-2 filter"  name="year_to" id="year_to" data-yearto data-placeholder="Any">

										<option data-placeholder="true"></option>

										<option >Any</option>

										  @foreach(range(date('Y')-50, date('Y')) as $y)

										<option {{isset($data['post']['year_to'])?$data['post']['year_to']==$y?"Selected":'':''}}>{{$y}}</option>

										@endforeach

									</select>

								</div>

							</div>

						</div>



						<div class="catalog-filter-item">

							<p class="mb-0">@lang('side_filter.milage')</p>

							<div class="catalog-filter-item-group">

								<div class="catalog-filter-item-select">

									<small>@lang('side_filter.min')</small>

									<div class="card-price-tab card-personal h-50px sidebar-nav">

				                      	<input type="text" placeholder="0" name="mileage_min" class="number">

			                     	</div>

								</div>

								<div class="catalog-filter-item-select">

									<small>@lang('side_filter.max')</small>

									<div class="card-price-tab card-personal h-50px sidebar-nav">

				                      	<input type="text" placeholder="0" name="mileage_max" class="number">

			                     	</div>

								</div>

							</div>

						</div>

                         

						<div class="catalog-filter-item">

							<p>@lang('side_filter.fuel_type')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2 filter" multiple name="fuel_type[]" data-fueltype data-placeholder="Fuel type">
									  <option></option>
									  <option value="Petrol">@lang('side_filter.petrol')</option>
									  <option value="Gas">@lang('side_filter.gas')</option>
									  <option value="Diesel">@lang('side_filter.diesel')</option>
									  <option value="N/A">@lang('side_filter.n_a')</option>
								</select>

							</div>	

						</div>

						<div class="catalog-filter-item">

							<p>@lang('side_filter.engine')</p>

							<div class="catalog-filter-item-group">

								<div class="catalog-filter-item-select">

									<select class="slim-select-2" multiple name="engine[]" data-engine data-placeholder="Любой">
                                    <option value="">Select</option>
                                    <option>0.7</option>
                                    <option>0.9</option>
                                    <option>1</option>
                                    <option>1.2</option>
                                    <option>1.3</option>
                                    <option>1.4</option>
                                    <option>1.5</option>
                                    <option>1.6</option>
                                    <option>1.7</option>
                                    <option>1.8</option>
                                    <option>1.9</option>
                                    <option>2</option>
                                    <option>2.1</option>
                                    <option>2.2</option>
                                    <option>2.3</option>
                                    <option>2.4</option>
                                    <option>2.6</option>
                                    <option>2.7</option>
                                    <option>2.8</option>
                                    <option>2.9</option>
                                    <option>3</option>
                                    <option>3.1</option>
                                    <option>3.2</option>
                                    <option>3.3</option>
                                    <option>3.4</option>
                                    <option>3.5</option>
                                    <option>3.6</option>
                                    <option>3.7</option>
                                    <option>3.8</option>

									</select>

								</div>

								{{-- <div class="catalog-filter-item-select">

									<select class="slim-select-2" data-select name="state" data-select data-placeholder="Любой">

										<option data-placeholder="true"></option>

										  <option >Бензин</option>

										  <option >Дизель</option>

									</select>

								</div> --}}

							</div>

						</div>



						<div class="catalog-filter-item">

							<p>@lang('side_filter.transmission')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2" multiple  name="transmission[]" data-transmission data-placeholder="Transmission">
									  <option ></option>
									  <option value="Automatic">@lang('side_filter.automatic')</option>
									  <option value="Manual">@lang('side_filter.manual')</option>
									  <option value="'Continuously variable">@lang('side_filter.continuously_variable') </option>
									  <option value="Semi-automatic and dual-clutch">@lang('side_filter.semi-automatic')</option>
									  <option value="N/A">@lang('side_filter.n/a')</option>
								</select>

							</div>	

						</div>

						<div class="catalog-filter-item">

							<div class="check-wrap">

					            <label for="check-1" class="chek-label" >

								  <input type="checkbox" id="check-1" class="chek-styled buynowcheck" name="buynowcheck">

								  <span class="checkmark"></span>

								</label>

  								<p>@lang('side_filter.buy_now')</p>

					        </div>

						</div>



						<div class="catalog-filter-item">

							<p>@lang('side_filter.maxmium_price')</p>

							<div class="card-price-tab card-personal sidebar-nav">

		                      	<span class="fal fa-dollar-sign"></span>

		                      	<input type="text" placeholder="200" name="starting_price" class="number">

	                     	</div>

						</div>



						<div class="catalog-filter-item">

							<p>@lang('side_filter.document_type')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2" data-document_type multiple name="document_type[]"  data-placeholder="Document type">

									  <option ></option>
									  <option value="Clean title">@lang('side_filter.clean_title')</option>
									  <option value="Non repairable">@lang('side_filter.non_repairable')</option>
									  <option value="Salvage title">@lang('side_filter.salvage_title')</option>
									  <option value="Other">@lang('side_filter.other')</option>

								</select>

							</div>	

						</div>
						<div class="catalog-filter-item">

							<p>@lang('side_filter.damage')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2" data-damage multiple name="damage[]" data-placeholder="Damage">

									@foreach(lot_damage() as $damage)

									  <option>{{$damage}}</option>

									@endforeach  

								</select>

							</div>	

						</div>

						<div class="catalog-filter-item">

							<p>@lang('side_filter.body_type')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2" data-bodytype multiple name="body_type[]" data-placeholder="Body type">

									  <option data-placeholder="true"></option>

									    <option value="Bus">@lang('side_filter.bus')</option>

	                                    <option value="Cab chassis">@lang('side_filter.cab_chassis')</option>

	                                    <option value="Cargo van">@lang('side_filter.cargo_van')</option>

	                                    <option value="Chassis">@lang('side_filter.chassis')</option>

	                                    <option value="Convertible">@lang('side_filter.convertible')</option>

	                                    <option value="Coupe">@lang('side_filter.coupe')</option>

	                                    <option value="Crew pickup">@lang('side_filter.crew_pickup')</option>

	                                    <option value="Cutaway">@lang('side_filter.cutaway')</option>

	                                    <option value="Extended cab pickup">@lang('side_filter.extended_cab_pickup')</option>

	                                    <option value="extended cargo van">@lang('side_filter.extended_cargo_van')</option>

	                                    <option value="Hatchback">@lang('side_filter.hatchback')</option>

	                                    <option value="Incomplete chassis">@lang('side_filter.incomplete_chassis')</option>

	                                    <option value="Liftback">@lang('side_filter.liftback')</option>

	                                    <option value="Mega pickup">@lang('side_filter.mega_pickup')</option>

	                                    <option value="Pickup">@lang('side_filter.pickup')</option>

	                                    <option value="Roadster">@lang('side_filter.Roadster')</option>

	                                    <option value="SUV">@lang('side_filter.suv')</option>

	                                    <option value="Sedan">@lang('side_filter.sedan')</option>

	                                    <option value="Sports van">@lang('side_filter.sports_van')</option>

	                                    <option value="Station wagon">@lang('side_filter.station_wagon')</option>

	                                    <option value="Van">@lang('side_filter.van')</option>

	                                    <option value="Van camper">@lang('side_filter.van_camper')</option>

	                                    <option value="Van passenger">@lang('side_filter.van_passenger')</option>

	                                    <option value="Сoupe">@lang('side_filter.coupe')</option>

								</select>

							</div>	

						</div>

						<div class="catalog-filter-item">

							<p>@lang('side_filter.auction_date')</p>

							<div class="check-wrap">

					            <label for="check-2" class="chek-label">

								  <input type="checkbox" id="check-2" class="chek-styled excludeacution" name="excludeacution">

								  <span class="checkmark"></span>

								</label>

  								<p>@lang('side_filter.exclude_completed')</p>

					        </div>

					        <div class="check-wrap">

					            <label for="check-3" class="chek-label">

								  <input type="checkbox" id="check-3" class="chek-styled excludetrading" name="excludetrading">

								  <span class="checkmark"></span>

								</label>

  								<p>@lang('side_filter.exclude_lots')</p>

					        </div>	

						</div>



						

						<div class="catalog-filter-item">

							<p class="mb-0">@lang('side_filter.date_range')</p>

							<div class="catalog-filter-item-group">

								<div class="catalog-filter-item-select">

									<small>@lang('side_filter.from')</small>

									<div class="card-price-tab card-personal h-50px sidebar-nav">

				                      		<input type="date" placeholder="0" name="date_from" class="date">

			                     	</div>

								</div>

								<div class="catalog-filter-item-select">

									<small>@lang('side_filter.to')</small>

									<div class="card-price-tab card-personal h-50px sidebar-nav">

				                      		<input type="date" placeholder="0" name="date_to" class="date">

			                     	</div>

								</div>

							</div>
						</div>
						<div class="catalog-filter-item d-none">
							<p>@lang('side_filter.salesman')</p>
							<div class="catalog-filter-item-select">
								<select class="slim-select-2" data-select name="saleman" data-select data-placeholder="Salesman">
									<option data-placeholder="true"></option>

									  <option >Seller 1</option>

									  <option >Seller 2</option>
								</select>
							</div>	
						</div>
						<div class="catalog-filter-item d-none">

							<p>@lang('side_filter.location')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2" data-location multiple name="location[]"  data-placeholder="Any value">

									<option data-placeholder="true"></option>

									@foreach ($data['state'] as $state)

									  <option value="{{$state->id}}">{{$state->name}}</option>

									@endforeach



								</select>

							</div>	

						</div>



						<div class="catalog-filter-item d-none">

							<p>@lang('side_filter.area')</p>

							<div class="catalog-filter-item-select">

								<select class="slim-select-2" data-area multiple name="area[]"  data-placeholder="Any value">

									<option data-placeholder="true"></option>

									  @foreach ($data['city'] as $city)

									  <option value="{{$city->id}}">{{$city->name}}</option>

									@endforeach

								</select>

							</div>	

						</div>



					</div>

					<input type="hidden" name="sort" value="lot.id|asc">

</form>				



				</div>

