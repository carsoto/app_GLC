<?php

namespace App\Http\Controllers;

use App\Charter;
use App\Embarcacion;
use App\TipoEmbarcacion;
use App\Intermediario;
use App\Pasajero;
use App\TipoCharter;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use DB;
use Redirect;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class ChartersController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('admin.charters.dashboard_charters');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $embarcacion = Embarcacion::all();
        $tipo_embarcacion = TipoEmbarcacion::all();
        $intermediarios = Intermediario::all();
        return view('admin.charters.registrar_charter', ['embarcacion' => $embarcacion, 'tipo_embarcacion' => $tipo_embarcacion, 'intermediarios' => $intermediarios]);
    }

    public function store(Request $request)
    {        
        $error = null;
        DB::beginTransaction();
        $costo_total = 0;

        try {

            $t_charters = $request->tipo_charter;
            $contrato = Input::file('archivo_contrato');
            $destinoPath = public_path().'/images/contratos/';
            $name_file = time()."_".$contrato->getClientOriginalName();
            $subirContrato = $contrato->move($destinoPath, $name_file);
                
            $charter = new Charter;
            $charter->intermediarios_id = $request->intermediario_id;
            $charter->codigo = $request->id_charter;
            $charter->cliente = $request->cliente;

            if($subirContrato){
                $charter->contrato = $name_file;
            }else{
                $charter->contrato = "Sin contrato";
            }

            if(count($t_charters) > 1){
                $charter->tipo_charter = "Mixto";
            }else{
                $charter->tipo_charter = "Normal";
            }
            
            $charter->costo = $costo_total;

            $charter->save();

            for ($i = 0; $i < count($t_charters); $i++) { 
                
                $tipo_charter = new TipoCharter;

                $tipo_embarcacion = str_replace(" ", "_", $t_charters[$i]);
                $request->input($tipo_embarcacion."_f_inicio");

                $embarcacion = $request->input($tipo_embarcacion."_embarcacion");
                $c_pasajeros = $request->input($tipo_embarcacion."_c_pasajeros");
                $f_inicio = $request->input($tipo_embarcacion."_f_inicio");
                $f_fin = $request->input($tipo_embarcacion."_f_fin");
                
                $arr_f_inicio = explode("/", $f_inicio);
                $f_inicio = $arr_f_inicio[2]."-".$arr_f_inicio[1]."-".$arr_f_inicio[0];

                $arr_f_fin = explode("/", $f_fin);
                $f_fin = $arr_f_fin[2]."-".$arr_f_fin[1]."-".$arr_f_fin[0];
                $deluxe = $request->input($tipo_embarcacion."_deluxe");

                if($deluxe == 'on'){
                    $deluxe = "Si";
                }else{
                    $deluxe = "No";
                }

                $tipo_charter->charters_id = $charter->id;
                $tipo_charter->embarcacion_id = $embarcacion;
                $tipo_charter->nro_pax = $c_pasajeros;
                $tipo_charter->f_inicio = $f_inicio;
                $tipo_charter->f_fin = $f_fin;
                $tipo_charter->deluxe = $deluxe;
                $tipo_charter->tarifa_contrato = $request->input($tipo_embarcacion."_t_contrato");
                $tipo_charter->tarifa_neta = $request->input($tipo_embarcacion."_t_neta");
                $tipo_charter->comision_intermediario = $request->input($tipo_embarcacion."_t_interm");
                $tipo_charter->comision_glc = $request->input($tipo_embarcacion."_t_glc");

                $costo_total += $request->input($tipo_embarcacion."_t_contrato");
                $tipo_charter->save();
            }

            Charter::where('id', $charter->id)->update(array('costo' => $costo_total));

            DB::commit();
            $success = true;
        } 

        catch (\Exception $e) {
            $success = false;
            $error = $e->getMessage();
            DB::rollback();
        }

        if ($success) {
            return Redirect::action('ChartersController@index');
        }

        else{
           throw new \Exception('Error en la transaccion');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        $charter = Charter::where('codigo',  $codigo)->get();
        $tipo_charter = TipoCharter::where('charters_id',  $charter[0]->id)->get();
        return view('admin.charters.ver_charter', ['charter' => $charter, 'codigo' => $codigo, 'tipo_charter' => $tipo_charter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $charter = Charter::where('codigo',  $codigo)->get();
        $tipo_charter = TipoCharter::where('charters_id',  $charter[0]->id)->get();
        $parentescos = array('Abuelo/a', 'Bisabuelo/a', 'Cuñado/a', 'Hermano/a', 'Hijo/a', 'Nieto/a', 'Padrastro/Madrastra', 'Padre/Madre', 'Primo/a', 'Sobrino/a', 'Suegro/a', 'Tío/a', 'Yerno/Nuera', 'Otro');

        /*foreach ($charter as $charter) {
            $lista_pasajeros[$charter->embarcacion->tipo_embarcacion->desc_tipo] = Pasajero::where('charters_id',  $charter->id)->get();
        }*/

        return view('admin.charters.editar_charter', ['charters' => $charters, 'codigo' => $codigo, 'parentescos' => $parentescos, 'lista_pasajeros' => $lista_pasajeros]);
    }

    public function update(Request $request){
        dd($request);
    }

    public function verApa()
    {
        return view('admin.charters.apa.ver_apa');
    }

    /**
     * @return mixed
     */
    public function getCharters()
    {
        $charters = Charter::select(['intermediarios.nombre', 'codigo', 'cliente', 'tipo_charter', 'costo'])
                            ->join('intermediarios','intermediarios.id','=','intermediarios_id');

        return Datatables::of($charters)
            ->addColumn('action', function ($charters) {
                return '<a href="charters/apa/ver_apa/'.$charters['codigo'].'"><i class="fa fa-money fa-fw" title="APA"></i></a> <a href="charters/ver/'.$charters['codigo'].'"><i class="fa fa-eye fa-fw" title="Ver"></i></a> <a href="charters/editar/'.$charters['codigo'].'"><i class="fa fa-edit fa-fw" title="Editar"></i></a> <a href="'.$charters['codigo'].'"><i class="fa fa-file-pdf-o fa-fw" title="Contrato"></i></a>';
            })
            ->editColumn('codigo', '{{$codigo}}')
            ->make(true);
    }
}