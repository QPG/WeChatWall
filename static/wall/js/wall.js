var wall = {
	'delaytime' : 8000,
	'heart' :  function(){
		var $this = this;
		$.getJSON('http://localhost/MobileVote/wall/ajax_request?id=1&time=1430229400',function(e){
			//var mss = JSON.parse(e);
			$('#msg_list').append(wall.buildItem(e));	
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
	'buildItem' : function(message){
		var html = '<div class="talkList" id="msg_'+message['id']+'" style="height:auto;">' +
			'<div class="userPic"><img src="'+message['headimg']+'"><span class="userName">'+message['nickname']+'</span></div>' +
			'<div class="msgBox"><span class="msgCnt" style="font-size:70px;line-height:140px;">' +
			message['message'] + '</span></div></div>';
		return html;
	}

}

