<?php

/**
 * Modelo del modulo Core que se encarga de  enviar todos los correos nesesarios del sistema.
 */
class Core_Model_Sendingemail
{
  /**
   * Intancia de la calse emmail
   * @var class
   */
  protected $email;

  protected $_view;

  public function __construct($view)
  {
    $this->email = new Core_Model_Mail();
    $this->_view = $view;
  }


  public function forgotpassword($user)
  {
    if ($user) {
      $code = [];
      $code['user'] = $user->user_id;
      $code['code'] = $user->code;
      $codeEmail = base64_encode(json_encode($code));
      $this->_view->url = "http://" . $_SERVER['HTTP_HOST'] . "/administracion/index/changepassword?code=" . $codeEmail;
      $this->_view->host = "http://" . $_SERVER['HTTP_HOST'] . "/";
      $this->_view->nombre = $user->user_names . " " . $user->user_lastnames;
      $this->_view->usuario = $user->user_user;
      /*fin parametros de la vista */
      //$this->email->getMail()->setFrom("desarrollo4@omegawebsystems.com","Intranet Coopcafam");
      $this->email->getMail()->addAddress($user->user_email,  $user->user_names . " " . $user->user_lastnames);
      $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/forgotpassword.php');
      $this->email->getMail()->Subject = "Recuperación de Contraseña Gestor de Contenidos";
      $this->email->getMail()->msgHTML($content);
      $this->email->getMail()->AltBody = $content;
      if ($this->email->sed() == true) {
        return true;
      } else {
        return false;
      }
    }
  }


  public function sendMailContact($data)
  {
    $this->_view->data = $data;
    $infopageModel = new Page_Model_DbTable_Informacion();
    $informacion = $infopageModel->getById(1);
    $correo = $informacion->info_pagina_correos_contacto;


    $this->email->getMail()->addBCC($correo, "Formulario de contacto Filsa Water");
    $this->email->getMail()->addBCC("desarrollo8@omegawebsystems.com", "Formulario de contacto Filsa Water");
    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/mailHome.php');
    $this->email->getMail()->Subject = 'Formulario de contacto Filsa Water';

    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;

    if ($this->email->sed() == true) {
      return 1;
    } else {
      return 2;
    }
  }

  public function enviardatos($data)
  {
    $this->_view->data = $data;
    $infopageModel = new Page_Model_DbTable_Informacion();
    $informacion = $infopageModel->getById(1);
    $correo = $informacion->info_pagina_correos_contacto;
    $correo2 = $informacion->info_pagina_correo_oculto;


    // $this->email->getMail()->addAddress($correo);
    $this->email->getMail()->addBCC($correo);
    // $this->email->getMail()->addAddress("desarrollo8@omegawebsystems.com");
    $this->email->getMail()->addBCC("desarrollo8@omegawebsystems.com", "Formulario de registro Filsa Water");
    //$this->email->getMail()->addCC("desarrollo8@omegawebsystems.com", "Formulario de registro Filsa Water");
    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/envioSolicitudRegistro.php');
    $this->email->getMail()->Subject = 'Formulario de registro Filsa Water';
    //$this->email->getMail()->setFrom($data['email'], $data['company']);


    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    //$this->email->getMail()->addBCC($informacion->info_pagina_correo_oculto);
    if ($this->email->sed() == true) {
      return 1;
    } else {
      return 2;
    }
  }



  public function registro($data)
  {
    $this->_view->data = $data;
    $infopageModel = new Page_Model_DbTable_Informacion();
    $informacion = $infopageModel->getById(1);
    $correo = $informacion->info_pagina_correos_contacto;
    $correo2 = $informacion->info_pagina_correo_oculto;


    // $this->email->getMail()->addAddress($correo);
    $this->email->getMail()->addBCC($correo);
    $this->email->getMail()->addAddress($data["user_email"]);
    $this->email->getMail()->addBCC("desarrollo8@omegawebsystems.com");

    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/registro.php');
    $this->email->getMail()->Subject = 'Registro exitoso en FILSA WATER';
    $this->email->getMail()->Timeout = 500;

    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    //$this->email->getMail()->addBCC($informacion->info_pagina_correo_oculto);
   if($this->email->sed()){
    return 1;
   }else{
    return 'Error enviando correo: ' . $this->email->getMail()->ErrorInfo;
   }
  }


  /* No se usa */
  public function enviarrecuperacion($user, $token)
  {
    $this->_view->user = $user;
    $this->_view->token = $token;
    $this->email->getMail()->addAddress($user->user_email, "Recuperación de clave FILSA WATER");
    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/enviarrecuperacion.php');
    $this->email->getMail()->Subject = 'Recuperación de clave FILSA WATER';
    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    // $this->email->getMail()->addBCC($informacion->info_pagina_correo_oculto);
    if ($this->email->sed() == true) {
      return 1;
    } else {
      return 2;
    }
  }

