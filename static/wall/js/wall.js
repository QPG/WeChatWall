var wall = {
	'delaytime' : 8000,
	'heart' :  function(){
		var $this = this;
		$.getJSON('./index.php?c=site&a=entry&id=19&do=json&m=microwall',function(e){
			alert(1);
		})
		var timer = setTimeout(function(){$this.heart();},$this.delaytime);
	},
	'clock' : function(){
		var $this = this, delaytime = $this.delaytime/1000;
		var remaintime = document.getElementById('remaintime');
		remaintime.innerHTML--;
		if(remaintime.innerHTML<0){
			remaintime.innerHTML = 8;
		}
		var timer = setTimeout(function(){
			$this.clock();
		},1000);
	},
	'newItem':function(){
		
	},
}
window.onload = function(){
	var sidebar = document.getElementsByClassName('side_div')[0],sideblock = document.getElementsByClassName('msg_block')[0];
	sideblock.onmouseover = function(){ sidebar.style.right = '0';}
}
