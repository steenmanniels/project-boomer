<div class="col-md-12">
    <div class="container-fluid">
        <div class="form-group row">
            {{ Form::label('selectLeaseType', 'Leasevorm', ['class' => 'col-md-4']) }}
            <div class="col-md-5">
                {{ Form::select('selectLeaseType', ['nvt' => 'Niet te leasen', 'financial' => 'Financial lease'], null, ['class' => 'form-control input-sm']) }}
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('inputLeasePrice', 'Lease Prijs (p/m)', ['class' => 'col-md-4']) }}
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-addon">&euro;</span>
                    {{ Form::number('inputLeasePrice', null, ['class' => 'form-control input-sm']) }}
                </div>
            </div>
        </div>
    </div>
</div>