<div class="col-md-6 col-lg-12 col-sm-6">
    <div class="container-fluid">
        <div class="form-group row">
            {{ Form::label('selectFuelType', 'Brandstof', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                {{ Form::select('selectFuelType', ['aardgas', 'benzine', 'diesel', 'elektrisch', 'hybride', 'hybride diesel', 'LPG', 'LPG G3', 'overig:'], null, ['class' => 'form-control input-sm']) }}
            </div>
            <div class="col-md-4">
                {{ Form::text('inputFuelType', null, ['class' => 'form-control input-sm']) }}
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('inputTankCapacity', 'Tankinhoud (L)', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                <div class="input-group">
                    {{ Form::number('inputTankCapacity', null, ['class' => 'form-control input-sm']) }}
                    <span class="input-group-addon">L</span>
                </div>
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('inputPower', 'Vermogen (kW)', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                <div class="input-group">
                    {{ Form::number('inputPower', null, ['class' => 'form-control input-sm']) }}
                    <span class="input-group-addon">KW</span>
                </div>
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('inputPower', 'Vermogen (kW)', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                <div class="input-group">
                    {{ Form::number('inputPower', null, ['class' => 'form-control input-sm']) }}
                    <span class="input-group-addon">KW</span>
                </div>
            </div>
        </div>

        <!--
        Tankinhoud (L)
        Vermogen (KW)
        Topsnelheid (KM)
        Acceleratie (x tot 100)
        Verbruik (L/100KM)
        CO2 (g/KM)
        Energie label
        Euro klasse
        Transmissie
        Automaat
        Semi
        Hangeschakeld
        Aandrijving
        Cilinders
        Cilinderinhoud (cc)
        Koppel (Nm)
        Turbo (check)
        -->

    </div>
</div>