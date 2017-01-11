<?php
/**
 * author yangxiangming@live.com
 * description  控制器调用类文件 2013/12/11
 */
class core_libs_controller extends core_libs_smarty {
    
    public static function ini() {
    }
    
    public static function redis() {
        return core_libs_function::redis ();
    }
    
}
