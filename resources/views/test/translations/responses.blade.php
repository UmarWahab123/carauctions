<div class="row">
				<div class="col-12">
					<h4><b>RESPONSE LABELES TRANSALTIONS</b></h4>
				</div>
				<br><br><br>
					<div class="col-3">
						<p class="mt-2">Strongly Disagree Button</p>
					</div>
					<div class="col-3">
						<div class="form-group">
							<input required type="text" name="strongly_disagree1" value="{{(isset($value->translations->id) ? $value->translations->strongly_disagree1 : '')}}" class="form-control">
						</div>
					</div>
					
				</div>

                <div class="row">
					<div class="col-3">
						<p class="mt-2">Slightly Disagree Button</p>
					</div>
					<div class="col-3">
						<div class="form-group">
							<input required type="text" name="slightly_disagree1" value="{{(isset($value->translations->id) ? $value->translations->slightly_disagree1 : '')}}" class="form-control">
						</div>
					</div>
					
				</div>
                <div class="row">
					<div class="col-3">
						<p class="mt-2">Slightly Agree Button</p>
					</div>
					<div class="col-3">
						<div class="form-group">
							<input required type="text" name="slightly_agree1" value="{{(isset($value->translations->id) ? $value->translations->slightly_agree1 : '')}}" class="form-control">
						</div>
					</div>
					
				</div>
                <div class="row">
					<div class="col-3">
						<p class="mt-2">Strongly Agree Button</p>
					</div>
					<div class="col-3">
						<div class="form-group">
							<input required type="text" name="strongly_agree1" value="{{(isset($value->translations->id) ? $value->translations->strongly_agree1 : '')}}" class="form-control">
						</div>
					</div>
					
				</div>

                <div class="form-group m-form__group mt-5">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>