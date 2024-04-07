const hoursEL = document.querySelector("#hours");
const minutesEl = document.querySelector("#minutes");
const secondsEl = document.querySelector("#seconds");
const milisecondsEl = document.querySelector("#miliseconds");
const startBtn = document.querySelector("#startBtn");
const pauseBtn = document.querySelector("#pauseBtn");
const resumeBtn = document.querySelector("#resumeBtn");
const resetBtn = document.querySelector("#resetBtn");
const voltaBtn = document.querySelector("#voltaBtn");
const voltaList = document.querySelector("#voltaList");

let interval;
let hours = 0;
let minutes = 0;
let seconds = 0;
let miliseconds = 0;
let isPaused = false;
let laps = [];
let lastLapTime = 0; 


pauseBtn.style.display = "none";
voltaBtn.style.display = "none";
resetBtn.style.display = "none";
resumeBtn.style.display = "none";


startBtn.addEventListener("click", startTime);
pauseBtn.addEventListener("click", pauseTimer);
resumeBtn.addEventListener("click", resumeTimer);
voltaBtn.addEventListener("click", voltaTimer);
resetBtn.addEventListener("click", resetTimer);

function startTime() {
    interval = setInterval(() => {
        if (!isPaused) {
            miliseconds += 10;

            if (miliseconds === 1000) {
                seconds++;
                miliseconds = 0;
            }

            if (seconds === 60) {
                minutes++;
                seconds = 0;
            }

            if (minutes === 60) {
                hours++;
                minutes = 0;
            }

            hoursEL.textContent = formatTime(hours);
            minutesEl.textContent = formatTime(minutes);
            secondsEl.textContent = formatTime(seconds);
            milisecondsEl.textContent = formatMiliseconds(miliseconds);
        }
    }, 10);

    startBtn.style.display = "none";
    pauseBtn.style.display = "block";
    voltaBtn.style.display = "block";
    resetBtn.style.display = "block";
}

function pauseTimer() {
    isPaused = true;
    pauseBtn.style.display = "none";
    resumeBtn.style.display = "block";
    voltaBtn.style.display = "none";
    resetBtn.style.display = "block"; 
}

function resumeTimer() {
    isPaused = false;
    pauseBtn.style.display = "block";
    resumeBtn.style.display = "none";
    voltaBtn.style.display = "block";
    resetBtn.style.display = "block"; 
}

function voltaTimer() {
    const currentTime = hours * 3600000 + minutes * 60000 + seconds * 1000 + miliseconds;
    const lapTime = currentTime;

    laps.push({
        hours: hours,
        minutes: minutes,
        seconds: seconds,
        miliseconds: miliseconds,
        lapTime: lapTime
    });
    displayLaps();
}

function displayLaps() {
    voltaList.innerHTML = ""; 
    laps.forEach((lap, index) => {
        if (index > 0) { 
            const diffTime = lap.lapTime - laps[index - 1].lapTime;
            const li = document.createElement("li");
            li.textContent = `Volta ${index}: ${formatLapTime(diffTime)}`;
            voltaList.appendChild(li);
        }
    });
}

function resetTimer() {
    clearInterval(interval);
    isPaused = false; 
    hours = 0;
    minutes = 0;
    seconds = 0;
    miliseconds = 0;
    laps = []; 
    displayLaps(); 

    hoursEL.textContent = "00";
    minutesEl.textContent = "00";
    secondsEl.textContent = "00";
    milisecondsEl.textContent = "000";

    startBtn.style.display = "block";
    pauseBtn.style.display = "none";
    resumeBtn.style.display = "none";
    voltaBtn.style.display = "none";
    resetBtn.style.display = "none"; 
}

function formatTime(time) {
    return time < 10 ? `0${time}` : time;
}

function formatMiliseconds(time) {
    return time < 100 ? `${time}`.padStart(3, "0") : time;
}

function formatLapTime(time) {
    const hours = Math.floor(time / (1000 * 60 * 60)); 
    const minutes = Math.floor(time / (1000 * 60)); 
    const seconds = Math.floor((time % (1000 * 60)) / 1000); 
    const miliseconds = time % 1000;
    return `${formatTime(hours)}:${formatTime(minutes)}:${formatTime(seconds)}:${formatTime(miliseconds)}`;
}
