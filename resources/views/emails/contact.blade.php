
    @component('mail::message')
    # Hello {{ $data['name'] }},

    {{ $data['message'] }}

    Thanks,<br>
    {{ config('app.name') }}

    @endcomponent




