<!DOCTYPE html>
<html>
  <head>
    <title>Exemplo de divs horizontais</title>
    <style>
      .div-horizontal {
        display: inline-block;
        width: 20%;
        height: 100px;
        background-color: gray;
        border: 1px solid black;
		color: white; /* muda a cor do texto para branco */
        line-height: 100px; /* centraliza verticalmente o texto */
		text-align: center;
      }
	    .div-horizontal p {
        color: white; /* muda a cor do texto para branco */
        line-height: 100px; /* centraliza verticalmente o texto */
        font-size: 22px; /* define o tamanho da fonte */
      }
    </style>
  </head>
  <body>
    <div class="div-horizontal"><p><a href="clientes.php"> Cadastro dos Clientes </a> </p> </div>
    <div class="div-horizontal"><p>Cadastro dos Pets</p></div>
    <div class="div-horizontal"><p>Cadastro Das Vacinas</p></div>
    <div class="div-horizontal"><p>Relatorios</p></div>
  </body>
</html>