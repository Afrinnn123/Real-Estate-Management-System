
function updateClock() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();

    minutes = (minutes < 10 ? "0" : "") + minutes;
    seconds = (seconds < 10 ? "0" : "") + seconds;

    // Choose between am and pm
    var period = (hours < 12) ? "AM" : "PM";

    hours = (hours > 12) ? hours - 12 : hours;

    hours = (hours < 10 ? "0" : "") + hours;

    // Display the time
    var currentTimeString = hours + ":" + minutes + ":" + seconds + " " + period;
    document.getElementById("live-time").innerHTML = "Current Time: " + currentTimeString;
}

setInterval(updateClock, 1000);
