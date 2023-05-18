<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/application/view/css/login.css">
    <script src="/application/view/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Close</title>
</head>
<body>
    <!-- 헤더 -->
    <?php require_once("application/view/header.php"); ?>

    <!-- 회원탈퇴 본문 -->
    <form action="/user/close" method="post">
        <div class="login-page">
            <div class="form">
                <div class="error">
                    <h4>Are you sure you want to close your account?</h4>
                </div>
                <input type="hidden" name="id" value="<?php echo $this->result["u_id"] ?>">
                <p></p>
                <button type="submit">yes</button>
                <p></p>
                <button type="button" onclick="redirectAccount();">no</button>
            </div>
        </div>
    </form>
</body>