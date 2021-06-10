<!Doctype html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
        @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
            *[class="table_width_100"] {
                width: 96% !important;
            }
            *[class="border-right_mob"] {
                border-right: 1px solid #dddddd;
            }
            *[class="mob_100"] {
                width: 100% !important;
            }
            *[class="mob_center"] {
                text-align: center !important;
            }
            *[class="mob_center_bl"] {
                float: none !important;
                display: block !important;
                margin: 0px auto;
            }
            .iage_footer a {
                text-decoration: none;
                color: #929ca8;
            }
            img.mob_display_none {
                width: 0px !important;
                height: 0px !important;
                display: none !important;
            }
            img.mob_width_50 {
                width: 40% !important;
                height: auto !important;
            }
        }
        .table_width_100 {
            width: 680px;
        }
    </style>
</head>

<div id="mailsub" class="notification" align="center">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">
                <table width="680" border="0" cellspacing="0" cellpadding="0">
                    <tr><td>
                            <tr>
                        <a href="{{$data}}">SignUp</a><br/>
                    </tr>
                    <tr><td align="center" style="padding:20px;flaot:left;width:100%; text-align:center;">
                        <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
                            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
                            Laravel Knowledge&copy; {{date('Y')}} All rights reserved.
                            </span></font>
                        </td></tr>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</html>
