<?php
/**
 * author yangxiangming@live.com
 * description Memache缓存类 2014/09/04
 */
class core_libs_memcache{

    /**
     * description 配置HOST、端口
     */
    public static $memcache;
    public static $host = '127.0.0.1';
    public static $port = 11211;
    
    /**
     * description 构造函数
     */
    private function __construct() {
    }
    
    /**
     * description 连接Memcache缓存类
     */
    private static function cache($host = null, $port = null){
        $_host = empty($host) ? self::$host : $host;
        $_port = empty($port) ? self::$port : $port;
        self::$memcache = new Memcache();
        self::$memcache->addserver($_host, $_port);
        return self::$memcache;
    }
    
    /**
     * description 单例模式，实例化调用Memcache类
     */
    public static function safecache(){
        if (self::$memcache == null) {
            self::$memcache = self::cache ();
        }
        return self::$memcache;
    }
    
}