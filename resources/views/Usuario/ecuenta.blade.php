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
        <div class="panel-body">
         
            <table style="width:100%;" border="0" ><tr>
            @if(Auth::user()->hasRole('admin'))
             <td style="width:100%;">  
                <form action="{{route('usuario.filtusuario')}}" method="post">
                   {{csrf_field()}}
                     <table style="width:100%;" border="0">
                        <tr><td style="width:70%;" border="0"> <h3>Número de usuarios:{{ $conteo }}</h3> </td>
                        <td style="width:20%;" border="0">  
      
                    <input type="text" name="usuario" id="usuario" class="form-control input-sm"  placeholder="Usuario"  style="width:100%;"></td>
          
                <td style="width:10%;" border="1"><button type="submit" class="btn btn-primary">enviar</button>   
				
              </td>
            </tr>
            </table> 
          </form>
        </td>
       @endif

      </tr>
      </table>

<br>
             
           
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped table-bordered">
             <thead>
               <th>Nombre usuario</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Email</th>
               @if(Auth::user()->hasRole('admin'))
               <th>Id usuario</th>
                @endif
               
             </thead>
             <tbody>
              @if($user->count()) 
              @foreach($user as $users)  
              <tr>
                <td>{{$users->username}}</td>
                <td>{{$users->name}}</td>
                <td>{{$users->last_name}}</td>
                <td>{{$users->email}}</td>
                @if(Auth::user()->hasRole('admin'))
                <td>{{$users->id}}</td>
                @endif
               
                @if(Auth::user()->hasRole('admin'))
                <td><a class="btn btn-primary btn-xs" href="{{action('CuentaController@edit', $users->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
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
        </div>
      </div>
      {{ $user->links() }}
    </div>
  </div>



</section>
 
@endsection