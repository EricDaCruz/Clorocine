<?php include "cabecalho.php" ?>

<?php
session_start();
//estabelecer conversa com a class Categoria
require 'Model\Filmes.php';
require 'Model\Message.php';

$fil = new Filmes();
$filmes = $fil->consultar();

?>
   <body>
      <nav class="nav-extended purple lighten-3">
         <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
            <li><a href="?p=galeria">Galeria</a></li>
               <li><a href="?p=cadastrar">Cadastrar</a></li>
            </ul>
         </div>
         <div class="nav-header center">
               <h1>Clorocine</h1>
         </div>
         <div class="nav-content">
            <ul class="tabs tabs-transparent purple darken-1">
               <li class="tab"><a class="active" href="?p=galeria">Todos</a></li>
               <li class="tab"><a href="?p=assistidos">Assistidos</a></li>
               <li class="tab"><a href="?p=favoritos">Favoritos</a></li>
            </ul>
         </div>
      </nav>

      <div class="container">
         <div class="row">
            <?php foreach ($filmes as $filme) {?>
               <a href="?p=details&id=<?= $filme['id']?>">
                  <div class="col s12 m6 l4">
                     <div class="card hoverable" >
                        <div class="card-image">
                           <img src="<?= $filme['poster'] ?>">
                           <a class="btn-floating halfway-fab waves-effect waves-light purple"><i class="material-icons">favorite_border</i></a>
                        </div>
                        <div class="card-content">
                           <p class="valign-wrapper">
                              <i class="material-icons amber-text">star</i> <?= $filme['nota'] ?>
                           </p>
                           <span class="card-title"><?= $filme['title'] ?></span>
                        </div>
                     </div>
                  </div>
               </a>
            <?php } ?>
         </div>
      </div>
      <?= Message::show(); ?>
      
   </body>
</html>
