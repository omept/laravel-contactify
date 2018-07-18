<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2> {{ config('contactify.email_heading') }}</h2>
<p> {{ config('contactify.email_sub_heading') }} </p>
<br/>
<table>

    @php
        $default_valid_fields = [
        'email',
        'mobile',
        'subject',
        'name',
        'message',
    ];
     // get all the valid fields
     $valid_fields = config('contactify.fields_to_show_in_email',$default_valid_fields);

    @endphp
    @foreach($valid_fields as $valid_field)
        @if(isset($$valid_field) && !is_null($$valid_field))
            <tr>
                <td><b> {{ ucwords($$valid_field) }}</b></td>
                <td> {{$$valid_field}} </td>
            </tr>
        @endif
    @endforeach

</table>
</body>
</html>