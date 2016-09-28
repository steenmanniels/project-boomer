<div class="col-md-6 col-lg-12 col-sm-6">
    <div class="container-fluid">
        <div class="form-group row">
            {{ Form::label('selectPriceType', 'Prijsvorm', ['class' => 'col-md-4']) }}
            <div class="col-md-5">
                {{ Form::select('selectPriceType', ['vast' => 'Vaste prijs', 'bieden' => 'Bieden', 'gereserveerd' => 'Gereserveerd', 'notk' => 'N.o.t.k.', 'nvt' => 'Niet te koop'], null, ['class' => 'form-control input-sm']) }}
            </div>
        </div>

        <div id="purchaseOptionsWrapper">
            <div class="form-group row">
                {{ Form::label('inputPrijs', 'Prijs', ['class' => 'col-md-4']) }}
                <div class="col-md-5">
                    <div class="input-group" id="inputPrijsWrapper">
                        <span class="input-group-addon">&euro;</span>
                        {{ Form::number('inputPrijs', null, ['class' => 'form-control input-sm', 'data-inputmask' => "'mask': ''"]) }}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('inputBPM', 'BPM nieuw', ['class' => 'col-md-4']) }}
                <div class="col-md-5">
                    <div class="input-group" id="inputPrijsWrapper">
                        <span class="input-group-addon">&euro;</span>
                        {{ Form::number('inputBPM', null, ['class' => 'form-control input-sm', 'data-inputmask' => "'mask': ''"]) }}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('inputCostReady', 'Kosten rijklaar', ['class' => 'col-md-4']) }}
                <div class="col-md-5">
                    <div class="input-group" id="inputCostReadyWrapper">
                        <span class="input-group-addon">&euro;</span>
                        {{ Form::number('inputCostReady', null, ['class' => 'form-control input-sm', 'data-inputmask' => "'mask': ''"]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>