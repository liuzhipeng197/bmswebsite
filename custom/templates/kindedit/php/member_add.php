<?php
        include_once("../../../include/function.php");
        iframe_head2();
?>
<script type="text/javascript" language="JavaScript"> 

function ajaxFileUpload()

        {  
                $("#loading")
                .ajaxStart(function(){
                        $(this).show();
                })
                .ajaxComplete(function(){
                        $(this).hide();
                });

                $.ajaxFileUpload
                (
                        {
                                url:'doajaxfileupload2.php',
                                secureuri:false,
                                fileElementId:'fileToUpload',
                                dataType: 'json',
                                success: function (data, status)
                                {
                                        if(typeof(data.error) != 'undefined')
                                        {
                                                if(data.error != '')
                                                {
                                                        alert(data.error);
                                                }else
                                                {
                                                        //alert(data.msg);
                                                        if(data.msg!=''){
                                                        document.getElementById('hid_filename').value=data.msg;
                                                        alert('�ϴ��ɹ���');
                                                        }else{
                                                        alert('�ϴ�ʧ�ܣ�');
                                                        }
                                                }
                                        }
                                },
                                error: function (data, status, e)
                                {
                                        alert(e);
                                }
                        }
                )

                return false;

        }

 function coreinfo_add(){
                         var file_name=document.getElementById('hid_filename').value;//�ϴ�ͼƬ����2010.8.18
 
                       var type=$('#news_type').val();
                        //var start_date=$('#start_date').val();
                        //var title=$('#title').val();
                        //var author=$('#author').val(); 
                        //var department=$('#department').val(); 
                        //var content=$('#content1').val();
                        var mem_name=$('#mem_name').val();
                        var mem_website=$('#mem_website').val();
                        if(mem_name==''){
                                alert('�������Ա���ƣ�');
                        }else if(mem_website==''){
                                alert('�������Ա��λ��ַ');
                        }else{

                                $.post("./edit_task.php",{action:"member_add",fileName:file_name,mytype:type,
                                memName:mem_name,mem_website:mem_website},function(data){
                                if(data){
                                        //alert(data);
                                        alert("��Ա���ӳɹ���");
                                        clear();
                                }else{
                                        alert("�û�Ա�Ѿ����ڣ�");
 
                                }
                        });
                }
 }
 
 function coreinfo_cancle(){
        clear();
 }
 
 function clear(){
        document.getElementById('mem_name').value='';
        //document.getElementById('author').value='';
        //document.getElementById('department').value='';
 }
 
 
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                        <td width="39" height="30"><div id="right_topleft"></div></td>
                        <td width="100%" align="left" ><div id="right_topcenter">��ǰλ�ã���Ա���� > ���ӻ�Ա</div></td>
                        <td width="7"><div id="right_topright"></div></td>
                </tr>
                </table>
<div id="mainbody">
<!--<form  action="?a=up" id="dyinfo_form" name="dyinfo_form" method="POST"  target="_self">-->
<form  id="dyinfo_form" name="dyinfo_form" method="POST" >
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- ������-1 -->
        <td height="30" background="../../../images/tab_05.gif">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>���ӻ�Ա</b></td>
                <td width="16"><img src="../../../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
                </table>
        </td>
</tr>

<tr><!-- ��Ҫ����1 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8" background="../../../images/tab_12.gif">&nbsp;</td>
            <td>
                <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                         <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;���ݣ�<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                
                <tr>
                         <td  height="30" style="font-size:13;">&nbsp;&nbsp;��Ա���<select id="news_type" name="news_type" style="width:260px;" >
                         <option value="0" selected="selected">�׽��Ա</option>
                         <option value="1">�ƽ��Ա</option>
                
                         </select>
                         </td>
                         <td   height="30" style="font-size:13;">&nbsp;&nbsp;��Ա���ƣ�<input type="text" id="mem_name" name="mem_name" size="45"  value=""></td>
                </tr>
                <tr>
                        <td   height="30" style="font-size:13;">&nbsp;&nbsp;ͼƬ��<input id="fileToUpload" type="file" size="25" name="fileToUpload" style="height:24px;">
                        <input type="button" id="buttonUpload" onclick="return ajaxFileUpload();" value="�ϴ�" style="height:24px;">(��Ա��λlogo�ϴ�)
                        <input type="hidden" id="hid_filename" name="hid_filename" value="">
                        <input type="hidden" id="hid_fileid" name="hid_fileid" value="">
                        </td>
						 <td   height="30" style="font-size:13;">&nbsp;&nbsp;��Ա��ַ��<input type="text" id="mem_website" name="mem_website" size="45"  value=""></td>
                </tr>
            
                
                
              </table>

                         </td>
                </tr>
                
               
                   
               
                </table>   
                        </td>
                        <td width="8" background="../../../images/tab_15.gif">&nbsp;</td>
                </tr>

                </table>
        </td>
</tr>
<tr> 
    <td height="35" background="../../../images/tab_19.gif">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="12" height="35"><img src="../../../images/tab_18.gif" width="12" height="35" /></td>
              <td align="right">&nbsp;</td>
              <td width="16"><img src="../../../images/tab_20.gif" width="16" height="35" /></td>
            </tr>
        </table>
    </td>
</tr>

<tr> 
        <td height="40" valign="middle" align="center">
                <!--<input type="button" id="btn_add" onclick=dyinfo_add() value="ȷ ��">-->
                <input type="button" name="button" id="button"  onclick="coreinfo_add()"value="�� ��" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="ȡ ��">
        </td>

</tr>
</table>
</div>
</body>

</html>
