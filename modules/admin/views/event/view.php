<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

use app\models\Category;


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Події', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->event_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->event_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити подію??',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'event_id',
            [
                'attribute' => 'category_id',
                'value' => function($data) {
                    $catArray = Category::getCategories();
                    $result = ArrayHelper::map($catArray,'category_id','title');
                    foreach($result as $id => $name) {
                        if ($id == $data->category_id) {
                            return $name;
                        }
                    }
                },
                'format' => 'html',
            ],
            'title',
            'description:ntext',
            'image',
            'date',
            'place',
            'city',
            'price',
            'bid',
            'is_published',
            'is_featured',
        ],
    ]) ?>

</div>
