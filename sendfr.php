<?php
Session_Start();
if(IsSet($_SESSION["user_id"])) {
$recv_id=$_POST["h1"];
$recv_name=$_POST["h2"];
$frnd_id=$_SESSION["user_id"];
$frnd_name=$_SESSION["name"];



			$res_id=MySQL_Connect('localhost','root','@connectme','shangout');
			if(MySQL_Connect_Errno()) {
				echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
			}
			else {
				$count=MySQL_Query($res_id,"select (max(id)+1) as count from friends");
				$count_id=MySQL_Fetch_Assoc($count);
				if($count_id["count"]) {
				$query="insert into friends values (".$count_id["count"].",'$recv_id','$recv_name',$frnd_id,'$frnd_name',0,0)"; //Query fired in this way>>> insert into friends values(1,1,'Kunal',2,'Tron',0,0);
				}
				else {
				$query="insert into friends values (1,'$recv_id','$recv_name',$frnd_id,'$frnd_name',0,0)";
				}
				$res=MySQL_Query($res_id,$query);
				
				if($res) {
			     echo "Successful!";
				}
			else {
				 echo "Failed!";
			}
				MySQL_Close($res_id);
			}

}
					
					if(IsSet($_SESSION['user_id'])) {
						Header("Location: friends.php");
						}
					else {
						Header("Location: home.php");
					}
?>

