@extends('layouts.layout')
@section('content')

<link rel="stylesheet" href="{!! asset('css/estilos.css') !!}">
<div id="principal02">
    <br>

    <!-- menu para administrador -->

    @if(Auth::user()->tipos_usuarios_id == 1)
    <table border="0" Cellspacing=0>
        <tr>
            <th colspan="6" align="center" bgcolor=#808080>PANEL PRINCIPAL</th>
        </tr>
        <tr>
            <td>
                <a href="{{ route('registros.index') }}"><img src="{{ asset('images/nuevo.png') }}" alt="mi foto"></a>
            </td>
            <td>
                <a href="{{ route('ecuentas.index') }}"><img src="{{ asset('images/engranaje.png') }}" alt="mi foto"></a>
            </td>
            <td>
                <a href="{{ route('usuario.create') }}"><img src="{{ asset('images/carpeta.png') }}" alt="mi foto"></a>
            </td>
            <td>
                <a href="{{ route('usuario.index') }}"><img src="{{ asset('images/consulta.png') }}" alt="mi foto"></a>
            </td>
        </tr>

        <tr>
            <td>Crear cuenta</td>
            <td>Editar cuenta</td>
            <td>Registro inventario</td>
            <td>Consulta invetario</td>
        </tr>
    </table>

    @endif
    <!-- FIN menu para administrador -->



    </tr>

    </form>

</div>


@endsection