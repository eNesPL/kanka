<?php

return [
    'actions'       => [
        'add_epoch'         => 'Aggiungi un\'epoca',
        'add_intercalary'   => 'Aggiungi giorni intercalari',
        'add_month'         => 'Aggiungi un mese',
        'add_moon'          => 'Aggiungi una luna',
        'add_reminder'      => 'Aggiungi un promemoria',
        'add_season'        => 'Aggiungi una stagione',
        'add_weather'       => 'Imposta il meteo',
        'add_week'          => 'Aggiungi una settimana con un nome',
        'add_weekday'       => 'Aggiungi un giorno della settimana',
        'add_year'          => 'Aggiungi un nome dell\'anno',
        'set_today'         => 'Imposta come giorno corrente',
        'today'             => 'Oggi',
    ],
    'checkboxes'    => [
        'is_recurring'  => 'Accade ogni anno',
    ],
    'create'        => [
        'success'   => 'Calendario \':name\' creato.',
        'title'     => 'Nuovo Calendario',
    ],
    'destroy'       => [
        'success'   => 'Calendario \':name\' rimosso.',
    ],
    'edit'          => [
        'success'   => 'Calendario \':name\' aggiornato.',
        'title'     => 'Modifica Calendario :name',
        'today'     => 'Data del calendario aggiornata.',
    ],
    'event'         => [
        'actions'   => [
            'delete-confirm'    => 'questo promemoria',
            'existing'          => 'Entità esistente',
            'new'               => 'Nuovo Evento',
            'switch'            => 'Cambia scelta',
        ],
        'create'    => [
            'success'   => 'Evento del calendario creato',
            'title'     => 'Aggiungi un Evento del Calendario su :name',
        ],
        'destroy'   => 'Evento rimosso dal calendario \':name\'',
        'edit'      => [
            'success'   => 'Evento del calendario aggiornato.',
            'title'     => 'Aggiorna un Evento del Calendario per :name',
        ],
        'helpers'   => [
            'add'               => 'Aggiungi un evento esistente a questo calendario',
            'new'               => 'O crea un nuovo evento semplicemente inserendone il nome.',
            'other_calendar'    => 'Stai modificando un promemoria che si trova sul calendario :calendar',
        ],
        'modal'     => [
            'title' => 'Aggiungi un evento al calendario',
        ],
        'success'   => 'Evento \':event\' aggiunto al calendario.',
    ],
    'events'        => [
        'title' => 'Eventi del Calendario :name',
    ],
    'fields'        => [
        'calendar'              => 'Calendario sovraordinato',
        'calendars'             => 'Calendari',
        'colour'                => 'Colore',
        'comment'               => 'Commento',
        'current_day'           => 'Giorno corrente',
        'current_month'         => 'Mese corrente',
        'current_year'          => 'Anno corrente',
        'date'                  => 'Data corrente',
        'day'                   => 'Giorno',
        'has_leap_year'         => 'Ha anni bisestili',
        'intercalary'           => 'Giorni intercalari',
        'is_incrementing'       => 'Data di Avanzamento',
        'is_recurring'          => 'Ricorrente',
        'leap_year_amount'      => 'Aggiungi Giorni',
        'leap_year_month'       => 'Mese',
        'leap_year_offset'      => 'Ogni',
        'leap_year_start'       => 'Anno bisestile',
        'length'                => 'Durata Evento',
        'length_days'           => ':count giorno|:count giorni',
        'month'                 => 'Mese',
        'months'                => 'Mesi',
        'moons'                 => 'Lune',
        'name'                  => 'Nome',
        'parameters'            => 'Parametri',
        'recurring_periodicity' => 'Periodicità Ricorrente',
        'recurring_until'       => 'Ricorrente fino all\'Anno',
        'reset'                 => 'Ripristino Settimanale',
        'seasons'               => 'Stagioni',
        'start_offset'          => 'Inizio ritardo',
        'suffix'                => 'Suffisso',
        'type'                  => 'Tipo',
        'week_names'            => 'Nomi della Settimana',
        'weekdays'              => 'Giorni della Settimana',
        'year'                  => 'Anno',
    ],
    'helpers'       => [
        'month_type'    => 'I mesi intercalari non utilizzano i giorni della settimana, ma influenzano comunque le fasi lunari e le stagioni.',
        'moon_offset'   => 'Per impostazione predefinita, la prima luna piena appare il primo giorno dell\'anno 0. Cambiando il ritardo si modifica il momento in cui viene visualizzata la prima luna piena. Questo valore può essere negativo (fino alla lunghezza del primo mese) o positivo (fino alla lunghezza del primo mese).',
        'nested_parent' => 'Visualizzazione dei calendari di :parent.',
        'nested_without'=> 'Visualizzazione dei calendari che non hanno un calendario sovraordinato. Clicca su un file per vedere i sottocalendari.',
        'start_offset'  => 'Per impostazione predefinita, il calendario inizia col primo giorno della settimana dell\'anno 0. Cambiare questo campo influenzerà la collocazione del primo giorno del calendario.',
    ],
    'hints'         => [
        'event_length'      => 'La durata prevista per l\'evento. Un evento può durare oltre due mesi.',
        'intercalary'       => 'Giorni che non rientrano nei normali mesi e settimane. Non influenzano i giorni della settimana, ma influenzano le fasi lunari.',
        'is_incrementing'   => 'I calendari con avanzamento incrementeranno automaticamente la loro data corrente alle 00:00 UTC.',
        'is_recurring'      => 'Un evento può essere impostato come ricorrente. Esso riapparirà ogni anno alla stessa data.',
        'months'            => 'Il tuo calendario deve avere almeno 2 mesi.',
        'moons'             => 'Aggiungere lune le farà apparire sul calendario ad ogni luna piena e luna nuova. Se il ciclo di luna piena è maggiore di 10 giorni, saranno mostrate anche la luna calante e la luna crescente.',
        'parent_calendar'   => 'I calendari includono i promemoria e i tempi meteorologici del calendario sovraordinato.',
        'reset'             => 'Fai sempre coincidere l\'inizio del mese o dell\'anno col primo giorno della settimana.',
        'seasons'           => 'Crea stagioni per il tuo calendario specificando quando ha inizio ciascuna di esse. Kanka si occuperà del resto.',
        'weekdays'          => 'Imposta i tuoi nomi dei giorni della settimana. Sono necessari almeno 2 giorni della settimana.',
        'weeks'             => 'Definisci alcuni nomi per le settimane più importanti del tuo calendario.',
        'years'             => 'Alcuni anni sono così importanti che hanno un nome specifico.',
    ],
    'index'         => [
        'title' => 'Calendari',
    ],
    'layouts'       => [
        'month' => 'Mese',
        'year'  => 'Anno',
    ],
    'modals'        => [
        'switcher'  => [
            'title' => 'Cambio Anno',
        ],
    ],
    'month_types'   => [
        'intercalary'   => 'Intercalari',
        'standard'      => 'Normali',
    ],
    'options'       => [
        'events'    => [
            'recurring_periodicity' => [
                'fullmoon'      => 'Luna piena',
                'fullmoon_name' => ':moon luna piena',
                'month'         => 'Mensile',
                'newmoon'       => 'Luna nuova',
                'newmoon_name'  => ':moon luna nuova',
                'none'          => 'Nessuno',
                'unnamed_moon'  => 'Luna :number',
                'year'          => 'Annuale',
            ],
        ],
        'resets'    => [
            ''      => 'Nessuno',
            'month' => 'Mensile',
            'year'  => 'Annuale',
        ],
    ],
    'panels'        => [
        'intercalary'   => 'Giorni di intercalazione',
        'leap_year'     => 'Anno Bisestile',
        'months'        => 'Mesi',
        'weeks'         => 'Settimane',
        'years'         => 'Anni Nominati',
    ],
    'parameters'    => [
        'intercalary'   => [
            'length'    => 'Durata in giorni',
            'month'     => 'Alla fine di quale mese',
            'name'      => 'Nome dell\'intercalazione',
        ],
        'month'         => [
            'alias' => 'Alias del Mese',
            'length'=> 'Numero di Giorni',
            'name'  => 'Nome del Mese',
            'type'  => 'Tipo',
        ],
        'moon'          => [
            'fullmoon'  => 'Luna piena ogni (giorni)',
            'name'      => 'Nome della Luna',
            'offset'    => 'Ritardo della prima luna piena',
        ],
        'seasons'       => [
            'day'   => 'Giorno iniziale',
            'month' => 'Mese iniziale',
            'name'  => 'Nome della Stagione',
        ],
        'weeks'         => [
            'name'      => 'Nome della Settimana',
            'number'    => 'Numero',
        ],
        'year'          => [
            'name'      => 'Nome dell\'Anno',
            'number'    => 'Anno',
        ],
    ],
    'placeholders'  => [
        'colour'            => 'Colore',
        'comment'           => 'Compleanno, festival, solstizio',
        'date'              => 'La data corrente',
        'leap_year_amount'  => 'Numero di giorni aggiunti in un anno bisestile',
        'leap_year_month'   => 'Mese al quale i giorni sono aggiunti',
        'leap_year_offset'  => 'Ogni quanti anni è presente un anno bisestile',
        'leap_year_start'   => 'Il primo anno bisestile',
        'length'            => 'Durata dell\'Evento in giorni',
        'months'            => 'Numero di mesi in un anno',
        'name'              => 'Nome del calendario',
        'recurring_until'   => 'Ultimo anno per la ricorrenza (lascia vuoto per ripetere in eterno)',
        'seasons'           => 'Numero di stagioni',
        'suffix'            => 'Suffisso dell\'Era corrente (AC, DC)',
        'type'              => 'Tipo del calendario',
        'weekdays'          => 'Numero di giorni in una settimana',
    ],
    'show'          => [
        'missing_details'   => 'Questo calendario non può essere visualizzato. I Calendari necessitano almeno di 2 mesi e 2 giorni della settimana per essere visualizzati correttamente.',
        'moon_full_moon'    => ':moon Luna Piena',
        'moon_new_moon'     => ':moon Luna Nuova',
        'moon_waning_moon'  => ':moon Decrescente',
        'moon_waxing_moon'  => ':moon Crescente',
        'tabs'              => [
            'events'    => 'Eventi del Calendario',
            'weather'   => 'Tempo Atmosferico',
        ],
    ],
    'sorters'       => [
        'after' => 'Oggi e dopo',
        'before'=> 'Fino a oggi',
    ],
    'validators'    => [
        'moon_offset'   => 'Il ritardo della prima luna piena non può essere più lungo del primo mese del calendario.',
    ],
];
