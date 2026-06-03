<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- ICONIFY -->
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: 'Poppins', sans-serif;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        /* ========================================
           BACKGROUND
        ======================================== */

        .auth-bg{

            position: fixed;

            inset: 0;

            background-image: url('{{ asset("assets/img/login_page.png") }}');
            background-size: cover;
            background-position: center;

            z-index: -1;
        }

        /* OVERLAY */
        .auth-overlay{

            position: fixed;

            inset: 0;

            background:
                rgba(255,255,255,0.04);

            backdrop-filter: blur(2px);

            z-index: -1;
        }

        /* ========================================
           CARD
        ======================================== */

        .auth-card{

            width: 100%;
            max-width: 420px;

            background: rgba(255,255,255,0.95);

            border-radius: 26px;

            padding: 42px 34px;

            box-shadow:
                0 10px 40px rgba(0,0,0,0.08);
        }

        /* TITLE */
        .auth-title{

            text-align: center;

            font-size: 28px;
            font-weight: 500;

            color: rgba(0,0,0,0.65);

            margin-bottom: 40px;
        }

        /* ========================================
           INPUT
        ======================================== */

        .custom-input{

            height: 54px;

            border-radius: 16px;

            border: 1px solid #D9D9D9;

            padding-inline: 18px;

            font-size: 14px;

            box-shadow: none !important;
        }

        .custom-input:focus{

            border-color: #00BF63;

            box-shadow:
                0 0 0 0.15rem rgba(0,191,99,0.12) !important;
        }

        /* PASSWORD */
        .password-wrapper{
            position: relative;
        }

        .password-icon{

            position: absolute;

            right: 18px;
            top: 50%;

            transform: translateY(-50%);

            font-size: 22px;

            color: rgba(0,0,0,0.35);

            cursor: pointer;
        }

        /* ========================================
           CHECKBOX
        ======================================== */

        .remember-wrapper{

            margin-top: 12px;
            margin-bottom: 26px;
        }

        .remember-wrapper label{

            font-size: 14px;

            color: rgba(0,0,0,0.45);
        }

        .form-check-input:checked{
            background-color: #00BF63;
            border-color: #00BF63;
        }

        /* ========================================
           BUTTON
        ======================================== */

        .login-btn{

            width: 100%;
            height: 54px;

            border: none;

            border-radius: 16px;

            background: #00BF63;

            color: #FFFFFF;

            font-size: 17px;
            font-weight: 500;

            transition: 0.25s ease;
        }

        .login-btn:hover{

            background: #FFFFFF;

            color: #00BF63;

            border: 1px solid #00BF63;
        }

        /* LINE */
        .auth-line{

            margin: 22px 0 16px;

            border-top: 1px solid #D9D9D9;
        }

        /* LINK */
        .auth-link{

            text-align: center;
        }

        .auth-link a{

            text-decoration: none;

            font-size: 14px;
            font-weight: 500;

            color: #52D88C;

            transition: 0.2s ease;
        }

        .auth-link a:hover{
            color: #00BF63;
        }

        /* ========================================
           RESPONSIVE
        ======================================== */

        @media(max-width: 576px){

            .auth-card{

                margin: 20px;

                padding: 32px 24px;
            }

            .auth-title{
                font-size: 24px;
            }
        }

    </style>

</head>

<body>

    <!-- BACKGROUND -->
    <div class="auth-bg"></div>

    <!-- OVERLAY -->
    <div class="auth-overlay"></div>

    <!-- CARD -->
    <div class="auth-card">

        <h1 class="auth-title">
            Masukan Akun
        </h1>

        <form action="#" method="POST">

            @csrf

            <!-- EMAIL -->
            <div class="mb-3">

                <input type="email"
                       class="form-control custom-input"
                       placeholder="Alamat Email...">

            </div>

            <!-- PASSWORD -->
            <div class="mb-2 password-wrapper">

                <input type="password"
                       class="form-control custom-input"
                       placeholder="Kata Sandi...">

                <iconify-icon icon="mdi:eye-off-outline"
                              class="password-icon">
                </iconify-icon>

            </div>

            <!-- REMEMBER -->
            <div class="form-check remember-wrapper">

                <input class="form-check-input"
                       type="checkbox"
                       id="remember">

                <label class="form-check-label"
                       for="remember">

                    Ingat Aku

                </label>

            </div>

            <!-- BUTTON -->
            <a href="{{ url('/dashboard') }}"
            class="login-btn d-flex align-items-center justify-content-center text-decoration-none">

                Login

            </a>
            <!-- LINE -->
            <div class="auth-line"></div>

            <!-- LINK -->
            <div class="auth-link">

                <a href="{{ url('/register') }}">

                    Belum Punya Akun? Daftar

                </a>

            </div>

        </form>

    </div>

</body>

</html>