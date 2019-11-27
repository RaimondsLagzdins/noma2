<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "USER".
 *
 * @property int $ID
 * @property string $USERNAME
 * @property string $NAME
 * @property string $SURNAME
 * @property string $PASSWORD
 * @property string $EMAIL
 * @property string $REG_DATE
 */
class USER extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'USER';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USERNAME', 'NAME', 'SURNAME', 'PASSWORD', 'EMAIL', 'REG_DATE'], 'required'],
            [['REG_DATE'], 'safe'],
            [['USERNAME', 'NAME', 'SURNAME'], 'string', 'max' => 40],
            [['PASSWORD'], 'string', 'max' => 200],
            [['EMAIL'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USERNAME' => 'Lietotājvārds',
            'NAME' => 'Vārds',
            'SURNAME' => 'Uzvārds',
            'PASSWORD' => 'Parole',
            'EMAIL' => 'Epasts',
            'REG_DATE' => 'Reg Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return USERQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new USERQuery(get_called_class());
    }

    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }
}
