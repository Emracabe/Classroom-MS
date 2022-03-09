<div class="row">
    <div class="col-xl-3 col-md-6 mb-4" id="student">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a class="nav-link" href="<?= base_url('Classroom/student'); ?>">
                            <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                                Students
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    $conn = mysqli_connect("localhost", "root", "", "classroomms");

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $res = mysqli_query($conn, "SELECT * FROM student");

                                    echo $res->num_rows;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                     </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4" id="student">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a class="nav-link" href="<?= base_url('Classroom/teacher'); ?>">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                Teachers</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    $conn = mysqli_connect("localhost", "root", "", "classroomms");

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $res = mysqli_query($conn, "SELECT * FROM teacher");

                                    echo $res->num_rows;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    
    <div class="col-xl-3 col-md-6 mb-4" id="student">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <a class="nav-link" href="<?= base_url('Classroom/course'); ?>">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-info text-uppercase mb-1">
                            Courses</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">
                            <?php 
                                $conn = mysqli_connect("localhost", "root", "", "classroomms");

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $res = mysqli_query($conn, "SELECT * FROM course");

                                echo $res->num_rows;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </a>
            </div>
        </div>
    </div>
</div>