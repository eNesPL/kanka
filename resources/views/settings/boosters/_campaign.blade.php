<?php /**
 * @var \App\Models\Campaign $campaign
 * @var \App\Models\CampaignBoost $boost
 */
$boost = isset($boost) ? $boost : $campaign->boosts->first();?>
<div class="flex rounded-2xl gap-2 px-3 bg-box">
    <div class="flex-none py-5">
        @if ($campaign->image)
            <img src="{{ $campaign->thumbnail(60) }}" alt="{{ $campaign->name }}" loading="lazy" class="rounded-full w-12 h-12" />
        @else
            <img src="https://images.kanka.io/app/Cs0miUCBJiBcn7lSp89KhwoNBFo=/60x60/smart/src/images%2Fbackgrounds%2Fmountain-background-medium.jpg" alt="{{ $campaign->name }}" loading="lazy" class="rounded-full w-12 h-12" />
        @endif
     </div>
    <div class="py-5 flex-1 truncate">
        <a class="name truncate font-bold h-8 text-lg" href="{{ url(app()->getLocale() . '/' . $campaign->getMiddlewareLink()) }}">
            {!! $campaign->name !!}
        </a>

        <p class="my-1">
            @if ($campaign->superboosted())
                <i class="fa-solid fa-rocket" aria-hidden="true"></i>
                {!! __('settings/boosters.campaign.superboosted', [
    'user' => link_to_route('users.profile', $boost->user->displayName(), $boost->user_id, ['target' => '_blank']),
    'time' => $boost->created_at->format('M Y')
    ]) !!}
            @elseif ($campaign->boosted())
                <i class="fa-solid fa-rocket" aria-hidden="true"></i>
                {!! __('settings/boosters.campaign.boosted', [
        'user' => link_to_route('users.profile', $boost->user->displayName(), $boost->user_id, ['target' => '_blank']),
    'time' => $boost->created_at->format('M Y')
        ]) !!}
            @else
                {{ __('settings/boosters.campaign.unboosted') }}
            @endif
        </p>
    </div>
    <div class="py-5 flex-none">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-sm btn-outline m-1">
                <i class="fa-solid fa-ellipsis-h" aria-hidden="true" data-tree="escape"></i>
                <span class="sr-only">{{ __('crud.actions.actions') }}</span>
            </label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-box rounded-box w-52" role="menu">
                @if (!$campaign->boosted())
                    <li>
                        <a href="#" data-toggle="dialog-ajax" data-target="boost-modal" data-url="{{ route('campaign_boosts.create', ['campaign' => $campaign]) }}">
                            {!! __('settings/boosters.boost.title', ['campaign' => \Illuminate\Support\Str::limit($campaign->name, 25)]) !!}
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="dialog-ajax" data-target="boost-modal" data-url="{{ route('campaign_boosts.create', ['campaign' => $campaign, 'superboost' => 1]) }}">
                            {!! __('settings/boosters.superboost.title', ['campaign' => \Illuminate\Support\Str::limit($campaign->name, 25)]) !!}
                        </a>
                    </li>
                @elseif (auth()->user()->can('destroy', $boost))
                    @if (!$campaign->superboosted())
                        <li>
                            <a href="#" data-toggle="dialog-ajax" data-target="boost-modal" data-url="{{ route('campaign_boosts.edit', [$boost]) }}">
                                {!! __('settings/boosters.superboost.title', ['campaign' => \Illuminate\Support\Str::limit($campaign->name, 25)]) !!}
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="#" data-toggle="dialog-ajax" data-target="boost-modal" data-url="{{ route('campaign_boost.confirm-destroy', $boost) }}" class="text-red">
                                {!! __('settings/boosters.boost.actions.remove', ['campaign' => \Illuminate\Support\Str::limit($campaign->name, 25)]) !!}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="#" data-toggle="dialog-ajax" data-target="boost-modal" data-url="{{ route('campaign_boost.confirm-destroy', $boost) }}" class="text-red">
                                {!! __('settings/boosters.superboost.actions.remove', ['campaign' => \Illuminate\Support\Str::limit($campaign->name, 25)]) !!}
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>
