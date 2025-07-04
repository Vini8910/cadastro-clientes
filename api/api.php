
<?php
require_once 'ClienteData.php';

$action = $_POST['action'] ?? '';

$clienteData = new ClienteData();

switch ($action) {
    case 'salvarCliente':
        echo json_encode($clienteData->salvarCliente($_POST));
        break;
    default:
        echo json_encode(['mensagem' => 'Ação inválida']);
}
