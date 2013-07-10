<?php
        include_once("../../../include/function.php");
        iframe_head2();
?>
<?php
        include_once("../../../include/db_mysql.php");
        $coreinfo_id=trim($_GET['coreinfoid']);
        $sql = "select * from nstc_reguser where id='$coreinfo_id'";
    $result = mysql_query($sql,$conn);
    $row = @mysql_fetch_array($result, MYSQL_BOTH);
    //个人基本信息
    $coreinfo_id=$row['id'];
        $reg_name=$row['reg_name'];
        $reg_realname=$row['reg_realname'];
        $reg_email=$row['reg_email'];
        $reg_tel=$row['reg_tel'];
        $reg_date=$row['reg_date'];
        $reg_time=$row['reg_time'];
        $reg_sex=$row['reg_sex'];
        //公司基本信息
        $com_name=$row['com_name'];
        $com_website=$row['com_website'];
        $com_addr=$row['com_addr'];
        $com_zip=$row['com_zip'];
        $com_email=$row['com_email'];//单位网址
        $com_fax=$row['com_fax'];
        $com_tel=$row['com_tel'];

        $log_num=$row['log_num'];
        $log_lasttime=$row['log_lasttime'];

        $audit=$row['audit'];
        if($audit=='0'){
                $audit='未通过';
        }else{
                $audit='通过';
        }
  
	 
    
?>
<script type="text/javascript" language="JavaScript"> 
 
 
 function coreinfo_cancle(){
        //clear();
        window.location.href="reguser_show.php";
 }
 function coreinfo_audit(){
        var coreinfo_id="<?echo $coreinfo_id?>";
        $.post("./edit_task.php",{action:"reguser_audit",coreinfoId:coreinfo_id},function(data){
                                if(data){
                                        //alert(data);
                                        alert("操作成功！");
                                        //clear();
                                }else{
                                        alert("操作失败");
                                }
                        });
 }
 
 
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                        <td width="39" height="30"><div id="right_topleft"></div></td>
                        <td width="100%" align="left" ><div id="right_topcenter">当前位置：注册用户管理 > 查看详情</div></td>
                        <td width="7"><div id="right_topright"></div></td>
                </tr>
                </table>
<div id="mainbody">
<!--<form  action="?a=up" id="dyinfo_form" name="dyinfo_form" method="POST"  target="_self">-->
<form  id="dyinfo_form" name="dyinfo_form" method="POST" >
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- 标题栏-1 -->
        <td height="30" background="../../../images/tab_05.gif">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo $reg_realname."个人信息";?></b></td>
                <td width="16"><img src="../../../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
                </table>
        </td>
</tr>

<tr><!-- 主要内容1 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8" background="../../../images/tab_12.gif">&nbsp;</td>
            <td>
                <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                         <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;内容：<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                
                 <tr>
                         <td  height="30" style="font-size:13;">&nbsp;&nbsp;登陆用户：<?php echo $reg_name;?>
                
                         </td>
                         <td  height="30" style="font-size:13;">&nbsp;&nbsp;真实姓名：<?php echo $reg_realname;?></td>
                         <!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;时间：<input type="text" id="start_date" name="start_date" value='请选择' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
                <tr>
                         <td  height="30" style="font-size:13;">&nbsp;&nbsp;用户邮箱：<?php echo $reg_email;?></td>
                        <td   height="30" style="font-size:13;">&nbsp;&nbsp;用户电话：<?php echo $reg_tel;?></td>
                </tr>
                <tr>
                 <td  height="30" style="font-size:13;">&nbsp;&nbsp;注册时间：<?php echo $reg_date;?></td>
                  <!--<td  height="30" style="font-size:13;">&nbsp;&nbsp;用户性别：<?php echo $reg_sex;?></td>-->
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
<tr><!-- 标题栏-2 -->
        <td height="30" background="../../../images/tab_05.gif">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo $reg_realname."公司信息";?></b></td>
                <td width="16"><img src="../../../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
                </table>
        </td>
</tr>

<tr><!-- 主要内容2 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8" background="../../../images/tab_12.gif">&nbsp;</td>
            <td>
                <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                         <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;内容：<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                
                 <tr>
                         <td  height="30" style="font-size:13;">&nbsp;&nbsp;公司名称：<?php echo $com_name;?>
                
                         </td>
                         <td  height="30" style="font-size:13;">&nbsp;&nbsp;公司网站：<?php echo $com_email;?></td>
                         <!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;时间：<input type="text" id="start_date" name="start_date" value='请选择' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
                <tr>
                         <td  height="30" style="font-size:13;">&nbsp;&nbsp;公司地址：<?php echo $com_addr;?></td>
                        <td   height="30" style="font-size:13;">&nbsp;&nbsp;公司电话：<?php echo $com_tel;?></td>
                </tr>
                <tr>
                 <td  height="30" style="font-size:13;">&nbsp;&nbsp;公司邮编：<?php echo $com_zip;?></td>
                  <td  height="30" style="font-size:13;">&nbsp;&nbsp;公司传真：<?php echo $com_fax;?></td>
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

<tr><!-- 标题栏-3 -->
        <td height="30" background="../../../images/tab_05.gif">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo $reg_realname."下载列表";?></b></td>
                <td width="16"><img src="../../../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
                </table>
        </td>
</tr>

<tr><!-- 主要内容3 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8" background="../../../images/tab_12.gif">&nbsp;</td>
            <td>
                <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                        
                         <td height="30" style="font-size:13; ">
                         <!--<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">-->
                           <?php
                 $sql = "select * from nstc_userdown where user_id='$coreinfo_id'";
                $result = mysql_query($sql,$conn);
                        echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">下载内容</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">下载次数</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">下载时间</span></div></td>
                </tr>";

            $id=1;
                while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
                                $down_name=$row['down_name'];
                                $down_count=$row['down_count'];
                                $datetime=$row['datetime'];

                                echo "<tr>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$down_name."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$down_count."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$datetime."</td>";
                                echo "</tr>";
                                $id++;

                   }
                  // echo "</table>";
                   mysql_close();
                 
                ?>
                
                
                
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

<tr><!-- 标题栏-4 -->
        <td height="30" background="../../../images/tab_05.gif">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo $reg_realname."备注信息";?></b></td>
                <td width="16"><img src="../../../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
                </table>
        </td>
</tr>

<tr><!-- 主要内容4 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8" background="../../../images/tab_12.gif">&nbsp;</td>
            <td>
                <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                         <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;内容：<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                
                 <tr>
                        <!-- <td  height="30" style="font-size:13;">&nbsp;&nbsp;登陆次数：<?php echo $log_num;?>
                
                         </td>
                         <td  height="30" style="font-size:13;">&nbsp;&nbsp;最后登陆时间：<?php echo $log_lasttime;?></td>-->
                         <td  height="30" style="font-size:13;">&nbsp;&nbsp;审核状态：<?php echo $audit;?>
                          </td>
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
                <input type="button" name="button" id="button"  onclick="coreinfo_audit()"value="通过审核" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="返  回">
        </td>

</tr>
</table>
</div>
</body>

</html>

