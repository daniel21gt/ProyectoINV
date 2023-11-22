@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(Session::has('success'))
            <div class="alert alert-info">
            {{Session::get('success')}}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Creacion de cuentas</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('registros.store') }}">
                        {{ csrf_field() }}
						
						<div> 		
							<div class="form-group">
                                        <input type="text" name="refer" id="refer" class="form-control input-sm" placeholder="refer" value="{{{ Auth::user()->username }}}" readonly="readonly" style="visibility:hidden">
                                    </div>
								
                            </div>
                       

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                 <label for="last_name" class="col-md-4 control-label">apellido</label>

                                        <div class="col-md-6">
                                          <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required maxlength="15">

                                          @if ($errors->has('last_name'))
                                         <span class="help-block">
                                      <strong>{{ $errors->first('last_name') }}</strong>
                                  </span>
                               @endif
                           </div>
                       </div>

                         <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                 <label for="username" class="col-md-4 control-label">Nombre de Usuario</label>

                                        <div class="col-md-6">
                                          <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required maxlength="15">

                                          @if ($errors->has('username'))
                                         <span class="help-block">
                                      <strong>{{ $errors->first('username') }}</strong>
                                  </span>
                               @endif
                           </div>
                       </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                       
                       @if(Auth::user()->tipos_usuarios_id == 1)
                      <div class="form-group">
                            <label for="tipos_usuarios_id" class="col-md-4 control-label">Tipo_usuario</label>
                            <div class="col-md-6">

                                 <select name="tipos_usuarios_id" id="tipos_usuarios_id" class=" form-control" value="{{ old('tipos_usuarios_id') }}"  required>
                                         @foreach($tipos_usuarios as $item)
                                         <option value="{{ $item->idc }}">{{$item->usuarios_rol}}</option>
                                         @endforeach
                               </select>
                            </div>
                        </div>
                        @endif

                        @if(Auth::user()->tipos_usuarios_id == 2)
                         <div class="form-group">
                            <label for="tipos_usuarios_id" class="col-md-4 control-label">Tipo_usuario</label>
                            <div class="col-md-6">

                                 <select name="tipos_usuarios_id" id="tipos_usuarios_id" class=" form-control" value="{{ old('tipos_usuarios_id') }}"  required>
                                         @foreach($tipos_usuariosr as $item)
                                         <option value="{{ $item->idc }}">{{$item->usuarios_rol}}</option>
                                         @endforeach
                               </select>
                            </div>
                        </div>
                         @endif


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
