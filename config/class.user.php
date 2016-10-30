<?php
   include "db_connect.php";
    include "db_confg.php";
   
   	class User{
   
   		public $db;
   
   		public function __construct(){
   			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
   
   			
   		}
   
 
   
   		/*** for login process ***/
   		public function check_login($emailusername, $password){
   
           	$password = md5($password);
            
            $sqlemp = "SELECT employee_type from users1 WHERE uemail='$emailusername' or uname='$emailusername'";
           
                $employee_type = mysqli_query($this->db,$sqlemp);
                $emp = mysqli_fetch_array($employee_type);
                $type= $emp[0];
           
   			$sql2="SELECT uid from users1 WHERE uemail='$emailusername' or uname='$emailusername' and upass='$password'";
   
   			//checking if the username is available in the table
           	$result = mysqli_query($this->db,$sql2);
           	$user_data = mysqli_fetch_array($result);
           	$count_row = $result->num_rows;
   
   	        if ($count_row == 1) {
   	            // this login var will use for the session thing
   	            $_SESSION['login'] = true;
   	            $_SESSION['uid'] = $user_data['uid'];
                
            
   	            return $type;
   	            } 
            
   	        else{
   			    return false;
   			}
       	}
   
        
        	/*** to identify separate employee type ***/
     
        
        
        
       	/*** for showing the username or fullname ***/
       	public function get_fullname($uid){
       		$sql3="SELECT fullname FROM users1 WHERE uid = $uid";
   	        $result = mysqli_query($this->db,$sql3);
   	        $user_data = mysqli_fetch_array($result);
   	        return $user_data['fullname'];
       	}
   
       	/*** starting the session ***/
   	    public function get_session(){
   	        return $_SESSION['login'];
   	    }
   
   	    public function user_logout() {
   	        $_SESSION['login'] = FALSE;
   	        session_destroy();
   	    }
   
   	}
   	
   
   ?>