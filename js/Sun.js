export default class Sun {
    constructor(ctx, width, height) {
        this.sunColor = "#ffd900";
        this.width = width;
        this.height = height;
        this.sunSize = this.width / 6;
        this.ctx = ctx;
        this.x = this.width - (this.sunSize / 2);
        this.y = this.sunSize - (this.sunSize / 2);
    }
    show() {
        this.ctx.beginPath();
        this.ctx.shadowColor = this.sunColor;
        this.ctx.shadowBlur = 200;
        this.ctx.arc(this.x, this.y, this.sunSize, 0, 2 * Math.PI);
        this.ctx.fillStyle = this.sunColor;
        this.ctx.fill();
    }
}
