<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property int $ID
 * @property string $TITLE
 * @property string $NOTES
 * @property string $PRICE
 * @property string $EMAIL
 * @property string $PHONE
 * @property int $USER_ID
 *
 * @property Images[] $images
 * @property User $uSER
 * @property Reservations[] $reservations
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TITLE', 'NOTES', 'PRICE'], 'required', 'message' => '{attribute} nedrīkst būt tukšs'],
            [['PRICE'], 'number'],
            [['USER_ID'], 'integer'],
            [['TITLE', 'EMAIL', 'PHONE'], 'string', 'max' => 50],
            [['NOTES'], 'string', 'max' => 2000],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['USER_ID' => 'ID']],
            [['EMAIL'], 'email', 'message' => '{attribute} nav pareiza epasta adrese'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TITLE' => 'Virsraksts',
            'NOTES' => 'Apraksts',
            'PRICE' => 'Cena',
            'EMAIL' => 'e-pasts',
            'PHONE' => 'telefons',
            'USER_ID' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['OFFER_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(User::className(), ['ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservations::className(), ['OFFER_ID' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return OffersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OffersQuery(get_called_class());
    }

    public static function findUserOffers()
    {
        return  Offers::find()->where(['USER_ID' => Yii::$app->user->identity->ID]);
    }

    public static function isOwner($model)
    {
        if (Yii::$app->user->identity->ID == $model->USER_ID){

            return true;
        } else {

            return false;
        }

    }
}
