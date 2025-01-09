var modalLyric = document.getElementById("lyricModal");
var btnLyric = document.getElementById("lyric");

var spanLyric = document.getElementsByClassName("close")[0];
btnLyric.onclick = function () {
  modalLyric.style.display = "block";
};

spanLyric.onclick = function () {
  modalLyric.style.display = "none";
};
