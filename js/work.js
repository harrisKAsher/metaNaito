var work = '<div class="center">';
work = work + '<img src="../..//Media/images/Work.png" width="217" height="231"  class="border_none">';
work = work + '<br><h3>';
work = work + 'We are sorry, this section of the website is still under construction.';
work = work + '</h3><br>';
work = work + '<button onclick="goBack()">Retrun to Previous Page</button>';
work = work + '</div>';
function goBack() {window.history.back();}
document.getElementById("work").innerHTML = work;
	     

	





