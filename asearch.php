<html>
<head>
<script>
function loadJSON(str)
{
	var txt = "";
	if (str.trim()=="")
	{
		document.getElementById('Menu').innerHTML="";
		return;
	} 
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState == 4 && xmlhttp.status==200)
    {
	  var obj = JSON.parse(xmlhttp.responseText);
	  if(obj.success && obj.num >0) {
		
		txt = "<table border=\"1=\"><tr><th>Name</th><th>By</th><th>Ingredient</th><th>Direction</th><th>Type</th></tr>";
		for (i=0;i<obj.results.length;i++)
		{ 
		  txt=txt+"<tr>";
		  txt=txt+"<td>"+obj.results[i].Name+"</td>";
		  txt=txt+"<td>"+obj.results[i].By+"</td>";
		  txt=txt+"<td>"+obj.results[i].Ingredient+"</td>";
		  txt=txt+"<td>"+obj.results[i].Direction+"</td>";
		  txt=txt+"<td>"+obj.results[i].Type+"</td>";
		  txt=txt+"</tr>";
		}
		txt=txt+"</table>";
		}
		else if (obj.success && obj.num == 0) {
			txt = txt+ "";
		}
		else {
			txt = txt + obj.message;
		}
		document.getElementById('Menu').innerHTML=txt;
    }
  }
xmlhttp.open("GET","search.php?fname="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>
Search Menu <input type="text" name="fname" onkeyup="loadJSON(this.value)"><br/>
</form>
<br>
<div id="Menu"><b>Insert Menu</b></div>
</body>
</html>