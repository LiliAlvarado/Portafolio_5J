<?php
    class usuario{
        //atributos

        //métodos
        public function Autenticarusuario($correo,$password){
            include '../conexion.php'; //include es para agregar a ese archivo las referencias de este nuevo archivo
            $conectar= new conexion();
            $consulta=$conectar->prepare("SELECT * FROM usuarios
            WHERE CorreoElectronico=:correo AND Password=:password");
            $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
            $consulta->bindParam(":password",$password,PDO::PARAM_STR);
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();
        }
        public function InsertarUsuario($nombreCompleto,$correo,$password,$tipo){
            include '../conexion.php'; 
            $conectar= new conexion();
            $consulta=$conectar->prepare("INSERT INTO
            usuarios(NombreCompleto,CorreoElectronico,Password,Tipo,FechaRegistro) 
            VALUES(:nombreCompleto,:correo,:password,:tipo,NOW())");
            $consulta->bindParam(":nombreCompleto",$nombreCompleto,PDO::PARAM_STR);
            $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
            $consulta->bindParam(":password",$password,PDO::PARAM_STR);
            $consulta->bindParam(":tipo",$tipo,PDO::PARAM_STR);
            $consulta->execute();
            return true;
        }
        public function ModificarUsuario($nombreCompleto,$correo,$password,$tipo){
            include '../conexion.php'; 
            $conectar= new conexion();
            $consulta=$conectar->prepare("UPDATE
            usuarios SET NombreCompleto=:nombreCompleto,Correo=:correo
            WHERE Id=:id");
            $consulta->bindParam(":nombreCompleto",$nombreCompleto,PDO::PARAM_STR);
            $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
            $consulta->bindParam(":Id",$id,PDO::PARAM_STR);
            $consulta->execute();
            return true;
        }
    }
?>