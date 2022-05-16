<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $full_name
 * @property string $status
 * @property string $role
 * @property string $created_at
 *
 * @property Post[] $posts
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

	const STATUS_ACTIVE   = 10;
	const STATUS_INACTIVE = 1;

    public $current_password;
    public $new_password;
    public $confirm_password;

    public $authKey;
    public $status=10;


	public $statusList = [
		self::STATUS_ACTIVE   => 'Active',
		self::STATUS_INACTIVE => 'Inactive',
	];
	public $password;

    public function rules()
    {
        return [
            [['username', 'fullname'], 'required'],
            [['username'], 'unique'],
            [['fullname'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 100],
            [['role'], 'string', 'max' => 100],
            [[ 'shop_id','branch_id'], 'integer'],
            [['status','can_modify'], 'safe'],
            ['status', 'required'],
            [['username', 'password'], 'string', 'min' => 4],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Foydalanuvchi logini (tabel raqami:)',
            'fullname' => 'Ism va sharifi',
            'password' => 'Parol',
            'new_password' => 'Parol',
            'full_name' => 'FIO',
            'status' => 'Holati',
            'shop_id' => 'Tsex',
            'branch_id' => 'Filial',
            'role' => 'Huquqi',
            'created_at' => 'Sana',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public static function findByADUserName($username,$responseFormat)
    {
        try{
            if($responseFormat=='JSON')
                Yii::$app->response->format =  \yii\web\Response::FORMAT_JSON;
            $user = \Yii::$app->ad->search()->findBy('sAMAccountname', $username);
            if($user){
                $res['username'] = $user->samaccountname[0];
                $res['fullname'] = $user->cn[0];
                $res['employer_id'] = $user->employeenumber[0];
                $res['mail'] = $user->mail[0];
                $res['foto'] = base64_encode($user->thumbnailphoto[0]);
                $distinguishedname = $user->distinguishedname[0];
                $distinguishedname = substr($distinguishedname, strpos($distinguishedname,'DC'), 1000);
                $res['account_suffix'] = str_replace(',','.',str_ireplace('dc=','', $distinguishedname));
            }
            else{
                return false;
            }
            return $res;
        }
        catch (\Exception $ex){
            return $ex->getMessage();
        }
    }
    public function getPosts()
    {
        return $this->hasMany(ProblemMonitorings::className(), ['user_id' => 'id']);
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getShopuser()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id']);
    }
    public function getbranchuser()
    {
        return $this->hasOne(Branch::className(), ['id' => 'branch_id']);
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        if (Yii::$app->security->validatePassword($password, $this->password)) {
            return true;
        }else{
            return false;
        }
    }
}
