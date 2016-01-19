<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LocalRequest;
use App\Http\Requests\LocalUpdateAlmacenRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Local;
use App\Auditoria;
/*
*FARCADES
 */
use Laracasts\Flash\Flash;

class AlmacenesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $almacenes = Local::SearchLocal($request -> name) -> orderBy('id','ASC')-> where('type','almacen') -> paginate(10);
        $view = view('admin.almacenes.index',['almacenes'=>$almacenes]);
        
        if($request -> ajax()){
            return view('admin.almacenes.search_almacen',['almacenes'=>$almacenes]);        
        }else{
            return $view;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.almacenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalRequest $request)
    {
        $almacen = Local::create($request->all());
        $almacen -> type = 'almacen';
        $almacen -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha creado un nuevo Almacen: ID: '. $almacen -> id .   ' - Nombre: '   .    $almacen -> nombre;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();
        //$auditoria ->  user() -> associate($user)

        Flash::success('Almacen creado exitosamente');
        return redirect()->route('admin.almacenes.index');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $almacen = Local::find($id);
        return view('admin.almacenes.show',['almacen'=>$almacen]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $almacen = Local::find($id);
        return view('admin.almacenes.edit',['almacen'=>$almacen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocalUpdateAlmacenRequest $request, $id)
    {
        $almacen = Local::find($id);
        $almacen -> fill($request->all());        
        $almacen -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Actualizado almacen: '.$almacen->nombre .' por usuario: '. \Auth::user()->name;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();

        Flash::success('Almacen editado exitosamente');
        return redirect()->route('admin.almacenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $almacen = Local::find($id);
        $almacen -> estatus = 'inactivo';
        $almacen -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha eliminado un almacen logicamente de la base de datos ID: '. $almacen -> id .   ' - Nombre: '   .    $almacen -> nombre;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();

        Flash::success('Almacen eliminado exitosamente');
        return redirect()->route('admin.almacenes.index');
    }

    /**
     * Active the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $almacen = Local::find($id);
        $almacen -> estatus = 'activo';
        $almacen -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha activado un almacen ID: '. $almacen -> id .   ' - Nombre: '   .    $almacen -> nombre;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();

        Flash::success('Almacen activado exitosamente');
        return redirect()->route('admin.almacenes.index');
    }
}
