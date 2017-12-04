<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Membership.php');
class ControladorMembership extends ControladorBase
{
   function crear(Membership $membership)
   {
      $sql = "INSERT INTO Membership (membershipId,userAccountId,loungeId,dateInitial,dateFinal) VALUES (?,?,?,?,?);";
      $parametros = array($membership->membershipId,$membership->userAccountId,$membership->loungeId,$membership->dateInitial,$membership->dateFinal);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Membership $membership)
   {
      $parametros = array($membership->membershipId,$membership->userAccountId,$membership->loungeId,$membership->dateInitial,$membership->dateFinal,$membership->id);
      $sql = "UPDATE Membership SET membershipId = ?,userAccountId = ?,loungeId = ?,dateInitial = ?,dateFinal = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Membership WHERE id = ?;";
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
         $sql = "SELECT * FROM Membership;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Membership WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Membership LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Membership;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Membership WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Membership WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Membership WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Membership WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}