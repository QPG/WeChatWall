var table_list = document.getElementsByTagName('table')[0],table_body = table_list.lastChild;

function getJson(){
	$.getJSON('http://localhost/MobileVote/wall/mng_ajax?id=21&time=1430453671',function(e){
		if(e != 'null'){
			for(var i in e){
				var last_item = table_body.childNodes[2];
				table_list.insertBefore(buildItem(e[i]),last_item);
			}
		}
	}
	var timer = setTimeout(function(){getJson();},5000);
}

function buildItem(message){
	if(message[type]){
		var content= '<th>Image</th><th><img class="image_msg" src="'+message['message']+'"></th>';
	}else{
		var content= '<th>Image</th><th>'+message['message']+'</th>';
	}
	var html = '<tr data-id="'+message['id']+'"><th>'+message['id']+'</th><th>'+message['nickname']+'</th>'+content+
				'<th>'+intval((time()-$v['create_time'])/60)+'min</th>
				<th><button type="button" class="btn-xs btn btn-success">Allow</button><button type="button" class="btn-xs btn btn-warning">Delete</button><button type="button" class="btn-xs btn btn-danger">BlackList</button></th></tr>';
	return html;
}

window.onload = function(){
	getJson();
}