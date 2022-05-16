<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appeal".
 *
 * @property int $id
 * @property int|null $departments_id
 * @property int|null $tbl_number
 * @property string $address
 * @property int|null $branch
 * @property int|null $status
 * @property string $appeal_text
 * @property string|null $appeal_date
 * @property int $section
 */
class Appeal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appeal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departments_id', 'tbl_number', 'branch','status', 'section'], 'integer'],
            [['address', 'appeal_text', 'section'], 'required','message' => 'Maydonni to`ldirmadingiz !'],
            [['appeal_text'], 'string'],
            [['appeal_date'], 'safe'],
            [['address'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departments_id' => 'Bo`lim&Tsexlar',
            'tbl_number' => 'tabel raqam',
            'address' => 'Manzil',
            'branch' => 'Branch',
            'status' => 'Holat',
            'appeal_text' => 'Murojaat matni',
            'appeal_date' => 'Murojaat sanasi',
            'section' => 'Murojaat turi',
        ];
    }

    public function getDep()
    {
        return $this->hasOne(Departments::className(), ['id' => 'departments_id']);
    }

    public function getMeas()
    {
        return $this->hasMany(Measure::className(), ['appeal_id' => 'id']);
    }
}
