<?php

namespace app\controllers;

use app\models\Appeal;

use app\models\User;
use app\models\LoginForm;
use app\models\AccountActivation;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\Users;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use Yii;
use yii\web\UploadedFile;

//use yii\web\Response;

/**
 * Site controller.
 * It is responsible for displaying static pages, logging users in and out,
 * sign up and account activation, and password reset.
 */
class SiteController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
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
     * Declares external actions for the controller.
     *
     * @return array
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

//------------------------------------------------------------------------------------------------//
// STATIC PAGES
//------------------------------------------------------------------------------------------------//

    /**
     * Displays the index (home) page.
     * Use it in case your home page contains static content.
     *
     * @return string
     */
    public function actionIndex($id='')
    {

        $model = Appeal::find()->where(['id'=>$id])->one();

//        $id = (!empty($id))?$id:'';

        return $this->render('index', [

            'id'=>$id,
            'model'=>$model

        ]);
    }

    public function actionAppeal($section){

        return $this->render('appeal', [
            'section' =>$section
        ]);
    }
    public function actionPhone($section){

        $users = Users::find()->where(['section'=>$section])->all();


        return $this->render('phone', [
            'section' =>$section,
            'users'=>$users
        ]);
    }

    public function actionMessage(){

        return $this->render('message');

    }


    /**
     * Displays the about static page.
     *
     * @return string
     */
    public function actionBook()
    {
        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }
        $change = SiteText::find()->where(['id' => 15])->asArray()->one();
        $books = Books::find()->all();
        return $this->render('book', [
            'books' => $books,
            'change' => $change,

        ]);
    }

    public function actionBookread($id)
    {
        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }
        $model = Books::find()->where(['id' => $id])->one();

        return $this->render('bookread', [
            'model' => $model,
        ]);
    }

    public function actionPhoto()
    {
        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $filename = $_FILES['file']['name'];
        $location = "uploads/user/" . $filename;
        $uploadok = 1;

        $imagefiletype = pathinfo($location, PATHINFO_EXTENSION);

        $valid = array('jpg', 'jpeg', 'png');

        if (!in_array(strtolower($imagefiletype), $valid)) {
            $uploadok = 0;
        }
        if ($uploadok == 0) {
            echo 0;
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                echo $location;
            } else {
                echo 0;
            }
        }
        $user_id = Yii::$app->user->identity->id;
        $modelyes = Photo::find()->where(['user_id'=>$user_id])->one();
        if ($modelyes){
            $modelyes->photo = $location;
            $modelyes->save();
        }
        else {
            $model = new Photo();
            $model->user_id = $user_id;
            $model->photo = $location;
            $model->save();
        }
        Yii::$app->response->format = 'json';
        return ['data' => 'success'];

    }

    public function actionAdmin()
    {
        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }
        return $this->render('admin');
    }

    /**
     * Displays the contact static page and sends the contact email.
     *
     * @return string|\yii\web\Response
     */
    public function actionContact()
    {
        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }
        $model = new ContactForm();

        if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
            return $this->render('contact', ['model' => $model]);
        }

        if (!$model->sendEmail(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'There was some error while sending email.'));
            return $this->refresh();
        }

        Yii::$app->session->setFlash('success', Yii::t('app',
            'Thank you for contacting us. We will respond to you as soon as possible.'));

        return $this->refresh();
    }

//------------------------------------------------------------------------------------------------//
// LOG IN / LOG OUT / PASSWORD RESET
//------------------------------------------------------------------------------------------------//

    /**
     * Logs in the user if his account is activated,
     * if not, displays appropriate message.
     *
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        // user is logged in, he doesn't need to login
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
//            return $this->render('appeal');
        }

        // get setting value for 'Login With Email'
        $lwe = Yii::$app->params['lwe'];

        // if 'lwe' value is 'true' we instantiate LoginForm in 'lwe' scenario
        $model = $lwe ? new LoginForm(['scenario' => 'lwe']) : new LoginForm();

        // monitor login status
        $successfulLogin = true;

        // posting data or login has failed
        if (!$model->load(Yii::$app->request->post()) || !$model->login()) {
            $successfulLogin = false;
        }

        // if user's account is not activated, he will have to activate it first
        if ($model->status === User::STATUS_INACTIVE && $successfulLogin === false) {
            Yii::$app->session->setFlash('error', Yii::t('app',
                'You have to activate your account first. Please check your email.'));
            return $this->refresh();
        }

        // if user is not denied because he is not active, then his credentials are not good
        if ($successfulLogin === false) {
            return $this->render('login', ['model' => $model]);
        }

        // login was successful, let user go wherever he previously wanted
        return $this->goBack();
//        return $this->render('/appeal/index');
    }

    /**
     * Logs out the user.
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /*----------------*
     * PASSWORD RESET *
     *----------------*/

    /**
     * Sends email that contains link for password reset action.
     *
     * @return string|\yii\web\Response
     */
