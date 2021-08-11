@extends('layouts.tenant')

@section('title', 'About')

@section('tenant.public.content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">About</h1>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td>{{ $tenant->name }}</td>
                    </tr>
                    <tr>
                        <th>Subdomain</th>
                        <td>{{ $tenant->subdomain }}</td>
                    </tr>
                    <tr>
                        <th>UUID</th>
                        <td>{{ $tenant->uuid_text }}</td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td>{{ $tenant->created_at->diffForHumans() }}<br/>
                            <span class="text-muted">{{ $tenant->created_at->format("F j")  }}<sup>{{ $tenant->created_at->format("S")  }}</sup> {{ $tenant->created_at->format("Y") }} &bullet; {{ $tenant->created_at->format("g:i A") }}</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection