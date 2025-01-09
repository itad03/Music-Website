back.addEventListener("click", () => {
  index -= 1;
  if (index < 1) {
    index = Array.from(document.getElementsByClassName("songItem")).length;
  }
  let itemSong = songs.filter((els) => {
    return els.id == index;
  });
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
  iconPlay.classList.remove("ri-play-circle-line");
  iconPlay.classList.add("ri-pause-circle-line");
  music.play();
  let songTitles = songs.filter((els) => {
    return els.id == index;
  });
  songTitles.forEach((elss) => {
    let { songName } = elss;
    title.innerHTML = songName;
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

next.addEventListener("click", () => {
  index++;
  if (index > Array.from(document.getElementsByClassName("songItem")).length) {
    index = 1;
  }
  let itemSong = songs.filter((els) => {
    return els.id == index;
  });
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
  iconPlay.classList.remove("ri-play-circle-line");
  iconPlay.classList.add("ri-pause-circle-line");
  music.play();
  let songTitles = songs.filter((els) => {
    return els.id == index;
  });
  songTitles.forEach((elss) => {
    let { songName } = elss;
    title.innerHTML = songName;
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