//    public function actionRequestPasswordReset()
//    {
//        $model = new PasswordResetRequestForm();
//
//        if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
//            return $this->render('requestPasswordResetToken', ['model' => $model]);
//        }
//
//        if (!$model->sendEmail()) {
//            Yii::$app->session->setFlash('error', Yii::t('app',
//                'Sorry, we are unable to reset password for email provided.'));
//            return $this->refresh();
//        }
//
//        Yii::$app->session->setFlash('success', Yii::t('app', 'Check your email for further instructions.'));
//
//        return $this->goHome();
//    }

    /**
     * Resets password.
     *
     * @param string $token Password reset token.
     * @return string|\yii\web\Response
     *
     * @throws BadRequestHttpException
     */
//    public function actionResetPassword($token)
//    {
//        try {
//            $model = new ResetPasswordForm($token);
//        } catch (InvalidParamException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//
//        if (!$model->load(Yii::$app->request->post()) || !$model->validate() || !$model->resetPassword()) {
//            return $this->render('resetPassword', ['model' => $model]);
//        }
//
//        Yii::$app->session->setFlash('success', Yii::t('app', 'New password was saved.'));
//
//        return $this->goHome();
//    }

//------------------------------------------------------------------------------------------------//
// SIGN UP / ACCOUNT ACTIVATION
//------------------------------------------------------------------------------------------------//

    /**
     * Signs up the user.
     * If user need to activate his account via email, we will display him
     * message with instructions and send him account activation email with link containing account activation token.
     * If activation is not necessary, we will log him in right after sign up process is complete.
     * NOTE: You can decide whether or not activation is necessary, @return string|\yii\web\Response
     * @see config/params.php
     *
     */
//    public function actionSignup()
//    {
//        // get setting value for 'Registration Needs Activation'
//        $rna = Yii::$app->params['rna'];
//
//        // if 'rna' value is 'true', we instantiate SignupForm in 'rna' scenario
//        $model = $rna ? new SignupForm(['scenario' => 'rna']) : new SignupForm();
//
//        // if validation didn't pass, reload the form to show errors
//        if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
//            return $this->render('signup', ['model' => $model]);
//        }
//
//        // try to save user data in database, if successful, the user object will be returned
//        $user = $model->signup();
//
//        if (!$user) {
//            // display error message to user
//            Yii::$app->session->setFlash('error', Yii::t('app', 'We couldn\'t sign you up, please contact us.'));
//            return $this->refresh();
//        }
//
//        // user is saved but activation is needed, use signupWithActivation()
//        if ($user->status === User::STATUS_INACTIVE) {
//            $this->signupWithActivation($model, $user);
//            return $this->refresh();
//        }
//
//        // now we will try to log user in
//        // if login fails we will display error message, else just redirect to home page
//
//        if (!Yii::$app->user->login($user)) {
//            // display error message to user
//            Yii::$app->session->setFlash('warning', Yii::t('app', 'Please try to log in.'));
//
//            // log this error, so we can debug possible problem easier.
//            Yii::error('Login after sign up failed! User '.Html::encode($user->username).' could not log in.');
//        }
//
//        return $this->goHome();
//    }

    /**
     * Tries to send account activation email.
     *
     * @param $model
     * @param $user
     */
//    private function signupWithActivation($model, $user)
//    {
//        // sending email has failed
//        if (!$model->sendAccountActivationEmail($user)) {
//            // display error message to user
//            Yii::$app->session->setFlash('error', Yii::t('app',
//                'We couldn\'t send you account activation email, please contact us.'));
//
//            // log this error, so we can debug possible problem easier.
//            Yii::error('Signup failed! User '.Html::encode($user->username).' could not sign up.
//                Possible causes: verification email could not be sent.');
//        }
//
//        // everything is OK
//        Yii::$app->session->setFlash('success', Yii::t('app', 'Hello').' '.Html::encode($user->username). '. ' .
//            Yii::t('app', 'To be able to log in, you need to confirm your registration.
//                Please check your email, we have sent you a message.'));
//    }

    /*--------------------*
     * ACCOUNT ACTIVATION *
     *--------------------*/

    /**
     * Activates the user account so he can log in into system.
     *
     * @param string $token
     * @return \yii\web\Response
     *
     * @throws BadRequestHttpException
     */
//    public function actionActivateAccount($token)
//    {
//        try {
//            $user = new AccountActivation($token);
//        } catch (InvalidParamException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//
//        if (!$user->activateAccount()) {
//            Yii::$app->session->setFlash('error', Html::encode($user->username). Yii::t('app',
//                ' your account could not be activated, please contact us!'));
//            return $this->goHome();
//        }
//
//        Yii::$app->session->setFlash('success', Yii::t('app', 'Success! You can now log in.').' '.
//            Yii::t('app', 'Thank you').' '.Html::encode($user->username).' '.Yii::t('app', 'for joining us!'));
//
//        return $this->redirect('login');
//    }
}
