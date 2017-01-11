<?php
/**
 * author yangxiangming@live.com
 * description 项目转换配置文件 2013/12/11
 */
require_once __DIR__ . '/config.class.php';

defined ( 'PATH_SYS' ) or define ( 'PATH_SYS', str_replace ( '\\', '/', realpath ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) . '' ) ) ) ) );
set_include_path ( PATH_SYS . '/frame' );

require_once FRAME_CORE . '/libs/load.class.php';
core_libs_load::ini ();

if (DEBUG_MODE) {
    error_reporting ( E_ALL ^ E_NOTICE );
} else {
    error_reporting ( 0 );
}

if (! get_magic_quotes_gpc ()) {
    $_REQUEST = core_libs_function::strip_array ( $_REQUEST );
    $_POST = core_libs_function::strip_array ( $_POST );
    $_GET = core_libs_function::strip_array ( $_GET );
}

require_once FRAME_CORE . '/libs/function.class.php';

/**
 * description Smarty
 */
require_once FRAME_CORE . '/libs/smarty.class.php';

/**
 * description Beta Notice
 */
$betanotice = '<span data-shadow="CSS 3D Lettering"> Core Code </span>';
core_libs_smarty::calltpl ()->assign ( 'betanotice', $betanotice );

/**
 * Start Session
 */
// session_start();

