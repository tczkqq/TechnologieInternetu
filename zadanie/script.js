// Przepisy2.hmtl - Ladowanie po nazwie lokalnego pliku
function load2() {
    let object;
    let src = `./${document.getElementById('loader').value}`;
    let httpRequest = new XMLHttpRequest();
    httpRequest.open("GET", src, true);
    httpRequest.send();
    httpRequest.addEventListener("readystatechange", function() {
        if (this.readyState === this.DONE) {
            let div = document.getElementById('przepisy');
            div.innerHTML =  '';
            if (src.slice(-4) == 'json') {
                object = JSON.parse(this.response);
                for (let p in object['Przepisy']) {
                    div.innerHTML += `<h1> ${object['Przepisy'][p]['Tytuł']} (${object['Przepisy'][p]['Czasochłonność']}) </h1>`;
                    div.innerHTML += `<p> ${object['Przepisy'][p]['Opis']} </p>`;
                }
            } else if (src.slice(-3) == 'xml') {
                object = new DOMParser();
                const doc = object.parseFromString(this.response.replace(/[\n\r\t]/g,''), "text/xml");
                let elems = doc.getElementsByTagName('przepis');
                console.log(elems.length);
                console.log(elems.childNodes);
                
                for (let i=0; i< elems.length; i++) {
                    div.innerHTML += `<h1> ${elems[i].childNodes[1].textContent} (${elems[i].childNodes[5].textContent})</h1>`;
                    div.innerHTML += `<p> ${elems[i].childNodes[3].textContent} </p>`;
                }

                
            } else {
                div.innerHTML += `<h1>Błędny plik</h1>`;
            }
        }
    });
}


// Przepisy.html - Pobieranie z pliku
function load() {
    let f = document.getElementById('loader').files[0];
    let div = document.getElementById('przepisy');
    div.innerHTML = '';
    let vr = new FileReader();
    vr.readAsText(f);
    vr.onload = function() {
        div.innerHTML = '';
        if (f.name.slice(-4) == 'json') {
            object = JSON.parse(vr.result);
            for (let p in object['Przepisy']) {
                div.innerHTML += `<h1> ${object['Przepisy'][p]['Tytuł']} (${object['Przepisy'][p]['Czasochłonność']}) </h1>`;
                div.innerHTML += `<p> ${object['Przepisy'][p]['Opis']} </p>`;
            }
        } else if (f.name.slice(-3) == 'xml') {
            object = new DOMParser();
            const doc = object.parseFromString(vr.result.replace(/[\n\r\t]/g, ''), "text/xml");
            let elems = doc.getElementsByTagName('przepis');
            console.log(elems.length);
            console.log(elems.childNodes);

            for (let i = 0; i < elems.length; i++) {
                div.innerHTML += `<h1> ${elems[i].childNodes[1].textContent} (${elems[i].childNodes[5].textContent})</h1>`;
                div.innerHTML += `<p> ${elems[i].childNodes[3].textContent} </p>`;
            }


        } else {
            div.innerHTML += `<h1>Błędny plik</h1>`;
        }
    }
}

