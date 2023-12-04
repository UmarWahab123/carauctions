<form id="form-submit" action="{{ url('admin/savesettings') }}" method="post">
            <input type="hidden" name="id" value="{{(isset($data['settings']->id) ? $data['settings']->id : '')}}">
        {{ csrf_field() }}

<div class="row">
<div class="col-12">
	<h4><b>SET NUMBER OF QUESTIONS</b></h4>
</div><br><br><br>
	<div class="col-3">
		<b>Stage 1</b>
		<p class="mt-2">Number of question rounds</p>
	</div>
	<div class="col-3">
		<div class="form-group">
			<label>Admin Value 1</label>
			<input min="0" type="number" name="stage1_questions" value="{{(isset($data['settings']->id) ? $data['settings']->stage1_questions : '')}}" class="form-control">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-3">
		<b>Stage 2</b>
		<p class="mt-2">Additional question rounds </p>
	</div>
	<div class="col-3">
		<div class="form-group">
			<label>Admin Value 2</label>
			<input min="0" type="number" name="stage2_questions" value="{{(isset($data['settings']->id) ? $data['settings']->stage2_questions : '')}}" class="form-control">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-3">
		<b>Stage 3</b>
		<p class="mt-2">Number of question pairs</p>
	</div>
	<div class="col-3">
		<div class="form-group">
			<label>Admin Value 3</label>
			<input min="0" type="number" name="stage3_questions" value="{{(isset($data['settings']->id) ? $data['settings']->stage3_questions : '')}}" class="form-control">
		</div>
	</div>
</div>
<br><Br>
	<h4><b>SET EVALUATION VALUES</b></h4>

	<div class="row mt-5">
	<div class="col-3">
		<b>Evaluation Method 1</b>
		<p class="mt-2">Threshold to exclude</p>
	</div>
	<div class="col-3">
		<div class="form-group">
			<label>Eval 1 Value</label>
			<input min="0" step="any" type="number" name="method1_value" value="{{(isset($data['settings']->id) ? $data['settings']->method1_value : '')}}" class="form-control">
		</div>
	</div>
</div>
	<div class="row">
	<div class="col-3">
		<b>Evaluation Method 2</b>
		<p class="mt-2">Threshold for clear winner </p>
	</div>
	<div class="col-3">
		<div class="form-group">
			<label>Eval 2 Value</label>
			<input min="0" step="any" type="number" name="method2_value" value="{{(isset($data['settings']->id) ? $data['settings']->method2_value : '')}}" class="form-control">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-3">
		<b>Threshold Method 3</b>
		<p class="mt-2">Threshold for clear winner </p>
	</div>
	<div class="col-3">
		<div class="form-group">
			<label>Threshold Value 1</label>
			<input min="0" step="any" type="number" name="threshold_value1" value="{{(isset($data['settings']->id) ? $data['settings']->threshold_value1 : '')}}" class="form-control">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-3">
		<b>Threshold Method 3</b>
		<p class="mt-2">Threshold for clear winner </p>
	</div>
	<div class="col-3">
		<div class="form-group">
			<label>Threshold Value 2</label>
			<input min="0" step="any" type="number" name="threshold_value2" value="{{(isset($data['settings']->id) ? $data['settings']->threshold_value2 : '')}}" class="form-control">
		</div>
	</div>
</div>

<div class="form-group m-form__group mt-5">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
</form>
