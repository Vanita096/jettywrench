<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HTML & CSS Avery Labels (5160) by MM at Boulder Information Services</title>
    <link href="labels.css" rel="stylesheet" type="text/css">
    <style>
        body {
            width: 8.5in;
            margin: 0in .1875in;
            font-size: 10px;
        }
        .label{
            /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
            width: 3.5in; /* plus .6 inches from padding */
            height: 2.7in; /* plus .125 inches from padding */
            padding: .125in .3in 0;
            margin-right: .125in; /* the gutter */

            float: left;

            text-align: center;
            overflow: hidden;

            /*outline: 1px dotted; !* outline doesn't occupy space like border does *!*/
        }

        .label table tr td {
            text-align: center;
        }
        .page-break  {
            clear: left;
            display:block;
            page-break-after:always;
        }
    </style>

</head>

<body onload="window.print()">

@for ($i = 0; $i < 8; $i++)

<div class="label">
    @if($type == 'product')
    <table>
        <tr>
            <td>
                <br>
                <br> <img src="https://cdn2.logiforms.com/formdata/user_forms/23872_9090132/90254/media_elements/Screen%20Shot%202017-12-17%20at%2010.49.10%20AM.png" height="74">
                <br> <strong>{{ $product_name }} @if( strtolower($variation_type) != 'regular' ) ({{ $variation_type }})@endif</strong>
                <br> 63-06 Woodhaven Blvd.
                <br> Rego Park, NY 11374
                <br> (718) 205-1992
                <br> www.aaronsgourmet.com
                <br> aaronsfood@gmail.com
                <br>
            </td>
            <td>
                <br>
                <img src="https://i.imgur.com/EpHA4Pd.png" width="125px" alt="">
            </td>
        </tr>
    </table>
    @else
    <br>
                    {{ strtolower($variation_type) == 'regular' ? '' : $variation_type }}
                    <!-- <br> <img src="https://cdn2.logiforms.com/formdata/user_forms/23872_9090132/90254/media_elements/Screen%20Shot%202017-12-17%20at%2010.49.10%20AM.png" height="74"> -->
                    <br> <strong>{{ $product_name }}</strong>
                    <br> <strong>Ingredients:</strong> {{ $ingredients }}
                    <br>
                    <br>
                    <!-- <img src="https://i.imgur.com/9O6iXdH.jpg" width="155px" alt=""> -->

    @endif
</div>

@endfor

<div class="page-break"></div>

</body>

</html>