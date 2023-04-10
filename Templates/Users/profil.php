<h1>Page profil</h1>
<p><span>Nom : </span><?= $_SESSION["user"]->nomUser ?></p>
<p><span>Prénom : </span><?= $_SESSION["user"]->prenomUser ?></p>
<p><span>Login : </span><?= $_SESSION["user"]->loginUser ?></p>
<p><span>Mot de passe : </span><?= $_SESSION["user"]->passWordUser ?></p>
<a href="updateProfil">Modifier</a>
<a href="deleteProfil">Supprimer</a>