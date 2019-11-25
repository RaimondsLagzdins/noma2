<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<form method="POST" >
<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Reģistrēties.</p>
        </div>

        <div class="form-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control vards" name="vards" placeholder="Vārds" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control numurs" placeholder="telefona numurs" value=""/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control parole" placeholder="Parole" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control parole2" placeholder="Atkārtota parole" value=""/>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
</form>
