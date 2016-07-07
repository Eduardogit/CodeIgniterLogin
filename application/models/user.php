<?php
Class User extends CI_Model
{
 function login($usuario, $contrasena)
 {
   $this -> db -> select('id,usuario, contrasena');
   $this -> db -> from('usuarios');
   $this -> db -> where('usuario', $usuario);
   $this -> db -> where('contrasena', MD5($contrasena));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>