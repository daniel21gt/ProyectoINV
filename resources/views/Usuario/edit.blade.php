@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">EDITOR INVENTARIO</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                         <form method="POST" action="{{ route('usuario.update',$usuarios->id) }}" role="form">

                           
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="user_id" id="user_id" class="form-control input-sm" placeholder="user_id" value="{{{ Auth::user()->id }}}" readonly="readonly" style="visibility:hidden">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="usuario_ad" id="usuario_ad" class="form-control input-sm" placeholder="usuario_ad" value="{{$usuarios->usuario_ad}}" style="visibility:hidden">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                        <input type="text" name="fecha" id="fecha" class="form-control input-sm" value="{{$usuarios->fecha}}">
                                    </div>
                                </div>
                             <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                                        <input type="text" name="cargo" id="cargo" class="form-control input-sm" value="{{$usuarios->cargo}}">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                
								<div class="col-xs-6 col-sm-6 col-md-6">
                                   	<div class="form-group{{ $errors->has('dependencia') ? ' has-error' : '' }}">

                                        <select name="dependencia" id="dependencia" class="form-control input-sm" value="{{ old('dependencia') }}" required>
                                            <option disabled selected>Investigación</option>
                                            <option {{old( 'dependencia')=='GEIH' ? 'selected="selected"': ''}} value="GEIH">GEIH</option>
                                            <option {{old( 'dependencia')=='ECP' ? 'selected="selected"': ''}} value="ECP">ECP</option>
											<option {{old( 'dependencia')=='EGIT' ? 'selected="selected"': ''}} value="EGIT">EGIT</option>
											<option {{old( 'dependencia')=='ECV' ? 'selected="selected"': ''}} value="ECV">ECV</option>
											<option {{old( 'dependencia')=='ECC' ? 'selected="selected"': ''}} value="ECC">ECC</option>
											<option {{old( 'dependencia')=='ENUT' ? 'selected="selected"': ''}} value="ENUT">ENUT</option>
                                        </select>

                                        @if ($errors->has('dependencia'))
                                        <span class="help-block">
                                      <strong>{{ $errors->first('dependencia') }}</strong>
                                  </span> @endif

                                    </div>
                                </div>
								
								
								
                                   <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('dispo_afectado') ? ' has-error' : '' }}">
                                        <input type="text" name="dispo_afectado" id="dispo_afectado" class="form-control input-sm" value="{{$usuarios->dispo_afectado}}">
                                    </div>
                                </div>
                            </div>
                                
                                

                        
                            <div class="row">
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('numero_contacto') ? ' has-error' : '' }}">
                                        <input type="text" name="numero_contacto" id="numero_contacto" class="form-control input-sm" value="{{$usuarios->numero_contacto}}">
                                    </div>
                                </div>
                              <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="text" name="email" id="email" class="form-control input-sm" value="{{$usuarios->email}}">
                                    </div>
                                </div>
                               
                            </div>


                            <div class="row">
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                        <input type="text" name="cedula" id="cedula" class="form-control input-sm" value="{{$usuarios->cedula}}">
                                    </div>
                                </div>

                              @if(Auth::user()->tipos_usuarios_id == 1)
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">

                                        <select name="estado" id="estado" class="form-control input-sm" value="{{ old('estado') }}" required>
                                            <option disabled selected>Estado</option>
                                            <option {{old( 'ciudad')=='Invenario' ? 'selected="selected"': ''}} value="Inventario">Inventario</option>
                                            <option {{old( 'ciudad')=='Asignado' ? 'selected="selected"': ''}} value="Asignado">Asignado</option>
                                        </select>

                                        @if ($errors->has('estado'))
                                        <span class="help-block">
                                      <strong>{{ $errors->first('estado') }}</strong>
                                  </span> @endif

                                    </div>
                                
                                </div>
                                @endif

                            </div>


                        <div class="row">
                            @if(Auth::user()->tipos_usuarios_id == 1)
                              <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <label for="falla_detectada">Comentario (Maximo 200 caracteres)</label>
                                        <textarea rows="4" cols="50" name="falla_detectada" id="falla_detectada" class="form-control input-sm">{{ ucfirst($usuarios->falla_detectada) }} 
                                        </textarea> 
                                    </div>
                                 </div>
                                  @endif

                            </div>
                     
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="btn btn-success btn-block">
                                </div>

                            </div>
                        </form>
                    
                    </div>
                    
                 </div>
            </div>

         </div>
    </section>
 </div>
@endsection