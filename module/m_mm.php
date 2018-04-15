<?php 
	include_once '../core/database.php';
	class m_mm extends database
	{
		function add_user($username,$cryptedpassword,$salt){
			$sql= "INSERT INTO info_mm(username,password,salt,role,fstlogin) VALUES('$username','$cryptedpassword','$salt','Middle Man','0')";
			$this->setQuery($sql);
			$result = $this->execute();
			return $result;
		}

		function user_info($username){
			$sql = "select * from info_mm where username = '$username'";
			$this->setQuery($sql);
	        $result = $this->loadRow();
	        return $result;
		}
		function update_info($username,$midman_name,$midman_fbid,$midman_fb){
			$sql = "update info_mm set fstlogin='1',midman_name='$midman_name',midman_fbid='$midman_fbid',midman_fb='$midman_fb' where username='$username'";
			$this->setQuery($sql);
			$result = $this->execute(array($username));
			return $result;
		}		
		function xephang(){
			$sql = "select fullname,point from tt_user group by point desc limit 10";
			$this->setQuery($sql);
	        $result = $this->loadAllRow();
	        return $result;
		}
		function all_user(){
			$sql = "select * from tt_user";
			$this->setQuery($sql);
	        $result = $this->loadAllRow();
	        return $result;
		}
		function list_user($tu,$lay){
			$sql = "select * from tt_user limit $tu,$lay ";
			$this->setQuery($sql);
	        $result = $this->loadAllRow();
	        return $result;			
		}
		function xoa_user($fb_id){
			$sql= "delete from tt_user where fb_id='$fb_id' ";
			$this->setQuery($sql);
			$result = $this->execute(array($fb_id));
			return $result;
		}
		function user_by_id($fb_id){
			$sql = "select * from tt_user where fb_id='$fb_id' ";
			$this->setQuery($sql);
	        $result = $this->loadRow();
	        return $result;		
		}
		function nap_them($point,$fb_id){
			$sql = "update tt_user set point='$point' where fb_id='$fb_id'";
			$this->setQuery($sql);
			$result = $this->execute(array($point,$fb_id));
			return $result;
		}
	}
?>