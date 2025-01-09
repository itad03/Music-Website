// let shuffle = document.getElementsByClassName('shuffle')[0];
// shuffle.addEventListener('click', () => {
//     let a = shuffle.innerHTML;
//     switch (a) {
//         case "":
//             shuffle.classList.add('ri-repeat-line');
//             shuffle.classList.remove('ri-music-line');
//             shuffle.classList.remove('ri-shuffle-line');
//             shuffle.innerHTML = " ";
//             break;

//         case " ":
//             shuffle.classList.remove('ri-repeat-line');
//             shuffle.classList.remove('ri-music-line');
//             shuffle.classList.add('ri-shuffle-line');
//             shuffle.innerHTML = "  ";
//             break;
//         case "  ":
//             shuffle.classList.remove('ri-repeat-line');
//             shuffle.classList.add('ri-music-line');
//             shuffle.classList.remove('ri-shuffle-line');
//             shuffle.innerHTML = '';
//             break;
//     }
// });

const next_music = () => {
  if (index == songs.length) {
    index = 1;
  } else {
    index++;
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
  download_music.href = `audio/${index}.mp3`;
  let songTitles = songs.filter((els) => {
    return els.id == index;
  });
  songTitles.forEach((elss) => {
    let { songName } = elss;
    title.innerHTML = songName;
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
};

const repeat_music = () => {
  index;
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
  download_music.href = `audio/${index}.mp3`;
  let songTitles = songs.filter((els) => {
    return els.id == index;
  });
  songTitles.forEach((elss) => {
    let { songName } = elss;
    title.innerHTML = songName;
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
};
const random_music = () => {
  if (index == songs.length) {
    index = 1;
  } else {
    index = Math.floor(Math.random() * songs.length + 1);
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
  download_music.href = `audio/${index}.mp3`;
  let songTitles = songs.filter((els) => {
    return els.id == index;
  });
  songTitles.forEach((elss) => {
    let { songName } = elss;
    title.innerHTML = songName;
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
};

// music.addEventListener('ended', () => {
//     let b = shuffle.innerHTML;
//     switch (b) {
//         case '':
//             next_music();
//             break;
//         case ' ':
//             repeat_music();
//             break;
//         case '  ':
//             random_music();
//             break;
//     }
// })
