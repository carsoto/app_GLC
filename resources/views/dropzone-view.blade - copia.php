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
        
</script>
@stop

</body>
</html>