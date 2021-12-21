 <!-------------------------------  vu_articleVideo  ---------------------------->
 <!-- latest_activites_area_start  -->
 <div class="latest_activites_area"  id="ancre1" >
        <div class=" video_bg_1 video_activite  d-flex align-items-center justify-content-center">
            <a class="popup-video" href="https://www.youtube.com/watch?v=DdovEinT0mo"> <!--juste changer apres le v= -->
                <i class="flaticon-ui"></i>
            </a>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="activites_info">
                        <div class="section_title">
                            <h3> <span>Admirer le ciel  </span><br>
                                Activité</h3>
                        </div>

                        <?php
                        foreach($articleRecent as $article)
                        {                    
                        ?>
                             <p class="para_1"> <?php echo $article ?> </p>
                        <?php 
                    
                        }
                        ?>

                        <p class="para_2"> Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do 
                            eiusmod tempor incididunt  ut labore dolore magna aliqua. 
                            enim minim veniam, quis nostrud exercitation. tempor 
                            incididunt  ut labore dolore magna aliqua. enim minim 
                            veniam, quis nostrud exercitation.</p>

                        <a href="#" data-scroll-nav='1' class="boxed-btn4">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest_activites_area_end  -->
