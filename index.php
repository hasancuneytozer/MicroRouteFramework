<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
/** HASAN CÜNEYT ÖZER **/
	body * 
	{
		font-family:arial;
		color:#333;
	}
	input
	{
		background-color: #000;
		color:#fff;
		font-weight: bold;
		padding: 4px 4px 4px 4px;
	}
</style>
</head>
<body>
	<h1>HASAN CÜNEYT ÖZER</h1>
	<h2>FrontEndDeveloper</h2>
	<h3> ### Micro Route Framework Çalışmam ### </h3>

	<input value="Route Content1" type="button" id="contentBtn1"/> 
	<input value="Route Content2" type="button" id="contentBtn2"/> 
	<input value="Route ContentIndex" type="button" id="contentBtnIndex"/> 
	<br>

	<div id="MicroRouteContent1"></div>
	
	<script type="text/javascript">

		/** HASAN CÜNEYT ÖZER **/

		// _default = Anasayfa 
		// _b = btnId button adı
		// _h = Url Hash gidecek url
		// _b = Xmlhttp get ile content getir.
		// _c = ContentID hangi id'li taga content gelecek
		var _MR = function(_default){
			this.MicroRoute = function(_b,_h,_u,_c)
			{
					//  Route Butonu "id" kullanılır. Click Eventi ile çalışır. 
					var _btnRouteId = function(){
						var x = document.getElementById(_b);
						if (x.addEventListener) {
						    x.addEventListener("click", _hash);
						} else if (x.attachEvent) {
						    x.attachEvent("onclick", _hash);
						}
					};
					//  url'de hash tanımlanarak hangi route'da olunduğu görüntülenir. 
					var _hash = function(){
						location.hash = _h;
						_url();
					};
					// ilgili _btnRouteId verilen url'den content get Metodu ile çekilir.
					var _url = function(){
						var xmlhttp;
						if (window.XMLHttpRequest)
						  {// code for IE7+, Firefox, Chrome, Opera, Safari
						  xmlhttp=new XMLHttpRequest();
						  }
						else
						  {// code for IE6, IE5
						  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						  }
						  // hash Dogru İse
						  if(location.hash=='#'+_h)
						  {
						  	xmlhttp.onreadystatechange=function()
							  {
							  	// Response dönene Kadar 'Response Bekle..' metni karşıla
							  	document.getElementById(_c).innerHTML = "Response Bekle..";

							  if (xmlhttp.readyState==4 && xmlhttp.status==200)
							    {
							    	// Response
							    	document.getElementById(_c).innerHTML=xmlhttp.responseText;
							    }

							  }
							xmlhttp.open("GET", _u );
							xmlhttp.send();
						  }
						  // hash Yalnış İse Anasayfa
						  else
						  {
						  	location.hash = '';
						  	xmlhttp.onreadystatechange=function()
							  {
							  	// Response dönene Kadar 'Response Bekle..' metni karşıla
							  	document.getElementById(_c).innerHTML = "Response Bekle..";

							  if (xmlhttp.readyState==4 && xmlhttp.status==200)
							    {
							    	// Response
							    	document.getElementById(_c).innerHTML=xmlhttp.responseText;
							    }

							  }
							xmlhttp.open("GET", _default );
							xmlhttp.send();
						  }
					};
					_btnRouteId();
		            _url();
			};
		};
		//Anasayfa Belirle
		var MR = new _MR('index.html');
		//Sayfa Yüklendiginde Çalış
		//window.onload ie'de sıkıntı çıkarabilir. addeventlister load kullanılabilir.
		window.onload = MR.MicroRoute('contentBtnIndex','ContentIndex','index.html','MicroRouteContent1');
		window.onload = MR.MicroRoute('contentBtn1','ContentBir','content1.html','MicroRouteContent1');
		window.onload = MR.MicroRoute('contentBtn2','ContentIki','content2.html','MicroRouteContent1');
	</script>
</body>
</html>

