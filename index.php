<?php 
    // Header for the index page
    include('views/Templates/header.html');

    // connecting with the database 
    include('views/admin/sql.php');

    // Getting all the element from the table named events 
    $query = "SELECT * FROM `events` ORDER BY CONVERT(Date, DateTime) ASC ";
    $result = mysqli_query($con,$query);

    $queryAnnouncement ="SELECT * FROM `announcements` WHERE `Type` = 'Announcement' ";
    $resultAnnouncement = mysqli_query($con,$queryAnnouncement);
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
                    <h3 style="color: #f5ee06;"><strong>Faculty and Students</strong> </h3>
                </div>
            </div>

            <div class="item">
                <img src="public/images/teamwork.jpg" alt="Image" >
                <div class="carousel-caption">
                    <h3 style="color: #f5ee06;"><strong>Success and Opportunity</strong> </h3>
                </div>
            </div>

            <div class="item">
                <img src="public/images/education.jpg" alt="Image" >
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
            <div class="col-md-8 card">
                <!-- Description about the MAFS -->
                <h2 class="ff8300">About the MAFS</h2>
                <div class="info">
                <p>The <b class="b891" style="font-size: 14.5px">Missouri Association of Faculty Senates</b> (MAFS) is composed of the elected senates, councils, or equivalent
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
            </div>
            <div class="col-md-4 rcorners card announcement">
                <h2 class="ff8300";>Announcements</h2>
                <?php $rowAnnouncement= mysqli_fetch_array($resultAnnouncement)?>
                    <p style="font-Size: 14px" ><?php echo $rowAnnouncement['Announcement']; ?> </p>
             
                </div>
                <!-- Upcoming events part of the index page -->
            <div class="col-md-4 rcorners card events" style = "overflow-y:auto">
                    <h2 class="ff8300"> Upcoming Events</h2>
                    <?php  while ($row = mysqli_fetch_array($result)): ?>
                        <div id="<?php echo $row['EventName']?>"> <p style="float:right; font-size:15px">Date:
                            <?php  $date = date_create($row['Date']);
                                echo date_format($date, "M d, Y"); ?> </p> <br>
                                <span style="font-Size:18px">Events :  <?php echo $row['EventName'];?> </span> <br>
                            <p  class="eventDetail"style="font-Size: 13px" > <?php echo $row['EventDetails']; ?> </p>
                            <hr style ="border: .5px solid">
                         </div> 
                    <?php endwhile;?>
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