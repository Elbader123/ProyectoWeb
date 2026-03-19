<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function registrar($nombre, $email) {
        if (empty($nombre) || empty($email)) {
            return "Por favor completa todos los campos.";
        }
        return $this->usuario->registrar($nombre, $email);
    }
}
?>