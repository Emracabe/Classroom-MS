<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">EDIT STUDENT</h6>
    </div>

    <div class="card-body">
        <a href="<?= base_url('classroom/student'); ?>" class="btn btn-warning btn-icon-split">
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

        <?= form_open('classroom/editStudent/'.$student_info->StudentNo); ?>
            
            <div class="form-group row">
                <div class="col-sm-12 mb-6 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtSN" name="txtSN" value="<?= $student_info->StudentNo; ?>" placeholder="Student ID"  readonly/>
                </div>
            </div>

            <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtFN" name="txtFN" value="<?= $student_info->FirstName; ?>" placeholder="First Name" required />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="txtMN" name="txtMN"  value="<?= $student_info->MiddleName; ?>" placeholder="Middle Name" required />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="txtLN" name="txtLN"  value="<?= $student_info->LastName; ?>" placeholder="Last Name" required />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <select class="form-control form-control-user" id="cbSex" name="cbSex" placeholder="">
                        <option value="" selected disabled>Select Sex</option>
                        <option value="1" <?= ($student_info->isMale ? 'selected' : ''); ?>>Male</option>
                        <option value="0" <?= (!$student_info->isMale ? 'selected' : ''); ?>>Female</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="date" class="form-control form-control-user" id="txtDOB" name="txtDOB"  value="<?= $student_info->DateOfBirth; ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtAdr" name="txtAdr" value="<?= $student_info->Address; ?>" placeholder="Address">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtCN" name="txtCN"  value="<?= $student_info->ContactNo; ?>" placeholder="Contact Number" />
                </div>
            </div>

            <button class="btn btn-warning btn-block">
                <i class="fas fa-plus"></i> Edit Student
            </button>
        </form>
        
    </div>
</div>