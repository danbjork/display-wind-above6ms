@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Your spots</h4>
                    </div>
                    <div class="card-content table-responsive table-full-width">
                    <table class="table">
                        <tbody>
                        @foreach($spots as $spot)
                            <tr>
                                <td class="">{{ $spot->title }}</td>
                                <td>
                                    <div class="btn-group pull-right" style="padding: 1px 1px;">
                                        <a href="{{ url('spot/' . $spot->id . '/edit') }}" type="button" class="btn btn-default"> <i class="fa fa-wrench"> </i> </a>
                                    </div>
                                    <div class="btn-group pull-right" style="padding: 1px 1px;">
                                        <a href="{{ url('spot/' . $spot->id) }}" type="button" class="btn btn-default"> <i class="fa fa-sun-o"> </i> </a>
                                    </div>
                                    <div class="btn-group pull-right" style="padding: 1px 1px;">
                                        {!! Form::open([ 'method'  => 'delete', 'route' => [ 'spot.destroy', $spot->id ] ]) !!}
                                            {!! Form::hidden('id', $spot->id) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger ']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td>
                                    <div class="btn-group pull-right" style="padding: 1px 1px">
                                    <br>
                                        <a href="{{ url('spot/create') }}">    
                                        <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> New spot</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </table>

        </div>
    </div>
</div>
                            
@endsection