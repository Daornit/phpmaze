function reload()
{
img = document.getElementById("capt");
img.src="http://mazenet.com/lab7/captcha.php";
}

$(document).ready(function(){
var htm=
'<img src="http://mazenet.com/lab7/captcha.php" id="capt"><button style="margin-left: 10px; margin-bottom: 10px;" class="btn btn-secondary btn-sm" onClick="reload()">Reset</button><input class="input" type="text" name="g-recaptcha-response"> ';
$('.custom_captcha').html(htm);
});
