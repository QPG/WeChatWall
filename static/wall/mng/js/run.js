var table_list = document.getElementsByTagName('table')[0],table_body = table_list.lastChild;
var lastTime = 1430462786;

function get_json(){
	$.getJSON('http://localhost/MobileVote/wall/mng_ajax?id=21&time='+lastTime,function(e){
		if(e != 'null'){
			var i;
			for( i in e){
				$('tbody tr:nth-child(2)').before(buildItem(e[i]));
				lastTime = e[i]['create_time'];
			}
		}
	})
	var timer = setTimeout(function(){get_json();},7000);
}

function buildItem(message){
	if(!message['type']){
		var content= '<th>Image</th><th><img class="image_msg" src="'+message['message']+'"></th>';
	}else{
		var content= '<th>Text</th><th>'+message['message']+'</th>';
	}
	var html = '<tr data-id="'+message['id']+'"><th>'+message['id']+'</th><th>'+message['nickname']+'</th>'+content+'<th>'+Math.round((new Date().getTime()/1000-message['create_time'])/60)+
	'min</th><th><button type="button" class="btn-xs btn btn-success" onclick="btn_allow(this)">Allow</button><button type="button" class="btn-xs btn btn-warning" onclick="btn_delete(this)">Delete</button><button type="button" class="btn-xs btn btn-danger" onclick="btn_blacklist(this)">BlackList</button></th></tr>';
	return html;
}

function btn_allow(e){
	alert(e.className)
}

function btn_delete(e){

}

function btn_blacklist(e){

}

window.onload = function(){
	get_json();

}