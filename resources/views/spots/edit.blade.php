@extends('layouts.app')

@section('content')
<div class='row'>
    <div class='col-md-8 col-md-offset-2'>
        <div class="box box-primary with-border">
            <div class="box-body">
                {!!Form::model($spot, ['action' => ['SpotController@update', $spot->id], 'method' => 'PATCH'])!!}
                    <div class="col-md-12">
                        <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Namn:', ['class' => 'control-label']) !!}
                            {!! Form::text('title',old('title'),['class' => 'form-control']) !!}
                        </div>
                    </div>

                    
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
<div class='row'>
    <div class='col-md-8 col-md-offset-2'>
        <hr>
        <div class="box box-primary with-border">
            <p class="lead">Välj koordinat</p>
            <div class="box-body">
            <map-component :spot="{{"$spot"}}" :canedit="true"></map-component>
            </div>
            <hr>
            <button type="submit" class="btn btn-success pull-right">Uppdatera spot</button>
            </div>
        </div>
    </div>
</div>
@endsection