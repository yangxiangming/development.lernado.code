<?php
/**
 * author yangxiangming@live.com
 * description Smarty配置文件 2013/12/11
 */
require_once FRAME_CORE . '/expand/smarty3.1/Smarty.class.php';
class core_libs_smarty {
    
    private static $smarty = null;
    
    /**
     * description 配置smarty配置项
     */
    private function smarty() {
        try {
            self::$smarty = new Smarty ();
            self::$smarty->template_dir = SYS_PATH . '/templates/';
            self::$smarty->compile_dir = SYS_PATH . '/data/templates_c/';
            self::$smarty->config_dir = FRAME_CORE . '/config/';
            self::$smarty->cache_dir = SYS_PATH . 'data/cache/';
            self::$smarty->caching = false;
            self::$smarty->left_delimiter = '<{';
            self::$smarty->right_delimiter = '}>';
            return self::$smarty;
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 单例模式，实例化调用Smarty模版
     */
    public static function calltpl() {
        try {
            if (self::$smarty == null) {
                self::$smarty = self::smarty ();
            }
            return self::$smarty;
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
}
