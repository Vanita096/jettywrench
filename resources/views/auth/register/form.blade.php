<form action="{{ route('register') }}" method="post">

    {{ csrf_field() }}

    <div class="form-row">



        @component('includes.partials.forms.form_group', ['id' => 'firstName', 'size' => isset($size) ? $size : '', 'class' => 'col-6'])
            First name

            @slot('example')
                E.g. Clifford
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'lastName', 'size' => isset($size) ? $size : '', 'class' => 'col-6'])
            Last name

            @slot('example')
                E.g. White
            @endslot

        @endcomponent

    </div>

    @component('includes.partials.forms.form_group', ['id' => 'email', 'size' => isset($size) ? $size : '', 'type' => 'email'])
        Email

        @slot('example')
            E.g. hello@jettywrench.com
        @endslot

    @endcomponent



    @component('includes.partials.forms.form_group', ['id' => 'phone', 'size' => isset($size) ? $size : '', 'type' => 'tel', 'mask' => '(000) 000-0000'])
        Phone number

        @slot('example')
            E.g. (718) 902-6562
        @endslot

    @endcomponent

    @component('includes.partials.forms.form_group', ['id' => 'zipCode', 'size' => isset($size) ? $size : '', 'pattern' => '[0-9]*', 'mask' => '00000'])
        ZIP Code

        @slot('example')
            E.g. 11222
        @endslot

    @endcomponent



    @component('includes.partials.forms.form_group', ['id' => 'password', 'size' => isset($size) ? $size : '', 'type' => 'password', 'help_text' => 'Must be at least 6 characters'])
        Password

        @slot('example')
            My secret password
        @endslot
    @endcomponent

    <button type="submit" class="btn btn-primary btn-block btn-{{ isset($size) ? $size : '' }} mt-4">Sign up</button>

    <p class="text-center text-muted small mt-4">By clicking Sign Up, you agree to our Terms and that you have read our Privacy Policy.</p>

    <p class="text-center text-muted mt-4">Already have an account? <a href="{{ route('login') }}" class="text-info">Log in</a></p>

</form>