<?php
/**
* 
*/	
	function connectBD(){
        mysql_connect("localhost","AdminFractum","Fractum");
		mysql_select_db("FractumDB");
	}

?>