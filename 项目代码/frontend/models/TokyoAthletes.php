<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tokyo_athletes".
 *
 * @property string $name
 * @property string|null $country
 * @property string $countryCode
 * @property string|null $sport
 * @property string|null $gender
 */
class TokyoAthletes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tokyo_athletes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'countryCode'], 'required'],
            [['name', 'country', 'countryCode', 'sport', 'gender'], 'string', 'max' => 255],
            [['name', 'countryCode'], 'unique', 'targetAttribute' => ['name', 'countryCode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'country' => 'Country',
            'countryCode' => 'Country Code',
            'sport' => 'Sport',
            'gender' => 'Gender',
        ];
    }
}
