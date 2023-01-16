<?php

namespace App\Services\Families;

use App\Models\Character;
use App\Models\Entity;
use App\Models\Family;
use App\Models\FamilyTree;
use Illuminate\Support\Arr;

class FamilyTreeService
{
    protected Family $family;

    protected FamilyTree $familyTree;

    protected array $entityIds;

    protected array $entities;
    protected array $missingIds;

    protected array $config;

    public function family(Family $family): self
    {
        $this->family = $family;
        return $this;
    }

    public function api(): array
    {
        $this->loadSetup();
        return $this->fake();
    }


    protected function loadSetup(): void
    {
        $this->loadFamilyTree();

        // Get all the entity ids
        if (empty($this->familyTree->config)) {
            return;
        }

        $this->prepareEntities();
        //foreach ()
    }

    protected function loadFamilyTree(): void
    {
        $familyTree = $this->family->familyTree;
        if (!$familyTree) {
            $familyTree = new FamilyTree();
            $familyTree->family_id = $this->family->id;
            $familyTree->config = $this->fakeNode();
            $familyTree->save();
        }
        $this->familyTree = $familyTree;
    }
    protected function prepareEntities(): void
    {
        $val = [];
        $key = 'entity_id';
        $data = $this->familyTree->config;
        array_walk_recursive($data, function ($v, $k) use ($key, &$val) {
            if ($k === $key) array_push($val, $v);
        });
        $this->entityIds = array_unique(array_values(count($val) > 1 ? $val : array_pop($val)));
        //dump($this->entityIds);

        // Prepare entities
        $entities = Entity::inTypes([config('entities.ids.character')])
            ->find($this->entityIds);
        foreach ($entities as $entity) {
            $this->entities[$entity->id] = [
                'id' => $entity->id,
                'name' => $entity->name,
                'url' => $entity->url(),
                'thumb' => $entity->avatar(),
            ];
        }
        //dump($this->entities);

        $this->missingIds = array_diff($this->entityIds, array_keys($this->entities));
        //dump($this->missingIds);

        $this->cleanupMissingEntities();
    }

    protected function cleanupMissingEntities(): void
    {
        if (empty($this->missingIds)) {
            $this->config = $this->familyTree->config;
            return;
        }

        $config = $this->familyTree->config;
        // Loop everything and remove entities that match
        foreach ($config as $key => $node) {
            $this->cleanupNode($config, $node, $key);
        }

        // Save the config now that its clean?
        $this->config = $config;
    }

    protected function cleanupNode(&$parent, $node, $key)
    {
        if (in_array($node['entity_id'], $this->missingIds)) {
            unset($parent[$key]);
            return;
        }
        foreach ($node['relations'] as $k => $rel) {
            if (in_array($rel['entity_id'], $this->missingIds)) {
                unset($node['relations'][$k]);
                continue;
            }
            if (!isset($rel['children'])) {
                continue;
            }
            foreach ($rel['children'] as $ck => $child) {
                $this->cleanupNode($node['relations'][$k]['children'], $child, $ck);
            }
            //$node['relations'][$k] = $rel;
        }
        $parent[$key]['relations'] = $node['relations'];
    }

    /**
     * Fake data for the family tree until we have actual data
     * @return array
     */
    protected function fake(): array
    {
        // Take X random characters
        $take = 15;
        $characters = Character::with('entity')->has('entity')->take($take)->get();

        if (count($characters) != $take) {
            return $this->error('fake.not-enough-characters');
        }

        $data = [
            'entities' => [],
        ];

        /**
         * Prepare entities
         */
        $key = 0;
        /** @var Character $character */
        foreach ($characters as $character) {
            $data['entities'][$key] = [
                'id' => $key,
                'name' => $character->name,
                'url' => $character->getLink(),
                'thumb' => $character->thumbnail()
            ];
            $key++;
        }
        /*$data['entities'][0]['name'] = 'Adam Morley';
        $data['entities'][1]['name'] = 'Elise Morley';
        $data['entities'][2]['name'] = 'Martha Evergreen';
        $data['entities'][3]['name'] = 'Sofie Morley';
        $data['entities'][4]['name'] = 'Boris Morley';
        $data['entities'][5]['name'] = 'Francis-Pedro Morley';
        $data['entities'][6]['name'] = 'Frederico Morley';
        $data['entities'][7]['name'] = 'Fabiano Morley-Sadhet';*/

        /**
         * Build nodes
         */
        $data['nodes'] = $this->fakeNode();

        return $data;
    }

