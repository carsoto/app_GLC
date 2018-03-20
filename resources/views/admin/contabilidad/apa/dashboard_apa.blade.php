@extends ('layouts.dashboard')
@section('page_heading','APA')

@section('section')
<a href="{{ url ('admin/contabilidad/apa/registrar_apa') }}" class="btn btn-sm btn-success"><i class="fa fa-plus fa-fw"></i> Registrar APA</a>

<br><br>

<div class="row">
    <div class="col-sm-12">
        <table id="table_apas" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="text-align: center;">CHARTER</th>
                <th style="text-align: center;">CLIENTE</th>
                <th style="text-align: center;">GANANCIA</th>
                <th style="text-align: center;">APA</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
@stop

