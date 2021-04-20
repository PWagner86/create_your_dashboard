export default class Cloud {
    constructor(ctx, width, height) {
        this.xspeed = Math.floor((Math.random() + 0.5) * 2);
        this.width = width;
        this.height = height;
        this.x = Math.floor(Math.random() * (100 - this.width));
        this.y = Math.floor(Math.random() * this.height);
        this.ctx = ctx;
    }
    float() {
        this.x = this.x + this.xspeed;
        if (this.x > this.width) {
            this.x = Math.floor(Math.random() * (100 - this.width));
        }
    }
    show() {
        const img = new Image;
        img.src = "../pics/cloude1.png";
        this.ctx.drawImage(img, this.x, this.y, this.width / 6, this.height / 6);
        this.ctx.shadowColor = "#3a3a39";
        this.ctx.shadowBlur = 5;
    }
}
