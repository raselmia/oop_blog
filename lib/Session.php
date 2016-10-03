

<?php




Class Session{


public  static function init(){


	Session_start();

}

public static function set($key,$val){
	$_SESSION[$key]=$val;



}
public static function get($key) {

if (isset($_SESSION[$key])) {
	return $_SESSION[$key];
}else{


	return false;
}

}

public static function checkSession(){


	Self::init();
	if(Self::get('login')==false){


		Self::destroy();
		header("Location:login.php");


	}
}
public static function checkLogin(){


	Self::init();
	if(Self::get('login')==true){

		header("Location:index.php");


	}
}


public static function destroy(){


	session_destroy();
	header("Location:login.php");

   }

}





?>