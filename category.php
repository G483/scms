<?php 

/**
* 
*/
class Category 
{
	
	public function all(){
			//konektovat ćemo se na nivou klase, tako da nemamo konekciju bez potrebe i stalno otvorenu. construct je dobro mjesto za to, ali poslije ćemo tamo prebaciti
			$db = new DB;
			

			$query = 'SELECT * FROM categories'; //ne znam više ni ja ovo napamet :D
			$result = mysqli_query($db->connect(), $query);
			
			$categories = array(); //ovo nam treba da ne bude greška ako nema upisano ništa u bazu

			while ($category = mysqli_fetch_assoc($result)) {
			    $categories[] = $category; 
			}

			return $categories;
		}
	
}