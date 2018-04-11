@extends('layouts.dashboard')
@section('page_heading','Registrar Embarcación')
@section('section')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Upload Multiple Images using dropzone.js and Laravel</h1>
            {!! Form::open([ 'route' => [ 'dropzone.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
            <div>
                <h3>Upload Multiple Image By Click On Box</h3>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('scripts')

<script type="text/javascript">
    $(function() {
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    });

    var cont_tarifas = 1;
    var cont_fechas = 1;
    date('from_1', 'to_1');
    getModelosEmbarcacion(1);

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch(error) {
            date = null;
        }
        return date;
    }

    function date(from, to){
        var dateFormat = "dd/mm/yy",
            
        temp_alta_from = $("#"+from).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            format: "dd/mm/yy",
        }).on( "change", function() {
            temp_alta_to.datepicker( "option", "minDate", getDate(this));
        }),
        
        temp_alta_to = $("#"+to).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            format: "dd/mm/yy",
        }).on( "change", function() {
            temp_alta_from.datepicker( "option", "maxDate", getDate(this));
        });
    }

    $("#add_itinerario").click(function(){
        var nombre_itinerario = document.getElementById("it_nombre").value.toUpperCase();
        var cant_dias = document.getElementById("it_cant_dias").value;
        var dia_inicio = document.getElementById("it_dia_inicio").value;
        var dias = {!! json_encode($dias) !!};
        var cantd_dias = parseInt(cant_dias) + parseInt(dia_inicio);

        if((nombre_itinerario != "") && (nombre_itinerario != undefined)){
            var itinerario = '<div class="panel" id="panel_itinerario_'+ nombre_itinerario +'"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-target="#detalle_itinerario_'+ nombre_itinerario +'" href="#detalle_itinerario_'+ nombre_itinerario +'" class="collapsed"> '+ nombre_itinerario +' </a> <button type="button" class="btn btn-sm btn-danger remove_itinerario" name="remove" onclick="remove_elemento(panel_itinerario_'+ nombre_itinerario +', null)"><i class="fa fa-minus fa-fw"></i></button></h4></div><div id="detalle_itinerario_'+ nombre_itinerario +'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-12"><table class="table table-bordered"><tbody>';
            var cont = 1;

            for (var i = dia_inicio; i < cantd_dias; i++) {
                
                if(i > 7){
                    
                    dia_inicio = 1;
                    itinerario += '<tr><td rowspan="2">'+ dias[cont] +'<input name=dias['+ nombre_itinerario +'][] class="form-control" value="'+cont+'" type="hidden" /></td><td>am</td><td><input name=am['+ nombre_itinerario +'][] class="form-control" /></td></tr><tr><td>pm</td><td><input name=pm['+ nombre_itinerario +'][] class="form-control" /></td></tr>';    
                    cont++;
                    
                    if(cont > 7){
                        cont = 1;
                    }

                }else{
                    itinerario += '<tr><td rowspan="2">'+ dias[i] +'<input name=dias['+ nombre_itinerario +'][] class="form-control" value="'+i+'" type="hidden" /></td><td>am</td><td><input name=am['+ nombre_itinerario +'][] class="form-control" /></td></tr><tr><td>pm</td><td><input name=pm['+ nombre_itinerario +'][] class="form-control" /></td></tr>';  
                }
            };

            itinerario += '</tbody></table></div></div></div></div>';

            $("#itinerarios").append(itinerario);
        }else {
            alert("Debe escoger un nombre para el itinerario");
        }
    });
    
    function add_tarifa(){
        var tarifario = "";
        var class_item = "'remove_tarifa'";
        cont_tarifas++;

        tarifario += '<div class="col-lg-12" id="tarifario_'+ cont_tarifas +'">';
        tarifario += '<div class="col-md-2">';
        tarifario += '<br><label for="cant_dias[]">Cantidad de días</label>';
        tarifario += '<br><select class="form-control" name="cant_dias[]"><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option></select>';
        tarifario += '</div>';
        tarifario += '<div class="col-md-3">';
        tarifario += '<br><label for="gross[]">Gross</label>';
        tarifario += '<br><input class="form-control" name="gross[]" type="text" value="">';
        tarifario += '</div>';
        tarifario += '<div class="col-md-3">';
        tarifario += '<br><label for="neto[]">Neto</label>';
        tarifario += '<br><input class="form-control" name="neto[]" type="text" value="">';
        tarifario += '</div>';
        tarifario += '<div class="col-md-2">';
        tarifario += '<br><label for="comision_glc[]">Comisión</label>';
        tarifario += '<br><input class="form-control" name="comision_glc[]" type="text" value=""> ';
        tarifario += '</div>';
        tarifario += '<div class="col-md-2">';
        tarifario += '<br><br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_tarifa()"><i class="fa fa-plus fa-fw"></i></button>';
        tarifario += '<button type="button" class="btn btn-danger btn-circle remove_tarifa" name="remove"onclick=" remove_elemento(tarifario_'+ cont_tarifas +', '+ class_item +')"><i class="fa fa-minus fa-fw"></i></button>';
        tarifario += '</div>';
        tarifario += '</div>';
        $("#tarifario").append(tarifario);
    }

    function add_fecha_temp_alta(){
        var temp_alta = "";
        var class_item = "'remove_fecha'";
        cont_fechas++;

        var id_from = "from_"+cont_fechas;
        var id_to = "to_"+cont_fechas;

        temp_alta += '<div class="row" id="fechas_'+ cont_fechas +'"><div class="col-lg-12">';
        temp_alta += '<div class="col-md-6">';
        temp_alta += '<br><label for="from">Desde</label>';
        temp_alta += '<br><input class="form-control temp_alta_from" name="from[]" type="text" value="" id="'+id_from+'">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-6">';
        temp_alta += '<br><label for="to">Hasta</label>';
        temp_alta += '<br><input class="form-control temp_alta_to" name="to[]" type="text" value="" id="'+id_to+'">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-lg-12">';
        temp_alta += '<div class="col-md-2">';
        temp_alta += '<br><label for="temp_alta_cant_dias[]">Cantidad de días</label>';
        temp_alta += '<br><select class="form-control" name="cant_dias[]"><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option></select>';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-3">';
        temp_alta += '<br><label for="temp_alta_gross[]">Gross</label>';
        temp_alta += '<br><input class="form-control" name="gross[]" type="text" value="">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-3">';
        temp_alta += '<br><label for="temp_alta_neto[]">Neto</label>';
        temp_alta += '<br><input class="form-control" name="neto[]" type="text" value="">';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-2">';
        temp_alta += '<br><label for="temp_alta_comision_glc[]">Comisión</label>';
        temp_alta += '<br><input class="form-control" name="comision_glc[]" type="text" value=""> ';
        temp_alta += '</div>';
        temp_alta += '<div class="col-md-2">';
        temp_alta += '<br><br><button type="button" class="btn btn-success btn-circle" name="add" onclick="add_fecha_temp_alta()"><i class="fa fa-plus fa-fw"></i></button>';
        temp_alta += '<button type="button" class="btn btn-danger btn-circle remove_fecha" name="remove"onclick=" remove_elemento(fechas_'+ cont_fechas +', '+ class_item +')"><i class="fa fa-minus fa-fw"></i></button>';
        temp_alta += '</div>';
        temp_alta += '</div></div></div>';

        $("#fechas_temp_alta").append(temp_alta);
        date(id_from, id_to);
    }

    function remove_elemento(element, class_item){
        if(class_item != null){
            var numItems = $('.' + class_item).length;
            console.log(numItems);
            if(numItems > 1){
                $("#" + element.id).remove();
            }   
        }else{
            $("#" + element.id).remove();
        }
    }

    function getModelosEmbarcacion(id){
        $.get("{{ url('admin/embarcacion/modelos_embarcacion') }}", 
            { id_tipo_embarcacion: id }, 
            function(data) {
                var modelos_embarcacion = $('#modelos_embarcacion');
                modelos_embarcacion.empty();

                $.each(data, function(index, element) {
                    modelos_embarcacion.append("<option value='"+ element.id +"'>" + element.descripcion + "</option>");
                });
            });
    }

    $("#tipo_embarcacion").change(function(){
        getModelosEmbarcacion(this.value);
    });
        
</script>
@stop

</body>
</html>