const xhr = new XMLHttpRequest ();

xhr.open('GET', './server.php');
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoderd');

xhr.addEventListener('load', () => {
    if (xhr.status === 200) {
        const jsonData = xhr.response;
        const files = JSON.parse(jsonData);

        console.log(files);
    }
})

xhr.send();