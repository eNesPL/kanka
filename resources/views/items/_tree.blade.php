@inject ('datagrid', 'App\Renderers\DatagridRenderer')

{!! $datagrid
    ->filters($filters)
    ->nested()
    ->render(
    $filterService,
    // Columns
    [
        // Avatar
        [
            'type' => 'avatar'
        ],
        // Name
        'name',
        'type',
        'price',
        'size',
        // Location
        [
            'type' => 'location',
            'visible' => $campaignService->enabled('locations'),
        ],
        // Character
        [
            'type' => 'character',
            'visible' => $campaignService->enabled('characters'),
        ],
        [
            'type' => 'is_private',
        ]
    ],
    // Data
    $models,
    // Options
    [
        'route' => 'items.index',
        'baseRoute' => 'items',
        'trans' => 'items.fields.',
        'row' => [
            'data' => [
                'data-children' =>function($model){
                    return $model->items->count();
                }
                ]
            ]        
    ]
) !!}