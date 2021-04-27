// Schneeklasse für Canvas
export default class Snow {
    constructor(ctx, width, height) {
        this.yspeed = Math.floor((Math.random() + 0.1) * 3);
        this.snowColor = "#a8a8a8";
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
        this.ctx.beginPath();
        this.ctx.arc(this.x, this.y, 3, 0, 2 * Math.PI);
        this.ctx.fillStyle = this.snowColor;
        this.ctx.fill();
        this.ctx.shadowBlur = 0;
    }
}
