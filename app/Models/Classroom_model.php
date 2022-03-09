<?php

namespace App\Models;
use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Classroom_model extends Model
{
    // ------ STUDENTS ------- //
    function getStudentInfo() {
        $builder = $this->db->table('student');
        $res = $builder->get()->getResult();
        return $res;
    }

    function insertStudentRecord($data)
    {
        $builder = $this->db->table('student');
        $res = $builder->insert($data);
        return $res;
    }

    function getStudentInfoBySN($SN)
    {
        $builder = $this->db->table('student');
        $builder->where('StudentNo', $SN);
        $res = $builder->get()->getRow();
        return $res;
    }

    function updateStudentRecord($data, $SN)
    {
        $builder = $this->db->table('student');
        $builder->set($data);
        $builder->where('StudentNo', $SN);
        $res = $builder->update();
        return $res;
    }

    function deleteStudentRecord($SN)
    {
        $builder = $this->db->table('student');
        $builder->where('StudentNo', $SN);
        $res = $builder->delete();
        return $res;
    }
    // ------ END OF STUDENTS ------- //


    // ------ TEACHERS ------ //
    function getTeacherInfo() 
    {
        $builder = $this->db->table('teacher');
        $res = $builder->get()->getResult();
        return $res;
    }

    function insertTeacherRecord($data)
    {
        $builder = $this->db->table('teacher');
        $res = $builder->insert($data);
        return $res;
    }

    function getTeacherInfoByTN($TN)
    {
        $builder = $this->db->table('teacher');
        $builder->where('TeacherNo', $TN);
        $res = $builder->get()->getRow();
        return $res;
    }

    function updateTeacherRecord($data, $TN)
    {
        $builder = $this->db->table('teacher');
        $builder->set($data);
        $builder->where('TeacherNo', $TN);
        $res = $builder->update();
        return $res;
    }

    function deleteTeacherRecord($TN)
    {
        $builder = $this->db->table('teacher');
        $builder->where('TeacherNo', $TN);
        $res = $builder->delete();
        return $res;
    }
    // ------ END OF TEACHERS ------- //


    // ------ COURSES ------- //
    function getCourseInfo() 
    {
        $builder = $this->db->table('course');
        $res = $builder->get()->getResult();
        return $res;
    }

    function getCourseInfoByCC($CC)
    {
        $builder = $this->db->table('course');
        $builder->where('CourseCode', $CC);
        $res = $builder->get()->getRow();
        return $res;
    }

    function insertCourseRecord($data)
    {
        $builder = $this->db->table('course');
        $res = $builder->insert($data);
        return $res;
    }

    function updateCourseRecord($data, $CC)
    {
        $builder = $this->db->table('course');
        $builder->set($data);
        $builder->where('CourseCode', $CC);
        $res = $builder->update();
        return $res;
    }

    function deleteCourseRecord($CC)
    {
        $builder = $this->db->table('course');
        $builder->where('CourseCode', $CC);
        $res = $builder->delete();
        return $res;
    }
    // ------ END OF COURSES ------- //
}