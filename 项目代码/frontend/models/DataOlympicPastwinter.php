<?php
/**
 * Team:写的都队
 * Codeing by 郑梦瑶
 * 历史冬季奥运会model
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "data_olympic_pastwinter".
 *
 * @property int $id
 * @property int|null $year
 * @property string|null $host_country
 * @property string|null $host_city
 * @property string|null $country_name
 * @property string|null $country_code
 * @property int|null $gold
 * @property int|null $silver
 * @property int|null $bronze
 */
class DataOlympicPastwinter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_olympic_pastwinter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'gold', 'silver', 'bronze'], 'integer'],
            [['host_country', 'host_city', 'country_name', 'country_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'host_country' => 'Host Country',
            'host_city' => 'Host City',
            'country_name' => 'Country Name',
            'country_code' => 'Country Code',
            'gold' => 'Gold',
            'silver' => 'Silver',
            'bronze' => 'Bronze',
        ];
    }
}
