<h1>Ajouter une école</h1>
<form method="post" action="">
    <fieldset>
        <legend>Ajouter une école</legend>
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" placeholder="Nom" class="form-control" id="Nom" name="nom" value="">
            <?php if (isset($messageError["nom"])) : ?><small><?= $messageError["nom"] ?></small><?php endif ?>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" placeholder="Adresse" class="form-control" id="adresse" name="adresse" value="">
            <?php if (isset($messageError["adresse"])) : ?><small><?= $messageError["adresse"] ?></small><?php endif ?>
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">ville</label>
            <input type="text" placeholder="Ville" class="form-control" id="ville" name="ville" value="">
            <?php if (isset($messageError["ville"])) : ?><small><?= $messageError["ville"] ?></small><?php endif ?>
        </div>
        <div class="mb-3">
            <label for="codePostal" class="form-label">Code postal</label>
            <input type="text" placeholder="Code postal" class="form-control" id="codePostal" name="code_postal" value="">
            <?php if (isset($messageError["code_postal"])) : ?><small><?= str_replace("_", " ", $messageError["code_postal"]) ?></small><?php endif ?>
        </div>
        <div class="mb-3">
            <label for="numeroTel" class="form-label">Numéro de téléphone</label>
            <input type="text" placeholder="Numéro de téléphone" class="form-control" id="numeroTel" name="numero_telephone" value="">
            <?php if (isset($messageError["numero_telephone"])) : ?><small><?= str_replace("_", " ", $messageError["numero_telephone"]) ?></small><?php endif ?>
        </div>
        <div class="mb-3">
            <label for="options" class="form-label">Options de l'école</label>
            <select name="options" id="options" multiple required>
                <?php foreach ($optionsScolaire as $optionScolaire) : ?>
                    <option value="<?= $optionScolaire->nom ?>"><?= $optionScolaire->nom ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" placeholder="Image" class="form-control" id="image" name="image" value="">
            <?php if (isset($messageError["image"])) : ?><small><?= $messageError["image"] ?></small><?php endif ?>
        </div>
        <div>
            <button name="btnEnvoi" class="btn btn-primary" value="envoyer">Ajouter</button>
        </div>
    </fieldset>
</form>