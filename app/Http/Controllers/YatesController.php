<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yate;
use App\CompaniasYate;
use App\ModelosYate;
use App\TiposPatente;
use App\Puerto;
use Yajra\Datatables\Datatables;

class YatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.yates.dashboard_yates');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companias_yate = CompaniasYate::pluck('razon_social', 'id');
        $modelos = ModelosYate::pluck('descripcion', 'id');
        $tipos_patente = TiposPatente::pluck('descripcion', 'id');
        $puertos = Puerto::pluck('descripcion', 'id');
        $dias = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday');

        return view('admin.yates.create', array('companias_yate' => $companias_yate, 'modelos' => $modelos, 'tipos_patente' => $tipos_patente, 'puertos' => $puertos, 'dias' => $dias));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $yate = new Yate($request->all());
        if($yate->save()){
            return Redirect::action('YatesController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function getYates()
    {
        $yates = Yate::select(['yates.id', 'nombre', 'capacidad', 'puertos.descripcion AS puerto', 'companias_yate.razon_social', 'modelos_yate.descripcion AS modelo', 'tipos_patente.descripcion AS patente'])
                                ->join('puertos','puertos.id','=','puerto_registro_id')
                                ->join('companias_yate','companias_yate.id','=','companias_yate_id')
                                ->join('modelos_yate','modelos_yate.id','=','modelos_yate_id')
                                ->join('tipos_patente','tipos_patente.id','=','tipos_patente_id');

        return Datatables::of($yates)
            ->addColumn('action', function ($yates) {
                return '<a href="yates/ver/'.$yates['id'].'"><i class="fa fa-eye fa-fw" title="Ver"></i></a> <a href="yates/editar/'.$yates['id'].'"><i class="fa fa-edit fa-fw" title="Editar"></i></a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
}
