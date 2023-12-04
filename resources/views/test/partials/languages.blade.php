<ul class="nav nav-tabs  m-tabs-line" role="tablist">
				@foreach($data['languages'] as $key=>$value)
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link {{$key==0 ? 'active show' : ''}}" data-toggle="tab" href="#{{$value->langcode}}" role="tab" aria-selected="false" style="color:#333 !important">{{$value->langname}}</a>
                </li>
				@endforeach
</ul>

				<div class="tab-content">

				@foreach($data['languages'] as $key=>$value)
               		 <div class="tab-pane {{$key==0 ? 'active show' : ''}}" id="{{$value->langcode}}" role="tabpanel">
						<form action="{{ url('admin/savelangsettings') }}" method="post">
                      {{ csrf_field() }}
					  <input type="hidden" name="id" value="{{(isset($value->translations->id) ? $value->translations->id : '')}}">
					<input type="hidden" name="lang_id" value="{{$value->langid}}">
				@include('test.translations.langbasic')
				@include('test.translations.general')
				@include('test.translations.responses')
				</form>
				</div>
				
				@endforeach
				</div>