@extends('layouts.account')

@section('title', 'Personal Information')
@section('heading', 'Personal Information')
@section('return')
    <a href="{{ route('account.index') }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>Account</a>
@endsection

@section('account.content')
    <form action="{{ route('account.profile.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        @component('includes.partials.forms.columns')

            @slot('title', 'Basic Information')
            @slot('subtitle', 'It doesn\'t get easier than this')

            <div class="card">
                <div class="card-body">
                    <div class="form-row">

                        <div class="col">
                            @component('includes.partials.forms.form_group', ['id' => 'first_name', 'value' => auth()->user()->first_name, 'show_labels' => true])
                                First name

                                @slot('example')
                                    E.g. Johnny
                                @endslot

                            @endcomponent
                        </div>

                        <div class="col">
                            @component('includes.partials.forms.form_group', ['id' => 'last_name', 'value' => auth()->user()->last_name, 'show_labels' => true])
                                Last name

                                @slot('example')
                                    E.g. Appleseed
                                @endslot

                            @endcomponent
                        </div>

                    </div>


                    @component('includes.partials.forms.form_group', ['id' => 'email', 'value' => auth()->user()->email, 'show_labels' => true])
                        Email

                        @slot('example')
                            E.g. support@jettywrench.com
                        @endslot

                    @endcomponent

                </div>
            </div>

        @endcomponent


        @component('includes.partials.forms.columns')

            @slot('title', 'Profile picture')
            @slot('subtitle', 'Smile!')

            <div class="card">
                <div class="card-body">

                    @if(auth()->user()->getMedia('avatars')->count() > 0)
                        <img src="{{ auth()->user()->getMedia('avatars')->last()->getUrl('profile') }}" class="rounded" alt="">
                        <hr>
                    @endif

                    @component('includes.partials.forms.form_group', ['id' => 'avatar', 'show_labels' => true, 'form_element' => 'file'])

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
