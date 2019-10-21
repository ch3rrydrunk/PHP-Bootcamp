
$(document).ready(function () {
	var cnv = document.createElement("canvas");
	cnv.width = 1200;
	cnv.height = 1200;
	var ctx = cnv.getContext("2d");
	ctx.strokeStyle = "red";
	var w = cnv.width ;
	var h = cnv.height ;
	var span = 8;
	var img = new Image(64, 64);
	ctx.beginPath();
	for (var i = 0; i <= w; i+= span) {
		for (var j = 0; j <= h; j+= span) {
			ctx.strokeRect(i, j, 8, 8);
		}
	}
	ctx.strokeStyle = "green";
	ctx.fill(); // *14
	ctx.moveTo(40, 140);
	ctx.lineTo(20, 40);
	ctx.lineTo(60, 100);
	ctx.stroke(); // *22
	
	//for (var x = -0.0; x <= w; x += span) ctx.strokeRect(x, 0, 0.5, h);
	//for (var y = -0.0; y <= h; y += span) ctx.strokeRect(0, y, w, 0.5);
	// сохрнить в рисунок
	$("#cimg").attr("src", cnv.toDataURL());
	// добавить как фон для div
	$('#cdiv').css("background-image", "url('" + cnv.toDataURL() + "')");
});

function drawImage1() {
	// use the intrinsic size of image in CSS pixels for the canvas element
  
	// will draw the image as 300x227 ignoring the custom size of 60x45
	// given in the constructor
	//ctx.drawImage(this, 0, 0);
  
	// To use the custom size we'll have to specify the scale parameters 
	// using the element's width and height properties - lets draw one 
	// on top in the corner:
	ctx.drawImage(this, 0, 0, 64, 64);
  }