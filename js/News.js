// Newsklass um NewsDaten zu holen
export default class News {
    constructor() {
        this.getData();
        setInterval(this.getData, 20000);
    }
    getData() {
        const headline = document.querySelector(".news-title");
        const newsText = document.querySelector(".news-article");
        const newsPic = document.querySelector(".news-pic");
        fetch("../keys.json")
            .then(res => {
            res.json()
                .then(keys => {
                fetch(`https://newsapi.org/v2/top-headlines?country=ch&apiKey=${keys.news}`)
                    .then(res => {
                    res.json()
                        .then(data => {
                        // Zufällig generierte Nummer um zufällig einen Artikel auszuwählen
                        let random = Math.floor(Math.random() * Math.floor(data.articles.length));
                        const article = data.articles[random];
                        headline.innerHTML = article.title;
                        // Hat der Artikel kein Bild, wird auf das image-not-found.jpg zugegriffen
                        if (article.urlToImage === null) {
                            newsPic.setAttribute("src", "../pics/image-not-found.jpg");
                        }
                        else {
                            newsPic.setAttribute("src", article.urlToImage);
                        }
                        newsText.setAttribute("href", article.url);
                        newsText.innerHTML = `Zum Artikel:<br><span>${article.source.name}</span>`;
                    });
                })
                    .catch(error => {
                    console.log(error);
                });
            });
        });
    }
}
