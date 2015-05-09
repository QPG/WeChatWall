var table_list = document.getElementsByTagName('table')[0],table_body = table_list.lastChild;
var _MODE = 1,timer = '';//默认开启审核
function get_json(){
	if(_MODE){
		$.getJSON('http://wx.twtstudio.com/home/index.php/wall/mng_ajax?id=21&time='+lastTime,function(e){
			//TODO resolve it
			if(e != 'null'){
				var i;
				for( i in e){
					$('tbody tr:nth-child(1)').after(buildItem(e[i]));
					lastTime = e[i]['create_time'];
				}
			}
		})
		timer = setTimeout(function(){get_json();},5500);
	}
}

function buildItem(message){
	if(message['type']=='1'){
		var content= '<td>Image</td><td><img class="image_msg" src="'+message['message']+'"></td>';
	}else{
		var content= '<td>Text</td><td>'+message['message']+'</td>';
	}
	var html = '<tr data-id="'+message['id']+'"><td>'+message['id']+'</td><td>'+message['nickname']+'</td>'+content+'<td>'+Math.round((new Date().getTime()/1000-message['create_time'])/60)+
	'min</td><td><button type="button" class="btn-xs btn btn-success" onclick="btn_allow(this)">Allow</button><button type="button" class="btn-xs btn btn-warning" onclick="btn_delete(this)">Delete</button><button type="button" class="btn-xs btn btn-danger" onclick="btn_blacklist(this)">BlackList</button></td></tr>';
	return html;
}

function btn_allow(r){
	var id = parseInt(r.parentNode.parentNode.getAttribute('data-id'));
	$.getJSON('http://wx.twtstudio.com/home/index.php/wall/mng_allow?id='+id,function(e){
		if(e == 1){
			table_body.removeChild(r.parentNode.parentNode);
		}
	})
}

function btn_delete(r){
	var id = parseInt(r.parentNode.parentNode.getAttribute('data-id'));
	$.getJSON('http://wx.twtstudio.com/home/index.php/wall/mng_delete?id='+id,function(e){
		if(e == 1){
			table_body.removeChild(r.parentNode.parentNode);
		}
	})
}

function btn_blacklist(r){
	var id = parseInt(r.parentNode.parentNode.getAttribute('data-id'));
	$.getJSON('http://wx.twtstudio.com/home/index.php/wall/mng_blacklist?id='+id,function(e){
		if(e == 1){
			table_body.removeChild(r.parentNode.parentNode);
		}
	})
}

function btn_manual(){
	_MODE = 0;
	clearTimeout(timer);
}
function btn_auto(){
	_MODE = 1;
	get_json();
}

window.onload = function(){
	get_json();

}