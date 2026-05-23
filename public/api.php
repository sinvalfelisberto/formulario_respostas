<?php
require_once __DIR__ . '/../app/Controllers/FormController.php';

// Instancia e executa o processador
$controller = new FormController();
$controller->processar();