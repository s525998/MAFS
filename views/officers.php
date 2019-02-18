<?php
include('Templates/header2.html'); 
?>

  <!-- Carousel -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="../public/images/faculty.jpg" alt="Image"  >
                    <div class="carousel-caption">
                        <h3 style="text-shadow: gray"><strong>Faculty and Students</strong> </h3>
                    </div>
                </div>
    
                <div class="item">
                    <img src="../public/images/TeamWork.jpg" alt="Image" >
                    <div class="carousel-caption">
                        <h3><strong>Success and Opportunity</strong> </h3>
                    </div>
                </div>
    
                <div class="item">
                    <img src="../public/images/education.jpg" alt="Image" >
                    <div class="carousel-caption">
                        <h3> <strong>Education and Wisdom</strong> </h3>
                      
                    </div>
                </div>
            </div>
    

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- The Content Area -->
    <!-- Officers List -->
    <div class="container">
        <div class="container content">
            <div class="ff8300 officer" ><h2>MAFS Executive Board</h2></div> 
            <!-- ROW 1 -->
            <div class="row mediaBody">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="../public/images/user.png" alt="user">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading" style="padding-top:1em;">President</h4>
                            <div class="media">                                    
                                        <div class="media-heading">
                                                <h5 class="b891">Suzanne Kissock, Esp</h5>
                                                <p class="memberText">Missouri Western State University</p>
                                                <p class="memberText">4525 Downs Dr</p>
                                                <p class="memberText">Wilson Hall 203C</p>
                                                <p class="memberText">Saint Joseph, Missouri 64507</p>
                                                <p class="memberText">Kissock@missouriwestern.edu</p>
                                
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="../public/images/user.png" alt="user">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-right" style="padding-top:1em;"> Vice President</h4>
                            <div class="media">
                                    <div class="media-right">
                                        <div class="media-heading" >
                                                <h5 class="b891">Katie Jacobs, PhD</h5>
                                                <p class="memberText">University of Central Missouri</p>
                                                <p class="memberText">P.O.Box 800</p>
                                                <p class="memberText">Lovinger 1111</p>
                                                <p class="memberText">Warrensburg, MO 64093</p>
                                                <p class="memberText">twalker@ucmo.edu</p>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Row 2-->
            <div class="row mediaBody">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="../public/images/user.png" alt="user">
                            </a>
                        </div>
                        
                        <div class="media-body">
                                <h4 class="media-heading" style="padding-top:1em;">Secretary</h4>
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="media-heading">
                                                    <h5 class="b891">William "Bill" Church, PhD</h5>
                                                    <p class="memberText">Missouri Western State University</p>
                                                    <p class="memberText">4525 Downs Dr.</p>
                                                    <p class="memberText">Eder Hall 2220</p>
                                                    <p class="memberText">Saint Joseph, Missouri 64507</p>
                                                    <p class="memberText">church@missouriwestern.edu</p>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="../public/images/user.png" alt="user">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading" style="padding-top:1em;">Member at Large</h4>
                            <div class="media">
                                        <div class="media-body">
                                            <div class="media-heading">
                                                    <h5 class="b891">Sue Myllykangas, Ph.D., CTRS</h5>
                                                    <p class="memberText">Northwest Missouri State University</p>
                                                    <p class="memberText">800 University Drive</p>
                                                    <p class="memberText">Martindale Hall 108</p>
                                                    <p class="memberText">Maryville, Missouri 64468</p>
                                                    <p class="memberText"> susanm@nwmissouri.edu</p>
                                            </div>
                                        </div>
                                    </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
      <!-- Footer -->
      <footer style="margin-top:2em; text-align:center" class="footer">
                <div class="container">
                    <span class="text-muted">Missouri Association of Faculty Senates</span>
                </div>
     </footer>
    </body>

</html>