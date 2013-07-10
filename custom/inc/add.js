function FaceChoose(n){
	//修改界面样式
	var ClassName = "Style"+n;
	document.getElementById("Message").setAttribute("class",ClassName);
	document.getElementById("Message").setAttribute("className",ClassName);
	frmAdd.face.value = n;
}
function IconChange(n){
	//修改心情图标
	var IconUrl = "images/msn_00"+n+".png";
	document.getElementById("IconImg").src = IconUrl;	
	frmAdd.icon.value = n;	
}
function InputName(OriInput, GoalArea){
	//修改称呼落款
	document.getElementById(GoalArea).innerHTML = OriInput.value;
}
function strCounter(field){
	//计算输入字数
	if (field.value.length > 70)
		field.value = field.value.substring(0, 70);
	else{
		document.getElementById("Char").innerHTML = 70 - field.value.length;
		document.getElementById("AreaText").innerHTML = field.value;
	}
}
function getTime(){
	//获得当前时间
	var ThisTime = new Date();
	document.write(ThisTime.getFullYear()+"-"+(ThisTime.getMonth()+1)+"-"+ThisTime.getDate()+" "+ThisTime.getHours()+":"+ThisTime.getMinutes()+":"+ThisTime.getSeconds()); 
}