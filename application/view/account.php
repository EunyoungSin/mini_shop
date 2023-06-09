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
    <title>Account</title>
</head>
<body>
    <!-- 헤더 -->
    <?php require_once("application/view/header.php"); ?>

    <!-- 회원정보 본문 -->
    <div class="login-page">
        <div class="form">
            <div class="error">
                <h3>MY ACCOUNT</h3>
                <br>
                <label for="id">ID</label>
                <input type="text" name="id" id="id" value="<?php echo $this->result["u_id"] ?>" disabled>
                <label for="pw">PASSWORD</label>
                <input type="password" name="pw" id="pw" value="<?php echo $this->result["u_pw"] ?>" disabled>
                <label for="name">NAME</label>
                <input type="text" name="name" id="name" value="<?php echo $this->result["u_name"] ?>" disabled>
            </div>
            <button type="button" onclick="redirectModify();">edit</button>
            <p></p>
            <button type="button" onclick="redirectClose();">close</button>
        </div>
    </div>
</body>
</html>