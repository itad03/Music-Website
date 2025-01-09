let pop_song_left = document.getElementById('pop_song_left');
let pop_song_right = document.getElementById('pop_song_right');
let pop_song = document.getElementsByClassName('pop_song')[0];

pop_song_right.addEventListener('click', () => {
    pop_song.scrollLeft += 330;
});
pop_song_left.addEventListener('click', () => {
    pop_song.scrollLeft -= 330;
});
let pop_song1_left = document.getElementById('pop_song1_left');
let pop_song1_right = document.getElementById('pop_song1_right');
let pop_song1 = document.getElementsByClassName('pop_song')[1];
pop_song1_right.addEventListener('click', () => {
    pop_song1.scrollLeft += 330;
});
pop_song1_left.addEventListener('click', () => {
    pop_song1.scrollLeft -= 330;
});
