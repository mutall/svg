<html>
    <head>
        <title>kevlin </title>
        <style>
        text{
            font:italic;
        }
        </style>
    </head>
    <body>
        <!-- Linking to the Kevin Lindey library -->
        <script src="./node_modules/kld-intersections/dist/index-umd.js"></script>
        <script src="./main.js"></script>     //
        <script>
           //Define the coordinates of the circle centers
            const c1 = new KldIntersections.Point2D(25,100);
            const c2 = new KldIntersections.Point2D(200,100);
            
            //
            //Us the library to define circle1, centered on 25/30 with radius 50. 
            //What units are these figures? How to we scale them to %?
            const circle1 = KldIntersections.ShapeInfo.circle(c1.x, c1.y, 15);
            const circleObj = {
                x: c1.x,
                y: c1.y,
                r: 15
            }
            const attribLine = genAttrbSvg(circleObj, 5,"chic");
            const attribpoint = genPoint(85,70,5);
            const p1=70;
            const  p5=82;
            
          
            console.log(attribpoint);
                        //Define a second circle
            const circle2 = KldIntersections.ShapeInfo.circle(c2.x, c2.y, 15);
            const circleObj2 = {
                x: c2.x,
                y: c2.y,
                r: 15
            }
            const attribLine2 = genAttrbSvg(circleObj2, 10);
           const attribpoint1 = genPoint(85,55,30);
           console.log(attribpoint1);
            //Draw a line from the center of circle 1 to the center of circl2
            const line = KldIntersections.ShapeInfo.line(c1.x, c1.y, c2.x, c2.y);
            //
            //Get the intersections of the line and circles
            const intersection1 = KldIntersections.Intersection.intersect(circle1, line);
            const intersection2 = KldIntersections.Intersection.intersect(circle2, line);
            //
            //Retrieve the intersection points, p1 and p2
            const I1 = intersection1.points[0];
            const I2 = intersection2.points[0];
            //
            //Construct the svg element from the circle1 
            const svg = 
                `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400"> 
                <style>
                text{
                    font:italic;
                    color:red;
                }
                </style>
                        <circle 
                            cx="${circle1.args[0].x}" 
                            cy="${circle1.args[0].y}" 
                            r="${circle1.args[1]}" 
                           stroke="blue" fill="none"/>
                        
                        <circle 
                            cx="${circle2.args[0].x}" 
                            cy="${circle2.args[0].y}" 
                            r="${circle2.args[1]}" 
                           stroke="red" fill="none"/>
                       
                       <line 
                            x1="${I1.x}" 
                            y1="${I1.y}" 
                            x2="${I2.x}" 
                            y2="${I2.y}"
                            stroke="red"
                           />

                           <line 
                            x1="${attribLine.x1}" 
                            y1="${attribLine.y1}" 
                            x2="${attribLine.x2}" 
                            y2="${attribLine.y2}"
                            stroke="purple"
                           />

                           <line 
                            x1="${attribLine2.x1}" 
                            y1="${attribLine2.y1}" 
                            x2="${attribLine2.x2}" 
                            y2="${attribLine2.y2}"
                            stroke="purple"
                           />

                       <circle 
                            cx="${I1.x}" 
                            cy="${I1.y}" 
                            r="2" 
                            fill="green"/>
                
                            <circle 
                            cx="${c1.x}" 
                            cy="${p1}" 
                            r="2" 
                            fill="green"/>

                            <text x="${attribLine.name_x}" y="${attribLine.name_y}" fill="black">
                          ${attribLine.name}
                       </text>

                            <circle 
                            cx="${c1.x}" 
                            cy="${p5}" 
                            r="2" 
                            fill="green"/>
                                                                     
                </svg>`;
            //
            //Write the svg text to the browser.
            document.write(svg);
                           
        </script>
    </body>
</html>

