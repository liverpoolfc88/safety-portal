<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Measure;

/**
 * MeasureSearch represents the model behind the search form of `app\models\Measure`.
 */
class MeasureSearch extends Measure
{
    public $fullname;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status',  'appeal_id'], 'integer'],
            [['measure_text', 'fullname', 'measure_file', 'created_at'], 'safe'],
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
        $appeal = Appeal::find()->where(['section'=>$section])->asArray()->all();
        $ap_id = [];
        foreach ($appeal as $a){
            $ap_id[] = $a['id'];
        }
        $query = Measure::find()->where(['in', 'appeal_id', $ap_id]);
        $query->innerJoinWith('user');

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
            'status' => $this->status,
//            'user_id' => $this->user_id,
            'appeal_id' => $this->appeal_id,
//            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'measure_text', $this->measure_text])
            ->andFilterWhere(['like', 'measure_file', $this->measure_file])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'users.fullname', $this->fullname]);

        return $dataProvider;
    }
}
