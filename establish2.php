<!DOCTYPE html>
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
       <a href="#">微博入口</a> 
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
       <form action="#" onSubmit="validateForm()"> 
        <fieldset id="qlist"> 
         <legend> 题单名：<input type="text" class="form-control" style="margin:0px 20% 0px;width:60%;" /> </legend> 
         <div class="row"> 
          <div class="col-md-3"> 
           <ol> 
            <li>选择题点选中的答案为正确答案，选择题最多只能点选一个答案。如果不小心点了两个及以上的答案，以ABCD的优先顺序选取唯一答案</li> 
            <li>出于对题单本身质量的考虑，题单最多包括15道题。</li> 
           </ol> 
          </div> 
          <div class="col-md-6"> 
           <!--选择题样式
           <div id=number>
           	<label>问题:</label>
            <textarea type="text" rows=3 style="width:100%"></textarea>
             <div class="input-group">
              <span class="input-group-addon"><input type="checkbox"/></span>
              <span class="input-group-addon">A.</span>
              <input type="text" class="form-control"/>
             </div>
             <div class="input-group">
              <span class="input-group-addon"><input type="checkbox"/></span>
              <span class="input-group-addon">B.</span>
              <input type="text" class="form-control"/>
             </div>
             <div class="input-group">
              <span class="input-group-addon"><input type="checkbox"/></span>
              <span class="input-group-addon">C.</span>
              <input type="text" class="form-control"/>
             </div>
             <div class="input-group">
              <span class="input-group-addon"><input type="checkbox"/></span>
              <span class="input-group-addon">D.</span>
              <input type="text" class="form-control"/>
             </div>
           </div>
           -->
          <!--填空题样式
          <div>
           	<label>问题:</label>
            <textarea type="text" rows=3 style="width:100%"></textarea>
             <textarea type="text" rows=6 style="width:100%"></textarea>
           </div>
           -->
          
          
          
          
          
           
          
          
           <div id="des" class="btn-group" style="position:fixed;left:5px;bottom:5px;z-index:1000;"> 
            <button type="button" class="btn btn-default" onclick="add1()"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;添加选择题</button> 
            <button type="button" class="btn btn-default" onclick="add2()"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;添加填空题</button> 
            <button type="button" class="btn btn-default" onclick="add3()"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;添加主观题</button> 
           </div> 
           <div class="btn-group" style="position:fixed;right:100px;bottom:5px;z-index:1000;"> 
            <button type="button" class="btn btn-default" onclick="del()"><i class="glyphicon glyphicon-minus-sign"></i>&nbsp;删除上道题</button> 
            <button type="submit" class="btn btn-default" ><i class="glyphicon glyphicon-send"></i>&nbsp;提交题单</button> 
           </div> 
          </div> 
          <div class="col-md-3"></div> 
         </div> 
        </fieldset> 
       </form> 
      </div> 
     </div> 
     <div class="row-fluid"> 
      <div class="col-md-1"> 
      </div> 
     </div> 
    </div> 
   </div> 
   <script>
