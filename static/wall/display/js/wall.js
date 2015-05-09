var wall = {
	'delaytime' : 3000,
	'timer' : '',
	'heart' :  function(){
		var $this = this;
		var msg_list = document.getElementById('msg_list');

		$.ajax({
			url : 'http://wx.twtstudio.com/home/index.php/wall/ajax_request?id=21&time=1430453671',
			success : function(data){
//		$.getJSON('http://x.twtstudio.com/home/index.php/wall/ajax_request?id=21&time=1430453671',function(e,st){ //getJson接收的字符串已解析
				e = JSON.parse(data);
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
			},
			timeout : 2500, //设置超时时间
		})
		$this.timer = setTimeout(function(){$this.heart();},$this.delaytime);//3s内没有获取则取消
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
			if(message['message'].length>16){
				content = '<span class="msgCnt"><span style="line-height:30px;font-size:25px;">'+message['message']+'</span></span>';
			}else{
				content = '<span class="msgCnt"><span>'+message['message']+'</span></span>';
			}
		}else{
			content = '<span class="msgCnt msgCnt_img"><img src="'+message['message']+'"></span>';
		}
		var html = '<div class="talkList msg_'+ i +'">' +
			'<div class="userPic"><img src="'+message['headimg']+'"></div>' +
			'<div class="msgBox"><span class="userName">'+message['nickname']+' :</span>' +
			content + '</div></div>';
		return html;
	},
	'changeLastNode' : function(message){
		var msg_list = document.getElementById('msg_list'),
			lastNode = msg_list.lastChild,
			imgNode = lastNode.childNodes[0].childNodes[0],
			nameNode = lastNode.childNodes[1].childNodes[0],
			msgNode = lastNode.childNodes[1].childNodes[1];

		nameNode.innerHTML = message['nickname']+' :';
		imgNode.setAttribute('src',message['headimg']);

		if(message['type']=='0'){
			if(message['message'].length>16){
				content = '<span class="msgCnt"><span style="line-height:30px;font-size:25px;">'+message['message']+'</span></span>';
			}else{
				content = '<span class="msgCnt"><span>'+message['message']+'</span></span>';
			}
			$($('.msgCnt')[3]).replaceWith(content);
		}else{
			content = '<span class="msgCnt msgCnt_img"><img src="'+message['message']+'"></span>';
			$($('.msgCnt')[3]).replaceWith(content);
		}
	}

}

