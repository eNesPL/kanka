<?php

return [
    'failed'    => 'Los datos introducidos no coinciden con ningún usuario registrado.',
    'helpers'   => [
        'password'  => 'Mostrar/ocultar contraseña',
    ],
    'login'     => [
        'fields'                => [
            'email'     => 'Email',
            'password'  => 'Contraseña',
        ],
        'login_with_facebook'   => 'Acceder con Facebook',
        'login_with_google'     => 'Acceder con Google',
        'login_with_twitter'    => 'Acceder con Twitter',
        'new_account'           => 'Crear cuenta',
        'or'                    => 'o bien',
        'password_forgotten'    => '¿Olvidaste tu contraseña?',
        'remember_me'           => 'Recordar',
        'submit'                => 'Acceder',
        'title'                 => 'Acceder',
    ],
    'register'  => [
        'already_account'           => '¿Ya tienes una cuenta?',
        'errors'                    => [
            'email_already_taken'   => 'Ya existe una cuenta asociada a este correo electrónico.',
            'general_error'         => 'Ha ocurrido un error mientras se registraba la cuenta. Inténtalo de nuevo.',
        ],
        'fields'                    => [
            'email'     => 'Correo electrónico',
            'name'      => 'Usuario',
            'password'  => 'Contraseña',
            'tos_clean' => 'Acepto los :privacy',
        ],
        'register_with_facebook'    => 'Registrarse con Facebook',
        'register_with_google'      => 'Registrarse con Google',
        'register_with_twitter'     => 'Registrarse con Twitter',
        'submit'                    => 'Registrarse',
        'title'                     => 'Registrarse',
    ],
    'reset'     => [
        'fields'    => [
            'email'                 => 'Dirección de correo electronico',
            'password'              => 'Contraseña',
            'password_confirmation' => 'Confirma la contraseña',
        ],
        'send'      => 'Enviar enlace para restablecer la contraseña',
        'submit'    => 'Restablecer contraseña',
        'title'     => 'Restablecer contraseña',
    ],
    'throttle'  => 'Demasiados intentos de acceso. Por favor inténtelo en :seconds segundos.',
];