  public function enviarOTP($user, $code)
  {
    $this->_view->user = $user;
    $this->_view->code = $code;
    $this->email->getMail()->addAddress($user->user_email, $user->user_names);
    $this->email->getMail()->addBCC("desarrollo8@omegawebsystems.com", "Inicio de sesión FILSA WATER");
    //$this->email->getMail()->addBCC("proyectos@omegawebsystems.com", "Registro FEINCOL");

    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/enviarOTP.php');
    $this->email->getMail()->Subject = 'Ingreso FILSA WATER';
    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    if ($this->email->sed() == true) {
      return 1;
    } else {
      return 2;
    }
  }

  public function enviarCorreoTienda($idPedido)
  {
    // Modelos utilizados para manejar datos relacionados con pedidos, productos y usuarios
    $pedidosModel = new Administracion_Model_DbTable_Pedidos();
    $productosModel = new Administracion_Model_DbTable_Productos();
    $productoPedidoModel = new Administracion_Model_DbTable_Productosporpedido();
    $tiendaCategoria = new Administracion_Model_DbTable_Tiendacategorias();
    $municipiosModel = new Administracion_Model_DbTable_Municipios();
    $departamentosModel = new Administracion_Model_DbTable_Departamentos();

    $infopageModel = new Page_Model_DbTable_Informacion();
    $informacion = $infopageModel->getById(1);
    $correo = $informacion->info_pagina_correos_contacto;
    $correo2 = $informacion->info_pagina_correo_oculto;




    // Obtener detalles del pedido por su ID
    $pedido = $pedidosModel->getById($idPedido);
    $pedido->ciudad_nombre = $municipiosModel->getById($pedido->pedido_ciudad)->municipio;
    $pedido->departamento_nombre = $departamentosModel->getById($pedido->pedido_departamento)->departamento;

    // Obtener la lista de productos asociados al pedido
    $productos = $productoPedidoModel->getList("pedido_producto_pedido='{$idPedido}'");

    // Enriquecer información de los productos (categoría e imagen)
    foreach ($productos as $producto) {
      $productoDetalle = $productosModel->getById($producto->pedido_producto_producto);
      $producto->producto_categoriainfo = $tiendaCategoria->getById($productoDetalle->producto_categoria)->tienda_categoria_nombre;
      $producto->producto_imagen = $productoDetalle->producto_imagen;
    }

    // Configurar datos para la vista
    $this->_view->pedido = $pedido;
    $this->_view->productos = $productos;

    // Agregar dirección de correo principal para el cliente
    $this->email->getMail()->addAddress($pedido->pedido_correo, $pedido->pedido_nombre);

    // Determinar estado, asunto y contenido del correo según el estado del pedido
    $estadoInfo = [
      5 =>
      [
        'estado' => 'Aprobado',
        'asunto' => 'Compra Aprobada FILSA WATER',
        'template' => 'correoTienda.php'
      ],
      6 =>
      [
        'estado' => 'Declinado',
        'asunto' => 'Compra Declinada FILSA WATER',
        'template' => 'correoTiendaInfo.php'
      ],
      7 =>
      [
        'estado' => 'Anulado',
        'asunto' => 'Compra Anulada FILSA WATER',
        'template' => 'correoTiendaInfo.php'
      ],
      8 =>
      [
        'estado' => 'Error',
        'asunto' => 'Compra con Error FILSA WATER',
        'template' => 'correoTiendaInfo.php'
      ],
      9 =>
      [
        'estado' => 'Enviado',
        'asunto' => 'Pedido Enviado FILSA WATER',
        'template' => 'correoTiendaEnvio.php'
      ],
      10 =>
      [
        'estado' => 'Entregado',
        'asunto' => 'Pedido Entregado FILSA WATER',
        'template' => 'correoTiendaEntregado.php'
      ]
    ];

    $defaultInfo = ['estado' => 'Pendiente', 'asunto' => 'Compra Pendiente FILSA WATER', 'template' => 'correoTiendaInfo.php'];

    // Buscar información del estado actual o asignar valores predeterminados
    $info = $estadoInfo[$pedido->pedido_estado] ?? $defaultInfo;

    // Generar el contenido del correo utilizando la plantilla correspondiente
    $content = $this->_view->getRoutPHP("/../app/modules/core/Views/templatesemail/" . $info['template']);
    // $this->email->getMail()->addBCC($correo, $info['asunto']);
    $this->email->getMail()->addBCC($correo2, $info['asunto']);
    // Agregar copia oculta (BCC) del correo
    $this->email->getMail()->addBCC("desarrollo8@omegawebsystems.com", $info['asunto']);
    $this->email->getMail()->addBCC("compras@filsawater.com", $info['asunto']);

    // Configurar asunto y contenido del correo
    $this->email->getMail()->Subject = $info['asunto'];
    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;

    //debug


    // Enviar el correo y devolver el resultado
    return $this->email->sed() ? 1 : 2;
  }
}
