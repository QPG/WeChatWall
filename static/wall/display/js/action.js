function sidebar(){
	var sidebar = document.getElementsByClassName('side_div')[0],sideblock = document.getElementsByClassName('msg_block')[0];
	sideblock.onmouseover = function(){ sidebar.style.right = '0';}
	sidebar.onmouseout = function(){ sidebar.style.right = '-80px';}
}

function screenModel(){
	var e_button = document.getElementsByClassName('side_item')[4];
	var e_body = document.getElementsByTagName('body')[0];
	//判断是否处于全屏
	if(e_body.style.height != window.screen.height+'px'){
		launchFullscreen(e_button,e_body);
	}else{
		exitFullscreen(e_button,e_body);
	}
}
function launchFullscreen(e_button,e_body) {
	var screen_dpi = get_dpi();
	e_body.style.height = screen_dpi['height'];
	e_body.style.width = screen_dpi['width'];
	e_button.childNodes[0].innerHTML = '窗口';
	if(e_body.requestFullscreen) {
		e_body.requestFullscreen();
	} else if(e_body.mozRequestFullScreen) {
		e_body.mozRequestFullScreen();
	} else if(e_body.webkitRequestFullscreen) {
		e_body.webkitRequestFullscreen();
	} else if(e_body.msRequestFullscreen) {
		e_body.msRequestFullscreen();
	}
}

function exitFullscreen(e_button,e_body) {
	e_button.childNodes[0].innerHTML = '全屏';
	e_body.attributes.removeNamedItem('style');
	if(document.exitFullscreen) {
	document.exitFullscreen();
	} else if(document.mozCancelFullScreen) {
	document.mozCancelFullScreen();
	} else if(document.webkitExitFullscreen) {
	document.webkitExitFullscreen();
	}
}

function get_dpi(){
	var screen_dpi = [];
	screen_dpi['height'] = window.screen.height+'px';
	screen_dpi['width'] = window.screen.width+'px';
	return screen_dpi;
}