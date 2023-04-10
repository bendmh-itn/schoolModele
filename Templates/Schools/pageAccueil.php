<h1>Page d'accueil</h1>
<a href="createSchool">Ajouter une école</a>
<div class="flexible wrap justify-content-center">
    <?php foreach ($schools as $chool) : ?>
        <div class="bordure center blocAffichage">
            <h2><?= $chool->schoolNom ?></h2>
            <img src="<?= $chool->schoolImage ?>" alt="Photo de l'école">
            <p><span><?= $chool->schoolAdresse ?> - </span><span><?= $chool->schoolVille ?></span></p>
            <p><?= $chool->schoolNumero ?></p>
        </div>
    <?php endforeach ?>
</div>