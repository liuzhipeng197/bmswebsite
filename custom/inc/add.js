function FaceChoose(n){
	//�޸Ľ�����ʽ
	var ClassName = "Style"+n;
	document.getElementById("Message").setAttribute("class",ClassName);
	document.getElementById("Message").setAttribute("className",ClassName);
	frmAdd.face.value = n;
}
function IconChange(n){
	//�޸�����ͼ��
	var IconUrl = "images/msn_00"+n+".png";
	document.getElementById("IconImg").src = IconUrl;	
	frmAdd.icon.value = n;	
}
function InputName(OriInput, GoalArea){
	//�޸ĳƺ����
	document.getElementById(GoalArea).innerHTML = OriInput.value;
}
function strCounter(field){
	//������������
	if (field.value.length > 70)
		field.value = field.value.substring(0, 70);
	else{
		document.getElementById("Char").innerHTML = 70 - field.value.length;
		document.getElementById("AreaText").innerHTML = field.value;
	}
}
function getTime(){
	//��õ�ǰʱ��
	var ThisTime = new Date();
	document.write(ThisTime.getFullYear()+"-"+(ThisTime.getMonth()+1)+"-"+ThisTime.getDate()+" "+ThisTime.getHours()+":"+ThisTime.getMinutes()+":"+ThisTime.getSeconds()); 
}