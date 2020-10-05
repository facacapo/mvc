<?php 

 
class Home extends Controllers{
     public function __construct()
     {
     	parent::__construct();
     }

     public function home(){
          $data['tag_page'] = "Home";
          $data['page_title'] = "Página principal";
          $data['page_name'] = "home";
     	$this->views->getView($this, "home", $data);
     }

     public function carrito($params){
     	
     	$carrito = $this->model->getCarrito($params);
     	echo $carrito;
     }
}
 

 ?>