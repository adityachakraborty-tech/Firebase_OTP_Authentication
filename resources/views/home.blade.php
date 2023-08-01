<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <script src="jquery-3.6.4.min.js"></script>
</head>

<body>


    <form>
        <label>Enter Phone Number : </label>
        <input type="text" id="number" placeholder="91+ 5879641256">
        <br>
        <div id="recaptcha-container">

        </div><br>
        <button type="button" onclick="">Send Code</button>
    </form>

    <div id="error" style="color:red; display:none"></div>
    <div id="sentMessage" style="color:green; display:none"></div>

    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyDleLX7kziXE5cLUax19U1-w1vEled4heU",
            authDomain: "test-laravel-otp-24450.firebaseapp.com",
            databaseURL: "https://test-laravel-otp-24450-default-rtdb.firebaseio.com",
            projectId: "test-laravel-otp-24450",
            storageBucket: "test-laravel-otp-24450.appspot.com",
            messagingSenderId: "349407802639",
            appId: "1:349407802639:web:2db460d41f0b95e8befa7a",
            measurementId: "G-MNRKTCNG1N"
        }
        firebase.initializ.App(firebaseConfig);
        //const app = initializeApp(firebaseConfig);
        //const analytics = getAnalytics(app);
    </script>
    <script type="text/javascript">
        window.onload = function() {
            render();
        }

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
    </script>

</body>

</html> -->
<html>

<head>
    <title>Phone Number Authentication using Firebase In Laravel 8</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Js only -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <div class="container text-center">
                <p>Phone Number Authentication using Firebase</p>
            </div>
        </div>

        <div class="alert alert-danger" id="error" style="display: none;"></div>
        <div class="card">
            <div class="card-header">
                Enter Phone Number
            </div>
            <div class="card-body">
                <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
                <form>
                    <label>Phone Number:</label>
                    <input type="text" id="number" class="form-control" placeholder="+91********">
                    <div id="recaptcha-container"></div>
                    <button type="button" class="btn btn-success" onclick="phoneSendAuth();">SendCode</button>
                </form>
            </div>
        </div>
        <div class="card" style="margin-top: 10px">
            <div class="card-header">
                Enter Verification code
            </div>
            <div class="card-body">
                <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
                <form>
                    <input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code">
                    <button type="button" class="btn btn-success" onclick="codeverify();">Verify code</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script>
        var firebaseConfig = {
               
             apiKey: "AIzaSyDleLX7kziXE5cLUax19U1-w1vEled4heU",
             authDomain: "test-laravel-otp-24450.firebaseapp.com",
             databaseURL: "https://test-laravel-otp-24450-default-rtdb.firebaseio.com",
             projectId: "test-laravel-otp-24450",
             storageBucket: "test-laravel-otp-24450.appspot.com",
             messagingSenderId: "349407802639",
             appId: "1:349407802639:web:2db460d41f0b95e8befa7a",
             measurementId: "G-MNRKTCNG1N"
        };

        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
        window.onload = function() {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function phoneSendAuth() {

            var number = $("#number").val();

            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {

                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);

                $("#sentSuccess").text("Message Sent Successfully.");
                $("#sentSuccess").show();

            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });

        }

        function codeverify() {

            var code = $("#verificationCode").val();

            coderesult.confirm(code).then(function(result) {
                var user = result.user;

                $("#successRegsiter").text("you are register Successfully.");
                $("#successRegsiter").show();

            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>
</body>

</html>