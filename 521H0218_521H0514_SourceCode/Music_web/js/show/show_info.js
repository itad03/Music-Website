
Array.from(document.getElementsByClassName('songItem')).forEach((e, i) => {
    e.getElementsByTagName('img')[0].src = songs[i].poster
    e.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
});
