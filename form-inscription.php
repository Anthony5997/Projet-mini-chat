<?php 
include("include/header.php");
include("process/function.php");
?>
<div class="container">
    <div class="row">
        <h1>Inscription</h1>
        <form class="formSize" action="process/inscription-process.php" method="post">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group inputForm">
                        <label for="pseudo">Pseudo :</label> <br>
                        <input class="form-control" type="text" id="pseudo" name="pseudo" size="30" required > <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="mdp"> Mot de passe :</label> <br>
                        <input class="form-control" id="pwd" type="password" name="pwd" size="30" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, 1 chiffre, 1 lettre en majuscule et en minuscule" > <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="mdr_conf"> Confirmation du mot de passe :</label> <br>
                        <input class="form-control" id="pwd_conf" type="password" name="pwd_conf" size="30" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, 1 chiffre, 1 lettre en majuscule et en minuscule" > <br> <br>
                    </div>
                    <div class="form-group inputForm">
                        <input id="color" type="hidden" name="color" value="<?=randomColor()?>"size="30"><br>
                    </div>
                    <div class="form-group inputForm">
                        <button class="btn btn-primary inputForm text-center" type="submit">Valider</button>
                    </div>
                </div>
            </div>
        </form>
        <a href="index.php"><button class="btn btn-primary inputForm text-center">Retour</button></a>
    </div>
</div>
<?php
include("include/footer.php");