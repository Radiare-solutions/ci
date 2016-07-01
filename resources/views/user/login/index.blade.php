@extends('layouts/login')

@section('content')
<form id="login-form" class="login-form" action="{{ url('/login') }}" method="post" style="background:#0099c4;padding:30px 20px 10px;margin:auto;width:300px;">
    <div class="row">
        <h3 class="text-white bold"><span>Sign in</span></h3>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group col-md-12 text-left">
            <div class="input-group">
                <span class="input-group-addon primary" style="background:#ff7900; border: 2px solid #ff7900;">          
                    <span class="arrow" style="color:#ff7900;"></span>
                    <i class="fa fa-user-md"></i>
                </span>
                <!-- <input type="text"   id="txtusername" placeholder="Username" class="form-control" required> -->
                <input type="email" class="form-control" id="txtusername" name="email" value="{{ old('email') }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">                            

                            <div class="col-md-12">                                

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 text-left">
            <div class="input-group">
                <span class="input-group-addon primary" style="background:#ff7900; border: 1px solid #ff7900;">          
                    <span class="arrow" style="color:#ff7900;"></span>
                    <i class="fa fa-key"></i>
                </span>
                <!-- <input type="password"  id="txtpassword"  placeholder="Password" class="form-control" required> -->
                <input type="password" class="form-control" name="password" value="admin">
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">                            
                            <div class="col-md-12">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

            </div>

        </div>

    </div>
    <div class="row">
        <div class="control-group  col-md-12">
            <div class="checkbox checkbox check-success pull-left text-white">

                <input type="checkbox" id="checkbox1" name="remember">
                <label for="checkbox1" class="text-white">Keep me logged in </label>

            </div>
            <a href="{{ url('/password/reset') }}" class="pull-right text-white">Forgot Password?</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <button class="btn btn-primary btn-cons pull-right" type="submit" name="login" style="background:#ff7900;">Login</button>
        </div>
    </div>
</form>
@endsection