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
    <div class="form-group">
        <label class="col-lg-2 control-label"><b>Observaciones</b></label>
        <div class="col-lg-9">
            <select class="form-control selectObservacion" name="<?php echo 'Obs' . $nombreObs ?>">
                <?php
                foreach ($arrayDatos as $key => $item) {
                    echo '<option value="' . $key . '">' . $item . '</option>';
                }

                ?>
            </select>
        </div>
    </div>

    <?php

}