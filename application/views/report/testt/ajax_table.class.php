<?php


require_once('config.php');

class ajax_table {
     
  public function __construct(){
	$this->dbconnect();
  }
   
  private function dbconnect() {
    $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
      or die ("<div style='color:red;'><h3>Could not connect to MySQL server</h3></div>");
         
    mysql_select_db(DB_DB,$conn)
      or die ("<div style='color:red;'><h3>Could not select the indicated database</h3></div>");
     
    return $conn;
  }
   
  function getRecords(){

  	$id=$_COOKIE['valuation_id'];
	$this->res = mysql_query("select * from temp_accessories where session_id = '$id'");
	if(mysql_num_rows($this->res))
		{
			while($this->row = mysql_fetch_assoc($this->res)){
			$record = array_map('stripslashes', $this->row);
			$this->records[] = $record; 
		}
		return $this->records;
	}
	//else echo "No records found";
  }	

  function save($data)
  {
	$sid=$_COOKIE['valuation_id'];
	setcookie('confirm_sid',$sid);
	if(count($data)){
		$values = implode("','", array_values($data));
		$values=$values."','".$sid;
		mysql_query("insert into temp_accessories (".implode(",",array_keys($data)).",session_id) values ('".$values."')");
		
		if(mysql_insert_id())
		 {
		 	return mysql_insert_id();
		 }	
		return 0;
	}
	else return 0;

  }	

  function delete_record($id){
  	// get session_id
  	$sid=$_COOKIE['valuation_id'];
	 if($id){
		mysql_query("delete from temp_accessories where id = '$id' and session_id = '$sid' limit 1");
		return mysql_affected_rows();
	 }
  }	

  function update_record($data){
  	$sid=$_COOKIE['valuation_id'];
  	if(count($data)){
		$id = $data['id'];
		unset($data['id']);
		$values = implode("','", array_values($data));
		$str = "";
		foreach($data as $key=>$val){
			$str .= $key."='".$val."',";
		}
		$str = substr($str,0,-1);
		$sql = "update temp_accessories set $str where id = '$id' and session_id = '$sid' limit 1";

		//$str="name='".$data['name']."',value='".$data['value'];

		//key($data)."='".$data[key($data)]
		//$sql = "update temp_accessories set ".$str."' where id = '$id' and session_id = '$sid' limit 1";
		setcookie("sql",$sql);

		$res = mysql_query($sql);
		
		if(mysql_affected_rows()) return $id;
		return 0;
	}
	else return 0;	
  }	

  function update_column($data){
  	$sid=$_COOKIE['valuation_id'];
	if(count($data)){
		$id = $data['id'];
		unset($data['id']);
		$str="name='".$data['name']."',value='".$data['value'];

		//key($data)."='".$data[key($data)]
		$sql = "update temp_accessories set ".$str."' where id = '$id' and session_id = '$sid' limit 1";
		setcookie("sql",$sql);
		$res = mysql_query($sql);
		if(mysql_affected_rows()) return $id;
		return 0;
		
	}	
  }

  function error($act){
	 return json_encode(array("success" => "0","action" => $act));
  }

}
?>