

<div id="app" class="container">  
<ul class="page">
<li class="page__btn"><span class="material-icons">chevron_left</span></li>
<?php 
  for($numpage = 1; $numpage<=$totalpage; $numpage++){
   echo' <li class="page__numbers"><a class="boiden" href="../view/shop.php?item_inpage='.$item_in_page.'&page='.$numpage.'">'.$numpage.'</a></li>';
  }
?>
    <li class="page__dots">...</li>
    <li class="page__numbers"> 10</li>
    <li class="page__btn"><span class="material-icons">chevron_right</span></li>
  </ul>
</div>