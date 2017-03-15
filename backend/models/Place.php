<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property integer $place_id
 * @property string $name
 * @property string $country
 * @property string $city
 * @property string $region
 * @property integer $phone
 * @property string $email
 *
 * @property Perfomance[] $perfomances
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'country', 'city', 'region', 'phone', 'email'], 'required'],
            [['phone'], 'integer'],
            [['name', 'country', 'city', 'region', 'email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'place_id' => Yii::t('app', 'Place ID'),
            'name' => Yii::t('app', 'Name'),
            'country' => Yii::t('app', 'Country'),
            'city' => Yii::t('app', 'City'),
            'region' => Yii::t('app', 'Region'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfomances()
    {
        return $this->hasMany(Perfomance::className(), ['place_id' => 'place_id']);
    }
}
