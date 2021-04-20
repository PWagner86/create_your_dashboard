export default class Star {
    constructor(ctx, width, height) {
        this.starColor = "#e3eb9d";
        this.width = width;
        this.height = height;
        this.x = Math.floor(Math.random() * this.width);
        this.y = Math.floor(Math.random() * this.height);
        this.ctx = ctx;
    }
    show() {
        this.ctx.beginPath();
        this.ctx.arc(this.x, this.y, 3, 0, 2 * Math.PI);
        this.ctx.fillStyle = this.starColor;
        this.ctx.fill();
        this.ctx.shadowColor = this.starColor;
        this.ctx.shadowBlur = 10;
    }
}
