window.onload = function(){
	var form_write = document.getElementById('form_write');


}

function execute(){
	var	check_group = document.getElementsByTagName('input'),
		check_num = check_group.length;
	for (var i =0;i<check_num;i++){
		if(check_group[i].checked == true){
			var is_cheaked = true;
			break;
		}
	}
	if(!is_cheaked){
		alert('请正确填写');
	}else{
		form_write.submit();
	}
	
}