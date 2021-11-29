<?php
/*1911574   王玉娇  */
namespace frontend\controllers;

use Yii;
use frontend\models\OlymComment;
use frontend\models\OlymCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OlymCommentController implements the CRUD actions for OlymComment model.
 */
class OlymCommentController extends Controller
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
    public function actionSuccess()
	{
		 return $this->render('success');
	}
    public function actionContact()
    {
         $model = new OlymComment();
		 if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('success');
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
       /* if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }*/
    }
   
}
