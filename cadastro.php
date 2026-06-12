<?php
$tituloPagina = "Cadastro - Gungnir Store";
include 'templates/header.php';
?>

<div class="cadastro-container">
    <h2 class="cadastro-titulo">Criar conta</h2>
    <div class="cadastro-form">
        <div class="campo">
            <label>Nome completo</label>
            <input type="text" id="nome" placeholder="Ex.: João da Silva" oninput="apenasLetras(this)">
        </div>
        <div class="campo">
            <label>E-mail</label>
            <input type="email" placeholder="Ex.: exemplo@mail.com">
        </div>
        <div class="campo">
            <label>Telefone</label>
            <input type="tel" placeholder="Ex.: (44) 99999-9999">
        </div>
        <div class="campo">
            <label>Senha</label>
            <div class="senha-wrapper">
                <input type="password" id="senha" placeholder="Crie uma senha">
                <i class="bi bi-eye-slash" id="toggle-senha" onclick="toggleSenha()"></i>
            </div>
        </div>
        <div class="campo-check">
            <input type="checkbox" id="novidades">
            <label for="novidades">Enviar novidades e ofertas para mim por e-mail</label>
        </div>
        <button class="btn-cadastrar">CRIAR CONTA</button>
        <p class="ja-tem-conta">Já tem uma conta? <a href="login.php">Faça login</a></p>
    </div>
</div>

<style>
main {
    display: flex;
    align-items: center;
    justify-content: center;
}
.cadastro-container {
    max-width: 600px;
    width: 100%;
    padding: 60px 40px;
}
.cadastro-titulo {
    font-size: 1.8rem;
    font-weight: 700;
    text-align: center;
    color: #fff;
    letter-spacing: 1px;
    text-transform: none;
    margin-bottom: 40px;
}
.cadastro-form { display: flex; flex-direction: column; gap: 20px; }
.campo { display: flex; flex-direction: column; gap: 8px; }
.campo label { font-size: 0.95rem; color: #ccc; letter-spacing: 1px; }
.campo input {
    background: #fff;
    border: 1px solid #ddd;
    padding: 16px;
    font-size: 1rem;
    color: #333;
    outline: none;
    border-radius: 2px;
    width: 100%;
}
.campo input:focus { border-color: #999; }
.senha-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}
.senha-wrapper input {
    padding-right: 48px;
    width: 100%;
}
.senha-wrapper .bi {
    position: absolute;
    right: 14px;
    color: #999;
    cursor: pointer;
    font-size: 1.1rem;
    user-select: none;
}
.campo-check {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 4px;
}
.campo-check input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: #8b1a1a;
    flex-shrink: 0;
}
.campo-check label {
    font-size: 0.85rem;
    color: #ccc;
    cursor: pointer;
    letter-spacing: 0.5px;
}
.btn-cadastrar {
    background: #8b1a1a;
    color: #fff;
    border: none;
    padding: 18px;
    font-size: 0.95rem;
    letter-spacing: 3px;
    font-weight: 700;
    cursor: pointer;
    width: 100%;
    transition: opacity 0.2s;
    margin-top: 8px;
}
.btn-cadastrar:hover { opacity: 0.85; }
.ja-tem-conta { text-align: center; font-size: 0.9rem; color: #aaa; margin: 0; }
.ja-tem-conta a { color: #8b1a1a; text-decoration: none; }
.ja-tem-conta a:hover { text-decoration: underline; }
</style>

<script>
function apenasLetras(input) {
    input.value = input.value.replace(/[^a-zA-ZÀ-ÿ\s]/g, '');
}

function toggleSenha() {
    var input = document.getElementById("senha");
    var icon = document.getElementById("toggle-senha");
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    } else {
        input.type = "password";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    }
}
</script>

<?php include 'templates/footer.php'; ?>