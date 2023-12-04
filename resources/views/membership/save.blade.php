@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
@endsection
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Memebership</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/memberships')}}">Memberships</a>
            </li>
            <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
            </li>
        </ol>
    </div>
@endsection
@section('content')
<div class="content-body">
    <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                          
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-8 col-md-6 col-12 mb-1">
                                           <form action="{{ url('admin

                                           /savemembership') }}" class="" id="form_submit" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    Type
                                                                </label>
                                                                <input  class="form-control" name="type" type="text" value="{{(isset($data['results']->type) ? $data['results']->type : '')}}">
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>
                                                                    Price
                                                                </label>
                                                                <input  class="form-control" name="price" type="text" value="{{(isset($data['results']->price) ? $data['results']->price : '')}}">
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                        <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description">{{(isset($data['results']->description) ? $data['results']->description : '')}}</textarea>


                                                        </div>
                                                    </div>
                                                    </div>
                                            <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                                               <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                                               <a href="{{url('admin/memberships')}}" class="btn btn-outline-secondary">Back</a>
                                            </input>
                                            </input>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 </section>
</div>
@endsection
@section('js')
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script type="text/javascript">
        $('.memberships').addClass('active');
        $('#form_submit').validate({
            rules: {
                'type': {
                    required: true
                },
                'price': {
                    required: true
                },
            }
        });
    </script>
    @endsection
