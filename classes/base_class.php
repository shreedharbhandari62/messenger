<?php

/**
 * 
 */
class base_class extends db{

	private $Query;

	public function Normal_Query($query, $param = null){

		if (is_null($param)) {
			$this->Query = $this->con->prepare($query);
			return $this->Query->execute();
		}else{
			$this->Query = $this->con->prepare($query);
			return $this->Query->execute($param);
		}

		
	}

	public function Count_Rows(){
		return $this->Query->rowCount();
		
	}

	public function Fetch_All(){
		return $this->Query->fetchAll(PDO::FETCH_OBJ);
		
	}
	
	public function security($data)	{
		return trim(strip_tags($data));
	}
	
	public function Create_Session($session_name, $session_value){
		$_SESSION[$session_name] = $session_value;

	}

	public function Single_Result() {
 		return $this->Query->fetch(PDO::FETCH_OBJ);
	}

	public function time_ago($db_msg_time) {


		// php.net/manual/en/timezones.asia.php

		date_default_timezone_set("Asia/Kathmandu");
		
		//converts in second format
		$db_time = strtotime($db_msg_time);

		


		// current time in second format
		$current_time = time();

		$seconds = $current_time - $db_time;
		$minutes = floor($seconds/60); //60
		$hours = floor($seconds/3600); //60 * 60
		$days =  floor($seconds/86400); //24 * 60 * 60 
		$weeks = floor($seconds/604800); //7 * 24 * 60 * 60 
		$months = floor($seconds/2592000); //30 * 7 * 24 * 60 * 60
		$years = floor($seconds/31536000); //365 * 30 * 7 * 24 * 60 * 60

		if ($seconds <= 60) {
			return "Just Now";
					
		}elseif ($minutes <= 60) {
			if ($minutes == 1) {
				return "1 minute ago";
			}else {
				return $minutes. " minutes ago";
			} 
			
		}elseif ($hours <= 24) {
			if ($hours == 1) {
				return "1 hour ago";
			}else {
				return $hours. " hours ago";
			} 
			
		}elseif ($days <= 7) {
			if ($days == 1) {
				return "1 day ago";
			}else {
				return $days. " days ago";
			} 
			
		}elseif ($weeks <= 4.3) {
			if ($weeks == 1) {
				return "1 week ago";
			}else {
				return $weeks. " weeks ago";
			} 
			
		}elseif ($months <= 12) {
			if ($months == 1) {
				return "1 month ago";
			}else {
				return $months. " months ago";
			} 
			
		}else {
			if ($years == 1) {
				return "1 year ago";
			}else {
				return $years. " years ago";
			} 
			
		}	

	}
	


}

?>