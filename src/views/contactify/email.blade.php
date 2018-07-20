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
@php
    // get all the valid fields to show
    $valid_fields = config('contactify.fields_to_show_in_email',[]);

@endphp
<table>
    @if(count($valid_fields) > 0)
        @foreach($valid_fields as $valid_field)

            @if(isset($$valid_field) && !is_null($$valid_field)&& ($valid_field != "message") && (is_string($valid_field)))
                <tr>
                    <td><b> {{ ucwords(str_replace('_',' ',$valid_field)) }}</b></td>
                    <td> {{(is_string($$valid_field) || (is_numeric($$valid_field))) ? (string) $$valid_field: " --- "}} </td>
                </tr>
            @endif
        @endforeach

    @endif

</table>
</body>
</html>