@extends('dashboard.masterpage.dashboard')

@section('title')
    Importeren
@endsection

@section('description')
    Voorraad importeren vanuit Excel-bestand
@endsection

@section('breadcrumb')
    <li class="active">Importeren</li>
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Importeer Excel-bestand</h3>
        </div>

        <div class="box-body">
            <p>Sommige occasionsystemen maken het mogelijk uw voorraad te exporteren in de vorm van een Excel-bestand. Deze kunt u hier vervolgens gemakkelijk importeren.</p>
        </div>

        @if(Session::has('success'))
            <div class="box-body">
                <div class="callout callout-success">
                    <h4>{!! Session::get('success') !!}</h4>

                    @if(Session::has('message'))
                        <p>{!! Session::get('message') !!}</p>
                    @endif
                </div>
            </div>
        @endif

        {!! Form::open([
            'url' => 'dashboard/import',
            'files' => true
            ]) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('excelFile', 'Excel-bestand') !!}
                    {!! Form::file('excelFile', null) !!}
                </div>
            </div>
            <div class="box-footer">
                <div class="form-group">
                    {!! Form::submit('Importeren') !!}
                </div>
            </div>
        {!! Form::close() !!}

        @if(Session::has('error'))
            <p class="errors">{!! Session::get('error') !!}</p>
        @endif

    </div>
@endsection