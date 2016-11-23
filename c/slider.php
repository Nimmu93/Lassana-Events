
<head>
    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    
    

<style>
.mySlides {display:none;}

</style>
<body>



<div >
  <img class="mySlides" src="../assets/img/website/slider/dummy1.jpg" style="width:100%">
  <img class="mySlides" src="../assets/img/website/slider/dummy2.jpg" style="width:100%">
  <img class="mySlides" src="../assets/img/website/slider/dummy3.jpg" style="width:100%">
  <img class="mySlides" src="../assets/img/website/slider/dummy5.jpg" style="width:100%">
  
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2500); // Change image every 2 seconds
}
</script>

</body>
</html>
