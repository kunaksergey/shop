<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style>
#header{
	height:100px; 
	background-color: red;
}

#footer{
    height: 100px;	
    background-color: blue;
    
}

.category{
float:left;
margin: 10px;
 width:200px;
 height: 200px;
}

.category:hover{
	background-color: green;
}

#context{
	width: 1000px;
 height: 1000px
}
	</style>



</head>
<body>
<div id="header">
</div>
<hr/>
	<div id="context">
	<?=$context?>
	</div>
<hr/>
<div id="footer">
</div>
</body>
</html>