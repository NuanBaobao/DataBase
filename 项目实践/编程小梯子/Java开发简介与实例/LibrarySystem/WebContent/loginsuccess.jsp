<%--
  Created by IntelliJ IDEA.
  User: gsy
  Date: 2018/2/6
  Time: 22:32
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
  <head>
    <title>$Title$</title>
  </head>
  <body>
  <h1>登录成功</h1>
  </body>
  <script  type="text/javascript">
var a='<%=request.getAttribute("msg")%>';
if(a!='null')
	alert(a);
</script>
  
</html>
