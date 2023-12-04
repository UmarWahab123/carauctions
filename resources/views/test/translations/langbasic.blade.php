<div class="row">
				<div class="col-12">
					<h4><b>LANGUAGE SETTINGS</b></h4>
				</div>
				<br><br><br>
					<div class="col-3">
						<p class="mt-2">Language Name</p>
					</div>
					<div class="col-6">
						<div class="form-group">
							<input required type="text" value="{{(isset($value->langid) ? $value->langname : '')}}" class="form-control">
						</div>
					</div>
				</div>



   <div class="row">
	<div class="col-3">
		<p class="mt-2">Redirect URL</p>
	</div>
	<div class="col-6">
		<div class="form-group">
			<input required type="text" name="redirect_url" value="{{(isset($value->translations->id) ? $value->translations->redirect_url : '')}}" class="form-control">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-3">
		<p class="mt-2">Page Title</p>
	</div>
	<div class="col-6">
		<div class="form-group">
			<input required type="text" name="page_title" value="{{(isset($value->translations->id) ? $value->translations->page_title : '')}}" class="form-control">
		</div>
	</div>
</div>