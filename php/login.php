<?php
	//设置字符集
	header('Content-type:text/html;charset=utf-8');
	//接受前端请求
	$uname = $_POST['uname'];
	$upwd = $_POST['upwd'];
	//操作数据库
	$link = mysqli_connect('localhost','root','root','ty2003');
	//编写
	$sql= "SELECT  `uname`, `upwd` FROM `users` WHERE uname = '$uname'";
	//执行
	$set = mysqli_query($link,$sql);//返回数据为一个集合，集合不能直接使用，所以将他转化为数组
	//一次只能转集合中的一条数据
	$arr = mysqli_fetch_array($set);
	print_r($arr);
	// 判断用户名是否被相同，如果相同，密码是否相同
	if($uname == $arr['uname']){
		if($upwd == $arr['upwd']){
			echo "<script>alert('登录成功');location.href='../index.html';</script>";
		}else{
			echo "<script>alert('密码错误');location.href='../login.html';</script>";
		}
	}else{
		echo "<script>alert('用户名不存在');location.href='../login.html';</script>";
	}