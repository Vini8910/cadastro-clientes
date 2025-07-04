
<?php
class ClienteData {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('sqlite:../db/banco.sqlite');
        $this->criarTabela();
    }

    private function criarTabela() {
        $sql = "CREATE TABLE IF NOT EXISTS clientes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT,
            cpf_cnpj TEXT,
            tipo TEXT
        )";
        $this->pdo->exec($sql);
    }

    public function salvarCliente($dados) {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (nome, cpf_cnpj, tipo) VALUES (?, ?, ?)");
        $stmt->execute([$dados['nome'], $dados['cpf_cnpj'], $dados['tipo']]);
        return ['mensagem' => 'Cliente salvo com sucesso!'];
    }
}
