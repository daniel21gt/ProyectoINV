@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-10 col-md-offset-1">

			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar cuenta</h3> 
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('ecuentas.update',$user->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="username" id="username" readonly="readonly "class="form-control input-sm" value="{{$user->username}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="last_name" id="last_name" class="form-control input-sm" value="{{$user->last_name}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="name" id="name"  class="form-control input-sm" value="{{$user->name}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="email" id="email" class="form-control input-sm" value="{{$user->email}}">
									</div>
								</div>
							</div>

							<div class="row">
                              <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                       <input type="password" name="password" class="form-control" id="password" placeholder="New password">
                                           @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                              </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                     <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password">
                                 </div>
                              </div>
					      </div>

                         @if(Auth::user()->hasRole('admin'))
					      <div class="row" style="display: none">
                              <div class="col-xs-6 col-sm-6 col-md-6">
                              	<div class="form-group">
                                <select name="tipos_usuarios_id" id="tipos_usuarios_id" placeholder="rol" class=" form-control" required>
                                	 <option value="{{$user->tipos_usuarios_id}}">{{$user->tipos_usuarios_id}}</option>
                                     
                                
                                     @if($user->tipos_usuarios_id == 1)
                                     <option value="2">Referido</option>
                                     @endif
                                      
                                </select>
                              </div>
                            </div>
                          </div>
                        @endif
           



							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
		
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection