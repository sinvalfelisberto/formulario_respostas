<?php
class Database {
    private static $pdo = null;

    public static function getConnection() {
        if (self::$pdo === null) {
            $envPath = __DIR__ . '/../../.env';
            if (!file_exists($envPath)) {
                throw new Exception("Erro Crítico: Arquivo de ambiente não encontrado.");
            }
            $env = parse_ini_file($envPath);
            
            try {
                self::$pdo = new PDO(
                    "mysql:host=" . $env['DB_HOST'] . ";dbname=" . $env['DB_NAME'] . ";charset=utf8",
                    $env['DB_USER'],
                    $env['DB_PASS']
                );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new Exception("Erro de conexão com o banco de dados.");
            }
        }
        return self::$pdo;
    }
}