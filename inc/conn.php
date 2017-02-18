<?php
error_reporting(0);
header("content-Type: text/html; charset=UTF-8");//输出编码GBK

//设置好以下三项查询条件,得都输入
$tiaojian1="名称";			//查询条件1列标题，跟excel列头一致，注意无空格;

$UpDir="dicdata";			//设置数据库所在目录(文件夹名称)请修改，修改后更名对应文件夹。
$title="编程词典";			//设置查询标题,相信你懂的。
$copyr="Anycodes";				//设置底部版权文字,相信你懂的。
$copyu="http://www.anycodes.cn/";			//设置底部版权连接,相信你懂的。

$ismas="0";				//设置是否使用验证码，1是0否。


function webalert($Key){
 $html="<script>\r\n";
 $html.="alert('".$Key."');\r\n";
 $html.="history.go(-1);\r\n";
 $html.="</script>";
 exit($html);
}
function traverse($path = '.') {
 $current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
 while(($file = readdir($current_dir)) !== false) {    //readdir()返回打开目录句柄中的一个条目
 $sub_dir = $path . DIRECTORY_SEPARATOR . $file;    //构建子目录路径
 if($file == '.' || $file == '..') {
 //continue;
 } else if(is_dir($sub_dir)) {    //如果是目录,进行递归
 //echo 'Directory ' . $file . ':<br>';
 //traverse($sub_dir);
 } else {    //如果是文件,直接输出

 $file = str_replace(".dat","",$file);    //文件名除了后缀，不要包含.dat
 echo '<option value="'.$file.'">' . $file . '</option>';
 }
 }
}

function fileline1($path = '.') {
   $a_content = file_get_contents($path);
   $str = strtok($a_content,"\r");
   return $str;
}

//	方案1：直接通过设定的（1-3个）查询条件查询

function get_file_line( $file_name, $line ){
  $n = 0;
  $handle = fopen($file_name,'r');
  if ($handle) {
    while (!feof($handle)) {
        ++$n;
        $out = fgets($handle, 4096);
        if($line==$n) break;
    }
    fclose($handle);
  }
  if( $line==$n) return $out;
  return false;
}

?>
