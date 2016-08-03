<?php

namespace backend\modules\receipt\controllers;

use Yii;
use backend\modules\receipt\models\Receipt;
use backend\modules\receipt\models\ReceiptSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\Connection;
use yii\db\Query;
use yii\base\Object;
use yii\db\Command;
use kartik\mpdf\Pdf;
use backend\modules\customer\models\Customer;
use backend\modules\company\models\Company;
use backend\modules\detail\models\Detail;



/**
 * ReceiptController implements the CRUD actions for Receipt model.
 */
class ReceiptController extends Controller
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
     * Lists all Receipt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReceiptSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Receipt model.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return mixed
     */
    public function actionView($id, $id_company, $id_customer)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $id_company, $id_customer),
        ]);
    }

    /**
     * Creates a new Receipt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Receipt();
        $id_doc = Receipt::find('id')->orderBy(['id' => 'SORT_ASC'])->count();
        $id_doc = $id_doc + 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer]);
        } else {

                return $this->render('create', [
                'model' => $model,
                'id_doc' => $id_doc,
            ]);
        }
    }

    /**
     * Updates an existing Receipt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return mixed
     */
    public function actionUpdate($id, $id_company, $id_customer)
    {
        $model = $this->findModel($id, $id_company, $id_customer);
         $id_doc = $this->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          $items = ArrayHelper::map(Company::find()->all(), 'id', 'name');
          $items = ArrayHelper::map(Customer::find()->all(), 'id', 'name');
           DatePicker::widget([
              'name' => 'Test',
              'value' => '02-16-2012',
              'template' => '{addon}{input}',
              'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
              ]
            ]);
            return $this->redirect(['view', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'id_doc' => $id_doc,
                          ]);
        }
    }

    /**
     * Deletes an existing Receipt model.
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

    /**
     * Finds the Receipt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return Receipt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $id_company, $id_customer)
    {
        if (($model = Receipt::findOne(['id' => $id, 'id_company' => $id_company, 'id_customer' => $id_customer])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPdf($id, $id_company, $id_customer) {
      $model = $this->findModel($id, $id_company, $id_customer);
        $total =0;

        $data_customer = Customer::find('name','address')->where(['id' => $model->id])->all();
        $data_company = Company::find()->all();
        $data_detail = Detail::find()->where(['not', ['receipt_id' => null]])->andwhere(['quotation_id' => null] )->andwhere(['receipt_id'=>$model->id])->all();

        foreach (  $data_detail as $data) :
        $total = $total+$data['quantity']*$data['unit_price'];
        endforeach;

       // get your HTML raw content without any layouts or scripts
       //$content = $this->renderPartial('create_pdf');
       $content = $this->renderPartial('pdf_preview', [
         'model' => $this->findModel($id, $id_company, $id_customer),
         'data_customer' => $data_customer,
         'data_company' => $data_company,
         'data_detail' => $data_detail,

         'total'=>$total,

       ]);

       $header = $this->renderPartial('header', [

       ]);

       $footer = $this->renderPartial('footer', [
          'data_company' => $data_company,
       ]);



       $pdf = new Pdf([

           // set to use core fonts only
           'mode' => Pdf::MODE_UTF8,

           // A4 paper format
           'format' => Pdf::FORMAT_A4,

           // portrait orientation
           'orientation' => Pdf::ORIENT_PORTRAIT,
           // stream to browser inline
           'destination' => Pdf::DEST_BROWSER,
           // your html content input
           'content' => $content,
           'cssFile' => '@frontend/web/css/pdf.css',
          // 'defaultFont' =>'thsaraban',
           // format content from your own css file if needed or use the
           // enhanced bootstrap css built by Krajee for mPDF formatting
           //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
            // call mPDF methods on the fly
           'methods' => [
               'SetHeader'=> $header,
               'SetFooter'=> $footer,
           ]
       ]);

       // http response
       $response = Yii::$app->response;
       $response->format = \yii\web\Response::FORMAT_RAW;
       $headers = Yii::$app->response->headers;
       $headers->add('Content-Type', 'application/pdf');


       // return the pdf output as per the destination setting
       //return $pdf->render();
       return $pdf->render();
   }


}
