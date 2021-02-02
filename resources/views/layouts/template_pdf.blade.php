<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>

        body{
            font-size: 11px;
            font-family: arial, calibri;
            /*font-family: DejaVu Sans, sans-serif; */
            /*font-family: DejaVu Sans; */
            background-color: #FFFFFF;


        }

        .logo img
        {
            width: 100%;
            max-width: 8em;
        }

        html {
            /*height: 100%;*/
        }

        footer
        {
            text-align: center;
        }
        * {-moz-box-sizing: border-box; box-sizing: border-box;}



        p{
            margin-left: 0em;

        }

        .header,
        .footer {
            width: 100%;
            bottom: 10px;
            z-index: 10000;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            position: fixed;

        }
        .header {
            top: 0px;
            /*text-align : left;
            border-bottom : 3px solid #888;*/
            text-align: center;
        }

        .entete1{
            font-size: 12px;
            line-height: 16px;
        }
        .entete{
            font-size: 12px;
            line-height: 10px;
        }
    </style>

</head>

<body style="width:108%; margin-left:-27px">

<div class="header">
    <table style=" width: 100%">
        <tr>
            <td style="text-align: center;">
               <h2>DIGIREPORT</h2>
                <hr/>
            </td>
        </tr>
    </table>
</div>

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12" style=" width: 100%; margin-top: 75px">
        @yield('content')
    </div>


</div>

<!--span style="position: absolute; bottom: -3%; font-style: italic; margin-left: 28%; background-color: #eee">Nous contr&ocirc;lons votre v&eacute;hicule, roulez en s&eacute;curit&eacute; !</span-->

<div class="footer">
    <hr/>
    <span>By WORLDVOICE GROUP</span>

</div>




@yield('popup')
</body>
</html>