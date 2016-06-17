$(document).ready(function(){

    /*var colorScale = d3.scale.category10();

    var chart1 = c3.generate({
        bindto: '#chart1',
        axis: {
            x: {
                type: 'category'
            }
        },
        title: {
            text: "Event Scoring"
        },
        data: {
            x: 'x',
            columns: [
                ['x', 'Bucket Chug', 'Beer Pong', 'Flip Cup', 'Stack Cup', 'Dizzy Bat'],
                ['Team 1', 30, 200, 100, 400, 150, 250],
                ['Team 2', 50, 20, 10, 40, 15, 25],
                ['Team 3', 230, 190, 300, 500, 300, 400],
                ['Team 4', 130, 150, 200, 300, 200, 100],
                ['Team 5', 20, 150, 170, 350, 200, 210],
                ['Team 6', 30, 200, 100, 400, 150, 250],
                ['Team 7', 30, 200, 100, 400, 150, 250],
                ['Team 8', 30, 200, 100, 400, 150, 250],
                ['Team 9', 30, 200, 100, 400, 150, 250],
                ['Team 10', 30, 200, 100, 400, 150, 250]
            ]
        },
        color: function(inColor, data) {
          if(data.index !== undefined) {
            return colorScale(data.index);
          }

          return inColor;
        }
    });*/

});

function makeChart(scores, teams) {
    $(document).ready(function() {
        var tick = {};
        var $width = $(window).width();
        if ($width < 480) {
           // tick["values"] = [0, 1000, 2000, 3000, 4000];
	    tick["count"] = 5;
        }

        var games = ['Bucket Chug', 'Beer Pong', 'Flip Cup', 'Beer Ball', 'Game Five'];
        var k = 0;
        var columns = [];
        columns.push(['x']);
        for (var i = 0; i < teams.length; i++) {
            columns[0].push(teams[i]);
        }
        for (var i = 0; i < scores.length; i++) {
            columns.push([]);
            columns[i + 1].push(games[k++]);
            for (var j = 0; j < scores[i].length; j++) {
                columns[i + 1].push(scores[i][j]);
            }
        }

        var chart2 = c3.generate({
            bindto: '#chart2',
            axis: {
                rotated: true,
                x: {
                    type: 'category'
                },
                y: {
                    tick: tick
                }
            },
            bar: {
                width: {
                    ratio: 0.5
                }
            },
            size: {
                height: 550
            },
            data: {
                x: 'x',
                type: 'bar',
                columns: columns,
                groups: [
                    ['Bucket Chug', 'Beer Pong', 'Flip Cup', 'Beer Ball', 'Game Five']
                ],
                colors: {
                    'Bucket Chug': '#0E3D59',
                    'Beer Pong': '#88A61B',
                    'Flip Cup': '#F29F05',
                    'Beer Ball': '#F25C05',
                    'Game Five': '#D92525'
                }
            },

        });
    });
}
