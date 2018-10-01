<?php
use frontend\assets\AppCssAsset;
use frontend\assets\AppJsAsset;

AppCssAsset::register($this);
AppJsAsset::register($this);
$this->beginContent('@frontend/views/layouts/base.php');
$this->beginBody();
$this->beginContent('@frontend/views/layouts/layout-parts/header.php'); $this->endContent();
echo $content;
$this->beginContent('@frontend/views/layouts/layout-parts/footer.php'); $this->endContent();
$this->endBody();
$this->beginContent('@frontend/views/layouts/layout-parts/bottom.php'); $this->endContent();
$this->endContent();
