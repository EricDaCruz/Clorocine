<?php include "cabecalho.php" ?>
<?php
    require './Model/Filmes.php';

    $id = filter_input(INPUT_GET, 'id');
    $fil = new Filmes();

    $fil->setId($id);
    $filmeDetails = $fil->consultarPorId();
    
    foreach ($filmeDetails as $details) {
        $title = $details['title'];
        $sinopse = $details['sinopse'];
        $poster = $details['poster'];
        $nota = $details['nota'];
    }
    
?>

<body class="purple">    
    <section class="detail">
        <div class="backPage">
            <a href="/Clorocine">
                <i class="medium material-icons">
                    arrow_back
                </i>
            </a>
        </div>
        <div class="contentDetails z-depth-4 ">
            <div class="row">
                <div class="contentPoster col s4">
                    <img class="materialboxed responsive-img" src="<?= $poster?>">
                </div>
                <div class="detailText col s8">
                        <h3><?= $title ?></h3>
                        <div class="nota">
                            <span><?= $nota ?></span>
                        </div>
                        <p class="sinopse"><?= $sinopse ?></p>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    const options = {};
    document.addEventListener('DOMContentLoaded', function() {
    const elems = document.querySelectorAll('.materialboxed');
    const instances = M.Materialbox.init(elems, options);
  });
</script>