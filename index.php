<?php
$tituloPagina = "Loja Virtual";
include 'templates/header.php';
?>

<h2 class="mb-4">Nossos Produtos</h2>

<div class="mb-4">
    <input type="text" id="busca" class="form-control" placeholder="Buscar produto...">
</div>
<div class="mb-4">
    <button class="btn btn-outline-primary me-2" onclick="filtrarPreco(100)">Preço > R$ 100</button>
    <button class="btn btn-outline-secondary" onclick="mostrarTodos()">Mostrar Todos</button>
</div>

<div class="row" id="lista-produtos"></div>
<div id="mensagem" class="alert alert-danger mt-3 d-none"></div>

<script>
const produtos = [
    { nome: "Camiseta", preco: 49.90, estoque: 10 },
    { nome: "Calça Jeans", preco: 120.00, estoque: 5 },
    { nome: "Tênis", preco: 199.90, estoque: 8 },
    { nome: "Boné", preco: 35.00, estoque: 0 },
    { nome: "Jaqueta", preco: 250.00, estoque: 3 },
];

function calcularDesconto(preco, percentual) {
    return preco - (preco * percentual / 100);
}

function calcularFrete(preco) {
    if (preco >= 150) {
        return 0;
    } else {
        return 15.00;
    }
}

function gerarCardProduto(produto) {
    const precoComDesconto = calcularDesconto(produto.preco, 10);
    const frete = calcularFrete(produto.preco);
    const badge = produto.estoque > 0
        ? '<span class="badge bg-success">Em estoque</span>'
        : '<span class="badge bg-danger">Sem estoque</span>';
    const freteTexto = frete === 0
        ? '<p class="text-success small">Frete gratis!</p>'
        : '<p class="text-muted small">Frete: R$ ' + frete.toFixed(2) + '</p>';

    return '<div class="col-md-3 mb-4">'
        + '<div class="card shadow">'
        + '<div class="card-body">'
        + '<h5 class="card-title">' + produto.nome + '</h5>'
        + '<p class="text-success fw-bold">R$ ' + produto.preco.toFixed(2) + '</p>'
        + '<p class="text-muted small">Com 10% desc: R$ ' + precoComDesconto.toFixed(2) + '</p>'
        + freteTexto
        + badge
        + '</div></div></div>';
}

function filtrarPreco(minimo) {
    if (produtos.length === 0) {
        mostrarMensagem("Nenhum produto cadastrado!");
        return;
    }
    if (minimo < 0) {
        mostrarMensagem("Valor invalido para filtro!");
        return;
    }
    var filtrados = produtos.filter(function(p) { return p.preco > minimo; });
    if (filtrados.length === 0) {
        mostrarMensagem("Nenhum produto com preco acima de R$ " + minimo);
    } else {
        esconderMensagem();
        renderizarProdutos(filtrados);
    }
}

function buscarProduto(termo) {
    if (termo.trim() === "") {
        mostrarTodos();
        return;
    }
    var resultado = produtos.filter(function(p) {
        return p.nome.toLowerCase().indexOf(termo.toLowerCase()) !== -1;
    });
    if (resultado.length === 0) {
        mostrarMensagem("Nenhum produto encontrado!");
    } else {
        esconderMensagem();
        renderizarProdutos(resultado);
    }
}

function mostrarTodos() {
    esconderMensagem();
    renderizarProdutos(produtos);
}

function renderizarProdutos(lista) {
    var container = document.getElementById("lista-produtos");
    container.innerHTML = "";
    for (var i = 0; i < lista.length; i++) {
        container.innerHTML += gerarCardProduto(lista[i]);
    }
}

function mostrarMensagem(texto) {
    var msg = document.getElementById("mensagem");
    msg.textContent = texto;
    msg.classList.remove("d-none");
    document.getElementById("lista-produtos").innerHTML = "";
}

function esconderMensagem() {
    document.getElementById("mensagem").classList.add("d-none");
}

document.getElementById("busca").addEventListener("input", function() {
    buscarProduto(this.value);
});

mostrarTodos();
</script>

<?php include 'templates/footer.php'; ?>