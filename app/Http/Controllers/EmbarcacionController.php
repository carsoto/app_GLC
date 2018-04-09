<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Embarcacion;
use App\CompaniasEmbarcacion;
use App\ModelosEmbarcacion;
use App\TiposPatente;
use App\Puerto;
use App\TemporadasAlta;
use App\Itinerario;
use App\Tarifario;
use App\EmbarcacionItinerario;
use App\Dia;
use Yajra\Datatables\Datatables;
use DB;
use Redirect;

class EmbarcacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.embarcacion.dashboard_embarcacion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companias_embarcacion = CompaniasEmbarcacion::pluck('razon_social', 'id');
        $modelos = ModelosEmbarcacion::pluck('descripcion', 'id');
        $tipos_patente = TiposPatente::pluck('descripcion', 'id');
        $puertos = Puerto::pluck('descripcion', 'id');
        $dias = Dia::pluck('dia', 'id');

        return view('admin.embarcacion.create', array('companias_embarcacion' => $companias_embarcacion, 'modelos' => $modelos, 'tipos_patente' => $tipos_patente, 'puertos' => $puertos, 'dias' => $dias));
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
                $temporada_alta->embarcacion_id = $yate->id;
                $temporada_alta->desde = $f_inicio;
                $temporada_alta->hasta = $f_fin;
                $temporada_alta->save();
            }

            for ($j=0; $j < count($data['gross']); $j++) {
                $tarifario = new Tarifario();
                $tarifario->embarcacion_id = $yate->id;
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
                        $itinerario_yate = new EmbarcacionItinerario();
                        $itinerario_yate->embarcacion_id = $yate->id;
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
            return Redirect::action('embarcacionController@index');
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

        return view('admin.embarcacion.ver', array('yate' => $yate, 'itinerarios' => $itinerarios, 'dias' => $dias));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yate = Yate::find($id);
        $itinerarios = array();
        $dias = Dia::pluck('dia', 'id');
        $companias_embarcacion = CompaniasEmbarcacion::pluck('razon_social', 'id');
        $modelos = ModelosEmbarcacion::pluck('descripcion', 'id');
        $tipos_patente = TiposPatente::pluck('descripcion', 'id');
        $puertos = Puerto::pluck('descripcion', 'id');
        $dias = Dia::pluck('dia', 'id');

        foreach ($yate->itinerarios as $itinerario) {
            $itinerarios[$itinerario->nombre][$itinerario->pivot->orden]['dia'] = $itinerario->pivot->id_dia;
            $itinerarios[$itinerario->nombre][$itinerario->pivot->orden]['am'] = $itinerario->pivot->am;
            $itinerarios[$itinerario->nombre][$itinerario->pivot->orden]['pm'] = $itinerario->pivot->pm;
        }

        return view('admin.embarcacion.editar', array('yate' => $yate, 'itinerarios' => $itinerarios, 'companias_embarcacion' => $companias_embarcacion, 'modelos' => $modelos, 'tipos_patente' => $tipos_patente, 'puertos' => $puertos, 'dias' => $dias));
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

    public function getEmbarcacion()
    {
        $embarcacion = Embarcacion::select(['embarcacion.id', 'nombre', 'capacidad', 'puertos.descripcion AS puerto', 'companias_embarcacion.razon_social AS razon_social', 'modelos_embarcacion.descripcion AS modelo', 'tipos_patente.descripcion AS patente'])
                                ->join('puertos','puertos.id','=','puerto_registro_id')
                                ->join('companias_embarcacion','companias_embarcacion.id','=','companias_embarcacion_id')
                                ->join('modelos_embarcacion','modelos_embarcacion.id','=','modelos_embarcacion_id')
                                ->join('tipos_patente','tipos_patente.id','=','tipos_patente_id');

        return Datatables::of($embarcacion)
            ->addColumn('action', function ($embarcacion) {
                return '<a href="embarcacion/ver/'.$embarcacion['id'].'"><i class="fa fa-eye fa-fw" title="Ver"></i></a> <a href="embarcacion/editar/'.$embarcacion['id'].'"><i class="fa fa-edit fa-fw" title="Editar"></i></a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
}
