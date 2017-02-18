<?php include "inc/conn.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<title><?php echo $title;?></title>
<script type="text/javascript" src="inc/js/ajax_wap.js"></script>
<link href="inc/css/wap.css" rel="stylesheet" type="text/css" />
<body onLoad="inst();">
<div class="sub_bod"></div>
</br></br><div class="main">
<?php
$stime=microtime(true); 
$codes = trim($_POST['code']);
$shujus = trim($_POST['time']);
$shuru1 = trim($_POST['name']);

if(!$shujus){
?>
<form name="queryForm" method="post" class="" action="" onsubmit="return startRequest(0);">
<div class="select" id="10">
<select name="time" id="time" onBlur="startRequest(1)" />
<?php traverse($UpDir."/");?></select>
</div>
<div class="so_box" id="11">
<input name="name" type="text" class="txts" id="name" value="" onfocus="this.value=''" onBlur="startRequest(2)" />
</div>
<?php 
if($ismas=="1"){
?>
<div class="so_box" id="33">
<input name="code" type="text" class="txts" id="code" onfocus="this.value=''" onBlur="startRequest(3)" />
<div class="more" id="clearkey">
<img src="inc/code.php?t=<?php echo date("Y-m-d-H-i-s",time());?>" id="Codes" onClick="this.src='inc/code.php?t='+new Date();"/>
</div></div>
<?php }?><div class="so_boxes">
<input type="submit" name="button" class="buts" id="sub" value="立即查询" />
</div>
<div class="so_boxed" id="tishi">说明:【<?php echo $tiaojian1;?><?php 
if($ismas=="1"){
?>+验证码<?php }?>】都输入正确才显示相应结果。</div>
<div id="tishi1" style="display:none;">请认真输入你的<?php echo $tiaojian1;?></div>
<div id="tishi4" style="display:none;">认真输入4数字验证码</div>
</form>
<?php
}else{
if($ismas=="1"){
session_start();
if($codes!=$_SESSION['PHP_M2T']){
 webalert("请正确输入验证码！");
}
}
if(!$shuru1){
 webalert("请输入$tiaojian1!");
}
$files = $UpDir."/".$shujus.".dat";

if(!file_exists($files)){
 webalert('请检查数据库文件');
}
$file = fopen($files,'r'); 
while ($data = fgetcsv($file)){
$arra[] = $data;
}
//print_r($arra);
echo '<!--startprint-->';
echo ''; 
foreach($arra as $keyx=>$valx) 
{ 
 $ii++;
    if($ii=="1"){
 $val1=$valx;
 //echo '<tr class="tt">';
      $io=0; 
      $iaa=0; 
 foreach($valx as $keyy=>$valy) 
 { 
 //echo '<td class="r">['.$keyx.']['.$keyy.']</td>';
 //echo '<td class="span">'.$valy.'</td>';
      $io++; 
    if($valy==$tiaojian1){
      $iaa=$io-1; 
    }
 } 
    if(strlen($iaa)<1){   //if($iaa){
 webalert('请检查Excel数据第1行是否存在【'.$tiaojian1.'】字段!');
    }
 //echo '</tr>';
    }else{

if("_".$shuru1=="_".$valx[$iaa]){
echo "<!-- $shuru1=='.$valx[$iaa].' <br>\r\n--> ";
 $iae++;
echo '<table cellspacing="0">';
echo "<caption align='center'>查询结果$iae</caption>";
 foreach($valx as $keyy=>$valy) 
 { 
 echo '<tr>';
 echo "<td class='r'>".$arra[0][$keyy]."</td>";
 echo '<td class="span">'.$valy.'</td>';
 echo '</tr>';
 } 
  echo '</table>';
 }
 }
fclose($file);
}

if($iae<1){
echo '<table cellspacing="0">';
echo '<tr>';
 echo "<td colspan='2'>没有查询到$shujus $tiaojian1 = $shuru1 的相关信息哦</td>";
echo '</tr></table>';
}

echo '<!--endprint-->';
fclose($filer);
?><div class="so_boxes"><input type="button" value="返 回" class="buts" onclick="location.href='index.php';" id="reset"></div>
<?php 
}
$etime=microtime(true);//获取程序执行结束的时间
$total=$etime-$stime;   //计算差值
echo "<!----页面执行时间：{$total} ]秒--->";
?></div>
<div class="foot">
  <div class="title">
    <span>&copy;<?php echo date('Y');?>&nbsp;Anycodes</a>  技术支持</a></span>
  </div>
</div>
</body>
</html><script type="text/javascript" src="../index_cha.js?v=ADA_A1T"></script>
