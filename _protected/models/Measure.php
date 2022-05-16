<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "measure".
 *
 * @property int $id
 * @property string $measure_text
 * @property string|null $measure_file
 * @property int $status
 * @property int $user_id
 * @property int $appeal_id
 * @property string|null $created_at
 */
class Measure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'measure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['measure_text', 'status', 'user_id', 'appeal_id'], 'required'],
            [['measure_text'], 'string'],
            [['status', 'user_id', 'appeal_id'], 'integer'],
            [['created_at'], 'safe'],
            [['measure_file'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'measure_text' => 'Qilingan ishlar izoh',
            'measure_file' => 'Hisobot File',
            'status' => 'Status',
            'user_id' => 'User ID',
            'appeal_id' => 'Murojaat matni',
            'created_at' => 'Created At',
        ];
    }

    public function getAppeal()
    {
        return $this->hasOne(Appeal::className(), ['id' => 'appeal_id']);
    }
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
