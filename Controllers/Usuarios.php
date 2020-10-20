<?php
    class Usuarios extends Controllers{
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['login']))
            {
                header('Location: '.base_url().'/login');               
            }
            
            parent::__construct();
        }

        public function usuarios(){
            $data['page_tag'] = "Usuarios";
            $data['page_title'] = "USUARIOS <small>Tienda Virtual</small>";
            $data['page_name'] = "usuarios";
            $data['page_function_js'] = "function_usuarios.js";
            $this->views->getView($this, "usuarios", $data);
        }

        // Crear Usuario
        public function setUsuario(){
            if ($_POST) {


                if ( empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus']) )
                {
                    $arrResponde = array('status' => false, 'msg' => "Datos incorrectos.")    ;
                }else {
                    $idUsuario         = intval($_POST['idUsuario']);
                    //Para países en donde el documento lleva letras -> usar strClean() en vez de intval() en $strIdentificacion
                    $strIdentificacion = intval($_POST['txtIdentificacion']); 
                    $strNombre         = ucwords(strClean($_POST['txtNombre']));
                    $strApellido       = ucwords(strClean($_POST['txtApellido']));
                    $intTelefono       = intval(strClean($_POST['txtTelefono']));
                    $strEmail          = strtolower(strClean($_POST['txtEmail']));
                    $intTipoId         = intval(strClean($_POST['listRolid']));
                    $intStatus         = intval(strClean($_POST['listStatus']));

                    if ($idUsuario == 0)
                    {
                        //Crea Nuevo Usuario
                        $option = 1;
                        $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
                        $request_user = $this->model->insertUsuario($strIdentificacion,
                                                                    $strNombre,
                                                                    $strApellido,
                                                                    $intTelefono,
                                                                    $strEmail,
                                                                    $strPassword,
                                                                    $intTipoId,
                                                                    $intStatus);
                    }else {
                        //Actualiza Usuario
                        $option = 2;
                        $strPassword = empty($_POST['txtPassword']) ? "" : hash("SHA256", $_POST['txtPassword']);
                        $request_user = $this->model->updateUsuario($idUsuario,
                                                                    $strIdentificacion,
                                                                    $strNombre,
                                                                    $strApellido,
                                                                    $intTelefono,
                                                                    $strEmail,
                                                                    $strPassword,
                                                                    $intTipoId,
                                                                    $intStatus);
                    }

                    if ($request_user > 0)
                    {
                        if ($option == 1) {
                            $arrResponde = array('status' => true, 'msg' => "Datos guardados correctamente.");                            
                        }else{
                            $arrResponde = array('status' => true, 'msg' => "Datos actualizados correctamente.");
                        }
                    }else if ($request_user == 'exist') {
                        $arrResponde = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existen, ingrese otro.');
                    } else {
                        $arrResponde = array('status' => false, 'msg' => 'No es posible almacenar los datos.');                        
                    }
                }
                echo json_encode($arrResponde, JSON_UNESCAPED_UNICODE);
            }
            die();            
        }

        //LLama al model que extrae los usuarios de la BD
        public function getUsuarios()
        {
            $arrData = $this->model->selectUsuarios();

            for ($i = 0; $i < count($arrData); $i++) {
                
                if ($arrData[$i]['status'] == 1) {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }
                else {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }

                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario('.$arrData[$i]['idpersona'].');" us="'.$arrData[$i]['idpersona'].'" title="Ver usuario"><i class="far fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btnEditUsuario" onClick="fntEditUsuario('.$arrData[$i]['idpersona'].');" us="'.$arrData[$i]['idpersona'].'" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>             
                <button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario('.$arrData[$i]['idpersona'].');" us="'.$arrData[$i]['idpersona'].'" title="Eliminar usuario"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();            
        }

        //
        public function getUsuario(int $idpersona)
        {
            $idusuario = intval($idpersona);
            if ($idusuario > 0)
            {
                $arrData = $this->model->selectUsuario($idusuario);
                if (empty($arrData))
                {
                    $arrResponde = array('status' => false, 'msg' => 'Datos no encontrados.');                    
                }else {
                    $arrResponde = array('status' => true, 'data' => $arrData);                                        
                }
                echo json_encode($arrResponde, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        // Eliminar Usuario
        public function delUsuario()
        {
            if ($_POST)
            {
                $intIdpersona = intval($_POST['idUsuario']);
                $requestDelete = $this->model->deleteUsuario($intIdpersona);
                if ($requestDelete)
                {
                    $arrResponde = array('status' => true, 'msg' => 'Se ha eliminado el usuario.');
                }else {
                    $arrResponde = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
                }
                echo json_encode($arrResponde, JSON_UNESCAPED_UNICODE);
            }
            die();            
        }

        //
        public function perfil()
        {
            $data['page_tag'] = "Perfil";
            $data['page_title'] = "Perfil de usuario";
            $data['page_name'] = "perfil";
            $data['page_function_js'] = "function_usuarios.js";
            $this->views->getView($this, "perfil", $data);
        }
    }
 

 ?>