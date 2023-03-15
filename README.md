<h1>Steps for generating QrCode in Laravel 9</h1>

Before you start this project, you need to make sure that you installed imagick already.<br><br>
If not installed then follow this steps as<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;1- Pre-installation<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;  - PHP version<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;  - Architecture (64/86)<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;  - Thread Safety (enabled)<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;2- Download and install ImageMagick for Windows<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;   https://www.imagemagick.org/script/download.php#windows<br><br>

&nbsp;&nbsp;&nbsp;&nbsp;3- Download Imagick for PHP<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;  https://pecl.php.net/package/imagick/3.7.0/windows<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;  - copy php_imagick.dll and pass into C:\xampp\php\ext<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;  - open php.ini (Dynamic Extensions)<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;    extension=php_imagick.dll<br><br>

&nbsp;&nbsp;&nbsp;&nbsp;4- Download required Imagick binaries<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;  https://windows.php.net/downloads/pecl/deps/<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;  - copy all CORE_* and IM_MOD_* file and pass into C:\xampp\apache\bin<br><br>

After iNsatlling imagick follow below steps<br><br>
Step 1:  Create Laravel Project<br><br>
&nbsp;&nbsp;composer create-project --prefer-dist laravel/laravel l9_qrcode<br><br>
&nbsp;&nbsp;  or <br><br>
&nbsp;&nbsp;  laravel new l9_qrcode<br><br>
Step 2 : Install Package and Configure<br><br>

  composer require simplesoftwareio/simple-qrcode
  
  Open config/app.php file and put the code like below:<br><br>
    'providers' => [
      ....
      SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class,
    ],

    'aliases' => [
      ....
      'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class,
    ],
Step 3 : Basic Usage<br><br>
   - The basic syntax is:<br><br>
      QrCode::size(100)->generate('Hello Qr Code');<br><br>
    
   - Size: We can set the size of the QR code image.<br><br>
    
      QrCode::size(300)->generate('Hello Qr Code');<br><br>
    
   - Color: We can also set background color.<br><br>
      QrCode::size(250)->backgroundColor(255,255,204)->generate('Hello Qr Code');<br><br>

 Step 4 : create controller: Qrcontroller<br><br>
    - write function:
      function generate(){
          return view('qrcode');
      }
      <br><br>
 Step 5: create route<br><br>
 
    Route::get('generate',[Qrcontroller::class,'generate']);
    
 Step 6 : Generate in Blade File   <br><br>
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
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate('Generate any QR Code!')) !!} ">
        </div>
       <div> <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate('Generate any QR Code!')) !!} " download>Downloads</a></div>
        <p>My Qr Code</p>
    </div>

    </body>
    </html>
    
