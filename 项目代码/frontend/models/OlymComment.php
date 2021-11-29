<?php

namespace frontend\models;

use Yii;

/*1911574  王玉娇*/

/**
 * This is the model class for table "olym_comment".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string $created_time
 * @property string $words
 */
class OlymComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'olym_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_time', 'words'], 'required'],
            [['name', 'email', 'created_time'], 'string', 'max' => 255],
            [['words'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'created_time' => 'Created Time',
            'words' => 'Words',
        ];
    }
}
