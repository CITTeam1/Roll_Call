@extends('layouts.master')


@section('content')

<div class = "container" style="margin-top:10%">
    <div class="row">
        <div class="col-md-12">
        <h1 class="text-center">Roll Call</h1><br>
        <!-- Adding Student Redirect /DB -->
        <div class ="text-center">
            <a class="btn btn-link" href="/event/pointsPage">
                Student? Click here!
            </a>
        </div>
        <!--Back to primarily Steven code -->                <br>
        <div class="row">
     <div class="col-md-3"></div>
    <div class="col-md-6">
                                @include('layouts.errors')
                        @include('layouts.sessions')
            <div class="card">
                <div class="card-header">Faculty Login</div> <!-- Change to "Faculty Login" /DB-->
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-10">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">User Email</span>
                                    </div>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>

                                    @endif
                                </div>
                            </div>
       
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-10">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">User Password</span>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required  aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
              
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
  <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
        </div>
    </div>
</div>
<!--Adds a space at the bottom between the header and the login container zc-->
<div>
    <p>&nbsp;</p>
</div>
@endsection
