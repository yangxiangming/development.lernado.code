<?php
/**
 * author yangxiangming@live.com
 * description 入口 2013/12/11
 */

require_once dirname ( __FILE__ ) . '/../frame/core/config/ini.class.php';

$cla = empty ( $_GET ['a'] ) ? "index" : trim ( $_GET ['a'] );
$claname = SYS_PATH . '/controller/' . $cla . '.class.php';
if (file_exists ( $claname )) {
    $tempname = 'controller_' . $cla;
    $fun = empty ( $_GET ['f'] ) ? 'main' : trim ( $_GET ['f'] );
    if (method_exists ( $tempname, $fun )) {
        $tempname::ini ();
        $tempname::$fun ();
    } else {
        exit ( header ( 'Location:404.html' ) );
    }
} else {
    exit ( header ( 'Location:404.html' ) );
}