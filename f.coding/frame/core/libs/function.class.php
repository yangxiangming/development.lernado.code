<?php
/**
 * author yangxiangming@live.com
 * description 方法类文件文件 2013/12/11
 */
final class core_libs_function {

    /**
     * description 魔术引号
     */
    final public static function stripArray($val) {
        try {
            return is_array ( $val ) ? array_map ( "self::strip_array", $val ) : addslashes ( htmlspecialchars ( $val ) );
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 连接Redis服务
     */
    final public static function redis() {
        try {
            if (is_null ( self::$redis )) {
                self::$redis = new Redis ();
                self::$redis->connect ( REDIS_HOST, REDIS_PORT );
            }
            return self::$redis;
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 用户名验证 5到15个字符以内，只能是字母、数字、下划线
     */
    final public static function isName($val) {
        try {
            $pattem = "/^[a-zA-Z0-9_]{5,15}$/";
            if (preg_match ( $pattem, $val )) {
                return $val;
            } else {
                return false;
            }
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 邮箱验证
     */
    final public static function isEmail($val) {
        try {
            $pattem = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";
            if (preg_match ( $pattem, $val )) {
                return $val;
            } else {
                return false;
            }
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 整数验证
     */
    final public static function isInt($val) {
        try {
            $pattem = "/^[0-9]*$/";
            if (preg_match ( $pattem, $val )) {
                return $val;
            } else {
                return false;
            }
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 字符串验证
     */
    final public static function isString($val) {
        try {
            $pattem = "/^[0-9]*$/";
            if (preg_match ( $pattem, $val )) {
                return $val;
            } else {
                return false;
            }
        } catch ( Exception $e ) {
            throw $e;
        }
    }
    
    /**
     * description 过滤转义POST|GET|Cookie的数据
     */
    final public static function isEscape($val, $isboor = false) {
        if (! get_magic_quotes_gpc ()) {
            $val = addslashes ( $val );
        }
        if ($isboor) {
            $val = strtr ( $val, array (
                    "%" => "\%",
                    "_" => "\_" 
            ) );
        }
        return $val;
    }
    
    /**
     * description 输出json数据格式
     */
    final public static function outputJson($array, $isboor = true, $isheader = true) {
        header ( "Expires: Mon, 26 Jul 1997 01:00:00 GMT" );
        $isheader && header ( 'Content-type: application/json;charset=utf-8' );
        header ( "Pramga: no-cache" );
        header ( "Cache-Control: no-cache" );
        if ($isboor) {
            exit ( json_encode ( ( array ) ($array), JSON_NUMERIC_CHECK ) );
        } else {
            exit ( stripcslashes ( json_encode ( ( array ) ($array) ) ) );
        }
    }
    
    /**
     * description 获取数字字符串中间数
     */
    final public static function getMidNumber($number) {
        $retrun = explode ( ',', $number );
        sort ( $retrun );
        $count = count ( $retrun );
        $ceil = ceil ( $count / 2 ) - 1;
        return $retrun [$ceil];
    }
    
    /**
     * description 获取质数
     */
    final public static function getPrimesNumber($number) {
        $primes = array ();
        for($i = 1; $i < $number; $i ++) {
            for($j = 2; $j < $i; $j ++) {
                if ($i % $j == 0) {
                    continue 2;
                }
            }
            $primes [] = $i;
        }
        return $primes;
    }
    
    /**
     * description 验证18位身份证
     */
    final public static function checkIdentity($id=''){
        $set = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2);
        $ver = array('1','0','x','9','8','7','6','5','4','3','2');
        $arr = str_split($id);
        $sum = 0;
        for ($i = 0; $i < 17; $i++){
            if (!is_numeric($arr[$i])){
                return false;
            }
            $sum += $arr[$i] * $set[$i];
        }
        $mod = $sum % 11;
        if (strcasecmp($ver[$mod],$arr[17]) != 0){
            return false;
        }
        return true;
    }
    
    /**
     * description CURL获取网页数据
     */
    final public static function getCurlData($url) {
        if (empty ( $url )) {
            return false;
        }
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        $output = curl_exec ( $ch );
        curl_close ( $ch );
        return $output;
    }
    
    /**
     * description 写入日志
     */
    final public static function writeLog($filename, $content){
        $logpath = SYS_PATH . '/data/tmp';
        $_tmp_path = explode('/', $logpath);
        $path = $result = true;
        foreach ($_tmp_path as $_path) {
            $path .= $_path . '/';
            if (!file_exists($path)) {
                $result = mkdir($path);
            }
        }
        $_name = $path . $filename . '.log';
        file_put_contents($_name, var_export($content, true) . "【Time：" . date("Y-m-d H:i:s") . '】' . PHP_EOL, FILE_APPEND);
    }
    
    /**
     * description 随机字符
     */
    final public static function randomKey($prefix = null){
        if (empty($prefix)) {
            $prefix = 'A_';
        }
        /** 生成以$prefix为前缀的唯一ID序列值 */
        $_uniqid = uniqid($prefix);
        /** 生成8位随机数 */
        $_rand = mt_rand(10000000, 99999999);
        /** 转化大写 */
        $_strtoupper = strtoupper($_uniqid);
        /** 返回随机唯一ID序列值 */
        return $_strtoupper . '_' . $_rand;
    }

    /**
     * description 发送邮件
     */
    final public static function sendMail($senderinfo, $address) {
        /** 设置发送信息 **/
        if (empty($senderinfo) || empty($address)) {
            return false;
        }
        require_once FRAME_CORE . '/expand/phpmailer/class.phpmailer.php';
        $mail = new PHPMailer();
        /** 设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置为 UTF-8 **/
        $mail->CharSet = "UTF-8";
        /** 设定使用SMTP服务 **/
        $mail->IsSMTP();
        /** 启用SMTP验证功能 **/
        $mail->SMTPAuth = true;
        /** SMTP安全协议 **/
        $mail->SMTPSecure = "ssl";
        /** SMTP服务器 **/
        $mail->Host = "smtp.gmail.com";
        /** SMTP服务器的端口号 **/
        $mail->Port = 465;
        /** SMTP服务器用户名 **/
        $mail->Username = "yangxiangming.info@gmail.com";
        /** SMTP服务器密码 **/
        $mail->Password = "******";
        /** 设置发件人地址和名称 **/
        $mail->SetFrom($senderinfo['sender']['email'], $senderinfo['sender']['name']);
        /** 设置邮件回复人地址和名称 **/
        $mail->AddReplyTo($senderinfo['reply']['email'], $senderinfo['reply']['name']);
        /** 设置邮件标题 **/
        $mail->Subject = $senderinfo['info']['title'];
        /** 设置邮件内容 **/
        $mail->Body = $senderinfo['info']['content'];
        /** 设置收件人地址和名称 **/
        $mail->AddAddress($address['email'], $address['name']);
        if($mail->Send()) {
            return true;
        } else {
            self::writelog('sendmail', $mail->ErrorInfo); return false;
        }
    }
    
}
