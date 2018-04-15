<?php 
	include_once '../core/database.php';
	class m_giaodich extends database
	{
		function add_giaodich($username,$midman_name,$midman_fbid,$midman_fb,$hirer_name,$hirer_fb,$hirer_fbid,$hirer_phone,$service,$price,$note){
			$sql= "INSERT INTO info_giaodich(username,midman_name,midman_fbid,midman_fb,hirer_name,hirer_fb,hirer_fbid,hirer_phone,service,price,note) VALUES('$username','$midman_name','$midman_fbid','$midman_fb','$hirer_name','$hirer_fb','$hirer_fbid','$hirer_phone','$service','$price','$note')";
			$this->setQuery($sql);
			$result = $this->execute();
			return $result;
		}

		function list_all_giaodich_by_user($username){
			$sql = "select * from info_giaodich where username = '$username'";
			$this->setQuery($sql);
	        $result = $this->loadAllRow();
	        return $result;
		}
		function list_giaodich_by_user($tu,$lay,$username){
			$sql = "select * from info_giaodich where username = '$username' limit $tu,$lay";
			$this->setQuery($sql);
	        $result = $this->loadAllRow();
	        return $result;			
		}
		function update_info($username,$midman_name,$midman_fbid,$midman_fb){
			$sql = "update info_mm set fstlogin='1',midman_name='$midman_name',midman_fbid='$midman_fbid',midman_fb='$midman_fb' where username='$username'";
			$this->setQuery($sql);
			$result = $this->execute(array($username));
			return $result;
		}		
		function all_giaodich(){
			$sql = "select * from info_giaodich";
			$this->setQuery($sql);
	        $result = $this->loadAllRow();
	        return $result;
		}
		function list_all_giaodich($tu,$lay){
			$sql = "select * from info_giaodich limit $tu,$lay ";
			$this->setQuery($sql);
	        $result = $this->loadAllRow();
	        return $result;			
		}
		function list_giaodich($tu,$lay,$midman_fbid){
			$sql = "select * from info_giaodich limit $tu,$lay where midman_fbid='$midman_fbid'";
			$this->setQuery($sql);
	        $result = $this->loadAllRow();
	        return $result;			
		}	
		function details_giaodich($id){
			$sql = "select * from info_giaodich where id = '$id'";
			$this->setQuery($sql);
	        $result = $this->loadRow();
	        return $result;
		}			
		function del_giaodich($id){
			$sql= "delete from info_giaodich where id='$id' ";
			$this->setQuery($sql);
			$result = $this->execute(array($fb_id));
			return $result;
		}
	}
?>