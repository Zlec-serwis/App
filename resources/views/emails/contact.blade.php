<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body {
            Margin: 0!important;
            padding: 15px;
            background-color: #F1F1F1;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #F1F1F1;
        }
        .wrapper-inner {
            width: 100%;
            background-color: #f1f1f1;
            max-width: 670px;
            Margin: 0 auto;
        }
        table {
            border-spacing: 0;
            font-family: sans-serif;
            color: #727f80;
        }
        .outer-table {
            width: 100%;
            max-width: 670px;
            margin: 0 auto;
            background-color: #F1f1f1;
        }
        td {
            padding: 0;
        }
        p {
            Margin:0;
        }

        a {
            color: #F1F1F1;
            text-decoration: none;
        }

        .center {
            display: table;
            Margin: 0 auto;
        }
        .main-table {
            width: 100%;
            max-width: 610px;
            margin: 0 auto;
            background-color: #FFF;
            border-radius: 6px;
        }
        .one-column .inner-td {
            font-size: 16px;
            line-height: 20px;
            text-align: justify;
        }
        .inner-td {
            padding: 10px;
        }
        .h2 {
            text-align: center;
            font-size: 23px;
            font-weight: 600;
            line-height: 45px;
            Margin: 12px;
            color: #4A4A4A;
        }
        p.center {
            text-align: center;
            max-width: 580px;
            line-height: 24px;
        }
        .button-holder-center {
            text-align: center;
            Margin: 5% 2% 3% 0;
        }
        .btn {
            font-size: 15px;
            font-weight: 600;
            background: rgb(188, 190, 190);
            color: #FFF;
            text-decoration: none;
            padding: 9px 16px;
            border-radius: 28px;
        }
        .h3 {
            text-align: center;
            font-size: 21px;
            font-weight: 600;
            Margin-bottom: 8px;
            color: #4A4A4A;
        }

        .h1 {
            text-align: center!important;
            font-size: 25px!important;
            font-weight: 600;
            line-height: 45px;
            Margin: 12px 0 20px 0;
            color: #4A4A4A;
        }

        @media screen and (max-width: 400px) {
            .h1 {
                font-size: 22px;
            }
            .one-column {
                max-width: 100%!important;
            }
        }
    </style>
</head>
<body>
<div class="wrapper">
    <table class="main-table">
        <tr>
            <td class="one-column">
                <table width="100%">
                    <tr>
                        <td class="inner-td">
                            <p class="h2">Witaj otrzymałeś wiadomość od {{$contact->name}}!</p>
                            <p class="center">Treść wiadomości: <br> {{ $contact->message }}</p><br>
                            <p class="center">Kontakt: <br> {{ $contact->email }}</p><br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<br>
</body>
</html>
