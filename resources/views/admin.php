<?php require ('layout/header.php'); ?>
    <main class="container">
        <div class="jumbotron">
            <h1 class="display-4">Mes jeux vidéos</h1>
            <p class="lead">Voici une petite interface toute simple (grâce à bootstrap) permettant de visualiser les jeux vidéos de ma base de données, mais aussi de les ajouter !</p>
            <div class="row">
                <div class="col-md-3 mt-3">
                <a href="<?= route('home'); ?>"><button type="submit" class="btn btn-primary btn-block">Retour page accueil</button></a>
                </div>
            </div>
        </div>
  <div class="row justify-content-center">
              <div class="col-6">
                <div class="card">
                    <div class="card-header">Ajout</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="editor">&Eacute;diteur</label>
                                <input type="text" class="form-control" name="editor" id="editor" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="release_date">Date de sortie</label>
                                <input type="text" class="form-control" name="release_date" id="release_date" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="platform">Console / Support</label>
                                <select class="custom-select" id="platform" name="platform">
                                    <option>-</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
<?php require ('layout/footer.php'); ?>
