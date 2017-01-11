<?php
/**
 * author yangxiangming@live.com
 * description AES加密类文件 2014/03/28
 */
class core_libs_mcryptAES {

    public static $key = "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3"; /** 加密KEY | KEY支持(16、24、32位) */
    public static $mode = MCRYPT_MODE_ECB; /** 填充模式 | CBC模式 */
    public static $cipher = MCRYPT_RIJNDAEL_128; /** AES加密算法位数 | 128为16位;192为24位;256为32位 */
    
    /**
     * description AES加密
     */
    public static function mcrypt_encrypt_aes($plaintext) {
        $ciphertext = mcrypt_encrypt ( self::$cipher, self::get_hash ( self::$key ), $plaintext, self::$mode, self::get_iv () );
        return base64_encode ( $ciphertext );
    }
    
    /**
     * description AES解密
     */
    public static function mcrypt_decrypt_aes($ciphertext) {
        $ciphertext = base64_decode ( $ciphertext );
        return trim ( mcrypt_decrypt ( self::$cipher, self::get_hash ( self::$key ), $ciphertext, self::$mode, self::get_iv () ) );
    }
    
    /**
     * description hash算法生成加密散列值
     */
    public static function get_hash($plaintext) {
        return hash ( 'sha256', $plaintext, true );
    }
    
    /**
     * description 根据IV的大小创建加密IV
     */
    public static function get_iv() {
        $iv_size = mcrypt_get_iv_size ( self::$cipher, self::$mode );
        return mcrypt_create_iv ( $iv_size, MCRYPT_RAND );
    }
    
}