<?php
    // including header from Templates Folder
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
                    <h3 style="color: #f5ee06;"><strong>Faculty and Students</strong> </h3>
                </div>
            </div>

            <div class="item">
                <img src="../public/images/teamwork.jpg" alt="Image" >
                <div class="carousel-caption">
                    <h3 style="color: #f5ee06;"><strong>Success and Opportunity</strong> </h3>
                </div>
            </div>

            <div class="item">
                <img src="../public/images/education.jpg" alt="Image" >
                <div class="carousel-caption">
                    <h3 style="color: #f5ee06;"> <strong>Education and Wisdom</strong> </h3>
                  
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
    <div class="container content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 card">
                <!-- Description about the MAFS -->
                <h2 class="ff8300" style="text-align: center">Why it's beneficial to join? </h2>
                <div class="info">
                <p>The Membership in MAFS provides Faculty Senate respresentatives 
                opportunities to visit one-on-one with Missouri Legislators, Liaisons, and Representatives of Higher Education
                 across the Senate. It offers attendees a glimpse into current and upcoming legislation affecting higher education.
                  The netwroking opportunities with other institutions of higher education offers Faculty Senates a means to 
                  collaborates and support the shared governance work that is being done across campuses.</p>
                <p> The 2019-2020 Missouri Association of Faculty Senate Membership dues are being collected now. Each institution
                     is allowed to have two voting member per membership. A third member is welcome, non-voting, to attend. 
                     Use the attached invoice to submit your dues today.</p>
                <p> Membership in MAFS allows access to Members only information which includes: a discussion board, polling and questions
                    resources, and a report submission function that assures your institution's Senate voice is heard by leaders in State 
                    government advocating for higher education.
                </p>
            </div>
        </div>
    </div>
