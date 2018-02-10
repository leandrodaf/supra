<div class="form-group col-sm-12">

    {!! csrf_field() !!}

    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="name"
               value="{{ !empty($user) ? $user->name . old('name'):old('name') }}" placeholder="Nome completo">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('name'))
            <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
        @endif
    </div>

    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" name="email"
               value="{{ !empty($user) ? $user->email . old('email'):old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @if ($errors->has('email'))
            <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
        @endif
    </div>


    @if(empty($user))
        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password" placeholder="Senha  ">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar senha">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
            @endif
        </div>
    @endif


    <div class="form-group has-feedback{{ $errors->has('pessoa') ? ' has-error' : '' }}">
        <select name="pessoa_id" id="pessoa" class="form-control" required="required">
            @if(!empty($user))
                <option value="{{$user->pessoa->id}}" selected>{{$user->pessoa->nome}}</option>
            @endif
        </select>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('pessoa'))
            <span class="help-block">
                        <strong>{{ $errors->first('pessoa') }}</strong>
                    </span>
        @endif
    </div>



    <div class="form-group has-feedback{{ $errors->has('pessoa_id') ? ' has-error' : '' }}">

        <select name="roles" id="roles" class="form-control" required="required">

            @if(!empty($user))

                @foreach($roles->toArray() as $role)

                    @if($role->name == $atualRole)
                        <option value="{{$role->name}}" selected>{{$role->name}}</option>
                    @else
                        <option value="{{$role->name}}">{{$role->name}}</option>
                    @endif

                @endforeach
            @else
                @foreach($roles->toArray() as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            @endif


        </select>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('roles'))
            <span class="help-block">
                        <strong>{{ $errors->first('roles') }}</strong>
                    </span>
        @endif
    </div>


</div>