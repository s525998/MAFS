<?php
include('Templates/header2.html'); 
?>

    <!-- Form -->
    <div class="container content">
        <div class="row">
            <div class="col-md-8 card">
                <h2 class="ff8300">Submit your report here</h2>
                <hr>
                <form>
                    <div class="form-group">
                        <label class="b891" for="exampleFormControlSelect1">Select University</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Northwest Missouri State University</option>
                            <option>Midwestern Missouri State University</option>
                            <option>Western Missouri State University</option>
                            <option>Harris Stowe State University</option>
                            <option>Truman State University</option>
                        </select>
                        <br>

                        <label class="b891" for="exampleFormControlSelect1">Select term</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Fall 2018</option>
                            <option>Summer 2018</option>
                            <option>Spring 2018</option>
                        </select>
                        <br>
                        <label class="b891" for="exampleFormControlFile1">Upload your report here</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        <br>
                        <label class="b891" for="exampleFormControlTextarea1">Notes</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            <!-- <div class="col-md-4 rcorners card">
                
            </div>
            <div class="col-md-4 rcorners card">
                
            </div> -->
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