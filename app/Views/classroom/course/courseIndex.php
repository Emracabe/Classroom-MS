<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $tableTitle; ?></h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url('Classroom/addCourse'); ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Course</span>
        </a><br /><br />

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">Course Code</th>
                        <th style="text-align: center; vertical-align: middle;">Course Description</th>
                        <th style="text-align: center; vertical-align: middle;">Units</th>
                        <th style="text-align: center; vertical-align: middle;">Teacher Assigned</th>
                        <th style="text-align: center; vertical-align: middle;">Schedule</th>
                        <th style="text-align: center; vertical-align: middle;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($course_info as $course) {
                            echo "<tr>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$course->CourseCode."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$course->CourseDesc."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$course->Units."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$course->TeacherAssigned."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$course->Schedule."</td>";
                                echo "
                                    <td style='text-align: center;''>
                                        <a class='btn btn-warning mb-2' href='".base_url()."/classroom/editCourse/".$course->CourseCode."'>
                                            <i class='fas fa-pen'></i> Edit
                                        </a>
                                        <a class='btn btn-danger' href='".base_url()."/classroom/deleteCourse/".$course->CourseCode."'>
                                             <i class='fas fa-trash'></i> Delete
                                         </a>
                                     </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>