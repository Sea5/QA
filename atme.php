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
<html lang="en" class="no-js"><head>
<meta charset="UTF-8" />

<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>我的题单</title>
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
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
				<h1>
					QA 社交问答<small>和你的小伙伴更亲近</small>
				</h1>
                <div style="position:absolute;right:0px;top:10px;"><a href="#" >欢迎，<?php echo $data['name']; ?></a></div>
			</div>
			 <ul class="nav nav-tabs"> <!--style="background:#333;border-radius: 4px;"-->
				<li>
					<a id="myList" href="MyList.php?uid=<?php echo $_REQUEST['uid']; ?>">&nbsp;&nbsp;<i class="glyphicon glyphicon-list"></i>&nbsp;我的题单&nbsp;&nbsp;&nbsp;</a>
				</li>
				<li>
					<a id="rankList" href="mylist_rank_chosen.php?uid=<?php echo $_REQUEST['uid']; ?>">&nbsp;&nbsp;<i class="glyphicon glyphicon-sort-by-order"></i>&nbsp;排行榜&nbsp;&nbsp;</a>
				</li>
				<li class="active">
					<a id="atMe" class="disabled">&nbsp;&nbsp;<i class="glyphicon glyphicon-tasks"></i>&nbsp;@我的&nbsp;&nbsp;&nbsp;</a>
				</li>
                <li>
					<a id="establishNewList" href="establish.php?uid=<?php echo $_REQUEST['uid']; ?>">&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i>&nbsp;发布新题单&nbsp;&nbsp;&nbsp;</a>
				</li>
                </ul>
				
			<div class="row-fluid">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<table class="table table-hover table-striped">
				<thead >
					<tr>
						<th>
							序号
						</th>
						<th>
							题单名
						</th>
						<th>
							发布者
						</th>
                        <th>
							回答
						</th>
					</tr>
				</thead>
					<tbody>
				<?php
					$con = mysql_connect("localhost","root","");
					if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
					mysql_select_db("ques", $con);
					$result = mysql_query("SELECT * FROM at WHERE player='$_REQUEST[uid]'");
					$now = 1;
					while($row = mysql_fetch_array($result))
					{
						if($row['answered']==0)
						{
							echo '
							<tr class="warning">
								<td>
									'.$now.'
								</td>
								<td>
									'.$row["qname"].'
								</td>
								<td>
									'.$row['author'].'
								</td>
								<td>
									<a class="btn btn-primary" href="answer.php?uid='.$_REQUEST["uid"].'&qname='.$row["qname"].'&author='.$row["author"].'"><i class="glyphicon glyphicon-edit"></i>&nbsp;点击回答</a>
								</td>
							';
						}
						else
						{
							echo '
							<tr class="success">
								<td>
									'.$now.'
								</td>
								<td>
									'.$row["qname"].'
								</td>
								<td>
									'.$row['author'].'
								</td>
								<td>
									<a class="btn btn-primary" href="answer.php?qname='.$row["qname"].'&author='.$row["author"].'"><i class="glyphicon glyphicon-edit"></i>&nbsp;点击查看</a>
								</td>
							';
						}
					}
				/*<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
                        <td>
							<a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-edit"></i>&nbsp;点击回答</a>
						</td>
					</tr>
					<tr class="success">
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
                        <td>
							<a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-edit"></i>&nbsp;点击回答</a>
						</td>
					</tr>
					<tr class="error">
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
                        <td>
							<a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-edit"></i>&nbsp;点击回答</a>
						</td>
					</tr>
					<tr class="warning">
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
                        <td>
							<a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-edit"></i>&nbsp;点击回答</a>
						</td>
					</tr>
					<tr class="info">
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
                        <td>
							<a class="btn btn-primary" href="#"><i class="glyphicon glyphicon-edit"></i>&nbsp;点击回答</a>
						</td>
					</tr>
				</tbody>*/
				?>
				</tbody>
			</table>
				</div>
				<div class="col-md-1">
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