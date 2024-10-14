<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dungeon | Submission Status</title>
</head>

<body style="font-family: Verdana, sans-serif;">
    <main>
        <table width="100%" height="100%" style="min-width:348px" border="0" cellspacing="0" cellpadding="0" lang="en">
            <tbody>
                <tr height="32" style="height:32px">
                    <td></td>
                </tr>
                <tr align="center">
                    <td>
                        <div>
                            <div>
                            </div>
                        </div>
                        <table border="0" cellspacing="0" cellpadding="0"
                            style="padding-bottom:20px;max-width:516px;min-width:220px">
                            <tbody>
                                <tr>
                                    <td width="8" style="width:8px"></td>
                                    <td>
                                        <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px"
                                            align="center" class="m_-1975390303725524220mdv2rw">
                                            <div
                                                style="font-family:Verdana,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                                <!-- ENCODED PICTURE CONTAINER ROW -->
                                                <!-- SUGGEST TO NOT TO OPEN IT UNLESS THERE'S ANY UPDATE WITH THE IMAGE -->
                                                <!-- ENCODED SCRIPT ARE TOO LONG -->
                                                <div style="width: 84px; overflow: hidden; margin: 0 auto;">
                                                    <img src="https://dungeon.id/user/assets/images/icons/t-primary.png" alt="logo" style="width: 100%; object-fit: cover;">
                                                </div>
                                                <!-- ENCODED PICTURE CONTAINER ROW ENDS -->

                                                <!-- USER NAME -->
                                                <div
                                                    style="font-family:Verdana,sans-serif; font-size: 24px; margin-bottom: 1rem;">
                                                    Hi, {{ $user->name }}
                                                </div>
                                                <!-- USER NAME ROW ENDS -->

                                                <table align="center" style="margin-top:8px">
                                                    <tbody>
                                                        <tr style="line-height:normal">
                                                            <td align="right" style="padding-right:8px"></td>
                                                            <!-- EMAIL ROW -->
                                                            <td>
                                                                <a
                                                                    style="font-family:Verdana, sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px">
                                                                    {{ $email }}
                                                                </a>
                                                            </td>
                                                            <!-- EMAIL ROW ENDS -->
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- MESSAGE BODY ROW -->
                                            <div
                                                style="font-family:Verdana,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">
                                                <!-- MESSAGE -->
                                                <div style="padding-bottom:16px">
                                                    Selamat anda telah berhasil melewati ujian dari admin, submission status telah di perbarui, dashboard telah di perbarui dan dibawah ini adalah pesan dari admin.
                                                </div>
                                                <div style="padding-bottom:16px">
                                                    {{ $message_from_admin }}
                                                </div>
                                                <!-- MESSAGE ENDS -->

                                                <!-- QR CODE EXIST -->
                                                <!-- IF USER'S SUBMISSION APPROVED -->
                                                @if ($status === 'approved')
                                                <div style="padding-top:16px">
                                                    {{-- <img src="{{ $qr_code }}" alt="QR Code Dungeon"
                                                        style="width: 200px; height: 200px;"> --}}
                                                </div>
                                                @endif
                                                <!-- QR CODE EXIST ENDS -->

                                                <!-- BUTTON ROW -->
                                                <div style="padding-top:32px;text-align:center">
                                                    <a href="{{ $url }}"
                                                        style="font-family: sans-serif;family: Verdana;padding: 0.5rem 1rem; background-color: rgb(0, 150, 5); color: #fff; text-decoration: none; border-radius: 5px;">
                                                        Ke Dashboard
                                                    </a>
                                                </div>
                                                <!-- BUTTON ROW ENDS -->
                                            </div>
                                            <!-- MESSAGE BODY ROW ENDS  -->

                                            <!-- FOOTER ROW -->
                                            <div
                                                style="font-family:Verdana,sans-serif; padding-top:40px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">
                                                Salam hangat dari kami, <a href="https://www.dungeon.id">Dungeon</a>
                                            </div>
                                            <!-- FOOTER ROW ENDS -->
                                        </div>

                                        <!-- COPYRIGHT ROW -->
                                        <div style="text-align:left">
                                            <div
                                                style="font-family:Verdana,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
                                                <div style="direction:ltr">© 2024 <a
                                                        href="https://www.dungeon.id">Dungeon</a>, All Right Reserved
                                                </div>
                                            </div>
                                        </div>
                                        <!-- COPYRIGHT ROW ENDS -->
                                    </td>
                                    <td width="8" style="width:8px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr height="32" style="height:32px">
                    <td></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>
