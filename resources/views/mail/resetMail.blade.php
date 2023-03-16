<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .fontBig{
            font-size: 20px !important;
        }

        .border {
            border: 1px solid rgb(0, 0, 0)
        }
        a{
            text-decoration: none
        }
        #shadow {
            border: 1px solid;
            padding: 10px;
            box-shadow: 10px 10px 10px #888888;
        }


        .container {
            padding-left: 300px;
            padding-right: 300px;
        }

        .centerDiv {
            margin: auto;
            width: 35%;
            border: 3px solid #73AD21;
            padding: 10px;
        }

    </style>
</head>

<body>
    <img src="{{ $message->embed('Img/common-banner.jpg') }}" width="100%" />
    <div style="text-align: center">
        <h1><b>WELCOME TO BOARD GAMES</b></h1>
    </div>
    <div class="centerDiv fontBig" id="shadow">
        <div style="padding-left: 30px;padding-right:30px">
            <p>
                <h4><b>Hello {{ $data['customerName'] }}</b></h4>
            </p>
            Please click <a href="{{ url('reset-new-password/'.$data['userId']) }}">here</a> to reset your password
            <br><br>
            <div style="text-align: center">
                <a href="{{ url('verify-email/'.$data['userId']) }}" target="_blank">Verify your email</a>
            </div>
            <br>
            Regards,
            <br>
            The World Of Board Games
        </div>
    </div>
</body>

</html>
