export default class Rain {
    public width: number;
    public height: number;
    public ctx: CanvasRenderingContext2D;
    private x: number;
    private y: number;
    private yspeed: number = Math.floor((Math.random() + 0.5) * 10 );
    private rainColor: string = "#203e8f";

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
        this.ctx.fillStyle = this.rainColor;
        this.ctx.fillRect(this.x, this.y, 3, 20);
        this.ctx.shadowBlur = 0;
    }
}