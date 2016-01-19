<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocalRequest;
use App\Http\Requests\LocalUpdateRequest;
use App\Local;
use App\Auditoria;
/*
*FARCADES
 */
use Laracasts\Flash\Flash;

class TalleresControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $talleres = Local::SearchLocal( $request -> name )->orderBy('id','ASC') -> where('type','taller') -> paginate(10);
        $view = view('admin.talleres.index',['talleres'=>$talleres]);
        /*
        *   Validamos si la consulta es por ajax para saber que datos mostramos
         */
        if($request -> ajax()){            
            return view('admin.talleres.search_taller',['talleres'=>$talleres]);
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
        return view('admin.talleres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalRequest $request)
    {
        
        $taller = Local::create($request->all());  
        $taller -> type = 'taller';
        $taller -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha creado un nuevo Taller: ID: '. $taller -> id .   ' - Nombre: '   .    $taller -> nombre;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();
        //$auditoria ->  user() -> associate($user)

        Flash::success('Taller creado exitosamente');
        return redirect()->route('admin.talleres.index');     
        
       //dd(\Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taller = Local::find($id);
        return view ('admin.talleres.show',['taller'=>$taller]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taller = Local::find($id);
        return view('admin.talleres.edit',['taller'=>$taller]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocalUpdateRequest $request, $id)    
    {
        $taller =  Local::find($id);
        $taller -> fill($request->all());
        $taller -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Actualizado taller: '. $taller->nombre .' por usuario: '. \Auth::user()->name;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();

        Flash::success('Taller editado con exito');
        return redirect()->route('admin.talleres.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taller = Local::find($id);
        $taller -> estatus = 'inactivo';
        $taller -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha eliminado un taller logicamente de la base de datos ID: '. $taller -> id .   ' - Nombre: '   .    $taller -> nombre;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();

        Flash::success('Taller eliminado exitosamente');
        return redirect()->route('admin.talleres.index');
    }

    public function active($id)
    {
        $taller = Local::find($id);
        $taller -> estatus = 'activo';
        $taller -> save();

        $auditoria = new Auditoria;
        $auditoria -> content = 'Ha activado un taller ID: '. $taller -> id .   ' - Nombre: '   .    $taller -> nombre;
        $auditoria -> user_id = \Auth::user()->id;
        $auditoria -> save();

        Flash::success('Taller activado exitosamente');
        return redirect()->route('admin.talleres.index');
    }
}
