// Schneeklasse für Canvas

export default class Snow{
    public width: number;
    public height: number;
    public ctx: CanvasRenderingContext2D;
    private x: number;
    private y: number;
    private yspeed: number = Math.floor((Math.random() + 0.1) * 3 );
    private snowColor: string = "#a8a8a8";

    constructor(ctx: CanvasRenderingContext2D, width: number, height: number){
        this.width = width;
        this.height = height;
        this.x = Math.floor(Math.random() * this.width);
        this.y = Math.floor(Math.random() * (100 - this.height));
        this.ctx = ctx;
    }

    public fall(){
        this.y = this.y + this.yspeed;

        if(this.y > this.height){
            this.y = Math.floor(Math.random() * (100 - this.height));
        }
    }

    public show(){
        this.ctx.beginPath();
        this.ctx.arc(this.x, this.y, 3, 0, 2 * Math.PI);
        this.ctx.fillStyle = this.snowColor;
        this.ctx.fill();
        this.ctx.shadowBlur = 0;

    }

}