@extends('layout.mdm')
@section('title', $employee->FIO)
@section('content')

<style>
    td:nth-child(1) {
        color: gray;
        text-align: right;
    }

    #employee thead, .spgr-green {
        background-color: #2d5546 !important;
        color: white !important;
    }
    .state {
        color: gray;
    }
</style>
<!--========================================================================-->
<div class="container">

    <div class="row">
        <table id="employee" class="table table-striped table-borderless display table-hover">
            <thead class="spgr-green">
                <tr><th> </th>       <th>{{ $employee->FIO }}</th>   <th></th></tr>
                <tr><th> </th>       <th>1С</th>   <th>MDM</th></tr>
            </thead>

            <tbody>
               <tr>
                    <td>Должность</td>         <td>{{ $employee->position }}</td>      <td>{{ $employee->MDM_position }}</td>
                </tr>
                <tr>
                    <td>Подразделение</td>     <td>{{ $employee->department }}</td>     <td>{{ $employee->MDM_group }}</td>
                </tr>
                <tr>
                    <td>Приём</td>             <td>{{ $employee->hiring->format("d.m.Y") }}</td>            <td>{{ $employee->MDM_hiring->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <td>Увольнение</td>        <td></td>            <td></td>
                </tr>
                <tr>
                    <td>Офис</td>              <td>{{ $employee->branch }}</td>                    <td>{{ $employee->MDM_branch }}</td>
                </tr>
                <tr>
                    <td>employeeID / SID</td>                    <td>{{ $employee->employeeID }}</td>                    <td>{{ $employee->MDM_SID }}</td>
                </tr>
                <tr>
                    <td>Сбор загрузки</td>         <td></td>           <td>{{ $employee->isTimesheets }}</td>                    
                </tr>   
                <tr>
                    <td>Роль</td>   <td></td>  <td>{{ $employee->MDM_role }}</td>     
                </tr> 
                <tr>
                    <td>Email</td>   <td></td> <td>{{ $employee->MDM_email }}</td>  
                </tr> 
                <tr>
                    <td>Аналитика</td>  <td></td>  <td>{{ $employee->MDM_analytic }}</td>  
                </tr> 
                <tr>
                    <td>PrincipalName</td>  <td></td> <td>{{ $employee->MDM_msDSPrincipalName }}</td> 
                </tr> 

                <tr>
                    <td>ЦФО</td>  <td></td> <td>{{ $employee->MDM_FRC }}</td> 
                </tr> 

            </tbody>
        </table>

    </div>

</div>




@endsection