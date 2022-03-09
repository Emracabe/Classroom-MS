<?php

namespace App\Controllers;
use App\Models\Classroom_model;

class Classroom extends BaseController
{
    public function __construct()
    {
        $this->ClassModel = new Classroom_model();
    }

    public function index() 
    {
        $data['Title'] = "Classroom Management System";

        echo view('template/indexHeader', $data);
        echo view('classroom/index');
        echo view('template/footer');
    }

    // ------- STUDENT OPERATIONS ------- //
    public function student() 
    {
        $data['Title'] = "CMS | Students";
        $data['student_info'] = $this->ClassModel->getStudentInfo();
        $data['tableTitle'] = "STUDENTS' RECORDS";

        echo view('template/studentHeader', $data);
        echo view('classroom/student/studentIndex');
        echo view('template/footer');
    }

    public function addStudent()
    {
        $data['Title'] = "CMS | Add Student";

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "txtSN" => [
                    "label" => "Teacher ID",
                    "rules" => "required"
                ],
                "txtFN" => [
                    "label" => "First Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "txtMN" => [
                    "label" => "Middle Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "txtLN" => [
                    "label" => "Last Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "cbSex" => [
                    "label" => "Sex",
                    "rules" => "required"
                ],
                "txtDOB" => [
                    "label" => "Date of Birth",
                    "rules" => "required"
                ],
                "txtAdr" => [
                    "label" => "Address",
                    "rules" => "required"
                ],
                "txtCN" => [
                    "label" => "Contact Number",
                    "rules" => "required"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "StudentNo" => $this->request->getVar("txtSN"),
                    "FirstName" => $this->request->getVar("txtFN"),
                    "MiddleName" => $this->request->getVar("txtMN"),
                    "LastName" => $this->request->getVar("txtLN"),
                    "isMale" => $this->request->getVar("cbSex"),
                    "DateOfBirth" => $this->request->getVar("txtDOB"),
                    "Address" => $this->request->getVar("txtAdr"),
                    "ContactNo" => $this->request->getVar("txtCN"),
                );
                $result = $this->ClassModel->insertStudentRecord($postdata);

                if ($result == 1) 
                    return redirect()->to('classroom/student');
                
            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        echo view('template/studentHeader', $data);
        echo view('classroom/student/addStudent');
        echo view('template/footer');
    }

    public function editStudent($studentNo)
    {
        $data['Title'] = "CMS | Edit Student";
        $data['student_info'] = $this->ClassModel->getStudentInfoBySN($studentNo);

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "txtSN" => [
                    "label" => "Student Number",
                    "rules" => "required"
                ],
                "txtFN" => [
                    "label" => "First Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "txtMN" => [
                    "label" => "Middle Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "txtLN" => [
                    "label" => "Last Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "cbSex" => [
                    "label" => "Sex",
                    "rules" => "required"
                ],
                "txtDOB" => [
                    "label" => "Date of Birth",
                    "rules" => "required"
                ],
                "txtAdr" => [
                    "label" => "Address",
                    "rules" => "required"
                ],
                "txtCN" => [
                    "label" => "Contact Number",
                    "rules" => "required"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "FirstName" => $this->request->getVar("txtFN"),
                    "MiddleName" => $this->request->getVar("txtMN"),
                    "LastName" => $this->request->getVar("txtLN"),
                    "isMale" => $this->request->getVar("cbSex"),
                    "DateOfBirth" => $this->request->getVar("txtDOB"),
                    "Address" => $this->request->getVar("txtAdr"),
                    "ContactNo" => $this->request->getVar("txtCN"),
                );
                $result = $this->ClassModel->updateStudentRecord($postdata, $this->request->getVar("txtSN"));

                if ($result == 1) 
                    return redirect()->to('classroom/student');
                
            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        echo view('template/studentHeader', $data);
        echo view('classroom/student/editStudent', $data);
        echo view('template/footer');
    }

    public function deleteStudent($studentNo)
    {
        $result = $this->ClassModel->deleteStudentRecord($studentNo);

        if ($result == 1)
            return redirect()->to('classroom/student');
    }
    // ------- END OF STUDENT OPERATIONS ------- //


    // ------- TEACHER OPERATIONS ------- //
    public function teacher() 
    {
        $data['Title'] = "CMS | Teachers";
        $data['teacher_info'] = $this->ClassModel->getTeacherInfo();
        $data['tableTitle'] = "TEACHERS' RECORDS";

        echo view('template/teacherHeader', $data);
        echo view('classroom/teacher/teacherIndex');
        echo view('template/footer');
    }

    public function addTeacher()
    {
        $data['Title'] = "CMS | Add Teacher";

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "txtTN" => [
                    "label" => "Teacher ID",
                    "rules" => "required"
                ],
                "txtFN" => [
                    "label" => "First Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "txtMN" => [
                    "label" => "Middle Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "txtLN" => [
                    "label" => "Last Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "cbSex" => [
                    "label" => "Sex",
                    "rules" => "required"
                ],
                "txtDOB" => [
                    "label" => "Date of Birth",
                    "rules" => "required"
                ],
                "txtAdr" => [
                    "label" => "Address",
                    "rules" => "required"
                ],
                "txtCN" => [
                    "label" => "Contact Number",
                    "rules" => "required"
                ],
                "txtCT" => [
                    "label" => "Course Teaching",
                    "rules" => "required"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "TeacherNo" => $this->request->getVar("txtTN"),
                    "FirstName" => $this->request->getVar("txtFN"),
                    "MiddleName" => $this->request->getVar("txtMN"),
                    "LastName" => $this->request->getVar("txtLN"),
                    "isMale" => $this->request->getVar("cbSex"),
                    "DateOfBirth" => $this->request->getVar("txtDOB"),
                    "Address" => $this->request->getVar("txtAdr"),
                    "ContactNo" => $this->request->getVar("txtCN"),
                    "CourseTeaching" => $this->request->getVar("txtCT"),
                );
                $result = $this->ClassModel->insertTeacherRecord($postdata);

                if ($result == 1) 
                    return redirect()->to('classroom/teacher');
                
            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        echo view('template/teacherHeader', $data);
        echo view('classroom/teacher/addTeacher');
        echo view('template/footer');
    }

