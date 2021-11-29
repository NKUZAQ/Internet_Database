<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "olym_team_info".
 *
 * @property string $name
 * @property string $stu_id
 * @property string $department
 * @property string $major
 * @property string|null $other_info
 */
class OlymTeamInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'olym_team_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'stu_id', 'department', 'major'], 'required'],
            [['name', 'stu_id', 'department', 'major', 'other_info'], 'string', 'max' => 255],
            [['stu_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'stu_id' => 'Stu ID',
            'department' => 'Department',
            'major' => 'Major',
            'other_info' => 'Other Info',
        ];
    }
}
