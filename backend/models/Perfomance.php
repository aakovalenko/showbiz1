<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "perfomance".
 *
 * @property integer $perfomance_di
 * @property string $name
 * @property string $date
 * @property integer $artist_id
 * @property integer $place_id
 * @property string $perfomance_status
 *
 * @property Artist $artist
 * @property Place $place
 */
class Perfomance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfomance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'artist_id', 'place_id', 'perfomance_status'], 'required'],
            [['date','artist_id', 'place_id'], 'safe'],
           // [[], 'integer'],
            [['perfomance_status'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['artist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Artist::className(), 'targetAttribute' => ['artist_id' => 'artist_id']],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Place::className(), 'targetAttribute' => ['place_id' => 'place_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'perfomance_di' => Yii::t('app', 'Perfomance Di'),
            'name' => Yii::t('app', 'Name'),
            'date' => Yii::t('app', 'Date'),
            'artist_id' => Yii::t('app', 'Artist Name'),
            'place_id' => Yii::t('app', 'Place Name'),
			//'alias' => Yii::t('app', 'Alias'),
			'city' => Yii::t('app', 'City'),
            'perfomance_status' => Yii::t('app', 'Perfomance Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtist()
    {
        return $this->hasOne(Artist::className(), ['artist_id' => 'artist_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['place_id' => 'place_id']);
    }
}
