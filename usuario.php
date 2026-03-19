<?php
require_once __DIR__ . '/../../config/conexion.php';

class Usuario {
    private $conn;
    private $tabla = "usuarios";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function registrar($nombre, $email) {
        try {
            $sql = "INSERT INTO {$this->tabla} (nombre, email) VALUES (:nombre, :email)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            if ($e->getCode() == 23505) { // Violación UNIQUE
                return "El correo ya está registrado.";
            }
            return "Error: " . $e->getMessage();
        }
    }
}
?>