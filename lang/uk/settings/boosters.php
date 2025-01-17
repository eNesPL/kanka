<?php

return [
    'actions'   => [
        'boost_name'    => 'Бустити :name',
    ],
    'available' => 'Доступні бустери :amount/:total',
    'benefits'  => [
        'boosted'       => 'Підсилення кампанії бустером :one відкриває доступ до :marketplace, опцій теми, більших завантажень для всіх учасників, відновлення видалених сутностей та :more.',
        'more'          => 'більше дивовижних функцій',
        'superboosted'  => 'Суперпідсилення кампанії :amount бустерами відкриє усі привілеї підсиленої кампанії, а також галерею кампанії, логи усіх змін до сутностей та :more.',
    ],
    'boost'     => [
        'actions'   => [
            'confirm'   => 'Підсилити!',
            'remove'    => 'Зупинити бустери :campaign',
            'subscribe' => 'Передплатити Kanka',
            'upgrade'   => 'Покращити передплату',
        ],
        'confirm'   => 'Як чудово! Ви збираєтеся підсилити :campaign. Це призначить один (:cost) із доступних бустерів кампанії.',
        'duration'  => 'Призначені бустери залишаються такими, поки ви не видалити їх, або поки не завершиться ваша передплата.',
        'errors'    => [
            'boosted'           => 'О-о! Виглядає, що :campaign уже підсилена!',
            'out-of-boosters'   => 'О ні! Ви не маєте достатньо бустерів. Ви маєте :available, а потребуєте :cost. Або перестаньте бустити інші кампанії, або :upgrade.',
        ],
        'pitch'     => 'Станьте передплатником, щоб розблокувати бустери кампанії.',
        'success'   => 'Кампанія :campaign зараз підсилена. Насолоджуйтеся усіма новими чудовими функціями!',
        'title'     => 'Підсилити :campaign',
        'upgrade'   => 'підвищити передплату',
    ],
    'campaign'  => [
        'boosted'       => 'Підсилена :user від :time',
        'superboosted'  => 'Суперпідсилена :user від :time',
        'unboosted'     => 'Непідсилена',
    ],
    'intro'     => [
        'anyone'    => 'У вас немає обмежень щодо підсилення тільки тих кампаній, що ви створили. Ви можете підсилити будь-яку кампанію, до якої належите або яку можете бачити. Це включає кампанії, де ви гравці, або :public, за якими ви слідкуєте.',
        'data'      => 'Коли кампанія більше не підсилена, доступ до функцій бустера видалений. Але вміст не видалений, тож повернення бустерів у майбутньому відновить доступ до вмісту та функцій.',
        'first'     => 'Просунуті функція розблоковуються бустери, які ви призначаєте, щоб підсилити або суперпідсилити кампанію. Кількість доступних вам бустерів визначає ваша :subscription. Ця кількість доступна вам весь час, поки ви є передплатником. Посилення кампанії призначає одни з ваших бустерів, тоді як суперпідсилення потребує три такі бустери.',
    ],
    'pitch'     => [
        'benefits'      => [
            'backup'        => 'Відновлення попередньо видалених сутностей упродовж :amount днів',
            'customisable'  => 'Повне налаштування вигляду кампанії',
            'entities'      => 'Кращий контроль над тим, як сутності виглядають на поводяться',
            'icons'         => 'Доступ до тисяч прекрасних значків для мап та хронік',
            'relations'     => 'Досліджуйте зв\'язки сутностей візуально в візуальному редакторі',
            'title'         => 'Підсилені кампанії отримують',
            'upload'        => 'Більший розмір завантажень для усіх учасників',
        ],
        'description'   => 'Призначте бустери до кампаній і допоможіть відкрити дивовижні функції для всіх залучених. Не вражені підсиленою кампанією? Ми можемо запропонувати вам суперпідсилення!',
        'more'          => 'Прогляньте повний список переваг на нашій сторінці :boosters.',
        'title'         => 'Підніміть кампанію на наступних рівень, налаштовуючи переваги для всіх її учасників',
    ],
    'ready'     => [
        'available'         => 'Доступні вам бустери кампанії.',
        'pricing'           => 'Усі наші рівні передплати включають щонайменше один бустер кампанії і починаються з :amount на місяць.',
        'pricing-amount'    => ':currency:amount',
        'title'             => 'Підсилити кампанію',
    ],
    'superboost'=> [
        'actions'   => [
            'confirm'   => 'Суперпідсилити!',
            'remove'    => 'Припинити підсилення :campaign',
        ],
        'confirm'   => 'Як дивовижно! Ви збираєтеся суперпідсилити :campaign. Це призначить їй три (:cost) з доступних вам бустерів.',
        'errors'    => [
            'boosted'   => 'О-о, виглядає, що ця :campaign уже суперпідсилена!',
        ],
        'success'   => 'Кампанія :campaign тепер суперпідсилена. Насолоджуйтеся усіма новими чудовими функціями!',
        'title'     => 'Суперпідсилити :campaign',
        'upgrade'   => 'Готові до повноцінного досвіду з Kanka? Суперпідсилення :campaign призначить :cost додаткові бустери кампанії.',
    ],
    'title'     => 'Бустери кампанії',
    'unboost'   => [
        'confirm'   => 'Так, це точно',
        'status'    => [
            'boosting'      => 'підсилення',
            'superboosting' => 'суперпідсилення',
        ],
        'success'   => 'Кампанія :campaign більше не підсилена, і ваші бустери знову доступні.',
        'title'     => 'Зняти підсилення кампанії',
        'warning'   => 'Ви впевнені, що хочете зупинити :action :campaign? Це звільнить ваші призначені бустери й приховає увесь вміст та функції, пов\'язані з привілеями, поки кампанію не буде підсилено знову.',
    ],
];
