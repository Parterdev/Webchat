<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/UserAccount.php');
class ControladorUserAccount extends ControladorBase
{
   function crear(UserAccount $useraccount)
   {
      $sql = "INSERT INTO UserAccount (userAccountId,userName,passwordUserId,emailUser,firstName,lastName,genderId) VALUES (?,?,?,?,?,?,?);";
      $parametros = array($useraccount->userAccountId,$useraccount->userName,$useraccount->passwordUserId,$useraccount->emailUser,$useraccount->firstName,$useraccount->lastName,$useraccount->genderId);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(UserAccount $useraccount)
   {
      $parametros = array($useraccount->userAccountId,$useraccount->userName,$useraccount->passwordUserId,$useraccount->emailUser,$useraccount->firstName,$useraccount->lastName,$useraccount->genderId,$useraccount->id);
      $sql = "UPDATE UserAccount SET userAccountId = ?,userName = ?,passwordUserId = ?,emailUser = ?,firstName = ?,lastName = ?,genderId = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM UserAccount WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM UserAccount;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM UserAccount WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM UserAccount LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM UserAccount;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM UserAccount WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM UserAccount WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM UserAccount WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM UserAccount WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}