var number=1;
var pass_value;
function validateForm(){
	var n=1;
	pass_value="";
	while(1){
		var ss=$("#"+n++);
		var lab=ss.children("label").attr("name");
		if(!lab) break;
		pass_value+="question=";
		switch(lab){
			case "choose":
				var question=ss.children("textarea").val();
				pass_value+=""+question+"::::::type=choose::::::"
				//alert(question);
				var bool=ss.children("div").children("span").children("input:checked").attr("name");
				if(typeof(bool)=="undefined") 
				{
					pass_value="no selected";//alert("no selected");
					break;
				}
				else pass_value+="choose="+bool;//alert(bool);
				var answer;
				for(var i=1;i<5;i++){
					//alert(i);
					answer=ss.children("div").children("input[name=input"+i+"]").val();
					pass_value+="::::::answer"+i+"="+answer;
					//answer.push(temp);
				}
				pass_value+="||||||";
				//for(var i=1;i<5;i++){
				//	alert("answer["+i+"]="+answer[i])
				//}
				//alert("choose");
				break;
			case "fillblank":
				var question=ss.children("textarea[name=question]").val();
				var answer=ss.children("textarea[name=answer]").val();
				pass_value+=question+"::::::type=fillblank::::::answer="+answer+"||||||";
				//alert("question: "+question+"\nanswer: "+answer);
				break;
			case "answer":
				var question=ss.children("textarea[name=question]").val();
				var answer=ss.children("textarea[name=answer]").val();
				pass_value+=question+"::::::type=answer::::::answer="+answer+"||||||";
				break;
		}
	} 
	alert(pass_value);
}
function add1(){
	if(number>15)
	{
		alert("问题数目太多，问题数最多为15个。");
	}
	else{
	var node=document.getElementById("des");
	var block=document.createElement("div");
	block.setAttribute("id",number);
	var s='<label name="choose">问题:'+number+'</label><textarea type="text" rows=3 style="width:100%"></textarea><div class="input-group"><span class="input-group-addon"><input name="A" type="checkbox"/></span><span class="input-group-addon">A.</span><input name="input1" type="text" class="form-control"/></div><div class="input-group"><span class="input-group-addon"><input name="B" type="checkbox"/></span><span class="input-group-addon">B.</span><input type="text" name="input2" class="form-control"/></div><div class="input-group"><span class="input-group-addon"><input name="C" type="checkbox"/></span><span class="input-group-addon">C.</span><input name="input3" type="text" class="form-control"/></div><div class="input-group"><span class="input-group-addon"><input name="D" type="checkbox"/></span><span class="input-group-addon">D.</span><input type="text" name="input4" class="form-control"/>';
	number++;
	block.innerHTML=s;
	node.parentNode.insertBefore(block,node);
	}
}
//	var qn=document.createElement("label");
//	var s="问题"+number+":";
//	qn.innerHTML=s;
//	number++;
//	var question=document.createElement("textarea");
//	question.setAttribute("type","text");
//	question.setAttribute("rows","3");
//	question.setAttribute("style","width:100%");
//	block.appendChild(qn);
//	block.appendChild(question);
//	//选项A
//	var divTemp1=document.createElement("div");
//	divTemp1.setAttribute("class","input-group");
//	var span1=document.createElement("span");
//	var input1=document.createElement("input");
//	input1.setAttribute("type","checkbox");
//	span1.appendChild(input1);
//	span1.setAttribute("class","input-group-addon");
//	var span2=document.createElement("span");
//	span2.setAttribute("class","input-group-addon");
//	span2.innerHTML="A.";
//	var input2=document.createElement("input");
//	input2.setAttribute("type","text");
//	input2.setAttribute("class","form-control");
//	divTemp1.appendChild(span1);
//	divTemp1.appendChild(span2);
//	divTemp1.appendChild(input2);
//	block.appendChild(divTemp1);
//	//选项B
//	var divTemp2=document.createElement("div");
//	divTemp2.setAttribute("class","input-group");
//	var span3=document.createElement("span");
//	var input3=document.createElement("input");
//	input3.setAttribute("type","checkbox");
//	span3.appendChild(input3);
//	span3.setAttribute("class","input-group-addon");
//	var span4=document.createElement("span");
//	span4.setAttribute("class","input-group-addon");
//	span4.innerHTML="B.";
//	var input4=document.createElement("input");
//	input4.setAttribute("type","text");
//	input4.setAttribute("class","form-control");
//	divTemp2.appendChild(span3);
//	divTemp2.appendChild(span4);
//	divTemp2.appendChild(input4);
//	block.appendChild(divTemp2);
//	//选项C
//	var divTemp3=document.createElement("div");
//	divTemp3.setAttribute("class","input-group");
//	var span5=document.createElement("span");
//	var input5=document.createElement("input");
//	input5.setAttribute("type","checkbox");
//	span5.appendChild(input5);
//	span5.setAttribute("class","input-group-addon");
//	var span6=document.createElement("span");
//	span6.setAttribute("class","input-group-addon");
//	span6.innerHTML="C.";
//	var input6=document.createElement("input");
//	input6.setAttribute("type","text");
//	input6.setAttribute("class","form-control");
//	divTemp3.appendChild(span5);
//	divTemp3.appendChild(span6);
//	divTemp3.appendChild(input6);
//	block.appendChild(divTemp3);
//	//选项D
//	var divTemp4=document.createElement("div");
//	divTemp4.setAttribute("class","input-group");
//	var span7=document.createElement("span");
//	var input7=document.createElement("input");
//	input7.setAttribute("type","checkbox");
//	span7.appendChild(input7);
//	span7.setAttribute("class","input-group-addon");
//	var span8=document.createElement("span");
//	span8.setAttribute("class","input-group-addon");
//	span8.innerHTML="D.";
//	var input8=document.createElement("input");
//	input8.setAttribute("type","text");
//	input8.setAttribute("class","form-control");
//	divTemp4.appendChild(span7);
//	divTemp4.appendChild(span8);
//	divTemp4.appendChild(input8);
//	block.appendChild(divTemp4);
	//上面组成一个DIV 一起加到des前

