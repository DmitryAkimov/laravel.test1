<?php
//_____________________________________________________________________
// возвращает массив параметров в виде строки key1="val1"
function getHTMLattrs($attrs) {
    $res = '';
    if ($attrs){
        foreach ($attrs as $key=>$val) {
            $res .= " $key=\"$val\" ";
        }
    }
    return $res;
}
//_____________________________________________________________________
function TD($smth, $attrs=[])
{
    $attr = getHTMLattrs($attrs);
    return "<td $attr> $smth </td>";
}
//_____________________________________________________________________
function TH($smth, $attrs=[])
{
    $attr = getHTMLattrs($attrs);
    return "<th $attr> $smth </th>";
}
//_____________________________________________________________________
function TR($ar_td, $attrs=[])
{
    $res = '';
    foreach ($ar_td as $td) {
        $res .= TD($td);
    }
    $attr = getHTMLattrs($attrs);
    $res = "<tr $attr> $res </tr>";
    return $res;
}
//_____________________________________________________________________
function convertToDate($smth)
{
    $smth = substr($smth, 0, 10);
    if ((strlen($smth) > 0) && ($smth != '0001-01-01')) {
        return  DateTime::createFromFormat('Y-m-d', $smth);
    } else {
        return DateTime::createFromFormat('Y-m-d', '1900-01-01');
    }
}

//_____________________________________________________________________
function getErrorAlert($header, $text = '')
{
    $res = '<div class="container">';
    $res .= '<div class="alert alert-danger" role="alert">';
    $res .= '  <h4 class="alert-heading">ОШИБКА ' .$header .'</h4>';
    $res .= "  <p>$text</p>";
    $res .= '</div>';
    $res .= '</div>';
    return $res;
}

function echoError($text1, $text2 = ''): void {
    echo getErrorAlert ($text1, $text2);
}

function getMyURI()
{
    $uri = $_SERVER['REQUEST_URI'];
    $pos = strripos($uri, '?');

    return (($pos === false) ? $uri : substr($uri, 0, $pos));
}
?>