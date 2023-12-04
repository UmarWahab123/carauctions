<div class="row lotgrid">

    @foreach($data['dealer_images'] as $value)

	<div class="col-lg-3 images">

		<button class="btn btn-primary add_photo" data-id="{{$value->id}}">

            <i class="mr-50 fa fa-pencil"></i>

        </button> 

        <a class="btn btn-danger removeimg text-white" data-dealer_id="{{$value->dealer_id}}" data-path="{{$value->images}}" data-id="{{$value->id}}">

            <i class="mr-50 fa fa-trash"></i>

        </a>

		<img src="{{url($value->images)}}" alt="test" width="200px" height="200px">

		<label>{{$value->title}}</label>
		<input type="hidden" name="title" value="{{$value->title}}">

	</div><br>

	@endforeach

</div>