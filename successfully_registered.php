<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="nav.css"/>
    
    <title>Career Fair</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
     <?php include 'header.php';?>
	
	 <div id="backgroundimage"></div> 
	
	<div class="headtext">
	
	<h1>VIRTUAL CAREER FAIR APP</h1>
    <h2>successfully Registered!!</h2>
		
</div>
<?php include 'footer.php';?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="footer, address, phone, icons" />

  

    </body>

</html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
</body>
</html>
<style>*{
    margin: 0;
    padding: 0;
    color: #f2f5f7;
    font-family: sans-serif;
    letter-spacing: 1px;
    font-weight: 300;
}
#backgroundimage {
background-image: url("imgs/bg1.png");
width: 100vw;
height: 100vh; 
background-size: 100% 100%;
background-repeat: no-repeat;
position: relative;
} 	
	.top-bar {
  text-align:right;
		color: navy;
		background-color: navy;
		
}


.headtext {
	width: 90%;
	color: #fff;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	text-align: left;
	
	
	 
}

.headtext h1{
	
	font-size:4vw;
	color: #FFFFFF;
	
	
}
	.headtext h2{
	
	font-size: 2.9vw;
	color: #1A157F;
	
}

.headtext p{
	margin: 10px 0px 40px;
	font-size: 1.3vw;
	color: #09182D;
	
	
}

.demo-btn {
	
	display: inline-block;
	text-decoration: none;
	color: #fff;
	border: 2.5px solid #fff;
	padding: 12px 34px;
	font-size: 10px;
	background: transparent ;
	position: relative;
	cursor: pointer;
	border-radius: 20px;
	
}

	.profile-btn {
	display: inline-block;
	text-decoration: none;
	color: #fff;
	border: 2.5px solid #fff;
	padding: 12px 34px;
	font-size: 10px;
	background: transparent ;
	position: relative;
	cursor: pointer;
	border-radius: 20px;
	
	}


*{
    margin: 0;
    padding: 0;
    color: #000000;
    font-family: sans-serif;
    letter-spacing: 1px;
    font-weight: 300;
}
body{
    overflow-x: hidden;
}
nav{
    height: 6rem;
    width: 100vw;
    background-color: #fff;
    box-shadow: 0 3px 20px rgba(0, 0, 0, 0.2);
    display: flex;
    position: relative;
    z-index: 10;
}
	
/*Styling logo*/
.logo{
    padding:1vh 1vw;
    text-align: center;
}
.logo img {
    height: 5rem;
    width: 5rem;
}

/*Styling Links*/
.nav-links{
    display: flex;
    list-style: none; 
    width: 88vw;
    padding: 0 0.7vw;
    align-items: center;
    text-transform: uppercase;
	padding-right: 30px;
	justify-content: right;
	
}
.nav-links li a{
    text-decoration: none;
    margin: 0 0.7vw;
	text-align: right;
	color: #000;
	font-size: 12px;
	
		
}
.nav-links li a:hover {
    color: #0B0F3D;
}
.nav-links li {
    position: relative;
	padding-right: 40px;
	text-align: center;
	float: right;
}

	.nav-links li a::after{
	content: "";
	width:0%;
	height: 3px;
	background: #ffcb78;
	display: block;
	transition: 0.5s;
	position:absolute;
	margin: 0 0 0 10%;
}

.nav-links li a:hover::after{
	
	width: 55%;
}

/*Styling Buttons*/
.login-button{
    background-color: transparent;
    border: 1.5px solid #000;
    border-radius: 2em;
    padding: 0.6rem 0.8rem;
    margin-left: 2vw;
    font-size: 1.2rem;
    cursor: pointer;
	color: #000;

}
	
.login-button:hover {
    color: #131418;
    background-color: #f2f5f7;
    border:1.5px solid #f2f5f7;
    transition: all ease-in-out 350ms;
}
	

.dropdown {
  float: left;
}

