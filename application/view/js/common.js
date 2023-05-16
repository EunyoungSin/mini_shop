// 로그아웃 기능
function redirectLogout() {
    location.href = "/user/logout"
}

function redirectLogin() {
    location.href = "/user/login"
}

function redirectMain() {
    location.href = "/shop/main"
}

function redirectSignup() {
    location.href = "/user/signup"
}

function chkDuplicationId() {
    const id = document.getElementById('id');

    const url = "/api/user?id=" + id.value;

    // API
    fetch(url)
    .then(data => {
        // Response Status 확인 (200번 외에는 에러 처리)
        if(data.status !== 200) {
            throw new Error(data.status + ' : API Response Error');
        }
        return data.json();
    })
    .then(apiData => {
        const idspan = document.getElementById('errMsgId');
        if(apiData["flg"] === "1") {
            idspan.innerHTML = apiData["msg"];
        } else {
            idspan.innerHTML = apiData["msg"];
        }
    })
    // 에러는 alert로 처리
    .catch(error => alert(error.message));

}

// API는 메뉴얼에 몇번이 에러인지, 정상인지 나옴.

