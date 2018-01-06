<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Lounge.php');
class ControladorLounge extends ControladorBase
{
   function crear(Lounge $lounge)
   {
      $sql = "INSERT INTO Lounge (loungeId,nameLounge,passwordLounge,typeLoungeId) VALUES (?,?,?,?);";
      $parametros = array($lounge->loungeId,$lounge->nameLounge,$lounge->passwordLounge,$lounge->typeLoungeId);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Lounge $lounge)
   {
      $parametros = array($lounge->loungeId,$lounge->nameLounge,$lounge->passwordLounge,$lounge->typeLoungeId,$lounge->id);
      $sql = "UPDATE Lounge SET loungeId = ?,nameLounge = ?,passwordLounge = ?,typeLoungeId = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Lounge WHERE id = ?;";
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
         $sql = "SELECT * FROM Lounge;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Lounge WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Lounge LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Lounge;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Lounge WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Lounge WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Lounge WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Lounge WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}