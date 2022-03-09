<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">EDIT TEACHER</h6>
    </div>

    <div class="card-body">
        <a href="<?= base_url('classroom/teacher'); ?>" class="btn btn-warning btn-icon-split">
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

        <?= form_open('classroom/editTeacher/'.$teacher_info->TeacherNo); ?>
            
            <div class="form-group row">
                <div class="col-sm-12 mb-6 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtTN" name="txtTN" value="<?= $teacher_info->TeacherNo; ?>" placeholder="Teacher ID"  readonly/>
                </div>
            </div>

            <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtFN" name="txtFN" value="<?= $teacher_info->FirstName; ?>" placeholder="First Name" required />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="txtMN" name="txtMN"  value="<?= $teacher_info->MiddleName; ?>" placeholder="Middle Name" required />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="txtLN" name="txtLN"  value="<?= $teacher_info->LastName; ?>" placeholder="Last Name" required />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <select class="form-control form-control-user" id="cbSex" name="cbSex" placeholder="">
                        <option value="" selected disabled>Select Sex</option>
                        <option value="1" <?= ($teacher_info->isMale ? 'selected' : ''); ?>>Male</option>
                        <option value="0" <?= (!$teacher_info->isMale ? 'selected' : ''); ?>>Female</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="date" class="form-control form-control-user" id="txtDOB" name="txtDOB"  value="<?= $teacher_info->DateOfBirth; ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtAdr" name="txtAdr" value="<?= $teacher_info->Address; ?>" placeholder="Address" required />
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtCN" name="txtCN"  value="<?= $teacher_info->ContactNo; ?>" placeholder="Contact Number" required />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 mb-6 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtCT" name="txtCT" value="<?= $teacher_info->CourseTeaching; ?>" placeholder="Course Teaching" required />
                </div>
            </div>

            <button class="btn btn-warning btn-block">
                <i class="fas fa-plus"></i> Edit teacher
            </button>
        </form>
        
    </div>
</div>