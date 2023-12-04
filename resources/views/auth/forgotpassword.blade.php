

@extends('frontend.layout.header') 

@section('content')

    <!-- Breadcrumb -->

    <section class="breadcrumb-outer text-center">

        <div class="container">

            <div class="breadcrumb-content">

                <h2>Forgot Password</h2>

                <nav aria-label="breadcrumb">

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{url('/login')}}">Logged in</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>

                    </ul>

                </nav>

            </div>

        </div>

        <div class="section-overlay"></div>

    </section>

    <!-- BreadCrumb Ends -->



    <!-- Forgot Password -->

    <div class="forgot-password d-none">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 mx-auto">

                    <div class="fp-content">

                        <p>Please provide your email address. Click in the provided link to retrieve you account.</p>

                        <form method="POST" action="{{route('password.email')}}" class="form-page">

                            {{ csrf_field() }}

                          @if(session('status'))

                          <div class="alert alert-success">

                              {{session('status')}}

                          </div>

                          @endif

                            <div class="row">

                                <div class="form-group col-lg-12">

                                    <label>Enter Email Address</label>

                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="Name" placeholder="Enter username or email id">

                                    <span class="text-center">@error('email'){{$message}} @enderror</span>

                                </div>

                                <div class="col-lg-12">

                                    <div class="comment-btn" style="margin-bottom: 30px;">

                                        <button type="submit" class="btn-blue btn-red">Send Email Links</button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="login-page">

        <div class="login-page-form">

            <div class="login-page-form-wrap">

                <h2 class="h2-style">Please provide your email address. Click in the provided link to retrieve you account.</h2>

                <form action="{{route('password.email')}}" method="post" class="form-page">

                 {{csrf_field()}}


                    @if(session('status'))

                        <div class="alert alert-success">

                            {{session('status')}}

                        </div>

                    @endif

                    <div class="row">

                        <div class="form-group card-input col-lg-12">
                            <label>Enter Email Address</label>
                            <input type="email" id="input-1" name="email" value="{{old('email')}}" placeholder="Enter username or email id">
                            <span class="text-center">@error('email'){{$message}} @enderror</span>
                        </div>

                        <div class="col-lg-12">

                            <div class="comment-btn" style="margin-bottom: 30px;">
                                <button type="submit"  class="btn btn-register btn-dark-blue">Send Email Links</button>
                            </div>

                        </div>

                    </div>


                </form>

              

            </div>

        </div>



    </div>


@endsection