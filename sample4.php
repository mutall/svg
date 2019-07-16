<html>
    <head>
        <title>clippath</title>
        <style>
            .image{
                 border: 1px solid black;
                 border-radius: 4px;
                 padding: 5px;

            }
        </style>
                 </head>
     
    <body>
        <!-- Linking to the Kevin Lindsey library -->
        <script src="./node_modules/kld-intersections/dist/index-umd.js"></script>
        <script>
            //
            //Define the coordinates of the ellipse centers 
            const c1 = new KldIntersections.Point2D(300, 40);
            const c2 = new KldIntersections.Point2D(800, 40);

            //
            //Use the library to define ellipse1,centered on 60/40 with radius 50,30. 
            
            const ellipse1 = KldIntersections.ShapeInfo.ellipse(c1.x, c1.y,50,30);

            //Define a second ellipse
            //console them on the browser to inspect their positions
            const ellipse2 = KldIntersections.ShapeInfo.ellipse(c2.x, c2.y, 50,30);
            console.log(ellipse1);


            const chic = generate_svg(ellipse1, "chic joint", "chickjoint.png");
            const eureka = generate_svg(ellipse2, "eureka water", "eureka.png");
            //
           // Draw a line from the point of intersection of ellipse1 to ellipse2
            const line = KldIntersections.ShapeInfo.line(c1.x, c1.y, c2.x, c2.y);
            console.log(line);
//            //
//            //Get the intersections of the line and ellipses
            const intersection1 = KldIntersections.Intersection.intersect(ellipse1, line);
            const intersection2 = KldIntersections.Intersection.intersect(ellipse2, line);
//            //
//            //Retrieve the intersection points, p1 and p2
            const p1 = intersection1.points[0];
            const p2 = intersection2.points[0];
            
              //
//            //Construct the svg element 
            const svg =
                   `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" clip="auto"> 
           
                      <clipPath id="ellipse1">    
                         <ellipse 
                           cx="${chic.cx}" 
                            cy="${chic.cy}" 
                            rx="${chic.rx}" 
                            ry="${chic.ry}"
                            stroke="blue" fill="black"/>
                       </clipPath>
                            
                       <image 
                            width= "${c1.x*2}"
                            height="${c1.y*2}"
                            xlink:href="${chic.url}" 
                            clip-path="url(#ellipse1)"/>
                      
                       <text x="${chic.name_x}" y="${chic.name_y}" fill="black">
                          ${chic.name}
                       </text>
                       
                       
                       <clipPath id="ellipse2">
                         <ellipse 
                            cx="${eureka.cx}" 
                            cy="${eureka.cy}" 
                            rx="${eureka.rx}"
                             ry="${eureka.ry}"
                           stroke="red" fill="none"/>
                        </clipPath>
                            
                        <image 
                            width="${c2.x*2}"
                            height= "${c2.y*2}"
                            xlink:href="${eureka.url}" 
                            clip-path="url(#ellipse2)"/>
                           
                         <text x="${eureka.name_x}" y="${eureka.name_y}" fill="black">
                       ${eureka.name}
                          </text>
                       
                             
                        <line 
                            x1="${p1.x}" 
                            y1="${p1.y}" 
                            x2="${p2.x}" 
                            y2="${p2.y}"
                            stroke="red"
                           />
                         <circle 
                            cx="${p1.x}" 
                            cy="${p1.y}" 
                            r="5" 
                            fill="green"/>
                           
                   </svg>`;
            //
            //Write the svg text to the browser.
           console.log(svg);
           document.write(svg);            
         
            function generate_svg(ellipse, name, url){
               return {
                  cx: ellipse.args[0].x,
                  cy: ellipse.args[0].y, 
                  rx: ellipse.args[1],
                  ry: ellipse.args[2],
                  name: name,
                  name_x:  ellipse.args[0].x-30,
                  name_y: ellipse.args[0].y+50,
                  url: url
                        };
                    }
        </script>
    </body>
</html>

