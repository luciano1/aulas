<?php
// ===== Classe base =====
class Produto {
    private $nome;
    private $preco;
    private $estoque;
    private static $totalCriados = 0; // membro estático (conta quantos objetos foram criados)

    public function __construct($nome, $preco, $estoque = 0) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->estoque = max(0, (int)$estoque);
        self::$totalCriados++;
    }

    // Encapsulamento: setters/getters controlam o acesso aos atributos privados
    public function setNome($nome) {
        $this->nome = trim($nome);
    }
    public function setPreco($preco) {
        if ($preco < 0) {
            throw new InvalidArgumentException("Preço inválido");
        }
        $this->preco = (float)$preco;
    }
    public function getNome()     { return $this->nome; }
    public function getPreco()    { return $this->preco; }
    public function getEstoque()  { return $this->estoque; }

    // Comportamentos do objeto
    public function repor($qtd) {
        $this->estoque += max(0, (int)$qtd);
    }
    public function retirar($qtd) {
        $qtd = max(0, (int)$qtd);
        if ($qtd > $this->estoque) {
            throw new RuntimeException("Estoque insuficiente");
        }
        $this->estoque -= $qtd;
    }
    public function aplicarDesconto($percentual) {
        $percentual = max(0, min(100, (float)$percentual));
        $this->preco -= $this->preco * ($percentual / 100);
    }

    // Método “descritivo” que podemos sobrescrever na herança
    public function descricao() {
        return "{$this->nome} - R$ " . number_format($this->preco, 2, ',', '.') .
               " - Estoque: {$this->estoque}";
    }

    // Método estático (não precisa de objeto para chamar)
    public static function totalCriados() {
        return self::$totalCriados;
    }
}

// ===== Herança + Polimorfismo =====
class ProdutoPerecivel extends Produto {
    private $validade; // DateTime

    public function __construct($nome, $preco, $estoque, $validade) {
        parent::__construct($nome, $preco, $estoque);
        $this->validade = new DateTime($validade);
    }

    public function estaVencido() {
        $hoje = new DateTime('today');
        return $hoje > $this->validade;
    }

    // Polimorfismo: mesmo nome de método, comportamento especializado
    public function descricao() {
        $base = parent::descricao();
        $extra = $this->estaVencido()
            ? " (VENCIDO)"
            : " (Val: " . $this->validade->format('d/m/Y') . ")";
        return $base . $extra;
    }
}

// ===== Demonstração prática =====
$p1 = new Produto("Teclado USB", 99.90, 10);
$p2 = new ProdutoPerecivel("Iogurte Natural", 6.50, 20, '2025-09-20');

$p1->aplicarDesconto(10); // 10% 
$p2->repor(5);            // +5 unidades

echo "<h3>Produtos</h3>";
echo "<p>" . $p1->descricao() . "</p>";
echo "<p>" . $p2->descricao() . "</p>";

echo "<p>Total criados: " . Produto::totalCriados() . "</p>";

// Exemplo de validação/erro (estoque insuficiente)
try {
    $p1->retirar(50);
} catch (Exception $e) {
    echo "<p><b>Erro:</b> " . $e->getMessage() . "</p>";
}
