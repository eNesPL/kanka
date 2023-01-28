<?php

namespace App\Services;

use App\Models\Campaign;
use App\Models\Entity;
use App\Models\MenuLink;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Stevebauman\Purify\Facades\Purify;

class SidebarService
{
    /**
     * List of the campaign's quick links
     * @var array
     */
    protected array $quickLinks = [];

    protected array $rules = [
        'dashboard' => [
            null,
            'dashboard',
        ],
        'campaigns' => [
            'campaign',
            'overview',
            'campaigns',
            'campaign_users',
            'campaign_submissions',
            'campaign-export',
            'stats',
            'campaign_roles',
            'campaign_invites',
            'recovery',
            'default-images',
            'plugins',
            'modules',
            'campaign_styles',
            'sidebar-setup',
        ],
        'characters' => [
            'characters',
            'character_relation',
        ],
        'conversations' => [
            'conversations',
            'conversation_messages',
        ],
        'events' => [
            'events',
        ],
        'families' => [
            'families',
            'family_relation',
        ],
        'items' => [
            'items',
        ],
        'journals' => [
            'journals',
        ],
        'locations' => [
            'locations',
        ],
        'maps' => [
            'maps',
        ],
        'notes' => [
            'notes',
        ],
        'organisations' => [
            'organisations',
            'organisation_member',
        ],
        'other' => [
            'releases',
            'team',
        ],
        'quests' => [
            'quests',
        ],
        'calendars' => [
            'calendars',
        ],
        'releases' => [
            'releases'
        ],
        'team' => [
            'team',
        ],
        'attribute_templates' => [
            'attribute_templates',
        ],
        'tags' => [
            'tags'
        ],
        'timelines' => [
            'timelines'
        ],
        'dice_rolls' => [
            'dice_rolls',
        ],
        'menu_links' => [
            'menu_links',
        ],
        'races' => [
            'races',
        ],
        'creatures' => [
            'creatures',
        ],
        'abilities' => [
            'abilities',
        ],
        'relations' => [
            'relations',
        ],
        'history' => [
            'history',
        ],
    ];

