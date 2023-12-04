	<div class="col-lg-12 col-xl-5">
		<!-- <div class="cart-product">

			<div class="cart-product-title">

				<h2>{{ $data['lot']->lot_title}}</h2>

				<span class="book_mark active fas fa-bookmark" data-toggle="modal" data-target="#remove-bookmarks"></span> -->

				<!-- <span class="book_mark fas fa-bookmark active"></span> -->

			<!-- </div>		 -->

			<!-- <div class="image-gallery">

				<main class="lightgallery">

					<a href="{{url($data['lot']->feature_image)}}">

						<img src="{{url($data['lot']->feature_image)}}" class="product-image" alt="">

					</a>

				</main>

				<aside class="thumbnails image-list thumbs-images-wrap ">

					

					@foreach($data['lot_images'] as $key=>$value)

					<a href="#" class=" {{$key==0 ? 'selected' : ''}} thumbnail " data-big="{{url($value->images)}}">

						<div class="thumbnail-image " style="background-image: url({{url($value->images)}})"></div>

					</a>

					@endforeach

					<a href="#" class=" thumbnail" data-big="{{url($data['lot']->feature_image)}}">

						<div class="thumbnail-image" style="background-image: url({{url($data['lot']->feature_image)}})"></div>

					</a>

				</aside>

			</div>		 -->	


		<!-- </div>	 -->


		<!-- <div class="card card-product no-border">

			<div class="card-body-top">

				<h3>@lang('lotdetail.vehicle')</h3>

			</div>

			<div class="card-body">

				<dl class="details-list">

					<dt>@lang('lotdetail.mileage')</dt>

					<dd>{{$data['lot']->mileage}}</dd>


					<dt>@lang('lotdetail.body_type')</dt>

					<dd>{{$data['lot']->body_style}}</dd>


					<dt>@lang('lotdetail.color')</dt>

					<dd>{{$data['lot']->color}}</dd>


					<dt>@lang('lotdetail.engine_type')</dt>

					<dd>{{$data['lot']->engine_type}}</dd>


					<dt>@lang('lotdetail.cyclinder')</dt>

					<dd>{{$data['lot']->cylinder}}</dd>


					<dt>@lang('lotdetail.fuel')</dt>

					<dd>{{$data['lot']->fuel}}</dd>


					<dt>@lang('lotdetail.transmission')</dt>

					<dd>{{$data['lot']->transmission}}</dd>


					<dt>@lang('lotdetail.key')</dt>

					<dd>{{$data['lot']->key}}</dd>

				</dl>

			</div>

		</div> -->


