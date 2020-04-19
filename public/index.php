<?php
// le CSS associé est pas terminer . reste des details a traiter , dans l'ensemble l'affichage est ressemblant ma&si a des problemes de centrage ou taille ....

require_once "_header.php";

// creation des dates
$presentTime = new DateTime();
$destinationTime = new DateTime("06/25/2512 02:15:00");


// code html ( structure , apelle les fontion php de constructions
?>
    <div class="container mainbox">

        <div class="row ">
            <?php titleLine() ?>
        </div>
        <div class="row">
            <?php dateLine($destinationTime,"orange") ?>
        </div>
        <div class="row">
            <div class="col-4 col-centered destination">
                DESTINATION TIME
            </div>
        </div>

        <div class="row ">
            <?php titleLine() ?>
        </div>
        <div class="row">
            <?php dateLine($presentTime,"green") ?>
        </div>
        <div class="row">
            <div class="col-4 col-centered destination">
                DESTINATION TIME
            </div>
        </div>
    </div>


<?php
require_once "_header.php";

/**
 * cette conction contruit la ligne de titre , pas de parametres necessaires.
 */
function titleLine()
{
    ?>
    <div class="col-1"></div>
    <div class="col-1"></div>

    <div class="col-1 title">
        MONTH
    </div>
    <div class="col-1 title">
        DAY
    </div>
    <div class="col-1 title">
        YEAR
    </div>
    <div class="col-1 ">

    </div>
    <div class="col-1 title">
        HOUR
    </div>
    <div class="col-1 ">

    </div>
    <div class="col-1 title">
        MIN
    </div>
    <div class="col-1"></div>
    <div class="col-1"></div>
    <div class="col-1"></div>

    <?php


}

/**
 * fontion permetant laffichage d'une ligne en fontion de la date passer en parametre. la coleur est optionnelle , si  aucune le orange est utiliser par defaut.
 * @param DateTime $newDate date a affiche dans les cases.
 * @param string $colorDate parametre servant a changer la coleur des champ de dates dans les cases
 */
function dateLine(DateTime $newDate , string $colorDate="orange")
{
    /**
     * changement de la couleur du point am / pm  en fontion de l'heure de la journée , utilisation de du  retour d'heure format 24H pour determine am / pm
     */
       if($newDate->format(H)>12){
           $colorDotAM="orange";
           $colorDotPM="green";
       } else {
           $colorDotAM="green";
           $colorDotPM="orange";
}

    ?>

    <div class="col-1"></div>
    <div class="col-1"></div>
    <div class="col-1 datestyle <?php echo $colorDate ?>">
        <?PHP echo strtoupper($newDate->format("M"))  ?>
    </div>
    <div class="col-1 datestyle <?php echo $colorDate ?>">

        <?PHP echo $newDate->format("d")  ?>
    </div>
    <div class="col-1 datestyle <?php echo $colorDate ?>">
        <?PHP echo $newDate->format("Y") ?>
    </div>
    <div class="col-1 align-self-center container-am-pm">
        <div class="am-pm ">AM</div>
        <div class="point point-<?php echo  $colorDotAM?>"></div>
        <div class="am-pm">PM</div>
        <div class="point point-<?php echo  $colorDotPM?>"></div>
    </div>
    <div class="col-1 datestyle <?php echo $colorDate ?>">
        <?PHP echo $newDate->format("h") ?>
    </div>
    <div class="col-1 point-double <?php echo $colorDate ?>">
        :
    </div>
    <div class="col-1 datestyle <?php echo $colorDate ?>">
        <?PHP echo$newDate->format("i")  ?>
    </div>
    <div class="col-1"></div>
    <div class="col-1"></div>
    <div class="col-1"></div>
    <?php
}