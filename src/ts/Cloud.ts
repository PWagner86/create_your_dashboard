export default class Cloud {
    public width: number;
    public height: number;
    public ctx: CanvasRenderingContext2D;
    private x: number;
    private y: number;
    private xspeed: number = Math.floor((Math.random() + 0.5) * 2 );

    constructor(ctx: CanvasRenderingContext2D, width: number, height: number){
        this.width = width;
        this.height = height;
        this.x = Math.floor(Math.random() * (100 - this.width));
        this.y = Math.floor(Math.random() * this.height);
        this.ctx = ctx;
    }

    public float(){
        this.x = this.x + this.xspeed;

        if(this.x > this.width){
            this.x = Math.floor(Math.random() * (100 - this.width));
        }
    }

    public show(){
        const img: HTMLImageElement = new Image;
        img.src = "../pics/cloude1.png";
        this.ctx.drawImage(img, this.x, this.y, this.width / 6, this.height / 6);
        this.ctx.shadowColor = "#3a3a39";
        this.ctx.shadowBlur = 5;
    }

}