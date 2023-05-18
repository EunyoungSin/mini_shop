<?php
    define( "DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/" ); 
    define( "URL_HEADER", DOC_ROOT."/application/view/header.php" );
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/application/view/css/login.css">
    <script src="/application/view/js/common.js"></script>
    <title>Login</title>
</head>
<body>
    <!-- 헤더 -->
    <?php require_once("application/view/header.php"); ?>
    
    <!-- 로그인 폼 -->
    <form action="/user/login" method="post">
        <div class="login-page">
            <div class="form">
                <div class="error">
                    <!-- 로그인 에러 메세지 출력-->
                    <?php echo isset($this->errMsg) ? $this->errMsg : ""; ?>
                    <p></p>
                </div>
                <input type="text" name="id" id="id" placeholder="ID"/>
                <input type="password" name="pw" id="pw" placeholder="PASSWORD"/>
                <button type="submit">login</button>
                <p class="message">Not registered? <a href="#" id="signup" onclick="redirectSignup();">Create an account</a></p>
            </div>
        </div>
    </form>
</body>
</html>