function loadAJAXFile(filename, aimSelector) {
    await fetch(filename)
        .then((response) => {
            return response.text();
        })
        .then((data) => {
            console.log(data);

            let div = document.createElement('div');
            div.innerHTML = data;
            document.querySelector(aimSelector).appendChild(div);
        })
        ;
}