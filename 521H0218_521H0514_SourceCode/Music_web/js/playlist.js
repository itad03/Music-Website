var btnPlaylist = document.getElementById("playlist");

btnPlaylist.onclick = function () {
  var songID = JSON.parse(window.localStorage.getItem("songID"));
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "post_playlist.php", true);
  xhr.onload = function () {
    console.log(this.responseText);
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("function=" + songID);
};
