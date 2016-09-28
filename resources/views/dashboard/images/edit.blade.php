@extends('dashboard.masterpage.dashboard')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset("css/dropzone.min.css") }}">
@stop

@section('content')

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="how-to-create" >
                <h3>Images <span id="photoCounter"></span></h3>
                <br />

                {!! Form::open(['url' => url('dashboard/image/uploadphoto'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}

                {{ Form::hidden('image_collection_id', $image_collection_id) }}

                <div class="dz-message">

                </div>

                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>

                <div class="dropzone-previews" id="dropzonePreview"></div>

                {!! Form::close() !!}

            </div>
            <div class="jumbotron how-to-create">
                <ul>
                    <li>Images are uploaded as soon as you drop them</li>
                    <li>Maximum allowed size of image is 8MB</li>
                </ul>

            </div>
        </div>
    </div>

    <!-- Dropzone Preview Template -->
    <div id="preview-template" style="display: none;">

        <div class="dz-preview dz-file-preview">
            <div class="dz-image"><img data-dz-thumbnail=""></div>

            <div class="dz-details">
                <div class="dz-size"><span data-dz-size=""></span></div>
                <div class="dz-filename"><span data-dz-name=""></span></div>
            </div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

            <div class="dz-success-mark"><i class="fa fa-check-circle-o" style="color:white;"></i></div>
            <div class="dz-error-mark"><i class="fa fa-close" style="color:white;"></i></div>

        </div>
    </div>
    <!-- End Dropzone Preview Template -->

    {!! Form::hidden('csrf-token', csrf_token(), ['id' => 'csrf-token']) !!}
@endsection

@section('scripts')
    <script src="{{ asset('bower_components/AdminLTE/plugins/dropzoneJS/dropzone.min.js') }}"></script>
    <script src="{{ asset('bower_components/AdminLTE/plugins/dropzoneJS/dropzone-config.js') }}"></script>
    <script src="{{ asset('js/editphotos.js') }}"></script>
@stop
