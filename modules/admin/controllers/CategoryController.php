<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\modules\admin\models\Category;
use app\models\User;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     * @throws NotFoundHttpException if user has no access to this action
     */
    public function actionIndex()
    {
        if (!User::isAdmin()) {
            throw new NotFoundHttpException('Сторінка не знайдена');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if user has no access to this action
     */
    public function actionView($id)
    {
        if (!User::isAdmin()) {
            throw new NotFoundHttpException('Сторінка не знайдена');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws NotFoundHttpException if user has no access to this action
     */
    public function actionCreate()
    {
        if (!User::isAdmin()) {
            throw new NotFoundHttpException('Сторінка не знайдена');
        }

        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Категорію $model->title створено");
            return $this->redirect(['view', 'id' => $model->category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if user has no access to this action
     */
    public function actionUpdate($id)
    {
        if (!User::isAdmin()) {
            throw new NotFoundHttpException('Сторінка не знайдена');
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Категорію $model->title оновлено");
            return $this->redirect(['view', 'id' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if user has no access to this action
     */
    public function actionDelete($id)
    {
        if (!User::isAdmin()) {
            throw new NotFoundHttpException('Сторінка не знайдена');
        }

        $model = $this->findModel($id);
        Yii::$app->session->setFlash('success', "Категорію $model->title видалено");
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Сторінка не знайдена');
        }
    }
}
