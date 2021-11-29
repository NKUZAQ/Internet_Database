<?php
	

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Athletes;
use frontend\models\DataOlympicPastwinter;
use frontend\models\DataOlympicPastsummer;
use yii\helpers\ArrayHelper;

use app\models\EntryForm;
use yii\data\Pagination;
/**
 * Site controller
 */
class SiteController extends Controller
{
    // 模板
    public $layout="main";
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
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
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    /**
     * Displays detail1 page.
     *
     * @return mixed
     */
    public function actionDetail1()
    {
        return $this->render('detail1');
    }

    /**
     * Displays detail2 page.
     *
     * @return mixed
     */
    public function actionDetail2()
    {
        return $this->render('detail2');
    }
    /**
     * Displays detail3 page.
     *
     * @return mixed
     */
    public function actionDetail3()
    {
        return $this->render('detail3');
    }

    /**
     * Displays medal page.
     *
     * @return mixed
     */
    public function actionMedal()
    {
        return $this->render('medal');
    }
    /**
     * Displays data page.
     *
     * @return mixed
     */
    public function actionData()
    {
        return $this->render('data');
    }
    /**
     * Displays picture page.
     *
     * @return mixed
     */
    public function actionPicture()
    {
        return $this->render('picture');
    }
    /**
     * Displays athlete page.
     *
     * @return mixed
     */
    public function actionAthlete()
    {
        // 这里是athletes
        $query = Athletes::find();
        $all = Athletes::find()->asArray()->all();
        $id = ArrayHelper::getColumn($all,'id');
        $weight = ArrayHelper::getColumn($all,'weight');
        $height = ArrayHelper::getColumn($all,'height');
        //$mcount = Athletes::findBySql('SELECT sport,sex, COUNT(*) FROM `athletes` WHERE sex='male' AND ( sport= 'volleyball' OR sport= 'athletics' OR sport= 'boxing' OR sport= 'table tennis' OR sport= 'cycling' OR sport='gymnastics' OR sport='aquatics')GROUP BY sport,sex')->all();
        //$male = ArrayHelper::getColumn($mcount,'COUNT(*)');
        $sportss = Athletes::findBySql('SELECT sport, COUNT(*) FROM `athletes`GROUP BY sport')->all();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $athletes = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('athlete', [
            'athletes' => $athletes,
            'pagination' => $pagination,
            'id' =>$id,
            'weight' =>$weight,
            'height' =>$height,

        ]);

    }

    /**
     * Displays event page.
     *
     * @return mixed
     */
    public function actionEvent()
    {
        return $this->render('event');
    }

    /**
     * Displays before page.
     * 往年数据
     * 郑梦瑶
     * @return mixed
     */
    public function actionBefore()
    {
    	//冬奥会奖牌榜
    	$pastwinters=DataOlympicPastwinter::findBySql('select country_code,sum(gold) as gold_total,sum(silver) as silver_total,sum(bronze) as bronze_total
														from data_olympic_pastwinter
														GROUP BY country_code
														order by gold_total desc')
														->asArray()->all();
        $countrycode=ArrayHelper::getColumn($pastwinters,'country_code');
        $gold=ArrayHelper::getColumn($pastwinters,'gold_total');
        $silver=ArrayHelper::getColumn($pastwinters,'silver_total');
        $bronze=ArrayHelper::getColumn($pastwinters,'bronze_total');
        //举办国家次数
        $citys=DataOlympicPastsummer::findBySql('select host_country,count(host_country) as city_times from 
        	( select host_country from data_olympic_pastsummer group by year )a group by host_country having city_times>1')->asArray()->all();
		$cityname=ArrayHelper::getColumn($citys,'host_country');
        $citytime=ArrayHelper::getColumn($citys,'city_times');
        //夏季奖牌总数榜
        $summerall=DataOlympicPastsummer::findBySql('select country_name,sum(gold+silver+bronze) as medal_total from data_olympic_pastsummer GROUP BY country_name')
        									->asArray()->all();
        $medalnum=ArrayHelper::getColumn($summerall,'medal_total');
        $countryname=ArrayHelper::getColumn($summerall,'country_name');
        return $this->render('before',[
        	'countrycode'=>$countrycode,
        	'gold'=>$gold,
        	'silver'=>$silver,
        	'bronze'=>$bronze,   
        	'cityname'=>$cityname,
        	'citytime'=>$citytime,	
        	'countryname'=>$countryname,
        	'medalnum'=>$medalnum,
        ]);
    }
    /**
     * Displays winter page.
     *
     * @return mixed
     */
    public function actionWinter()
    {
        return $this->render('winter');
    }

    
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }
    public function actionWow()
    {
        $message = 'Wow';
        return $this->render('say', ['message' => $message]);
    }
    public function actionEntry()
    {
        // 新建一个表项
        $model = new EntryForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据

            // 做些有意义的事 ...
            // 如果验证成功了，渲染这个页面，否则渲染另一个
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
    }    
}
