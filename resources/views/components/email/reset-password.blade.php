<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dungeon | Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body style="font-family: Verdana, sans-serif;">
    <main>
        <table width="100%" height="100%" style="min-width:348px" border="0" cellspacing="0" cellpadding="0"
            lang="en">
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
                            style="padding-bottom:20px;max-width:516px;min-width:220px;margin:0 auto;">
                            <tbody>
                                <tr>
                                    <td width="8" style="width:8px"></td>
                                    <td>
                                        <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px"
                                            align="center">
                                            <div
                                                style="font-family:Verdana,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                                <div style="width: 84px; overflow: hidden; margin: 0 auto;">
                                                    <img src="https://dungeon.id/user/assets/images/icons/t-primary.png"
                                                        alt="logo" style="width: 100%; object-fit: cover;">
                                                </div>
                                                <div
                                                    style="font-family:Verdana,sans-serif; font-size: 24px; margin-bottom: 1rem;">
                                                    Hi,
                                                    {{ $user->name }}
                                                </div>
                                                <table align="center" style="margin-top:8px">
                                                    <tbody>
                                                        <tr style="line-height:normal">
                                                            <td align="right" style="padding-right:8px"></td>
                                                            <td><a
                                                                    style="font-family:Verdana, sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px">{{ $email }}</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div
                                                style="font-family:Verdana,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">
                                                <div style="padding-bottom:16px">Klik tombol di bawah ini untuk mereset
                                                    kata sandi Anda.</div>
                                                <div style="padding-top:32px;text-align:center">
                                                    <a href="{{ $url }}"
                                                        style="font-family: sans-serif;family: Verdana;padding: 0.5rem 1rem; background-color: rgb(0, 150, 65); color: #fff; text-decoration: none; border-radius: 5px;">Reset
                                                        Password</a>
                                                </div>
                                            </div>
                                            <div
                                                style="font-family:Verdana,sans-serif; padding-top:40px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">
                                                Salam hangat dari kami, <a href="https://www.dungeon.id">Dungeon</a>
                                            </div>
                                        </div>
                                        <div style="text-align:left">
                                            <div
                                                style="font-family:Verdana,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
                                                <div style="direction:ltr">© 2024 <a
                                                        href="https://www.dungeon.id">Dungeon</a>, All Right Reserved
                                                </div>
                                            </div>
                                        </div>
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