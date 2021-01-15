<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resume;

/**
 * ResumeSearch represents the model behind the search form of `app\models\Resume`.
 */
class ResumeSearch extends Resume
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'spec', 'salary', 'age', 'userid', 'zan', 'grafik', 'shows'], 'integer'],
            [['foto', 'date', 'city', 'last', 'description', 'otch', 'fam', 'name', 'email', 'body', 'image', 'tel'], 'safe'],
            [['experience'], 'number'],
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
        $query = Resume::find();

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
            'date' => $this->date,
            'spec' => $this->spec,
            'salary' => $this->salary,
            'experience' => $this->experience,
            'age' => $this->age,
            'userid' => $this->userid,
            'zan' => $this->zan,
            'grafik' => $this->grafik,
            'shows' => $this->shows,
        ]);

        $query->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'last', $this->last])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'otch', $this->otch])
            ->andFilterWhere(['like', 'fam', $this->fam])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'tel', $this->tel]);

        return $dataProvider;
    }
}
