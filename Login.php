<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="bootstrap.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <form class="form-horizontal" action="Home.php" method="post">
        <!--<div class="btn-group">
          <button class="btn">Action</button>
          <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li> <a href="#">操作</a> </li>
            <li> <a href="#">设置栏目</a> </li>
            <li> <a href="#">更多设置</a> </li>
            <li class="divider"> </li>
            <li class="dropdown-submenu"> <a tabindex="-1" href="#">更多选项</a>
              <ul class="dropdown-menu">
                <li> <a href="#">操作</a> </li>
                <li> <a href="#">设置栏目</a> </li>
                <li> <a href="#">更多设置</a> </li>
              </ul>
            </li>
          </ul>
        </div>
        -->
        <div>登录方式</div>
        <div>
          <select name="login">
            <option value = "a">guest</option>
            <option value = "b">host</option>
          </select>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">ID</label>
          <div class="controls">
            <input name="id" type="text" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword">PASSWORD</label>
          <div class="controls">
            <input name="pswd" type="password" />
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <label class="checkbox">
              <input type="checkbox" />
              Remember me</label>
            <button type="submit" class="btn">登陆</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--<form action="Home.php" method="post">
  <td>登录方式</td>
  <td><select name="login">
      <option value = "a">guest</option>
      <option value = "b">host</option>
    </select>
    <p>login</p>
    ID
    <input name="id" type="text" />
    </p>
    PASSWORD
    <input name="pswd" type="text" />
    </p>
    <input type="submit" value="submit" style="padding:0 10px:" />
    <a href=Untitled-3.php>没有账号?</a></td>
</form>-->
</body>
</html>