    protected array $elements = [
        'dashboard' => [
            'icon' => 'fa-solid fa-th-large',
            'label' => 'sidebar.dashboard',
            'module' => false,
            'route' => 'dashboard',
            'fixed' => true,
        ],
        'menu_links' => [
            'icon' => 'fa-solid fa-star',
            'label' => 'entities.menu_links',
            'fixed' => true,
        ],
        'campaigns' => [
            'icon' => 'fa-solid fa-globe',
            'label' => 'sidebar.world',
            'module' => false,
            'route' => 'campaign',
            'fixed' => true,
        ],
        'characters' => [
            'icon' => 'fa-solid fa-user',
            'label' => 'entities.characters',
        ],
        'locations' => [
            'icon' => 'ra ra-tower',
            'label' => 'entities.locations',
            'tree' => true,
        ],
        'maps' => [
            'icon' => 'fa-solid fa-map',
            'label' => 'entities.maps',
            'tree' => true,
        ],
        'organisations' => [
            'icon' => 'ra ra-hood',
            'label' => 'entities.organisations',
            'tree' => true,
        ],
        'families' => [
            'icon' => 'ra ra-double-team',
            'label' => 'entities.families',
            'tree' => true,
        ],
        'calendars' => [
            'icon' => 'fa-solid fa-calendar',
            'label' => 'entities.calendars',
            'tree' => true,
        ],
        'timelines' => [
            'icon' => 'fa-solid fa-hourglass-half',
            'label' => 'entities.timelines',
            'tree' => true,
        ],
        'races' => [
            'icon' => 'ra ra-wyvern',
            'label' => 'entities.races',
            'tree' => true,
        ],
        'creatures' => [
            'icon' => 'ra ra-raven',
            'label' => 'entities.creatures',
            'tree' => true,
        ],
        'campaign' => [
            'icon' => 'fa-solid fa-globe',
            'label' => 'sidebar.campaign',
            'route' => 'campaign',
            'fixed' => true,
        ],
        'quests' => [
            'icon' => 'ra ra-wooden-sign',
            'label' => 'entities.quests',
            'tree' => true,
        ],
        'journals' => [
            'icon' => 'ra ra-quill-ink',
            'label' => 'entities.journals',
            'tree' => true,
        ],
        'items' => [
            'icon' => 'ra ra-gem-pendant',
            'label' => 'entities.items',
            'tree' => true,
        ],
        'events' => [
            'icon' => 'fa-solid fa-bolt',
            'label' => 'entities.events',
            'tree' => true,
        ],
        'abilities' => [
            'icon' => 'ra ra-fire-symbol',
            'label' => 'entities.abilities',
            'tree' => true,
        ],
        'notes' => [
            'icon' => 'fa-solid fa-book-open',
            'label' => 'entities.notes',
            'tree' => true,
        ],
        'other' => [
            'icon' => 'fa-solid fa-cubes',
            'label' => 'sidebar.other',
            'module' => false,
            'route' => false,
            'fixed' => true,
        ],
        'tags' => [
            'icon' => 'fa-solid fa-tags',
            'label' => 'entities.tags',
            'tree' => true,
        ],
        'conversations' => [
            'icon' => 'fa-solid fa-comment',
            'label' => 'entities.conversations',
        ],
        'dice_rolls' => [
            'icon' => 'ra ra-dice-five',
            'label' => 'entities.dice_rolls',
        ],
        'relations' => [
            'icon' => 'fa-solid fa-people-arrows',
            'label' => 'sidebar.relations',
            'perm' => 'relations',
            'module' => false,
        ],
        'gallery' => [
            'icon' => 'fa-solid fa-images',
            'label' => 'sidebar.gallery',
            'route' => 'campaign.gallery.index',
            'perm' => 'gallery',
            'module' => false,
        ],
        'attribute_templates' => [
            'icon' => 'fa-solid fa-copy',
            'label' => 'entities.attribute_templates',
            'module' => false,
        ],
        /*'search' => [
            'icon' => 'fa fa-search',
            'label' => 'Search...',
            'module' => false,
            'route' => 'search',
        ],*/
        'history' => [
            'icon' => 'fa-solid fa-clock-rotate-left',
            'label' => 'history.title',
            'perm' => true,
            'module' => false,
        ],
    ];

    protected $layout = [
        'dashboard' => null,
        'menu_links' => null,
        'campaigns' => [ //world
            'characters',
            'locations',
            'maps',
            'organisations',
            'families',
            'calendars',
            'timelines',
            'creatures',
            'races',
        ],
        'campaign' => [
            'quests',
            'journals',
            'items',
            'events',
            'abilities',
        ],
        'notes' => null,
        'other' => [
            'tags',
            'conversations',
            'dice_rolls',
            'relations',
            'gallery',
            'attribute_templates',
            'history',
        ],
        //'search' => null,
    ];

    /** @var Campaign */
    protected $campaign;

    /** @var bool */
    protected bool $withDisabled = false;

    public function campaign(Campaign $campaign): self
    {
        $this->campaign = $campaign;
        return $this;
    }

    public function withDisabled(): self
    {
        $this->withDisabled = true;
        return $this;
    }

    /**
     * @param string $menu
     * @param string $class
     * @return string
     */
    public function active($menu = '', string $class = 'active'): string
    {
        if (empty($this->rules[$menu])) {
            return '';
        }

        if (request()->has('quick-link')) {
            return '';
        }

        foreach ($this->rules[$menu] as $rule) {
            if (request()->segment(4) == $rule) {
                return " $class";
            }
        }

        // Entities? It's complicated
        if (request()->segment(4) == 'entities') {
            /** @var Entity $entity */
            $entity = request()->route('entity');
            if ($entity->pluralType() == $menu) {
                return " $class";
            }
        }

        return '';
    }

    /**
     * @param MenuLink $menuLink
     * @return string
     */
    public function activeMenuLink(MenuLink $menuLink): string
    {
        $request = request()->get('quick-link');
        if (empty($request) || $request != $menuLink->id) {
            return '';
        }

        return 'active';
    }

