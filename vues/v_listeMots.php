<nav class="center">
    <ul class="pager">
        <li class="previous"><a href="index.php?uc=administration"><span aria-hidden="true">&larr;</span> Revenir aux thèmes</a></li>
    </ul>
</nav>
<aside>
    <div class="panel panel-info">Gérer les mots</div>
    <form action="index.php?uc=gererMots&action=validerNouveauMot" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 col-lg-offset-1">
                <legend>Nouveau Mot</legend>
                <input type="text" id="libMot" name="libMot" placeholder="Libellé du mot" class="form-control">
                <input type="number" id="dureeMot" name="dureeMot" placeholder="Durée" min="1" max="10" class="form-control">
                <input type="number" id="nbPointsMot" name="nbPointsMot" placeholder="Nombre de point" min="1" max="5" class="form-control">
                <input type="hidden" id="idTheme" name="idTheme" value="<?php echo $idTheme ?>"></td>
                <input id="validerModif" type="submit" value="Valider" class="btn btn-primary"></td>
                <input id="annulerModif" type="reset" value="Annuler"  class="btn btn-danger"></td>
                <hr>
            </div>
        </div>
    </form>

    <table class="table">
        <tr>
            <th class="libelle">Mot</th>
            <th class="date">Durée</th> 
            <th class="date">Nombre points</th> 
            <th class="action">Modifier</th>   
            <th class="action">Supprimer</th> 
        </tr>

        <?php
        foreach ($lesMots as $unMot) {
            $libelle = $unMot['contenuMot'];
            $duree = $unMot['dureeMot'];
            $nbPoints = $unMot['nbPointsMot'];
            $idMot = $unMot['idMot'];

            if ($idMot != $idMotModif) {
                ?>    
                <tr>
                    <td><?php echo $libelle ?></td>
                    <td><?php echo $duree ?></td>
                    <td><?php echo $nbPoints ?></td>
                    <td><a href="index.php?uc=gererMots&action=modifierMot&idTheme=<?php echo $idTheme ?>&idMot=<?php echo $idMot ?>">
                            <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>
                    <td><a href="index.php?uc=gererMots&action=supprimerMot&idTheme=<?php echo $idTheme ?>&idMot=<?php echo $idMot ?>" 
                           onclick="return confirm('Voulez-vous vraiment supprimer ce mot?');"> 
                            <span class='glyphicon glyphicon-trash' aria-hidden='true'/></a></td>
                </tr>
                <?php
            } else {
                ?>  
                <form action="index.php?uc=gererMots&action=validerModifierMot" method="post"> 
                    <tr>
                        <td><input type="text" id="txtLibelleHF" name="libMot" maxlength="156" value="<?php echo $libelle ?>" class="form-control"></td>
                        <td><input type="number" id="txtMontantHF" name="dureeMot" min="1" max="10" value="<?php echo $duree ?>" class="form-control" style="width: 50%;"></td>
                        <td><input type="number" id="txtMontantHF" name="nbPointsMot" min="1" max="5" value="<?php echo $nbPoints ?>" class="form-control" style="width: 50%;"></td>
                        <td><input id="validerModif" type="submit" value="Valider" class="btn btn-primary" /></td>
                        <td> <input id="annulerModif" type="button" value="Annuler" class="btn btn-danger" onclick="this.form.action = 'index.php?uc=gererMots';
                                    this.form.method = 'post';
                                    this.form.submit();"</td>
                        <td class = "invisible">
                            <input type="hidden"  name="idMot" value="<?php echo $idMot ?>" />
                            <input type="hidden"  name="idTheme" value="<?php echo $idTheme ?>"/> 
                        </td>
                    </tr>
                </form>
                <?php
            }
        }
        ?>    

    </table>
</div>
</aside>
