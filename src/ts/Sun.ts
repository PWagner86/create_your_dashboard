export default class Sun {
    public width: number;
    public height: number;
    public ctx: CanvasRenderingContext2D;
    private x: number;
    private y: number;
    private sunSize: number;
    private sunColor: string = "#ffd900"

    constructor(ctx: CanvasRenderingContext2D, width: number, height: number){
        this.width = width;
        this.height = height;
        this.sunSize = this.width / 6;
        this.ctx = ctx;
        this.x = this.width - (this.sunSize / 2);
        this.y = this.sunSize - (this.sunSize / 2);
    }

    public show(){
        this.ctx.beginPath();
        this.ctx.shadowColor = this.sunColor;
        this.ctx.shadowBlur = 200;
        this.ctx.arc(this.x, this.y, this.sunSize, 0, 2 * Math.PI);
        this.ctx.fillStyle = this.sunColor;
        this.ctx.fill();
    }
}
