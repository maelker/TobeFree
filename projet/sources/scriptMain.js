function toggleDisplay(element,id){
	var div = document.getElementById(id);
	if(div.style.display=="none") {
		div.style.display = "block";
		element.querySelector("img").src="../images/flecheBas.png";
	} 
	else {
		div.style.display = "none";
		element.querySelector("img").src="../images/flecheDroite.png";
	}
}