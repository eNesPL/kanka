<?php

return [
    'actions'   => [
        'export'    => 'Експорт даних кампанії',
    ],
    'errors'    => [
        'limit' => 'Кампанію уже було експортовано сьогодні. Будь ласка, повторіть спробу завтра.',
    ],
    'helpers'   => [
        'import'    => 'Ці експорти неможливо ре-імпортувати, і вони створені більше для вашого спокою або якщо ви більше не користуєтеся Kanka. Для більш надійного експорту та імпорту, будь ласка, зверніть увагу на :api.',
        'intro'     => 'Адміністратори кампанії можуть експортувати дані один раз на день. Це згенерує два zip-файли: перший містить усі сутності кампанії, а другий - усі зображення. Ви отримаєте від Kanka сповіщення, коли ці файли будуть готові для завантаження.',
        'json'      => 'Вміст кампанії буде збережено в форматі JSON. Цей файл заснований на тексті, і ви зможете відкрити його у текстовому редакторі або в браузері.',
    ],
    'success'   => 'Кампанія готується до експорту. Kanka повідомить вам, коли файли будуть готові для завантаження.',
    'title'     => 'Експорт кампаній',
];