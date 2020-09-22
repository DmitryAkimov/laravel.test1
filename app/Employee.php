<?php

namespace App;

use App\Odata_1C;
use Illuminate\Support\Facades\DB;

class Employee
{
    //
    var $Ref_Key;
    var $SID;
    var $FIO;
    var $title;
    var $employeeID;
    //_____________________________________________________________________
    function loadFromArray ($arr, $Ref_Key = '')
    {
        $this->Ref_Key = isset($arr['Ref_Key']) ? $arr['Ref_Key'] : $Ref_Key;
        $this->FIO = isset($arr['ФИО']) ? $arr['ФИО'] : '';
        $this->employeeID = isset($arr['Code']) ? $arr['Code'] : '';
    }
    //_____________________________________________________________________
    public static function all($filter = 'ACTIVE')
    {
        $res = [];
        $data = Odata_1C::getJSON(
            '1CZUP',
            [
                'entity' => 'Catalog_ФизическиеЛица',
                'select' => 'Ref_Key,Description,Code,ФИО',
                //'expand' => 'Менеджер,Подразделение,СтатусПроекта',
                'filter' => "IsFolder eq false"
            ]
        );

        if ($data) {
            foreach ($data['value'] as $data_employee) {
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
            '1CZUP',
            [
                'entity' => 'Catalog_ФизическиеЛица',
                'select' => 'Ref_Key,Description,Code,ФИО',
                'filter' => "Ref_Key eq guid'" . $uid  . "'",
            ]
        );
        $employee = new Employee;
        if (!empty($data)) {
             $employee->loadFromArray(current($data['value']), $uid);
            return $employee;
        } else {
            $employee->FIO = 'Сотрудник не найден '.$uid;
        }
        return $employee;
    }
}
