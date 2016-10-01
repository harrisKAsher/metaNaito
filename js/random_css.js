function get_randomCssNum()
{
    var ranCssNum= Math.floor(Math.random()*6);
	//var ranCssNum= Math.floor(Math.random()*Number of CSS you Have);
    return ranCssNum;
}
function getaCss()
{
   var whichCss=get_randomCssNum();
    var cssName=new Array(5)
     // var cssName=new Array(Number of CSS you Have)
     cssName[0]="<link rel='stylesheet' type='text/css' href='/css/random/bg1.css'>";
     cssName[1]="<link rel='stylesheet' type='text/css' href='/css/random/bg2.css'>";
     cssName[2]="<link rel='stylesheet' type='text/css' href='/css/random/bg3.css'>";   
     cssName[3]="<link rel='stylesheet' type='text/css' href='/css/random/bg4.css'>";
     cssName[4]="<link rel='stylesheet' type='text/css' href='/css/random/bg5.css'>";
	 cssName[5]="<link rel='stylesheet' type='text/css' href='/css/random/bg6.css'>"; 
  	return cssName[whichCss]
  }
  document.write(getaCss());