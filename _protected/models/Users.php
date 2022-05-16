<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $fullname
 * @property string $username
 * @property string|null $phone
 * @property string|null $tel
 * @property string|null $email
 * @property int|null $section
 * @property int|null $shop_id
 * @property int|null $branch_id
 * @property int|null $can_modify
 * @property string|null $password
 * @property string|null $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }
    public $tbn;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['tbn'], 'string', 'max' => 15],
            [['section', 'shop_id', 'branch_id', 'can_modify'], 'integer'],
            [['fullname'], 'string', 'max' => 255],
            [['username', 'password', 'role'], 'string', 'max' => 100],
            [['phone','tel'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'FIO',
            'username' => 'Username',
            'phone' => 'Ichki raqami',
            'tel' => 'Shaxsiy raqami',
            'email' => 'Email',
            'section' => 'Bo`lim',
            'shop_id' => 'Shop ID',
            'branch_id' => 'Branch ID',
            'can_modify' => 'Can Modify',
            'password' => 'Parol',
            'role' => 'Role',
            'tbn' => 'Tabel raqami',
        ];
    }
}
