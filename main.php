<!DOCTYPE html>
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
					QA 社交问答<small>鍗фЫ</small>
				</h1>
                <div style="position:absolute;right:0px;top:10px;"><a href="#" >微博入口</a></div>
			</div>
			 <ul class="nav nav-tabs"> <!--style="background:#333;border-radius: 4px;"-->
				<li>
					<a id="myList" href="MyList.php">&nbsp;&nbsp;<i class="glyphicon glyphicon-list"></i>&nbsp;我的题单&nbsp;&nbsp;&nbsp;</a>
				</li>
				<li>
					<a id="rankList" href="mylist_rank_chosen.php">&nbsp;&nbsp;<i class="glyphicon glyphicon-sort-by-order"></i>&nbsp;排行榜&nbsp;&nbsp;</a>
				</li>
				<li class="active">
					<a id="atMe" class="disabled">&nbsp;&nbsp;<i class="glyphicon glyphicon-tasks"></i>&nbsp;@我的&nbsp;&nbsp;&nbsp;</a>
				</li>
                <li>
					<a id="establishNewList" href="establish.php">&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i>&nbsp;发布新题单&nbsp;&nbsp;&nbsp;</a>
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
							@你的时间
						</th>
                        <th>
							回答
						</th>
					</tr>
				</thead>
				<tbody>
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