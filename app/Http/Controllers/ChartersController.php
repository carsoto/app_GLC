<?php

namespace App\Http\Controllers;

use App\Charters;
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
        return view('admin.charters.registrar_charter');
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
        $charters = Charters::select(['codigo', 'yate', 'f_inicio', 'f_fin', 'nro_pax', 'intermediario', 'deluxe', 'tarifa']);

        return Datatables::of($charters)->make(true);
    }

}