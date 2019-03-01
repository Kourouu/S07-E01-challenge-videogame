<?php require ('layout/header.php'); ?>

<main class="container">
<div class="jumbotron">
            <h1 class="display-4">Mes jeux vidéos</h1>
            <p class="lead">Voici une petite interface toute simple (grâce à bootstrap) permettant de visualiser les jeux vidéos de ma base de données, mais aussi de les ajouter !</p>
            <div class="row">
                <div class="col-md-3 mt-3">
                <a href=" <?= route('admin'); ?>"><button type="submit" class="btn btn-primary btn-block">Aller à la page admin</button></a>
                </div>
            </div>
        </div>
        <h1></h1>
        <div class="row">
            <div class="col-12 col-md-8">
                <a href="<?= route('home'); ?>" class="btn btn-primary">Trier par nom</a>&nbsp;
                <a href="<?= route('home'); ?>" class="btn btn-info">Trier par éditeur</a>&nbsp;
                <!-- TODO #2 (optionnel) n'afficher ce bouton que s'il y a un tri -->
                <!-- --- START OF YOUR CODE --- -->
                <a href="<?= route('home'); ?>" class="btn btn-dark">Annuler le tri</a><br>
                <!-- --- END OF YOUR CODE --- -->
                <br>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">&Eacute;diteur</th>
                        <th scope="col">Date de sortie</th>
                        <th scope="col">Console / Support</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- TODO #1 boucler sur le tableau $videogameList contenant tous les jeux vidéos
                    (et donc supprimer ces 2 lignes d'exemple) -->
                    <!-- --- START OF YOUR CODE --- -->
                    <!-- --- END OF YOUR CODE --- -->
                </tbody>
                </table>
    </div>
    </div>
</main> 
<?php require ('layout/footer.php'); ?>
