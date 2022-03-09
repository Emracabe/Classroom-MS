<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ADD TEACHER</h6>
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

        <?= form_open('classroom/addTeacher'); ?>
            
            <div class="form-group row">
                <div class="col-sm-12 mb-6 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtTN" name="txtTN" placeholder="Teacher ID" />
                </div>
            </div>

            <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtFN" name="txtFN" placeholder="First Name" />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="txtMN" name="txtMN" placeholder="Middle Name" />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="txtLN" name="txtLN" placeholder="Last Name" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <select class="form-control form-control-user" id="cbSex" name="cbSex" placeholder="">
                        <option value="" selected disabled>Select Sex</option>
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="date" class="form-control form-control-user" id="txtDOB" name="txtDOB" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtAdr" name="txtAdr" placeholder="Address">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtCN" name="txtCN" placeholder="Contact Number" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 mb-6 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtCT" name="txtCT" placeholder="Course Teaching" />
                </div>
            </div>

            <button class="btn btn-primary btn-block">
                <i class="fas fa-plus"></i> Add Teacher
            </button>
        </form>
        
    </div>
</div>