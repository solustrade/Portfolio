<?php

class Product {

	private $id;
	private $description;
	private $price;
	private $img;
	private $color;
	private $Obser;
	private $caregory;

	public function __construct($id, $description, $price, $img, $color, $Obser, $category) {
		$this->id = $id;
		$this->description = $description;
		$this->price = $price;
		$this->img = "images/products/" . $img;
		$this->color = $color;
		$this->Obs = $Obser;
		$this->categoria = $category;
	}

	public function __get($attr){
		return $this->$attr;
	}
	
	public static function getProductById($id){
		if(is_numeric($id)){
			$res = mysql_query("SELECT id, descricao, valor, imagem, cor, obs, categoria FROM produtos WHERE id='$id'");
                                    
            while($r = mysql_fetch_array($res)) {
				return new Product($r["id"], $r["descricao"], $r["valor"], $r["imagem"], $r["cor"], $r['obs'], $r['categoria']);
			}
		}
		return null;
	}

	public static function getProductsList(){
		if(is_numeric($id)){
			$res = mysql_query("SELECT id, descricao, valor, imagem, cor, obs, categoria FROM produtos WHERE id='$id'");
                                    
            while($r = mysql_fetch_array($res)) {
				return new Product($r["id"], $r["descricao"], $r["valor"], $r["imagem"], $r["cor"], $r["obs"], $r['categoria']);
			}
		}
				
		
		/*$db = new DB();
		$res = $db->query("SELECT id, description, price, image, color, additional_info FROM products;");
		if($res instanceof SQLite3Result){
			$list = array();
			while($r = $res->fetchArray(SQLITE3_ASSOC)){
				$prd = new Product($r["id"], $r["description"], $r["price"], $r["image"], $r["color"], $r["additional_info"]);
				$list[] = $prd;
			}
			return $list;
		}*/
		return null;
	}

}
