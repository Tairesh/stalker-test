<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "players".
 *
 * @property integer $id
 * @property string $name
 * @property string $clan
 * @property integer $created_at
 * @property integer $login_at
 * @property string $password
 * @property integer $frags
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'players';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'login_at', 'password'], 'required'],
            [['created_at', 'login_at', 'frags'], 'integer'],
            [['name', 'clan', 'password'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['frags'], 'default', 'value' => 0],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'clan' => Yii::t('app', 'Clan'),
            'created_at' => Yii::t('app', 'Created At'),
            'login_at' => Yii::t('app', 'Login At'),
            'password' => Yii::t('app', 'Password'),
            'frags' => Yii::t('app', 'Frags'),
        ];
    }
}
