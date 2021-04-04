// Fuktion um die News zu holen
export default function getNews(){
    const headline:any = document.querySelector(".news-title");
    const newsText:any = document.querySelector(".news-article");
    const newsPic:any = document.querySelector(".news-pic");

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const response: any = JSON.parse(xhttp.responseText);
            fetch(`https://newsapi.org/v2/top-headlines?country=ch&apiKey=${response.news}`)
            .then(res => {
                res.json()
                .then(data => {
                    // console.log(data.articles);
                    let random: number = Math.floor(Math.random() * Math.floor(data.articles.length));
                    const article: any = data.articles[random];
                    headline.innerHTML = article.title;
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