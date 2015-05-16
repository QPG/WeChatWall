var table_list = document.getElementsByTagName('table')[0],table_body = table_list.lastChild;

var run = {
	'_Mode':1,//switch
	'_Timer':'', 
	'_LastTime':lastTime,
	'BlackList':new Array,
	'receiver':function(){
		$this = this;
		if($this._Mode){
			$.getJSON('http://'+document.domain+'/home/index.php/wall/mng_ajax?id=21&time='+$this._LastTime,function(e){
				//TODO resolve it
				if(e != 'null'){
					for(var i in e){
						if($this.checkBlackList(e[i]['openid'])){
							$this.refuseMsg(e[i]['id']);
							continue;
						}
						$('tbody tr:nth-child(1)').after($this.buildItem(e[i]));
						$this._LastTime = e[i]['create_time'];
						console.log(lastTime);
					}
				}
			})
		$this._Timer = setTimeout(function(){$this.receiver();},5500);
		}
	},
	'buildItem':function(message){
		if(message['type']=='1'){
			var content= '<td>Image</td><td><img class="image_msg" src="'+message['message']+'"></td>';
		}else{
			var content= '<td>Text</td><td>'+message['message']+'</td>';
		}
		var html = '<tr data-id="'+message['id']+'"><td>'+message['id']+'</td><td>'+message['nickname']+'</td>'+content+'<td>'+Math.round((new Date().getTime()/1000-message['create_time'])/60)+
		'min</td><td><button type="button" class="btn-xs btn btn-success" onclick="run.btn_allow(this)">Allow</button><button type="button" class="btn-xs btn btn-warning" onclick="run.btn_delete(this)">Delete</button><button type="button" class="btn-xs btn btn-danger" onclick="run.btn_blacklist(this,'+"'"+message['openid']+"'"+')">BlackList</button></td></tr>';
		return html;
	},
	'btn_allow':function(r){
		var id = parseInt(r.parentNode.parentNode.getAttribute('data-id'));
		$.getJSON('http://'+document.domain+'/home/index.php/wall/mng_allow?id='+id,function(e){
			if(e == 1){
				table_body.removeChild(r.parentNode.parentNode);
			}
		})
	},
	'btn_delete':function(r){
		var id = parseInt(r.parentNode.parentNode.getAttribute('data-id'));
		$.getJSON('http://'+document.domain+'/home/index.php/wall/mng_delete?id='+id,function(e){
			if(e == 1){
				table_body.removeChild(r.parentNode.parentNode);
			}
		})
	},
	'btn_blacklist':function(r,id){
		if(!this.checkBlackList()){this.BlackList.push(id);}

		var mid = parseInt(r.parentNode.parentNode.getAttribute('data-id'));
		this.refuseMsg(mid);
		table_body.removeChild(r.parentNode.parentNode);
	},
	'btn_manual':function(){
		this._Mode = 0;
		clearTimeout(this._Timer);
	},
	'btn_auto':function(){
		this._Mode = 1;
		this.receiver();
	},
	'checkBlackList':function(openid){
		var len = this.BlackList.length;
		for(var i=0;i<len;i++){
			if(this.BlackList[i]==openid){
				return true;
			}
		}
		return false;
	},
	'refuseMsg':function(mid){
		$.getJSON('http://'+document.domain+'/home/index.php/wall/mng_blacklist?id='+mid,function(e){
			if(e == 1){
				return;
			}
		})
	}
}

window.onload = function(){
	run.receiver();
}