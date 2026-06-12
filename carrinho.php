<?php
$tituloPagina = "Carrinho - Gungnir Store";
include 'templates/header.php';
?>

<div class="carrinho-container">
    <div class="carrinho-box">
        <button class="fechar" onclick="window.history.back()">✕</button>
        <div class="carrinho-vazio">
            <h2 class="carrinho-titulo">O CARRINHO ESTÁ VAZIO</h2>
            <p>Já tem conta? <a href="login.php">Faça login</a> para finalizar a compra mais rápido.</p>
        </div>
    </div>
</div>

<style>
main {
    display: flex;
    align-items: center;
    justify-content: center;
}
.carrinho-container {
    width: 100%;
    max-width: 420px;
    min-height: calc(100vh - 120px);
    display: flex;
    align-items: center;
    justify-content: center;
}
.carrinho-box {
    background: #fff;
    width: 100%;
    min-height: calc(100vh - 120px);
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 30px;
}
.fechar {
    position: absolute;
    top: 16px;
    right: 16px;
    background: none;
    border: none;
    font-size: 1.2rem;
    color: #333;
    cursor: pointer;
}
.fechar:hover { color: #000; }
.carrinho-vazio { text-align: center; }
.carrinho-titulo {
    font-size: 1rem;
    font-weight: 900;
    letter-spacing: 2px;
    color: #000;
    margin-bottom: 16px;
}
.carrinho-vazio p { font-size: 0.85rem; color: #555; }
.carrinho-vazio a { color: #000; text-decoration: underline; }
</style>

<?php include 'templates/footer.php'; ?>