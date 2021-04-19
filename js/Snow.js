export default class Snow {
    constructor(ctx, width, height) {
        this.yspeed = Math.floor((Math.random() + 0.1) * 3);
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
        this.ctx.fillStyle = "#a8a8a8";
        this.ctx.fillRect(this.x, this.y, 3, 3);
    }
}
