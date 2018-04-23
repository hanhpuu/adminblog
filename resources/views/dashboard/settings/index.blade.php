<?php ?>
@extends('dashboard.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Setting Management</div>

                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                            <tr>
                                <th>Setting</th>
                                <th>Value</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($settings as $setting)

                                <tr class="list-users">
                                   
                                    <td>{{ $setting->key }}</td>
                                    @if( $setting->key != 'Photo')
                                    <td>{{ $setting->value }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('settings.show',$setting->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('settings.edit',$setting->id) }}">Edit</a>
                                    </td>
                                    @else
                                    <td> Had some photos already</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('settings.show',$setting->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('editPhoto',['editPhoto' => $setting->id]) }}">Edit</a>
                                    </td>
                                    @endif
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
