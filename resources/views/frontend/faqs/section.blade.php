<div class="accordion" id="accordionExample">
           @foreach ($data['faq'] as $faq)
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                 <b>{{$faq->title}}</b>
                </button>
              </h2>
            </div>
            <div id="collapse{{$faq->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                {!! $faq->content !!}
              </div>
            </div>
          </div>
           @endforeach     

        </div>