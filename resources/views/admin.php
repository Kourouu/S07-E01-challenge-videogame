<?php require ('layout/header.php'); ?>
  <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Ajout
                </div>
                <div class="card-body">
                <?php if (!empty($errorList)) : ?>
                <div class="alert alert-danger">
                    <?php foreach ($errorList as $currentError) : ?>
                    <div><?= $currentError ?></div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
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
                            <option value="0">-</option>
                            <?php foreach ($platformList as $currentPlatformModel) : ?>
                            <option value="<?= $currentPlatformModel->id ?>"><?= $currentPlatformModel->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                            <button type="submit" class="btn btn-success btn-block">Ajouter
                            </button>
                    </form>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <a href="<?= route('home'); ?>"><button type="submit" class="btn btn-primary btn-block">Retour page accueil</button></a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    </div>
    </main>
<?php require ('layout/footer.php'); ?>
