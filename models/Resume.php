<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property string $foto
 * @property datetime $date
 * @property int $spec
 * @property int $salary
 * @property float $experience
 * @property int $age
 * @property string $city
 * @property string $last
 * @property string $description
 * @property int $userid
 * @property string $otch
 * @property string $fam
 * @property string $name
 * @property string $email
 * @property string $body
 * @property string $image
 * @property int $zan
 * @property int $grafik
 * @property int $shows
 * @property string $tel
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['foto', 'date', 'spec', 'salary', 'experience', 'age', 'city', 'last', 'description', 'userid', 'otch', 'fam', 'name', 'email', 'body', 'image', 'zan', 'grafik', 'shows', 'tel'], 'required'],
            [['date'], 'safe'],
            [['spec', 'salary', 'age', 'userid', 'zan', 'grafik', 'shows'], 'integer'],
            [['experience'], 'number'],
            [['foto', 'last', 'otch', 'fam', 'name', 'email', 'body', 'image', 'tel'], 'string', 'max' => 255],
            [['city'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
           // 'foto' => 'Фото',
            'date' => 'Дата',
            'spec' => 'Специализация',
            'salary' => 'Зарплата',
            'experience' => 'Опыт работы',
            'age' => 'Возраст',
            'city' => 'Город',
            'last' => 'Последний',
            'description' => 'Описание',
            'userid' => 'userid',
            'otch' => 'Отчество',
            'fam' => 'Фамилия',
            'name' => 'Имя',
            'email' => 'Email',
            'body' => '',
            'image' => '',
            'zan' => 'Занятость',
            'grafik' => 'График работы',
            'shows' => '',
            'tel' => 'Телефон',
        ];
    }
}
