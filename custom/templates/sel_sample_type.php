<?php
	session_start();
	require("../../admin/include/db_mysql.php");
	if($_SESSION['cus_id']==''){
		 header("Location:../index.php");
                 exit();

	}
	//echo '$_session='.$_SESSION['cus_id'];

?>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F8F9FA;
	/*overflow: scroll; */
	overflow-x:hidden;
}
-->
</style>
<script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script>
	
	function mysubmit(){
		
		var obj_val= $('#test_obj').val();
		//alert(obj_val);
		if(obj_val==''){
			alert("��ѡ�������");
		}else{
			//$('#h_test_obj').val()=obj_val;
			document.form_sel_obj.submit();
		}
		
	}

</script>
<script type="text/javascript">
function setHeight()
{
	window.parent.parent.document.getElementById("outframe").style.height=0+"px";
	h = Math.max(document.documentElement.offsetHeight,document.body.offsetHeight);
	//h=document.body.scrollHeight;
	window.parent.parent.document.getElementById("outframe").style.height = 100+h+100 + 50+"px"; //Ϊ�˱�֤Ч�������50
}
</script>
<style>
html,body{margin:0;padding:0}
</style>
<link href="../style/skin.css" rel="stylesheet" type="text/css" />
<body onload="setHeight()">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif"><img src="../images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="../images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31" ><div class="titlebt">ѡ�������</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="../images/mail_rightbg.gif"><img src="../images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td height="71" valign="middle" background="../images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="13" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="left_txt">��ǰλ�ã����ҵ�����롷�������̡�ѡ�������</td>
          </tr>
          <tr>
            <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" height="55" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="10%" height="55" valign="middle"><img src="../images/title.gif" width="54" height="55"></td>
                <td width="90%" valign="top"><span class="left_txt2">�����������Ҫѡ����Ҫ���Ķ���Ȼ�󵥻���һ����</span><span class="left_txt3"></span><span class="left_txt2"></span><br>
                          <span class="left_txt2"></span><span class="left_txt3">Ŀǰ�ṩ�ļ������������Ϣ���豸��IC�������ߡ�RFID��Ʒ�������ϵͳ����Ϣ�洢��Ʒ�����ܡ�AFC�豸�������豸����Ϣ���̼���ȡ�</span><span class="left_txt2"></span><span class="left_txt3"></span><span class="left_txt2"></span></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;ѡ�������</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="form_sel_obj" method="POST" action="req_baseinfo.php">
              <tr>
                <td width="20%" height="30" align="right" class="left_txt4">�������б�</td>
                <td width="3%"  class="left_txt4">&nbsp;</td>
                <td width="32%" height="30"  class="left_txt4">
				<select id="test_obj" name="test_obj" width='180px'>			
				<option value=''>��ѡ�������</option>
				<?php
					//ͨ���������ݿ⣬��ȡ������
					$ary_test_obj="";
					$sql="select subject_id,subject_name from subject where parents='subjects'";
					$ary_test_obj=get_result_ary($sql);
					//echo"<select id=\"test_obj\"  width='180px'>";				
					//echo"<option value=''>��ѡ�������</option>";
					
					foreach($ary_test_obj as $key => $result){
					$subject_id=$result['subject_id'];
					$subject_name=$result['subject_name'];
					//echo $result['subject_name']."\n";
					
					echo "<option value=\"$subject_id\">$subject_name</option>\n";
					}
					echo"</select>";
					//echo test_obj_list;
									
				?>
				
                <td width="45%" height="30"  class="left_txt4"></td>
				<input type='hidden' id="h_test_obj" >
              </tr>
              <tr>
                <td>&nbsp;</td>
              <tr>
                  <td>&nbsp;</td>
              </tr>
			  <tr>
                  <td>&nbsp;</td>
              </tr>
			  <tr>
                  <td>&nbsp;</td>
              </tr>
             
          </table></td>
          </tr>

        </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
            
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="50%" height="30" align="right"><input type="button" value="��һ��" name="B1" onclick="mysubmit()" /></td>
              <td width="6%" height="30" align="right">&nbsp;</td>
              <td width="44%" height="30"><input type="button" value="ȡ��" name="B12" /></td>
            </tr>
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>

			
          </table></td>
      </tr>
    </table></td>
    <td background="../images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" background="../images/mail_leftbg.gif"><img src="../images/buttom_left2.gif" width="17" height="17" /></td>
      <td height="17" valign="top" background="../images/buttom_bgs.gif"><img src="../images/buttom_bgs.gif" width="17" height="17" /></td>
    <td background="../images/mail_rightbg.gif"><img src="../images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>

</body>

