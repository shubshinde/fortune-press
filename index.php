<!-- Header -->
<?php get_header(); 

global $wp;
$current_page = home_url( $wp->request );

?>

<!-- Content -->
<div class="container col-xxl-8 px-4 mt-5">
    <div class="row flex-lg-row-reverse align-items-center g-3 py-3 card p-4">
        <div class="col-10 col-sm-8 col-lg-6">
            <a href="<?php echo $current_page; ?>?action=fortune">
                <img src="https://i.imgur.com/fijyNRz.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </a>
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3 top-card-title"><i>Online Crystal Ball !!</i></h1>
            <p class="text-muted">
                Get divine guidance for your life! <br>
                You just have to concentrate and thats all.
            </p>
        </div>
    </div>
</div>

<div class="container col-xxl-8 px-4 p-0">
    <div class="row flex-lg-row-reverse align-items-center g-3 py-3 card p-3">

        <div class="col-lg-12 p-5 text-center">

            <?php
            // Only if FortunePlug plugin is active.
            if (class_exists('FortunePlug_Class')) {

                global $wp;
                $current_page = home_url($wp->request);

                if (!empty($_GET['action']) && $_GET['action'] == 'fortune') {

                    global $wpdb;
                    // Get all fortunes present in database.
                    $table_name = $wpdb->prefix . FORTUNE_PLUG_DB_TABLE;
                    $results = $wpdb->get_results("SELECT * FROM $table_name");

                    // Store fortune id's in array.
                    $fortune_messages = array();

                    foreach ($results as $index => $fortune) {

                        $message = $fortune->fortune_message;

                        if (!in_array($message, $fortune_messages)) {
                            array_push($fortune_messages, $message);
                        }
                    }

                    // Shuffle messages for randomness & complex probability.
                    shuffle($fortune_messages);

                    //  echo '<pre>'; 
                    //    var_dump($fortune_messages); 
                    //  echo '</pre>';

                    ?>
                        <h5 class="text-muted"> The great Crystal ball has answered:</h5>
                        <h3 class="top-card-title mt-5">
                            <?php
                            if (count($fortune_messages) && $fortune_messages) {

                                echo $fortune_messages[0];
                            } else {
                                // if no fortune present in database, show default.
                                echo 'Let go of your attachment to the past, feelings of loss, or your old routine; move it into the new and unknown';
                            }
                            ?>
                        </h3>
                        <a class="btn btn-outline-dark mt-5" href="<?php echo $current_page; ?>">
                            BACK
                        </a>
                    <?php

                } else {
                    ?>
                        <!-- ASK QUESTION -->
                        <h5 class="text-muted">
                            Focus you mind on a question.
                        </h5>
                        <a href="<?php echo $current_page; ?>?action=fortune">
                            <button class="btn btn-lg btn-outline-success ask-button">
                                Ask the crystal ball
                            </button>
                        </a>
                    <?php
                }
            } else {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="text-muted">Warning! <span class="text-dark">FortunePlug</span> is not activated.</h4>
                        <p> For making crystal ball work, You need to install <b>FortunePlug</b> plugin.</p>
                    </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>


<!-- Footer -->
<?php get_footer(); ?>