<div class="cart-product">   

	<div class="cart-product-title card1">
            <img src="{{asset('')}}frontend/images/r-icon.svg" alt="">
            <h2>{{ $data['lot']->lot_title}}</h2>
                    <!-- <span class="book_mark active fas fa-bookmark" data-toggle="modal" data-target="#remove-bookmarks"></span> -->
                    @if(Auth::check())
                    <div class="text-right"><span class="book_mark fas fa-bookmark {{isset($data['bookmark']->bookmark) ? 'active' :''}} add_bookmark" data-lot="{{$data['lot']->id}}" data-id="{{isset(Auth::user()->id)?Auth::user()->id:''}}" data-bookmark="{{isset($data['bookmark']->bookmark) ? $data['bookmark']->bookmark:''}}"></span> {{csrf_field()}}</div>
                    @else
                    <div class="text-right" data-toggle="modal" data-target="#loginModal"><span class="book_mark fas fa-bookmark {{isset($data['bookmark']->bookmark) ? 'active' :''}} add_bookmark" data-lot="{{$data['lot']->id}}" data-id="{{isset(Auth::user()->id)?Auth::user()->id:''}}" data-bookmark="{{isset($data['bookmark']->bookmark) ? $data['bookmark']->bookmark:''}}"></span> {{csrf_field()}}</div>
                    @endif
                              <!-- <span class="book_mark fas fa-bookmark active"></span> -->
                    </div>
                    <div class="image-gallery">
                      <main class="lightgallery">
                        <a href="{{url($data['lot']->feature_image)}}">
                          <img src="{{url($data['lot']->feature_image)}}" class="product-image" alt="">
                        </a>
                      </main>
                      <aside class="thumbnails image-list thumbs-images-wrap">
                        @foreach($data['lot_images'] as $key=>$value)
                        <a href="javascript:void(0)" class="{{$key==0 ? 'selected' : ''}} thumbnail" data-big="{{url($value->images)}}">
                          <div class="thumbnail-image" style="background-image: url({{url($value->images)}})"></div>
                        </a>
                        @endforeach
                        <a href="javascript:void(0)" class=" thumbnail" data-big="{{url($data['lot']->feature_image)}}">
                          <div class="thumbnail-image" style="background-image: url({{url($data['lot']->feature_image)}})"></div>
                        </a>
                      </aside>
                    </div>      
                  </div>  
              <div class="card card-product">
                    <div class="card-body-top">
                            <h3>@lang('lotdetail.vehicle')</h3>
                     </div>
                      <div class="card-body">
                        <dl class="details-list">
                          <dt><img src="{{ asset('frontend/images/icon/speed-icon.png')}}" alt="">@lang('lotdetail.mileage')</dt>
                          <dd>{{$data['lot']->mileage}}</dd>

                          <dt><img src="{{asset('frontend/images/icon/car-icon.png')}}" alt="">@lang('lotdetail.body_type')</dt>
                          <dd>{{$data['lot']->body_style}}</dd>

                          <dt><img src="{{asset('frontend/images/icon/car-color-icon.png')}}" alt="">@lang('lotdetail.color')</dt>
                          <dd>{{$data['lot']->color}}</dd>

                          <dt><img src="{{asset('frontend/images/icon/car-engine-icon.png')}}" alt="">@lang('lotdetail.engine_type')</dt>
                          <dd>{{$data['lot']->engine_type}}</dd>

                          <dt><img src="{{asset('frontend/images/icon/piston-icon.png')}}" alt="">@lang('lotdetail.cyclinder')</dt>
                          <dd>{{$data['lot']->cylinder}}</dd>

                          <dt><img src="{{asset('frontend/images/icon/petrol-icon.png')}}" alt="">@lang('lotdetail.fuel')</dt>
                          <dd>{{$data['lot']->fuel}}</dd>

                          <dt><img src="{{asset('frontend/images/icon/wheel-alignment-icon.png')}}" alt="">@lang('lotdetail.transmission')</dt>
                          <dd>{{$data['lot']->transmission}}</dd>

                          <dt><img src="{{asset('frontend/images/icon/car-key-icon.png')}}" alt="">@lang('lotdetail.key')</dt>
                          @if($data['lot']->key==1)
                          <dd>Yes</dd>
                          @else
                          <dd>No</dd>
                          @endif
                        </dl>
                      </div>
                  </div>


        	</div>
          <div class="modal" tabindex="-1" role="dialog" id="loginModal">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title">@lang('main_section.login_or_register')</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <p class="war-message"></p>
@lang('main_section.functionality_is_for_registered')
      <div class="row">
        
        <div class="col-md-6">
        <a href="{{url(app()->getLocale().'/userregister')}}" class="btn-blue btn-red btn btn-primary w-100">@lang('main_section.create_new_account')</a>
        </div>
        <div class="col-md-6">
        <a href="{{url(app()->getLocale().'/login')}}" class="btn-blue btn-red btn btn-secondary w-100">@lang('main_section.login_now2')</a>
        </div>
     </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">

	 

 $(document).ready(function(){

    

    $(document).on('click','.add_bookmark',function(){

     var user_id=$(this).parents('.card1').find(".book_mark").attr('data-id');


     var _token = $("input[name=_token]").val();

     var lot_id=$(this).parents('.card1').find(".book_mark").attr('data-lot');

     var bookmark=$(this).parents('.card1').find(".book_mark").attr('data-bookmark');

     // alert(user_id);

     console.log(bookmark,lot_id,user_id)

     var currentvalue= $(this);

     var formdata={'user_id':user_id,'lot_id':lot_id,"bookmark":bookmark, _token:_token};

     console.log("fomrdata",formdata)

        $.ajax({

                type: "post",

                url: "{{url(app()->getLocale().'/savebookmark') }}",

                data: formdata,

                dataType:'json',

                success: function(data) {

                 console.log(data.response);

                 if(bookmark==0){

                 currentvalue.attr('data-bookmark',1);

                 currentvalue.parents('.card1').find(".book_mark").addClass('active');
                  Swal.fire('Bookmark Successfully.')


                 }else{

                 	 currentvalue.attr('data-bookmark',0);

                    currentvalue.parents('.card1').find(".book_mark").removeClass('active');
                    Swal.fire('Removed From Bookmark Successfully.')
                    
                 }

                }

            });

    });

 

 }); 

</script>