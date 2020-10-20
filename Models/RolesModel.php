<?php 

	class RolesModel extends Mysql{
		public $intIdrol;
		public $strRol;
		public $strDescripcion;
		public $intStatus;

		public function __construct()
		{
			// echo 'Mensaje desde el modelo Home';
			parent::__construct();
			
		}

		public function selectRoles()
		{
			// Extrae todos los Roles
			$sql = "SELECT * FROM rol WHERE status != 0";
			$resquest = $this->selectAll($sql);
			return $resquest;
		}
		// Buscar rol
		public function selectRol(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM rol WHERE idrol = $this->intIdrol";
			$resquest = $this->select($sql);
			return $resquest;
		}
		// Crear Rol
		public function insertRol(string $rol, string $descripcion, int $status)
		{
			$return = "";
			$this->strRol          = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus      = $status;

			$sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol}' ";
			$resquest = $this->selectAll($sql);

			if (empty($resquest))
			{
				$query_insert = "INSERT INTO rol(nombrerol, descripcion, status) VALUES(?,?,?)";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$resquest_insert = $this->insert($query_insert, $arrData);
				$return = $resquest_insert;				
			}else {
				$return = "exit";
			}

			return $return;
		}

		//Actualizar Rol
		public function updateRol(int $idrol, string $rol, string $descripcion, int $status)
		{
			$this->intIdrol       = $idrol;
			$this->strRol         = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus      = $status;

			$sql = "SELECT * FROM rol WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
			$resquest = $this->selectAll($sql);

			if (empty($resquest))
			{
				$sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdrol";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$resquest = $this->update($sql, $arrData);
			}else {
				$resquest = "exit";
			}

			return $resquest;
		}

		// Eliminar Rol
		public function deleteRol(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM persona WHERE rolid = $this->intIdrol";
			$resquest = $this->selectAll($sql);
			if (empty($resquest))
			{
				$sql = "UPDATE rol SET status = ? WHERE idrol = $this->intIdrol";
				$arrData = array(0);	
				$resquest = $this->update($sql, $arrData);
				if ($resquest) {
					$resquest = 'ok';
				}else {
					$resquest = 'error';
				}
			}else {
				$resquest = 'exist';
			}
			return $resquest;
		}

		
	}

 ?>