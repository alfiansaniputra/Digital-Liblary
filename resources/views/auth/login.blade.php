@extends('template.login')

@section('content')

                   
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="text" placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

    </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                <input type="password" placeholder="Password" id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

        </div>

        <div class="form-group">
            <div class="col-lg-6 col-md-6">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <label class="checkbox">
                        <span class="pull-right">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Password? 
                </a>
                        </span>
                </label>
            </div>
        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-0">
                            
                                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                            </div>
                        </div>
<br>
                        <div class="login-social-link centered">
                    <p>or you can sign in via your social network</p>
                        <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                        <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                    </div>

                    </form>


    

@endsection
