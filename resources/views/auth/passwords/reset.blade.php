<!DOCTYPE html>
<html>

<head>
    <title>Reset Password | Clear Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- end of bootstrap -->
    <!--page level css -->
    <link href="{{asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <!--end page level css-->
</head>

<body id="sign-in">
<div class="preloader">
    <div class="loader_img"><img src="{{asset('img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 login-form">
            <h2 class="text-center">
                <img src="{{asset('img/pages/clear_black.png')}}" alt="Logo">
            </h2>
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="text-center">Reset Password</h4>
                </div>
                <div class="col-xs-12">
                    <form action="{{ route('password.request') }}" id="authentication" method="post"
                          class="reset_validator">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="password" class="sr-only">E-mail</label>
                            <input type="password" class="form-control form-control-lg" id="password"
                                   name="email" value="{{ $email or old('email') }}" placeholder="E-mail">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="sr-only">Senha</label>
                            <input type="password" class="form-control form-control-lg" id="password"
                                   name="password" placeholder="Password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="confirm-password" class="sr-only">Confirmar senha</label>
                            <input type="password" class="form-control form-control-lg" id="confirm-password"
                                   name="password_confirmation" placeholder="Confirmar senha">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Resetar senha" class="btn btn-primary center-block"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- end of global js -->
<!-- page level js -->
<script src="{{asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/custom_js/reset_password.js')}}"></script>
<!-- end of page level js -->
</body>

</html>