/* Dropdown button */
.dropdown .dropbtn {
  color: #131418;
    background-color: white;
    border: 1.5px solid #000;
    border-radius: 2em;
    padding: 0.6rem 0.8rem;
    font-size: 1.2rem;
    font-family: inherit;
    cursor: pointer;
    margin-right:20px;
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
    color: #131418;
    background-color: #f2f5f7;
    border:1.5px solid #f2f5f7;
    transition: all ease-in-out 350ms;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none; 
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 10px 10px;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
.join-button{
    color: #131418;
    background-color: #61DAFB;
    border: 1.5px solid #000;
    border-radius: 2em;
    padding: 0.6rem 0.8rem;
    font-size: 1.2rem;
    cursor: pointer;
}
.join-button:hover {
    color: #f2f5f7;
    background-color: transparent;
    border:1.5px solid #f2f5f7;
    transition: all ease-in-out 350ms;
}

/*Styling Hamburger Icon*/
.hamburger div{
    width: 30px;
    height:3px;
    background: #000;
    margin: 5px;
    transition: all 0.3s ease;
}
.hamburger{
    display: none;
}

/*Stying for small screens*/
@media screen and (max-width:900px){
    nav{
        position: absolute;
        z-index: 3;
    }
	
    .hamburger{
        display:block;
        position: absolute;
        cursor: pointer;
        right: 5%;
        top: 50%;
        transform: translate(-5%, -50%);
        z-index: 2;
        transition: all 0.7s ease;
    }
    .nav-links{
        position: fixed;
        background: #FFFFFF;
        height: 100vh;
        width: 100%;
        flex-direction: column;
        clip-path: circle(50px at 90% -20%);
        -webkit-clip-path: circle(50px at 90% -10%);
        transition: all 1s ease-out;
        pointer-events: none;
		line-height: 30px;
		
		
    }
    .nav-links.open{
        clip-path: circle(1000px at 90% -10%);
        -webkit-clip-path: circle(1000px at 90% -10%);
        pointer-events: all;
    }
    .nav-links li{
        opacity: 0;
    }
    .nav-links li:nth-child(1){
        transition: all 0.5s ease 0.2s;
    }
    .nav-links li:nth-child(2){
        transition: all 0.5s ease 0.4s;
    }
    .nav-links li:nth-child(3){
        transition: all 0.5s ease 0.6s;
    }
    .nav-links li:nth-child(4){
        transition: all 0.5s ease 0.7s;
    }
    .nav-links li:nth-child(5){
        transition: all 0.5s ease 0.8s;
    }
    .nav-links li:nth-child(6){
        transition: all 0.5s ease 0.9s;
        margin: 0;
    }
    .nav-links li:nth-child(7){
        transition: all 0.5s ease 1s;
        margin: 0;
    }
    li.fade{
        opacity: 1;
    }
}
/*Animating Hamburger Icon on Click*/
.toggle .line1{
    transform: rotate(-45deg) translate(-5px,6px);
}
.toggle .line2{
    transition: all 0.7s ease;
    width:0;
}
.toggle .line3{
    transform: rotate(45deg) translate(-5px,-6px);
}


@
html {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
	
}

body {
  font-family: 'Open Sans', sans-serif;
  margin: 0;
  background: #fff;
  color: #999;
}

a {
  text-decoration: none;
  /* margin: 1rem 0; */
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.9rem;
  letter-spacing: 1px;
}

p {
  font-size: 1.2rem;
  margin: 1rem 0;
  line-height: 1.5;
	color: #000;
}

section {
  max-width: 1000px;
  margin: 0 auto;
  text-align: center;
  padding: 30px;
}

h3 {
  font-family: 'Montserrat', sans-serif;
  font-weight: 600;
  color: #333;
  font-size: 30px;
  margin: 1.3rem 0;
}

.section-lead {
  max-width: 600px;
  margin: 1rem auto 1.5rem;

}


.contactform {
font-family: arial;
border:1px #1A157F;
padding:5px;
-moz-border-radius: 0px;
-webkit-border-radius: 0px;
border-radius: 0px; 
background: #9B9B9B;
width:100%;
}
.contactformheader {
font-size:18px;
font-weight:bold;
padding-top:10px;
padding-bottom:10px;
text-align:center;
}
.contactformmessage {
text-align:center;
padding-bottom:10px; padding-top:10px;
}
.contactform td {
padding:0px;
font-size:12px;
}
.contactform p {
padding:4px;
}
.contactform label {
padding:4px;
color:#ffffff;
}
.contactform label {
padding-right:10px
}
.required {
font-weight:bold;
}
.required_star {
font-weight:bold;
color:#F00;
}
.not-required {
font-weight:normal
}
.antispammessage {
padding:10px;
border-top:1px solid #AAA;
border-bottom:1px solid #AAA;
font-weight:bold 
}
.antispamquestion {
font-weight:normal;
}



	</style>

<script>
const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    // Animation
    hamburger.classList.toggle("toggle");
});
	$('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 5000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", event => {
    
    // Uncomment in case you only want to allow for the display of only one collapsed item at a time!
    
    // const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
    // if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
    //   currentlyActiveAccordionItemHeader.classList.toggle("active");
    //   currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
    // }

    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    else {
      accordionItemBody.style.maxHeight = 0;
    }
    
  });
});
</script>