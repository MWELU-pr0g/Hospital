<?php

namespace app\controllers;

use Yii;
use app\models\RecordForm;
use app\models\Labtech;
use app\models\Doctors;
use app\models\Form;
use app\models\RecordSearch;
use app\models\ResultsSearch;
use Codeception\Extension\Recorder;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * RecordController implements the CRUD actions for RecordForm model.
 */
class RecordController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['record', 'recordview', 'create'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['home'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'logout' => ['post'],
            //         'update' => ['post'],

            //     ],

        ];
    }

    /**
     * Lists all RecordForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('recordview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecordForm model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new RecordForm();
        $data = $model->getpatient($id);

        // print_r($data);exit;
        return $this->render('//record/view', [
            'model' => $data
        ]);
    }


    /**
     * Creates a new RecordForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $userDetails = new RecordForm();



        if ($userDetails->load(Yii::$app->request->post()) && $userDetails->save()) {
            return $this->render('record', ['model' => $userDetails]);
        }

        return $this->render('record', [
            'model' => $userDetails,
        ]);
    }



    /**
     * Updates an existing RecordForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['recordview', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing RecordForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('recordview');
    }

    /**
     * Finds the RecordForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RecordForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecordForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionRecord()
    {
        $searchModel = new RecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $userDetails = new RecordForm();



        if ($userDetails->load(Yii::$app->request->post()) && $userDetails->save()) {
            return $this->render('recordview', [
                'dataProvider' => $userDetails,
                'searchModel' => $searchModel,

            ]);
        }

        return $this->render('record', [
            'model' => $userDetails,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionDoctors()
    {
        $model = new Doctors();
        if ($model->load(Yii::$app->request->post() && $model->save())) {

            print_r($model);
            exit;
            return $this->redirect('medical');
        }
        return $this->render('doctors', [
            'model' => $model,

        ]);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLabtech()
    {
        $model = new Labtech();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goHome();
        }

        return $this->render('labtech', [
            'model' => $model,
        ]);
    }
    public function actionRecordview()
    {
        $searchModel = new RecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new RecordForm();

        $data = $model->patient();


        return $this->render('recordview', [
            'dataProvider' => $data,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }
    public function actionMedical()
    {
        $searchModel = new ResultsSearch();
        $dataProvider= $searchModel->search(Yii::$app->request->queryParams);

        $model = new Doctors();

        $data = $model->result();

        return $this->render('medical', [
            'dataProvider' => $data,
              'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,


        ]);
    }


    public function action_form()
    {
        $model = new Form();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('recordview');
        }
        return $this->render('_form', [
            'model' => $model,
        ]);
    }
    public function actionResult($id)
    {
        $model = new Doctors();
        $data = $model->getresult($id);



        // print_r($data);exit;
        return $this->render('//record/result', [
            'model' => $data
        ]);
    }
    public function actionData()
    {
        $id = Yii::$app->request->post('id');

        $user = RecordForm::findOne($id);
        $users = Doctors::findOne($id);
        $medical = new Doctors();
        // $medical->patientId = $user->id;

        $medical->load(Yii::$app->request->post());
        if ($medical->save()) {
            $results = $medical->getresult($id);
            // print_r($medical);exit;

            return $this->render('result', [
                'model' => $medical,
            ]);
        }
        return $this->render('doctors', [
            'user' => $user,
            'model' => $medical,
            'dataProvider' => $medical,
        ]);
    }
}


    // public function actionData()
    // {
    //     $id = Yii::$app->request->post('id');


    //     $user = RecordForm::findOne($id);
    //     $medical = new Doctors();
    //     // $medical->patientId = $user->id;

    //     $medical->load(Yii::$app->request->post());
    //     if ($medical->save()) {
    //         $results = $medical->result();

    //         return $this->render('medical', [
    //             'dataProvider' => $results,
    //         ]);
    //     }
    //     return $this->render('doctors', [
    //         'user' => $user,
    //         'model' => $medical,
    //         'dataProvider' => $medical,
    //     ]);
    // }

