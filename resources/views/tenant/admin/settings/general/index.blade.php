@extends('layouts.dashboard')

@section('title', 'General')
@section('heading', 'General')
@section('return')
    <a href="{{ route('tenant.admin.settings.index', request()->tenant()->subdomain) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>Settings</a>
@endsection

@section('dashboard.content')

    <form action="{{ route('tenant.admin.settings.general.store', request()->tenant()->subdomain) }}" method="post" enctype="multipart/form-data">
        @csrf

        @component('includes.partials.forms.columns')

            @slot('title', 'Basic Information')
            @slot('subtitle', 'Just the easy-to-remember stuff')

            <div class="card">
                <div class="card-body">
                    @component('includes.partials.forms.form_group', ['id' => 'name', 'value' => request()->tenant()->name, 'show_labels' => 'true'])
                        Organization name

                        @slot('example')
                            E.g. Mike's Tool Shop
                        @endslot

                    @endcomponent

                    @component('includes.partials.forms.form_group', ['id' => 'subdomain', 'value' => request()->tenant()->subdomain, 'show_labels' => 'true'])
                        Workspace

                        @slot('example')
                            E.g. mikestoolshop
                        @endslot

                        @slot('append')
                            .{{ config('app.domain') }}
                        @endslot

                    @endcomponent
                </div>
            </div>

        @endcomponent

        @component('includes.partials.forms.columns')

            @slot('title', 'Details')
            @slot('subtitle', 'Provide us with some background information about your organization.')

            <div class="card">
                <div class="card-body">

                    @component('includes.partials.forms.form_group', ['id' => 'description', 'form_element' => 'textarea', 'value' => request()->tenant()->description, 'show_labels' => 'true'])

                        Description

                    @endcomponent

                    @component('includes.partials.forms.form_group', ['id' => 'website', 'value' => request()->tenant()->website, 'show_labels' => 'true'])

                        Website

                    @endcomponent
                </div>
            </div>

        @endcomponent

        @component('includes.partials.forms.columns')

            @slot('title', 'Branding')
            @slot('subtitle', 'Upload logos and icons')

            <div class="card">
                <div class="card-body">

                    @if(request()->tenant()->getMedia('logos')->count() > 0)
                        <img src="{{ request()->tenant()->getMedia('logos')->last()->getUrl('profile') }}" class="rounded" alt="">
                        <hr>
                    @endif

                    @component('includes.partials.forms.form_group', ['id' => 'logo', 'form_element' => 'file', 'placeholder' => 'Choose your logo'])

                    @endcomponent
                </div>
            </div>

        @endcomponent

        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-lg float-right">Save</button>
            </div>
        </div>

    </form>
@endsection
