<?php

namespace App\Http\Controllers;

use App\Facades\CampaignLocalization;
use App\Http\Requests\StoreCharacter;
use App\Models\Campaign;
use App\Models\MiscModel;
use App\Models\Entity;
use App\Models\Tag;
use App\Models\Post;
use App\Services\EntityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EntityCreatorController extends Controller
{
    /**
     * @var EntityService
     */
    protected EntityService $entityService;

    protected array $entityTypes = [
        'characters' => 'character',
        'locations' => 'location',
        'maps' => 'map',
        'organisations' => 'organisation',
        'families' => 'family',
        'calendars' => 'calendar',
        'timelines' => 'timeline',
        'items' => 'item',
        'notes' => 'note',
        'events' => 'event',
        'creatures' => 'creature',
        'races' => 'race',
        'quests' => 'quest',
        'journals' => 'journal',
        'abilities' => 'ability',
        'tags' => 'tag',
        'posts' => 'post',
        'attribute_templates' => 'attribute_template',
        'dice_rolls' => 'dice_roll',
        'conversations' => 'conversation',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntityService $entityService)
    {
        $this->middleware('auth');
        $this->middleware('campaign.member');
        $this->entityService = $entityService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function selection()
    {
        $entities = $this->creatableEntities();
        $orderedEntityTypes = $this->orderedEntityTypes($this->entityTypes);
        return view('entities.creator.selection', [
            'entities' => $entities,
            'types' => $orderedEntityTypes,
            'popular' => $this->entityService->popularEntityTypes()
        ]);
    }

    /**
     * @param Request $request
     * @param string $type
     */
    public function form(Request $request, $type)
    {
        return $this->renderForm($request, $type);
    }

    /**
     *
     */
    public function store(Request $request, $type)
    {
        // Make sure the user is allowed to create this kind of entity
        $class = null;
        if ($type == 'posts') {
            $campaign = CampaignLocalization::getCampaign();
            $this->authorize('recover', $campaign);
        } else {
            $class = $this->entityService->getClass($type);
            $this->authorize('create', $class);
        }

        $names = explode(PHP_EOL, str_replace("\r", '', $request->get('name')));
        $values = $request->all();

        // Prepare the data
        unset($values['names']);
        unset($values['_multi']);
        unset($values['_target']);  // Remove target as we need that for something else

        if (!empty($values['entry'])) {
            $values['entry'] = nl2br($values['entry']);
        } elseif ($values['entity'] == 'notes') {
            $values['entry'] = '';
        }

        // Prepare the validator
        $requestValidator = '\App\Http\Requests\Store' . ucfirst(Str::camel(Str::singular($type)));
        /** @var StoreCharacter $validator */
        $validator = new $requestValidator();

        // Now loop on each name and create entities
        $createdEntities = $links = [];

        //Prepare tags
        if (request()->has('tags') && request()->has('save-tags')) {
            $canCreateTags = auth()->user()->can('create', Tag::class);

            // Exclude existing tags to avoid adding a tag several times
            $tags = $values['tags'];
            foreach ($tags as $number => $id) {
                /** @var Tag|null $tag */
                $tag = Tag::find($id);
                // Create the tag if the user has permission to do so
                if (empty($tag) && $canCreateTags) {
                    $tag = new Tag([
                        'name' => $id
                    ]);
                    $tag->saveImageObserver = false;
                    $tag->save();
                    $tags[$number] = strval($tag->id);

                    Log::info('Create entity', [
                        'user' => auth()->user()->id,
                        'entity' => $tag->entity->id,
                        'type' => $tag->entity->type(),
                        'qq' => true,
                        'dynamic' => true
                    ]);
                } elseif (empty($tag) && !$canCreateTags) {
                    unset($tags[$number]);
                }
            }
            $request->merge([
                'tags' => $tags,
            ]);
        }

        foreach ($names as $name) {
            if (empty($name)) {
                continue;
            }

            $values['name'] = $name;
            if ($type != 'posts') {
                $this->validateEntity($values, $validator->rules());

                /** @var MiscModel $model */
                $model = new $class();
                /** @var MiscModel $new */
                $new = $model->create($values);
                $new->crudSaved();
                $new->entity->crudSaved();

                Log::info('Create entity', [
                    'user' => auth()->user()->id,
                    'entity' => $new->entity->id,
                    'type' => $new->entity->type(),
                    'qq' => true,
                    '_target' => $request->get('_target')
                ]);
            } else {
                //If position = 0 the post's position is last, else the post's position is first.
                $this->validateEntity($values, $validator->rules());
                if ($values['position'] == 0) {
                    $new = Post::create($values);
                } else {
                    $entity = Entity::find($values['entity_id']);
                    $entity->posts()->increment('position');
                    $values['position'] = 1;
                    $new = Post::create($values);
                }
            }
            $createdEntities[] = $new;
            $links[] = link_to($new->entity->url(), $new->name);
        }

        // If no entity was created, we throw the standard error
        if (empty($createdEntities)) {
            $rules = $validator->rules();
            $this->validateEntity($values, $rules);
        }

        // Have a target? Return json for the js to handle it instead
        if ($request->has('_target')) {
            $first = $createdEntities[0];
            return response()->json([
                '_target' => $request->get('_target'),
                '_id' => $first->id,
                '_name' => $first->name,
                '_multi' => $request->get('_multi'),
            ]);
        }

        // Redirect the user to the edit form
        if ($request->get('action') === 'edit') {
            if ($new instanceof Post) {
                $editUrl = route('entities.posts.edit', [$new->entity_id, $new->id]);
            } else {
                $editUrl = $createdEntities[0]->getLink('edit');
            }
            return response()->json([
                'redirect' => $editUrl
            ]);
        }

        $success = trans_choice(
            'entities.creator.success_multiple',
            count($links),
            ['link' => implode(', ', $links)]
        );


        // Continue creating more of the same kind
        if ($request->get('action') === 'more') {
            return $this->renderForm(new Request(), $type, $success);
        }
        // Content for the selector
        $entities = $this->creatableEntities();
        $orderedEntityTypes = $this->orderedEntityTypes($this->entityTypes);

        return view('entities.creator.selection', [
            'entities' => $entities,
            'types' => $orderedEntityTypes,
            'new' => $success,
            'popular' => $this->entityService->popularEntityTypes()
        ]);
    }

    /**
     * Build a list of entities the user has permission to create
     * @return array
     */
    protected function creatableEntities(): array
    {
        $entities = [];
        /** @var Campaign $campaign */
        $campaign = CampaignLocalization::getCampaign();

        // Loop through the entities, check those enabled in the campaign, and where the user has create access.
        $ignoredTypes = [
            'menu_links'
        ];
        foreach ($this->entityService->entities($ignoredTypes) as $name => $class) {
            if ($campaign->enabled($name)) {
                if (auth()->user()->can('create', $class)) {
                    $entities[$name] = $class;
                }
            }
        }

        if (auth()->user()->can('recover', $campaign)) {
            $entities['posts'] = 'App\Models\Post';
        }

        return $entities;
    }

    /**
     * Validate an entity's request to make sure data doesn't contain erroneous info
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateEntity(array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        return $this->getValidationFactory()->make(
            $data,
            $rules,
            $messages,
            $customAttributes
        )->validate();
    }

    /**
     * @param Request $request
     * @param string $type
     * @param string|null $success
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function renderForm(Request $request, string $type, string $success = null)
    {
        // Make sure the user is allowed to create this kind of entity
        if ($type == 'posts') {
            $campaign = CampaignLocalization::getCampaign();
            $this->authorize('recover', $campaign);
        } else {
            $model = $this->entityService->getClass($type);
            $this->authorize('create', $model);
        }

        $origin = $request->get('origin');
        $target = $request->get('target');
        $multi = $request->get('multi');
        $mode = $request->get('mode');
        $singularType = Str::singular($type);
        $source = $templates = null;
        $view = 'form';

        if ($mode === 'templates' && $type !== 'posts') {
            /** @var MiscModel $modelClass */
            $modelClass = new $model();
            $templates = Entity::select('id', 'name', 'entity_id')
                ->templates($modelClass->entityTypeID())
                ->get();
            $view = 'templates';
        }

        $entityType = __('entities.' . $singularType);
        $entities = $this->creatableEntities();

        $orderedEntityTypes = $this->orderedEntityTypes($this->entityTypes);

        return view('entities.creator.' . $view, compact(
            'type', 'singularType',
            'entityType', 'origin', 'target',
            'multi', 'mode', 'source', 'templates',
            'entities',
            //'entityTypes',
            'orderedEntityTypes',
            'success',
        ));
    }

    /**
     * Ordered entity types alphabetically to the user's local
     * @param array $types
     * @return array
     */
    protected function orderedEntityTypes(array $types): array
    {
        $orderedTypes = [];
        foreach ($types as $plural => $singular) {
            $orderedTypes[$plural] = __('entities.' . $singular);
        }

        $collator = new \Collator(app()->getLocale());
        $collator->asort($orderedTypes);

        return $orderedTypes;
    }
}
