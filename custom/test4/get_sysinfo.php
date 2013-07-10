<?php
			include("../include/db_mysql.php");
			$sql = "select * from nstc_sysinfo";
    		$result = mysql_query($sql,$conn);
			while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
					//$date_time=$row[0];
					$date=$row['date'];
					$time=$row['time'];
					$cpu_num=$row['cpu_num'];
					$cpu_speed=$row['cpu_speed'];
					$cpu_used=$row['cpu_usage'];
					$mem_total_MB=$row['mem_total_MB'];
					$mem_free_MB=$row['mem_size'];
					$mem_used_rate=$row['mem_usage'];
					$swap_total_MB=$row['swap_total_MB'];
					$avg_eth0=$row['net_usage'];
					$disk_total=$row['disk_total'];
					$disk_used=$row['disk_used'];
					$disk_free=$row['disk_free'];
					$disk_used_rate=$row['disk_used_rate'];			
					
				}
				fclose($fd);
        	
        	echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">CPU个数</span></div></td>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">CPU主频</span></div></td>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">CPU利用率</span></div></td>
                   
                </tr>";
        	echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$cpu_num."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$cpu_speed."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$cpu_used."</td>";
			echo"</tr>";
			echo "</table>";
			
			echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" style='margin-top:20px;'>
                <tr>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">总内存</span></div></td>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">空闲内存</span></div></td>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">内存利用率</span></div></td>
                     <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">总交换分区</span></div></td>
                   
                </tr>";
			
        	echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$mem_total_MB."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$mem_free_MB."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$mem_used_rate."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$swap_total_MB."</td>";
			echo"</tr>";
			echo "</table>";
			
			
			echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" style='margin-top:20px;'>
                <tr>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">网络流量速度</span></div></td>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">磁盘总容量(MB)</span></div></td>
                      <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">已使用磁盘容量(MB)</span></div></td>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">磁盘空闲容量(MB)</span></div></td>
                     <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">磁盘利用率</span></div></td>
                   
                </tr>";
        	echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$avg_eth0."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$disk_total."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$disk_used."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$disk_free."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$disk_used_rate."</td>";
			echo"</tr>";
			echo "</table>";
?>