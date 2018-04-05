<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yate;
use App\CompaniasYate;
use App\ModelosYate;
use App\TiposPatente;
use App\Puerto;
use App\TemporadasAlta;
use App\Itinerario;
use App\Tarifario;
use App\YatesItinerario;
use App\Dia;
use Yajra\Datatables\Datatables;
use DB;
use Redirect;

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
        $dias = Dia::pluck('dia', 'id');

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
        $data = $request->all();
        $yate = new Yate($data);
        
        if($yate->save()){
            
            for ($i=0; $i < count($data['from']); $i++) { 
                $arr_f_inicio = explode("/", $data['from'][$i]);
                $f_inicio = $arr_f_inicio[2]."-".$arr_f_inicio[1]."-".$arr_f_inicio[0];

                $arr_f_fin = explode("/", $data['to'][$i]);
                $f_fin = $arr_f_fin[2]."-".$arr_f_fin[1]."-".$arr_f_fin[0];

                $temporada_alta = new TemporadasAlta();
                $temporada_alta->yates_id = $yate->id;
                $temporada_alta->desde = $f_inicio;
                $temporada_alta->hasta = $f_fin;
                $temporada_alta->save();
            }

            for ($j=0; $j < count($data['gross']); $j++) {
                $tarifario = new Tarifario();
                $tarifario->yates_id = $yate->id;
                $tarifario->cant_dias = $data['cant_dias'][$j];
                $tarifario->gross = $data['gross'][$j];
                $tarifario->neto = $data['neto'][$j];
                $tarifario->comision_glc = $data['comision_glc'][$j];
                $tarifario->save();
            }

            foreach ($data['am'] as $key => $value) {
                $itinerario = new Itinerario();
                $itinerario->nombre = $key;

                if($itinerario->save()){
                    for ($k=0; $k < count($value); $k++) { 
                        $itinerario_yate = new YatesItinerario();
                        $itinerario_yate->yates_id = $yate->id;
                        $itinerario_yate->itinerarios_id = $itinerario->id;
                        $itinerario_yate->orden = $k;
                        $itinerario_yate->id_dia = $data['dias'][$key][$k];
                        $itinerario_yate->am = $value[$k];
                        $itinerario_yate->pm = $data['pm'][$key][$k];
                        $itinerario_yate->save();
                    }
                }
            }
            
            /*echo $yate->id;
            dd($request->all());*/
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
        $yate = Yate::find($id);
        $itinerarios = array();
        $dias = Dia::pluck('dia', 'id');

        foreach ($yate->itinerarios as $itinerario) {
            $itinerarios[$itinerario->nombre][$itinerario->pivot->orden]['dia'] = $itinerario->pivot->id_dia;
            $itinerarios[$itinerario->nombre][$itinerario->pivot->orden]['am'] = $itinerario->pivot->am;
            $itinerarios[$itinerario->nombre][$itinerario->pivot->orden]['pm'] = $itinerario->pivot->pm;
        }

        return view('admin.yates.ver', array('yate' => $yate, 'itinerarios' => $itinerarios, 'dias' => $dias));
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
        $yates = Yate::select(['yates.id', 'nombre', 'capacidad', 'puertos.descripcion AS puerto', 'companias_yate.razon_social AS razon_social', 'modelos_yate.descripcion AS modelo', 'tipos_patente.descripcion AS patente'])
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
