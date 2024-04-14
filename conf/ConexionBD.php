<?php

// Singleton para conexión a la base de datos
class ConexionBD extends PDO {
    private static $instancia;

    private function __construct() {
        $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
        $user = obtenerVariableDelEntorno("MYSQL_USER");
        $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
        $dsn = 'mysql:host=localhost;dbname=' . $dbName;
        parent::__construct($dsn, $user, $password);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public static function obtenerInstancia() {
        if (!isset(self::$instancia)) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    // Este método devuelve la instancia de la conexión
    public function obtenerConexion() {
        return self::$instancia;
    }
}
