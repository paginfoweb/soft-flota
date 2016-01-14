<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Auditoria;
use App\Local;
/*
* FARCADES
 */
use Laracasts\Flash\Flash;

class UsersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::orderBy('id','DESC')->paginate(10);
       return view('admin.users.index')-> with('users',$users); //paso de variables
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $talleres = local::orderBy('id','DESC')->where('type','taller')->lists('nombre','id');
        $almacenes = local::orderBy('id','DESC')->where('type','almacen')->lists('nombre','id');
        //Category::orderBy('id','ASC')->lists('name','id');
        return view('admin.users.create',['talleres'=>$talleres,'almacenes'=>$almacenes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        $user -> password = bcrypt($request->password);        
        $user -> type = $request -> type;
        $user -> save();

        //$user -> almacenes()->sync($request->almacen_id);
        if($request -> type == 'taller'){
            $user -> locales()->attach($request->taller_id);
        }elseif($request -> type == 'almacenista'){            
            $user -> locales()->attach($request->almacen_id);
        }

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha creado un nuevo usuario: ID: '. $user -> id .   ' - Nombre: '   .    $user -> name;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();
        //$auditoria ->  user() -> associate($user)

        Flash::success('Usuario creado exitosamente');
        return redirect()->route('admin.users.index'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user->locales->ToArray();        
        return view ('admin.users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
   
        $talleres   = Local::orderBy('nombre','DESC')->where('type','taller')->lists('nombre','id');
        $my_taller  = $user->locales->lists('id')->ToArray();
        $almacenes  = Local::orderBy('nombre','DESC')->where('type','almacen')->lists('nombre','id');
        $my_almacen = $user->locales->lists('id')->ToArray();        

        
        return view('admin.users.edit',['user'=>$user,'talleres'=>$talleres,'almacenes'=>$almacenes,
                                        'my_taller'=>$my_taller,'my_almacen'=>$my_almacen]);
       
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);            
        $user -> fill($request->all());
        $user -> type = $request->type;
        $user -> save();

        
        if($request -> type == 'taller'){
            $user ->    locales()   -> sync($request->taller_id);
        }elseif($request -> type == 'almacenista'){
            $user ->    locales()    -> sync($request->almacen_id);
        }

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha actualizado un usuario: ID: '. $user -> id .   ' - Nombre: '   .    $user -> name;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();
        //$auditoria ->  user() -> associate($user)

        Flash::success('Usuario Actualizado exitosamente');
        return redirect()->route('admin.users.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user ->estatus = 'inactivo';
        $user -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha eliminado un usuario logicamente de la base de datos ID: '. $user -> id .   ' - Nombre: '   .    $user -> name;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();

        Flash::success('Usuario Eliminado exitosamente');
        return redirect()->route('admin.users.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $user = User::find($id);
        $user ->estatus = 'activo';
        $user -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha activado un usuario del sistema ID: '. $user -> id .   ' - Nombre: '   .    $user -> name;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();

        Flash::success('Usuario activado exitosamente');
        return redirect()->route('admin.users.index');
    }
}
