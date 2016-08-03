<?php

namespace backend\modules\company\controllers;

use Yii;
use backend\modules\company\models\Company;
use backend\modules\company\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
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
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();

        if ($model->load(Yii::$app->request->post()) ) {
          $file1 = UploadedFile::getInstance($model,'logocompany_img');
        $file2 = UploadedFile::getInstance($model,'stampcompany_img');
        $file3 = UploadedFile::getInstance($model,'signaturecompany_img');

          if ($file1&&$file2&&$file3->size!=0) {
            $model->pic_logo = $file1->name;
            $file1->saveAs('uploads/logocompany_img'.$file1->baseName . '.' . $file1->extension);
            $model->save();

            $model->pic_stamp = $file2->name;
            $file2->saveAs('uploads/stampcompany_img'.$file2->baseName . '.' . $file2->extension);
            $model->save();

            $model->pic_signature = $file3->name;
            $file3->saveAs('uploads/signaturecompany_img'.$file3->baseName . '.' . $file3->extension);
            $model->save();
          }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
          $file1=UploadedFile::getInstance($model,'logocompany_img');
          $file2=UploadedFile::getInstance($model,'stampcompany_img');
          $file3=UploadedFile::getInstance($model,'signaturecompany_img');

          if ($file1&&$file2&&$file3->size!=0) {
            $model->pic_logo = $file1->name;
            $file1->saveAs('uploads/logocompany_img'.$file1->baseName. '.' . $file1->extension);
            $model->save();

            $model->pic_stamp = $file2->name;
            $file2->saveAs('uploads/stampcompany_img'.$file1->baseName. '.' . $file2->extension);
            $model->save();

            $model->pic_signature = $file3->name;
            $file3->saveAs('uploads/signaturecompany_img'.$file1->baseName. '.' . $file3->extension);
            $model->save();
          }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
