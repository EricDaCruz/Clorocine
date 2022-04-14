    <?php include "cabecalho.php" ?>
    
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
      </nav>

      <div class="row">
          <form action="Controller/insertMovies.php" method="POST" enctype="multipart/form-data">
              <div class="col s6 offset-s3">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Cadastrar Filme</span>
                            <!-- Input Titulo -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title" name="title" type="text" class="validate" required>
                                    <label for="title">Titulo do Filme</label>
                                </div>
                            </div>
                            <!-- Input Sinopse -->
                            <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="sinopse" name="sinopse" class="materialize-textarea"></textarea>
                                        <label for="sinopse">Sinopse</label>
                                    </div>
                            </div>
                            <!-- Input Nota -->
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="nota" name="nota" type="number" step="0.1" min=0 max=10 class="validate" required>
                                    <label for="nota">Nota</label>
                                </div>
                            </div>
                            <!-- Input File -->
                                <div class="row">
                                    <div class="file-field input-field">
                                        <div class="btn purple">
                                            <span>Poster</span>
                                            <input type="file" name="poster_file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" name="poster">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-action">
                            <a class="btn waves-effect waves-light grey" href="?p=galeria">Cancelar</a>
                            <button type="submit" class="waves-effect waves-light btn purple">Confirmar</button>
                        </div>
                    </div>
              </div>
          </form>
      </div>
    
</body>
</html>