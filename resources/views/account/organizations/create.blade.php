@extends('layouts.account')

@section('title', 'Add organization')
@section('heading', 'Add organization')
@section('return')
    <a href="{{ route('account.organizations.index') }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>Organizations</a>
@endsection

@section('account.content')

    <form action="{{ route('account.organizations.store') }}" method="post">
        @csrf

        @component('includes.partials.forms.columns')

            @slot('title', 'Basic Information')
            @slot('subtitle', 'Just the easy-to-remember stuff')

            <div class="card">
                <div class="card-body">
                    @component('includes.partials.forms.form_group', ['id' => 'name',])
                        Organization name

                        @slot('example')
                            E.g. Mike's Tool Shop
                        @endslot

                    @endcomponent

                    @component('includes.partials.forms.form_group', ['id' => 'subdomain'])
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

                    @component('includes.partials.forms.form_group', ['id' => 'description', 'form_element' => 'textarea'])

                        Description

                    @endcomponent

                    @component('includes.partials.forms.form_group', ['id' => 'website'])

                        Website (optional)

                        @slot('example')
                            E.g. mikestoolshop.com
                        @endslot

                        @slot('prepend')
                            https://
                        @endslot
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
