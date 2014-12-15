<!DOCTYPE html>
<?php
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$str=$_COOKIE['weibojs_'.$o->client_id];
parse_str($str,$arr);
$p = new SaeTClientV2( WB_AKEY , WB_SKEY , $arr['access_token']);
$data = $p->show_user_by_id($_REQUEST['uid']);
?>
<html lang="en" class="no-js">
 <head> 
  <meta charset="UTF-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <title>我回答的排行榜</title> 
  <!--[if IE]>
<script src="js/html5.js"></script>
<![endif]--> 
  <link href="dist/css/bootstrap.min.css" rel="stylesheet" /> 
  <style type="text/css">
  th,td{
	  text-align:center
	  }
</style>
 </head> 
 <body> 
  <div class="container-fluid" style="background:url(background.png) repeat;min-height:583px;"> 
   <div class="row-fluid"> 
    <div class="col-md-12"> 
     <div class="page-header"> 
      <h1> QA 社交问答<small>和你的小伙伴更亲近</small> </h1> 
      <div style="position:absolute;right:0px;top:10px;">
       <a href="#">欢迎，<?php echo $data['name']; ?></a>
      </div> 
     </div> 
     <ul class="nav nav-tabs"> 
      <!--style="background:#333;border-radius: 4px;"--> 
      <li> <a id="myList" href="MyList.php?uid=<?php echo $_REQUEST['uid']; ?>">&nbsp;&nbsp;<i class="glyphicon glyphicon-list"></i>&nbsp;我的题单&nbsp;&nbsp;&nbsp;</a> </li> 
      <li class="active"> <a class="disabled" id="rankList">&nbsp;&nbsp;<i class="glyphicon glyphicon-sort-by-order"></i>&nbsp;排行榜&nbsp;&nbsp;</a> </li> 
      <li> <a id="atMe" href="atme.php?uid=<?php echo $_REQUEST['uid']; ?>">&nbsp;&nbsp;<i class="glyphicon glyphicon-tasks"></i>&nbsp;@我的&nbsp;&nbsp;&nbsp;</a> </li> 
      <li> <a id="establishNewList" href="establish.php?uid=<?php echo $_REQUEST['uid']; ?>">&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i>&nbsp;发布新题单&nbsp;&nbsp;&nbsp;</a> </li> 
     </ul> 
     <div class="row-fluid"> 
      <div class="col-md-2" style="margin:20px 0px;"> 
       <ul class="nav nav-list" style="background-color:rgba(163,163,163,0.5);border-radius:10px;padding:5px 10px;"> 
        <li class="nav-header"> 排行榜类型 </li> 
        <li> <a href="mylist_rank_chosen.php?uid=<?php echo $_REQUEST['uid']; ?>">我题单的排行榜</a></li> 
        <li class="active"> <a class="disabled">我回答的排行榜</a> </li> 
       </ul> 
      </div>
      <div class="col-md-10">  
      <!-- 放置排行榜表格处-->
      
      
      
      
       <table class="table table-striped"> 
        <thead> 
         <tr> 
          <th> 编号 </th> 
          <th> 产品 </th> 
          <th> 交付时间 </th> 
          <th> 状态 </th> 
         </tr> 
        </thead> 
        <tbody> 
         <tr> 
          <td> 1 </td> 
          <td> TB - Monthly </td> 
          <td> 01/04/2012 </td> 
          <td> Default </td> 
         </tr> 
         <tr class="success"> 
          <td> 1 </td> 
          <td> TB - Monthly </td> 
          <td> 01/04/2012 </td> 
          <td> Approved </td> 
         </tr> 
         <tr class="error"> 
          <td> 2 </td> 
          <td> TB - Monthly </td> 
          <td> 02/04/2012 </td> 
          <td> Declined </td> 
         </tr> 
         <tr class="warning"> 
          <td> 3 </td> 
          <td> TB - Monthly </td> 
          <td> 03/04/2012 </td> 
          <td> Pending </td> 
         </tr> 
         <tr class="info"> 
          <td> 4 </td> 
          <td> TB - Monthly </td> 
          <td> 04/04/2012 </td> 
          <td> Call in to confirm </td> 
         </tr> 
        </tbody> 
       </table>  
      
      
      
      
      <!-- 放置排行榜表格处-->
      </div>  
     </div> 
    </div> 
   </div> 
  </div> 
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="dist/js/bootstrap.min.js"></script>  
 </body>
</html>