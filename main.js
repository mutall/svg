//
function genAttrbSvg(circle, attributes) {
    const x1 = circle.x;
    const y1 = circle.y - circle.r;
    const y2 = y1 - (3 * attributes);
    const p$=y2+3;
      
  
        return {
        x1 ,
        y1,
        x2 : x1,
        y2 ,
         }
    }

    function genPoint(y1,y2,numattr){
        const point=(y2-y1)/5;
        
       let data = {}
        
       let c = 0;
       for (let index = 1;  index <= numattr; index++) {
           data[`p${index}`] = y2+c ;
           c = c - point;
       }
        return data

    }
 