function add2(){
	if(number>15)
	{
		alert("问题数目太多，问题数最多为15个。");
	}
	else {
		var node=document.getElementById("des");
		var block=document.createElement("div");
		block.setAttribute("id",number);
		var s='<label name="fillblank">问题:'+number+'</label><textarea name="question" type="text" rows=3 style="width:100%"></textarea><textarea name="answer" type="text" rows=6 style="width:100%"></textarea>';
		number++;
		block.innerHTML=s;
		node.parentNode.insertBefore(block,node);
	//var qn=document.createElement("label");
//	var s="问题"+number+":";
//	qn.innerHTML=s;
//	number++;
//	var question=document.createElement("textarea");
//	question.setAttribute("type","text");
//	question.setAttribute("rows","3");
//	question.setAttribute("style","width:100%");
//	var answer=document.createElement("textarea");
//	answer.setAttribute("type","text");
//	answer.setAttribute("rows","6");
//	answer.setAttribute("style","width:100%");
//	block.appendChild(qn);
//	block.appendChild(question);
//	block.appendChild(answer);
	}
}
function add3(){
	if(number>15)
	{
		alert("问题数目太多，问题数最多为15个。");
	}
	else {
		var node=document.getElementById("des");
		var block=document.createElement("div");
		block.setAttribute("id",number);
		var s='<label name="answer">问题:'+number+'</label><textarea name="question" type="text" rows=3 style="width:100%"></textarea><textarea name="answer" type="text" rows=6 style="width:100%"></textarea>';
		number++;
		block.innerHTML=s;
		node.parentNode.insertBefore(block,node);
//	var node=document.getElementById("des");
//	var block=document.createElement("div");
//	var qn=document.createElement("label");
//	var s="问题"+number+":";
//	qn.innerHTML=s;
//	number++;
//	block.appendChild(qn);
//	var question=document.createElement("textarea");
//	question.setAttribute("type","text");
//	question.setAttribute("rows","3");
//	question.setAttribute("style","width:100%");
//	block.appendChild(question);
//	var answer=document.createElement("textarea");
//	answer.setAttribute("type","text");
//	answer.setAttribute("rows","6");
//	answer.setAttribute("style","width:100%");
//	block.appendChild(answer);
//	node.parentNode.insertBefore(block,node);
	}
}
function del(){
	if(number==1) alert("已没有问题");
	else if(window.confirm("确认删除问题"+--number+"?")){
	var node=document.getElementById("des");
	var target=node.previousSibling;
	while(target.hasChildNodes()){
		target.removeChild(target.firstChild);
		}
	target.parentNode.removeChild(target);
	}
}
</script> 
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
   <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script> 
   <!-- Include all compiled plugins (below), or include individual files as needed --> 
   <script src="dist/js/bootstrap.min.js"></script> 
  </div>  
 </body>
</html>