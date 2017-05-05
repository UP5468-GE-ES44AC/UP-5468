<?php
require_once ('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员注册</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function chk(theForm){
	if (theForm.member_user.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("帐号不能为空！");
		theForm.member_user.focus();   
		return (false);   
	}		
	
	if (theForm.member_password.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("密码不能为空！");
		theForm.member_password.focus();   
		return (false);   
	}	
	
	if (theForm.member_password.value != theForm.pass.value){
		alert("两次输入密码不一样！");
		theForm.pass.focus();   
		return (false);   
	}	
		 
	if (theForm.member_name.value.replace(/(^\s*)|(\s*$)/g, "") == "" || theForm.member_name.value.replace(/[\u4e00-\u9fa5]/g, "")){
		alert("真实姓名不能为空且必须为中文！");   
		theForm.member_name.focus();   
		return (false);   
	}
}
</script>
<?php
if($_POST["submit"]){
if(empty($_POST['member_user']))
	echo "<script>alert('帐号不能为空');location='?tj=register';</script>";
else if(empty($_POST['member_password']))
	echo "<script>alert('密码不能为空');location='?tj=register';</script>";
else if($_POST['member_password']!=$_POST['pass'])
	echo "<script>alert('两次密码不一样');location='?tj=register';</script>";
else if(!empty($_POST['member_qq'])&&!is_numeric($_POST['member_qq']))
	echo "<script>alert('qq号必须全为数字');location='?tj=register';</script>";
else if(!empty($_POST['member_phone'])&&!is_numeric($_POST['member_phone']))
	echo "<script>alert('手机号码必须全为数字');location='?tj=register';</script>";
else if(!empty($_POST['member_email'])&&!ereg("([0-9a-zA-Z]+)([@])([0-9a-zA-Z]+)(.)([0-9a-zA-Z]+)",$_POST['member_email']))
	echo "<script>alert('邮箱输入不合法');location='?tj=register';</script>";
else{
$_SESSION['member']=$_POST['member_user'];
$sql="insert into member values('','".$_POST['member_user']."','".md5($_POST['member_password'])."','".$_POST['member_name']."','".$_POST['member_sex']."','".$_POST['member_qq']."','".$_POST['member_phone']."','".$_POST['member_email']."')";
$result=mysql_query($sql)or die(mysql_error());
if($result)
echo "<script>alert('恭喜你注册成功,马上进入主页面');location='member.php';</script>";
else
{
	echo "<script>alert('注册失败');location='index.php';</script>";
	mysql_close();
}
	}
}
?>
</head>
<body>
<?php if($_GET['tj'] == 'register'){ ?>
<form id="theForm" name="theForm" method="post" action="" onSubmit="return chk(this)" runat="server" style="margin-bottom:0px;">
  <table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
    <tr>
      <td colspan="2" align="center" bgcolor="#EBEBEB">会员注册&nbsp;&nbsp;以下打“*”为必填项</td>
    </tr>
    <tr>
      <td width="60" align="right" bgcolor="#FFFFFF">账&nbsp;&nbsp;&nbsp;号:</td>
      <td width="317" bgcolor="#FFFFFF"><input name="member_user" type="text" id="member_user" size="20" maxlength="20" />
	  <font color="#FF0000"> *</font>(由数字或字母组成)</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">密&nbsp;&nbsp;&nbsp;码:</td>
      <td bgcolor="#FFFFFF"><input name="member_password" type="password" id="member_password" size="20" maxlength="20" />
      <font color="#FF0000"> *</font>(由数字或字母组成)</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">确认密码:</td>
      <td bgcolor="#FFFFFF"><input name="pass" type="password" id="pass" size="20" />
      <font color="#FF0000"> *</font>(再次输入密码)</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">真实姓名:</td>
      <td bgcolor="#FFFFFF"><input name="member_name" type="text" id="member_name" size="20" />
      <label><font color="#FF0000">*</font></label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">性&nbsp;&nbsp;&nbsp;别:</td>
      <td align="left" bgcolor="#FFFFFF">
          <input name="member_sex" type="radio" id="0" value="男" checked="checked" />
          男
          <input type="radio" name="member_sex" value="女" id="1" />
          女&nbsp;</label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">Q&nbsp;&nbsp;&nbsp;Q:</td>
      <td bgcolor="#FFFFFF"><input name="member_qq" type="text" id="member_qq" size="20"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">联系方式:</td>
      <td bgcolor="#FFFFFF"><input name="member_phone" type="text" id="member_phone" size="20"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">电子邮箱:</td>
      <td bgcolor="#FFFFFF"><input name="member_email" type="text" id="member_email" size="20"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="reset" name="button" id="button" value="重置表单" />
      <input type="submit" name="submit" id="submit" value="确定注册" /></td>
    </tr>
  </table>
</form>
<?php
} 
	if($_GET['tj']== ''){
?>
<?php
if($_POST["submit2"]){
$name=$_POST['name'];
$pw=md5($_POST['password']);
$sql="select * from member where member_user='".$name."'"; 
$result=mysql_query($sql) or die("账号不正确");
$num=mysql_num_rows($result);
if($num==0){
	echo "<script>alert('帐号不存在');location='index.php';</script>";
	}
while($rs=mysql_fetch_object($result))
{
	if($rs->member_password!=$pw)
	{
		echo "<script>alert('密码不正确');location='index.php';</script>";
		mysql_close();
	}
	else 
	{
		$_SESSION['member']=$_POST['name'];
		header("Location:member.php");
		mysql_close();
		}
	}
}
?>
<form action="" method="post" name="regform" onSubmit="return Checklogin();" style="margin-bottom:0px;">
<table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td colspan="2" align="center" bgcolor="#EBEBEB" class="font">会员登陆</td>
  </tr>
    <tr>
      <td width="65" align="center" bgcolor="#FFFFFF" class="font">用户名:</td>
      <td width="262" bgcolor="#FFFFFF" class="font"><input name="name" type="text" id="name"></td>
    </tr>
    <tr>
      <td align="center" valign="top" bgcolor="#FFFFFF" class="font">密&nbsp;码:</td>
      <td bgcolor="#FFFFFF" class="font"><input name="password" type="password" id="name">        </td>
    </tr>
    <tr>
    <td colspan="2" align="center" valign="top" bgcolor="#FFFFFF" class="font"><input name="submit2" type="submit" value="会员登录"/>
      <a href='index.php?tj=register'>没有账号？立即注册...</a></td>
  </tr>
</table>
</form>
<?php } ?>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>

<table width="350" height="20" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td align="left" bgcolor="#FFFFFF">&nbsp;Copyright @2013 All Rights Reserved. Build V.02 by&nbsp;&nbsp;<a href="http://www.04ie.com" target="_blank" title="夏日源码">04ie.com</a></td>
  </tr>
</table>
</body>
</html>