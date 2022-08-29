<?php

/** @var yii\web\View $this */

$this->title = 'Document';

$this->registerJsFile('./js/app.js');
$this->registerJsFile('./js/slider.js');

?>
<div class="viewport"></div>

<div class="player">
    <div class="prev-btn"></div>

    <div class="play-btn">
        <div class="icon-play"></div>
        <div class="icon-pause">
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>

    <div class="next-btn"></div>
</div>

<div class="slider">
    <div class="thumb"></div>
</div>

<ul class="play-list"></ul>
<audio src="" controls></audio>
