<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
      style="width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title>{{ config('app.name') .'- Order Placed' }}</title>
    <!--[if (mso 16)]>
    <style type="text/css">
        a {
            text-decoration: none;
        }
    </style>
    <![endif]-->
    <!--[if gte mso 9]>
    <style>sup {
        font-size: 100% !important;
    }</style><![endif]-->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        .es-button {
            mso-style-priority: 100 !important;
            text-decoration: none !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .es-desk-hidden {
            display: none;
            float: left;
            overflow: hidden;
            width: 0;
            max-height: 0;
            line-height: 0;
            mso-hide: all;
        }

        .es-button-border:hover a.es-button, .es-button-border:hover button.es-button {
            background: #7dbf44 !important;
            border-color: #7dbf44 !important;
        }

        .es-button-border:hover {
            background: #7dbf44 !important;
            border-color: #7dbf44 #7dbf44 #7dbf44 #7dbf44 !important;
        }

        [data-ogsb] .es-button {
            border-width: 0 !important;
            padding: 10px 20px 10px 20px !important;
        }

        td .es-button-border:hover a.es-button-1 {
            background: #7dbf44 !important;
            border-color: #7dbf44 !important;
        }

        td .es-button-border-2:hover {
            background: #7dbf44 !important;
        }

        [data-ogsb] .es-button.es-button-3 {
            padding: 10px 20px !important;
        }

        @media only screen and (max-width: 600px) {
            p, ul li, ol li, a {
                line-height: 150% !important
            }

            h1 {
                font-size: 30px !important;
                text-align: center;
                line-height: 120% !important
            }

            h2 {
                font-size: 22px !important;
                text-align: center;
                line-height: 120% !important
            }

            h3 {
                font-size: 20px !important;
                text-align: center;
                line-height: 120% !important
            }

            .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a {
                font-size: 30px !important
            }

            .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a {
                font-size: 22px !important
            }

            .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a {
                font-size: 20px !important
            }

            .es-menu td a {
                font-size: 16px !important
            }

            .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a {
                font-size: 16px !important
            }

            .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a {
                font-size: 14px !important
            }

            .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a {
                font-size: 14px !important
            }

            .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a {
                font-size: 12px !important
            }

            *[class="gmail-fix"] {
                display: none !important
            }

            .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 {
                text-align: center !important
            }

            .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 {
                text-align: right !important
            }

            .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 {
                text-align: left !important
            }

            .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img {
                display: inline !important
            }

            .es-button-border {
                display: block !important
            }

            a.es-button, button.es-button {
                font-size: 20px !important;
                display: block !important;
                border-left-width: 0px !important;
                border-right-width: 0px !important
            }

            .es-btn-fw {
                border-width: 10px 0px !important;
                text-align: center !important
            }

            .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right {
                width: 100% !important
            }

            .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header {
                width: 100% !important;
                max-width: 600px !important
            }

            .es-adapt-td {
                display: block !important;
                width: 100% !important
            }

            .adapt-img {
                width: 100% !important;
                height: auto !important
            }

            .es-m-p0 {
                padding: 0px !important
            }

            .es-m-p0r {
                padding-right: 0px !important
            }

            .es-m-p0l {
                padding-left: 0px !important
            }

            .es-m-p0t {
                padding-top: 0px !important
            }

            .es-m-p0b {
                padding-bottom: 0 !important
            }

            .es-m-p20b {
                padding-bottom: 20px !important
            }

            .es-mobile-hidden, .es-hidden {
                display: none !important
            }

            tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden {
                width: auto !important;
                overflow: visible !important;
                float: none !important;
                max-height: inherit !important;
                line-height: inherit !important
            }

            tr.es-desk-hidden {
                display: table-row !important
            }

            table.es-desk-hidden {
                display: table !important
            }

            td.es-desk-menu-hidden {
                display: table-cell !important
            }

            .es-menu td {
                width: 1% !important
            }

            table.es-table-not-adapt, .esd-block-html table {
                width: auto !important
            }

            table.es-social {
                display: inline-block !important
            }

            table.es-social td {
                display: inline-block !important
            }
        }
    </style>
</head>
<body
    style="width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
<div class="es-wrapper-color" style="background-color:#F6F6F6">
    <!--[if gte mso 9]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        <v:fill type="tile" color="#f6f6f6"></v:fill>
    </v:background>
    <![endif]-->
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
        <tr style="border-collapse:collapse">
            <td valign="top" style="padding:0;Margin:0">
                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-content-body"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                                   cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:10px;Margin:0">
                                        <!--[if mso]>
                                        <table style="width:580px">
                                            <tr>
                                                <td style="width:280px" valign="top"><![endif]-->
                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                            <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;width:280px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td>
                                        <td style="width:20px"></td>
                                        <td style="width:280px" valign="top"><![endif]-->
                                        <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                            <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;width:280px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td></tr></table><![endif]--></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-header" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-header-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                                   align="center"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                        <!--[if mso]>
                                        <table style="width:560px" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width:194px" valign="top"><![endif]-->
                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                            <tr style="border-collapse:collapse">
                                                <td class="es-m-p20b" align="left"
                                                    style="padding:0;Margin:0;width:174px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><p
                                                                    style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#494c45;font-size:16px">
                                                                    <br></p></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="es-hidden" style="padding:0;Margin:0;width:20px"></td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td>
                                        <td style="width:173px" valign="top"><![endif]-->
                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                            <tr style="border-collapse:collapse">
                                                <td class="es-m-p20b" align="left"
                                                    style="padding:0;Margin:0;width:173px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><p
                                                                    style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#494c45;font-size:16px">
                                                                    <br></p></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td class="es-m-p20b" align="left"
                                                    style="padding:0;Margin:0;width:173px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left"
                                                                style="padding:0;Margin:0;padding-bottom:5px;font-size:0">
                                                                <a target="_blank" href="javascript:void(0)"
                                                                   style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#494c45;font-size:16px"><img
                                                                    src="https://pentacodesdemos.com/artemyst/uploads/site/logo1677048558.png"
                                                                        alt
                                                                        style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                                        class="adapt-img" width="125"></a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td>
                                        <td style="width:20px"></td>
                                        <td style="width:173px" valign="top"><![endif]-->
                                        <table cellpadding="0" cellspacing="0" class="es-right" align="right"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                            <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;width:173px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><p
                                                                    style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#494c45;font-size:16px">
                                                                    <br></p></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td></tr></table><![endif]--></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                                   cellspacing="0"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center top">
                                        <table cellpadding="0" cellspacing="0" width="100%"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><h2
                                                                    style="Margin:0;line-height:31px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:26px;font-style:normal;font-weight:bold;color:#494c45">{{ $title }}</h2>
                                                            </td>
                                                        </tr>
                                                        @if($common->email_recipient != $name)
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center"
                                                                    style="padding:0;Margin:0;padding-top:10px"><p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                                        Thank you for the order!</p></td>
                                                            </tr>
                                                        @endif
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="Margin:0;padding-bottom:20px;padding-top:20px;padding-left:20px;padding-right:20px">
                                        <!--[if mso]>
                                        <table style="width:560px" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width:280px" valign="top"><![endif]-->
                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                            <tr style="border-collapse:collapse">
                                                <td class="es-m-p20b" align="left"
                                                    style="padding:0;Margin:0;width:280px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                                        width="100%" cellspacing="0" cellpadding="0" bgcolor="#efefef"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left"
                                                                style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                                <h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#494c45">
                                                                    SUMMARY:</h4></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left"
                                                                style="padding:0;Margin:0;padding-bottom:41px;padding-left:20px;padding-right:20px">
                                                                <table
                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                                    class="cke_show_border" cellspacing="1"
                                                                    cellpadding="1" border="0" align="left"
                                                                    role="presentation">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px">
                                                                            Order ID #:
                                                                        </td>
                                                                        <td style="padding:0;Margin:0"><strong><span
                                                                                    style="font-size:14px;line-height:21px">{{'PP'.$order->order_code}}</span></strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px">
                                                                            Order Date:
                                                                        </td>
                                                                        <td style="padding:0;Margin:0"><strong><span
                                                                                    style="font-size:14px;line-height:21px">{{ date("F, d Y", strtotime($order->created_at))  }}</span></strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px">
                                                                            Order Delivery:
                                                                        </td>
                                                                        <td style="padding:0;Margin:0"><strong><span
                                                                                    style="font-size:14px;line-height:21px">{{ date("F, d Y", strtotime($order->created_at . '+ 1 Day'))  }}</span></strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px">
                                                                            Order Total:
                                                                        </td>
                                                                        <td style="padding:0;Margin:0"><strong><span
                                                                                    style="font-size:14px;line-height:21px">{{$order->currency}} {{ number_format($orderGrandTotal['orderGrandTotal'],2) }}</span></strong>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                                    <br></p></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td>
                                        <td style="width:0px"></td>
                                        <td style="width:280px" valign="top"><![endif]-->
                                        <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                            <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;width:280px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                                        width="100%" cellspacing="0" cellpadding="0" bgcolor="#efefef"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left"
                                                                style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                                <h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#494c45">
                                                                    SHIPPING ADDRESS:</h4></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left"
                                                                style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">{{$order->orderCustomer->shippingAddress->first_name.' '.$order->orderCustomer->shippingAddress->last_name}}</p>
                                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">{{$order->orderCustomer->shippingAddress->address}}</p>
                                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">{{$order->orderCustomer->shippingAddress->state->country->title}}
                                                                    ,{{$order->orderCustomer->shippingAddress->state->title}}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td></tr></table><![endif]--></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                                   cellspacing="0"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                @foreach($order->orderProducts as $product)
                                    @php
                                        $shoppingTotal[] = $product->total;
                                    @endphp
                                    <tr style="border-collapse:collapse">
                                        <td align="left"
                                            style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-position:center top">
                                            <!--[if mso]>
                                            <table style="width:560px" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="width:154px" valign="top"><![endif]-->
                                            <table cellpadding="0" cellspacing="0" class="es-left" align="left"
                                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                <tr style="border-collapse:collapse">
                                                    <td class="es-m-p20b" align="left"
                                                        style="padding:0;Margin:0;width:154px">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top"
                                                               role="presentation">
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center"
                                                                    style="padding:0;Margin:0;font-size:0"><a
                                                                        target="_blank"
                                                                        href="{{ url('product/'.$product->productData->short_url) }}"
                                                                        style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#494c45;font-size:14px"><img
                                                                            class="adapt-img"
                                                                            src="{{asset($product->productData->thumbnail_image)}}"
                                                                            alt
                                                                            style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                                            width="154"></a></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--[if mso]></td>
                                            <td style="width:20px"></td>
                                            <td style="width:386px" valign="top"><![endif]-->
                                            <table cellpadding="0" cellspacing="0" class="es-right" align="right"
                                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                                <tr style="border-collapse:collapse">
                                                    <td align="left" style="padding:0;Margin:0;width:386px">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                               role="presentation"
                                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr style="border-collapse:collapse">
                                                                <td align="left" class="es-m-txt-l"
                                                                    style="padding:0;Margin:0;padding-top:10px"><h3
                                                                        style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:19px;font-style:normal;font-weight:normal;color:#494c45">
                                                                        <strong>{{$product->productData->title}}</strong>
                                                                    </h3></td>
                                                            </tr>
                                                            @php
                                                            $frame = App\Models\Frame::where('id',$product->frame)->first();
                                                            $type = App\Models\ProductType::where('id',$product->type)->first();
                                                               $size = App\Models\Size::where('id',$product->size)->first();
                                                        @endphp
                                                          @if($type)
                                                                <tr style="border-collapse:collapse">
                                                                    <td align="left" class="es-m-txt-l"
                                                                        style="padding:0;Margin:0;padding-top:10px"><h3
                                                                            style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:19px;font-style:normal;font-weight:normal;color:#494c45">
                                                                            <strong><span
                                                                                    style="color:#000000"> Type : </span>&nbsp; {{ $type->title }}
                                                                            </strong></h3></td>
                                                                </tr>
                                                            @endif
                                                            @if($frame)
                                                                <tr style="border-collapse:collapse">
                                                                    <td align="left" class="es-m-txt-l"
                                                                        style="padding:0;Margin:0;padding-top:10px"><h3
                                                                            style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:19px;font-style:normal;font-weight:normal;color:#494c45">
                                                                            <strong><span
                                                                                    style="color:#000000"> Frame : </span>&nbsp; {{ $frame->title }}
                                                                            </strong></h3></td>
                                                                </tr>
                                                                @endif
                                                                @if($size)
                                                                <tr style="border-collapse:collapse">
                                                                    <td align="left" class="es-m-txt-l"
                                                                        style="padding:0;Margin:0;padding-top:10px"><h3
                                                                            style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:19px;font-style:normal;font-weight:normal;color:#494c45">
                                                                            <strong><span
                                                                                    style="color:#000000"> Size : </span>&nbsp;{{ $size->title }}
                                                                            </strong></h3></td>
                                                                </tr>
                                                                @endif
                                                            
                                                            <tr style="border-collapse:collapse">
                                                                <td align="left" class="es-m-txt-l"
                                                                    style="padding:0;Margin:0;padding-top:10px"><h3
                                                                        style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:19px;font-style:normal;font-weight:normal;color:#494c45">
                                                                        <strong><span style="color:#000000">Qty:</span>&nbsp;{{$product->qty}}
                                                                        </strong></h3></td>
                                                            </tr>
                                                            <tr style="border-collapse:collapse">
                                                                <td align="left" class="es-m-txt-l"
                                                                    style="padding:0;Margin:0;padding-top:10px"><h3
                                                                        style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:19px;font-style:normal;font-weight:normal;color:#494c45">
                                                                        <strong><span
                                                                                style="color:#000000">Price:</span>&nbsp;{{$order->currency}} {{$product->cost}}
                                                                        </strong></h3></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--[if mso]></td></tr></table><![endif]--></td>
                                    </tr>
                                @endforeach
                                @php
                                    $sub_total = array_sum($shoppingTotal);
                                    $grand_total = $sub_total+$order->shipping_charge+$order->tax_amount+$order->gift_wrapper_charge;
                                @endphp
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                                   cellspacing="0"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="padding:0;Margin:0;padding-top:15px;padding-left:20px;padding-right:20px;background-position:center top">
                                        <table cellpadding="0" cellspacing="0" width="100%"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;border-top:1px solid #cccccc;border-bottom:1px solid #cccccc;background-position:center top"
                                                           role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left"
                                                                style="padding:0;Margin:0;padding-top:10px">
                                                                <table border="0" cellspacing="1" cellpadding="1"
                                                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:500px"
                                                                       class="cke_show_border" role="presentation">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0"><h4
                                                                                style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#333333">
                                                                                Subtot<strong>al
                                                                                    ({{count($order->orderProducts)}}
                                                                                    items):</strong></h4></td>
                                                                        <td style="padding:0;Margin:0;color:#494c45">
                                                                            <strong> {{$order->currency.' '.$orderTotal}}</strong>
                                                                        </td>
                                                                    </tr>
                                                                    @if($order->gift_wrapper_enabled=='Yes')
                                                                        <tr style="border-collapse:collapse">
                                                                            <td style="padding:0;Margin:0"><h4
                                                                                    style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#333333">
                                                                                    Gift Wrapper Charge:</h4></td>
                                                                            <td style="padding:0;Margin:0;color:#494c45">
                                                                                <strong> {{$order->currency.' '.$order->gift_wrapper_charge}}</strong>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0"><h4
                                                                                style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#333333">
                                                                                Tax:</h4></td>
                                                                        <td style="padding:0;Margin:0;color:#494c45">
                                                                            <strong> {{$order->currency}} {{$order->tax_amount}}</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0"><h4
                                                                                style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#333333">
                                                                                Shipping Charge:</h4></td>
                                                                        <td style="padding:0;Margin:0;color:#494c45">
                                                                            <strong> {{$order->currency}} {{$order->shipping_charge}}</strong>
                                                                        </td>
                                                                    </tr>
                                                                    @if($order->orderCoupons!=NULL)
                                                                        @foreach($order->orderCoupons as $orderCoupon)
                                                                            <tr style="border-collapse:collapse">
                                                                                <td style="padding:0;Margin:0"><h4
                                                                                        style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#ff0000">
                                                                                        Coupon Amount
                                                                                        ({{$orderCoupon->coupon->code}}
                                                                                        ):</h4></td>
                                                                                <td style="padding:0;Margin:0;color:#ff0000">
                                                                                    <strong> {{$order->currency}} {{$orderCoupon->coupon_value}}</strong>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                    @if($order->payment_method=='COD' && $order->cod_extra_charge!='0.00')
                                                                        <tr style="border-collapse:collapse">
                                                                            <td style="padding:0;Margin:0"><h4
                                                                                    style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#ff0000">
                                                                                    COD Charge:</h4></td>
                                                                            <td style="padding:0;Margin:0;color:#ff0000">
                                                                                <strong> {{$order->currency.' '.$order->cod_extra_charge}}</strong>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0"><h4
                                                                                style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#333333">
                                                                                Order Total:</h4></td>
                                                                        <td style="padding:0;Margin:0;color:#494c45">
                                                                            <strong> {{$order->currency}} {{number_format(($orderGrandTotal['orderGrandTotal']>0)?$orderGrandTotal['orderGrandTotal']:'0',2)}}</strong>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px;background-position:left top">
                                        <!--[if mso]>
                                        <table style="width:560px" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width:270px" valign="top"><![endif]-->
                                        <!--[if mso]></td>
                                        <td style="width:20px"></td>
                                        <td style="width:270px" valign="top"><![endif]-->

                                        <!--[if mso]></td></tr></table><![endif]--></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-footer" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-footer-body"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;width:600px"
                                   cellspacing="0" cellpadding="0" bgcolor="#333333" align="center">
                                <tr style="border-collapse:collapse">
                                    <td style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center center;background-color:#494c45"
                                        bgcolor="#494c45" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td style="padding:0;Margin:0">
                                                                <table class="es-menu" width="100%" cellspacing="0"
                                                                       cellpadding="0" role="presentation"
                                                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td style="Margin:0;padding-bottom:15px;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center center;background-color:#494c45"
                                        bgcolor="#494c45" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center"
                                                                style="padding:0;Margin:0;padding-bottom:15px;font-size:0">
                                                                <table class="es-table-not-adapt es-social"
                                                                       cellspacing="0" cellpadding="0"
                                                                       role="presentation"
                                                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td valign="top" align="center"
                                                                            style="padding:0;Margin:0;padding-right:15px">
                                                                            <a href="{{ $common->facebook_url }}"><img
                                                                                    title="Facebook"
                                                                                    src="https://pkbjxh.stripocdn.email/content/assets/img/social-icons/circle-white/facebook-circle-white.png"
                                                                                    alt="Fb" width="32"
                                                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
                                                                        </td>
                                                                        <td valign="top" align="center"
                                                                            style="padding:0;Margin:0;padding-right:15px">
                                                                            <a href="{{ $common->twitter_url }}"><img
                                                                                    title="Twitter"
                                                                                    src="https://pkbjxh.stripocdn.email/content/assets/img/social-icons/circle-white/twitter-circle-white.png"
                                                                                    alt="Tw" width="32"
                                                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
                                                                        </td>
                                                                        <td valign="top" align="center"
                                                                            style="padding:0;Margin:0"><a
                                                                                href="{{ $common->instagram_url }}"><img
                                                                                    title="Instagram"
                                                                                    src="https://pkbjxh.stripocdn.email/content/assets/img/social-icons/circle-white/instagram-circle-white.png"
                                                                                    alt="Yt" width="32"
                                                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><p
                                                                    style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#ffffff;font-size:13px">
                                                                    You are receiving this email because you have
                                                                    visited our site or asked us about a regular
                                                                    newsletter. Make sure our messages get to your inbox
                                                                    (and not your bulk or junk folders).</p></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0"
                                   cellspacing="0"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px;background-position:left top">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
