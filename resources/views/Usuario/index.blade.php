@extends('layouts.layout')
@section('content')

  <section class="content">
    <!-- <div class="col-md-10 col-md-offset-1"> -->
    <table style="width:98%; margin-left:auto; margin-right:auto" border="0.1">
        <tr>
            <td>
                @if(Session::has('success'))
                <div class="alert alert-info">
                    {{Session::get('success')}}
                </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Inventario general:{{ $conteo }}</h3>
                        <br>

                        <table style="width:20%;" border="0">
                            <tr>
                                <td style="width:25%;">
                                    <form action="{{route('usuario.cedula')}}" method="post">
                                        {{csrf_field()}}
                                        <table style="width:100%;" border="0">
                                            <tr>
                                                <td style="width:50%;" border="0">

                                                    <input type="text" name="cc" id="cc" class="form-control input-sm" value="{{ old('cedula') }}" placeholder="Consultar estado" style="width:100%;">
                                                </td>

                                                <td style="width:50%;" border="1">
                                                    <button type="submit" class="btn btn-primary">enviar</button>
                                                </td>
												
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>
						 <br>
						  <table style="width:20%;" border="0">
                            <tr>
                                <td style="width:25%;">
                                    <form action="{{route('usuario.selector')}}" method="get">
                                        {{csrf_field()}}
                                        <table style="width:100%;" border="0">
                                            <tr>
                                                <td style="width:50%;" border="0">

                                                    <input type="text" name="cc" id="cc" class="form-control input-sm" value="{{ old('selector') }}" placeholder="Consultar investigación" style="width:100%;">
                                                </td>

                                                <td style="width:50%;" border="1">
                                                    <button type="submit" class="btn btn-primary">enviar</button>
                                                </td>
												
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>

                        <br>

                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped table-bordered">
                                <thead>
                                    <th>Id</th>
                                    <th>Fecha de registro</th>
                                    <th>Tipo</th>
                                    <th>Investigacion</th>
                                    <th>Marca DMC</th>
                                    <th>Serial</th>
                                    <th>IMEI</th>
                                    <th>Estado</th>
                                    <th>Nombre contratista</th>
									<th>Correo</th>
                                    @if(Auth::user()->hasRole('admin'))
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                    @endif 
                                </thead>
                                <tbody>
                                    @if($usuarios->count()) @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->id}}</td>
                                        <td>{{$usuario->fecha}}</td>
                                        <td>{{$usuario->cargo}}</td>
                                        <td>{{$usuario->dependencia}}</td>
                                        <td>{{$usuario->dispo_afectado}}</td>
                                        <td>{{$usuario->numero_contacto}}</td>
                                        <td>{{$usuario->cedula}}</td>
                                        <td>{{$usuario->estado}}</td>
                                        <td>{{$usuario->falla_detectada}}</td>
										<td>{{$usuario->email}}</td>
                                        @if(Auth::user()->hasRole('admin'))
                                        <td><a class="btn btn-primary btn-xs" href="{{action('UsuarioController@edit', $usuario->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                        @endif 
                                        @if(Auth::user()->hasRole('admin'))
                                        <td>
                                            <form action="{{action('UsuarioController@destroy', $usuario->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                            </form>
                                        </td>
                                        @endif 
                                    </tr>
                                    @endforeach 
                                    @else
                                    <tr>
                                        <td colspan="8">No hay registro !!</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                      </td>
                 </tr>
          </table>
    <!-- </div> -->
    </div>
    {{ $usuarios->links() }}
    </div>
    </div>

</section>
 
@endsection
@section('scripts')

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  $( function() {
    $('#datepicker').datepicker({});
      from = $( "#from" )
        .datepicker({
          dateFormat:'yy-mm-dd',
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        dateFormat:'yy-mm-dd',
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script> 
@endsection