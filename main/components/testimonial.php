<?php

$userFeedbackQuery = " select 
        concat(u.firstname, ' ' , u.lastname) as 'Name', 
        f.subject, 
        f.content, 
        f.rating 
    from feedbacks f
        inner join users u on f.userId = u.id 
        where rating in (4, 5) limit 10";

$userFeedback = $conn->prepare($userFeedbackQuery);
$userFeedback->execute();

foreach($userFeedback as $feedback):
    // print_r($feedback);

?>

<!-- Single Testimonial Slide -->
<div class="single-testimonial-slide">
    <h3><?php echo $feedback[1] ?></h3>
    <h5>“<?php echo $feedback[2] ?>”
    </h5>
    <div class="rating-title">
        <div class="rating">
            <?php  
                $i=0;
                while($i<(int)$feedback[3]){
                    echo '<i class="icon_star"></i>';
                    $i++;
                }
        
            ?>
        </div>
        <h6><?php echo $feedback[0] ?></h6>
    </div>
</div>

            <?php endforeach; ?>
