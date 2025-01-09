iconPlay.addEventListener("click", () => {
  if (music.paused || music.currentTime <= 0) {
    music.play();
    wave.classList.add("active");
    iconPlay.classList.remove("ri-play-circle-line");
    iconPlay.classList.add("ri-pause-circle-line");
  } else {
    music.pause();
    wave.classList.remove("active");
    iconPlay.classList.add("ri-play-circle-line");
    iconPlay.classList.remove("ri-pause-circle-line");
  }
});

let heart = document.getElementById("like");
heart.addEventListener("click", () => {
  let a = heart.innerHTML;
  switch (a) {
    case "":
      heart.classList.remove("ri-heart-line");
      heart.classList.add("ri-heart-fill");
      heart.innerHTML = " ";

      var songID = JSON.parse(window.localStorage.getItem("songID"));
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "post_like.php", true);
      xhr.onload = function () {
        console.log(this.responseText);
      };
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("function=" + songID);
      
      break;
    case " ":
      heart.classList.remove("ri-heart-fill");
      heart.classList.add("ri-heart-line");
      heart.innerHTML = "";
      break;
  }
});
