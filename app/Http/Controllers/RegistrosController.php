<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\TiposUsuarios;
use Validator;
use App\Http\Controllers\Resquest;
use App\Http\Requests;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegistrosController extends Controller
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
    
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        $registrado = \Auth::user()->tipos_usuarios_id;
 
        if($registrado == 1)

          {

              $request->user()->authorizeRoles(['admin']);
              $tipos_usuarios = \DB::table('tipos_usuarios')->select('idc', 'usuarios_rol')->get();
              return view('auth.register')->with('tipos_usuarios', $tipos_usuarios);

         }

     


    }

      

 

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $registrado = \Auth::user()->tipos_usuarios_id;


      if($registrado == 1)
          {

            $request->user()->authorizeRoles(['admin']);
            $data = request()->validate([
			'refer' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|max:15|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'tipos_usuarios_id' => 'required|integer',
            ]);


             User::create([
			'refer' => $data['refer'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tipos_usuarios_id' => $data['tipos_usuarios_id'],
             ]);
        
        $user=user::all()->last();


           if($user->tipos_usuarios_id == 1)
          {

                $user->roles()->attach(Role::where('name', 'admin')->first());
                
          }
          

          return redirect()->route('registros.store')->with('success','Registro creado satisfactoriamente');


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
