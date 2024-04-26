function displayCurrentTime() {
    var currentTime = new Date();
    var timeZoneOffset = currentTime.getTimezoneOffset() / 60; // Đổi về giờ địa phương
  
    // Áp dụng offset cho múi giờ GMT+7
    var gmt7TimeOffset = 7 + timeZoneOffset;
    currentTime.setHours(currentTime.getHours() + gmt7TimeOffset);
  
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
  
    // Định dạng thời gian để có 2 chữ số
    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;
    seconds = (seconds < 10 ? "0" : "") + seconds;
  
    // Hiển thị thời gian trong phần tử có id "current-time"
    var currentTimeString = hours + ":" + minutes + ":" + seconds;
    document.getElementById("current-time").textContent = currentTimeString;
  
    // Cập nhật thời gian sau mỗi giây
    setTimeout(displayCurrentTime, 1000);
  }
  
  // Gọi hàm để hiển thị thời gian khi trang web được tải
  displayCurrentTime();