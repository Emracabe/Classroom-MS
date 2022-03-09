<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $tableTitle; ?></h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url('Classroom/addTeacher'); ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Teacher</span>
        </a><br /><br />

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">Teacher ID</th>
                        <th style="text-align: center; vertical-align: middle;">First Name</th>
                        <th style="text-align: center; vertical-align: middle;">Middle Name</th>
                        <th style="text-align: center; vertical-align: middle;">Last Name</th>
                        <th style="text-align: center; vertical-align: middle;">Sex</th>
                        <th style="text-align: center; vertical-align: middle;">Date of Birth</th>
                        <th style="text-align: center; vertical-align: middle;">Address</th>
                        <th style="text-align: center; vertical-align: middle;">Contact Number</th>
                        <th style="text-align: center; vertical-align: middle;">Course Teaching</th>
                        <th style="text-align: center; vertical-align: middle;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($teacher_info as $teacher) {
                            echo "<tr>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$teacher->TeacherNo."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$teacher->FirstName."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$teacher->MiddleName."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$teacher->LastName."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".($teacher->isMale == 1 ? "Male" : "Female")."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$teacher->DateOfBirth."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$teacher->Address."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$teacher->ContactNo."</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>".$teacher->CourseTeaching."</td>";
                                echo "
                                    <td style='text-align: center;''>
                                        <a class='btn btn-warning mb-2' href='".base_url()."/classroom/editTeacher/".$teacher->TeacherNo."'>
                                            <i class='fas fa-pen'></i> Edit
                                        </a>
                                        <a class='btn btn-danger' href='".base_url()."/classroom/deleteTeacher/".$teacher->TeacherNo."'>
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