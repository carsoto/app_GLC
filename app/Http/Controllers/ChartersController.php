<?php

namespace App\Http\Controllers;

use App\Charter;
use App\Embarcacion;
use App\TipoEmbarcacion;
use App\Intermediario;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use DB;
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
        $codigo_charter = $_POST["id_charter"];
        $tipo_charter = $_POST["tipo_charter"];
        $cliente = $_POST["cliente"];
        $intermediario = $_POST["intermediario_id"];
        //$contrato = "contrato.pdf";

        for ($i = 0; $i < count($tipo_charter); $i++) { 
            $charter = new Charter;
            
            $tipo_embarcacion = str_replace(" ", "_", $tipo_charter[$i]);

            $embarcacion = $_POST[$tipo_embarcacion."_embarcacion"];
            $c_pasajeros = $_POST[$tipo_embarcacion."_c_pasajeros"];
            $f_inicio = $_POST[$tipo_embarcacion."_f_inicio"];
            $f_fin = $_POST[$tipo_embarcacion."_f_fin"];
            
            $arr_f_inicio = explode("/", $f_inicio);
            $f_inicio = $arr_f_inicio[2]."-".$arr_f_inicio[1]."-".$arr_f_inicio[0];

            $arr_f_fin = explode("/", $f_fin);
            $f_fin = $arr_f_fin[2]."-".$arr_f_fin[1]."-".$arr_f_fin[0];

            if(isset($_POST[$tipo_embarcacion."_deluxe"])){
                $deluxe = "Si";
            }else{
                $deluxe = "No";
            }
            
            $t_contrato = $_POST[$tipo_embarcacion."_t_contrato"];
            $t_neta = $_POST[$tipo_embarcacion."_t_neta"];
            $t_interm = $_POST[$tipo_embarcacion."_t_interm"];
            $t_glc = $_POST[$tipo_embarcacion."_t_glc"];

            $charter->codigo = $codigo_charter;
            $charter->cliente = $cliente;
            $charter->intermediarios_id = $intermediario;
            //$charter->contrato = $contrato;
            $charter->nro_pax = $c_pasajeros;
            $charter->f_inicio = $f_inicio;
            $charter->f_fin = $f_fin;
            $charter->deluxe = $deluxe;
            $charter->tarifa_contrato = $t_contrato;
            $charter->tarifa_neta = $t_neta;
            $charter->comision_intermediario = $t_interm;
            $charter->comision_glc = $t_glc;
            $charter->embarcacion_id = $embarcacion;
            $contrato = Input::file('archivo_contrato');
            $destinoPath = public_path().'/images/contratos/';
            $name_file = time()."_".$contrato->getClientOriginalName();
            $subirContrato = $contrato->move($destinoPath, $name_file);

            if($subirContrato){
                $charter->contrato = $name_file;

                if($charter->save()){
                    return view('admin.charters.dashboard_charters');
                }else{
                    return "Ocurrió un error registrando el charter";
                }

            }else{
                return "Ocurrió un error cargando el contrato";
            }
        }        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        $charters = Charter::where('codigo',  $codigo)->get();
        return view('admin.charters.ver_charter', ['charters' => $charters, 'codigo' => $codigo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $charters = Charter::where('codigo',  $codigo)->get();
        return view('admin.charters.editar_charter', ['charters' => $charters, 'codigo' => $codigo]);
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
        $codigos = array();

        foreach (Charter::all() as $charter)
        {
            if(in_array($charter->codigo, $codigos)){
                foreach ($charters as $key => $value) {
                    if($value['codigo'] == $charter->codigo){
                        $charters[$key]['embarcacion_id'] = 'Mixto';
                    }
                }
                   
            }else{
                $charters[] = array(
                                'id' => $charter->id,
                                'codigo' => $charter->codigo,
                                'embarcacion_id' => $charter->embarcacion->nombre_embarcacion,
                                'intermediarios_id' => $charter->intermediario->nombre,
                                'nro_pax' => $charter->nro_pax,
                                'f_inicio' => $charter->f_inicio,
                                'f_fin' => $charter->f_fin,
                                'deluxe' => $charter->deluxe,
                                'tarifa_contrato' => $charter->tarifa_contrato
                            ); 
                array_push($codigos, $charter->codigo);
            }
        }

        json_encode($charters);

        return Datatables::of($charters)
            ->addColumn('action', function ($charters) {
                return '<a href="charters/apa/ver_apa/'.$charters['codigo'].'"><i class="fa fa-money fa-fw" title="APA"></i></a> <a href="charters/ver/'.$charters['codigo'].'"><i class="fa fa-eye fa-fw" title="Ver"></i></a> <a href="charters/editar/'.$charters['codigo'].'"><i class="fa fa-edit fa-fw" title="Editar"></i></a> <a href="'.$charters['codigo'].'"><i class="fa fa-file-pdf-o fa-fw" title="Contrato"></i></a>';
            })
            ->editColumn('codigo', '{{$codigo}}')
            ->editColumn('f_inicio', function ($charters) {
                return $charters['f_inicio'] ? with(\Carbon\Carbon::parse($charters['f_inicio']))->format('d/m/Y') : '';
            })
            ->editColumn('f_fin', function ($charters) {
                return $charters['f_fin'] ? with(\Carbon\Carbon::parse($charters['f_fin']))->format('d/m/Y') : '';
            })
            ->filterColumn('f_inicio', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(f_inicio,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('f_fin', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(f_fin,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }
}