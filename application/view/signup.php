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
    <title>Sign up</title>
</head>
<body>
    <!-- 헤더 -->
    <?php require_once("application/view/header.php"); ?>
    
    <!-- 회원가입 폼 -->
    <form action="/user/signup" method="post">
        <div class="login-page">
            <div class="form">
                <div class="error">
                    <!-- 로그인 에러 메세지 출력-->
                    <!-- if로 작성 -->
                    <?php if(isset($this->errMsg)) { ?>
                            <span><?php echo $this->errMsg ?></span>
                    <?php } ?>
                    <!-- 삼항 연산자로 작성 -->
                    <input type="text" name="id" id="id" value="<?php echo !empty($_POST) ? $_POST["id"] : "" ?>" placeholder="ID"/>
                    <span id="errMsgId">
                        <?php if(isset($this->arrError["id"])) { echo $this->arrError["id"]; } ?>
                    </span>
                    <button type="button" onclick="chkDuplicationId();">ID CHECK</button>
                    <p></p>
                    <input type="password" name="pw" id="pw" placeholder="PASSWORD"/>
                    <span>
                        <?php if(isset($this->arrError["pw"])) { echo $this->arrError["pw"]; } ?>
                    </span>
                    <input type="password" name="pwChk" id="pwChk" placeholder="CONFIRM PASSWORD"/>
                    <span>
                        <?php if(isset($this->arrError["pwChk"])) { echo $this->arrError["pwChk"]; } ?>
                    </span>
                    <input type="text" name="name" id="name" value="<?php echo !empty($_POST) ? $_POST["name"] : "" ?>" placeholder="NAME"/>
                    <span>
                        <?php if(isset($this->arrError["name"])) { echo $this->arrError["name"]; } ?>
                    </span>
                </div>
                    <button type="submit">create</button>
                    <p class="message">Already registered? <a href="#" onclick="redirectLogin();">Sign In</a></p>
            </div>
        </div>
    </form>
</body>
</html>