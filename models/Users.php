<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $ids
 * @property string $username
 * @property string $hashedPassword
 * @property string $salt
 * @property string $dateCreated
 * @property string $passChangeDate
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'hashedPassword', 'salt', 'dateCreated', 'passChangeDate'], 'required'],
            [['dateCreated', 'passChangeDate'], 'safe'],
            [['username'], 'string', 'max' => 30],
            [['hashedPassword'], 'string', 'max' => 255],
            [['salt'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ids' => 'Ids',
            'username' => 'Username',
            'hashedPassword' => 'Hashed Password',
            'salt' => 'Salt',
            'dateCreated' => 'Date Created',
            'passChangeDate' => 'Pass Change Date',
        ];
    }



}
