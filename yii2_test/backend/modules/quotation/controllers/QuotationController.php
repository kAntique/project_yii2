<?php

namespace backend\modules\quotation\controllers;

use Yii;
use backend\modules\quotation\models\Quotation;
use backend\modules\quotation\models\QuotationSearch;
use backend\modules\customer\models\Customer;
use backend\modules\detail\models\Detail;
use backend\modules\company\models\Company;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\base\Object;
use yii\db\Command;
use yii\db\Connection;
use kartik\mpdf\Pdf;
use yii\db\BaseActiveRecord;
use yii\helpers\Url;
/**
 * QuotationController implements the CRUD actions for Quotation model.
 */
class QuotationController extends Controller
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
     * Lists all Quotation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuotationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quotation model.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return mixed
     */
    public function actionView($id, $id_company, $id_customer)
    {
      $model = $this->findModel($id, $id_company, $id_customer);
        $user = Customer::find('name','address')->where(['id' => $model->id])->all();
          $detail = Detail::find()->where(['not',['quotation_id' => null]])->andWhere(['receipt_id' => null])->andWhere(['quotation_id' => $model->id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id, $id_company, $id_customer),
            'user'=>$user,
            'model'=>$model,
          'detail'  =>$detail,
        ]);
    }

    /**
     * Creates a new Quotation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quotation();

        $q = Quotation::find('id')->orderBy(['id' => 'SORT_ASC'])->count();
        $q = $q + 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'q' => $q,

            ]);
        }
    }

    /**
     * Updates an existing Quotation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return mixed
     */
    public function actionUpdate($id, $id_company, $id_customer)
    {

      //$q = $q + 1;
        $model = $this->findModel($id, $id_company, $id_customer);

        $q = $this->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'q' => $q,
            ]);
        }
    }

    /**
     * Deletes an existing Quotation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return mixed
     */
    public function actionDelete($id, $id_company, $id_customer)
    {
        $this->findModel($id, $id_company, $id_customer)->delete();

        return $this->redirect(['index']);
    }

    public function actionPdf($id,$id_company,$id_customer)
    {
        // $id_quotation = Quotation::findOne(['id' => $id]);
        // $id_com = Company::findOne(['id_company' => $id_company]);
        // $id_cus = Customer::findOne(['id_customer' => $id_customer]);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer]);
        // } else {
        //     return $this->render('view', [
        //         'model' => $model,
        //     ]);
        // }

        $model = $this->findModel($id, $id_company, $id_customer);
        //$mod = $this->findModel($id_company);
        //$date = SELECT  NOW();
        //$q = null;
        $add = 0;
        $total = 0;
        $tax_vat = 0;
        $user = Customer::find('name','address')->where(['id' => $model->id])->all();
        $company = Company::find()->all();
        $query = Detail::find()->where(['not',['quotation_id' => null]])->andWhere(['receipt_id' => null])->andWhere(['quotation_id' => $model->id])->all();
        $sum = Detail::find('unit_price','quantity')->all();
        foreach($sum as $key):
            $add = $add + $key['unit_price'] * $key['quantity'];
        endforeach;
        //$tax_vat; ภาษี
        //$total; ผลร่วมที่คิดดอกเบี้ยแล้ว


    // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('body',[
            'model' => $model,
            'query' => $query,
            'company' => $company,
            'user' => $user,
            'add' => $add,
        ]);
        $footer = $this->renderPartial('footer',[
             'company' => $company,
        ]);
        $header = $this->renderPartial('header');

    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
      'mode' => Pdf::MODE_UTF8,
      // A4 paper format
      'format' => Pdf::FORMAT_A4,
      // portrait orientation
      'orientation' => Pdf::ORIENT_PORTRAIT,
      // stream to browser inline
      'destination' => Pdf::DEST_BROWSER,
      // your html content input
      'content' => $content,
      // format content from your own css file if needed or use the
      // enhanced bootstrap css built by Krajee for mPDF formatting
      'cssFile' => '@frontend/web/css/pdf.css',
      //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
      // any css to be embedded if required
      //'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right}.imgbd{border:1px solid}',
      // set mPDF properties on the fly
      //'options' => ['title' => 'Preview Report Case: '.$id_quotation],
      // call mPDF methods on the fly
      'methods' => [
          'SetHeader'=>[$header],
          'SetFooter'=>[$footer],
      ]
    ]);

      // return the pdf output as per the destination setting
      //return $pdf->render();

      $response = Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_RAW;
      $headers = Yii::$app->response->headers;
      $headers->add('Content-Type','application/pdf');

      return $pdf->render();

}

    /**
     * Finds the Quotation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return Quotation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $id_company, $id_customer)
    {
        if (($model = Quotation::findOne(['id' => $id, 'id_company' => $id_company, 'id_customer' => $id_customer])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
