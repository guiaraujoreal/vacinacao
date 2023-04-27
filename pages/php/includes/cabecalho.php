<link rel="stylesheet" type="text/css" href="../../../styles/cabecalho_e_rodape.css" media="screen" />
<div id="cabecalho">    
    <img src="../../../icons/logo.png" class="logotipo">
    <img src="../../../icons/text_logo.png" class="texto_logo">
    <div id="user_menu">
            <h1 class="user"> <?php user_cabec() ?> </h1>
        <h2 class="category_a">
        <?php
        categoria_user();
        if(categoria_user() == 0){
            $cat = 'Administrador';
            }
        else{
            $cat = 'Cliente';
            }
        echo $cat;
        ?>
        </h2> 
    </div>
    <button id="botao_logout" onclick="window.location.href='../index.php'">
        <div class="text">
            <span>Log</span>
            <span>Out</span>
        </div>
        <div class="clone">
            <span>Log</span>
            <span>Out</span>
        </div>
        <svg width="20px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
             <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
        </svg>
    </button>
</div>