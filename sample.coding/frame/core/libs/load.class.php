<?php
/**
 * author yangxiangming@live.com
 * description 加载类文件 2013/12/11
 */
class core_libs_load {
    
    public static $load;
    
    /**
     * 构造
     */
    private function __construct() {
        try {
            spl_autoload_register ( array (
                    $this,
                    'import' 
            ) );
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * 静态化调用
     */
    public static function ini() {
        try {
            if (self::$load == NULL) {
                self::$load = new self ();
            }
            return self::$load;
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * 固定路劲class类文件
     */
    protected function import($class) {
        try {
            $dir = '';
            $path = array ();
            $path = explode ( '_', $class );
            $count = count ( $path ) - 1;
            $dir = implode ( '/', array_slice ( $path, 0, $count ) );
            spl_autoload_extensions ( '.class.php' );
            spl_autoload ( $dir . '/' . $path [$count] );
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
}
