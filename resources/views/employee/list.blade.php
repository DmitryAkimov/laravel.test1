@extends('layout.mdm')
@section('title', 'Employee')
@section('content')

<div class="container-fluid">

    <div class="row">
        <table id="staff" class="display compact table-hover table-sm ">

            <thead>
                <th>ФИО</th>
                <th>Должность</th>
                <th>Подразделение</th>
                <th>Офис</th>
                <th>Принят</th>
                <th>employeeID</th>
            </thead>

            <tbody>
                @foreach ($staff as $employee)
                <tr onclick="javascript:window.open( window.location.href + '/{{ $employee->employeeID }}', '_blank')">
                    <td>{{ $employee->FIO }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->branch }}</td>
                    <td>{{ $employee->hiring->format("d.m.Y") }}</td>
                    <td>{{ $employee->employeeID}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

<script>
    $(document).ready(function() {
        var table = $('#staff').DataTable({
            "order": [
                [0, 'asc']
            ],
            "paging": true,
            "displayLength": 100,
            "info": true,
            "processing": true,
            "language": {
                "url": "js/dataTables.russian.json",
            }
        });
    });
</script>


@endsection