<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>Laravel QR Code Example</title>
    </head>
    <body>

    <div class="text-center" style="margin-top: 50px;">
        <h3>Laravel QR Code Example</h3>
        <div>
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge(public_path('images\laravel-9-qr-code.png'), 0.5, true)->size(300)->generate('Generate any QR Code!')) !!} ">
        </div>
       <div> <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate('Generate any QR Code!')) !!} " download>Downloads</a></div>
        <p>My Qr Code</p>
    </div>

    </body>
    </html>