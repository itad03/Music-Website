let index = 0;
let poster_play = document.getElementById("circle-track");
let download_music = document.getElementById("download_music");
let title = document.getElementById("title");
let iconPlay = document.getElementById("iconplay");
let wave = document.getElementById("wave");
let currentStart = document.getElementById("currentStart");
let currentEnd = document.getElementById("currentEnd");
let seek = document.getElementById("seek");
let vol_icon = document.getElementById("vol_icon");
let volume = document.getElementById("volume");
let back = document.getElementById("back");
let next = document.getElementById("next");
var lyricContent = document.querySelector(".content-lyric");
const music = new Audio("");

const songs = JSON.parse(window.localStorage.getItem("songs"));
// -----------------------------------------------------------------------------------------------------------------

const makeAllplays = () => {
  Array.from(document.getElementsByClassName("playlistplay")).forEach((el) => {
    el.classList.add("ri-play-circle-line");
    el.classList.remove("ri-pause-circle-line");
  });
};
const makeAllBackground = () => {
  Array.from(document.getElementsByClassName("songItem")).forEach((el) => {
    el.style.background = "rgb(105,105,105,.1)";
  });
};

Array.from(document.getElementsByClassName("playlistplay")).forEach((e) => {
  e.addEventListener("click", (el) => {
    index = el.target.id;
    let itemSong = songs.filter((els) => {
      return els.id == index;
    });
    window.localStorage.setItem("songID", itemSong[0].id);

    var xhr1 = new XMLHttpRequest();
    xhr1.open("POST", "post_library.php", true);
    xhr1.onload = function () {
      console.log(this.responseText);
    };
    xhr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr1.send("function=" + itemSong[0].id);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "post_active_song.php", true);
    xhr.onload = function () {
      console.log(this.responseText);
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("function=" + itemSong[0].id);

    music.src = itemSong[0].audio;
    poster_play.src = itemSong[0].poster;
    wave.classList.add("active");
    heart.classList.remove("ri-heart-fill");
    heart.classList.add("ri-heart-line");
    heart.innerHTML = "";
    iconPlay.classList.remove("ri-play-circle-line");
    iconPlay.classList.add("ri-pause-circle-line");
    music.play();
    download_music.href = `audio/${index}.mp3`;
    let songTitles = songs.filter((els) => {
      return els.id == index;
    });
    songTitles.forEach((elss) => {
      let { songName, lyric } = elss;
      title.innerHTML = songName;
      lyricContent.innerHTML = lyric;
      download_music.setAttribute("download", songName);
      poster_play.src = poster;
    });
    makeAllBackground();
    Array.from(document.getElementsByClassName("songItem"))[
      index - 1
    ].style.background = "rgb(105,105,105,.1)";
    makeAllplays();
    el.target.classList.remove("ri-play-circle-line");
    el.target.classList.add("ri-pause-circle-line");
    wave.classList.add("active");
  });
});
