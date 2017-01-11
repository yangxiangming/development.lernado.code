<?php
/**
 * author yangxiangming@live.com
 * description 模型 - 后台首页逻辑类文件 2013/12/17
 */
class model_index extends core_libs_safepdo {
    
    /**
     * description 数据查询
     */
    public static function main() {
        $sql = "SELECT `username`, `email`, `level` FROM `example_users` WHERE `status`=0 AND `level`=1";
        $list = self::calldb()->query($sql)->fetch();
        return empty($list) ? array() : $list;
    }
}