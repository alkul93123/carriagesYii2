<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carriages".
 *
 * @property integer $id
 * @property integer $carriage_number
 * @property string $carriage_kind
 * @property integer $carriage_owner
 */
class CarriageModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carriages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carriage_number'], 'required'],
            [['carriage_number', 'carriage_owner'], 'integer'],
            [['carriage_kind'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carriage_number' => 'Carriage Number',
            'carriage_kind' => 'Carriage Kind',
            'carriage_owner' => 'Carriage Owner',
        ];
    }
}
