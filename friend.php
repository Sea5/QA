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
  <title>题单发布</title> 
  <!--[if IE]>
<script src="js/html5.js"></script>
<![endif]--> 
  <link href="dist/css/bootstrap.min.css" rel="stylesheet" /> 
 </head> 
 <body> 
  <div class="container-fluid" style="background:url(background.png) repeat;min-height:583px;"> 
   <div class="row-fluid"> 
    <div class="col-md-12"> 
     <div class="page-header"> 
      <h1 id="test"> QA 社交问答<small>和你的小伙伴更亲近</small> </h1> 
      <div style="position:absolute;right:0px;top:10px;"> 
       <a href="#">欢迎，<?php echo $data['name']; ?></a> 
      </div> 
     </div> 
     <ul class="nav nav-tabs"> 
      <!--style="background:#333;border-radius: 4px;"--> 
      <li> <a id="myList" href="MyList.html">&nbsp;&nbsp;<i class="glyphicon glyphicon-list"></i>&nbsp;我的题单&nbsp;&nbsp;&nbsp;</a> </li> 
      <li> <a id="rankList" href="mylist_rank_chosen.html">&nbsp;&nbsp;<i class="glyphicon glyphicon-sort-by-order"></i>&nbsp;排行榜&nbsp;&nbsp;</a> </li> 
      <li> <a id="atMe" href="atme.html">&nbsp;&nbsp;<i class="glyphicon glyphicon-tasks"></i>&nbsp;@我的&nbsp;&nbsp;&nbsp;</a> </li> 
      <li class="active"> <a id="establishNewList" class="disabled">&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i>&nbsp;发布新题单&nbsp;&nbsp;&nbsp;</a> </li> 
     </ul> 
     <div class="row-fluid"> 
      <div class="col-md-1"> 
      </div> 
      <div class="col-md-10" style="text-align:center;"> 
      <?php
		$fri=$p->bilateral($_REQUEST['uid']);
		for($i=0;$i<count($fri['users']);$i++)
		{
			echo $fri['users'][$i]['name'];
		}
		?>
      </div> 
     </div> 
     <div class="row-fluid"> 
      <div class="col-md-1"> 
      </div> 
     </div> 
    </div> 
   </div> 
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
   <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script> 
   <!-- Include all compiled plugins (below), or include individual files as needed --> 
   <script src="dist/js/bootstrap.min.js"></script> 
  </div>  
 </body>
</html>