    /**
     * Settings menu active
     * @param string $menu
     * @param int $segment
     * @return string
     */
    public function settings(string $menu, int $segment = 3): string
    {
        $current = request()->segment($segment);
        if ($current == $menu) {
            return ' active';
        }
        return '';
    }

    /**
     * @param string $menu
     * @param string $css
     * @return null|string
     */
    public function open($menu = '', $css = 'menu-open')
    {
        if (empty($this->rules[$menu])) {
            return null;
        }

        foreach ($this->rules[$menu] as $rule) {
            if (request()->segment(4) == $rule) {
                return $css;
            }
        }
        return null;
    }

    /**
     * Generate an array of the sidebar elements
     * @return array
     */
    public function layout(): array
    {
        $key = $this->cacheKey();
        if (!$this->withDisabled && Cache::has($key)) {
            //dump('read from cache ' . $key);
            //return Cache::get($key);
        }
        $layout = [];
        foreach ($this->customLayout() as $name => $children) {
            if (!isset($this->elements[$name])) {
                dd('E601 - cant find element ' . $name);
            }
            $element = $this->customElement($name);
            // Add route if it should have one
            if (!isset($element['route'])) {
                $element['route'] = $name . '.index';
            }

            // No children? Nothing more to do
            if (empty($children)) {
                // If this is a level 0 element like "Notes", the module still needs to be checked
                if (!isset($element['module']) && !$this->withDisabled) {
                    if (!$this->campaign->enabled($name)) {
                        continue;
                    }
                }
                $layout[$name] = $element;
                continue;
            }
            $layout[$name] = $element;
            $layout[$name]['children'] = [];
            foreach ($children as $childName) {
                $child = $this->customElement($childName);
                // Child has a module, check that the campaign has it enabled
                if (!isset($child['module']) && !$this->withDisabled) {
                    if (!$this->campaign->enabled($childName)) {
                        continue;
                    }
                }
                // Child has permission check?
                if (isset($child['perm'])) {
                    if (!auth()->check() || !auth()->user()->can($childName, $this->campaign)) {
                        continue;
                    }
                }

                // Add route when none is set
                if (!isset($child['route'])) {
                    $child['route'] = $childName . '.index';
                }

                // Add it
                $layout[$name]['children'][$childName] = $child;
            }
        }

        Cache::put($key, $layout, 7 * 86400);
        return $layout;
    }

    /**
     * Save the new config into the database, somehow.
     * @param array $data
     */
    public function save(array $data)
    {
        // Prepare the data for the database
        $ui = $this->campaign->ui_settings;

        // First we want to figure out the new "order", and later we can worry about the "overrides".
        $order = [];
        $parent = null;
        foreach ($data['order'] as $field => $value) {
            if (Str::endsWith($field, '_start')) {
                $parent = Str::before($field, '_start');
                $order[$parent] = [];
                continue;
            } elseif (Str::endsWith($field, '_end')) {
                $parent = null;
                continue;
            }

            if (!empty($parent)) {
                $order[$parent][$field] = $field;
            } else {
                $order[$field] = null;
            }
        }

        $ui['sidebar'] = [
            'order' => $order,
        ];

        // Now let's build the config.
        $labels = [];
        $icons = [];

        foreach ($data as $field => $value) {
            if (empty($value)) {
                continue;
            }
            if (Str::endsWith($field, '_label')) {
                $labels[Str::before($field, '_label')] = Purify::clean(strip_tags($value));
                continue;
            } elseif (Str::endsWith($field, '_icon')) {
                $icons[Str::before($field, '_icon')] = Purify::clean(strip_tags($value));
                continue;
            }
            // Nothing of value
        }

        // Save the new data to the campaign config
        if (!empty($labels)) {
            $ui['sidebar']['labels'] = $labels;
        } elseif (isset($ui['sidebar']['labels'])) { // @phpstan-ignore-line
            unset($ui['sidebar']['labels']);
        }

        if (!empty($icons)) {
            $ui['sidebar']['icons'] = $icons;
        } elseif (isset($ui['sidebar']['icons'])) { // @phpstan-ignore-line
            unset($ui['sidebar']['icons']);
        }

        $this->campaign->ui_settings = $ui;
        $this->campaign->save();

        Cache::forget($this->cacheKey());
    }

