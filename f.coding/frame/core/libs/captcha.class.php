<?php
/**
 * author yangxiangming@live.com
 * description 验证码类文件文件 2014/05/11
 */
 
class core_libs_captcha {

    private static $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ1234567890';  /** 随机因子 */
    private static $code;  /** 验证码 */
    private static $codelen = 4; /** 验证码长度 */
    private static $width = 130;  /** 宽度 */
    private static $height = 50;  /** 高度 */
    private static $img;  /** 图形资源句柄 */
    private static $font;  /** 指定的字体 */
    private static $fontsize = 20;  /** 指定字体大小 */
    private static $fontcolor;  /** 指定字体颜色 */
    
    /**
     * description 构造方法初始化
     */
    public function __construct() {
        self::$font = '/captcha/font/elephant.ttf';
    }
    
    /**
     * description 生成随机码
     */
    private static function createCode() {
        $_len = strlen(self::$charset)-1;
        for ($i=0;$i<self::$codelen;$i++) {
            self::$code .= self::$charset[mt_rand(0,$_len)];
        }
    }
    
    /**
     * description 生成背景
     */
    private static function createBg() {
        self::$img = imagecreatetruecolor(self::$width, self::$height);
        $color = imagecolorallocate(self::$img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
        imagefilledrectangle(self::$img, 0, self::$height, self::$width, 0, $color);
    }
    
    /**
     * description 生成文字
     */
    private static function createFont() {
        $_x = self::$width / self::$codelen;
        for ($i=0;$i<self::$codelen;$i++) {
            self::$fontcolor = imagecolorallocate(self::$img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
            imagettftext(self::$img, self::$fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),self::$height / 1.4,self::$fontcolor,self::$font,self::$code[$i]);
        }
    }
    
    /**
     * description 生成线条、雪花
     */
    private static function createLine() {
        for ($i=0;$i<6;$i++) {
            $color = imagecolorallocate(self::$img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
            imageline(self::$img,mt_rand(0,self::$width),mt_rand(0,self::$height),mt_rand(0,self::$width),mt_rand(0,self::$height),$color);
        }
        for ($i=0;$i<100;$i++) {
            $color = imagecolorallocate(self::$img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
            imagestring(self::$img,mt_rand(1,5),mt_rand(0,self::$width),mt_rand(0,self::$height),'*',$color);
        }
    }
    
    /**
     * description 生成输入图片
     */
    private static function outPut() {
        header('Content-type:image/png');
        imagepng(self::$img);
        imagedestroy(self::$img);
    }
    
    /**
     * description 对外生成
     */
    public static function doimg() {
        self::createBg();
        self::createCode();
        self::createLine();
        self::createFont();
        self::outPut();
    }
    
    /**
     * description 获取验证码
     */
    public static function getCode() {
        return strtolower(self::$code);
    }
    
}
