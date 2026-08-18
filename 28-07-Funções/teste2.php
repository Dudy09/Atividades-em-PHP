<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manual PHP — Estilo Unpacking</title>
<style>
  @page {
    size: A4;
    margin: 10mm 12mm;
    background-color: #F7F3ED;
  }

  *, *::before, *::after {
    box-sizing: border-box;
  }

  :root {
    --bg-main: #F7F3ED;
    --bg-card: #FFFDF9;
    --bg-box-inside: #F0EADF;
    
    --primary: #C87D55;
    --primary-hover: #B56C44;
    --primary-dark: #9E5632;

    --accent-sage: #6E8B74;
    --accent-sage-light: #E3EBE4;
    --accent-pink: #E8B4B8;
    --accent-pink-light: #FBF0F1;
    --accent-yellow: #E6C594;
    --accent-blue: #8EA8C3;

    --text-main: #4A3E3D;
    --text-muted: #8C7B70;
    
    --border-color: #E8DEC9;
    --border-dark: #C4B79B;

    --radius-card: 12px;
    --radius-btn: 8px;
    --shadow-cozy: 0 4px 10px rgba(74, 62, 61, 0.06);
  }

  body {
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    background-color: var(--bg-main);
    color: var(--text-main);
    margin: 0;
    padding: 0;
    font-size: 9.5pt;
    line-height: 1.4;
  }

  /* Header Navbar tipo Unpacking */
  .navbar {
    background-color: var(--primary);
    border-bottom: 4px solid var(--primary-dark);
    padding: 12px 20px;
    border-radius: var(--radius-card);
    color: white;
    margin-bottom: 15px;
  }

  .nav-container {
    display: table;
    width: 100%;
  }

  .nav-logo {
    display: table-cell;
    vertical-align: middle;
    font-size: 16pt;
    font-weight: bold;
    letter-spacing: -0.5px;
  }

  .nav-logo span {
    background: var(--bg-card);
    color: var(--primary-dark);
    padding: 2px 8px;
    border-radius: 6px;
    font-size: 12pt;
    margin-right: 6px;
  }

  .nav-links {
    display: table-cell;
    vertical-align: middle;
    text-align: right;
  }

  .nav-link {
    display: inline-block;
    color: #FFFDF9;
    text-decoration: none;
    font-weight: 600;
    font-size: 9pt;
    margin-left: 12px;
    padding: 4px 10px;
    border-radius: 6px;
    background: rgba(255,255,255,0.15);
  }

  /* Subheader decorativo tipo fita de busca */
  .search-bar-box {
    background-color: var(--bg-card-alt, #F0EADF);
    border: 2px dashed var(--border-dark);
    padding: 8px 12px;
    border-radius: 8px;
    margin-bottom: 18px;
    font-size: 9pt;
    color: var(--text-muted);
  }

  /* Layout principal em duas colunas com tabela para WeasyPrint */
  .layout-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 12px 0;
  }

  .col-main {
    display: table-cell;
    width: 68%;
    vertical-align: top;
  }

  .col-sidebar {
    display: table-cell;
    width: 32%;
    vertical-align: top;
  }

  /* CARD DE CAIXA DE MUDANÇA COM EFEITO DE FITA */
  .box-card {
    position: relative;
    background-color: var(--bg-card);
    border: 2px solid var(--border-color);
    border-bottom: 4px solid var(--border-dark);
    border-radius: var(--radius-card);
    padding: 16px;
    margin-bottom: 20px;
    box-shadow: var(--shadow-cozy);
  }

  /* Fitinha estilo masking tape no topo dos cards */
  .tape-strip {
    position: absolute;
    top: -10px;
    left: 40px;
    width: 80px;
    height: 18px;
    background-color: rgba(230, 197, 148, 0.85);
    border-left: 2px dashed rgba(158, 86, 50, 0.3);
    border-right: 2px dashed rgba(158, 86, 50, 0.3);
    transform: rotate(-1.5deg);
    box-shadow: 0 1px 3px rgba(0,0,0,0.06);
  }

  .tape-strip-right {
    left: auto;
    right: 40px;
    transform: rotate(2deg);
    background-color: rgba(232, 180, 184, 0.75);
  }

  .box-header {
    margin-top: 4px;
    margin-bottom: 12px;
    border-bottom: 2px solid var(--bg-main);
    padding-bottom: 8px;
  }

  .box-title {
    margin: 0;
    font-size: 12pt;
    color: var(--primary-dark);
    font-weight: 700;
  }

  .box-subtitle {
    margin: 2px 0 0 0;
    font-size: 8.5pt;
    color: var(--text-muted);
  }

  /* Lista de Funções como "Itens da Caixa" */
  .func-item {
    background: var(--bg-main);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 10px 12px;
    margin-bottom: 10px;
  }

  .func-name {
    font-family: 'Courier New', monospace;
    font-weight: bold;
    color: var(--primary-dark);
    font-size: 10pt;
  }

  .func-desc {
    font-size: 8.5pt;
    color: var(--text-main);
    margin: 3px 0 6px 0;
  }

  .badge {
    display: inline-block;
    padding: 2px 8px;
    border-radius: 10px;
    font-size: 7.5pt;
    font-weight: bold;
  }

  .badge-string { background-color: var(--accent-pink); color: #5C3236; }
  .badge-array { background-color: var(--accent-sage); color: #1F3824; }
  .badge-date { background-color: var(--accent-yellow); color: #523E1C; }

  /* Bloco de Código Estilizado */
  .code-container {
    background-color: #2D2524;
    color: #F7F3ED;
    padding: 10px 12px;
    border-radius: 6px;
    font-family: 'Courier New', monospace;
    font-size: 8.5pt;
    margin-top: 6px;
    white-space: pre;
    overflow-x: auto;
  }

  .code-keyword { color: #E8B4B8; font-weight: bold; }
  .code-func { color: #E6C594; }
  .code-str { color: #A3C9A8; }

  /* Sidebar Widget: Cômodos / Categorias */
  .sidebar-box {
    background-color: var(--bg-box-inside);
    border: 2px solid var(--border-dark);
    border-radius: var(--radius-card);
    padding: 14px;
    margin-bottom: 15px;
  }

  .sidebar-title {
    font-size: 10.5pt;
    font-weight: bold;
    color: var(--primary-dark);
    margin: 0 0 10px 0;
    border-left: 3px solid var(--primary);
    padding-left: 8px;
  }

  .room-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .room-item {
    padding: 8px 10px;
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 6px;
    margin-bottom: 6px;
    font-weight: 600;
    font-size: 8.5pt;
    color: var(--text-main);
  }

  .room-item span {
    float: right;
    opacity: 0.6;
  }
</style>
</head>
<body>

  <!-- BANNER SUPERIOR (STYLE UNPACKING NAVBAR) -->
  <div class="navbar">
    <div class="nav-container">
      <div class="nav-logo">
        <span>📦 php</span> Unpacking PHP
      </div>
      <div class="nav-links">
        <a href="#" class="nav-link">Quarto (Strings)</a>
        <a href="#" class="nav-link">Cozinha (Arrays)</a>
        <a href="#" class="nav-link">Relógio (Data)</a>
      </div>
    </div>
  </div>

  <!-- BARRA DE PESQUISA ESTILIZADA -->
  <div class="search-bar-box">
    🔍 <b>Procurar na caixa:</b> Digite uma função para desempacotar (ex: <i>explode, array_push, date</i>)...
  </div>

  <!-- LAYOUT EM DUAS COLUNAS -->
  <table class="layout-table">
    <tr>
      <!-- COLUNA PRINCIPAL -->
      <td class="col-main">

        <!-- CARD 1: CAIXA DE STRINGS -->
<!-- Comece aqui -->         
<div class="box-card">
  <div class="tape-strip"></div>
  <div class="box-header">
    <h2 class="box-title">🧦 Caixa #1: Funções de String</h2>
    <p class="box-subtitle">Ferramentas para organizar, cortar e formatar textos recebidos.</p>
  </div>

  <!-- ITEM 1 -->
  <!-- Trocamos a div 'func-item' por 'details' -->
  <details class="func-item">
    <!-- O texto do summary fica sempre visível e serve de botão -->
    <summary class="func-toggle">
      NOME DA FUNÇÃO + BREVE DESCRIÇÃO
    </summary>
    
    <!-- Todo o resto fica aqui dentro e só aparece ao clicar -->
    <div class="func-content">
      <div style="display: table; width: 100%;">
        <div style="display: table-cell;"><span class="func-name">addslashes($string)</span></div>
        <div style="display: table-cell; text-align: right;"><span class="badge badge-string">String</span></div>
      </div>
      <p class="func-desc">Adiciona barras invertidas antes de caracteres especiais para evitar erros de escape.</p>
      <div class="code-container">
        <span class="code-keyword">$texto</span> = <span class="code-str">"O'Reilly"</span>;
        <span class="code-keyword">echo</span> <span class="code-func">addslashes</span>(<span class="code-keyword">$texto</span>); <span class="code-comment">// Saída: O\'Reilly</span>
      </div>
    </div>
  </details>

  <!-- ITEM 2 -->
  <details class="func-item">
    <summary class="func-toggle">
      NOME DA SEGUNDA FUNÇÃO + BREVE DESCRIÇÃO
    </summary>
    
    <div class="func-content">
      <div style="display: table; width: 100%;">
        <div style="display: table-cell;"><span class="func-name">explode($delimiter, $string)</span></div>
        <div style="display: table-cell; text-align: right;"><span class="badge badge-string">String</span></div>
      </div>
      <p class="func-desc">Quebra uma frase em várias partes dentro de um array, como tirar itens da caixa.</p>
      <div class="code-container">
        <span class="code-keyword">$itens</span> = <span class="code-str">"livro,meia,foto"</span>;
        <span class="code-keyword">$caixa</span> = <span class="code-func">explode</span>(<span class="code-str">","</span>, <span class="code-keyword">$itens</span>);
      </div>
    </div>
  </details>
</div>

<style>
/* Estiliza o texto clicável para parecer um parágrafo normal */
.func-toggle {
    cursor: pointer;
    font-weight: bold;
    outline: none;
    padding: 5px 0;
}

/* Espaçamento interno opcional quando o conteúdo abrir */
.func-content {
    padding-top: 10px;
}

/* OPCIONAL: Remove a setinha preta padrão do navegador se você não quiser ela */
/*
.func-toggle {
    list-style: none;
}
.func-toggle::-webkit-details-marker {
    display: none;
}
*/
</style>
 <!-- termine aqui -->

        <!-- CARD 2: CAIXA DE ARRAYS -->
        <div class="box-card">
          <div class="tape-strip tape-strip-right"></div>
          <div class="box-header">
            <h2 class="box-title">📚 Caixa #2: Funções de Array</h2>
            <p class="box-subtitle">Agrupe, ordene e guarde múltiplos dados em suas respectivas prateleiras.</p>
          </div>

          <div class="func-item">
            <div style="display: table; width: 100%;">
              <div style="display: table-cell;"><span class="func-name">array_push(&$array, $values)</span></div>
              <div style="display: table-cell; text-align: right;"><span class="badge badge-array">Array</span></div>
            </div>
            <p class="func-desc">Adiciona um ou mais elementos no final do seu array (como colocar um item novo na caixa).</p>
          </div>

          <div class="func-item">
            <div style="display: table; width: 100%;">
              <div style="display: table-cell;"><span class="func-name">count($array)</span></div>
              <div style="display: table-cell; text-align: right;"><span class="badge badge-array">Array</span></div>
            </div>
            <p class="func-desc">Conta quantos objetos ou dados estão guardados dentro da lista.</p>
          </div>
        </div>

      </td>

      <!-- COLUNA SIDEBAR -->
      <td class="col-sidebar">

        <!-- WIDGET CÔMODOS DO SITE -->
        <div class="sidebar-box">
          <h3 class="sidebar-title">🏡 Cômodos / Seções</h3>
          <ul class="room-list">
            <li class="room-item">🛏️ Quarto (Strings) <span>(12)</span></li>
            <li class="room-item">🍳 Cozinha (Arrays) <span>(8)</span></li>
            <li class="room-item">⏰ Relógio (Data/Hora) <span>(5)</span></li>
            <li class="room-item">🔒 Cofre (Segurança) <span>(4)</span></li>
          </ul>
        </div>

        <!-- WIDGET DICA COZY -->
        <div class="sidebar-box" style="background-color: var(--accent-pink-light); border-color: var(--accent-pink);">
          <h3 class="sidebar-title" style="color: #8C4A50; border-color: #E8B4B8;">💡 Dica de Organização</h3>
          <p style="margin: 0; font-size: 8.5pt; color: #5C3236;">
            Trate seus dados como objetos no <b>Unpacking</b>: filtre antes de exibir e nunca guarde dados sem sanitizar primeiro!
          </p>
        </div>

      </td>
    </tr>
  </table>

</body>
</html>