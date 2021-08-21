<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '';

$css = <<< CSS

.hero-image {
    background-image: url("/images/homepage.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 1024px;
    margin-top: -15px;
    
    width: 100vw;
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
}
.hero-text {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
}

.full-width {

}

CSS;

$this->registerCss($css);
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent hero-image">
        <h1 class="hero-text"><?= Html::encode(Yii::$app->name) ?></h1>
    </div>

    <div class="body-content">

    </div>
</div>
