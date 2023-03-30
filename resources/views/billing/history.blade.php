<?php /** @var \Laravel\Cashier\Invoice $invoice */?>
@extends('layouts.app', [
    'title' => __('billing/invoices.title'),
    'description' => '',
    'breadcrumbs' => false,
    'sidebar' => 'settings',
    'noads' => true,
])

@section('content')
    <h1 class="mb-5">
        {{ __('billing/invoices.title') }}
    </h1>
    <p class="text-lg">
        {{ __('billing/invoices.description') }}
    </p>
    @include('partials.errors')
    <div class="max-w-3xl">
        <div class="box box-solid">
            <div class="box-body">

                <table class="table-hover w-full text-left">
                    <thead>
                    <tr>
                        <th>{{ __('billing/invoices.fields.date') }}</th>
                        <th>{{ __('billing/invoices.fields.amount') }}</th>
                        <th>{{ __('billing/invoices.fields.status') }}</th>
                        <th>{{ __('billing/invoices.fields.invoice') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td class="py-1">{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td class="py-1">{{ $invoice->total() }}</td>
                            <td class="py-1">{{ $invoice->paid ? __('billing/invoices.status.paid') : __('billing/invoices.status.pending') }}</td>
                            <td class="py-1 ">
                                <a href="{{ route('billing.history.download', ['invoice' => $invoice->id]) }}">
                                    <i class="fa-solid fa-download"></i> {{  __('billing/invoices.actions.download') }}
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
