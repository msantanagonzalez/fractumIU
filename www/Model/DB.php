<?php
$online = 0;
if($online == 1){
	function connectBD(){
        mysql_connect("db590367337.db.1and1.com","dbo590367337","Fractum");
				mysql_select_db("db590367337");
	}
}else{
	function connectBD(){
        mysql_connect("localhost","AdminFractum","Fractum");
				mysql_select_db("FractumDB");
	}
}
?>
