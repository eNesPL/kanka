<?php

return [
    'actions'       => [
        'add_epoch'         => 'Voeg een tijdperk toe',
        'add_intercalary'   => 'Voeg schrikkeldagen toe',
        'add_month'         => 'Voeg een maand toe',
        'add_moon'          => 'Voeg een maan toe',
        'add_season'        => 'Voeg een seizoen toe',
        'add_week'          => 'Voeg een benoemde week toe',
        'add_weekday'       => 'Voeg een weekdag toe',
        'add_year'          => 'Voeg een jaarnaam toe',
        'set_today'         => 'Instellen als huidige dag',
        'today'             => 'Vandaag',
    ],
    'checkboxes'    => [
        'is_recurring'  => 'Vindt elk jaar plaats',
    ],
    'create'        => [
        'success'   => 'Kalender \':name\' gemaakt',
        'title'     => 'Nieuwe Kalender',
    ],
    'destroy'       => [
        'success'   => 'Kalender \':name\' verwijderd',
    ],
    'edit'          => [
        'success'   => 'Kalender \':name\' bijgewerkt',
        'title'     => 'Wijzig Kalender :name',
        'today'     => 'Kalender datum bijgewerkt',
    ],
    'event'         => [
        'actions'   => [
            'existing'  => 'Bestaande entiteit',
            'new'       => 'Nieuwe gebeurtenis',
            'switch'    => 'Wijzig keuze',
        ],
        'create'    => [
            'success'   => 'Kalender gebeurtenis gemaakt.',
            'title'     => 'Voeg een Kalender Gebeurtenis toe aan :name',
        ],
        'destroy'   => 'Gebeurtenis verwijderd uit kalender \':name\'.',
        'edit'      => [
            'success'   => 'Kalender gebeurtenis bijgewerkt.',
            'title'     => 'Werk Kalender Gebeurtenis bij voor :naam',
        ],
        'helpers'   => [
            'add'               => 'Voeg een bestaande gebeurtenis toe aan deze kalender.',
            'new'               => 'Of maak een nieuwe gebeurtenis door simpelweg een naam op te geven.',
            'other_calendar'    => 'Je bewerkt een herinnering die in de kalender :calendar staat.',
        ],
        'modal'     => [
            'title' => 'Voeg een gebeurtenis toe aan de kalender',
        ],
        'success'   => 'Gebeurtenis \':event\' toegevoegd aan de kalender',
    ],
    'events'        => [
        'title' => 'Kalender :name Gebeurtenissen',
    ],
    'fields'        => [
        'calendar'              => 'Bovenliggende Kalender',
        'calendars'             => 'Kalenders',
        'colour'                => 'Kleur',
        'comment'               => 'Opmerking',
        'current_day'           => 'Huidige Dag',
        'current_month'         => 'Huidige Maand',
        'current_year'          => 'Huidig Jaar',
        'date'                  => 'Huidige Datum',
        'has_leap_year'         => 'Heeft schrikkeljaren',
        'intercalary'           => 'Schrikkeldagen',
        'is_incrementing'       => 'Vooruitgaande Datum',
        'is_recurring'          => 'Terugkerend',
        'leap_year_amount'      => 'Voeg Dagen toe',
        'leap_year_month'       => 'Maand',
        'leap_year_offset'      => 'Elke',
        'leap_year_start'       => 'Schrikkeljaar',
        'length'                => 'Gebeurtenis Duur',
        'length_days'           => ':count dag|:count dagen',
        'months'                => 'Maanden',
        'moons'                 => 'Manen',
        'name'                  => 'Naam',
        'parameters'            => 'Parameters',
        'recurring_periodicity' => 'Terugkerende periodiciteit',
        'recurring_until'       => 'Terugkerend tot jaar',
        'reset'                 => 'Wekelijkse reset',
        'seasons'               => 'Seizoenen',
        'start_offset'          => 'Begin offset',
        'suffix'                => 'Suffix',
        'type'                  => 'Type',
        'week_names'            => 'Week Namen',
        'weekdays'              => 'Week Dagen',
    ],
    'helpers'       => [
        'month_type'    => 'Schrikkelmaanden gebruiken geen weekdagen, maar hebben nog steeds invloed op manen en seizoenen.',
        'start_offset'  => 'Standaard begint de kalender op de eerste weekdag van jaar 0. Het wijzigen van dit veld heeft invloed op de plaats van de eerste dag van de kalender.',
    ],
    'hints'         => [
        'intercalary'       => 'Dagen die buiten de standaard maanden en weken vallen. Ze hebben geen invloed op weekdagen maar op maan cycli.',
        'is_incrementing'   => 'Bij vooruitgaande kalenders wordt de huidige datum automatisch verhoogd om 00:00 UTC.',
        'is_recurring'      => 'Een gebeurtenis kan worden ingesteld op terugkerend. Het zal elk jaar op dezelfde datum opnieuw verschijnen.',
        'months'            => 'Je kalender moet minimaal 2 maanden bevatten.',
        'moons'             => 'Door manen toe te voegen, verschijnen ze bij elke volle en nieuwe maan in de kalender. Als de periode van volle maan langer is dan 10 dagen, worden ook afnemende en wassende manen weergegeven.',
        'parent_calendar'   => 'Als je de kalender een bovenliggende kalender geeft, worden de herinneringen en weerseffecten van de bovenliggende kalender meegenomen.',
        'reset'             => 'Begin altijd aan het begin van de maand of het jaar op de eerste weekdag.',
        'seasons'           => 'Maak seizoenen voor je kalender door aan te geven wanneer ze beginnen. Kanka zorgt voor de rest.',
        'weekdays'          => 'Stel je weekdag namen in. Er zijn minimaal 2 werkdagen vereist.',
        'weeks'             => 'Definieer een aantal namen voor de belangrijkste weken van je kalender.',
        'years'             => 'Sommige jaren zijn zo belangrijk dat ze hun eigen naam hebben.',
    ],
    'index'         => [
        'title' => 'Kalenders',
    ],
    'layouts'       => [
        'month' => 'Maand',
        'year'  => 'Jaar',
    ],
    'modals'        => [
        'switcher'  => [
            'title' => 'Jaar Wisselaar',
        ],
    ],
    'month_types'   => [
        'intercalary'   => 'Intercalary',
        'standard'      => 'Standaard',
    ],
    'options'       => [
        'events'    => [
            'recurring_periodicity' => [
                'month' => 'Maandelijks',
                'year'  => 'Jaarlijks',
            ],
        ],
        'resets'    => [
            ''      => 'Geen',
            'month' => 'Maandelijks',
            'year'  => 'Jaarlijks',
        ],
    ],
    'panels'        => [
        'intercalary'   => 'Schrikkeldagen',
        'leap_year'     => 'Schrikkeljaar',
        'months'        => 'Maanden',
        'weeks'         => 'Weken',
        'years'         => 'Genoemde Jaren',
    ],
    'parameters'    => [
        'intercalary'   => [
            'length'    => 'Duur in dagen',
            'month'     => 'Aan het einde van welke maand',
            'name'      => 'Naam van intercalatie',
        ],
        'month'         => [
            'alias' => 'Maand Alias',
            'length'=> 'Dagen',
            'name'  => 'Maand Naam',
            'type'  => 'Type',
        ],
        'moon'          => [
            'fullmoon'  => 'Volle maan elke (dagen)',
            'name'      => 'Maan Naam',
            'offset'    => 'Eerste volle maan offset',
        ],
        'seasons'       => [
            'day'   => 'Dag start',
            'month' => 'Maand start',
            'name'  => 'Seizoen Naam',
        ],
        'weeks'         => [
            'name'      => 'Week Naam',
            'number'    => 'Nummer',
        ],
        'year'          => [
            'name'      => 'Jaar Naam',
            'number'    => 'Jaar',
        ],
    ],
    'placeholders'  => [
        'colour'            => 'Kleur',
        'comment'           => 'Geboortedag, festival, zonnestilstand',
        'date'              => 'De huidige datum',
        'leap_year_amount'  => 'Aantal dagen toegevoegd aan een schrikkeljaar',
        'leap_year_month'   => 'Maand waarop dagen worden opgeteld',
        'leap_year_offset'  => 'Elke hoeveel jaar is een schrikkeljaar',
        'leap_year_start'   => 'Eerste jaar dat een schrikkeljaar is',
        'length'            => 'Gebeurtenis duur in dagen',
        'months'            => 'Aantal maanden in een jaar',
        'name'              => 'Naam van de kalender',
        'recurring_until'   => 'Laatste terugkerend jaar (leeg laten voor altijd terugkerend)',
        'seasons'           => 'Aantal seizoenen',
        'suffix'            => 'Huidig Tijdperk Suffix (nC, vC)',
        'type'              => 'Type van de kalender',
        'weekdays'          => 'Aantal dagen in een week',
    ],
    'show'          => [
        'missing_details'   => 'Deze kalender kan niet worden weergegeven. Kalenders hebben minimaal 2 maanden en 2 weekdagen nodig om correct te worden weergegeven.',
        'moon_full_moon'    => ':moon Volle Maan',
        'moon_new_moon'     => ':moon Nieuwe Maan',
        'moon_waning_moon'  => ':moon afnemende',
        'moon_waxing_moon'  => ':moon Wassende',
        'tabs'              => [
            'events'    => 'Kalender Gebeurtenissen',
            'weather'   => 'Weer',
        ],
    ],
];
