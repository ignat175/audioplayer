const audioElement = document.querySelector('audio');
const playBtnElement = document.querySelector('.play-btn');
const prevBtnElement = document.querySelector('.prev-btn');
const nextBtnElement = document.querySelector('.next-btn');
const volumeElement = document.querySelector('.slider');
const playListElement = document.querySelector('.play-list');
const viewportElement = document.querySelector('.viewport');

const xhr = new XMLHttpRequest();

xhr.open('GET', 'http://localhost/files');

xhr.addEventListener('load', () => {
   if (xhr.status === 200) {
        const files = JSON.parse(xhr.response);

        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            const listItem = document.createElement('li');
            listItem.textContent = file.audio_path.substr(0, 20);
            listItem.dataset.src = file.audio_path;
            listItem.dataset.i = i;
            playListElement.append(listItem);

            const imgElement = document.createElement('img');
            imgElement.src = `./img/${file.image_path}`;

            listItem.style.transitionDelay = i * 300 + 'ms';

            setTimeout(() => {
                listItem.style.opacity = '1';
                listItem.style.top = '0';
            }, 0);

            viewportElement.append(imgElement);
        }

        let i = 0;

        const play = () => {
            playBtnElement.classList.toggle('play-btn--active');

            if (audioElement.paused) {
                audioElement.play();
                playListElement.children[i].classList.add('item--active');
            } else {
                audioElement.pause();

                for (const item of playListElement.children) {
                    item.classList.remove('item--active');
                }
            }
        };

        audioElement.src = `./audio/${files[i].audio_path}`;

        const changeTrack = (evt) => {
            const next = evt.target.tagName === 'audio'.toUpperCase()
                ? true
                : evt.target.classList.contains('next-btn');

            if (audioElement.paused) {
                playBtnElement.classList.add('play-btn--active');
            }

            if (i === (next ? files.length - 1 : 0)) {
                i = next ? 0 : files.length - 1;
            } else {
                next ? i++ : i--;
            }

            audioElement.src = `./audio/${files[i].audio_path}`;
            audioElement.play();

            const imgElement = viewportElement.querySelector('img');
            imgElement.style.marginLeft = (imgElement.offsetWidth * -i) + 'px';

            for (const item of playListElement.children) {
               item.classList.remove('item--active');
            }

            playListElement.children[i].classList.add('item--active');
        }

        playBtnElement.addEventListener('click', play);
        prevBtnElement.addEventListener('click', changeTrack);
        nextBtnElement.addEventListener('click', changeTrack);
        audioElement.addEventListener('ended', changeTrack);

        audioElement.addEventListener('play', () => {
            playBtnElement.classList.add('play-btn--active');
            playListElement.children[i].classList.add('item--active');
        });

        audioElement.addEventListener('pause', () => {
            playBtnElement.classList.remove('play-btn--active');

            for (const item of playListElement.children) {
                item.classList.remove('item--active');
            }
        });

        volumeElement.addEventListener('input', (evt) => {
            audioElement.volume = evt.target.value / 100;
        });

        audioElement.addEventListener('volumechange', () => {
            const thumb = document.querySelector('.thumb');
            const step = (volumeController.offsetWidth / 100).toFixed(0);
            thumb.style.left = (audioElement.volume * 100 * step) + 'px';
        });

        playListElement.addEventListener('click', (evt) => {
            if (evt.target.closest('li')) {
                for (const item of playListElement.children) {
                    item.classList.remove('item--active');
                }

                evt.target.classList.add('item--active');
                audioElement.src = `./audio/${evt.target.dataset.src}`;
                audioElement.play();

                const imgElement = viewportElement.querySelector('img');
                imgElement.style.marginLeft =
                    (imgElement.offsetWidth * -evt.target.dataset.i) + 'px';

                for (let j = 0; j < files.length; j++) {
                    if (files[j].audio_path === evt.target.dataset.src) {
                        i = j;
                    }
                }
            }
        });
    }
});

xhr.send();
