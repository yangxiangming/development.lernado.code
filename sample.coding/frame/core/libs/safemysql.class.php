<?php
/**
 * author yangxiangming@live.com
 * description MySQL数据库连接 2013/12/19
 */
class core_libs_safemysql {
    
    /**
     * description 定义静态私有变量
     */
    private static $safemysql;
    
    /**
     * description 构造函数
     */
    private function __construct() {
    }
    
    /**
     * description MySQL连接数据库
     */
    public static function mysqllink() {
        self::$safemysql = mysql_connect ( BASE_HOST, BASE_USER, BASE_PASS );
        if (self::$safemysql) {
            if (mysql_select_db ( BASE_NAME )) {
                return self::$safemysql;
            } else {
                return self::_error ();
            }
        } else {
            return self::_error ();
        }
    }
    
    /**
     * description 返回上一个MySQL函数的错误文本信息
     */
    public static function _error() {
        if (mysql_error () != '') {
            die ( 'MySQL Error:' . mysql_error () );
        }
    }
    
    /**
     * description 单例模式，实例化调用数据库链接
     */
    public static function calldb() {
        if (self::$safemysql == null) {
            self::$safemysql = self::mysqllink ();
        }
        return self::$safemysql;
    }
    
}