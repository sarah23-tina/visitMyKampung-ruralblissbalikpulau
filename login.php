<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Keep your existing styles here */
body {
           
			background-image: url("https://mypenang.gov.my/uploads/page/37/images/Penang_NatureAdventure_BalikPulau.jpg");
			background-repeat: no-repeat;
			background-size: cover;
            font-family: 'Roboto', sans-serif;
        }
        .login-box {
            margin-top: 10rem;
            background:rgba(0, 0, 0, 0.5);
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            border-radius: 10px;
            padding: 30px;
        }
        .login-key {
            font-size: 80px;
            line-height: 100px;
            background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .login-title {
            margin-top: 15px;
            font-size: 30px;
            letter-spacing: 2px;
            font-weight: bold;
            color: #ECF0F5;
        }
        .login-form {
            margin-top: 25px;
            text-align: left;
        }
        .form-control {
            background-color: #1A2226;
            border: none;
            border-bottom: 2px solid #0DB8DE;
            border-radius: 0;
            color: #ECF0F5;
            outline: none;
            padding-left: 0;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .form-control:focus {
            border-color: inherit;
            box-shadow: none;
            border-bottom: 2px solid #0DB8DE;
            outline: none;
        }
        .form-group {
            margin-bottom: 40px;
        }
        .form-control-label {
            font-size: 10px;
            color: white;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .btn-outline-primary {
            border-color: #0DB8DE;
            color: #0DB8DE;
            border-radius: 0;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }
        .btn-outline-primary:hover {
            background-color: #0DB8DE;
            color: #fff;
        }
        .login-button {
            text-align: right;
            margin-bottom: 25px;
        }
        .login-text {
            text-align: left;
            color: #A2A4A4;
        }
        .loginbttm {
            padding: 0px;
        }
        /* Add card flip effect */
        .card-container {
            perspective: 1000px;
        }
.flip-card {
    perspective: 1000px;
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transition: transform 0.6s;
    transform-style: preserve-3d;
    transform: rotateY(0); /* Initial state, no flip */
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
}

.flip-card-back {
    transform: rotateY(180deg);
}


    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 card-container">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Login Form (Front) -->
                        <div class="flip-card-front">
                            <div class="login-box">
                                <div class="login-key">
                                    <i class="fas fa-key"></i>
                                </div>
                                <div class="login-title">
                                    RURAL BLISS BALIK PULAU
                                </div>
                                <div class="login-form">
                                    <form action="authenticate.php" method="post">
                                        <div class="form-group">
                                            <label class="form-control-label">USERNAME</label>
                                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">PASSWORD</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                        </div>
                                        <div class="loginbttm">
                                            <div class="login-button">
                                                <button type="submit" class="btn btn-outline-primary btn-block">LOGIN</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="login-text">
                                        <button type="button" class="btn btn-outline-primary" onclick="flipCard()">Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sign Up Form (Back) -->
                        <div class="flip-card-back">
                            <div class="login-box">
                                <div class="login-key">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="login-title">
                                    SIGN UP
                                </div>
                                <div class="login-form">
                                    <form action="signup.php" method="post">
                                        <div class="form-group">
                                            <label class="form-control-label">USERNAME</label>
                                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">EMAIL</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">PASSWORD</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                        </div>
                                        <div class="loginbttm">
                                            <div class="login-button">
                                                <button type="submit" class="btn btn-outline-primary btn-block">SIGN UP</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="login-text">
                                        <button type="button" class="btn btn-outline-primary" onclick="flipCard()">Back to Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Function to toggle the flip effect
function flipCard() {
    const card = document.querySelector('.flip-card-inner');
    // Toggle the transform property to flip the card
    if (card.style.transform === 'rotateY(180deg)') {
        card.style.transform = 'rotateY(0)';
    } else {
        card.style.transform = 'rotateY(180deg)';
    }
}

$(document).ready(function() {
    // Trigger flip effect when Sign Up button is clicked
    $(".flip-btn-signup").click(function(event) {
        event.preventDefault(); // Prevent the default action
        flipCard(); // Flip the card to show the sign-up form
    });

    // Trigger flip effect when Back to Login button is clicked
    $(".flip-btn-login").click(function(event) {
        event.preventDefault(); // Prevent the default action
        flipCard(); // Flip the card back to show the login form
    });
});


</script>


</body>
</html>
