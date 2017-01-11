<?php
/**
 * author yangxiangming@live.com
 * description 常量定义配置文件 2013/12/11
 */

define ( '_WWW_', 'www.yangxiangming.com' );

/**
 * description 项目路径
 */
define ( 'NET_PAHT', dirname ( dirname ( __DIR__ ) ) . '/net' );
define ( 'SYS_PATH', dirname ( dirname ( __DIR__ ) ) );
define ( 'FRAME_CORE', dirname ( __DIR__ ) );

/**
 * description 数据库信息
 */
define ( 'ENVIRONMENT', 'dev' );
switch (ENVIRONMENT) {
    case 'dev' :
        define ( 'BASE_TYPE', 'mysql' );
        define ( 'BASE_HOST', '127.0.0.1' );
        define ( 'BASE_NAME', 'org_example' );
        define ( 'BASE_USER', 'root' );
        define ( 'BASE_PASS', '123456' );
        break;
    case 'pro' :
        define ( 'BASE_TYPE', 'mysql' );
        define ( 'BASE_HOST', '' );
        define ( 'BASE_NAME', '' );
        define ( 'BASE_USER', '' );
        define ( 'BASE_PASS', '' );
        break;
}

/**
 * description 开启debug
 */
define ( 'DEBUG_MODE', 1 );

/**
 * description 设置地址
 */
define ( 'REDIS_HOST', '127.0.0.1' );
define ( 'REDIS_PORT', 3306 );

/**
 * description 设置邮件服务器
 */
define ( 'MAIL_SERVER_NAME', 'yangxiangming.info@gmail.com' );
define ( 'MAIL_SERVER_PASSWORD', '' );