    public function editTeacher($teacherNo)
    {
        $data['Title'] = "CMS | Edit Teacher";
        $data['teacher_info'] = $this->ClassModel->getTeacherInfoByTN($teacherNo);

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "txtTN" => [
                    "label" => "Teacher ID",
                    "rules" => "required"
                ],
                "txtFN" => [
                    "label" => "First Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "txtMN" => [
                    "label" => "Middle Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "txtLN" => [
                    "label" => "Last Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
                "cbSex" => [
                    "label" => "Sex",
                    "rules" => "required"
                ],
                "txtDOB" => [
                    "label" => "Date of Birth",
                    "rules" => "required"
                ],
                "txtAdr" => [
                    "label" => "Address",
                    "rules" => "required"
                ],
                "txtCN" => [
                    "label" => "Contact Number",
                    "rules" => "required"
                ],
                "txtCT" => [
                    "label" => "Course Teaching",
                    "rules" => "required"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "FirstName" => $this->request->getVar("txtFN"),
                    "MiddleName" => $this->request->getVar("txtMN"),
                    "LastName" => $this->request->getVar("txtLN"),
                    "isMale" => $this->request->getVar("cbSex"),
                    "DateOfBirth" => $this->request->getVar("txtDOB"),
                    "Address" => $this->request->getVar("txtAdr"),
                    "ContactNo" => $this->request->getVar("txtCN"),
                    "CourseTeaching" => $this->request->getVar("txtCT"),
                );
                $result = $this->ClassModel->updateTeacherRecord($postdata, $this->request->getVar("txtTN"));

                if ($result == 1) 
                    return redirect()->to('classroom/teacher');
                
            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        echo view('template/teacherHeader', $data);
        echo view('classroom/teacher/editTeacher', $data);
        echo view('template/footer');
    }
    
    public function deleteTeacher($teacherNo)
    {
        $result = $this->ClassModel->deleteTeacherRecord($teacherNo);

        if ($result == 1)
            return redirect()->to('classroom/teacher');
    }
    // ------ END OF TEACHER OPERATION ------ //


    // ------- COURSE OPERATIONS ------- //
    public function course() 
    {
        $data['Title'] = "CMS | Course";
        $data['course_info'] = $this->ClassModel->getCourseInfo();
        $data['tableTitle'] = "COURSES' RECORDS";

        echo view('template/courseHeader', $data);
        echo view('classroom/course/courseIndex');
        echo view('template/footer');
    }

    public function addCourse()
    {
        $data['Title'] = "CMS | Add Course";

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "txtCC" => [
                    "label" => "Course Code",
                    "rules" => "required"
                ],
                "txtCD" => [
                    "label" => "Course Description",
                    "rules" => "required|min_length[3]|max_length[30]"
                ],
                "txtU" => [
                    "label" => "Units",
                    "rules" => "required"
                ],
                "txtTA" => [
                    "label" => "Teacher Assigned",
                    "rules" => "required|min_length[3]|max_length[30]"
                ],
                "txtS" => [
                    "label" => "Schedule",
                    "rules" => "required"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "CourseCode" => $this->request->getVar("txtCC"),
                    "CourseDesc" => $this->request->getVar("txtCD"),
                    "Units" => $this->request->getVar("txtU"),
                    "TeacherAssigned" => $this->request->getVar("txtTA"),
                    "Schedule" => $this->request->getVar("txtS"),
                );
                $result = $this->ClassModel->insertCourseRecord($postdata);

                if ($result == 1) 
                    return redirect()->to('classroom/course');
                
            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        echo view('template/courseHeader', $data);
        echo view('classroom/course/addCourse');
        echo view('template/footer');
    }

    public function editCourse($courseCode)
    {
        $data['Title'] = "CMS | Edit Course";
        $data['course_info'] = $this->ClassModel->getCourseInfoByCC($courseCode);

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "txtCC" => [
                    "label" => "Course Code",
                    "rules" => "required"
                ],
                "txtCD" => [
                    "label" => "Course Description",
                    "rules" => "required|min_length[3]|max_length[30]"
                ],
                "txtU" => [
                    "label" => "Units",
                    "rules" => "required"
                ],
                "txtTA" => [
                    "label" => "Teacher Assigned",
                    "rules" => "required|min_length[3]|max_length[30]"
                ],
                "txtS" => [
                    "label" => "Schedule",
                    "rules" => "required"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "CourseDesc" => $this->request->getVar("txtCD"),
                    "Units" => $this->request->getVar("txtU"),
                    "TeacherAssigned" => $this->request->getVar("txtTA"),
                    "Schedule" => $this->request->getVar("txtS"),
                );
                $result = $this->ClassModel->updateCourseRecord($postdata, $this->request->getVar("txtCC"));

                if ($result == 1) 
                    return redirect()->to('classroom/course');
                
            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        echo view('template/courseHeader', $data);
        echo view('classroom/course/editCourse', $data);
        echo view('template/footer');
    }

    public function deleteCourse($courseCode)
    {
        $result = $this->ClassModel->deleteCourseRecord($courseCode);

        if ($result == 1)
            return redirect()->to('classroom/course');
    }
    // ----- END OF COURSE OPERATIONS ------ //
}
// END OF PROGRAM