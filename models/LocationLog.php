<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location_log".
 *
 * @property integer $player_id
 * @property integer $location_id
 * @property integer $updated_at
 * 
 * @property Player $player
 */
class LocationLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['player_id', 'location_id', 'updated_at'], 'required'],
            [['player_id', 'location_id', 'updated_at'], 'integer'],
            [['player_id', 'location_id'], 'unique', 'targetAttribute' => ['player_id', 'location_id'], 'message' => 'The combination of Player ID and Location ID has already been taken.'],
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
            'player' => Yii::t('app', 'Player'),
            'location_id' => Yii::t('app', 'Location ID'),
            'location' => Yii::t('app', 'Location'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    public static function primaryKey()
    {
        return ['player_id', 'location_id'];
    }
    
    public function getPlayer()
    {
        return $this->hasOne(Player::className(), ['id' => 'player_id']);
    }
}
