var wall = {
	'delaytime' : 4000,
	'heart' :  function(){
		var $this = this;
		var msg_list = document.getElementById('msg_list');

		$.getJSON('http://localhost/MobileVote/wall/ajax_request?id=21&time=1430453671',function(e){ //getJson接收的字符串已解析
			if(e['id'] != null){
				if(msg_list.childNodes.length != 4){
					if(msg_list.childNodes.length != 0){
						i = msg_list.childNodes.length+1;
						$('#msg_list div:first').before(wall.buildItem(e,i));
					}else{
						$('#msg_list').append(wall.buildItem(e,1));	
					}
				}else{
					$this.changeLastNode(e);
					msg_list.insertBefore(msg_list.lastChild,msg_list.firstChild);
				}
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
		var content = '';
		if(message['type']=='0'){
			if(message['message'].length>12){
				content = '<span style="font-size:40px;line-height:50px;">'+message['message']+'</span>';
			}else{
				content = '<span>'+message['message']+'</span>';
			}
		}else{
			content = '<img src="'+message['message']+'">';
		}
		var html = '<div class="talkList msg_'+ i +'">' +
			'<div class="userPic"><img src="'+message['headimg']+'"><span class="userName">'+message['nickname']+'</span></div>' +
			'<div class="msgBox"><span class="msgCnt">' +
			content + '</span></div></div>';
		return html;
	},
	'changeLastNode' : function(message){
		var msg_list = document.getElementById('msg_list'),
			lastNode = msg_list.lastChild,
			imgNode = lastNode.childNodes[0].childNodes[0],
			nameNode = lastNode.childNodes[0].childNodes[1],
			msgNode = lastNode.childNodes[1].childNodes[0];

		nameNode.innerHTML = message['nickname'];
		msgNode.innerHTML = message['message'];
		imgNode.setAttribute('src',message['headimg']);
	}

}

