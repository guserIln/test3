<?php
namespace app\models;

use yii\db\ActiveRecord;

class AddResume extends Model
{
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'email' => 'Ваш email',
            'description' => 'Сообщение',
            'body' => 'Сообщение',
              'salary' => 'Сообщение',
        ];
    }

    public function rules() {
        return [
            [['name', 'email'], 'trim'],
            ['name', 'required', 'message' => 'Поле «Ваше имя» обязательно для заполнения'],
            ['email', 'required', 'message' => 'Поле «Ваш email» обязательно для заполнения'],
            ['email', 'email', 'message' => 'Поле «Ваш email» должно быть адресом почты'],
            ['description', 'required', 'message' => 'Поле «Обо мне» обязательно для заполнения'],
        ];
    }
}