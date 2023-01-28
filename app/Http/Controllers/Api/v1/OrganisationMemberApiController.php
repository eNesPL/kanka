<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Organisation;
use App\Models\Campaign;
use App\Models\OrganisationMember;
use App\Http\Requests\StoreOrganisationMember as Request;
use App\Http\Resources\OrganisationMemberResource as Resource;
use Illuminate\Support\Facades\Log;

class OrganisationMemberApiController extends ApiController
{
    /**
     * @param Campaign $campaign
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Campaign $campaign, Organisation $organisation)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $organisation);
        Log::info('API', [
            'action' => 'index',
            'endpoint' => 'organisation_members'
        ]);
        return Resource::collection($organisation->members()->has('character')->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param OrganisationMember $organisationMember
     * @return Resource
     */
    public function show(Campaign $campaign, Organisation $organisation, OrganisationMember $organisationMember)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $organisation);
        return new Resource($organisationMember);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Organisation $organisation
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Campaign $campaign, Organisation $organisation)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $organisation);
        $model = OrganisationMember::create($request->all());
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Organisation $organisation
     * @param OrganisationMember $organisationMember
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(
        Request $request,
        Campaign $campaign,
        Organisation $organisation,
        OrganisationMember $organisationMember
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $organisation);
        $organisationMember->update($request->all());

        return new Resource($organisationMember);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Campaign $campaign
     * @param Organisation $organisation
     * @param OrganisationMember $organisationMember
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(
        \Illuminate\Http\Request $request,
        Campaign $campaign,
        Organisation $organisation,
        OrganisationMember $organisationMember
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $organisation);
        $organisationMember->delete();

        return response()->json(null, 204);
    }
}
