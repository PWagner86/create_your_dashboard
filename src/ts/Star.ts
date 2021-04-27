// Sternenklasse für Canvas

export default class Star {
    public width: number;
    public height: number;
    public ctx: CanvasRenderingContext2D;
    private x: number;
    private y: number;
    private starColor: string = "#e3eb9d";

    constructor(ctx: CanvasRenderingContext2D, width: number, height: number){
        this.width = width;
        this.height = height;
        this.x = Math.floor(Math.random() * this.width);
        this.y = Math.floor(Math.random() * this.height);
        this.ctx = ctx;
    }

    public show(){
        this.ctx.beginPath();
        this.ctx.arc(this.x, this.y, 3, 0, 2 * Math.PI);
        this.ctx.fillStyle = this.starColor;
        this.ctx.fill();
        this.ctx.shadowColor = this.starColor;
        this.ctx.shadowBlur = 10;
    }
}