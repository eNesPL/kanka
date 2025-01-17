<?php

return [
    'actions'       => [
        'follow'    => 'Seguir',
        'join'      => 'Entrar',
        'unfollow'  => 'Deixar de seguir',
    ],
    'campaigns'     => [
        'tabs'  => [
            'modules'   => ':count Módulos',
            'roles'     => ':count Cargos',
            'users'     => ':count Usuários',
        ],
    ],
    'dashboards'    => [
        'actions'       => [
            'edit'      => 'Editar nome & permissões',
            'new'       => 'Novo Dashboard',
            'switch'    => 'Trocar para dashboard',
        ],
        'create'        => [
            'success'   => 'Novo dashboard :name da campanha criado',
            'title'     => 'Novo Dashboard de Campanha',
        ],
        'custom'        => [
            'text'  => 'Atualmente você está editando o dashboard :name da campanha.',
        ],
        'default'       => [
            'text'  => 'Atualmente você está editando o dashboard padrão da campanha.',
            'title' => 'Dashboard Padrão',
        ],
        'delete'        => [
            'success'   => 'Dashboard :name removido.',
        ],
        'fields'        => [
            'copy_widgets'  => 'Copiar widgets',
            'name'          => 'Nome do dashboard',
            'visibility'    => 'Visibilidade',
        ],
        'helpers'       => [
            'copy_widgets'  => 'Duplica os widgets do dashboard :name neste novo.',
        ],
        'pitch'         => 'Crie vários dashboards com permissões personalizadas para cada cargo da campanha.',
        'placeholders'  => [
            'name'  => 'Nome do dashboard',
        ],
        'update'        => [
            'success'   => 'Dashboard :name da campanha atualizado.',
            'title'     => 'Atualizar dashboard :name da campanha',
        ],
        'visibility'    => [
            'default'   => 'Padrão',
            'none'      => 'Nenhum',
            'visible'   => 'Visível',
        ],
    ],
    'helpers'       => [
        'follow'    => 'Seguir uma campanha fará com que ela apareça no seletor de campanha (canto superior esquerdo) abaixo de suas campanhas.',
        'join'      => 'Essa campanha é aberta a novos membros. Clique para solicitar sua inscrição.',
        'setup'     => 'Configure o dashboard de sua campanha.',
    ],
    'notifications' => [
        'modal' => [
            'confirm'   => 'Entendido',
            'title'     => 'Notificação Importante',
        ],
    ],
    'recent'        => [
        'title' => 'Lista de entidade :name',
    ],
    'settings'      => [
        'title' => 'Configurar Dashboard',
    ],
    'setup'         => [
        'actions'   => [
            'add'               => 'Adicionar um widget',
            'back_to_dashboard' => 'Voltar para o dashboard',
            'edit'              => 'Editar um widget',
            'new'               => 'Novo widget de :type',
        ],
        'reorder'   => [
            'success'   => 'Widgets reordenados.',
        ],
        'title'     => 'Configurar Dashboard',
        'tutorial'  => [
            'blog'  => 'nosso tutorial',
            'text'  => 'Precisa de ajuda para configurar o dashboard de sua campanha? Leia o :blog para alguma ajuda e inspiração.',
        ],
        'widgets'   => [
            'calendar'      => 'Calendário',
            'campaign'      => 'Cabeçalho da campanha',
            'header'        => 'Cabeçalho',
            'preview'       => 'Pré-visualização da entidade',
            'random'        => 'Entidade aleatória',
            'recent'        => 'Lista de entidade',
            'unmentioned'   => 'Lista de entidades não mencionadas',
            'welcome'       => 'Boas-vindas',
        ],
    ],
    'title'         => 'Dashboard',
    'widgets'       => [
        'actions'       => [
            'advanced-options'  => 'Opções avançadas',
        ],
        'calendar'      => [
            'actions'           => [
                'next'      => 'Alterar data para o dia seguinte',
                'previous'  => 'Alterar data para o dia anterior',
            ],
            'events_today'      => 'Hoje',
            'previous_events'   => 'Anterior',
            'upcoming_events'   => 'Posterior',
        ],
        'campaign'      => [
            'helper'    => 'Este widget exibe o cabeçalho da campanha. Este widget é sempre exibido no dashboard padrão.',
        ],
        'create'        => [
            'success'   => 'Widget adicionado ao dashboard.',
        ],
        'delete'        => [
            'success'   => 'Widget removido so dashboard.',
        ],
        'fields'        => [
            'class'             => 'Classe CSS',
            'dashboard'         => 'Dashboard',
            'name'              => 'Nome personalizado do widget',
            'optional-entity'   => 'Link para entidade',
            'order'             => 'Ordenação',
            'size'              => 'Tamanho',
            'text'              => 'Texto',
            'width'             => 'Largura',
        ],
        'helpers'       => [
            'class'     => 'Defina uma classe CSS personalizada para adicionar ao widget.',
            'filters'   => 'Clique para aprender sobre as opções de filtro disponíveis.',
        ],
        'orders'        => [
            'name_asc'  => 'Nome ascendente',
            'name_desc' => 'Nome descendente',
            'recent'    => 'Recentemente modificado',
        ],
        'random'        => [
            'helpers'   => [
                'name'  => 'Você pode fazer referência ao nome da entidade aleatória com {name}',
            ],
        ],
        'recent'        => [
            'advanced_filter'   => 'Filtro avançado',
            'advanced_filters'  => [
                'mentionless'   => 'Sem Mencionar (entidades que não mencionam outras entidades)',
                'unmentioned'   => 'Sem Menção (entidades que não são mencionadas por outras entidades)',
            ],
            'entity-header'     => 'Use o cabeçalho da entidade como imagem',
            'filters'           => 'Filtros',
            'full'              => 'Exibir introdução completa',
            'help'              => 'Mostre apenas a primeira entidade como uma visualização em vez de uma lista.',
            'helpers'           => [
                'entity-header'     => 'Se sua entidade tiver um cabeçalho de entidade (recurso de campanha aprimorada), defina este widget para usar essa imagem ao invés da imagem da entidade.',
                'full'              => 'Exibe a introdução completa da entidade por padrão ao invés de uma pré-visualização.',
                'show_attributes'   => 'Mostra os atributos fixados da entidade abaixo da introdução.',
                'show_members'      => 'Se a entidade for uma família ou organização, mostra seus membros abaixo da introdução.',
                'show_relations'    => 'Mostrar as relações fixadas da entidade abaixo da introdução.',
            ],
            'show_attributes'   => 'Mostrar atributos fixados',
            'show_members'      => 'Mostrar membros',
            'show_relations'    => 'Mostrar relações fixadas',
            'singular'          => 'Pré-visualização',
            'tags'              => 'Filtre a lista de entidades modificadas recentemente em tags específicas.',
            'title'             => 'Lista de entidade',
        ],
        'tabs'          => [
            'advanced'  => 'Avançado',
            'setup'     => 'Configurações',
        ],
        'unmentioned'   => [
            'title' => 'Entidades sem menções',
        ],
        'update'        => [
            'success'   => 'Widget modificado',
        ],
        'welcome'       => [
            'helper'    => 'Este widget exibe uma mensagem de boas-vindas no painel que inclui links úteis para novos usuários do Kanka.',
        ],
        'widths'        => [
            '0' => 'Automático',
            '12'=> 'Inteiro (100%)',
            '3' => 'Minúsculo (25%)',
            '4' => 'Pequeno (33%)',
            '6' => 'Metade (50%)',
            '8' => 'Largo (66%)',
            '9' => 'Grande (75%)',
        ],
    ],
];
