<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password | Clear Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- Bootstrap -->
    <!-- global level css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('vendors/themify/css/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
    <!-- end of global css-->
    <!-- page level styles-->
    <link href="{{asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/forgot_password.css')}}" rel="stylesheet">
    <!-- end of page level styles-->
</head>

<body>
<div class="preloader">
    <div class="loader_img"><img src="{{asset('img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 box animated fadeInUp">
            <div class="text-center"><img src="{{asset('img/logo.png')}}" alt="Clear logo"></div>
            <h3 class="text-center">Forgot Password
            </h3>
            <p class="text-center enter_email">
                Digite seu e-mail registro.
            </p>
            <p class="text-center check_email hidden">
                Verifique o seu email.
                <br><br>
                <u><a href="javascript:void(0)" class="reset-link">Reenviar link</a></u>
            </p>
            <form action="{{ route('password.email') }}" class="forgot_Form text-center" method="POST" id="forgot_password">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control email" name="email" value="{{ $email or old('email') }}" id="email" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <button type="submit" value="Enviar link para resetar senha" class="btn submit-btn">
                    Enviar link para resetar senha
                </button>
            </form>
        </div>
    </div>
</div>
<!-- page level js -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/custom_js/forgot_password.js')}}" type="text/javascript"></script>
<!-- end of page level js -->
</body>

</html>
