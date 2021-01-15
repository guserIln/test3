<?php
namespace app\models;

use yii\base\Model;

class AddResumeForm extends Model
{
    public $name, $email, $fam, $otch, $date, $pol, $tel, $description, $body, $salary, $city,
     $foto, $age, $zan, $grafik, $spec;

    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
             'fam' => 'Ваша фамилия',
              'otch' => 'Ваше отчество',
              'date' => 'Дата рождения',
              'pol' => 'Ваш пол',
            'email' => 'Ваш email',
            'tel' => 'Ваш телефон',
            'age' => 'Ваш возраст',
            'salary' => 'Зарплата',
            'city' => 'Ваш город',
              'foto' => 'Фото',
               'age' => 'Возраст',
               'zan' => 'Занятость',
               'city' => 'Город',
               'spec' => 'Специализация',
                'grafik' => 'График работы',
            'description' => 'Обо мне',
            'body' => 'Сообщение',
        ];
    }

    public function rules() {
        return [
            [['name', 'email'], 'trim'],
            ['name', 'required', 'message' => 'Поле «Ваше имя» обязательно для заполнения'],
             ['email', 'required', 'message' => 'Поле «Ваш email» обязательно для заполнения'],
              ['fam', 'required', 'message' => 'Поле «Ваша фамилия» обязательно для заполнения'],
               ['otch', 'required', 'message' => 'Поле «Ваше отчество» обязательно для заполнения'],
                 ['salary', 'required', 'message' => 'Поле «Зарплата» обязательно для заполнения'],
                  ['foto', 'required', 'message' => 'Поле «Фото» обязательно для заполнения'],
                    ['city', 'required', 'message' => 'Поле «Город» обязательно для заполнения'],
                         ['tel', 'required', 'message' => 'Поле «Телефон» обязательно для заполнения'],
                          ['age', 'required', 'message' => 'Поле «Возраст» обязательно для заполнения'],
['zan', 'required', 'message' => 'Поле «Занятость» обязательно для заполнения'],
['grafik', 'required', 'message' => 'Поле «График» обязательно для заполнения'],
                ['date', 'required', 'message' => 'Поле «Ваша дата» обязательно для заполнения'],
            ['email', 'required', 'message' => 'Поле «Ваш email» обязательно для заполнения'],
            ['email', 'email', 'message' => 'Поле «Ваш email» должно быть адресом почты'],
            ['description', 'required', 'message' => 'Поле «Сообщение» обязательно для заполнения'],
            ['body', 'required', 'message' => 'Поле «Сообщение» обязательно для заполнения'],
        ];
    }
}