<?php

if(isset($_REQUEST['Cancelar'])){
    
    $_SESSION['paginaEnCurso'] = $controladores['login']; 
    header('Location: index.php');
    exit;
}


define("OBLIGATORIO", 1); 

$entradaOK = true;

$aErrores = [ 
    'CodUsuario' => null,
    'DescUsuario' => null,
    'Password' => null,
    'PasswordConfirmacion' => null
];


if (isset($_REQUEST["Registrarse"])) { 
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['CodUsuario'], 15, 3, OBLIGATORIO); 

    if($aErrores['CodUsuario']==null && UsuarioPDO::validarCodNoExiste($_REQUEST['CodUsuario'])==false){ 
        $aErrores['CodUsuario']="El nombre de usuario ya existe";
    }

    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO);
    
    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);
    $aErrores['PasswordConfirmacion'] = validacionFormularios::validarPassword($_REQUEST['PasswordConfirmacion'], 8, 1, 1, OBLIGATORIO);
    if($_REQUEST['Password'] != $_REQUEST['PasswordConfirmacion']){
        $aErrores['PasswordConfirmacion'] = "Las contraseñas no coinciden";
    }
    
    foreach ($aErrores as $campo => $error) {
        if ($error != null) { 
            $entradaOK = false; 
            $_REQUEST[$campo] = "";
        }
    }
} else { 
    $entradaOK = false; 
}

if ($entradaOK) {

    $oUsuario = UsuarioPDO::altaUsuario($_REQUEST['CodUsuario'],$_REQUEST['Password'],$_REQUEST['DescUsuario']);
    $_SESSION['usuarioDAW204LoginLogoffMulticapaPOO'] = $oUsuario; 
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; 

    header('Location: index.php');
    exit;

}

$vistaEnCurso = $vistas['registro'];

require_once $vistas['layout'];
