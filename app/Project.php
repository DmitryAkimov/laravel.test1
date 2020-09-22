<?php

namespace App;

use App\Odata_1C;
use Illuminate\Support\Facades\DB;

class Project
{
    var $UID;
    var $description;
    var $manager;
    var $chief;
    var $start;
    var $finish;
    var $status;
    var $state;
    var $deaprtment;
    var $hasBudget;
    var $pid;
    var $cipher;
    var $customer;
    var $contract;
    //_____________________________________________________________________
    function loadFromArray($arr, $Ref_Key = '')
    {
        $this->UID = ($Ref_Key == '') ? $arr['Ref_Key'] : $Ref_Key;
        $this->description = $arr['Description'];
        $this->manager = isset($arr['Менеджер']) ? $arr['Менеджер']['ПредставлениеВДокументах'] : '-';
        $this->chief = isset($arr['Руководитель']) ? $arr['Руководитель']['ПредставлениеВДокументах'] : '-';
        $this->deaprtment = isset($arr['Подразделение']) ? $arr['Подразделение']['Description'] : '-';
        $this->start =  convertToDate($arr['ТекущийПланНачало']);
        $this->finish = convertToDate($arr['ТекущийПланОкончание']);
        $this->status = isset($arr['СтатусПроекта']) ? $arr['СтатусПроекта']['Description'] : '-';
        $this->state = $arr['Состояние'];
        $this->hasBudget = $arr['НаличиеБюджета'];
        $this->pid = $arr['Pid'];
        $this->cipher = $arr['Cipher'];
        $this->customer = isset($arr['ЗаказчикиСтрокой']) ? $arr['ЗаказчикиСтрокой'] : '';
        $this->contract = isset($arr['ДоговорыСтрокой']) ? $arr['ДоговорыСтрокой'] : '';
    }

    //_____________________________________________________________________
    function getBudgetRender()
    {
        //echo  $this->hasBudget == "1" ? '<i class="far fa-check-circle"></i>' : '<span class="text-danger">нет</span>';
        return $this->hasBudget == "1" ? '<i class="far fa-check-circle"></i>' : '<span class="text-danger">нет</span>';
        // '<i class="fas fa-ban"></i>'
    }
    //_____________________________________________________________________
    function getClassByStatus($tableFilter = '')
    {
        if ($tableFilter == "ACTIVE") {
            return  'text-dark';
        } elseif ($this->status == "Исполняется") {
            return   'text-primary';
        } elseif ($this->status == "Завершен") {
            return  'text-muted';
        } else {
            return  'text-dark';
        }
    }
    //_____________________________________________________________________
    // выводит строку для таблицы проектов
    function echoRow($tableFilter = "")
    {
        $rowClass = $this->getClassByStatus($tableFilter);
        echo
            //'<tr data-uid=' . $this->UID . '  onclick="javascript:document.location.href=\'' . getMyURI() . '?project_ref_key=' . $this->UID . '\'">'
            //$rowClass = ($filter=='ACTIVE') ? '' : '';

            '<tr data-uid=' . $this->UID . ' onclick="javascript:window.open(\'?$entity=project&$ref_key=' . $this->UID . '\', \'_blank\')" >'
                . TD($this->cipher)
                . TD($this->description, ['class' => $rowClass])
                . TD($this->manager, ['class' => $rowClass])
                . TD($this->start->format('d.m.y'), ['data-sort' => $this->start->format('Ymd'), 'class' => $rowClass])
                . TD($this->finish->format('d.m.y'), ['data-sort' => $this->finish->format('Ymd'), 'class' => $rowClass])
                . TD($this->status, ['class' => $rowClass])
                . TD($this->deaprtment, ['class' => $rowClass])
                . TD($this->getBudgetRender())
                . '</tr>';
    }
    //_____________________________________________________________________
    // выводит строки таблицы для одного элемента
    function echoItem()
    {
        echo ''
            . TR(['Шифр', $this->cipher])
            . TR(['Руководитель', $this->chief])
            . TR(['Менеджер', $this->manager])
            . TR(['ЦФО', $this->deaprtment])
            . TR(['Старт', $this->start->format('d.m.Y')])
            . TR(['Финиш', $this->finish->format('d.m.Y')])
            . TR(['Статус', $this->status])
            . TR(['Состояние', $this->state])
            . TR(['Заказчик', $this->customer])
            . TR(['Договор', $this->contract])
            . TR(['Бюджет', $this->getBudgetRender()])
            . TR(['PID', $this->pid]);
    }
    //_____________________________________________________________________
    // выводит radio buttons for filter
    static function echoProjectsRadioFilter()
    {
        echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
        echo '  <label class="btn btn-secondary active">';
        echo '      <input type="radio" name="options" id="project_filter_active" autocomplete="off" onclick="javascript:document.location.href=\'?$entity=projects&$filter=active\'" checked> Активные';
        echo '  </label>';
        echo '  <label class="btn btn-secondary">';
        echo '      <input type="radio" name="options" id="project_filter_all" onclick="javascript:document.location.href=\'?$entity=projects&$filter=all\'" autocomplete="off"> Все';
        echo '  </label>';
        echo '</div>';
    }
    //_____________________________________________________________________
    static function echoTableHeader()
    {
        echo
            '<thead>'
                . TH('Шифр')
                . TH('Наименование')
                . TH('Менеджер')
                . TH('Старт')
                . TH('Финиш')
                . TH('Статус')
                . TH('ЦФО')
                . TH('Бюджет')
                . '</thead>';
    }
    //_____________________________________________________________________
    public static function echoProjectsTable($filter = 'ACTIVE')
    {
        // $filter = strtoupper($filter);
        // $data = getCurlJson(
        //     [
        //         'entity' => 'Catalog_Проекты',
        //         'select' => 'Ref_Key,Description,Cipher,Состояние,Менеджер/АБ_ИдентификаторИзЗУП,Менеджер/ПредставлениеВДокументах,Pid,ТекущийПланНачало,ТекущийПланОкончание,ДоговорыСтрокой,НаличиеБюджета,Подразделение/Description,СтатусПроекта/Description',
        //         'expand' => 'Менеджер,Подразделение,СтатусПроекта',
        //         'filter' => ($filter == 'ACTIVE') ? "Состояние eq 'Исполняется'" : ''
        //     ]
        // );
        // if ($data) {
        //     echo '<div class="container-fluid">';
        //     Project::echoProjectsRadioFilter();
        //     $tableClass = ($filter == 'ACTIVE') ? "active" : "";
        //     echo '<table id="projects" class="display compact table-hover table-sm ' . $tableClass . '">';
        //     Project::echoTableHeader();
        //     echo '<tbody>';

        //     foreach ($data['value'] as $data_project) {
        //         $project = new Project;
        //         $project->loadFromArray($data_project);
        //         if ($filter = 'ACTIVE') {
        //             if (($project->status != 'Приостановка') && ($project->status !='Взаиморасчеты')) {
        //                 $project->echoRow($filter);
        //             }
        //         }
        //         else {
        //             $project->echoRow($filter);
        //         } 

        //     }
        //     echo '</tbody></table></div>';
        //     echo '<small><a href="http://msql-5/ReportServer?/MDM/mdm_project_list">Старый вариант (отчёт SQL).</a></small>';
        //     echo '<script src="js/projects.js"></script>';
        //}
    }

