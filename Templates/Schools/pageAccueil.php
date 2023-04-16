<h1>Page d'accueil</h1>
<?php if (isset($_SESSION["user"])) : ?><a href="createSchool">Ajouter une école</a><?php endif ?>
<div class="flexible wrap justify-content-center">
    <?php foreach ($schools as $school) : ?>
        <div class="bordure center blocAffichage">
            <h2><?= $school->schoolNom ?></h2>
            <img src="<?= $school->schoolImage ?>" alt="Photo de l'école">
            <p><span><?= $school->schoolAdresse ?> - </span><span><?= $school->schoolVille ?></span></p>
            <p><?= $school->schoolNumero ?></p>
        </div>
    <?php endforeach ?>
</div>