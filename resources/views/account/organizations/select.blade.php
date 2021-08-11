@extends('layouts.auth')

@section('title', 'Select an organization')
@section('heading', 'Select an organization')

@section('auth.content')

    <div class="list-group">
        @forelse(auth()->user()->organizations as $organization)
        <a href="{{ route('tenant.admin.dashboard', $organization->subdomain) }}" class="list-group-item list-group-item-action d-flex align-items-center">
            <img src="https://placehold.it/40x40" alt="" class="mr-3">
            {{ $organization->name }}
            {{--<span class="badge badge-primary badge-pill ml-auto ">0</span>--}}
        </a>
        @empty
            <div class="list-group-item d-flex flex-column align-items-center justify-content-center text-muted py-4">
                <p>You do not belong to any organizations</p>
                <i class="far fa-frown"></i>
            </div>
        @endforelse

            <a href="{{ route('account.organizations.create') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-center">
                <span class="text-primary">
                    <i class="far fa-plus mr-1"></i>
                    Create a new organization
                </span>
            </a>
    </div>

@endsection