    //_____________________________________________________________________
    public static function echoProjectItem($ref_key)
    {
        // $data = getCurlJson(
        //         [
        //         'entity' => 'Catalog_Проекты',
        //         'select' => 'Description,Cipher,Состояние,Менеджер/АБ_ИдентификаторИзЗУП,Менеджер/ПредставлениеВДокументах,Руководитель/ПредставлениеВДокументах,Pid,ТекущийПланНачало,ТекущийПланОкончание,ДоговорыСтрокой,НаличиеБюджета,Подразделение/Description,СтатусПроекта/Description,ДоговорыСтрокой,ЗаказчикиСтрокой',
        //         'expand' => 'Менеджер,Подразделение,СтатусПроекта,Руководитель',
        //         'filter' => "Ref_Key eq guid'" . $ref_key  . "'",
        //         ]);
        // if (!empty($data)) {
        //     $project = new Project;
        //     $project->loadFromArray( current($data['value']), $ref_key);
        //     //$project->expandData($data);
        //     echo '<div class="container">';
        //     echo '<table id="project-item" class="table table-striped table-borderless display table-hover">';
        //     echo '<thead class="thead-dark">';
        //     echo (TH('') . TH($project->description));
        //     echo '</thead>';
        //     echo '<tbody>';

        //     $project->echoItem();

        //     echo '</tbody></table></div>';
        // }
    }
    //_____________________________________________________________________
    public static function all($filter = 'ACTIVE')
    {
        $res = [];
        $data = Odata_1C::getJSON(
            '1CDO',
            [
                'entity' => 'Catalog_Проекты',
                'select' => 'Ref_Key,Description,Cipher,Состояние,Менеджер/АБ_ИдентификаторИзЗУП,Менеджер/ПредставлениеВДокументах,Pid,ТекущийПланНачало,ТекущийПланОкончание,ДоговорыСтрокой,НаличиеБюджета,Подразделение/Description,СтатусПроекта/Description',
                'expand' => 'Менеджер,Подразделение,СтатусПроекта',
                'filter' => ($filter == 'ACTIVE') ? "Состояние eq 'Исполняется'" : ''
            ]
        );

        if ($data) {
            foreach ($data['value'] as $data_project) {
                $project = new Project;
                $project->loadFromArray($data_project);
                $res[$project->UID] = $project;
            }
        }
        return $res;
    }
    //_____________________________________________________________________
    public static function findOrFail($uid)
    {
        $data = Odata_1C::getJSON(
            '1CDO',
            [
                'entity' => 'Catalog_Проекты',
                'select' => 'Description,Cipher,Состояние,Менеджер/АБ_ИдентификаторИзЗУП,Менеджер/ПредставлениеВДокументах,Руководитель/ПредставлениеВДокументах,Pid,ТекущийПланНачало,ТекущийПланОкончание,ДоговорыСтрокой,НаличиеБюджета,Подразделение/Description,СтатусПроекта/Description,ДоговорыСтрокой,ЗаказчикиСтрокой',
                'expand' => 'Менеджер,Подразделение,СтатусПроекта,Руководитель',
                'filter' => "Ref_Key eq guid'" . $uid  . "'",
            ]
        );
        if (!empty($data)) {
            $project = new Project;
            $project->loadFromArray(current($data['value']), $uid);
            return $project;
        } else {
            $project = new Project;
            $project->description = 'проект не найден';
        }
        return $project;
    }
    //_____________________________________________________________________
    public static function testSQL()
    {
        $results = DB::connection('sqlsrv')->table('tbStaff')->get();

        $users = DB::table('users')->get();

        foreach ($results as $employee)
        {
            var_dump($employee->FIO);
        }
    }
}
