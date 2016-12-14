<!-- POSTS START -->
<!-- Using the include variable on each post individually is not a horrible idea -->

    <!-- Copy and paste to make multiple pages if needed -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    All Posts   
                    <small></small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#">Title here</a> <!-- Also links to post.index -->
                </h2>
                <p class="lead">
                    by <a href="index.php">Adam Jensen</a> <!-- Links to account page -->
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <!-- Insert any images here if required -->
                <p>text text text text text text text text text text text text text text text text text text text
                text text text text text text text text text text text text text text text text text text text text 
                text text text text text text text text text text text text text text text</p>
                <!--<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>-->

                <hr>
                <!-- Comment form ahoy -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
                <!-- Comments! -->
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading"><?php
                        //Echo username from database. //
                        ?>
                            <small>Rick Harrison<?php
                            //Echo posted date from database, not getdate. //
                            ?></small>
                        </h4>
                        Text Text Text Text Text Text Text Text Text Text Text Text Text 
                        Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text.
                    </div>
                </div>
<!-- POSTS END -->  