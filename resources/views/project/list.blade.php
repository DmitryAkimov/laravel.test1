@extends('layout.mdm')
@section('title', 'Projects')
@section('content')

<div class="container-fluid">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="options" id="project_filter_active" autocomplete="off" onclick="window.location.href='/project';" checked> Активные
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="project_filter_all" onclick="window.location.href='/project/all';" autocomplete="off"> Все
        </label>
    </div>
   
    <div class="row">
        <table id="projects" class="display compact table-hover table-sm ">

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
                @foreach ($projects as $project)

                <tr onclick="javascript:window.open('project/{{ $project->UID }}', '_blank')">
                    <td>{{ $project->cipher }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->manager }}</td>
                    <td>{{ $project->start->format('d.m.Y') }}</td>
                    <td>{{ $project->finish->format('d.m.Y') }}</td>
                    <td>{{ $project->status }}</td>
                    <td>{{ $project->deaprtment }}</td>
                    <td><?php echo $project->getBudgetRender() ?></td>
                </tr>

                @endforeach
            </tbody>
        </table>

    </div>

</div>

<script>
    $(document).ready(function() {
        var table = $('#projects').DataTable({
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