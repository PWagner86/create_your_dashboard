// Zeichnet den Regen in den Canvas
export default class Rain {
    constructor(ctx, width, height) {
        this.yspeed = Math.floor((Math.random() + 0.5) * 10);
        this.rainColor = "#203e8f";
        this.width = width;
        this.height = height;
        this.x = Math.floor(Math.random() * this.width);
        this.y = Math.floor(Math.random() * (100 - this.height));
        this.ctx = ctx;
    }
    fall() {
        this.y = this.y + this.yspeed;
        if (this.y > this.height) {
            this.y = Math.floor(Math.random() * (100 - this.height));
        }
    }
    show() {
        this.ctx.fillStyle = this.rainColor;
        this.ctx.fillRect(this.x, this.y, 3, 20);
        this.ctx.shadowBlur = 0;
    }
}
