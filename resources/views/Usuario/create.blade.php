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
                    <h3 class="panel-title">Registro de DMC.</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                         <form method="post" action="{{ route('usuario.store') }}" role="form">
                           
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="user_id" id="user_id" class="form-control input-sm" placeholder="user_id" value="{{{ Auth::user()->id }}}" readonly="readonly" style="visibility:hidden">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="usuario_ad" id="usuario_ad" class="form-control input-sm" placeholder="usuario_ad" value="{{{ Auth::user()->username }}}" readonly="readonly" style="visibility:hidden">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                        <input type="date" name="fecha" id="fecha" class="form-control input-sm" value="{{ old('fecha') }}" placeholder="fecha"> @if ($errors->has('fecha'))
                                        <span class="help-block">
                                      <strong>{{ $errors->first('fecha') }}</strong>
                                  </span> @endif

                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                
									
							      <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                                        <input type="text" name="cargo" id="cargo" class="form-control input-sm" value="{{ old('cargo') }}" placeholder="Tipo"> @if ($errors->has('cargo'))
                                        <span class="help-block">
                                      <strong>{{ $errors->first('cargo') }}</strong>
                                  </span> @endif

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
                                        <input type="text" name="dispo_afectado" id="dispo_afectado" class="form-control input-sm" value="{{ old('dispo_afectado') }}" placeholder="Marca"> @if ($errors->has('cargo'))
                                        <span class="help-block">
                                      <strong>{{ $errors->first('dispo_afectado') }}</strong>
                                  </span> @endif

                                    </div>
									
										
                                </div>
                            </div>
                                
                                

                        
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('numero_contacto') ? ' has-error' : '' }}">
                                        <input type="number" name="numero_contacto" id="numero_contacto" class="form-control input-sm" value="{{ old('numero_contacto') }}" placeholder="Serial"> @if ($errors->has('numero_contacto'))
                                        <span class="help-block">
                                      <strong>{{ $errors->first('numero_contacto') }}</strong>
                                  </span> @endif

                                    </div>
                                </div>
                              
                               <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="email" name="email" id="email" class="form-control input-sm" value="{{ old('email') }}" placeholder="Correo"> @if ($errors->has('email'))
                                        <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span> @endif

                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('cedula') ? ' has-error' : '' }}">
                                        <input type="number" name="cedula" id="cedula" class="form-control input-sm" value="{{ old('cedula') }}" placeholder="IMEI"> @if ($errors->has('cedula'))
                                        <span class="help-block">
                                      <strong>{{ $errors->first('cedula') }}</strong>
                                  </span> @endif

                                    </div>
                                </div>
                              
                              @if(Auth::user()->tipos_usuarios_id == 1)
                              
								<div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">

                                        <select name="estado" id="estado" class="form-control input-sm" value="{{ old('estado') }}" placeholder="Estado">
                                            <option {{old( 'Asignado')=='Asignado' ? 'selected="selected"': ''}} value="Asignado">Asignado</option>
                                            <option {{old( 'Inventario')=='Inventario' ? 'selected="selected"': ''}} value="Inventario">Inventario</option>
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
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                 <div class="form-group {{ $errors->has('falla_detectada') ? ' has-error' : '' }}">
                                        <textarea rows="4" cols="50" name="falla_detectada" id="falla_detectada" class="form-control input-sm" maxlength="200" placeholder="Se fue asiganda el nombre del contratista en caso contrario el estado es disponible" required>{{ old('falla_detectada') }}
                                        </textarea> @if ($errors->has('falla_detectada'))
                                        <span class="help-block">
                                      <strong>{{ $errors->first('falla_detectada') }}</strong>
                                  </span> @endif
                                </div>
                              </div>	
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