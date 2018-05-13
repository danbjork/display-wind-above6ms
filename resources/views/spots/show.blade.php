@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="col-md-12">
            <p class="lead">{{$spot->title}}</p>
                <div class="box box-primary with-border">
                    <div class="box-body">
                    <map-component :spot="{{"$spot"}}" :canedit='false' :showspot='true'></map-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class='row'>
    <div class="box box-primary with-border">
        <div class="box-body">
            <br>
        	<wind-component :spot="{{"$spot"}}"></wind-component>
        </div>
    </div>
</div>
@endsection



