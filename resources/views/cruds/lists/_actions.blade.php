@foreach ($actions as $action)
    @if (empty($action['policy']) || (auth()->check() && auth()->user()->can($action['policy'], $model)))
        <a href="{{ $action['route'] }}" class="btn btn-{{ $action['class'] }} mr-2" @if ($action['blank'])target="_blank"@endif>
            {!! $action['label'] !!}
        </a>
    @endif
@endforeach
