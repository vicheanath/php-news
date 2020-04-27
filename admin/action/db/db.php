<?php
class Database{
	// private $user="vteam";
	// private $pass="ulj2bQTBacS&";
	// private $dbname="vteam_v_report";
	private $cnn;
	private $host="localhost";
	private $user="root";
	private $pass="";
	private $dbname="v_report";
	public $last_id;
	public $tbl=array('tbl_menu','tbl_news','tbl_ads','tbl_user');
	//connection
	private function conn(){
		date_default_timezone_set('Asia/Phnom_Penh');
		$this->cnn = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
		$this->cnn->set_charset("utf8");
	}
	//select_data
	function select_data($tbl,$fld,$con,$od,$limit){
		$this->conn();
		$data=array();
		$sql="SELECT $fld FROM $tbl WHERE $con ORDER BY $od LIMIT $limit";
		$result = $this->cnn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$data[]=$row;
			}
			return $data;
		}else{
			return '0';
		}
	}
	//mulit Select tbl
	function select_inner_join_data($sql){
		$this->conn();
		$result = $this->cnn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_array()){
				$data[]=$row;
			}
			return $data;
		}else{
			return '0';
		}
	}
	//save data
	function save_data($tbl,$val){
		$this->conn();
		$sql="INSERT INTO $tbl VALUES($val)";
		$this->cnn->query($sql);
		$this->last_id = $this->cnn->insert_id;
	}
	///Updeaet DAta
	function upd_data($tbl,$fld,$con){
		$this->conn();
		$sql="UPDATE $tbl SET $fld WHERE $con";
		$this->cnn->query($sql);
	}
	///Duplicate Data 
	function dpl_data($tbl,$fld,$con){
		$this->conn();
		$sql="SELECT $fld FROM $tbl WHERE $con";
		$result=$this->cnn->query($sql);
		$num=$result->num_rows;
		if($num>0){
			return true;
		}
		return false;
	}
	//Get Auto Id
	function get_auto_id($opt,$fld){
		$this->conn();
		$sql="SELECT $fld FROM ".$this->tbl[$opt]." ORDER BY $fld DESC";
		$result=$this->cnn->query($sql);
		$num=$result->num_rows;
		if($num>0){
			$row=$result->fetch_array();
			return $row[0];
		}
		return 0;
	}
	//Get curent Data
	function select_cur_data($tbl,$fld,$con){
		$this->conn();
		$sql="SELECT $fld FROM $tbl WHERE $con";
		$result = $this->cnn->query($sql);
		$row=$result->fetch_array();
		return $row;
	}
	//Get count Data
	function get_count_data($opt){
		$this->conn();
		$sql = "SELECT COUNT(*) AS total FROM ".$this->tbl[$opt];
		$result = $this->cnn->query($sql);
		$row=$result->fetch_array();
		return $row;
	}
	//Get count Data
	function get_count_data2($tbl,$con){
		$this->conn();
		$sql = "SELECT COUNT(*) AS total FROM $tbl WHERE $con";
		$result = $this->cnn->query($sql);
		$num=$result->num_rows;
		$row=$result->fetch_array();
		if($num>0){
			return $row;
		}else{
			return 0;
		}
	}
	//realescap string
		function real_string($str){
			$this->conn();
			return $this->cnn->real_escape_string($str);
		}
		
		public function php_slug($string){
			$slug=trim($string);
			$slug=preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $string);
			return $slug;
		}
		//format data post
		public function get_post_date($time,$date){
			$previousTimeStamp = strtotime($time." ".$date);
			$lastTimeStamp = strtotime(date("Y-m-d h:i:sa"));
			$menos=$lastTimeStamp-$previousTimeStamp;
			$mins=$menos/60;
			if($mins<1){
			$showing= "ទើបបញ្ចូល";
			}
			else{
			$minsfinal=floor($mins);
			$secondsfinal=$menos-($minsfinal*60);
			$hours=$minsfinal/60;
			if($hours<1){
			$showing= $minsfinal . " នាទីមុន";
			}
			else{
			$hoursfinal=floor($hours);
			$minssuperfinal=$minsfinal-($hoursfinal*60);
			$days=$hoursfinal/24;
			if($days<1){
			$showing= $hoursfinal . " ម៉ោងមុន";
			}
			else if($days<2)
			{
			$showing=" ម្សិលមិញ ម៉ោង ".$time;
			}
			else{
			$d=date("d",strtotime($date));
			$m=date("m",strtotime($date));
			$y=date("Y",strtotime($date));
			if($m==1)
			{
				$m='មករា';
			}
			else if($m==2)
			{
				$m='កុម្ភៈ';			
			}
			else if($m==3)
			{
				$m='មីនា';			
			}
			else if($m==4)
			{
				$m='មេសា';			
			}
			else if($m==5)
			{
			$m='ឧសភា';			
			}
			else if($m==6)
			{
			$m='មិថុនា';			
			}
			else if($m==7)
			{
			$m='កក្តដា';			
			}
			else if($m==8)
			{
			$m='សីហា';			
			}
			else if($m==9)
			{
			$m='កញ្ញា';			
			}
			else if($m==10)
			{
			$m='តុលា';		
			}
			else if($m==11)
			{
			$m='វិច្ឆិកា';			
			}
			else if($m==12)
			{
			$m='ធ្នូ';			
			}

			$showing="ថ្ងែទី ".$d." ខែ ".$m." ឆ្នាំ ".$y ." - ម៉ោង ". $time;
			}}}
			echo $showing;	
		}

}
?>