    public function reset()
    {
        $ui = $this->campaign->ui_settings;
        unset($ui['sidebar']);
        $this->campaign->ui_settings = $ui;
        $this->campaign->save();

        Cache::forget($this->cacheKey());
    }

    protected function customLayout(): array
    {
        // Only boosted campaigns can change the layout
        if (!$this->campaign->boosted()) {
            return $this->layout;
        }
        $layout = Arr::get($this->campaign->ui_settings, 'sidebar.order');
        if (empty($layout)) {
            return $this->layout;
        }

        // We have a layout, let's see if anything is missing. There is probably a smarter way to do this.
        $definedElements = [];
        foreach ($layout as $name => $values) {
            $definedElements[] = $name;
            if (!is_array($values)) {
                continue;
            }
            foreach ($values as $key) {
                $definedElements[] = $key;
            }
        }

        // Find missing elements that are in the base layout but not in the custom one
        $missing = array_diff(array_keys($this->elements), $definedElements);

        // Loop through the missing elements and inject them where they are "expected"
        foreach ($missing as $element) {
            $found = false;
            //dump('Missing: ' . $element);
            // If it's a base level, add it there
            if (array_key_exists($element, $this->layout)) {
                $layout[$element] = null;
                continue;
            }
            foreach ($this->layout as $name => $children) {
                if (!is_array($children)) {
                    continue;
                }
                $values = array_values($children);
                //dump(!in_array($element, $values));
                if (!in_array($element, $values)) {
                    continue;
                }
                $layout[$name][$element] = $element;
                //dump('Added it to ' . $name);

                $found = true;
                continue;
            }

            if (!$found) {
                dd('E637: Couldn\'t place sidebar element ' . $element);
            }
        }

        return $layout;
    }

    protected function customElement(string $key): array
    {
        $element = $this->elements[$key];
        $element['custom_label'] = null;
        $element['custom_icon'] = null;
        $element['label'] = __($element['label']);

        if (!$this->campaign->boosted()) {
            return $element;
        }
        $label = Arr::get($this->campaign->ui_settings, 'sidebar.labels.' . $key);
        $icon = Arr::get($this->campaign->ui_settings, 'sidebar.icons.' . $key);
        if (!empty($label)) {
            $element['custom_label'] = $label;
        }
        if (!empty($icon)) {
            $element['custom_icon'] = $icon;
        }

        return $element;
    }

    /**
     * @return string
     */
    protected function cacheKey(): string
    {
        return 'campaign_' . $this->campaign->id . '_sidebar';
    }

    /**
     * Available parents for placing a quick link
     * @return array
     */
    public function availableParents(): array
    {
        $labels = [
            null => __('entities/links.defaults.parent')
        ];
        foreach ($this->elements as $key => $element) {
            if ($key === 'menu_links') {
                continue;
            }
            $labels[$key] = __($element['label']);
        }
        return $labels;
    }

    /**
     * Prepare the quick links by figuring out where they will be rendered
     * @param Campaign $campaign
     * @return void
     */
    public function prepareQuickLinks(Campaign $campaign): void
    {
        $this->quickLinks = [];

        // Quick menu module not activated on the campaign, no need to go further
        if (!$campaign->enabled('menu_links')) {
            return;
        }
        $quickLinks = $campaign->menuLinks()->active()->ordered()->with(['target'])->get();
        foreach ($quickLinks as $quickLink) {
            $parent = 'menu_links';
            if (!empty($quickLink->parent) && $campaign->boosted()) {
                $parent = $quickLink->parent;
            }
            $this->quickLinks[$parent][] = $quickLink;
        }
    }

    /**
     * Get the quick links for a specified section/parent
     * @param string|null $parent
     * @return array
     */
    public function quickLinks(string $parent = null): array
    {
        if (!$this->hasQuickLinks($parent)) {
            return [];
        }
        return $this->quickLinks[$parent];
    }

    /**
     * Determine if a section has quick links in it
     * @param string $parent
     * @return bool
     */
    public function hasQuickLinks(string $parent): bool
    {
        return array_key_exists($parent, $this->quickLinks) && !empty($this->quickLinks[$parent]);
    }
}
