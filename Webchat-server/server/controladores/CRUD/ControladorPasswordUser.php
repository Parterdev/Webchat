<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/PasswordUser.php');
class ControladorPasswordUser extends ControladorBase
{
   function crear(PasswordUser $passworduser)
   {
      $sql = "INSERT INTO PasswordUser (passwordUserId,passwordAccountUser) VALUES (?,?);";
      $parametros = array($passworduser->passwordUserId,$passworduser->passwordAccountUser);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(PasswordUser $passworduser)
   {
      $parametros = array($passworduser->passwordUserId,$passworduser->passwordAccountUser,$passworduser->id);
      $sql = "UPDATE PasswordUser SET passwordUserId = ?,passwordAccountUser = ? WHERE id = ?;";
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
      $sql = "DELETE FROM PasswordUser WHERE id = ?;";
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
         $sql = "SELECT * FROM PasswordUser;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM PasswordUser WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM PasswordUser LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM PasswordUser;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM PasswordUser WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM PasswordUser WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM PasswordUser WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM PasswordUser WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}