<?php require ('layout/header.php'); ?>
        <div class="row">
            <div class="col-12">
            <a href="?order=name" class="btn btn-primary">Trier par nom</a>&nbsp;
            <a href="?order=editor" class="btn btn-info">Trier par éditeur</a>&nbsp;
            <!-- TODO (optionnel) n'afficher ce bouton que s'il y a un tri -->
            <a href="<?= route('home') ?>" class="btn btn-dark">Annuler le tri</a><br>
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
                <?php foreach ($videogameList as $currentVideogame) : ?>
                <tr>
                    <td><?= $currentVideogame->id ?></td>
                    <td><?= $currentVideogame->name ?></td>
                    <td><?= $currentVideogame->editor ?></td>
                    <td><?= $currentVideogame->release_date ?></td>
                    <td><?= $platformList[$currentVideogame->platform_id] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-3">
                <a href=" <?= route('admin'); ?>"><button type="submit" class="btn btn-primary btn-block">Aller à la page admin</button></a>
            </div>
        </div>
    </main> 
<?php require ('layout/footer.php'); ?>
