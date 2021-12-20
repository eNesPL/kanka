<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы аутентификации
    |--------------------------------------------------------------------------
    |
    | Следующие языковые ресурсы используются во время аутентификации для
    | различных сообщений которые мы должны вывести пользователю на экран.
    | Вы можете свободно изменять эти языковые ресурсы в соответствии
    | с требованиями вашего приложения.
    |
    */

    'failed'    => 'Недействительные учетные данные.',
    'helpers'   => [
        'password'  => 'Показать/Скрыть пароль',
    ],
    'login'     => [
        'fields'                => [
            'email'     => 'Электронная почта',
            'password'  => 'Пароль',
        ],
        'login_with_facebook'   => 'Войти через Facebook',
        'login_with_google'     => 'Войти через Google',
        'login_with_twitter'    => 'Войти через Twitter',
        'new_account'           => 'Создать новый аккаунт',
        'or'                    => 'ИЛИ',
        'password_forgotten'    => 'Забыли пароль?',
        'remember_me'           => 'Запомнить меня',
        'submit'                => 'Войти',
        'title'                 => 'Вход',
    ],
    'register'  => [
        'already_account'           => 'Уже есть аккаунт?',
        'errors'                    => [
            'email_already_taken'   => 'Аккаунт с такой электронной почтой уже зарегистрирован.',
            'general_error'         => 'При создании вашего аккаунта произошла ошибка. Пожалуйста, попробуйте еще раз.',
        ],
        'fields'                    => [
            'email'     => 'Электронная почта',
            'name'      => 'Имя пользователя',
            'password'  => 'Пароль',
            'tos_clean' => 'Я соглашаюсь с :privacy',
        ],
        'register_with_facebook'    => 'Регистрация через Facebook',
        'register_with_google'      => 'Регистрация через Google',
        'register_with_twitter'     => 'Регистрация через Twitter',
        'submit'                    => 'Зарегистрироваться',
        'title'                     => 'Регистрация',
    ],
    'reset'     => [
        'fields'    => [
            'email'                 => 'Адрес электронной почты',
            'password'              => 'Пароль',
            'password_confirmation' => 'Подтвердите ваш пароль',
        ],
        'send'      => 'Отправить ссылку на восстановление пароля',
        'submit'    => 'Восстановить пароль',
        'title'     => 'Восстановление пароля',
    ],
    'throttle'  => 'Слишком много попыток входа. Пожалуйста, попробуйте снова через :seconds секунд.',
];
