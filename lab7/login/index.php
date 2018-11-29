<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Or Register</title>
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='./js/captcha.js'></script>
    <script type="text/javascript">
      function programList(tag){
        if(tag.innerHTML == ""){
          let ajax = new XMLHttpRequest();
          ajax.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  let data = JSON.parse(this.responseText);
                  let k = 0;
                  data.forEach(function(item){
                    k++;
                    tag.innerHTML = tag.innerHTML + `<option value="${item.programID}">${item.programID}</option>`;
                  });
             }
          };
          ajax.open("GET","http://mazenet.com/lab7/program.php",true);
          ajax.send();
        }
      }
      function checkSisi(tag){
        let ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let data = JSON.parse(this.responseText);
                      if(data[0] != undefined){
                        tag.previousSibling.previousSibling.style.color = "red";
                        document.getElementById("btn").disabled = true;
                      }else{
                        tag.previousSibling.previousSibling.style.color = "#aaa";
                        document.getElementById("btn").disabled = false;
                      }
           }
        };
        ajax.open("GET",`http://mazenet.com/lab7/students.php?sisi=${tag.value}`,true);
        ajax.send();
      }
      function passVal(tag){
        if(tag.value == document.getElementById("pass").value){
          console.log("corrent");
          tag.previousSibling.previousSibling.style.color = "#aaa";
          document.getElementById("btn").disabled = false;
        }else{
          tag.previousSibling.previousSibling.style.color = "red";
          document.getElementById("btn").disabled = true;
        }
      }
    </script>
  </head>
  <body>
    <div class="login-wrap">
      <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
        <form action="../login.php" method="post">
          <div class="sign-in-htm">
    				<div class="group">
    					<label for="user" class="label">SISI</label>
    					<input name="sisi" type="text" class="input">
    				</div>
    				<div class="group">
    					<label for="pass" class="label">Password</label>
    					<input name="password" type="password" class="input" data-type="password">
    				</div>
            <div class="group custom_captcha"></div>
    				<div class="group">
    					<input type="checkbox" name="remember" class="check" checked>
    					<label for="check"><span class="icon"></span> Keep me Signed in</label>
    				</div>
    				<div class="group">
    					<input type="submit" class="button" value="Sign In">
    				</div>
    			</div>
        </form>
        <form action="../register.php" method="post">
          <div class="sign-up-htm">
    				<div class="group">
    					<label for="sisi" class="label">SISI</label>
    					<input name="sisi" type="text" class="input" onchange="checkSisi(this)">
    				</div>
            <div class="group">
    					<label for="user" class="label">First Name</label>
    					<input name="fname" type="text" class="input">
    				</div>
            <div class="group">
    					<label for="user" class="label">Last Name</label>
    					<input name="lname" type="text" class="input">
    				</div>
    				<div class="group">
    					<label for="pass" class="label" >Password</label>
    					<input id="pass" name="pass" type="password" class="input" data-type="password">
    				</div>
    				<div class="group">
    					<label for="pass" class="label">Repeat Password</label>
    					<input name="passCon" type="password" onchange="passVal(this)" class="input" data-type="password">
    				</div>
    				<div class="group">
    					<label for="pass" class="label">Genther</label>
    					<select name="genther" type="text" class="input">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
    				</div>
            <div class="group">
    					<label for="pass" class="label">Program</label>
    					<select name="programID" type="text" onclick="programList(this)" class="input"></select>
    				</div>
            <div class="group">
    					<label for="pass" class="label">Birth Date</label>
    					<input name="birthDay" type="date" class="input">
    				</div>
            <div class="group custom_captcha"></div>
    				<div class="group">
    					<input id="btn" type="submit" class="button" value="Sign Up">
    				</div>
    			</div>
        </form>
        </div>
      </div>
    </div>
  </body>
</html>
