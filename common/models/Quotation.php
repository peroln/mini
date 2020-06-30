<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotations".
 *
 * @property int $id
 * @property string $value
 * @property int $currency_id
 * @property int $service_time
 * @property int $created_at
 *
 * @property Currency $currency
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'currency_id', 'service_time', 'created_at'], 'required'],
            [['currency_id', 'service_time', 'created_at'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['currency_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'currency_id' => 'Currency ID',
            'service_time' => 'Service Time',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }
}
