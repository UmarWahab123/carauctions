@extends('frontend.layout.header')
@section('css')
    <link rel="stylesheet"  href="{{asset('/css/fees.css')}}" >

@endsection
@section('content')
<div class="container-xl fees-tabs mt-5">

<div class="row">
<div class="col-12">
<ul class="nav nav-pills">
<li class="nav-item">
<a class="nav-link" id="copart-tab" data-toggle="tab" href="#copart" role="tab" aria-controls="copart" aria-selected="true">
<img class="img-fluid" src="https://carsfromwest.com/build/icons/auction-options/copart-lg.5705e415.svg" alt="Copart">
Copart
</a>
</li>
<li class="nav-item">
<span class="nav-link active" id="iaai-tab" data-toggle="tab" href="#iaai" role="tab" aria-controls="iaai" aria-selected="true">
<img class="img-fluid" src="https://carsfromwest.com/build/icons/auction-options/iaai-lg.a8b15a1a.svg" alt="IAAI">
IAAI
</span>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane fade show " id="copart" role="tabpanel" aria-labelledby="home-tab">
	  
     @include('frontend.partials.copart')

</div>

 <div class="tab-pane fade show active" id="iaai" role="tabpanel" aria-labelledby="iaai-tab">
     @include('frontend.partials.iaai')
    
  
</div>	

 </div>
</div>
</div>
</div>
</div>

@endsection




