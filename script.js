const adding = document.querySelector("#adding");
const titleFromForm = document.querySelector("#title");
const out = document.querySelector("#out");


adding.addEventListener("submit", async (evt) => {
    evt.preventDefault();
    setTimeout(async () => fetchData(), 100);

    const title = titleFromForm.value;
    const form = new FormData();
    form.set("title", title);
    const r = await fetch("/api/api/", {
        method: "POST",
        body: form
    })
    const z = await r.json()
    if (z.error != null) alert("Błąd");

})

const remove = async (id) => {

    const r = await fetch("/api/api/", {
        method: "DELETE",
        body: JSON.stringify({
            id
        })
    })
}

const fetchData = async () => {
    while(out.lastChild != null) {
        out.removeChild(out.lastChild)
    }
    const r = await fetch("/api/api/")
    const json = await r.json();
    json.forEach(e => {
        const div = document.createElement("article");
        const title = document.createElement("header");
        const footer = document.createElement("footer");
        const timestamp = document.createElement("span");
        const done = document.createElement("input");
        done.type = "checkbox";
        title.innerText = e.title;
        title.style.fontSize = '1.3rem'
        title.style.fontWeight = 'bold'
        timestamp.innerText = (new Date(e.timestamp*1000)).toLocaleString();
        done.value = e.done;
        done.addEventListener("click", async () => {
            await remove(e.id)
            setTimeout(async () => fetchData(), 100);
        })
        div.appendChild(title);
        footer.appendChild(timestamp)
        footer.appendChild(done)
        div.appendChild(footer)
        out.appendChild(div);
    })
}
fetchData()