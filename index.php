<?php
  @ $db = new mysqli('localhost', 'root', 'game3785', 'chordial');

  $dbOK = false;

  if ($db->connect_error) {
    echo '<div class="messages">Could not connect to the database. Error: ';
    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
  } else {
    $dbOk = true; 
  }
  if($dbOk){
    $result = $db->query("SELECT * FROM `chordial` WHERE `ID` = 1 ");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $title = $row["Title"];
    $comp = $row["Composer"];
    $prog = $row["Progression"];
  }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Chordial</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="res/stylesheet.css" type="text/css"/>
    <script src="http://yui.yahooapis.com/3.16.0/build/yui/yui-min.js"></script>
    <script src="res/wireit/build/wireit-loader/wireit-loader.js"></script>
    <script>YUI_config.groups.wireit.base = 'res/wireit/build/';</script>
    <script>
      YUI().use('arrow-wire', function(Y) {

        var mygraphic = new Y.Graphic({
            render: "#layer"
        });

        var wire = mygraphic.addShape({
            type: Y.ArrowWire,
            stroke: {
                weight: 4,
                color: "rgb(256,256,256)"
            },
            src: {
                getXY: function() {
                    return [165, 555];
                }
            },
            tgt: {
                getXY: function() {
                    return [1420, 555];
                }
            }
        });

    });

    YUI().use('arrow-wire', function(Y) {

        var mygraphic = new Y.Graphic({
            render: "#layer2"
        });

        var wire = mygraphic.addShape({
            type: Y.ArrowWire,
            stroke: {
                weight: 4,
                color: "rgb(256,256,256)"
            },
            src: {
                getXY: function() {
                    return [390, 120];
                }
            },
            tgt: {
                getXY: function() {
                    return [95, 465];
                }
            }
        });

    });
    YUI().use('arrow-wire', function(Y) {

        var mygraphic = new Y.Graphic({
            render: "#layer3"
        });

        var wire = mygraphic.addShape({
            type: Y.ArrowWire,
            stroke: {
                weight: 4,
                color: "rgb(256,256,256)"
            },
            src: {
                getXY: function() {
                    return [0, 0];
                }
            },
            tgt: {
                getXY: function() {
                    return [350, 50];
                }
            }
        });

    });
    </script>
    <script type="text/javascript">
      var i = 0;
      var size;
      var title;
      var composer;
      var progression;
      function load () {
        title = <?php echo json_encode($title);?>;
        composer = <?php echo json_encode($comp);?>;
        progression = <?php echo json_encode($prog);?>;
        size = progression.length;
        var header = title + "\nBy\n" + composer;
        document.getElementById('title').innerHTML=header;
      }

      function helper (letter,i) {
        var clss;
        if( i == 1 ){
          clss = "box2";
        } else if ( i == 2 ){
          clss = "box3";
        } else {
          clss = "box";
        }
        if ( letter == '1' ) {
          document.getElementById("I").className = clss;
        } else if( letter == '2' ){
          document.getElementById("II").className = clss;
        } else if( letter == '3' ) {
          document.getElementById("III").className = clss;
        } else if( letter == '4' ) {
          document.getElementById("IV").className = clss;
        } else if( letter == '5' ) {
          document.getElementById("V").className = clss;
        } else if( letter == '6' ) {
          document.getElementById("VI").className = clss;
        } else if( letter == '7' ) {
          document.getElementById("VII").className = clss;
        } else if( letter == 'G' ) {
          document.getElementById("G").className = clss;
        }
      }

      function color(prog, i){
          if(i < size){
            var rn = prog[i];
            if(i  == 0){
                helper(rn,1);
            } 
            else if (i == 1){
              helper(prog[i-1],2);
              helper(rn,1);
            }
            else {
              helper(prog[i-2],3);
              helper(prog[i-1],2);
              helper(rn,1);
            }
          }
          
      }

      function play () {
        setInterval(function () {
          color(progression,i);
          i= i+1;
        },2000);
      }
    </script>
    <style type="text/css">
      

    </style>
  </head>
  <body class="background" onload="load()">
    <div class='border'>
      <div class='title' id='title'></div>
      <div class='box' id='I'><p>I</p></div>
      <div class='box' id='II'><p>II</p></div>
      <div class='box' id='III'><p>III</p></div>
      <div class='box' id='IV'><p>IV</p></div>
      <div class='box' id='V'><p>V</p></div>
      <div class='box' id='VI'><p>VI</p></div>
      <div class='box' id='VII'><p>VII</p></div>
      <div class='box' id='G'><p>G</p></div>
      <div class='position'>
      <button class='title' type="button" onclick="play()">Play</button>
    </div>
      
      <div class="arrow opaque" id="layer"></div>
      <div class="arrow opaque" id="layer2"></div>
      <div class="arrow opaque" id="layer3"></div> 

      <div class="arrow opaque" id="a12"></div>
      <div class="arrow opaque" id="a13"></div>
      <div class="arrow opaque" id="a14"></div>
      <div class="arrow opaque" id="a15"></div>
      <div class="arrow opaque" id="a16"></div>
      <div class="arrow opaque" id="a1g"></div>
      <div class="arrow opaque" id="a21"></div>
      <div class="arrow opaque" id="a23"></div>
      <div class="arrow opaque" id="a25"></div>
      <div class="arrow opaque" id="a31"></div>
      <div class="arrow opaque" id="a32"></div>
      <div class="arrow opaque" id="a34"></div>
      <div class="arrow opaque" id="a35"></div>
      <div class="arrow opaque" id="a36"></div>
      <div class="arrow opaque" id="a41"></div>
      <div class="arrow opaque" id="a42"></div>
      <div class="arrow opaque" id="a43"></div>
      <div class="arrow opaque" id="a45"></div>
      <div class="arrow opaque" id="a46"></div>
      <div class="arrow opaque" id="a47"></div>
      <div class="arrow opaque" id="a4g"></div>
      <div class="arrow opaque" id="a51"></div>
      <div class="arrow opaque" id="a53"></div>
      <div class="arrow opaque" id="a56"></div>
      <div class="arrow opaque" id="a61"></div>
      <div class="arrow opaque" id="a62"></div>
      <div class="arrow opaque" id="a64"></div>
      <div class="arrow opaque" id="a65"></div>
      <div class="arrow opaque" id="a67"></div>
      <div class="arrow opaque" id="a6g"></div>
      <div class="arrow opaque" id="a73"></div>
      <div class="arrow opaque" id="a75"></div>
      <div class="arrow opaque" id="ag1"></div>
      <div class="arrow opaque" id="ag5"></div>
    </div>

  </body>
</html>
