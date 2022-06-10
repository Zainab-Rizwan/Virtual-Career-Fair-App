<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Join Meeting</title>
</head>

<body>
	
	

	<?php include 'header.php';?>
		<div id="backgroundimage"></div> 
		<h1 class="hero-heading">Video Call</h1>
	<div class="block"><input type="text" class="input-res" placeholder="Enter Name"></div>
		<a href="" class="btn"><b><span style="color:white" >Join Meeting</span></b></a>
    

</body>
</html>

<style>

h1.hero-heading {
	position: relative;
	left: 380px;	
	bottom: 450px;
    font-size: 70px;
    font-weight: bold;
	color: white;
}
@media (max-width: 768px) {
    h1.hero-heading {
		position: relative;
		bottom: 460px;
		left: 200px;
        font-size: 40px;
    }
}

#backgroundimage {
padding-bottom: 0;
background-image: url("imgs/bg1.png");
width: 100vw;
height: 100vh; 
background-size: 100% 100%;
background-repeat: no-repeat;
position: relative;

}
@import url('https://fonts.googleapis.com/css?family=Open+Sans');

body
{
  background-color: #fcfcfc;
}
.block
{
	position: relative;
	bottom: 450px;
  margin: 0 auto;
  max-width: 900px;
  padding: 50px 30px;   
}
.input-res
{
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  font: 15px/1 'Open Sans', sans-serif;
  color: #333;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  width: 100%;
  max-width: 300px;
  background-color: #ddd;
  border: none;
  padding: 10px 11px 11px 11px;
  border-radius: 3px;
  box-shadow: none;
  outline: none;
  margin: 0;
  box-sizing: border-box; 
}
	

.btn {
  position: relative;
	bottom: 580px;
	left: 680px;
	height: 45px;	
  padding: 16px 32px;
  margin: 40px 0 0;
  background: #003366;
  max-width: 200px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  border-radius: 4px;
  border: 3px solid rgba(0,0,0,0.2);
  text-align: center;
}

.btn:hover {
  border-color: #1150EF;
  cursor: pointer;
}
@media(max-width: 768px){.btn{position: absolute; 
bottom: 265px; left: 360px;}} 



</style>
