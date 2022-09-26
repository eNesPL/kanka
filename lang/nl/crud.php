<?php

return [
    'actions'                   => [
        'actions'           => 'Acties',
        'apply'             => 'Toepassen',
        'back'              => 'Terug',
        'copy'              => 'Kopieer',
        'copy_mention'      => 'Kopieer [ ] opmerking',
        'copy_to_campaign'  => 'Kopieer naar Campaign',
        'explore_view'      => 'Geneste weergave',
        'export'            => 'Exporteer (PDF)',
        'find_out_more'     => 'Meer te weten komen',
        'go_to'             => 'Ga naar :name',
        'json-export'       => 'Exporteer (JSON)',
        'manage_links'      => 'Beheer Links',
        'move'              => 'Veranderen of Verplaatsen',
        'new'               => 'Nieuw',
        'next'              => 'Volgende',
        'reset'             => 'Reset',
    ],
    'add'                       => 'Toevoegen',
    'alerts'                    => [
        'copy_mention'  => 'De geavanceerde vermelding van de entiteit is naar je klembord gekopieerd.',
    ],
    'boosted'                   => 'Boosted',
    'boosted_campaigns'         => 'Boosted Campaigns',
    'bulk'                      => [
        'actions'       => [
            'edit'  => 'Bulk Bewerken en Taggen',
        ],
        'age'           => [
            'helper'    => 'Je kunt + en - voor het nummer gebruiken om de leeftijd met dat aantal bij te werken.',
        ],
        'delete'        => [
            'warning'   => 'Weet je zeker dat je de geselecteerde entiteiten wilt verwijderen?',
        ],
        'edit'          => [
            'tagging'   => 'Acties voor tags',
            'tags'      => [
                'add'       => 'Toevoegen',
                'remove'    => 'Verwijderen',
            ],
            'title'     => 'Meerdere entiteiten bewerken',
        ],
        'errors'        => [
            'admin'     => 'Alleen campaign beheerders kunnen de privéstatus van entiteiten wijzigen.',
            'general'   => 'Er is een fout opgetreden bij het verwerken van je actie. Probeer het opnieuw en neem contact met ons op als het probleem zich blijft voordoen. Foutmelding :hint.',
        ],
        'permissions'   => [
            'fields'    => [
                'override'  => 'Overschrijven',
            ],
            'helpers'   => [
                'override'  => 'Indien geselecteerd, worden permissies van de geselecteerde entiteiten hiermee overschreven. Indien niet aangevinkt, worden de geselecteerde permissies toegevoegd aan de bestaande.',
            ],
            'title'     => 'Wijzig permissies voor verschillende entiteiten',
        ],
        'success'       => [
            'copy_to_campaign'  => '{1} :count entiteit gekopieerd naar :campaign.|[2,*] :count entiteiten gekopieerd naar :campaign.',
            'editing'           => '{1} :count entiteit was bijgewerkt.|[2,*] :count entiteiten waren bijgewerkt.',
            'permissions'       => '{1} Permissies gewijzigd voor :count entiteit.|[2,*] Permissies gewijzigd voor :count entiteiten.',
            'private'           => '{1} :count entiteit is nu privé|[2,*] :count entiteiten zijn nu privé.',
            'public'            => '{1} :count entiteit is nu zichtbaar|[2, *] :count entiteiten zijn nu zichtbaar.',
            'templates'         => '{1} :count entiteit heeft een sjabloon toegepast.|[2,*] :count entiteiten hebben een sjabloon toegepast.',
        ],
    ],
    'bulk_templates'            => [
        'bulk_title'    => 'Pas een sjabloon toe op meerdere entiteiten',
    ],
    'cancel'                    => 'Annuleer',
    'click_modal'               => [
        'close'     => 'Sluiten',
        'confirm'   => 'Bevestig',
        'title'     => 'Bevestig je actie',
    ],
    'copy_to_campaign'          => [
        'bulk_title'    => 'Kopieer entiteiten naar andere campaign',
        'panel'         => 'Kopieer',
        'title'         => 'Kopieer \':name\' naar andere campaign',
    ],
    'create'                    => 'Maak',
    'datagrid'                  => [
        'empty' => 'Nog niets te laten zien.',
    ],
    'delete_modal'              => [
        'close' => 'Sluiten',
        'delete'=> 'Verwijder',
        'title' => 'Bevestiging verwijderen',
    ],
    'destroy_many'              => [
        'success'   => ':count entiteit verwijderd|:count entiteiten verwijderd.',
    ],
    'edit'                      => 'Wijzig',
    'errors'                    => [
        'boosted'                       => 'Deze functie is alleen beschikbaar voor boosted campaigns.',
        'boosted_campaigns'             => 'Deze functie is alleen beschikbaar voor :boosted.',
        'node_must_not_be_a_descendant' => 'Ongeldig knooppunt (tag, bovenliggende locatie): het zou een afstammeling van zichzelf zijn.',
        'unavailable_feature'           => 'Functie niet beschikbaar',
    ],
    'events'                    => [],
    'export'                    => 'Exporteer',
    'fields'                    => [
        'ability'               => 'Vaardigheid',
        'attribute_template'    => 'Attribuutsjabloon',
        'calendar'              => 'Kalender',
        'calendar_date'         => 'Kalender Datum',
        'character'             => 'Personage',
        'colour'                => 'Kleur',
        'copy_abilities'        => 'Kopieer Vaardigheden',
        'copy_attributes'       => 'Kopieer Attributen',
        'copy_inventory'        => 'Kopieer Inventory',
        'copy_links'            => 'Kopieer Entiteit Links',
        'creator'               => 'Maker',
        'dice_roll'             => 'Dobbelsteen Worp',
        'entity'                => 'Entiteit',
        'entity_type'           => 'Entiteit Type',
        'entry'                 => 'Invoer',
        'event'                 => 'Gebeurtenis',
        'excerpt'               => 'Excerpt',
        'family'                => 'Familie',
        'files'                 => 'Bestanden',
        'gallery_image'         => 'Galerij Afbeelding',
        'has_entity_files'      => 'Heeft entiteit bestanden',
        'has_entity_notes'      => 'Heeft entiteit notities',
        'has_image'             => 'Heeft een afbeelding',
        'header_image'          => 'Header Afbeeldingen',
        'image'                 => 'Afbeelding',
        'is_private'            => 'Privé',
        'is_star'               => 'Vastgemaakt',
        'item'                  => 'Voorwerp',
        'location'              => 'Locatie',
        'map'                   => 'Kaart',
        'name'                  => 'Naam',
        'organisation'          => 'Organisatie',
        'position'              => 'Positie',
        'privacy'               => 'Privacy',
        'race'                  => 'Ras',
        'tag'                   => 'Tag',
        'tags'                  => 'Tags',
        'timeline'              => 'Tijdlijn',
        'tooltip'               => 'Tooltip',
        'type'                  => 'Type',
        'visibility'            => 'Zichtbaarheid',
    ],
    'files'                     => [
        'actions'   => [
            'drop'      => 'Klik om een bestand toe te voegen of te droppen',
            'manage'    => 'Beheer Entiteit Bestanden',
        ],
        'errors'    => [
            'max'       => 'Je hebt het maximale aantal (: max) bestanden voor deze entiteit bereikt.',
            'no_files'  => 'Geen bestanden.',
        ],
        'files'     => 'Geüploade Bestanden',
        'hints'     => [
            'limit'         => 'Elke entiteit kan maximaal :max bestanden hebben geüpload.',
            'limitations'   => 'Ondersteunde formaten: :formats. Max Bestandsgrootte: :size',
        ],
        'title'     => 'Entiteit Bestanden voor :name',
    ],
    'filter'                    => 'Filter',
    'filters'                   => [
        'all'       => 'Filter op alle afstammelingen',
        'clear'     => 'Wis Filters',
        'direct'    => 'Filter naar directe afstammelingen',
        'filtered'  => ':count van :total :entity weergegeven.',
        'hide'      => 'Verberg Filters',
        'options'   => [
            'exclude'   => 'Uitsluiten',
            'include'   => 'Omvatten',
            'none'      => 'Geen',
        ],
        'show'      => 'Toon Filters',
        'sorting'   => [
            'asc'       => ':field Oplopend',
            'desc'      => ':field Aflopend',
            'helper'    => 'Bepaal in welke volgorde de resultaten worden weergegeven.',
        ],
        'title'     => 'Filters',
    ],
    'forms'                     => [
        'actions'       => [
            'calendar'  => 'Voeg een kalender datum toe',
        ],
        'copy_options'  => 'Kopieer Opties',
    ],
    'helpers'                   => [
        'copy_options'  => 'Kopieer de volgende gerelateerde elementen van de bron naar de nieuwe entiteit.',
    ],
    'hidden'                    => 'Verborgen',
    'hints'                     => [
        'attribute_template'    => 'Pas een attribuutsjabloon rechtstreeks toe wanneer je deze entiteit maakt of bewerkt.',
        'calendar_date'         => 'Een kalender datum maakt eenvoudig filteren in lijsten mogelijk en houdt ook een kalender gebeurtenis bij in de geselecteerde kalender.',
        'gallery_image'         => 'Als de entiteit geen afbeelding heeft, geef je in plaats daarvan een afbeelding uit de campaign galerij weer.',
        'header_image'          => 'Deze afbeelding wordt boven de entiteit geplaatst. Gebruik een brede afbeelding voor de beste resultaten.',
        'image_limitations'     => 'Ondersteunde formaten: :formats. Max Bestandsgrootte: :size.',
        'image_patreon'         => 'Limiet voor bestandsgrootte verhogen?',
        'is_star'               => 'Vastgezette elementen verschijnen in het menu van de entiteit',
        'tooltip'               => 'Vervang de automatisch gegenereerde tooltip door de volgende inhoud.',
        'visibility'            => 'Als je de zichtbaarheid instelt op beheerder, kunnen alleen leden met de campaign rol Beheerder dit zien. Als je het op zichzelf instelt, betekent dit dat alleen jij dit kunt zien.',
    ],
    'history'                   => [
        'unknown'   => 'Onbekend',
        'view'      => 'Bekijk entiteit log',
    ],
    'image'                     => [
        'error' => 'We kunnen de door jou aangevraagde afbeelding niet ophalen. Het kan zijn dat de website ons niet toestaat om de afbeelding te downloaden (meestal voor Squarespace en DeviantArt), of dat de link niet langer geldig is. Let er ook op dat de afbeelding niet groter is dan :size.',
    ],
    'is_not_private'            => 'Deze entiteit is momenteel niet ingesteld op privé.',
    'is_private'                => 'Deze entiteit is privé en alleen zichtbaar voor leden van de Beheerder rol.',
    'legacy'                    => 'Legacy',
    'linking_help'              => 'Hoe kan ik linken naar andere invoeren?',
    'manage'                    => 'Beheer',
    'new_entity'                => [
        'error' => 'Controleer je waarden.',
        'fields'=> [
            'name'  => 'Naam',
        ],
        'title' => 'Nieuwe entiteit',
    ],
    'panels'                    => [
        'appearance'            => 'Uiterlijk',
        'attribute_template'    => 'Attribuutsjabloon',
        'calendar_date'         => 'Kalender Datum',
        'entry'                 => 'Invoer',
        'general_information'   => 'Algemene Informatie',
        'move'                  => 'Verplaats',
        'system'                => 'Systeem',
    ],
    'permissions'               => [
        'action'            => 'Actie',
        'actions'           => [
            'bulk'          => [
                'add'       => 'Toestaan',
                'deny'      => 'Weigeren',
                'ignore'    => 'Overslaan',
                'remove'    => 'Verwijder',
            ],
            'bulk_entity'   => [
                'allow'     => 'Toestaan',
                'deny'      => 'Weigeren',
                'inherit'   => 'Erven',
            ],
            'delete'        => 'Verwijder',
            'edit'          => 'Wijzig',
            'entity_note'   => 'Entiteit Notities',
            'read'          => 'Lees',
            'toggle'        => 'Wissel',
        ],
        'allowed'           => 'Toegestaan',
        'fields'            => [
            'member'    => 'Lid',
            'role'      => 'Rol',
        ],
        'helper'            => 'Gebruik deze interface om af te stemmen welke gebruikers en rollen kunnen communiceren met deze entiteit. :allow',
        'helpers'           => [
            'setup' => 'Gebruik deze interface om te verfijnen hoe rollen en gebruikers kunnen communiceren met deze entiteit. :allow staat de gebruiker of rol toe om deze actie uit te voeren. :deny zal hen die actie ontzeggen. :inherit gebruikt de gebruiker\'s rol of de toestemming van de hoofd rol. Een gebruiker die is ingesteld op :allow, kan de actie uitvoeren, zelfs als hun rol is ingesteld op :deny.',
        ],
        'inherited'         => 'Deze rol heeft al deze permissies voor dit entiteitstype.',
        'inherited_by'      => 'Deze gebruiker maakt deel uit van de rol \':role\' die deze permissies voor dit entiteit type verleent.',
        'success'           => 'Permissies opgeslagen.',
        'title'             => 'Permissies',
        'too_many_members'  => 'Deze campaign heeft te veel leden (>10) om in deze interface weer te geven. Gebruik de Permissie knop in de entiteit weergave om permissies in detail te beheren.',
    ],
    'placeholders'              => [
        'ability'       => 'Kies een vaardigheid',
        'calendar'      => 'Kies een kalender',
        'character'     => 'Kies een personage',
        'entity'        => 'Entiteit',
        'event'         => 'Kies een gebeurtenis',
        'family'        => 'Kies een familie',
        'gallery_image' => 'Kies een afbeelding uit de campaign galerij',
        'image_url'     => 'Je kunt in plaats daarvan een afbeelding uploaden vanaf een URL',
        'item'          => 'Kies een voorwerp',
        'journal'       => 'Kies een logboek',
        'location'      => 'Kies een locatie',
        'map'           => 'Kies een kaart',
        'note'          => 'Kies een notitie',
        'organisation'  => 'Kies een organisatie',
        'race'          => 'Kies een ras',
        'tag'           => 'Kies een tag',
        'timeline'      => 'Kies een tijdlijn',
    ],
    'relations'                 => [
        'fields'    => [
            'location'  => 'Locatie',
            'name'      => 'Naam',
            'relation'  => 'Relatie',
        ],
        'hint'      => 'Relaties tussen entiteiten kunnen worden opgezet om hun verbindingen weer te geven.',
    ],
    'remove'                    => 'Verwijder',
    'rename'                    => 'Hernoemen',
    'save'                      => 'Opslaan',
    'save_and_close'            => 'Opslaan en Afsluiten',
    'save_and_copy'             => 'Opslaan en Kopiëren',
    'save_and_new'              => 'Opslaan en Nieuwe',
    'save_and_update'           => 'Opslaan en Wijzig',
    'save_and_view'             => 'Opslaan en Bekijken',
    'search'                    => 'Zoeken',
    'select'                    => 'Selecteren',
    'superboosted_campaigns'    => 'Superboosted Campaigns',
    'tabs'                      => [
        'abilities'     => 'Vaardigheden',
        'attributes'    => 'Attributen',
        'boost'         => 'Boost',
        'calendars'     => 'Kalenders',
        'default'       => 'Standaard',
        'events'        => 'Gebeurtenissen',
        'inventory'     => 'Inventory',
        'links'         => 'Links',
        'map-points'    => 'Kaart Punten',
        'mentions'      => 'Vermeldingen',
        'menu'          => 'Menu',
        'notes'         => 'Entiteit Notities',
        'permissions'   => 'Permissies',
        'relations'     => 'Relaties',
        'reminders'     => 'Herinneringen',
        'timelines'     => 'Tijdlijnen',
        'tooltip'       => 'Tooltip',
    ],
    'update'                    => 'Update',
    'users'                     => [
        'unknown'   => 'Onbekend',
    ],
    'view'                      => 'Bekijk',
    'visibilities'              => [
        'admin'         => 'Beheerder',
        'admin-self'    => 'Zelf & Beheerder',
        'all'           => 'Alle',
        'members'       => 'Leden',
        'self'          => 'Zelf',
    ],
];