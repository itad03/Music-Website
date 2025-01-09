seek.addEventListener('change', () => {
    music.currentTime = seek.value * music.duration / 100;
});
volume.addEventListener('change', () => {
    if (volume.value == 0) {
        vol_icon.classList.remove('ri-volume-up-line');
        vol_icon.classList.remove('ri-volume-down-line');
        vol_icon.classList.add('ri-volume-mute-line');
    }
    if (volume.value > 0) {
        vol_icon.classList.remove('ri-volume-up-line');
        vol_icon.classList.add('ri-volume-down-line');
        vol_icon.classList.remove('ri-volume-mute-line');
    }
    if (volume.value > 50) {
        vol_icon.classList.add('ri-volume-up-line');
        vol_icon.classList.remove('ri-volume-down-line');
        vol_icon.classList.remove('ri-volume-mute-line');
    }
    music.volume = volume.value / 100;
});