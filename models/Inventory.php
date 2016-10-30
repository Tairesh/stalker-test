<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property integer $player_id
 * @property integer $item_id
 * @property integer $using_count
 * @property integer $location
 * 
 * @property Player $player
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['player_id', 'item_id'], 'required'],
            [['player_id', 'item_id', 'using_count', 'location'], 'integer'],
            [['player_id', 'item_id'], 'unique', 'targetAttribute' => ['player_id', 'item_id'], 'message' => 'The combination of Player ID and Item ID has already been taken.'],
            [['player_id'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['player_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'player_id' => Yii::t('app', 'Player ID'),
            'item_id' => Yii::t('app', 'Item ID'),
            'using_count' => Yii::t('app', 'Using Count'),
            'location' => Yii::t('app', 'Location'),
        ];
    }
    
    public static function primaryKey()
    {
        return ['player_id', 'item_id'];
    }
    
    public function getPlayer()
    {
        return $this->hasOne(Player::className(), ['id' => 'player_id']);
    }
}
