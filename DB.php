<?php 

/**
* 
*/
class DB 
{
	
	protected $charset = 'utf8'; //evo ga fin primjer kako i zašto koristiti protected
	
	public function connect(){
		
		//hardkodirane vrijednosti se mogu smjestiti u config klasu
		$link = mysqli_connect("127.0.0.1", "root", "", "scms_dev");
		mysqli_set_charset ( $link , $this->charset );
		
		if (!$link) {
		    echo "Error: Unable to connect to MySQL." . PHP_EOL;
		    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}

		return $link; //pa vratili smo mu link kad uradimo connect.
	}
}
