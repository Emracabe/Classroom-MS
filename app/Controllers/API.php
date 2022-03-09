<?php

namespace App\Controllers;

use App\Models\Classroom_model;

class API extends BaseController
{
    public function __construct()
    {
        $this->ClassModel = new Classroom_model();
    }

    // STUDENT API ENDPOINT
    public function student()
    {
        $method = $this->request->getMethod();

        // STUDENT GET METHOD
        if ($method == 'get') {
            $student_info = $this->ClassModel->getStudentInfo();

            $respData = [
                'meta' => array(
                    'code' => 200,
                    'message' => 'Get Student Record'
                ),
                'data' => array('student_info' => $student_info,),
            ];
        }
        // END OF STUDENT GET METHOD


        // STUDENT POST METHOD
        else if ($method == 'post') {
            $postData = $this->request->getPost();

            if ($postData) {
                if (
                    isset($postData['SN']) && isset($postData['FN']) &&
                    isset($postData['MN']) && isset($postData['LN']) &&
                    isset($postData['Sex']) && isset($postData['DOB']) &&
                    isset($postData['Adr']) && isset($postData['CN'])
                ) {

                    try {
                        $SN = $postData['SN'];
                        $FN = $postData['FN'];
                        $MN = $postData['MN'];
                        $LN = $postData['LN'];
                        $Sex = $postData['Sex'];
                        $DOB = $postData['DOB'];
                        $Adr = $postData['Adr'];
                        $CN = $postData['CN'];

                        if (!$SN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Student Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$FN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "First Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$MN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Middle Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$LN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Last Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (trim($Sex) == " ") {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Sex is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$DOB) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Date of Birth is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$Adr) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Address is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$CN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Contact Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        $postData = array(
                            'StudentNo' => $SN,
                            'FirstName' => $FN,
                            'MiddleName' => $MN,
                            'LastName' => $LN,
                            'isMale' => $Sex,
                            'DateOfBirth' => $DOB,
                            'Address' => $Adr,
                            'ContactNo' => $CN,
                        );

                        $result = $this->ClassModel->insertStudentRecord($postData);

                        if ($result == 1) {
                            $respData = [
                                'meta' => array(
                                    'code' => 200,
                                    'message' => 'Student Record Successfully Inserted!'
                                ),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array(
                                    'code' => 500,
                                    'message' => $result
                                ),
                                'data' => '',
                            ];
                        }
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array(
                            'code' => 301,
                            'message' => "Bad Request. Student Number, First Name, Middle Name, Last Name, Sex, Date of Birth, Address and Contact Number is required!",
                        ),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array(
                        'code' => 301,
                        'message' => 'Bad request. DATA is required!',
                    ),
                ];
            }
        }
        // END OF STUDENT POST METHOD


        // STUDENT PUT METHOD
        else if ($method == 'put') {
            $postData = $this->request->getRawInput();

            if ($postData) {
                if (
                    isset($postData['SN']) && isset($postData['FN']) &&
                    isset($postData['MN']) && isset($postData['LN']) &&
                    isset($postData['Sex']) && isset($postData['DOB'])
                ) {

                    try {
                        $SN = $postData['SN'];
                        $FN = $postData['FN'];
                        $MN = $postData['MN'];
                        $LN = $postData['LN'];
                        $Sex = $postData['Sex'];
                        $DOB = $postData['DOB'];
                        $Adr = $postData['Adr'];
                        $CN = $postData['CN'];

                        if (!$SN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Student Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$FN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "First Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$MN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Middle Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$LN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Last Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (trim($Sex) == " ") {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Sex is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$DOB) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Date of Birth is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$Adr) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Address is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$CN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Contact Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        $postData = array(
                            'FirstName' => $FN,
                            'MiddleName' => $MN,
                            'LastName' => $LN,
                            'isMale' => $Sex,
                            'DateOfBirth' => $DOB,
                            'Address' => $Adr,
                            'ContactNo' => $CN,
                        );

                        $result = $this->ClassModel->updateStudentRecord($postData, $SN);

                        if ($result == 1) {
                            $respData = [
                                'meta' => array(
                                    'code' => 200,
                                    'message' => 'Student Record Successfully Updated!'
                                ),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array(
                                    'code' => 500,
                                    'message' => $result
                                ),
                                'data' => '',
                            ];
                        }
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array(
                            'code' => 301,
                            'message' => "Bad Request. Student No., First Name, Middle Name, Last Name, Sex, Date of Birth, Address and Contact Number is required!",
                        ),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array(
                        'code' => 301,
                        'message' => 'Bad request. DATA is required!',
                    ),
                ];
            }
        }
        // END OF STUDENT PUT METHOD


        // STUDENT DELETE METHOD
        else if ($method == 'delete') {
            $postData = $this->request->getRawInput();

            if ($postData) {
                if (isset($postData['SN'])) {

                    try {
                        $SN = $postData['SN'];

                        if (!$SN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Student Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        $result = $this->ClassModel->deleteStudentRecord($postData, $SN);

                        if ($result == 1) {
                            $respData = [
                                'meta' => array(
                                    'code' => 200,
                                    'message' => 'Student Record Successfully Deleted!'
                                ),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array(
                                    'code' => 500,
                                    'message' => $result
                                ),
                                'data' => '',
                            ];
                        }
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array(
                            'code' => 301,
                            'message' => "Bad Request. Student Number is required!",
                        ),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array(
                        'code' => 301,
                        'message' => 'Bad request. DATA is required!',
                    ),
                ];
            }

            return $this->response->setJSON($respData);
        }
        // END OF STUDENT DELETE METHOD


        return $this->response->setJSON($respData);
    }
    // END OF STUDENT API ENDPOINT


    // TEACHER API ENDPOINT
    public function teacher()
    {
        $method = $this->request->getMethod();

        // TEACHER GET METHOD
        if ($method == 'get') {
            $teacher_info = $this->ClassModel->getTeacherInfo();

            $respData = [
                'meta' => array(
                    'code' => 200,
                    'message' => 'Get Teacher Record'
                ),
                'data' => array('teacher_info' => $teacher_info,),
            ];
        }
        // END OF TEACHER GET METHOD


        // TEACHER POST METHOD
        else if ($method == 'post') {
            $postData = $this->request->getPost();

            if ($postData) {
                if (
                    isset($postData['TN']) && isset($postData['FN']) &&
                    isset($postData['MN']) && isset($postData['LN']) &&
                    isset($postData['Sex']) && isset($postData['DOB']) &&
                    isset($postData['Adr']) && isset($postData['CN']) &&
                    isset($postData['CT'])
                ) {

                    try {
                        $TN = $postData['TN'];
                        $FN = $postData['FN'];
                        $MN = $postData['MN'];
                        $LN = $postData['LN'];
                        $Sex = $postData['Sex'];
                        $DOB = $postData['DOB'];
                        $Adr = $postData['Adr'];
                        $CN = $postData['CN'];
                        $CT = $postData['CT'];

                        if (!$TN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Teacher Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$FN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "First Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$MN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Middle Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$LN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Last Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (trim($Sex) == " ") {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Sex is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$DOB) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Date of Birth is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$Adr) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Address is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$CN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Contact Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$CT) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Course Teaching is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        $postData = array(
                            'TeacherNo' => $TN,
                            'FirstName' => $FN,
                            'MiddleName' => $MN,
                            'LastName' => $LN,
                            'isMale' => $Sex,
                            'DateOfBirth' => $DOB,
                            'Address' => $Adr,
                            'ContactNo' => $CN,
                            'CourseTeaching' => $CT,
                        );

                        $result = $this->ClassModel->insertTeacherRecord($postData);

                        if ($result == 1) {
                            $respData = [
                                'meta' => array(
                                    'code' => 200,
                                    'message' => 'Teacher Record Successfully Inserted!'
                                ),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array(
                                    'code' => 500,
                                    'message' => $result
                                ),
                                'data' => '',
                            ];
                        }
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array(
                            'code' => 301,
                            'message' => "Bad Request. Student Number, First Name, Middle Name, Last Name, Sex, Date of Birth, Address, Contact Number and Course Teaching is required!",
                        ),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array(
                        'code' => 301,
                        'message' => 'Bad request. DATA is required!',
                    ),
                ];
            }
        }
        // END OF TEACHER POST METHOD


        // TEACHER PUT METHOD
        else if ($method == 'put') {
            $postData = $this->request->getRawInput();

            if ($postData) {
                if (
                    isset($postData['TN']) && isset($postData['FN']) &&
                    isset($postData['MN']) && isset($postData['LN']) &&
                    isset($postData['Sex']) && isset($postData['DOB']) &&
                    isset($postData['CT'])
                ) {

                    try {
                        $TN = $postData['TN'];
                        $FN = $postData['FN'];
                        $MN = $postData['MN'];
                        $LN = $postData['LN'];
                        $Sex = $postData['Sex'];
                        $DOB = $postData['DOB'];
                        $Adr = $postData['Adr'];
                        $CN = $postData['CN'];
                        $CT = $postData['CT'];

                        if (!$TN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Teacher Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$FN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "First Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$MN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Middle Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$LN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Last Name is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (trim($Sex) == " ") {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Sex is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$DOB) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Date of Birth is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$Adr) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Address is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$CN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Contact Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$CT) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Course Teaching is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        $postData = array(
                            'FirstName' => $FN,
                            'MiddleName' => $MN,
                            'LastName' => $LN,
                            'isMale' => $Sex,
                            'DateOfBirth' => $DOB,
                            'Address' => $Adr,
                            'ContactNo' => $CN,
                            'CourseTeaching' => $CT,
                        );

                        $result = $this->ClassModel->updateTeacherRecord($postData, $TN);

                        if ($result == 1) {
                            $respData = [
                                'meta' => array(
                                    'code' => 200,
                                    'message' => 'Teacher Record Successfully Updated!'
                                ),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array(
                                    'code' => 500,
                                    'message' => $result
                                ),
                                'data' => '',
                            ];
                        }
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array(
                            'code' => 301,
                            'message' => "Bad Request. Student No., First Name, Middle Name, Last Name, Sex, Date of Birth, Address, Contact Number and Course Teaching is required!",
                        ),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array(
                        'code' => 301,
                        'message' => 'Bad request. DATA is required!',
                    ),
                ];
            }
        }
        // END OF TEACHER PUT METHOD


        // TEACHER DELETE METHOD
        else if ($method == 'delete') {
            $postData = $this->request->getRawInput();

            if ($postData) {
                if (isset($postData['TN'])) {

                    try {
                        $TN = $postData['TN'];

                        if (!$TN) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Teacher Number is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        $result = $this->ClassModel->deleteTeacherRecord($postData, $TN);

                        if ($result == 1) {
                            $respData = [
                                'meta' => array(
                                    'code' => 200,
                                    'message' => 'Teacher Record Successfully Deleted!'
                                ),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array(
                                    'code' => 500,
                                    'message' => $result
                                ),
                                'data' => '',
                            ];
                        }
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array(
                            'code' => 301,
                            'message' => "Bad Request. Teacher Number is required!",
                        ),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array(
                        'code' => 301,
                        'message' => 'Bad request. DATA is required!',
                    ),
                ];
            }

            return $this->response->setJSON($respData);
        }
        // END OF TEACHER DELETE METHOD


        return $this->response->setJSON($respData);
    }
    // END OF TEACHER API ENDPOINT


    // COURSE API ENDPOINT 
    public function course()
    {
        $method = $this->request->getMethod();

        // COURSE GET METHOD
        if ($method == 'get') {
            $course_info = $this->ClassModel->getCourseInfo();

            $respData = [
                'meta' => array(
                    'code' => 200,
                    'message' => 'Get Course Record'
                ),
                'data' => array('course_info' => $course_info,),
            ];
        }
        // END OF COURSE GET METHOD


        // COURSE POST METHOD
        else if ($method == 'post') {
            $postData = $this->request->getPost();

            if ($postData) {
                if (
                    isset($postData['CC']) && isset($postData['CD']) &&
                    isset($postData['U']) && isset($postData['TA']) &&
                    isset($postData['S'])
                ) {

                    try {
                        $CC = $postData['CC'];
                        $CD = $postData['CD'];
                        $U = $postData['U'];
                        $TA = $postData['TA'];
                        $S = $postData['S'];

                        if (!$CC) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Course Code is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$CD) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Course Description is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$U) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Units is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$TA) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Teacher Assigned is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$S) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Schedule is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        $postData = array(
                            'CourseCode' => $CC,
                            'CourseDesc' => $CD,
                            'Units' => $U,
                            'TeacherAssigned' => $TA,
                            'Schedule' => $S,
                        );

                        $result = $this->ClassModel->insertCourseRecord($postData);

                        if ($result == 1) {
                            $respData = [
                                'meta' => array(
                                    'code' => 200,
                                    'message' => 'Course Record Successfully Inserted!'
                                ),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array(
                                    'code' => 500,
                                    'message' => $result
                                ),
                                'data' => '',
                            ];
                        }
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array(
                            'code' => 301,
                            'message' => "Bad Request. Course Code, Course Description, Units, Teacher Assigned and Schedule is required!",
                        ),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array(
                        'code' => 301,
                        'message' => 'Bad request. DATA is required!',
                    ),
                ];
            }
        }
        // END OF COURSE POST METHOD


        // COURSE PUT METHOD
        else if ($method == 'put') {
            $postData = $this->request->getRawInput();

            if ($postData) {
                if (
                    isset($postData['CC']) && isset($postData['CD']) &&
                    isset($postData['U']) && isset($postData['TA']) &&
                    isset($postData['S'])
                ) {

                    try {
                        $CC = $postData['CC'];
                        $CD = $postData['CD'];
                        $U = $postData['U'];
                        $TA = $postData['TA'];
                        $S = $postData['S'];

                        if (!$CC) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Course Code is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$CD) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Course Description is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$U) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Units is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$TA) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Teacher Assigned is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        if (!$S) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Schedule is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        $postData = array(
                            'CourseDesc' => $CD,
                            'Units' => $U,
                            'TeacherAssigned' => $TA,
                            'Schedule' => $S,
                        );

                        $result = $this->ClassModel->updateCourseRecord($postData, $CC);

                        if ($result == 1) {
                            $respData = [
                                'meta' => array(
                                    'code' => 200,
                                    'message' => 'Course Record Successfully Updated!'
                                ),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array(
                                    'code' => 500,
                                    'message' => $result
                                ),
                                'data' => '',
                            ];
                        }
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array(
                            'code' => 301,
                            'message' => "Bad Request. Course Code, Course Description, Units, Teacher Assigned and Schedule is required!",
                        ),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array(
                        'code' => 301,
                        'message' => 'Bad request. DATA is required!',
                    ),
                ];
            }
        }
        // END OF COURSE PUT METHOD


        // COURSE DELETE METHOD
        else if ($method == 'delete') {
            $postData = $this->request->getRawInput();

            if ($postData) {
                if (isset($postData['CC'])) {

                    try {
                        $CC = $postData['CC'];

                        if (!$CC) {
                            $respData = [
                                'meta' => array(
                                    'code' => 412,
                                    'message' => "Course Code is required!.",
                                ),
                                'data' => '',
                            ];

                            return $this->response->setJSON($respData);
                        }

                        $result = $this->ClassModel->deleteCourseRecord($postData, $CC);

                        if ($result == 1) {
                            $respData = [
                                'meta' => array(
                                    'code' => 200,
                                    'message' => 'Course Record Successfully Deleted!'
                                ),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array(
                                    'code' => 500,
                                    'message' => $result
                                ),
                                'data' => '',
                            ];
                        }
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array(
                            'code' => 301,
                            'message' => "Bad Request. Course Code is required!",
                        ),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array(
                        'code' => 301,
                        'message' => 'Bad request. DATA is required!',
                    ),
                ];
            }

            return $this->response->setJSON($respData);
        }
        // END OF COURSE DELETE METHOD


        return $this->response->setJSON($respData);
    }
    // END OF COURSE API ENDPOINT

}
// END OF PROGRAM