<?php
	//1、设置字符集
	header('Content-type:text/html;charset=utf-8');
	//2.接受前端请求的参数信息
	//用户名
	$uname = $_POST['uname'];
	//密码
	$upwd = $_POST['upwd'];
	echo $uname,$upwd;
	//将接收到的文件存放到数据库中
	/*
	1、链接到数据库管理软件中并找到操作的数据库
	2、编写sql语句，用于操作数据库
	3、执行sql语句

	*/
	$db = mysqli_connect('localhost','root','root','ty2003');
	$sql = "insert into users (uname,upwd) value('$uname','$upwd')";
	$row = mysqli_query($db,$sql);
	if($row){
		echo "<script>alert('注册成功');location.href='../login.html';</script>";
	}else{
		echo "<script>alert('注册失败');location.href='../registor.html';</script>";
	}