@extends('layout.mdm')
@section('title', $project->description)

@section('content')

<style>
    td:nth-child(1) {
        color: gray;
        text-align: right;
    }

    #project thead {
        background-color: #2d5546 !important;
        color: white !important;
    }
    .state {
        color: gray;
    }
</style>

<div class="container">

    <div class="row">
        <table id="project" class="table table-striped table-borderless display table-hover">
            <thead>
                <th style="text-align: right;">{{ $project->cipher }}</th>
                <th>{{ $project->description }}</th>
                
            </thead>

            <tbody>

               <tr>
                    <td>Менеджер</td>
                    <td>{{ $project->manager }}</td>
                </tr>
                <tr>
                    <td>Директор</td>
                    <td>{{ $project->chief }}</td>
                </tr>
                <tr>
                    <td>Старт</td>
                    <td>{{ $project->start->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <td>Финиш</td>
                    <td>{{ $project->finish->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <td>Статус</td>
                    <td>{{ $project->status }} - <span class="state">{{$project->state}}</span></td>
                </tr>
                <tr>
                    <td>ЦФО</td>
                    <td>{{ $project->deaprtment }}</td>
                </tr>
                <tr>
                    <td>Бюджет</td>
                    <td><?php echo $project->getBudgetRender() ?></td>
                </tr>

                <tr>
                    <td>Договор</td>
                    <td>{!! str_replace(',','<br>' , $project->contract) !!}</td>
                </tr>

                <tr>
                    <td>Заказчик</td>
                    <td>{{ $project->customer }}</td>
                </tr>
                <tr>
                    <td>PID</td>
                    <td>{{ $project->pid }}</td>
                </tr>
            </tbody>
        </table>

    </div>

</div>




@endsection