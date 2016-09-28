<div class="col-md-6 col-lg-12 col-sm-6">
    <div class="container-fluid ">
        <div class="form-group row">
            {{ Form::label('merk', 'Merk', ['class' => 'col-md-4']) }}
            <div class="col-md-8">
                {{ Form::select('merk', $makes, null, ['class' => 'form-control input-sm']) }}
            </div>
        </div>

        <!-- Used to determine which way of inputting model input is used -->
        {{ Form::hidden('model_input', 'select') }}

        <div class="form-group row" id="inputModelText">
            {{ Form::label('model', 'Model', ['class' => 'col-md-4']) }}
            <div class="col-md-8">
                {{ Form::text('model', null, ['class' => 'form-control input-sm']) }}
                {{ Form::button('<i class="fa fa-hand-o-right"></i> Model uit database invoeren', ['class' => 'btn btn-primary btn-flat form-control input-sm', 'id' => 'modelChangeText']) }}
            </div>
        </div>

        <div class="form-group row" id="inputModelSelect">
            {{ Form::label('select_model', 'Model', ['class' => 'col-md-4']) }}
            <div class="col-md-8">
                {{ Form::select('select_model', ['Selecteer eerst een merk'], null, ['id' => 'selectModel', 'class' => 'form-control input-sm', 'disabled' => 'disabled']) }}
                {{ Form::button('Model vrij invoeren <i class="fa fa-hand-o-left"></i>', ['class' => 'btn btn-primary btn-flat form-control input-sm', 'id' => 'modelChangeSelect']) }}
            </div>
        </div>

        <!-- Used to determine which way of inputting type input is used -->
        {{ Form::hidden('type_input', 'select') }}

        <div class="form-group row" id="inputTrimText">
            {{ Form::label('type', 'Type', ['class' => 'col-md-4']) }}
            <div class="col-md-8">
                {{ Form::text('type', null, ['class' => 'form-control input-sm']) }}
                {{ Form::button('<i class="fa fa-hand-o-right"></i> Type uit database selecteren', ['class' => 'btn btn-primary btn-flat form-control input-sm', 'id' => 'trimChangeText']) }}
            </div>
        </div>

        <div class="form-group row" id="inputTrimSelect">
            {{ Form::label('select_type', 'Type', ['class' => 'col-md-4']) }}
            <div class="col-md-8">
                {{ Form::select('select_type', ['Selecteer eerst een model'], null, ['id' => 'selectType', 'class' => 'form-control input-sm', 'disabled' => 'disabled']) }}
                {{ Form::button('Type vrij invoeren <i class="fa fa-hand-o-left"></i>', ['class' => 'btn btn-primary btn-flat form-control input-sm', 'id' => 'trimChangeSelect']) }}
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('kenteken', 'Kenteken', ['class' => 'col-md-4']) }}
            <div class="col-md-8 row input-group">
                <div class="col-sm-8">
                    {{ Form::text('kenteken', null, ['class' => 'form-control input-sm', 'placeholder' => 'Kenteken']) }}
                </div>
                <div class="col-sm-4">
                    {{ Form::select('kenteken_kleur', ['geel' => 'Geel', 'grijs' => 'Grijs', 'nvt' => 'N.v.t.'], null, ['class' => 'form-control input-sm']) }}
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<div class="col-md-6 col-lg-12 col-sm-6">
    <div class="container-fluid">
        <div class="form-group row">
            {{ Form::label('soort_voertuig', 'Carroserie', ['class' => 'col-md-4']) }}
            <div class="col-md-6">
                {{ Form::select('soort_voertuig', [
                    'personenwagen' => 'Personenwagen',
                    'cabriolet' => 'Cabriolet',
                    'coupe' => 'Coupe',
                    'coupe' => 'Coupe',
                    'coupe' => 'Coupe',
                    'coupe' => 'Coupe',
                    'coupe' => 'Coupe',
                    'overig' => 'Overig'
                ], null, ['class' => 'form-control input-sm']) }}
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('voertuig_staat', 'Staat', ['class' => 'col-md-4']) }}
            <div class="col-md-6">
                {{ Form::select('voertuig_staat', ['nieuw' => 'Nieuw', 'occasion' => 'Occasion', 'schadeauto' => 'Schade-auto'], null, ['class' => 'form-control input-sm']) }}
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('intern_id', 'Intern nummer', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                {{ Form::text('intern_id', null, ['class' => 'form-control input-sm', 'placeholder' => 'Intern nummer']) }}
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('meldcode', 'Meldcode', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                {{ Form::text('meldcode', null, ['class' => 'form-control input-sm', 'placeholder' => 'Meldcode']) }}
            </div>
        </div>

        <div class="form-group row">
                {{ Form::label('kilometer_stand', 'Kilometerstand', ['class' => 'col-md-4']) }}
                <div class="col-md-4">
                    {{ Form::text('kilometer_stand', null, ['class' => 'form-control input-sm', 'placeholder' => 'Kilometerstand']) }}
                </div>

                {{ Form::label('check_nap', 'NAP', ['class' => 'col-md-1']) }}
                <div class="col-md-3">
                    {{ Form::checkbox('check_nap', null, null,  ['data-toggle' => 'toggle', 'data-on' => 'Ja', 'data-off' => 'Nee', 'data-size' => 'small']) }}
                </div>
        </div>
        <hr>
    </div>
</div>

<div class="col-md-6 col-lg-12 col-sm-6">
    <div class="container-fluid">
        <div class="form-group row">
            {{ Form::label('check_apk', 'APK', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                {{ Form::select('check_apk', ['ja' => 'Ja', 'nee' => 'Nee', 'bij_aflevering' => 'APK bij aflevering'], null, ['class' => 'form-control input-sm']) }}
            </div>

            <div class="col-md-4" id="dateAPKWrapper">
                <div class="input-group">
                    {{ Form::text('apk_datum', null, ['id' => 'dateAPK', 'class' => 'form-control input-sm', 'placeholder' => 'APK tot', 'data-inputmask' => "'alias': 'dd/mm/yyyy'"]) }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('deel1_datum', 'Datum deel 1', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                {{ Form::text('deel1_datum', null, ['id' => 'datePart1', 'class' => 'form-control input-sm', 'placeholder' => 'Datum deel 1', 'data-inputmask' => "'alias': 'dd/mm/yyyy'"]) }}
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('check_afwijkend_bouwjaar', 'Afwijkend bouwjaar', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                {{ Form::checkbox('check_afwijkend_bouwjaar', null, null,  ['id' => 'checkAfwijkendBouwjaar', 'data-toggle' => 'toggle', 'data-on' => 'Ja', 'data-off' => 'Nee', 'data-size' => 'small']) }}
            </div>

            <div class="col-md-3" id="dateAfwijkendBouwjaarWrapper" style="display: none;">
                <div class="input-group">
                    {{ Form::text('afwijkend_bouwjaar', null, ['id' => 'dateAfwijkendBouwjaar', 'class' => 'form-control input-sm', 'placeholder' => 'Bouwjaar', 'data-inputmask' => "'mask': '9999', 'alias': 'yyyy'"]) }}
                </div>
            </div>
        </div>
    </div>
</div>