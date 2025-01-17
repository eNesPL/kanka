<div class="box box-solid">
    <div class="box-header">
        <h3 class="box-title">
            {{ __('characters.show.tabs.journals') }}
        </h3>
    </div>
    <div class="box-body">

        <?php  $r = $model->journals()->orderBy('name', 'ASC')->with([
            'entity', 'entity.tags'
        ])->paginate(); ?>
        <table id="character-journals" class="table table-hover ">
            <tbody><tr>
                <th class="w-14"><br /></th>
                <th>{{ __('journals.fields.name') }}</th>
                <th class="visible-sm">{{ __('crud.fields.type') }}</th>
                <th class="visible-sm">{{ __('journals.fields.date') }}</th>
                <th>{{ __('crud.fields.calendar_date') }}</th>
                <th>&nbsp;</th>
            </tr>
            @foreach ($r as $journal)
                <tr>
                    <td>
                        <a class="entity-image" style="background-image: url('{{ $journal->thumbnail() }}');" title="{{ $journal->name }}" href="{{ route('journals.show', $journal->id) }}"></a>
                    </td>
                    <td>
                        {!! $journal->tooltipedLink() !!}
                    </td>
                    <td class="visible-sm">{{ $journal->type }}</td>
                    <td class="visible-sm">{{ \App\Facades\UserDate::format($journal->date) }}</td>
                    <td>{{ $journal->getDate() }}</td>
                    <td class="text-right">
                        <a href="{{ route('journals.show', [$journal]) }}" class="btn btn-xs btn-primary">
                            <i class="fa-solid fa-eye" aria-hidden="true"></i> <span class="visible-sm">{{ __('crud.view') }}</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @if ($r->hasPages())
        <div class="box-footer text-right">
            {{ $r->links() }}
        </div>
    @endif
</div>
