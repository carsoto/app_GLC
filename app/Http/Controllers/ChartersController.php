<?php

namespace App\Http\Controllers;

use App\Models\Charter;
use App\Models\Embarcacion;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

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
        $embarcacion = Embarcacion::select(['id', 'nombre_embarcacion', 'cant_pasajeros', 'tipo_embarcacion_id']);
        return view('admin.charters.registrar_charter', ['embarcacion' => $embarcacion]);
    }

    public function store(Request $request)
    {
        dd($_POST);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.charters.ver_charter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.charters.editar_charter');
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
        $charters = Charter::select(['codigo', 'embarcacion_id', 'intermediarios_id', 'f_inicio', 'f_fin', 'deluxe', 'tarifa_contrato']);

        return Datatables::of($charters)->make(true);
    }

}