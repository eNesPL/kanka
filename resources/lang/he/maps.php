<?php

return [
    'actions'       => [
        'back'      => 'חזרה ל:name',
        'edit'      => 'ערוך מפה',
        'explore'   => 'חקור',
    ],
    'create'        => [
        'title' => 'מפה חדשה',
    ],
    'destroy'       => [],
    'edit'          => [],
    'errors'        => [
        'dashboard' => [
            'missing'   => 'מפה זו זקוקה לתמונה כדי להופיע במסך הבית.',
        ],
        'explore'   => [
            'missing'   => 'יש להוסיף קובץ תמונה למפה לפני שניתן לחקור אותה.',
        ],
    ],
    'fields'        => [
        'distance_measure'  => 'מדידת מרחק',
        'distance_name'     => 'יחידת מידה',
        'grid'              => 'משבצות',
        'initial_zoom'      => 'זום התחלתי',
        'map'               => 'מפת אם',
        'maps'              => 'מפות',
        'max_zoom'          => 'זום מקסימלי',
        'min_zoom'          => 'זום מינימלי',
        'name'              => 'שם',
        'type'              => 'סוג',
    ],
    'helpers'       => [
        'descendants'       => 'רשימה זו כוללת את כל המפות שהן צאצאים של מפה זו, לא רק את הצאצאים הישירים שלה.',
        'distance_measure'  => 'לתת למפה יחידת מידה תאפשר שימוש בכלי המדידה.',
        'grid'              => 'הגדר רשת משבצות שיוצגו מעל המפה.',
        'initial_zoom'      => 'דרגת הזום כשהמפה נטענת. ברירת המחדל היא :default, הערך המקסימליה הוא :max והערך המינימלי הוא :min.',
        'max_zoom'          => 'המקסימום שאפשר לעשות זום אין. ברירת המחדל היא :default, והמקסימום האפשרי הוא :max.',
        'min_zoom'          => 'המקסימום שאפשר לעשות זום אאוט. ברירת המחדל היא :default, והמינימום האפשרי הוא :min.',
        'missing_image'     => 'יש לשמור את המפה עם תמונה לפני שניתן להוסיף שכבות וסמנים.',
    ],
    'index'         => [
        'title' => 'מפות',
    ],
    'maps'          => [
        'title' => 'המפות של :name',
    ],
    'panels'        => [
        'groups'    => 'קבוצות',
        'layers'    => 'שכבות',
        'markers'   => 'סמנים',
        'settings'  => 'הגדרות',
    ],
    'placeholders'  => [
        'distance_measure'  => 'יחידות לפיקסל',
        'distance_name'     => 'שם יחידת המרחק (ק"מ, מיל, שנת אור)',
        'grid'              => 'גודל המשבצות בפיקסלים. השאר ריק כדי להסתיר.',
        'name'              => 'שם המפה',
        'type'              => 'מבוך, עיר, גלקסיה',
    ],
    'show'          => [
        'tabs'  => [
            'maps'  => 'מפות',
        ],
    ],
];
