<aside>
    <div class="panel panel-info">Modifier les thèmes</div>
    <form action="index.php?uc=administration&action=ajouterTheme" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 col-lg-offset-1">
                <legend>Nouveau Thème</legend>
                <input type="text" name="nomTheme" placeholder="Nom du thème" class="form-control">
                <input type="number" name="dureeTheme" placeholder="Durée en minutes" min="1" max="10" class="form-control">
                <input type="hidden"  name="idTheme" value="<?php echo $id ?>" />
                <button id="ajouter" type="submit" value="Ajouter" class="btn btn-primary">Valider</button>
                <hr>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Durée</th>
                <th>Editer le thème</th>
                <th>Gérer les mots</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                foreach ($lesThemes as $unTheme) {
                    $idTheme = $unTheme['idTheme'];
                    $nomTheme = $unTheme['nomTheme'];
                    $dureeTheme = $unTheme['dureeTheme'];

                    if ($idTheme != $idThemeModif) {
                        ?>
                        <td><?php echo $nomTheme ?></td>
                        <td><?php echo $dureeTheme ?> mins</td>
                        <td><a  href='index.php?uc=administration&action=modifierTheme&idTheme=<?php echo $idTheme ?>'>
                                <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>       
                        <td><a  href='index.php?uc=gererMots&idTheme=<?php echo $idTheme ?>'>
                                <span class='glyphicon glyphicon-cog' aria-hidden='true'></span></a></td>
                        <td><a href="index.php?uc=administration&action=supprimerTheme&idTheme=<?php echo $idTheme ?>"
                               onclick="return confirm('Voulez-vous vraiment supprimer ce thème?');"
                               ><span class='glyphicon glyphicon-trash' aria-hidden='true'/></span></a>
                        </td>
                    </tr>
                    <?php
                } else {
                    ?>  
                <form action="index.php?uc=administration&action=validerModifierTheme" method="post"> 
                    <tr>
                        <td><input type="text" id="nomTheme" name="nomTheme" value="<?php echo $nomTheme ?>" class="form-control"/></td>
                        <td><input type="number" id="dureeTheme" name="dureeTheme" min="1" max="10" style="width: 50%;" value="<?php echo $dureeTheme ?>" class="form-control" /></td>
                        <td><input id="validerModif" type="submit" value="Valider" class="btn btn-primary" /></td>
                        <td><input id="annulerModif" type="button" value="Annuler"  class="btn btn-danger"
                                   onclick="this.form.action = 'index.php?uc=administration';
                                     this.form.submit();"/></td>
                        <td><input type="hidden"  name="idTheme" value="<?php echo $idTheme ?>" /></td>
                    </tr>
                </form>
            <?php }
        }
        ?>
        </tbody>
    </table>
</aside>
