export default class Cloud {
    public width: number;
    public height: number;
    public ctx: CanvasRenderingContext2D;
    private x: number;
    private y: number;
    private floatSpeed: number = 1;

    constructor(ctx: CanvasRenderingContext2D, width: number, height: number){
        this.width = width;
        this.height = height;
        this.x = this.width / 2;
        this.y = -200;
        this.ctx = ctx;
    }

    public show(){
        const img: HTMLImageElement = new Image;
        img.src = "../pics/smoke-1.png";
        this.ctx.shadowColor = "#3a3a39";
        this.ctx.shadowBlur = 5;
        this.ctx.drawImage(img, this.x, this.y, this.width, this.height);
    }
}