<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ADD COURSE</h6>
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

        <?= form_open('classroom/addCourse'); ?>
            
            <div class="form-group row">
                <div class="col-sm-12 mb-6 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="txtCC" name="txtCC" placeholder="Course Code" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-user" id="txtCD" name="txtCD" placeholder="Description" />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="txtU" name="txtU" placeholder="Units" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtTA" name="txtTA" placeholder="Teacher Assigned">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="txtS" name="txtS" placeholder="Schedule" />
                </div>
            </div>

            <button class="btn btn-primary btn-block">
                <i class="fas fa-plus"></i> Add Course
            </button>
        </form>
        
    </div>
</div>