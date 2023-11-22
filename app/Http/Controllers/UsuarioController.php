<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Usuarios;
use App\Users;
use App\Governor;
use App\Mayor;
use App\Advice;
use App\Assembly;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;
class UsuarioController extends Controller
 
 
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
     $re = \Auth::user()->id;
     $filtro = \Auth::user()->username;

     if($registrado == 1)

        {
           $request->user()->authorizeRoles(['admin']);
           $usuarios=usuarios::orderBy('id','DESC')->paginate(10);
           $usuariosOpciones =usuarios::pluck('usuario_ad', 'user_id')->unique();
           $conteo=usuarios::count();
           return view('Usuario.index')->with(["usuarios" => $usuarios, "usuariosOpciones" => $usuariosOpciones, "conteo" => $conteo]);
      
        }
        
 
    }



   
     //METODO FILTRO POR RANGO FECHAS
      /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fecha(Request $request)
    {   
        $registrado = \Auth::user()->tipos_usuarios_id;
        $ru = \Auth::user()->id;
        $filtro = \Auth::user()->username;

         if($registrado == 1)

         {
                $request->user()->authorizeRoles(['admin']);
                $valoruno=$request->from;
                $valordos=$request->to;
                $usuarios=usuarios::whereBetween('created_at', [$valoruno, $valordos])->paginate(10)->appends(request()->query());
                $usuariosOpciones=usuarios::pluck('usuario_ad', 'user_id')->unique();
                $conteo=usuarios::whereBetween('created_at', [$valoruno, $valordos])->count();
                return view('Usuario.index')->with(["usuarios" => $usuarios, "usuariosOpciones" => $usuariosOpciones, "conteo" => $conteo]);
         }

          


    }

 
 
       /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $registrado = \Auth::user()->tipos_usuarios_id;

          if($registrado == 1)
          {
             $request->user()->authorizeRoles(['admin']);
        
             return view('Usuario.create')->with('');
          }
          
          
  
    }
      
    
 
    public function store(Request $request)
    {
       
      $registrado = \Auth::user()->tipos_usuarios_id;

          if($registrado == 1)
             {

                $request->user()->authorizeRoles(['admin']);
                $this->validate($request,['user_id', 'usuario_ad'=>'required', 'fecha'=>'required', 'cargo'=>'required', 'dependencia'=>'required', 'dispo_afectado'=>'required', 'numero_contacto'=>'required', 'email'=>'required', 'cedula'=>'required', 'estado', 'falla_detectada']);

                  usuarios::create($request->all());
                  return redirect()->route('usuario.create')->with('success','Registro creado satisfactoriamente');

              }

                            
        
    }


     //METODO SELECCIONAR NOMBRE USUARIO ADMIN
      /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function selector(Request $request)

        {   

            $registrado = \Auth::user()->tipos_usuarios_id;
            $filtro = \Auth::user()->username;
            $filid = \Auth::user()->id;

          if($registrado == 1)

          {
          $request->user()->authorizeRoles(['admin']);
            $cc = $request->cc;
            $usuarios=usuarios::where("dependencia",$cc)->paginate(10);
            $usuariosOpciones =usuarios::pluck('usuario_ad', 'user_id')->unique();
            $conteo=usuarios::where("dependencia", $cc)->count();
            return view('Usuario.index')->with(["usuarios" => $usuarios, "usuariosOpciones" => $usuariosOpciones, "conteo" => $conteo]);
           }

                 

       }



     //METODO SELECCOINAR POR CEDULA
      /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cedula(Request $request)

        {
            $filtro = \Auth::user()->username;
            $ro = \Auth::user()->id;
            $registrado = \Auth::user()->tipos_usuarios_id;

            if($registrado == 1)

          {

            $request->user()->authorizeRoles(['admin']);
            $cc = $request->cc;
            $usuarios=usuarios::where("estado",$cc)->paginate(10);
            $usuariosOpciones =usuarios::pluck('usuario_ad', 'user_id')->unique();
            $conteo=usuarios::where("estado", $cc)->count();
            return view('Usuario.index')->with(["usuarios" => $usuarios, "usuariosOpciones" => $usuariosOpciones, "conteo" => $conteo]);

          }
            
         
           
     
     }


   


   //EDITAR POR ID
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
          $registrado = \Auth::user()->tipos_usuarios_id;
          $filtro = \Auth::user()->id;
          $filtrou = \Auth::user()->username;

          if($registrado == 1)
             {

               $request->user()->authorizeRoles(['admin']);
               $comprobarr=usuarios::where('id', $id)->get();
                  if ($comprobarr->isNotEmpty())
                       {

                            $usuarios=usuarios::find($id);
                            return view('Usuario.edit')->with(['usuarios' => $usuarios]);


                       }
                  else
                       {

                           return view('Usuario.error');
                       }

              }


     

       
     }






    //ACTUALIZAR POR ID
 
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
       
          if($registrado == 1)
          {
          
             $request->user()->authorizeRoles(['admin']);
             
             $this->validate($request,['user_id', 'fecha'=>'required', 'cargo'=>'required', 'dispo_afectado'=>'required', 'dispo_afectado'=>'required', 'numero_contacto'=>'required', 'email'=>'required', 'cedula'=>'required', 'estado', 'falla_detectada']);
 
               usuarios::find($id)->update($request->all());
               return redirect()->route('usuario.index')->with('success','Registro actualizado satisfactoriamente');
          }


    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $registrado = \Auth::user()->tipos_usuarios_id;

          if($registrado == 1)
          {
        
             $request->user()->authorizeRoles(['admin']);
             usuarios::find($id)->delete();
             return redirect()->route('usuario.index')->with('success','Registro eliminado satisfactoriamente');

          }


          


    }

    



}