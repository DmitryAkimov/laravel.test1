<?php

namespace App;

use App\Odata_1C;
use Illuminate\Support\Facades\DB;

class Employee
{
    //
    public $Ref_Key;
    public $FIO;
    public $position;
    public $department;
    public $branch;
    public $employeeID;
    public $hiring;
    public $dismissal;
    public $isTimesheets;
    public int $MDM_SID;
    public $MDM_group;
    public $MDM_Branch;
    public $MDM_hiring;
    public $MDM_analytic;
    public $MDM_email;
    public $MDM_msDSPrincipalName;
    public $MDM_role;
    public $MDM_FRC;

    public $test;
    //_____________________________________________________________________
    function loadFromArray($arr, $Ref_Key = '')
    {
        $this->Ref_Key = isset($arr['EmployeeID']) ? $arr['EmployeeID'] : $Ref_Key;
        $this->department = isset($arr['Подразделение']) ? $arr['Подразделение'] : '';
        $this->FIO = isset($arr['ФизическоеЛицо']) ? $arr['ФизическоеЛицо'] : '';
        $this->employeeID = isset($arr['EmployeeID']) ? $arr['EmployeeID'] : '';
        $this->position = isset($arr['Должность']) ? $arr['Должность'] : '';
        $this->branch = isset($arr['Филиал']) ? $arr['Филиал'] : '';
        $this->hiring = isset($arr['ДатаПриемаВКомпанию']) ? $arr['ДатаПриемаВКомпанию'] : '';
        $this->hiring = convertToDate($this->hiring);
        
    }
    //_____________________________________________________________________
    public static function all($filter = 'ACTIVE')
    {
        $res = [];
        $data = Odata_1C::getJSON('1CZUP_TEST', []);
        /*  $data = Odata_1C::getJSON(
            '1CZUP_TEST',
            [
                'entity' => 'Catalog_ФизическиеЛица',
                'select' => 'Ref_Key,Description,Code,ФИО',
                //'expand' => 'Менеджер,Подразделение,СтатусПроекта',
                'filter' => "IsFolder eq false"
            ]
        );
 */
        if ($data) {
            foreach ($data as $data_employee) {
                $employee = new Employee;
                $employee->loadFromArray($data_employee);
                $res[$employee->Ref_Key] = $employee;
            }
        }
        return $res;
    }
    //_____________________________________________________________________
    public static function findOrFail($uid)
    {
        $data = Odata_1C::getJSON(
            '1CZUP_TEST',
            [
                'entity' => $uid
            ]
        );
        $employee = new Employee;
        if (!empty($data)) {
            $employee->loadFromArray($data[0], $uid);
            $employee->addMDMdata();
        } else {
            $employee->FIO = 'Сотрудник не найден ' . $uid;
        }
        return $employee;
    }
    //_____________________________________________________________________
    public static function allSQL()
    {

        $results = DB::connection('sqlsrv')->table('tbStaff')->where('dismissal', '>', date("Ymd"))->get();
        foreach ($results as $employee) {
            echo $employee->FIO . $employee->SID . $employee->position . $employee->utilization . "<br>";
        }
    }
    //_____________________________________________________________________
    private function addMDMdata ()
    {
        $emplID = (string)$this->employeeID;
        $results = DB::connection('sqlsrv')->table('vStaff')->where('employeeID', $emplID)->get();
        if ($results) {
            //print_r($results);
            $this->isTimesheets = ($results[0]->utilization == 1) ;
            $this->MDM_SID = $results[0]->SID;
            $this->MDM_group = $results[0]->group_name;
            $this->MDM_hiring = convertToDate ($results[0]->hiring);
            $this->MDM_branch = $results[0]->branch;
            $this->MDM_position = $results[0]->position;
            $this->MDM_analytic = $results[0]->analytic;
            $this->MDM_email = $results[0]->email ;
            $this->MDM_role = $results[0]->role_name ;
            $this->MDM_msDSPrincipalName = $results[0]->{'msDS-PrincipalName'};
            $this->MDM_FRC = $results[0]->frc_title ;
        }
    }    
}
