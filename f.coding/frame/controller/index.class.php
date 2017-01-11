<?php
/**
 * author yangxiangming@live.com
 * description 控制器 - 后台首页逻辑类文件 2013/12/17
 */
class controller_index extends core_libs_controller {
    
    /**
     * description 后台首页逻辑入口
     */
    public static function main() {
        try {
            $_list = model_index::main();
            self::calltpl()->assign('list', $_list);
            self::calltpl()->display('index.html');
        } catch ( Exception $e ) {
            throw $e;
        }
    }

}
