@extends('layout.mdm')
@section('title', $employee->FIO)
@section('content')

<style>
    td:nth-child(1) {
        color: gray;
        text-align: right;
    }

    #employee thead {
        background-color: #2d5546 !important;
        color: white !important;
    }
    .state {
        color: gray;
    }
</style>
<div class="container">

    <div class="row">
        <table id="employee" class="table table-striped table-borderless display table-hover">
            <thead>
                <th style="text-align: right;">{{ $employee->SID }}</th>
                <th>{{ $employee->FIO }}</th>
                </th>
            </thead>

            <tbody>
               <tr>
                    <td>Должность</td>
                    <td>{{ $employee->position }}</td>
                </tr>
                <tr>
                    <td>Подразделение</td>
                    <td>{{ $employee->department }}</td>
                </tr>

                <tr>
                    <td>Приём</td>
                    <td>{{ $employee->hiring->format("d.m.Y") }}</td>
                </tr>
                <tr>
                    <td>Офис</td>
                    <td>{{ $employee->branch }}</td>
                </tr>
                <tr>
                    <td>employeeID</td>
                    <td>{{ $employee->employeeID }}</td>
                </tr>
                <tr>
                    <td>Сбор загрузки</td>
                    <td>{{ $employee->isTimesheets }}</td>
                </tr>    
            </tbody>
        </table>

    </div>

</div>




@endsection