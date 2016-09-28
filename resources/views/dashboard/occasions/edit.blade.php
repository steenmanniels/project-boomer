@extends('dashboard.masterpage.dashboard')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/datepicker/datepicker3.css") }} ">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
@endsection

@section('title')
    Occasion toevoegen
@endsection

@section('description')
    Vrije invoer occasions
@endsection

@section('breadcrumb')
    <li><a href="{{ url('dashboard/occasion') }}"><i class="fa"></i> Occasions</a></li>
    <li class="active">Occasion toevoegen</li>
@endsection

@section('content')
    <pre>
    <?php var_dump($occasion) ?>
    </pre>

    {{ Form::model($occasion, ['url' => 'dashboard/occasion', 'files' => true]) }}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title"><strong>Algemene Informatie</strong></h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Voertuiggegevens</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            @include('dashboard.occasions.create.basis', ['makes' => $makes])
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kopen</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            @include('dashboard.occasions.create.purchase')
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="box box-primary <!--collapsed-box-->">
                    <div class="box-header with-border">
                        <h3 class="box-title">Leasen</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            @include('dashboard.occasions.create.lease')
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="box box-primary <!--collapsed-box-->">
                    <div class="box-header with-border">
                        <h3 class="box-title">Garantie</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            @include('dashboard.occasions.create.warranty')
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title"><strong>Technische Informatie</strong></h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="box box-primary <!--collapsed-box-->">
                    <div class="box-header with-border">
                        <h3 class="box-title">Technische informatie</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            @include('dashboard.occasions.create.technical')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::submit('Doorgaan >', ['class' => 'btn btn-lrg btn-warning']) }}
    {{ Form::close() }}
@endsection

@section('scripts')
    <script src="{{ asset('bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ asset('js/create.js') }}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
