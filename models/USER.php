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
 * @property string $AUTHKEY
 * @property string $ACCESSTOKEN
 * @property int $ROLE
 */
class USER extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $PASSWORD2;
    public $email;
    public $user;
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    const ROLE_USER = 10;
    const ROLE_ADMIN = 20;

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
            [['USERNAME', 'NAME', 'SURNAME', 'EMAIL','PASSWORD', 'REG_DATE'], 'required', 'message' => '{attribute} nedrīkst būt tukšs'],
            [['REG_DATE'], 'safe'],
            [['EMAIL', 'USERNAME'], 'unique', 'message' => '{attribute} ir jau aizņemts, lūdzu mēģiniet citu'],
            [['USERNAME', 'NAME', 'SURNAME'], 'string', 'max' => 40],
            [['PASSWORD','PASSWORD2'], 'string', 'min' => 8, 'tooShort' => '{attribute} parole nedrīkst būt īsāka par 8 simboliem'],
            [['EMAIL'], 'email', 'message' => '{attribute} nav pareiza epasta adrese'],
            [['AUTHKEY','ACCESSTOKEN'],'string',  'max' => 255],
            ['ROLE', 'default', 'value' => 10],
            ['ROLE', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],
            //['PASSWORD2', 'compare', 'compareAttribute' => 'PASSWORD', 'message' => 'parolēm jābūt vienādām'],
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
            'REG_DATE' => 'Reģistrācijas datums',
            //'PASSWORD2' => 'Atkārtota parole',
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

        return self::findOne(['USERNAME' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {


        return self::findOne(['ACCESSTOKEN' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->AUTHKEY;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password){

        return password_verify($password, $this->PASSWORD);
    }

    public static function isUserAdmin($username)
    {
        if (static::findOne(['USERNAME' => $username, 'ROLE' => self::ROLE_ADMIN])){

            return true;
        } else {

            return false;
        }

    }
}
