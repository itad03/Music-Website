let search_results = document.getElementsByClassName("search_results")[0];
songs.forEach((element) => {
  const { id, songName, poster } = element;
  let card = document.createElement("a");
  card.classList.add("card");
  card.id = id;
  console.log(card);
  card.href = "#" + id;
  card.innerHTML = `
    <img src="${poster}" alt="" >
        <div class="content" id="${id}">
            ${songName}
        </div>
    `;
  search_results.appendChild(card);
});

let input = document.getElementsByTagName("input")[0];

input.addEventListener("keyup", () => {
  let input_value = input.value.toUpperCase();
  let items = search_results.getElementsByTagName("a");

  for (let index = 0; index < items.length; index++) {
    let as = items[index].getElementsByClassName("content")[0];
    let text_value = as.textContent || as.innerHTML;

    if (text_value.toUpperCase().indexOf(input_value) > -1) {
      items[index].style.display = "flex";
    } else {
      items[index].style.display = "none";
    }

    if (input.value == 0) {
      search_results.style.display = "none";
    } else {
      search_results.style.display = "";
      search_results.classList.add("search_before");
    }
  }
});
Array.from(document.getElementsByClassName("card")).forEach((e) => {
  e.addEventListener("click", (el) => {
    index = el.target.id;
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
  });
});
