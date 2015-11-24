<?php 
	require_once('DB.php');
	/**
	* 
	*/
	class Article
	{
		
		public function __construct(){
			$this->db = new DB;
		}

		public function all(){
			//konektovat ćemo se na nivou klase, tako da nemamo konekciju bez potrebe i stalno otvorenu. construct je dobro mjesto za to, ali poslije ćemo tamo prebaciti
			
			

			$query = 'SELECT * FROM articles'; //ne znam više ni ja ovo napamet :D
			$result = mysqli_query($this->db->connect(), $query);
			
			$articles = array(); //ovo nam treba da ne bude greška ako nema upisano ništa u bazu

			while ($article = mysqli_fetch_assoc($result)) {
			    $articles[] = $article; 
			}

			return $articles;
		}

		public function byCategory($id){
			$query = "SELECT * FROM articles WHERE category_id = $id";
			$result = mysqli_query($this->db->connect(), $query);
			//vidiš čim ovo jednom ponavljamo, znači da to treba biti odvojena funkcija, koju će onda all ili byCategory pozivati na način $this->tafunkcija(). eto malo nadgradnje ako budeš htio kasije
			$articles = array(); //ovo nam treba da ne bude greška ako nema upisano ništa u bazu

			while ($article = mysqli_fetch_assoc($result)) {
			    $articles[] = $article; 
			}

			return $articles;
		}

		public function single($id){
			// hmmmmmmmm, treći put moramo kopirati blok, to ne valjaaaa :D
			// trebamo imati execute neki na kraju ove klase, da se onda odradi konekcija i vrati rezultat. to možeš ti namaštati :)
			$query = "SELECT * FROM articles WHERE id=$id LIMIT 1";
			$result = mysqli_query($this->db->connect(), $query);
			
			$article = mysqli_fetch_assoc($result);
			// var_dump($article);die;
			return $article;
		}
	}