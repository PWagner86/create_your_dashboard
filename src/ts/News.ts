// Newsklass um NewsDaten zu holen

export default class News{

    constructor(){
        this.getData();
        setInterval(this.getData, 20000);
    }

    public getData(){
        const headline = <HTMLHeadingElement>document.querySelector(".news-title");
        const newsText = <HTMLHeadingElement>document.querySelector(".news-article");
        const newsPic = <HTMLImageElement>document.querySelector(".news-pic");
        
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const response = JSON.parse(xhttp.responseText);
                fetch(`https://newsapi.org/v2/top-headlines?country=ch&apiKey=${response.news}`)
                .then(res => {
                    res.json()
                    .then(data => {
                        // Zufällig generierte Nummer um zufällig einen Artikel auszuwählen
                        let random: number = Math.floor(Math.random() * Math.floor(data.articles.length));
                        const article = data.articles[random];
                        headline.innerHTML = article.title;
                        // Hat der Artikel kein Bild, wird auf das image-not-found.jpg zugegriffen
                        if(article.urlToImage === null){
                            newsPic.setAttribute("src", "../pics/image-not-found.jpg");
                        }else{
                            newsPic.setAttribute("src", article.urlToImage);
                        }
                        newsText.setAttribute("href", article.url);
                        newsText.innerHTML = `Zum Artikel:<br><span>${article.source.name}</span>`;
                    })
                })
                .catch(error => {
                    console.log(error);
                })
            }
        };
        xhttp.open("GET", "../keys.json", true);
        xhttp.send();
    }
}