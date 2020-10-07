<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odata_1C
{
    public static $connections = [
        '1CDO' => [
            'URL' => 'http://m1c-1/do/odata/standard.odata/',
            'USERNAME' => 'webreader',
            'PASSWORD' => 'webreader'
        ],
        '1CZUP' => [
            'URL' => 'http://m1c-1/1c-zup-uu-odata/odata/standard.odata/',
            'USERNAME' => 'webreader',
            'PASSWORD' => 'DU2xy8mi'

        ],
        '1CZUP_TEST' => [
            'URL' => 'http://m1c-dev1/1cdev-zup-uu/hs/employee/',
            'USERNAME' => 'webreader',
            'PASSWORD' => 'webreader'

        ]

    ];
    //_____________________________________________________________________
    public static function getJSON($odata_name, $params=[])
    {
        if (isset(Odata_1C::$connections[$odata_name])) {
            $odata = Odata_1C::$connections[$odata_name];
        } else {
            echoError('Беда '.$odata_name);
            die;
        }
        $url = $odata['URL'] ;
        if (isset($params['entity'])) {
            $url = $url . urlencode($params['entity']) . '?$format=json';
            unset($params['entity']);
        }

        foreach ($params as $key => $item) {
            if (strlen($item) > 0) {
                $url .= '&$' . $key . '=' . rawurlencode($item);
            }
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, $odata['USERNAME'] . ':' . $odata['PASSWORD']);

        $response = curl_exec($ch);
        // Проверяем на ошибки и выводим их описание
        if ($errno = curl_errno($ch)) {
            //$error_message = curl_strerror($errno);
            echoError("cURL error ({$errno})", curl_strerror($errno) . '<hr>' . str_replace('$', '<br>$', urldecode($url)));
            $data = 0;
        } else {
            $data =  json_decode($response, true);
            if ($data === null) {
                echoError(print_r($response, TRUE), $url);
            } elseif (array_key_exists("odata.error", $data)) {
                $data = 0;
                echoError('<b>В запросе к ODATA </b><br>' . str_replace('$', '<br>$', urldecode($url)), 'print_r($data["odata.error"], TRUE)');
            }
        }

        curl_close($ch);
        return $data;
    }
}
