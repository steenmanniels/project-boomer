@extends('dashboard.masterpage.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h2>Kenteken</h2>
                </div>

                <div class="box-body">
                    {{ Form::open(['url' => 'dashboard/occasion/getkenteken', 'id' => 'formKenteken']) }}
                    <div class="form-group">
                        <div class="input-group">
                            {{ Form::text('inputKenteken', null, ['class' => 'form-control', 'placeholder' => 'kenteken']) }}
                        </div>
                    </div>
                    {{ Form::submit('Zoeken') }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h2>Resultaat</h2>
                </div>

                <div class="box-body">
                    <p>
                        Hieronder vindt u enkele gegevens over het opgevraagde voertuig. Indien u dit voertuig wilt invoeren, druk dan op 'occasion toevoegen'
                    </p>
                    {{ Form::open(['id' => 'formResult', 'action' => 'Dashboard\OccasionController@create', 'method' => 'get']) }}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/kenteken.js') }}"></script>
@endsection
