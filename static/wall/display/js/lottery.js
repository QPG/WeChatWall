var lottery_avatar = document.getElementById('lottery_avatar'),
	lottery_name = document.getElementById('lottery_name'),
	btn_start = document.getElementById('btn_start'),
	win_list = document.getElementsByClassName('win_list_ul')[0],
	win_list_last = win_list.lastChild,
	top_show_num = document.getElementById('num_show');
var IS_IN = 0,Timer = '',current_num = '',award_num = 0;
function start(){
	if(!IS_IN){
		IS_IN = 1;
		btn_start.innerHTML = 'STOP!';
		start_roll();
	}else{
		IS_IN = 0;
		btn_start.innerHTML = 'START!';
		award_num++;
		top_show_num.innerHTML = award_num;
		addWin(current_num);
	}
}

function start_roll(){
	if(IS_IN){
		try{
			current_num = Math.floor(total_num*Math.random()); //取整数部分
			changeList(current_num);
			Timer = setTimeout(function(){start_roll();},100);
		}
		catch(err){
			console.log(n);
		}
	}else{
		clearTimeout(Timer);
	}
}

function changeList(index){
	lottery_avatar.setAttribute('src',list_data[index]['headimg']);
	lottery_name.innerHTML = list_data[index]['nickname'];
}

function restart(){
	window.location.reload();
}

function addWin(id){
	var html = '<li><div class="win_user_num"><strong>'+award_num+'</strong></div><div class="win_user_avatar"><img src="'+list_data[id]['headimg']+'"></div><div class="win_user_name"><span>'+list_data[id]['nickname']+'</span></div></li>'
	$('.win_list_ul').append(html);
//	list_data.splice(id,1);  从原数组中删除
}

function reportAjax(){
	
}