    protected function fakeNode(): array
    {
        return [
            [
                'entity_id' => 0,
                'uuid' => 'df968aa7-74e0-4b38-b887-7d239c458876',
                'relations' => [
                    // First relation, current wife with kids
                    [
                        'entity_id' => 1,
                        'role' => 'Wife',
                        'uuid' => 'ae064fb7-db8f-487f-9675-ed9fb595e110',
                        'children' => [
                            // First child, with husband
                            [
                                'entity_id' => 3,
                                'uuid' => '20000000-0000-0000-0000-000000000000',
                                'relations' => [
                                    [
                                        'entity_id' => 4,
                                        'role' => 'Husband',
                                        'uuid' => 'a0000000-0000-0000-0000-000000000000',
                                        'children' => [
                                            [
                                                'entity_id' => 5,
                                                'uuid' => 'b0000000-0000-0000-0000-000000000000',
                                            ],
                                            [
                                                'entity_id' => 6,
                                                'uuid' => 'c0000000-0000-0000-0000-000000000000',
                                            ],
                                            [
                                                'entity_id' => 12,
                                                'uuid' => 'd0000000-0000-0000-0000-000000000000',
                                                'relations' => [
                                                    [
                                                        'entity_id' => 6,
                                                        'uuid' => 'e0000000-0000-0000-0000-000000000000',
                                                        'role' => 'Schnitzel',
                                                    ]
                                                ]
                                            ],
                                            [
                                                'entity_id' => 8,
                                                'uuid' => 'f0000000-0000-0000-0000-000000000000',
                                            ],
                                        ],
                                    ]
                                ]
                            ],
                            [
                                'entity_id' => 14,
                                'uuid' => 'g0000000-0000-0000-0000-000000000000',
                                'relations' => [
                                    [
                                        'entity_id' => 13,
                                        'uuid' => 'h0000000-0000-0000-0000-000000000000',
                                        'role' => 'Schach',
                                        'children' => [
                                            [
                                                'entity_id' => 9,
                                                'uuid' => 'i0000000-0000-0000-0000-000000000000',
                                            ],
                                        ]
                                    ]
                                ]
                            ],
                            [
                                'entity_id' => 7,
                                'uuid' => 'j0000000-0000-0000-0000-000000000000',
                                'relations' => [
                                    [
                                        'entity_id' => 6,
                                        'role' => 'Schühle',
                                        'uuid' => 'k0000000-0000-0000-0000-000000000000',
                                    ]
                                ],
                            ]
                        ],
                    ],
                    // Second relation, ex-wife, with child
                    [
                        'entity_id' => 2,
                        'role' => 'Ex-wife',
                        'uuid' => 'l0000000-0000-0000-0000-000000000000',
                        'children' => [
                            // Child
                            [
                                'entity_id' => 11,
                                'uuid' => 'm0000000-0000-0000-0000-000000000000',
                            ],
                            [
                                'entity_id' => 10,
                                'uuid' => 'n0000000-0000-0000-0000-000000000000',
                            ]
                        ],
                    ]
                ]
            ]
        ];
    }

    /**
     * Return an error handled by the frontend
     * @param string $code
     * @return array
     */
    protected function error(string $code): array
    {
        return [
            'error' => true,
            'code' => __($code)
        ];
    }

    /**
     * Save a new tree config to the database
     * @param string|null $data
     * @return $this
     */
    public function save(string $data = null): self
    {
        $this->loadFamilyTree();
        if (empty($data)) {
            $this->familyTree->config = [];
            $this->familyTree->save();
            return $this;
        }

        $data = json_decode($data);
        $data = $this->prepareForSave($data);

        $this->familyTree->config = $data;
        $this->familyTree->save();

        return $this;
    }

    /**
     * Prepare a new config for the database by adding a uuid everywhere
     * @param string $data
     * @return array
     */
    protected function prepareForSave(array $data): array
    {
        // Loop on the data, adding a uuid on each element that is missing one
        return $data;
    }
}
