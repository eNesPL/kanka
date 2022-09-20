<?php

return [
    'actions'                   => [
        'actions'           => 'Akcie',
        'apply'             => 'Použiť',
        'back'              => 'Naspäť',
        'change'            => 'Zmeniť',
        'copy'              => 'Kopírovať',
        'copy_mention'      => 'Kopírovať [ ] referenciu',
        'copy_to_campaign'  => 'Kopírovať do kampane',
        'explore_view'      => 'Vnorené zobrazenie',
        'export'            => 'Exportovať (PDF)',
        'find_out_more'     => 'Dozvedieť sa viac',
        'go_to'             => 'Prejsť na :name',
        'help'              => 'Pomoc',
        'json-export'       => 'Exportovať (json)',
        'manage_links'      => 'Spravovať linky',
        'move'              => 'Premiestniť',
        'new'               => 'Nový',
        'new_child'         => 'Nový podobjekt',
        'new_post'          => 'Nová poznámka objektu',
        'next'              => 'Ďalej',
        'print'             => 'Tlačiť',
        'reset'             => 'Resetovať',
        'transform'         => 'Transformovať',
    ],
    'add'                       => 'Pridať',
    'alerts'                    => [
        'copy_attribute'    => 'Referencia na atribút bola skopírovaná do tvojej schránky.',
        'copy_invite'       => 'Link na prístup do kampane bol skopírovaný do tvojej schránky.',
        'copy_mention'      => 'Rozšírená referencia na objekt bola skopírovaná do tvojej schránky.',
    ],
    'boosted'                   => 'Boostnutá',
    'boosted_campaigns'         => 'Boostnuté kampane',
    'bulk'                      => [
        'actions'       => [
            'edit'          => 'Hromadná úprava a kategórie',
            'permissions'   => 'Zmeniť oprávnenia',
            'templates'     => 'Aplikovať šablónu atribútov',
        ],
        'age'           => [
            'helper'    => 'Môžeš použiť + a - pred číslom na úpravu veku o danú hodnotu.',
        ],
        'buttons'       => [
            'label' => 'Pre vybrané',
        ],
        'delete'        => [
            'warning'   => 'Naozaj chceš odstrániť vybrané objekty?',
        ],
        'edit'          => [
            'tagging'   => 'Akcie s kategóriami',
            'tags'      => [
                'add'       => 'Pridať',
                'remove'    => 'Odstrániť',
            ],
            'title'     => 'Úprava viacerých objektov',
        ],
        'errors'        => [
            'admin'     => 'Iba administrátori kampane vedia zmeniť súkromný štatút objektu.',
            'general'   => 'Pri spracovávaní tvojej akcie došlo k chybe. Prosím, skús to opäť a kontaktuj nás, ak problém pretrváva. Hlásenie chyby: :hint.',
        ],
        'permissions'   => [
            'fields'    => [
                'override'  => 'Prepísať',
            ],
            'helpers'   => [
                'override'  => 'Ak aktivované, oprávnenia vybratých objektov budú týmito prepísané. Ak deaktivované, vybrané oprávnenia budú pridané k predchádzajúcim.',
            ],
            'title'     => 'Zmeniť oprávnenia pre viaceré objekty',
        ],
        'success'       => [
            'copy_to_campaign'  => '{1} :count objekt bol skopírovaný do :campaign.|[2,4] :count objekty boli skopírované do :campaign.|[5,*] :count objektov bolo skopírovaných do :campaign.',
            'editing'           => '{1} :count objekt bol upravený.|[2,4] :count objekty boli upravené.|[5,*] :count objektov bolo upravených.',
            'editing_partial'   => '{1} :count/:total objekt bol upravený.|[2,4] :count/:total objekty boli upravené.|[5,*] :count/:total objektov bolo upravených.',
            'permissions'       => '{1} Oprávnenia zmenené pre :count objekt.|[2,4] Oprávnenia zmenené pre :count objekty.|[5,*] Oprávnenia zmenené pre :count objektov.',
            'private'           => '{1} :count objekt je teraz súkromný.|[2,4] :count objekty je teraz súkromné.|[5,*] :count objektov je teraz súkromných.',
            'public'            => '{1} :count objekt je teraz viditeľný.|[2,4] :count objekty sú teraz viditeľné.|[5,*] :count objektov je teraz viditeľných.',
            'templates'         => '{1} :count objekt má uplatnenú šablónu.|[2,4] :count objekty majú uplatnenú šablónu.|[5,*] :count objektov má uplatnenú šablónu.',
        ],
    ],
    'bulk_templates'            => [
        'bulk_title'    => 'Uplatniť šablónu na viaceré objekty',
    ],
    'cancel'                    => 'Zrušiť',
    'click_modal'               => [
        'close'     => 'Zavrieť',
        'confirm'   => 'Potvrdiť',
        'title'     => 'Potvrdiť akciu',
    ],
    'copy_to_campaign'          => [
        'bulk_title'    => 'Kopírovať objekty do inej kampane',
        'panel'         => 'Kopírovať',
        'title'         => 'Kopírovať :name do inej kampane',
    ],
    'create'                    => 'Vytvoriť',
    'datagrid'                  => [
        'empty' => 'Zatiaľ je tu prázdno.',
    ],
    'delete_modal'              => [
        'callout'           => 'Psst!',
        'close'             => 'Zatvoriť',
        'delete'            => 'Odstrániť',
        'description_v2'    => 'Odstraňuješ ":tag".',
        'permanent'         => 'Táto akcia je natrvalo.',
        'recoverable'       => 'Objekty je možné obnoviť až do :day dní s :boosted-campaign.',
        'title'             => 'Potvrdiť odstránenie',
    ],
    'destroy_many'              => [
        'success'   => ':count objekt zmazaný|:count objekty zmazané',
    ],
    'edit'                      => 'Upraviť',
    'errors'                    => [
        'boosted'                       => 'Táto funkcionalita je dostupná iba pre boostnuté kampane.',
        'boosted_campaigns'             => 'Funkcionalita je dostupná iba pre :boosted.',
        'cannot_move_node_into_itself'  => 'Vybraný nadradený objekt je neplatný, možno pretože má tento objekt priradený ako nadradený.',
        'node_must_not_be_a_descendant' => 'Neplatný objekt (kategória, miesto): bol by potomok samého seba.',
        'unavailable_feature'           => 'Funkcionalita nedostupná',
    ],
    'events'                    => [],
    'export'                    => 'Exportovať',
    'fields'                    => [
        'ability'               => 'Schopnosť',
        'attribute_template'    => 'Šablóna atribútov',
        'calendar'              => 'Kalendár',
        'calendar_date'         => 'Dátum',
        'character'             => 'Postava',
        'child'                 => 'Dieťa',
        'closed'                => 'Uzavretá',
        'colour'                => 'Farba',
        'copy_abilities'        => 'Kopírovať schopnosti',
        'copy_attributes'       => 'Kopírovať atribúty',
        'copy_inventory'        => 'Kopírovať inventár',
        'copy_links'            => 'Kopírovať linky objektu',
        'copy_permissions'      => 'Kopírovať oprávnenia (tieto majú prioritu pred nastavenými v karte oprávnení)',
        'copy_posts'            => 'Kopírovať príspevky (inkl. ich oprávnení)',
        'creator'               => 'Autor',
        'date_range'            => 'Obdobie',
        'dice_roll'             => 'Hod kockou',
        'entity'                => 'Objekt',
        'entity_type'           => 'Typ objektu',
        'entry'                 => 'Záznam',
        'event'                 => 'Udalosť',
        'excerpt'               => 'Výpis',
        'family'                => 'Rod',
        'files'                 => 'Súbory',
        'gallery_header'        => 'Záhlavie galérie',
        'gallery_image'         => 'Obrázok galérie',
        'has_attributes'        => 'S atribútmi',
        'has_entity_files'      => 'So súbormi v objektoch',
        'has_entity_notes'      => 'S poznámkami v objektoch',
        'has_image'             => 'S obrázkom',
        'header_image'          => 'Obrázok záhlavia',
        'image'                 => 'Obrázok',
        'is_closed'             => 'Diskusia bude uzavretá a nebude možné do nej pridávaťnové správy.',
        'is_private'            => 'Súkromný',
        'is_private_v3'         => 'Zobraziť iba pre členov :admin-role role. Toto má prednosť pre ostatnými oprávneniami.',
        'is_star'               => 'Pripnutý',
        'item'                  => 'Predmet',
        'journal'               => 'Denník',
        'location'              => 'Miesto',
        'locations'             => ':first v :second',
        'map'                   => 'Mapa',
        'name'                  => 'Názov',
        'organisation'          => 'Organizácia',
        'position'              => 'Pozícia',
        'privacy'               => 'Súkromie',
        'race'                  => 'Rasa',
        'replace_mentions'      => 'Zameniť referencie atribútov v zázname za tie nového objektu.',
        'tag'                   => 'Kategória',
        'tags'                  => 'Kategórie',
        'timeline'              => 'Časová os',
        'tooltip'               => 'Bublina',
        'type'                  => 'Typ',
        'visibility'            => 'Viditeľnosť',
    ],
    'files'                     => [
        'actions'   => [
            'drop'      => 'Kliknutím pridať alebo súbor pretiahnuť na toto miesto (Drag & Drop).',
            'manage'    => 'Spravovať súbory objektov',
        ],
        'errors'    => [
            'max'       => 'Max. počet (:max) súborov v tomto objekte dosiahnutý.',
            'no_files'  => 'Žiadne súbory.',
        ],
        'files'     => 'Nahraté súbory',
        'hints'     => [
            'limit'         => 'Do každého objektu môže byť nahratých maximálne :max súborov.',
            'limitations'   => 'Podporované formáty: jpg, png, gif a pdf. Max. veľkosť súboru: :size.',
        ],
        'title'     => 'Súbory objektu :name',
    ],
    'filter'                    => 'Filter',
    'filters'                   => [
        'all'                       => 'Filter zobrazenia všetkých podobjektov',
        'clear'                     => 'Resetovať filter',
        'copy_helper'               => 'Použi skopírované filtre v schránke pre hodnoty filtrov vo widgetoch na nástenke a rýchlych linkoch.',
        'copy_helper_no_filters'    => 'Definuj najprv nejaké filtre, aby bolo možné ich skopírovať do schránky.',
        'copy_to_clipboard'         => 'Kopírovať filtre do schránky',
        'direct'                    => 'Filter zobrazenia iba priamych podobjektov',
        'filtered'                  => 'Zobraziť :count z :total :entity.',
        'hide'                      => 'Skryť',
        'lists'                     => [
            'desktop'   => [
                'all'       => 'Zobraziť všetky podradené (:count)',
                'filtered'  => 'Zobraziť priamo podradené (:count)',
            ],
            'mobile'    => [
                'all'       => 'Zobraziť všetky (:count)',
                'filtered'  => 'Zobraziť priame (:count)',
            ],
        ],
        'mobile'                    => [
            'clear' => 'Vymazať',
            'copy'  => 'Schránka',
        ],
        'options'                   => [
            'exclude'   => 'Vylúčiť',
            'include'   => 'Zahrnúť',
            'none'      => 'Žiadne',
        ],
        'show'                      => 'Zobraziť filtre',
        'sorting'                   => [
            'asc'       => ':field vzostupne',
            'desc'      => ':field zostupne',
            'helper'    => 'Nastav poradie zoradenia výsledkov.',
        ],
        'title'                     => 'Filter',
    ],
    'fix-this-issue'            => 'Odstrániť tento problém',
    'forms'                     => [
        'actions'       => [
            'calendar'  => 'Doplniť dátum',
        ],
        'copy_options'  => 'Kopírovať nastavenia',
    ],
    'helpers'                   => [
        'copy_options'  => 'Kopírovať nasledujúce prepojené prvky zo zdroja do nového objektu.',
        'linking'       => 'Prepojenia s inými objektami',
        'nested_parent' => 'Zobrazenie podobjektov :parent.',
    ],
    'hidden'                    => 'Skrytý',
    'hints'                     => [
        'attribute_template'    => 'Aplikovať šablónu atribútov automaticky pri vytvorení objektu.',
        'calendar_date'         => 'Dátum umožňuje filtrovať zoznamy a zadať udalosť do vybraného kalendára.',
        'gallery_header'        => 'Ak objekt nemá záhlavie, zobraziť namiesto toho obrázok z galérie kampane.',
        'gallery_image'         => 'Ak objekt nemá obrázok, zobraziť namiesto toho obrázok z galérie kampane.',
        'header_image'          => 'Tento obrázok je umiestnený nad objekt. Odporúčame používať obrázok na šírku.',
        'image_limitations'     => 'Podporované formáty: :formats. Max. veľkosť súboru: :size.',
        'image_patreon'         => 'Chceš zvýšiť limit pre veľkosť súborov?',
        'image_recommendation'  => 'Odporúčané rozmery: :width x :height px.',
        'is_star'               => 'Pripnuté objekty sa zobrazia v menu objektu.',
        'tooltip'               => 'Nahradiť automaticky generovaný obsah bubliny týmto obsahom.',
        'visibility'            => 'Ak je viditeľnosť nastavená na "Admin", vidia to len členovia a členky roly Admin. Ak je nastavená na "Vlastník", môže to vidieť len ty.',
    ],
    'history'                   => [
        'created_clean'         => 'Vytvorené :name :date',
        'created_date_clean'    => 'Vytvorené :date',
        'unknown'               => 'Neznámy',
        'updated_clean'         => 'Posledná úprava :name :date',
        'updated_date_clean'    => 'Posledná úprava :date',
        'view'                  => 'Zobraziť protokol objektu',
    ],
    'image'                     => [
        'error' => 'Požadovaný obrázok nebolo možné stiahnuť. Zdá sa, že daná webová stránka nepovoľuje sťahovanie obrázkov (typické správanie Squarescape a DeviantArt) alebo že link už nie je platný.',
    ],
    'is_not_private'            => 'Tento objekt nie je aktuálne nastavený ako súkromný.',
    'is_private'                => 'Tento objekt je súkromný a viditeľný len pre členov s rolou Admin.',
    'keyboard-shortcut'         => 'Klávesová skratka :code',
    'legacy'                    => 'Dedičstvo',
    'linking_help'              => 'Ako môžem prepojiť ďalšie objekty?',
    'manage'                    => 'Spravovať',
    'navigation'                => [
        'cancel'            => 'Zrušiť',
        'or_cancel'         => 'alebo :cancel',
        'skip_to_content'   => 'Preskočiť navigáciu',
    ],
    'new_entity'                => [
        'error' => 'Prosím, prekontroluj tvoje zadanie.',
        'fields'=> [
            'name'  => 'Názov',
        ],
        'title' => 'Nový objekt',
    ],
    'panels'                    => [
        'appearance'            => 'Výzor',
        'attribute_template'    => 'Šablóna atribútov',
        'calendar_date'         => 'Dátum',
        'entry'                 => 'Záznam',
        'general_information'   => 'Všeobecné informácie',
        'move'                  => 'Premiestniť',
        'system'                => 'Systém',
    ],
    'permissions'               => [
        'action'            => 'Akcie',
        'actions'           => [
            'bulk'          => [
                'add'       => 'Povoliť',
                'deny'      => 'Zakázať',
                'ignore'    => 'Ignorovať',
                'remove'    => 'Odstrániť',
            ],
            'bulk_entity'   => [
                'allow'     => 'Povoliť',
                'deny'      => 'Zakázať',
                'inherit'   => 'Zdediť',
            ],
            'delete'        => 'Zmazať',
            'edit'          => 'Upraviť',
            'entity_note'   => 'Poznámky objektu',
            'read'          => 'Čítať',
            'toggle'        => 'Prepnúť',
        ],
        'allowed'           => 'Povolené',
        'fields'            => [
            'member'    => 'Člen',
            'role'      => 'Rola',
        ],
        'helper'            => 'Použi toto rozhranie na nastavenie oprávnení pre užívateľov a role pre daný objekt.',
        'helpers'           => [
            'setup' => 'Pomocou tohto rozhrania môžeš presne nastaviť ako role a užívatelia pracujú s týmto objektom. :allow dovolí užívateľovi alebo role urobiť danú akciu. :deny im túto akciu zakáže. :inherit preberie nastavenie z roly užívateľa alebo z oprávnení hlavnej roly. Užívateľ s nastavením :allow môže danú akciu vykonať, aj keď má jeho rola nastavenie :deny.',
        ],
        'inherited'         => 'Táto rola má už pridelené oprávnenia na tento typ objektov.',
        'inherited_by'      => 'Tomuto užívateľovi je pridelená rola :role, ktorá mu poskytuje oprávnenia na tento typ objektov.',
        'success'           => 'Oprávnenia uložené.',
        'title'             => 'Oprávnenia',
        'too_many_members'  => 'Táto kampaň má príliš veľa členov (> 10), aby boli zobrazení v tomto rozhraní. Prosím, použi tlačidlo Oprávnení na danom objekte, aby sa zobrazili detaily nastavenia oprávnení.',
    ],
    'placeholders'              => [
        'ability'       => 'Vybrať schopnosť',
        'calendar'      => 'Vybrať kalendár',
        'character'     => 'Vybrať postavu',
        'entity'        => 'Objekt',
        'event'         => 'Vybrať udalosť',
        'family'        => 'Vybrať rod',
        'gallery_image' => 'Vyber obrázok z galérie kampane',
        'image_url'     => 'Obrázok je možné pridať aj nahratím cez URL.',
        'item'          => 'Vyber predmet',
        'journal'       => 'Vyber denník',
        'location'      => 'Vyber miesto',
        'map'           => 'Vyber mapu',
        'note'          => 'Vyber poznámku',
        'organisation'  => 'Vyber organizáciu',
        'quest'         => 'Vyber úlohu',
        'race'          => 'Vyber rasu',
        'tag'           => 'Vyber kategóriu',
        'timeline'      => 'Vyber časovú os',
    ],
    'relations'                 => [
        'fields'    => [
            'location'  => 'Miesto',
            'name'      => 'Názov',
            'relation'  => 'Vzťah',
        ],
        'hint'      => 'Vzťahy je možné vytvoriť medzi objektami a zobraziť tak ich prepojenie.',
    ],
    'remove'                    => 'Zmazať',
    'rename'                    => 'Premenovať',
    'save'                      => 'Uložiť',
    'save_and_close'            => 'Uložiť a zavrieť',
    'save_and_copy'             => 'Uložiť a kopírovať',
    'save_and_new'              => 'Uložiť a nový',
    'save_and_update'           => 'Uložiť a upraviť',
    'save_and_view'             => 'Uložiť a zobraziť',
    'search'                    => 'Hľadať',
    'select'                    => 'Vybrať',
    'superboosted_campaigns'    => 'Superboostnuté kampane',
    'tabs'                      => [
        'abilities'     => 'Schopnosti',
        'assets'        => 'Materiály',
        'attributes'    => 'Atribúty',
        'boost'         => 'Boost',
        'calendars'     => 'Kalendáre',
        'connections'   => 'Vzťahy',
        'default'       => 'Štandardný',
        'events'        => 'Udalosti',
        'inventory'     => 'Inventár',
        'links'         => 'Linky',
        'map-points'    => 'Značky na mape',
        'mentions'      => 'Referencie',
        'menu'          => 'Menu',
        'notes'         => 'Poznámky',
        'overview'      => 'Prehľad',
        'permissions'   => 'Oprávnenia',
        'profile'       => 'Profil',
        'quests'        => 'Úlohy',
        'relations'     => 'Vzťahy',
        'reminders'     => 'Pripomienky',
        'story'         => 'Prehľad',
        'timelines'     => 'Časové osi',
        'tooltip'       => 'Bublina',
    ],
    'titles'                    => [
        'editing'   => 'Upravuje sa :name',
    ],
    'tooltips'                  => [
        'boosted_feature'   => 'Funkcionalita boostnutej kampane',
        'new_post'          => 'Pridať novú poznámku k tomuto objektu',
    ],
    'update'                    => 'Upraviť',
    'users'                     => [
        'unknown'   => 'Neznámy',
    ],
    'view'                      => 'Zobraziť',
    'visibilities'              => [
        'admin'         => 'Admin',
        'admin-self'    => 'Vlastník a Admin',
        'all'           => 'Všetci',
        'members'       => 'Členovia',
        'self'          => 'Vlastník',
    ],
];
