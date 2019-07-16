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
        const y2 = y1 - (3 * this.attributes.length);
        
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
        let data = {}
    
        let c = 0;
        for (let index = 1; index <= this.attributes.length; index++) {
            data[`p${index}`] = line.y2 + c;
            c = c - space;
        }
        return data
    }
}

