<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "gender":
            $routerGender = new RouterGender();
            return json_encode($routerGender->route());
            break;
         case "lounge":
            $routerLounge = new RouterLounge();
            return json_encode($routerLounge->route());
            break;
         case "membership":
            $routerMembership = new RouterMembership();
            return json_encode($routerMembership->route());
            break;
         case "message":
            $routerMessage = new RouterMessage();
            return json_encode($routerMessage->route());
            break;
         case "passworduser":
            $routerPasswordUser = new RouterPasswordUser();
            return json_encode($routerPasswordUser->route());
            break;
         case "typelounge":
            $routerTypeLounge = new RouterTypeLounge();
            return json_encode($routerTypeLounge->route());
            break;
         case "useraccount":
            $routerUserAccount = new RouterUserAccount();
            return json_encode($routerUserAccount->route());
            break;
         default:
            $routerEspeficias = new RouterFuncionalidadesEspecificas();
            return $routerEspeficias->route();
            break;
      }
   }
}
