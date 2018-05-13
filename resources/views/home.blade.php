@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row"> --}}
        <div class="col-md-8 col-md-offset-2">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Vindapp</h4>
                    <p class="category">Create spots, read weather data from SMHI, get calendar updates</p>
                </div>
                <div class="card-content">
                    <div id="chartActivity" class="ct-chart"></div>
                </div>
                <div class="card-footer">
                    <div class="chart-legend">
                        <i class="fa fa-circle text-info"></i> 12 spots
                        <i class="fa fa-circle text-warning"></i> 4 spots with wind right now
                        <i class="fa fa-circle text-danger"></i> 3 calendar updates
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="ti-check"></i> #surfvind
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Woo updates</h4>
                    <p class="category">New world record by Nick Jacobsen</p>
                </div>
                <div class="card-content">
                    <div id="chartActivity" class="ct-chart">
                        Nick Jacobsen was jumping 28 meters the other day in South Africa.
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
