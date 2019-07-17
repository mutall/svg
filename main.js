class MutallEllipse {
    constructor(pointX, pointY, radius, attributes) {
        this.x = pointX;
        this.y = pointY;
        this.r = radius;
        this.attributes = attributes;
    }

    genAttribSvg() {
        const x1 = this.x;
        const y1 = this.y - this.r;
        const y2 = y1 - (10 * this.attributes.length);
        
        return {
            x1,
            y1,
            x2: x1,
            y2,
        }
    }

    genPoint() {
        const line = this.genAttribSvg();
        const space = (line.y2 - line.y1) / this.attributes.length;
        let data = "";
    
        let c = 0;

        this.attributes.forEach(element => {
            let string = `<circle 
                            cx="${this.x}" 
                            cy="${line.y2 + c}" 
                            r="1.5" 
                            stroke="white"
                            fill="blue"/>
                            
                            <text x="${this.x +3}" y="${line.y2 + c}" class="txt" fill="black">${element}</text>
                            `
            data = data + string;
            c = c - space;
        });
        
        return data
    }


}

