<?php 

 
class Home extends Controllers{
     public function __construct()
     {
     	parent::__construct();
     }

     public function home($params){
     	$this->views->getView($this, "home");
     }

     public function carrito($params){
     	
     	$carrito = $this->model->getCarrito($params);
     	echo $carrito;
     }
}
 

 ?>