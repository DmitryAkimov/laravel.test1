@extends('layout.mainlayout')

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
                    <td>{{ $employee->title }}</td>
                </tr>
                <tr>
                    <td>employeeID</td>
                    <td>{{ $employee->employeeID }}</td>
                </tr>
                <tr>
                    <td>Старт</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Финиш</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Статус</td>
                    <td></td>
                </tr>
                <tr>
                    <td>ЦФО</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Бюджет</td>
                    <td></td>
                </tr>
                </tr>

            </tbody>
        </table>

    </div>

</div>




@endsection