<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "owners".
 *
 * @property integer $id
 * @property integer $name
 */
class OwnerModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'owners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getCarriage()
    {
      return $this->hasMany(CarriageModel::className(), ['id'  => 'carriage_owner']);
    }
}
