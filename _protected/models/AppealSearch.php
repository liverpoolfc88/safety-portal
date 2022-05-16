<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appeal;

/**
 * AppealSearch represents the model behind the search form of `app\models\Appeal`.
 */
class AppealSearch extends Appeal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'departments_id', 'tbl_number', 'branch','status', 'section'], 'integer'],
            [['address', 'appeal_text', 'appeal_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $section = \Yii::$app->user->identity->section;
        $query = Appeal::find()->where(['section'=>$section]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'departments_id' => $this->departments_id,
            'tbl_number' => $this->tbl_number,
            'branch' => $this->branch,
            'status' => $this->status,
            'appeal_date' => $this->appeal_date,
            'section' => $this->section,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'appeal_text', $this->appeal_text]);

        return $dataProvider;
    }
}
