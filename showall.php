<?php include("topbit.php"); 

    $find_sql = "SELECT * FROM `game_details`
    JOIN developer ON (`developer`.`ID` = `game_details`.`DeveloperID`)
    JOIN genre ON  (`genre`.`GenreID` = `game_details`.`GenreID`)
    ";
    $find_query = mysqli_query($dbconnect, $find_sql); 
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
            <h2>All results</h2>
            
            <?php

            if($count < 1) {

                ?>

            <div class="error">

                Sorry! There are no results that match your search. Please use the search box in the side bar to try again.

            </div> <!-- end error -->

            <?php
            } // end no results if

            else {
                do
                {

                    ?>

            <!-- Results go here -->
            <div class="results">
                <span class="sub_heading">
                    <a href="<?php echo $find_rs['URL']; ?>">
                        <?php echo $find_rs['Name']; ?>
                    </a>
                </span> - <?php echo $find_rs['Subtitle'] ?>

            <p>
                <b>Genre</b>:
                <?php echo $find_rs['Genre'] ?>

                <br />

                <b>Developer</b>:
                <?php echo $find_rs['DevName'] ?>

                <br />
                <b>Rating</b>: <?php echo $find_rs['User Rating'] ?> (based on <?php echo $find_rs['Rating Count'] ?> votes)
            </p>
            <hr />
            <?php echo $find_rs['Description'] ?>

            </div> <!-- / results -->

            <br />

            <?php

                } // end results 'do'

                while
                    ($find_rs=mysqli_fetch_assoc($find_query));

            } // end else

            ?>

            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>