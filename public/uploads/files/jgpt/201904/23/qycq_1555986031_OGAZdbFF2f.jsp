<%@ page language="java" contentType="text/html;charset=utf-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<c:set var="ctx" value="${pageContext.request.contextPath}" />
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>测试单点登录</title>

<script src="${ctx}/assets/metronic/v4.5/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="${ctx}/assets/md5/jquery.md5.js" type="text/javascript"></script>

</head>
<body>

	<br>
	sso_key: <input type="text" name="key" value="1q2w3e">系统提供的key，请执行系统提供商
	<br>
	登录账号: <input type="text" name="userName" value="">需要与系统的登录账号相同
	<br>
	<input type="button" value="单点登录" onclick="openSSO();" />
	
	<script type="text/javascript">
	// 打开登录窗口
	function openSSO() {
		var sso_key = $("input[name='key']").val();// 进入系统的Key，由外系统给出，建议改为后台参数配置。
		if(sso_key == null || sso_key == '') {
			sso_key = $.md5("1q2w3e");
		}
		var key = $.md5(sso_key);
		var userName = $("input[name='userName']").val();// 用户名
		if(userName == null || userName == '') {
			userName  = "1"; // 用户名
		}
		var time = new Date().getTime(); //获取请求时间
		var randomNum = random(10000, 999999);// 获取 5到6位数的随机数
		console.log(key);
		console.log(userName);
		var arr = new Array(time, randomNum, key);// 组合数组
		arr = arr.sort(); // 排序
		var temp = arr.join(""); //连接字符串
		console.log(temp);
		
		var token = $.md5(temp); //加密 连接字符串
		// 请求的地址localhost:8080/jlbc,${ctx} 是服务的路径
		var url = "${ctx}/sso?token=" + token
				+ "&randomNum=" + randomNum + "&time=" + time + "&userName="
				+ userName;
		
		console.log(url);
		window.open(url);
	}
	
	//获取范围内的随机数 
	function random(min, max) {
		return Math.floor(min + Math.random() * (max - min));
	}
	</script>
</body>
</html>