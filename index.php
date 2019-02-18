<?php 
    include('views/Templates/header.html');
?>
  <body>
     
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
                <img src="public/images/faculty.jpg" alt="Image"  >
                <div class="carousel-caption">
                    <h3 style="text-shadow: gray"><strong>Faculty and Students</strong> </h3>
                </div>
            </div>

            <div class="item">
                <img src="public/images/TeamWork.jpg" alt="Image" >
                <div class="carousel-caption">
                    <h3><strong>Success and Opportunity</strong> </h3>
                </div>
            </div>

            <div class="item">
                <img src="public/images/education.jpg" alt="Image" >
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
    <div class="container content">
        <div class="row">
            <div class="col-md-8 card">
                <h2 class="ff8300">About the MAFS</h2>
              
                <p class="info">The <b class="b891" style="font-size: 14.5px">Missouri Association of Faculty Senates</b> (MAFS) is composed of the elected senates, councils, or equivalent
                    groups of the public four-year colleges or universities in the state of Missouri who join. These groups
                    are designated as Associated Senates.</p>
                <p>MAFS began in February of 1993 when twelve faculty senate officers from seven different four-year public
                    colleges and universities met in Jefferson City. Participants resolved to form the Association with the
                    following purposes:</p>
                <ul>
                    <li>Strengthening the faculty component of college and university governance.</li>
                    <li>Sharing information, concern, and governance procedures.</li>
                    <li>Providing leadership training for people involved in faculty governance.</li>
                    <li>Working with government agencies for the betterment of higher education.
                    </li>
                </ul>
                <p>A constitution was ratified at the first MAFS Conference at Southwest Missouri State University in June,
                    1993.
                </p>
                <p>
                    <b class="b891">More MAFS Information</b>
                </p>
                <ul>
                    <li>MAFS maintains a central office in Jefferson City at the Coordinating Board for Higher Education offices.</li>
                    <li>MAFS hosts spring and fall conferences which bring together Associated Senates to work on issues that
                        affect governance in four-year public institutions.</li>
                    <li>MAFS collects and shares documents on governance with Associated Senates.</li>
                    <li>MAFS works through standing committees to monitor and communicate higher education concerns to Associated
                        Senates.
                    </li>
                    <li>MAFS works actively with government agencies for the betterment of higher education.</li>
                </ul>
            </div>
            <div class="col-md-4 rcorners card">
                 <h2 class="ff8300">Announcements</h2>
                 <p> <b class="b891">Spring Meeting February 11-12, 2019</b>  </p>
                 <p>We will be staying at the Capitol Plaza Hotel
                    <a id="link" href="http://www.capitolplazajeffersoncity.com/contactus.aspx">(http://www.capitolplazajeffersoncity.com/contactus.aspx)</a>. When you make your reservations please
                    mention you are part of the MAFS meeting. The room rate for this meeting is $99. Make certain to tell
                    them you are with the Missouri Association of Faculty Senates. Your rooms must be reserved by February
                    2, 2015. After reserving your room, please complete the meeting registration form at
                    <a href="http://www.mafs.org/MAFSRegForm.asp">http://www.mafs.org/MAFSRegForm.asp</a>.</p>
                </div>
            <div class="col-md-4 rcorners card">
                    <h2 class="ff8300">Events</h2>
                    <p>
                    <b class="b891">Fun Events February 11-12, 2019</b>
                </p>
                <p>More fun Events at the Capitol Plaza Hotel
                    <a id="link" href="http://www.capitolplazajeffersoncity.com/contactus.aspx">(http://www.capitolplazajeffersoncity.com/contactus.aspx)</a>. When you make your reservations please
                    mention you are part of the MAFS meeting. The room rate for this meeting is $99. Make certain to tell
                    them you are with the Missouri Association of Faculty Senates. Your rooms must be reserved by February
                    2, 2015. After reserving your room, please complete the meeting registration form at
                    <a href="http://www.mafs.org/MAFSRegForm.asp">http://www.mafs.org/MAFSRegForm.asp</a>.</p>
            </div>
                    </div>
    </div>
        <footer style="margin-top:2em; text-align:center" class="footer">
                <div class="container">
                    <span class="text-muted">Missouri Association of Faculty Senates</span>
                </div>
            </footer>
</body>

</html>