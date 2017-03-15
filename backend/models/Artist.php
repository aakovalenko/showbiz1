<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "artist".
 *
 * @property integer $artist_id
 * @property string $first_name
 * @property string $last_name
 * @property string $alias
 * @property string $email
 * @property integer $phone
 *
 * @property Perfomance[] $perfomances
 */
class Artist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['artist_id', 'first_name', 'last_name', 'alias', 'email', 'phone'], 'required'],
            [['artist_id', 'phone'], 'integer'],
            [['first_name', 'last_name', 'alias', 'email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'artist_id' => Yii::t('app', 'Artist ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'alias' => Yii::t('app', 'Alias'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfomances()
    {
        return $this->hasMany(Perfomance::className(), ['artist_id' => 'artist_id']);
    }
}
