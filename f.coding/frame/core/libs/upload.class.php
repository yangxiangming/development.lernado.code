<?php
/**
 * author yangxiangming@live.com
 * description 文件上传类文件文件 2013/12/11
 */
class core_libs_upload {
    
    /**
     * description 文件上传
     */
    public static function upload($filename, $filepath) {
        /** 路径检测 */
        self::findpath($filepath);
        /** 上传文件 */
        if (empty($filename['error'])) {
            /** 文件格式 */
            $_fromat = self::fileformat($filename['type']);
            if ($_fromat){
                /** 是否通过HTTP POST上传 */
                if (is_uploaded_file($filename['tmp_name'])) {
                    /** 设置新的文件名 */
                    $_tmp = substr($filename['name'], strrpos($filename['name'], '.'));
                    $_uniqid = strtolower(md5(uniqid('img_')));
                    $filepath = SYS_PATH . '/' . $filepath . '/' . $_uniqid . $_tmp;
                    /** 上传文件 */
                    if (move_uploaded_file($filename['tmp_name'], $filepath)){
                        return array('code'=>'1', 'error'=>'success', 'path'=>$filepath);
                    } else {
                        return array('code'=>'0', 'error'=>'文件上传失败');
                    }
                } else {
                    return array('code'=>'0', 'error'=>'文件上传违反HTTP POST上传协议');
                }
            } else {
                return array('code'=>'0', 'error'=>'上传文件格式不符合标准');
            }
        } else {
            $_code = $filename['error'];
            switch ($_code) {
                case 1:
                    return array('code'=>'0', 'error'=>'超过了文件大小php.ini中即系统设定的大小');
                case 2:
                    return array('code'=>'0', 'error'=>'超过了文件大小MAX_FILE_SIZE 选项指定的值');
                case 3:
                    return array('code'=>'0', 'error'=>'文件只有部分被上传');
                case 4:
                    return array('code'=>'0', 'error'=>'没有文件被上传');
                case 5:
                    return array('code'=>'0', 'error'=>'上传文件大小为0');
            }
        }
    }
    
    /**
     * description 验证创建路径
     */
    public static function findpath($filepath, $mode=0777) {
        if (file_exists($filepath)){
            return true;
        } else {
            /** 循环创建目录文件 */
            self::findpath(dirname($filepath));
            $_return = @mkdir(SYS_PATH . '/' . $filepath, $mode);
        }
    }
    
    /**
     * description 验证类型
     */
    public static function fileformat($filefromat) {
        /** 文件类型可扩展 */
        $_fromat = array('image/jpeg', 'image/png', 'image/bmp');
        if (in_array($filefromat, $_fromat)){
            return true;
        } else {
            return false;
        }
    }
    
}