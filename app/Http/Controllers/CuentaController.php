<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Usuarios;
use App\RoleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class CuentaController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 
 

//PAGINADO ESPECIAL CONSULTA REPORTES REFERIDO

     function paginateArray($data, $perPage = 4)
            {
                 $page = Paginator::resolveCurrentPage();
                    $total = count($data);
                      $results = array_slice($data, ($page - 1) * $perPage, $perPage);

                          return new LengthAwarePaginator($results, $total, $perPage, $page, [
                      'path' => Paginator::resolveCurrentPath(),
               ]);
            }




     //MOSTRAR CUENTAS ADMINISTRADORAS MODULO EDITAR CUENTA
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactivo(Request $request)
    { 
        $request->user()->authorizeRoles(['inactivo']);
        return view('Usuario.error');
    }



    //MOSTRAR CUENTAS ADMINISTRADORAS MODULO EDITAR CUENTA
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           $registrado = \Auth::user()->tipos_usuarios_id;
           $filtro = \Auth::user()->username;
 
        if($registrado == 1)

          {

            $request->user()->authorizeRoles(['admin']);
            $user=user::join('tipos_usuarios', 'users.tipos_usuarios_id', '=' , 'tipos_usuarios.idc')->paginate(10);
            $conteo=User::count();
            return view('Usuario.ecuenta')->with(["user" => $user, "conteo" => $conteo]);

          }


    }



    
    //METODO PARA FILTRAR USUARIOS ADMINISTRATIVOS MODULO EDITAR CUENTA
      /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filtusuario(Request $request)

        {
          
            $registrado = \Auth::user()->tipos_usuarios_id;


            if($registrado == 1)

           {

              $request->user()->authorizeRoles(['admin']);
              $filtros = $request->usuario;
              $user=user::join('tipos_usuarios', 'users.tipos_usuarios_id', '=' , 'tipos_usuarios.idc')->where("username",$filtros)->paginate(10);
              $conteo=user::where("username", $filtros)->count();
              return view('Usuario.ecuenta')->with(["user" => $user, "conteo" => $conteo]);

           }


        }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cestado(Request $request)
     
    {

      $filstado = \Auth::user()->username;
      $registrado = \Auth::user()->tipos_usuarios_id;

      if($registrado == 1)
          {

                 $request->user()->authorizeRoles(['admin']);
                 $valorestado = $request->confirmar;
                 $valorid = $request->idestado;
                 Usuarios::where('id', $valorid)->update(['estado' => $valorestado]);
                 return redirect()->route('cuenta.revisar')->with('success','Registro actualizado satisfactoriamente');


          }

    }
 


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {


        $registrado = \Auth::user()->tipos_usuarios_id;

        if($registrado == 1)
           {
              $request->user()->authorizeRoles(['admin']);
              $comprobar=user::where('id', $id)->get();
              
                if ($comprobar->isNotEmpty())
                    {
                       $user=user::find($id);
                       return view('Usuario.editcuenta',compact('user'));
                    }
                else
                    {
                       return view('Usuario.error');
                    }


           }

      
   } 
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {

       $registrado = \Auth::user()->tipos_usuarios_id;
        $filtro = \Auth::user()->username;

        if($registrado == 1)

          {

        $request->user()->authorizeRoles(['admin']);
        $this->validate($request,['name', 'last_name', 'username', 'email', 'password'=>'required|string|min:6|confirmed', 'password_confirmation'=>'required|min:6|same:password', 'tipos_usuarios_id']); 
 
        user::find($id)->update(['name'=>$request['name'], 'last_name'=>$request['last_name'], 'username'=>$request['username'], 'email'=>$request['email'], 'password'=>bcrypt($request['password']), 'tipos_usuarios_id'=>$request['tipos_usuarios_id']]);


        roleuser::where('user_id',$id)->update(['role_id'=>$request['tipos_usuarios_id']]);
    

        return redirect()->route('ecuentas.index')->with('success','Registro actualizado satisfactoriamente');

       }

     

    }


}
