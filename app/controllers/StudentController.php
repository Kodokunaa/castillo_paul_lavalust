<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    /**
     * Student details are kept in one place so the personal academic fields
     * can be updated without touching either view.
     */
    private function student_data()
    {
        return [
            'student_id' => 'MCC2024-01582',
            'name'       => 'Paul Castillo',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => 'F6',
            'email'      => 'castillo.paulgerson@gmail.com',
            'location'   => 'Philippines',
            'skills'     => ['PHP', 'Laravel', 'Node.JS', 'Web Design', 'MySQL'],
            'hobbies'    => ['Building web projects', 'Learning new technologies', 'Creative design'],
            'bio'        => 'I am an aspiring web developer who enjoys turning ideas into clear, useful, and thoughtfully designed digital experiences.',
        ];
    }

    public function index()
    {
        $this->call->view('student/home', [
            'page_title'    => 'Paul Castillo | Student Workspace',
            'student'       => $this->student_data(),
            'access_denied' => isset($_GET['access_denied']),
        ]);
    }

    public function profile()
    {
        $this->call->view('student/profile', [
            'page_title' => 'Profile | Paul Castillo',
            'student'    => $this->student_data(),
        ]);
    }
}
