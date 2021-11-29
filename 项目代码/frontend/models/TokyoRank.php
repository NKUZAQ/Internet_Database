<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tokyo_rank".
 *
 * @property int|null $Rank
 * @property string $Team
 * @property int|null $Gold
 * @property int|null $Silver
 * @property int|null $Bronze
 * @property int|null $Total
 * @property string|null $TotalRank
 * @property string|null $NOCCode
 * @property string|null $Continent
 */
class TokyoRank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tokyo_rank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Rank', 'Gold', 'Silver', 'Bronze', 'Total'], 'integer'],
            [['Team'], 'required'],
            [['Team', 'TotalRank', 'NOCCode', 'Continent'], 'string', 'max' => 255],
            [['Team'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Rank' => 'Rank',
            'Team' => 'Team',
            'Gold' => 'Gold',
            'Silver' => 'Silver',
            'Bronze' => 'Bronze',
            'Total' => 'Total',
            'TotalRank' => 'Total Rank',
            'NOCCode' => 'Noc Code',
            'Continent' => 'Continent',
        ];
    }
}
