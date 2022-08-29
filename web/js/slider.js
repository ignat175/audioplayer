const thumb = document.querySelector('.thumb');
const volumeController = document.querySelector('.slider');

thumb.style.left = (volumeController.offsetWidth - thumb.offsetWidth) + 'px';

thumb.addEventListener('mousedown', function (evt) {
    evt.preventDefault();

    let shiftX = evt.clientX - thumb.getBoundingClientRect().left;

    document.addEventListener('mousemove', onMouseMove);
    document.addEventListener('mouseup', onMouseUp);

    function onMouseMove (evt) {
        let newLeft = evt.clientX - shiftX - volumeController.getBoundingClientRect().left;
        const rightEdge = volumeController.offsetWidth - thumb.offsetWidth;

        if (newLeft < 0) {
            newLeft = 0;
        } else if (newLeft > rightEdge) {
            newLeft = rightEdge;
        }

        thumb.style.left = newLeft + 'px';

        const step = (volumeController.offsetWidth / 100).toFixed(0);
        const value = (newLeft / step).toFixed(0);
        audioElement.volume = value / 100;
    }

    function onMouseUp() {
        document.removeEventListener('mouseup', onMouseUp);
        document.removeEventListener('mousemove', onMouseMove);
    }
});
