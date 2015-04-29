var wall = {
	'delaytime' : 4000,
	'heart' :  function(){
		var $this = this;
		var msg_list = document.getElementById('msg_list');

		$.getJSON('http://localhost/MobileVote/wall/ajax_request?id=1&time=1430229400',function(e){
			if(msg_list.childNodes.length != 4){
				if(msg_list.childNodes.length != 0){
					i = msg_list.childNodes.length+1;
					$('#msg_list div:first').before(wall.buildItem(e,i));
				}else{
					$('#msg_list').append(wall.buildItem(e,1));	
				}
			}else{
				$().insertBefore();
			}	
		})
		var timer = setTimeout(function(){$this.heart();},$this.delaytime);
	},
	'clock' : function(){
		var $this = this, delaytime = $this.delaytime/1000;
		var remaintime = document.getElementById('remaintime');
		remaintime.innerHTML--;
		if(remaintime.innerHTML<0){
			remaintime.innerHTML = 4;
		}
		var timer = setTimeout(function(){
			$this.clock();
		},1000);
	},
	'buildItem' : function(message,i){
		var html = '<div class="talkList msg_'+ i +'">' +
			'<div class="userPic"><img src="'+message['headimg']+'"><span class="userName">'+message['nickname']+'</span></div>' +
			'<div class="msgBox"><span class="msgCnt" style="font-size:70px;line-height:140px;">' +
			message['message'] + '</span></div></div>';
		return html;
	}

}

