@extends('layouts.account')

@section('title', 'Organizations')
@section('heading', 'Organizations')
@section('return')
    <a href="{{ route('account.index') }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>Account</a>
@endsection
@section('actions')
    <a href="{{ route('account.organizations.create') }}" class="btn btn-primary">Add organization</a>
@endsection

@section('account.content')

    @component('includes.partials.forms.columns')

        @slot('title', 'My organizations')
        @slot('subtitle', 'Select an organization to make changes')

        @foreach(auth()->user()->organizations as $organization)
            <div class="card mb-3">

                <div class="card-body">
                    <div class="media">
                        <a href="{{ route('tenant.admin.dashboard', $organization->subdomain) }}">
                            <img class="mr-3 rounded" src="https://placehold.it/60x60" alt="Generic placeholder image">
                        </a>

                        <div class="media-body">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tenant.admin.dashboard', $organization->subdomain) }}"><h5 class="mt-0">{{ $organization->name }}</h5></a>
                                <div>
                                    {{--<span class="badge badge-pill badge-primary">Primary</span>--}}
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <span class="small text-secondary mr-2"><i class="fal fa-users pr-1"></i>10</span>
                                    <span class="small text-secondary"><i class="fal fa-store pr-1"></i>1</span>
                                </div>
                                <div>
                                    <a href="{{ $organization->website }}" class="btn btn-sm btn-light"><i class="fa fa-globe-americas pr-2"></i>Website</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    @endcomponent

@endsection
