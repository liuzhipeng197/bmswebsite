	function tick() {
		var today=new Date();
		var month=today.getMonth()+1;<!--getMonth��ʾ��ǰ�·�-1������Ҫ+1������ʾ��ǰ�·�-->
		var year, date, hours, minutes, seconds;
		var intHours, intMinutes, intSeconds;
		var week=new Array() <!--��ʾ����Ϊ���ڼ�-->
		week[0]="������ ";
		week[1]="����һ ";
		week[2]="���ڶ� ";
		week[3]="������ ";
		week[4]="������ ";
		week[5]="������ ";
		week[6]="������ ";
		intHours = today.getHours();
		intMinutes = today.getMinutes();
		year=today.getFullYear();
		date=today.getDate();
		var time;
		if (intHours == 0) {
		hours = "00:";
		}
		else if (intHours < 10) {
		hours = "0" + intHours+":";
		}
		else {
		hours = intHours + ":";
		}
		if (intMinutes < 10) {
		minutes = "0"+intMinutes+":";
		}
		else {
		minutes = intMinutes;
		}
		//���ݲ�ͬ��ʱ����ʾ��ͬ���ʺ�
		//��������Լ��ܽ�Ĳ��Ծ�������time���и�ֵ
		time="��ҹ��";
		if(today.getHours()<=22) time="���Ϻ�!";
		if(today.getHours()<=19) time="�����!";
		if(today.getHours()<=17) time="�����!";
		if(today.getHours()<=14) time="�����!";
		if(today.getHours()<=12) time="�����!";
		if(today.getHours()<=8) time="���Ϻ�!";
		if(today.getHours()<=5) time="�賿��!";
		timeString=time+"�����ǣ�"+year+"��"+month+"��"+date+"�� "+week[today.getDay()];
		Clock.innerHTML = timeString;
		window.setTimeout("tick();", 1000);
	}
