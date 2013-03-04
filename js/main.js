						/* initHov */
function initHov(){
	var _hold = document.getElementsByClassName('form-top');
	if(_hold.length>0){
		for(var j=0; j < _hold .length; j++){
			_box = _hold[j].getElementsByTagName('a');
			for(var i=0; i < _box.length; i++){
				if(_box[i].className.indexOf('info') != -1){
					_box[i].onmouseover = function(){
						this.parentNode.className += ' hovered';
					}
					_box[i].onmouseout = function(){
						this.parentNode.className = this.parentNode.className.replace(' hovered',' ');
					}
				}
			}
		}
	}
}
if (window.addEventListener)
	window.addEventListener("load", initHov, false);
else if (window.attachEvent)
	window.attachEvent("onload", initHov);

document.getElementsByClassName= function(str){
	var Rx= RegExp('\\b'+str+'\\b');
	var who, i= 0, A= [], tem, temp;
	var G= document.getElementsByTagName('*');
	while(G[i]){
		tem= G[i++];
		temp=tem.className|| '';
		if(Rx.test(temp)) A.push(tem);
	}
	return A;
}
var regExpBeginning = /^\s+/;

var regExpEnd = /\s+$/;  

// Supprime les espaces inutiles en début et fin de la chaîne passée en paramètre.

function trim(aString) {

    return aString.replace(regExpBeginning, "").replace(regExpEnd, "");
}

function search(search,init)
{
	//alert(search+'+'+init);
	if(search==init || trim(search)=='')
		return false;
	else
		return true;
	
}
function goToByScroll(id){
  $('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}
