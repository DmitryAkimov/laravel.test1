@extends('layout.mainlayout')

@section('content')


<div class="container-fluid">

    <div class="row">
        <table id="staff" class="display compact table-hover table-sm ">

            <thead>
                <th>Шифр</th>
                <th>Наименование</th>
                <th>Менеджер</th>
                <th>Старт</th>
                <th>Финиш</th>
                <th>Статус</th>
                <th>ЦФО</th>
                <th>Бюджет</th>
            </thead>

            <tbody>
                @foreach ($staff as $employee)

                <tr onclick="javascript:window.open( window.location.href + '/{{ $employee->Ref_Key }}', '_blank')">
                    <td>{{ $employee->FIO }}</td>
                    <td>{{ $employee->title }}</td>
                    <td>{{ $employee->SID }}</td>
                    <td>{{ $employee->employeeID}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
                [0, 'desc']
            ],
            "paging": !$('#projects').hasClass("active"),
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