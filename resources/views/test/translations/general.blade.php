<div class="row">
				<div class="col-12">
					<h4><b>GENERAL TRANSALTIONS</b></h4>
					<h6><b>Leave Intent</b></h6>
				</div>
				<br><br><br>
					<div class="col-3">
						<p class="mt-2">Headline</p>
					</div>
					<div class="col-9">
						<div class="form-group">
							<input required type="text" name="leave_headline" value="{{(isset($value->translations->id) ? $value->translations->leave_headline : '')}}" class="form-control">
						</div>
					</div>
				</div>

                <div class="row">
					<div class="col-3">
						<p class="mt-2">Main Text</p>
					</div>
					<div class="col-9">
						<div class="form-group">
							<input required type="text" name="leave_text" value="{{(isset($value->translations->id) ? $value->translations->leave_text : '')}}" class="form-control">
						</div>
					</div>
				</div>

                
                <div class="row">
					<div class="col-3">
						<p class="mt-2">Resume Button</p>
					</div>
					<div class="col-3">
						<div class="form-group">
							<input required type="text" name="resume_button" value="{{(isset($value->translations->id) ? $value->translations->resume_button : '')}}" class="form-control">
						</div>
					</div>
				</div>
                
                
                <div class="row">
					<div class="col-3">
						<p class="mt-2">Leave Button</p>
					</div>
					<div class="col-3">
						<div class="form-group">
							<input required type="text" name="leave_button" value="{{(isset($value->translations->id) ? $value->translations->leave_button : '')}}" class="form-control">
						</div>
					</div>
				</div>
                <div class="row">
                <div class="col-12">
					<h6><b>Type B Prompt</b></h6>
				</div>
                <div class="col-3">
						<p class="mt-2">Headline</p>
					</div>
					<div class="col-9">
						<div class="form-group">
							<input required type="text" name="questionB_headline" value="{{(isset($value->translations->id) ? $value->translations->questionB_headline : '')}}" class="form-control">
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-3">
						<p class="mt-2">Main Text</p>
					</div>
					<div class="col-9">
						<div class="form-group">
							<input required type="text" name="questionB_text" value="{{(isset($value->translations->id) ? $value->translations->questionB_text : '')}}" class="form-control">
						</div>
					</div>
				</div>
                <div class="row">
                <div class="col-12">
					<h6><b>Same Response Prompt</b></h6>
				</div>
                <div class="col-3">
						<p class="mt-2">Headline</p>
					</div>
					<div class="col-9">
						<div class="form-group">
							<input required type="text" name="same_headline" value="{{(isset($value->translations->id) ? $value->translations->same_headline : '')}}" class="form-control">
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-3">
						<p class="mt-2">Main Text</p>
					</div>
					<div class="col-9">
						<div class="form-group">
						<textarea required class="form-control" name="same_text">{{(isset($value->translations->id) ? $value->translations->same_text : '')}}</textarea>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-3">
						<p class="mt-2">Restart Button</p>
					</div>
					<div class="col-3">
						<div class="form-group">
							<input required type="text" name="restart_button" value="{{(isset($value->translations->id) ? $value->translations->restart_button : '')}}" class="form-control">
						</div>
					</div>
				</div>