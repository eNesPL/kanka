<?php

return [
    'actions'       => [
        'add'   => 'Ajouter un nouveau groupe',
    ],
    'bulks'         => [
        'delete'    => '{1} Retiré :count groupe.|[2,*] Retiré :count groupes.',
        'patch'     => '{1} Modifié :count groupe.|[2,*] Modifié :count groupes.',
    ],
    'create'        => [
        'success'   => 'Groupe :name créé.',
        'title'     => 'Nouveau Groupe',
    ],
    'delete'        => [
        'success'   => 'Groupe :name supprimé.',
    ],
    'edit'          => [
        'success'   => 'Groupe :name modifié.',
        'title'     => 'Modifier le groupe :name',
    ],
    'fields'        => [
        'is_shown'  => 'Afficher les marqueurs du groupe',
        'position'  => 'Position',
    ],
    'helper'        => [
        'amount_v3' => 'Les marqueurs peuvent être groupé ensemble dans des groupes. Chaque groupe peut être activé pour rapidement afficher ou cacher les marqueurs de celui-ci.',
    ],
    'hints'         => [
        'is_shown'  => 'Si sélectionné, les marqueurs du groups seront affichés par défaut.',
    ],
    'index'         => [
        'title' => 'Groupes de :name',
    ],
    'pitch'         => [
        'error' => 'Nombre maximum de groupes atteint.',
        'until' => 'Créer jusqu\'à :max groupes pour chaque carte.',
    ],
    'placeholders'  => [
        'name'          => 'Magasins, trésors, PNJs',
        'position'      => 'Champ optionnel pour définir l\'ordre dans lequel s\'affichent les groupes.',
        'position_list' => 'Après :name',
    ],
    'reorder'       => [
        'save'      => 'Enregister l\'ordre',
        'success'   => '{1} Réordonné :count groupe.|[2,*] Réordonné :count groupes.',
        'title'     => 'Réordonner les groupes',
    ],
];
