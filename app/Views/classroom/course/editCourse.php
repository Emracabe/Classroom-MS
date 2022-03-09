<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">EDIT COURSE</h6>
    </div>

    <div class="card-body">
        <a href="<?= base_url('classroom/course'); ?>" class="btn btn-warning btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Return</span>
        </a><br /><br />

        <?php
            if (isset($validation)) {
                echo '
                    <div class="alert alert-danger" role="alert">
                        <ul>
                ';
                    foreach ($validation as $validation) {
                        echo "<li>".esc($validation)."</li>";
                    }
                echo '
                        </ul>
                    </div>
                ';
            }
        ?>

        <?= form_open('classroom/editCourse/'.$course_info->CourseCode); ?>
            
        <div class="form-group row">
                <div class="col-sm-12 mb-6 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtCC" name="txtCC" value="<?= $course_info->CourseCode; ?>" placeholder="Course Code" readonly />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-user" id="txtCD" name="txtCD" value="<?= $course_info->CourseDesc; ?>" placeholder="Description" required />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="txtU" name="txtU" value="<?= $course_info->Units; ?>" placeholder="Units" required />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtTA" name="txtTA" value="<?= $course_info->TeacherAssigned; ?>" placeholder="Teacher Assigned" required >
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtS" name="txtS" value="<?= $course_info->Schedule; ?>" placeholder="Schedule" required />
                </div>
            </div>

            <button class="btn btn-warning btn-block">
                <i class="fas fa-plus"></i> Edit Course
            </button>
        </form>
        
    </div>
</div>