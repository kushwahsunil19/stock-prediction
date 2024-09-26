<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
    <style>
        h3 {
            font-size: 24px;
            margin-left: 5px;
        }

        .sidebar1 {
            position: absolute;
            z-index: 1;
            top: -79px;
            right: -10px;
            background-color: #253d54fa;
            transition: 0.5s;
            padding-top: 20px;
            height: 90vh;
            overflow: auto;
            cursor: pointer;
            border-right: 1px solid #80808066 !important;
            box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
            -webkit-box-shadow: 3px 3px 5px 6px #ccc;
            -moz-box-shadow: 3px 3px 5px 6px #ccc;
            box-shadow: 3px 5px 5px 6px #cccccc2e
        }

        .sidebar1 a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #253d54fa;
            display: block;
            transition: 0.3s;
        }

        .sidebar1 a:hover {
            color: #f1f1f1;
        }

        .sidebar1 .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #253d54fa;
            padding: 10px 15px;
            border: none;
            position: absolute;
        }

        .openbtn:hover {
            background-color: #67737efa;
        }

        #main {
            position: fixed !important;
            transition: margin-left .5s;
            padding: 16px;
            margin-left: -47px;
            top: -20px;
            left: auto !important;
            position: absolute;
        }

        body {
            background-color: #f3f6f9;
            margin: 0;
            padding: 0;
        }

        .slide {
            color: #FFFFFF;
        }

        .openbtn {
            color: #f1f1f1;
        }

        form label {
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"][disabled] {
            color: black;
            margin-bottom: 10px;
        }

        .page-header {
            background-color: inherit !important;
            padding: 0.75rem 1.8rem;
        }
    </style>
</head>

