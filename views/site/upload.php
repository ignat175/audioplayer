<?php

/** @var yii\web\View $this */
/** @var yii\base\Model $model */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Document';
$this->registerCssFile('./css/upload.css');

?>
<h1>Страница загрузки файла</h1>
<?php $form = ActiveForm::begin([]) ?>

     <?= $form->field($model, 'audioFile')->fileInput() ?>

     <?= Html::submitInput('Отправить') ?>

<?php ActiveForm::end() ?>