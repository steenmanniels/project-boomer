<div class="col-md-6 col-lg-12 col-sm-6">
    <div class="container-fluid">
        <div class="form-group row">
            {{ Form::label('selectWarrantyType', 'Garantie', ['class' => 'col-md-4']) }}
            <div class="col-md-5">
                {{ Form::select('selectWarrantyType', ['geen' => 'Geen garantie', 'notk' => 'N.o.t.k.', 'periode' => 'Periode'], null, ['class' => 'form-control input-sm']) }}
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('inputPeriode', 'Garantie (mnd)', ['class' => 'col-md-4']) }}
            <div class="col-md-3">
                {{ Form::number('inputPrijs', null, ['class' => 'form-control input-sm']) }}
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('checkFacWarranty', 'Fabrieksgarantie', ['class' => 'col-md-4']) }}
            <div class="col-md-4">
                {{ Form::checkbox('checkFacWarranty', null, null,  ['data-toggle' => 'toggle', 'data-on' => 'Ja', 'data-off' => 'Nee', 'data-size' => 'small']) }}
            </div>

            <div class="col-md-3" id="dateFacWarrantyWrapper" style="display: none;">
                <div class="input-group">
                    {{ Form::text('dateFacWarranty', null, ['id' => 'dateFacWarranry', 'class' => 'form-control input-sm', 'placeholder' => 'Bouwjaar', 'data-inputmask' => "'mask': '9999', 'alias': 'yyyy'"]) }}
                </div>
            </div>
        </div>
    </div>
</div>