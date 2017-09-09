@extends('layouts.single')

@section('content')


@include('includes.menu')


<div class="app-content" id="data-items"  >

    <div class="container" ng-app="" ng-controller="customersController">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <table>
                        <tr ng-repeat="x in entries">
                            <td>@{{ x.id }}</td>
                            <td>@{{ x.title }}</td>
                        </tr>
                    </table>




                    <div class="panel-body">





                    </div>
                </div>
            </div>
        </div>
    </div>

@include('includes.modaladdform')


    @endsection
