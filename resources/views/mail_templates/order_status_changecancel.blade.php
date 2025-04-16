<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Email | Primefly</title>
    <style>
        * {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
        }

        body {
            font-optical-sizing: auto;
        }

        h4 {
            margin: 0;
            line-height: 1.6;
            font-size: 13px;
            font-weight: 600;
        }

        p {
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table tr td {
            vertical-align: top;
            font-size: 13px;
            line-height: 1.6;
        }

        th {
            font-size: 13px;
            line-height: 1.6;
        }

        ul li {
            margin: 0;
        }

        ul li table {
            width: auto !important;
            table-layout: fixed;
            margin-left: 5px;
        }

        a {
            color: #222 !important;
            text-decoration: none !important;
        }

        .ii a[href] {
            color: #222 !important;
            text-decoration: none !important;
        }

        .annexure_table,
        .annexure_table td,
        .annexure_table th {
            border: 1px solid #ccc;
        }

        table.annexure_table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table.annexure_table td {
            font-size: 11px;
            padding: 5px;
        }

        table.annexure_table th {
            padding: 5px;
            font-weight: 600;
            font-size: 12px;
        }
        .social_icon ul{
            padding-left: 0;
        }
        .social_icon li{
            list-style: none;
            display: inline-block;
            margin-left:10px;
        }
         .social_icon img{
            width: 15px;
         }
    </style>
</head>

<body>
    
    <table style=" width: 100%; background-color: #fff;max-width:680px;margin:auto;font-family: sans-serif;">
        <tr>
            <td style="padding: 30px 0;">
                <img style="width:100%" src="https://primefly.in/public/frontend/images/cancellation_banner.png" alt="Logo" style="width: 100px; height: auto;">
            </td>
        <tr>
       <tr> 
            <td style="padding-bottom: 15px; padding:25px 50px 0;">
                <h4 style="margin-bottom: 5px; font-size: 22px;">Dear {{$name}},</h4>
                <p style="color: #000;line-height: 1.6;font-size: 16px;margin-bottom: 10px;    font-weight: 400;">We’re sorry your booking with PrimeFly was cancelled.</p>
                <p style="color: #000;line-height: 1.6;font-size: 16px;font-weight: 400;margin-bottom: 20px;">If there’s anything we could have done differently or if you need help with future travel plans, we’d truly appreciate your feedback.</p>

            </td>
       </tr>     
         
        <tr>
            <td style="padding:25px 50px;background-image: linear-gradient(to right, #8A008E, #00328D);">
                <p style="margin-bottom:0px;font-size: 17px;color: #fff;">
                    At PrimeFly, we’re always working to improve and ensure your airport experience is seamless and comfortable. 
                </p>
            </td>
        </tr> 
        <tr>
            <td style="padding: 0 50px;">
                <p style="margin-top: 30px; margin-bottom:10px;font-size: 16px;font-weight: 400;">
                    We hope to assist you again soon and look forward to hearing from you.</p>
            </td>
        </tr>
        <tr>
            <td style="padding:25px 50px;">
                <p style="margin-bottom:5px;font-size: 16px;color:#6C6767">
                    Warm regards,
                </p> 
                <p style="margin-bottom:10px;font-size: 16px;">
                    Team PrimeFly
                </p> 
            </td>
        </tr>  
        <tr>
            <td style="padding-top:15px;border-top:1px solid #ccc;
                padding: 15px 30px 0;">
                <p style="font-size: 12px;margin-bottom: 5px;">Download Mobile App</p>
                <table style="width: 100%;">
                    <td style="width: 50%;"> 
                        <a href="https://play.google.com/store/apps/details?id=com.primefly&hl=en_IN"><img src="https://primefly.in/public/frontend/images/google-play.png" alt="Google Play" style="width:46%; height: auto;"></a>
                        <a href=""><img src="https://primefly.in/public/frontend/images/app-store.png" alt="App Store" style="width: 46%; height: auto;"></a>
                    </td>
                    <td style="width: 50%; padding-left: 60px;text-align: right;" class="social_icon">
                        <h4 style="margin-bottom: 3px;font-size: 14px;">Follow Us On</h4>
                        <ul style="margin: 0;">
                            <li>
                                <a href="https://www.facebook.com/primefly.airportservices">
                                    <img src="https://primefly.in/public/frontend/images/facebook-app-symbol.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li>
                            <!-- <li>
                                <a href="">
                                    <img src="https://primefly.in/public/frontend/images/twitter.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li> -->
                            <li>
                                <a href="https://www.youtube.com/@primefly">
                                    <img src="https://primefly.in/public/frontend/images/youtube.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/primefly.in/?igsh=YmYyYzVvdTVzeThl#">
                                    <img src="https://primefly.in/public/frontend/images/instagram.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li>
                            <!-- <li>
                                <a href="">
                                    <img src="https://primefly.in/public/frontend/images/linkedin.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li> -->
                        </ul>
                    </td>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 0px 30px;">
                <p style=" line-height: 1.8;font-size: 12px;margin-bottom: 20px;">For Further Assistance: <a href="mailto:support@primefly.in">Help centre</a> </p>
            </td>
        </tr>
    </table>
</body>

</html>