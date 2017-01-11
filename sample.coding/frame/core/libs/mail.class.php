<?php
/**
 * author yangxiangming@live.com
 * description 发送邮件配置类文件 2014/08/05
 */
class core_libs_mail {
    
    /**
     * description 系统默认配置
     */
    public static $_mail = array(
        'sender' => array('email' => 'microinfo.org@gmail.com', 'name' => 'Code'),
        'reply' => array('email' => 'yangxiangming@live.com', 'name' => 'Code'),
        'info' => array(
            'title' => 'Welcome to Code',
            'content' => 'Development.Version.Code'
        )
    );
    
    public static function __construct(){}
    
    /**
     * description 发送邮件
     */
    public static function sendmail($senderinfo, $address) {
        /** 设置发送信息 **/
        if (empty($senderinfo)) {
            $senderinfo = self::$_mail;
        }
        
        /** 收件人地址不能为空 **/
        if (empty($address)) {
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
        $mail->Username = MAIL_SERVER_NAME;
        
        /** SMTP服务器密码 **/
        $mail->Password = MAIL_SERVER_PASSWORD;
        
        /** 设置发件人地址和名称 **/
        $mail->SetFrom($senderinfo['sender']['email'], $senderinfo['sender']['name']);
        
        /** 设置邮件回复人地址和名称 **/
        $mail->AddReplyTo($senderinfo['reply']['email'], $senderinfo['reply']['name']);
        
        /** 设置邮件标题 **/
        $mail->Subject = $senderinfo['info']['title'];
        
        /** 设置邮件内容 **/
        $mail->Body = $senderinfo['info']['centent'];
        
        /** 设置收件人地址和名称 **/
        $mail->AddAddress($address['email'], $address['name']);
        if($mail->Send()) {
            return true;
        } else {
            core_libs_function::writelog('sendmail', $mail->ErrorInfo); return false;
        }
    }
    
}
