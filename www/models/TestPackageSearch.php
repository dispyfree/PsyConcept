<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TestPackage;

/**
 * TestPackageSearch represents the model behind the search form about `app\models\TestPackage`.
 */
class TestPackageSearch extends TestPackage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_test_id', 'child_test_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TestPackage::find();

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
            'parent_test_id' => $this->parent_test_id,
            'child_test_id' => $this->child_test_id,
        ]);

        return $dataProvider;
    }
}