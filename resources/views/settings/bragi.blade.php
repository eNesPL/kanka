<?php /** @var \App\Models\BragiLog $log */?>
@extends('layouts.app', [
    'title' => __('Bragi'),
    'description' => '',
    'breadcrumbs' => false,
    'sidebar' => 'settings',
    'noads' => true,
])

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                Bragi Logs
            </h3>
        </div>
        <div class="box-body">
            <div class="rounded p-5 bg-blue-100 text-slate-800">
                <p><strong>Tokens</strong> {{ auth()->user()->availableTokens() }} / {{ auth()->user()->maxTokens() }}</p>
                <p class="mb-0">Your tokens refill on <strong>{{ auth()->user()->tokenRenewalDate() }}</strong>.</p>
            </div>


            <div class="p-2">
            @foreach ($logs as $log)
                <div class="mb-5">
                    <div class="flex mb-1">
                        <div class="flex-1 font-bold text-uppercase">{{ $log->prompt }}</div>
                        <div class="text-right flex-none">
                            <span class="text-xs" title="{{ $log->created_at }} UTC">{{ $log->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="col-span-2 break-all" style="text-align: justify">{!! $log->result !!}</div>
                    @if ($isAdmin)
                        <div class="grid gap-2 grid-cols-{{ count($log->data) }} rounded p-3 bg-orange-100 text-slate-800">
                            @foreach($log->data as $key => $value)

                                <div class="text-center text-xs">
                                    {{ $key }}: {{ $value }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <hr />
            @endforeach
            </div>
        </div>
        @if ($logs->hasPages())
            <div class="box-footer text-right">
                {{ $logs->links() }}
            </div>
        @endif
    </div>


@endsection
