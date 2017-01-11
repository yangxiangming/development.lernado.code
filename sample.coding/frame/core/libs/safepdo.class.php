<?php
/**
 * author yangxiangming@live.com
 * description PDO数据库连接 2013/12/11
 */
class core_libs_safepdo {
    
    /**
     * description 定义私有静态变量
     */
    private static $safepdo;
    
    /**
     * description 构造函数
     */
    private function __construct() {
    }
    
    /**
     * description 实例化调用PDO链接数据库
     */
    private function pdolink() {
        try {
            self::$safepdo = new PDO ( BASE_TYPE . ':host=' . BASE_HOST . ';dbname=' . BASE_NAME, BASE_USER, BASE_PASS, array (
                    PDO::ATTR_PERSISTENT => TRUE,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' 
            ) );
            return self::$safepdo;
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 覆盖__clone()方法，禁止克隆
     */
    private function __clone() {
    }
    
    /**
     * description 单例模式，实例化调用数据库链接
     */
    public static function calldb() {
        if (self::$safepdo == null) {
            self::$safepdo = self::pdolink ();
        }
        return self::$safepdo;
    }
    
    /**
     * description 获取键值
     */
    public static function getkeys($fields) {
        try {
            $keys = implode ( '`, `', array_keys ( $fields ) );
            return '`' . $keys . '`';
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 获取预处理值
     */
    public static function getvalues($fields) {
        try {
            $keys = implode ( ', :', array_keys ( $fields ) );
            return ':' . $keys . '';
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 绑定对应键值
     */
    public static function setkeys($fields) {
        try {
            $string = '';
            foreach ( $fields as $key => $value ) {
                $string .= $key . '=:' . $key . ',';
            }
            return substr ( $string, 0, - 1 );
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
}
