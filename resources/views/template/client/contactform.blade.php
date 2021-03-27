@component('mail::message')
# {{$subject}}

## {{$message}}

Feel free to contact me via {{$phone}} or {{$email}}

Thanks,<br>
{{$fullname}}

{{ config('app.name') }}
@endcomponent