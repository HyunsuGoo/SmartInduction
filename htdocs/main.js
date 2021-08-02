function setclock(){
    // 날짜와 시간 설정
    var dateInfo = new Date();
    var hour = modifyNumber(dateInfo.getHours());
    var min = modifyNumber(dateInfo.getMinutes());
    var sec = modifyNumber(dateInfo.getSeconds());
    var year = dateInfo.getFullYear();
    var month = dateInfo.getMonth()+1;
    var date = dateInfo.getDate();
    document.getElementById("time").innerHTML = hour + ":" + min + ":" + sec;
    document.getElementById("date").innerHTML = year + "년" + month + "월" + date + "일";
}

// 1 ~ 9이후에 돌아오는 수가 0일때 만약에 초가 10:00:00이면 10:00:10으로 , 
function modifyNumber(time){
    if(parseInt(time) < 10){
        return "0" + time;
    }
    else
        return time;
}
// 디스플레이 설정
window.onload = function(){
    setclock();
    setInterval(setclock, 1000); // 1초씩 상승
}