<body>

    <div class="content-area" style="position:relative">

        <div>
            <div style="box-shadow: inset 0 0 21px;display:flex;">
                <iframe src="{{ env('GUAC_APP_URL') }}:8080/guacamole/#/client/{{ $base64Data }}?username={{ env('GuacaU') }}&password={{getenv('GuacaP')}}" width="{{ isset($accountData['vps']['screen_width']) ? $accountData['vps']['screen_width'] : '100%' }}" height="{{ isset($accountData['vps']['screen_height']) ? $accountData['vps']['screen_height'] : '600px' }}" frameborder="0">


                </iframe>

                <div id="slider-w" class="page-header d-flex align-items-center justify-content-between mb-4" style="position: absolute;
            right: 0;">

                    <div class="wrap-all-the-things">
                        <div class="row">
                            <div class="col-md-3">

                                <div class="sidebar1">
                                    <button class="openbtn" onclick="toggleNav()" id="main">></button>
                                    <div class="sssss"></div>
                                    <ul class="main-menu">
                                        <li class="slide">
                                            <h3 style="color: #fff;">Account details:</h3>
                                            @if ($accountData)
                                            @php

                                            $node_ip = $accountData['vps']['nodedata']['ip'];
                                            $rdp_port = $accountData['vps']['rdp_port'];

                                            $vps = $node_ip . ':' . $rdp_port;

                                            @endphp
                                            <form style="padding: 10px;">
                                                <label for="account-name">Account Name</label>
                                                <input type="text" id="account-name" name="account-name" value="{{ $accountData['account_name'] }}" disabled>
                                                <label for="vps">VPS</label>
                                                <input type="text" id="vps" name="vps" value="{{ $vps }}" disabled>

                                                <label for="facebook_id">Facebook ID</label>
                                                <input type="text" id="facebook_id" name="facebook_id" value="{{ $accountData['facebook_id'] }}" disabled>

                                                <label for="firstname" class="">First Name</label>
                                                <input type="text" id="first-name" name="first-name" value="{{ $accountData['first_name'] }}" disabled>
                                                <label for="last-name">Last Name</label>
                                                <input type="text" id="last-name" name="last-name" value="{{ $accountData['last_name'] }}" disabled>

                                                <label for="two_factor">2FA Code </label>
                                                <input type="text" id="two_factor" name="two_factor" value="{{ $accountData['two_factor'] }}" disabled>

                                                <label for="user_agent">User Agent </label>
                                                <input type="text" id="user_agent" name="user_agent" value="{{ $accountData['user_agent'] }}" disabled>

                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="email" value="{{ $accountData['email'] }}" disabled>

                                                <label for="email_password">Email Password</label>
                                                <input id="email_password" name="email_password" value="{{ $accountData['email_password'] }}" disabled>

                                                <label for="date_of_birth">Date of Birth</label>
                                                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ date('Y-m-d', strtotime($accountData['date_of_birth'])) }}" disabled>

                                            </form>
                                            @else
                                            <div>
                                                No Data
                                            </div>
                                            @endif
                                        </li>
                                        <li class="slide">
                                            <h3>Proxy data:</h3>
                                            @if ($accountData['proxy'])
                                            <form style="padding: 10px;">
                                                <label for="ip">IP</label>
                                                <input type="text" id="ip" name="ip" value="{{ $accountData['proxy']['ip'] }}" disabled>
                                                <label for="port">Port</label>
                                                <input type="text" id="port" name="port" value="{{ $accountData['proxy']['port'] }}" disabled>
                                                <label for="username">Username</label>
                                                <input type="text" id="username" name="username" value="{{ $accountData['proxy']['username'] }}" disabled>
                                                <label for="password">Password</label>
                                                <input type="text" id="password" name="password" value="{{ $accountData['proxy']['password'] }}" disabled>
                                            </form>
                                            @else
                                            <div>
                                                No Data
                                            </div>
                                            @endif
                                        </li>
                                        <li class="slide">
                                            <h3>CreditCard data:</h3>
                                            @if ($accountData['creditcardData'])
                                            <form style="padding: 10px;">
                                                <label for="card-holder-name">Card Holder Name</label>
                                                <input type="text" id="card-holder-name" name="card-holder-name" value="{{ $accountData['creditcardData']['name'] }}" disabled>
                                                <label for="card-number">Card Number</label>
                                                <input type="text" id="card-number" name="card-number" value="{{ $accountData['creditcardData']['card_number'] }}" disabled>
                                                <label for="expiration-date">Expiration Date</label>
                                                <input type="text" id="expiration-date" name="expiration-date" value="{{ $accountData['creditcardData']['expiration_date'] }}" disabled>
                                                <label for="cvc-code">CVC Code</label>
                                                <input type="text" id="cvc-code" name="cvc-code" value="{{ $accountData['creditcardData']['cvc_code'] }}" disabled>
                                            </form>
                                            @else
                                            <div>
                                                No Data
                                            </div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        // on load

        document.getElementById("main").style.position = "fixed";
        document.getElementById("main").style.top = "53%";
        document.getElementById("main").style.left = "98%";
        document.getElementById("slider-w").style.position = "absolute";
        document.getElementById("slider-w").style.right = "0";
        var sidebar = document.getElementsByClassName("sidebar1")[0];
        sidebar.style.width = "10px";
        sidebar.style.borderLeft = "3px solid #80808066";

        let sidebarOpen = false;

        function toggleNav() {
            const sidebar = document.querySelector('.sidebar1');
            const button = document.getElementById('main');

            if (!sidebarOpen) {
                openNav(sidebar, button);
            } else {
                closeNav(sidebar, button);
            }

            sidebarOpen = !sidebarOpen;
        }

        function openNav(sidebar, button) {
            sidebar.style.width = "212px";
            button.textContent = '<';
        }

        function closeNav(sidebar, button) {
            sidebar.style.width = "10px";
            sidebar.style.borderLeft = "3px solid #80808066";
            button.textContent = '>';
        }

        function toggleButton() {
            var button = document.querySelector('.openbtn');
            if (button.textContent === '>') {
                button.textContent = '<';
            } else {
                button.textContent = '>';
            }
        }
    </script>

</body>

</html>