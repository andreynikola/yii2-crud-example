<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Templates;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;

/**
 * TemplatesController implements the CRUD actions for Templates model.
 */
class TemplatesController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Templates models.
     * @return mixed
     */
    public function actionTest()
    {
        $upload_path = \Yii::getAlias('@webroot').'/uploads/1';
        mkdir($upload_path, 0755);
        $upload_path = \Yii::getAlias('@webroot').'/uploads/2';
        mkdir($upload_path, 0755);
        $upload_path = \Yii::getAlias('@webroot').'/uploads/3';
        mkdir($upload_path, 0755);
        $upload_path = \Yii::getAlias('@webroot').'/uploads/4';
        mkdir($upload_path, 0755);
        $upload_path = \Yii::getAlias('@webroot').'/uploads/5';
        mkdir($upload_path, 0755);
        $upload_path = \Yii::getAlias('@webroot').'/uploads/6';
        mkdir($upload_path, 0755);
    }

    /**
     * Lists all Templates models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Templates::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Templates model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function removeDirectory($path) {
        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? $this->removeDirectory($file) : unlink($file);
        }
        rmdir($path);
        return;
    }

    public function addDirectory($id, $file_name, $title, $content) {
        $upload_path = \Yii::getAlias('@webroot').'/uploads/'.$id.'/';
        if (is_dir($upload_path)){
            $this->removeDirectory($upload_path);
        }
        mkdir($upload_path, 0755);
        $text = "<p>$title</p><span>$content</span>";
        $fp = fopen($upload_path.$file_name.'.html', "w");
        fwrite($fp, $text);
        fclose($fp);
    }

    /**
     * Creates a new Templates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Templates();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->addDirectory($model->id, $model->file_name, $model->title, $model->content);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Templates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->addDirectory($model->id, $model->file_name, $model->title, $model->content);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Templates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $upload_path = \Yii::getAlias('@webroot').'/uploads/'.$id.'/';
        if (is_dir($upload_path)){
            $this->removeDirectory($upload_path);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Templates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Templates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Templates::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
