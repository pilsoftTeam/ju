<?php
/**
 * Created by PhpStorm.
 * User: Julio Marchant
 * Date: 03/01/2017
 * Time: 16:15
 */


function crearSelectObservaciones($nombreObs, $nombreBeca)
{

    //Array de datos. Debera ser reemplazado por el que viene de base de datos
    $arrayDatos = ['uno' => 'Uno', 'dos' => 'Dos', 'tres' => 'Tres'];

    ?>
    <label><b>Observaciones</b></label>
    <select class="form-control selectObservacion" name="<?php echo 'Obs'.$nombreObs ?>">
        <?php
        foreach ($arrayDatos as $key => $item) {
            echo '<option value="' . $key . '">' . $item . '</option>';
        }

        ?>
    </select>

    <?php

}