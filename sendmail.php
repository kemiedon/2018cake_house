<?php
include("PHPMailerAutoload.php"); //匯入PHPMailer類別
$message = '<html><body>';
$message .= '<table><tr><td>'. strip_tags($_POST['message']) .'</td></tr></table>';
$message .= '</body></html>';

$mail= new PHPMailer(); //建立新物件
$mail->IsSMTP(); //設定使用SMTP方式寄信
$mail->SMTPAuth = true; //設定SMTP需要驗證
$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
$mail->Port = 465;  //Gamil的SMTP主機的SMTP埠位為465埠。
$mail->CharSet = "utf8"; //設定郵件編碼

$mail->Username = "您的gmail帳號"; //設定驗證帳號
$mail->Password = "您的gmail密碼"; //設定驗證密碼

$mail->From = XXX@XXX.XXX.XXX; //設定寄件者信箱
$mail->FromName = "測試人員"; //設定寄件者姓名

$mail->Subject = "PHPMailer 測試信件"; //設定郵件標題
$mail->Body = $message; //設定郵件內容
$mail->IsHTML(true); //設定郵件內容為HTML
$mail->AddAddress("cakehouse@gmail.com", strip_tags($_POST['Email']),); //設定收件者郵件及名稱

if($mail->Send()) {

   $msg = "信件已經發送成功。";//寄信成功就會顯示的提示訊息

}else{
   $msg =  "信件發送失敗！";//寄信失敗顯示的錯誤訊息
}
header('Location: contact.php?msg='.$msg);
?>
