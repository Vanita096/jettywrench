@extends('layouts.account')

@section('title', 'Two-step verification')
@section('heading', 'Two-step verification')
@section('return')
    <a href="{{ route('account.security.index') }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>Security & Privacy</a>
@endsection

@section('account.content')

    @if(auth()->user()->twoFactorEnabled())
        <form action="{{ route('account.security.twofactor.destroy') }}" method="post">
            @csrf
            @method('DELETE')

            @component('includes.partials.forms.columns')

                @slot('title', 'Turn off two-step verification')
                @slot('subtitle', 'You will only need your email and password to login to your account.')

                <div class="card">
                    <div class="card-body">

                        <p>For security purposes, please enter your account password to turn off two-step verification.</p>

                        @component('includes.partials.forms.form_group', ['id' => 'password', 'type' => 'password'])
                            Password
                        @endcomponent

                        <button type="submit" class="btn btn-danger">Turn off two-step verification</button>
                    </div>
                </div>

            @endcomponent
        </form>
    @else

        @if(auth()->user()->twoFactorPendingVerification())

            <form action="{{ route('account.security.twofactor.verify') }}" method="post">
                @csrf

                @component('includes.partials.forms.columns')

                    @slot('title', 'Verify device')
                    @slot('subtitle', 'Check your mobile device for a verification code.')

                    <div class="card">
                        <div class="card-body">
                            @component('includes.partials.forms.form_group', ['id' => 'token', 'mask' =>'000 000', 'show_labels' => true])

                                Verification code

                                @slot('help_text')
                                    Didn't receive a verification code? <a href="{{ route('account.security.twofactor.resend') }}">Request a new code</a>
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

        @else

            <form action="{{ route('account.security.twofactor.store') }}" method="post">
                @csrf


                @component('includes.partials.forms.columns')

                    @slot('title', 'Device details')
                    @slot('subtitle', 'Provide some information about the device that you would like to use for two-factor authentication.')

                    <div class="card">
                        <div class="card-body">
                            @component('includes.partials.forms.form_group', ['id' => 'dial_code', 'form_element' => 'select', 'show_labels' => true, 'selected' => '1'])
                                Dial Code

                                @slot('placeholder', 'Select a country')

                                @slot('options', $country_dial_codes)

                            @endcomponent

                            @component('includes.partials.forms.form_group', ['id' => 'phone', 'show_labels' => true, 'type' => 'tel', 'mask' => '(999) 999-9999'])
                                Phone number

                                @slot('example', 'E.g. (555) 555-5555')

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

        @endif
    @endif


@endsection
