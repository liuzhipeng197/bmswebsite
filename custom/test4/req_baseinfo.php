<?php
         session_start();
	//header("Cache-control: private"); 
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();
         $subject_id=$_POST['test_obj'];
        $_SESSION['subject_id']=$subject_id;
		$cus_id=$_SESSION['cus_id'];
        //echo '$_session='.$_SESSION['cus_id'];
        //echo '$subject='.$subject_id;
		$sql="select *from bms_custom  where cus_id='$cus_id'";
        $result=mysql_query($sql);
        $row=mysql_fetch_array($result);
		$cus_tel=$row['cus_tel'];//�ֻ���
		$cus_realname=$row['cus_realname'];//��ϵ��
		$com_name=$row['com_name'];//ί�е�λ����
		$com_addr=$row['com_addr'];//��λ��ַ
		$com_zip=$row['com_zip'];//��λ�ʱ�
		$com_tel=$row['com_tel'];//��λ�绰
		$com_fax=$row['com_fax'];//��λ����
		$cus_email=$row['cus_email'];//��ϵ������
				
?>

<body>
<div class="juzhong">
  <?php
        iframe_top();//ҳ��ͷ��
        ?>

  <div class="main_2">
        <?php
                iframe_left();//ҳ����ߣ��˵���
        ?>

    <div class="right_2">
        <div align='left'>                                                                                                                                                                                        <ul class="bmsbreadcrumb">
                                      
                        <li><a href="index.php">��ҳ</a> <span class="divider">/</span></li>                                                                   
                        <li><a href="#">���ҵ������</a> <span class="divider">/</span></li>                                                                                                          
                        <li class="active">��д���������Ϣ</li>                                                                                                                                                      </ul>
            </div>
	<div class="anlie_basicinfo">
          <div class="anlie_nr">
          
                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
           <td class='alert' style='padding:10px 0px 0px 0px'><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <form name="form_sel_obj" method="POST" action="req_baseinfo.php">
              <tr>
                

                                <?php
                                        //ͨ���������ݿ⣬��ȡ����Ԫ����
                                        $ary_test_obj=array();
                                        $ary_meta=array();
                                        $sql="select subject_id,subject_name,subject_name2 from subject where parents='$subject_id' order by subject_id";
                                        $ary_test_obj=get_result_ary($sql);

                                        foreach($ary_test_obj as $key => $result){
                                        $subject_cid=$result['subject_id'];//Ԫ����ID
                                        $subject_name=$result['subject_name'];//Ԫ������������
                                        $subject_name2=$result['subject_name2'];//Ԫ����Ӣ������
                                        //echo $subject_cid."</br>";
                                        //echo $subject_name."</br>";
                                        //echo $subject_name2."</br>";

                                        //����Ԫ���ݱ�
                                        $sql2="select count(metadata_id) from metadata_subjects where subject_id='$subject_cid'";
                                        if(get_result_first($sql2)<1){
                                                //Ԫ����û�����ԣ������Ԫ�������ƺ��ı���
                                                if(strstr($subject_name,"����")){
                                                        echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" class=\"it date-pick\"/></td>
                                                        </tr>";
                                                }else if(strstr($subject_name,"ί�е�λ����")||strstr($subject_name,"������λ")){
													 echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" value='$com_name' /></td>
                                                        </tr>";
												}else if(strstr($subject_name,"��ϵ��")){
													 echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" value='$cus_realname' /></td>
                                                        </tr>";
												
												}else if(strstr($subject_name,"ί�е�λ��ַ")){
													 echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" value='$com_addr' /></td>
                                                        </tr>";
												
												}else if(strstr($subject_name,"�绰")){
													 echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" value='$com_tel' /></td>
                                                        </tr>";
												
												}else if(strstr($subject_name,"����")){
													 echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" value='$com_fax' /></td>
                                                        </tr>";
												
												}else if(strstr($subject_name,"�ֻ�����")){
													 echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" value='$cus_tel' /></td>
                                                        </tr>";
												
												}else if(strstr($subject_name,"��������")){
													 echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" value='$com_zip' /></td>
                                                        </tr>";
												
												}else if(strstr($subject_name,"mail")){
													 echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" value='$cus_email' /></td>
                                                        </tr>";
												
												}else{
                                                        echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                        <td height=\"30\" align=\"left\"class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" /></td>
                                                        </tr>";
                                                }
                                                echo"<tr  ><td height=\"1\"  ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";

                                        }else{
                                                //�������ݿ⣬��ȡԪ��������ֵ��������
                                                $sql3="select metadata_id,meta_name,meta_type from metadata_subjects where subject_id='$subject_cid'";
                                                $ary_meta=get_result_ary($sql3);
                                                $metaid="metaid_";
                                                foreach($ary_meta as $key => $result3){

                                                $metadata_id=$result3['metadata_id'];//����ID
                                                $meta_name=$result3['meta_name'];//������������
                                                $meta_type=$result3['meta_type'];//��������
                                                //echo $subject_cid."</br>";
                                                //echo $subject_name."</br>";
                                                //echo $subject_name2."</br>";

                                                if($meta_type==1){//һ������checkbox
                                                        //$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' type='checkbox' value='$metaid$metadata_id|$meta_name' id='$metaid$metadata_id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                        //�Ƿ�ͬ��ְ���������ʽ���Ƿ�����桢���緽ʽ�����������Ҫ���⴦��
                                                        if(strstr($subject_name,"�Ƿ�ͬ��ְ�")||strstr($subject_name,"������ʽ")||strstr($subject_name,"�Ƿ������")||strstr($subject_name,"���緽ʽ")||strstr($subject_name,"�������")){
                                                        $attr_cont .="&nbsp;$meta_name<input style='margin-top:4px;margin-left:2px;' onClick='check2(this)' type='checkbox' value='$subject_name2|$meta_name' id='$subject_name2|$metadata_id' name='$subject_name2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                        }else{
                                                        $attr_cont .="&nbsp;$meta_name<input style='margin-top:4px;margin-left:2px;' onClick='check(this)' type='checkbox' value='$subject_name2|$meta_name' id='$metaid$metadata_id'></br>";
                                                        }
                                                }else if($meta_type==2){//��������checkbox
                                                        //��$meta_name���շֺŽ��зָ�
                                                        $ary_name=array();
                                                        $ary_name=explode(";",$meta_name);
                                                        for($i=1;$i<count($ary_name);$i++){
                                                                //$attr_cont2 .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input onClick='check(this)' type='checkbox' value='$metaid$metadata_id"."_"."$i|$ary_name[$i]' id='$metaid$metadata_id"."_".$i."'>$ary_name[$i]&nbsp;&nbsp;";
                                                                $val=$ary_name[$i];
                                                                $id=md5($val);
                                                                //$attr_cont2 .="$val<input onClick='check(this)' type='checkbox' value='$val|$id' id='$id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                                $attr_cont2 .="$val<input style='margin-top:4px;margin-left:2px;' onClick='check(this)' type='checkbox' value='$subject_name2|$ary_name[0]:$val' id='$id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                                                        }
                                                        $attr_cont .="$ary_name[0]:&nbsp;(&nbsp;&nbsp;&nbsp;".$attr_cont2.")</br>";
                                                        $attr_cont2="";

                                                }else if($meta_type==0){//��ͨ˵�������֣�����Ҫ�û���д
                                                        $attr_cont .="&nbsp;$meta_name</br>";

                                                }
                                        }
                                                echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
                                                <td height=\"30\" align=\"left\" class=\"left_txt4\" width=\"70%\">".$attr_cont."</td></tr>";
                                                echo"<tr><td height=\"1\"  ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";


                                        }

                                        $attr_cont="";

                                        }



                                        //echo 'meta_name='.$meta_name;

                                ?>
             
             
          </table></td>
          </tr>

        </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="45%" height="30" align="right"><input type="button" class='edit_buttom' value="��һ��" name="B1" onclick="mysubmit()" /></td>
              <td width="10%" height="30" align="right">&nbsp;</td>
              <td width="45%" height="30" align='left'><input type="button" class='edit_buttom' value="ȡ��" name="B12" /></td>
            </tr>
            


          </table>
                 
                          
          </div>
          
        </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="bottom">
   <?php
        iframe_bottom();
   ?>
  </div>

</div>
</body>
</html>
<script>
$(window).ready(function(){
        $('.date-pick').datePicker({clickInput:true,startDate:'0001-01-01'});
})

function getAllCheckBoxId(){
        var inputs = document.getElementsByTagName("input");//��ȡ���е�input��ǩ����
        var checkboxNameArray = [];//��ʼ�������飬�������checkbox����
        for(var i=0;i<inputs.length;i++){
                var obj = inputs[i];
                if(obj.type=='checkbox'){
                checkboxNameArray.push(obj.id);
                }
        }
        return checkboxNameArray;
}
function getAllTextId(){
        var inputs = document.getElementsByTagName("input");//��ȡ���е�input��ǩ����
        var textNameArray= [];//��ʼ�������飬�������text����
        for(var i=0;i<inputs.length;i++){
                var obj = inputs[i];
                if(obj.type=='text'){
                textNameArray.push(obj.id);
                }
        }
        return textNameArray;
}

function check(obj){
        var checkedId = obj.id;
        var checkedArray = new Array();
        var all=getAllCheckBoxId();
        for(var i=0;i<all.length;i++){
                var singlecheck = all[i];
                if(singlecheck.length>checkedId.length&&singlecheck.substring(0,checkedId.length)==checkedId){
                        var t = document.getElementById(checkedId);
                        if(t.checked == true){
                                document.getElementById(singlecheck).checked = true;
                        }else{
                                document.getElementById(singlecheck).checked = false;
                        }
                }
        }
}
function check2(obj){//checkbox����
        var checkedId = obj.id;
        //var str=checkedId + "," + name;
        //alert(checkedId);
        var name= new Array(); //����һ����
        name=checkedId.split("|"); //�ַ��ָ�    
        //alert(name[0]);
        var aa = document.getElementsByName(name[0]);
        for (var i = 0; i < aa.length; i++) {
        //alert(aa[i]);
        aa[i].checked = false;

        }
        obj.checked = true;

}

function mysubmit(){
        //var arr_G = new Array();//���checkboxֵ
        var arr_G="";
        var all=getAllCheckBoxId();//��ȡcheckbox����
        //var arr_t=new Array();//���Textֵ
        var arr_t="";
        var obj_t=getAllTextId();//��ȡText����
        var j=0;
        var k=0;
        for(var i=0;i<all.length;i++){
                if(document.getElementById(all[i]).checked == true){
                //arr_G[j] = document.getElementById(all[i]).value;
                //j++;
                 arr_G += document.getElementById(all[i]).value + ",";
                }
        }
        for(var i=0;i< obj_t.length;i++){
                var text_val=document.getElementById(obj_t[i]).value;
                /*if(text_val==''){
                        alert("����δ�����ȷ��");
                }else{
                        //arr_t[k] = obj_t[i]+"|"+document.getElementById(obj_t[i]).value;
                        //k++;
                        arr_t += obj_t[i]+"|"+document.getElementById(obj_t[i]).value+",";
                }*/
                arr_t += obj_t[i]+"|"+document.getElementById(obj_t[i]).value+",";

        }
        //alert(arr_G);
        //alert(arr_t);
        var subject_id="<?php echo $subject_id ?>";
        var uid="<?php echo $_SESSION['cus_id'];?>";
        $.post("task.php",{action:"save_req_baseinfo",subject_id:subject_id,req_text:arr_t,req_chk:arr_G,uid:uid},function(data){
        //$.post("task.php",{action:"save_req_baseinfo",req_text:arr_t,req_chk:arr_G},function(data){
                //if(data){
                if(data=="OK"){
                //alert(data);
                alert("���������ύ�ɹ�");
                window.location.href="sample_baseinfo.php";
                }
        });

 }



</script>

