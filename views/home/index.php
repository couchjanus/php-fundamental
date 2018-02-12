<?php

require_once VIEWS.'shared/head.php';
require_once VIEWS.'shared/navigation.php';
?>
<!-- product Start -->
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="feature_header text-center">
                    <h2 class="feature_title"><?=$title;?></h2>
                    
                    <div class="divider"></div>
                </div>
            </div>  <!-- Col-md-12 End -->
            
            <div class="items">
             
              <?php foreach($posts as $post): ?>
                    
               <h2 class="sub-heading-a u-align-center"><?php echo $post['title']?></h3>
               <p class="body-a u-align-center"><?php echo $post['formated_date'];?></p>
               <p class="body-a u-align-center"><?php echo substr($post['content'], 0, 100);?>... <a href="/blog/<?php echo $post['id']; ?>">Read More</a></p>
                                   
              <?php endforeach; ?>
           
            </div>

        </div>
        
    </div> <!-- Conatiner product end -->
</section>  <!-- Section product End -->

<!-- Our product End -->
<div class="clearfix"></div>

<?php

require_once VIEWS.'shared/footer.php';
