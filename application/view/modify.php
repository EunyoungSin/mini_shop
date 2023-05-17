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
    <title>Modify</title>
</head>
<body>
    <!-- 헤더 -->
    <div class="navbar shadow-sm" style="background-color: rgb(189, 173, 226);">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center" style="color: #51585e;" onclick="redirectMain();">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>#</strong>
            </a>
        </div>
    </div>
    <!-- 회원가입 폼 -->
    <form action="/user/modify" method="post">
        <div class="login-page">
            <div class="form">
                <div class="error">
                    <h3>MY ACCOUNT</h3>
                    <br>
                    <label for="id">ID</label>
                    <input type="text" name="id" id="id" value="<?php echo $this->result["u_id"] ?>" readonly>
                    <input type="hidden" name="id" value="<?php echo $this->result["u_id"] ?>">
                    <label for="pw">PASSWORD</label>
                    <input type="password" name="pw" id="pw" value="<?php echo $this->result["u_pw"] ?>">
                    <span>
                        <?php if(isset($this->arrError["pw"])) { echo $this->arrError["pw"]; } ?>
                    </span>
                    <label for="pwChk">CONFIRM PASSWORD</label>
                    <input type="password" name="pwChk" id="pwChk" value="<?php echo $this->result["u_pw"] ?>">
                    <label for="name">NAME</label>
                    <input type="text" name="name" id="name" value="<?php echo $this->result["u_name"] ?>">
                </div>
                <button type="submit">complete</button>
            </div>
        </div>
    </form>
</body>
</html>