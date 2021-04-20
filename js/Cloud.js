export default class Cloud {
    constructor(ctx, width, height) {
        this.floatSpeed = 1;
        this.width = width;
        this.height = height;
        this.x = this.width / 2;
        this.y = -200;
        this.ctx = ctx;
    }
    show() {
        const img = new Image;
        img.src = "../pics/smoke-1.png";
        this.ctx.drawImage(img, this.x, this.y, this.width, this.height);
        this.ctx.shadowColor = "#3a3a39";
        this.ctx.shadowBlur = 5;
    }
}
