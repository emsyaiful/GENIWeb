<html>
    <head>
    </head>
    <body>
        <h3>Yth Bapak/Ibu {{ $user->user_name }},</h3>
        <div id="isi">

            <br>
            <br>
            <!-- <img  src="<?php echo $message->embed('assets/img/bg_email_head.png'); ?>" width="37%" > -->
            <br>
            <br>
            <p >Anda telah mengisi form untuk mengatur ulang kata sandi untuk akun GEN1 dengan ID {{ $user->user_email }}.<br>

                Untuk mengubah password anda <br>silakan klik pada link berikut.<br></p>

            <a href="geni.co.id/reg{{ $data->user_id }}" target="_blank"></a>
            
            <br>
            <br>
            <br>
            <p><strong>GENI Support</strong></p>
            <br>
            <br>
            <br>
        </div>

    </body>
</html>

