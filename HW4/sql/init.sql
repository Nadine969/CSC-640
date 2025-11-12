CREATE DATABASE IF NOT EXISTS school_db;
USE school_db;

CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  major VARCHAR(100)
);

CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  credits INT
);

CREATE TABLE enrollments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT,
  course_id INT,
  FOREIGN KEY (student_id) REFERENCES students(id),
  FOREIGN KEY (course_id) REFERENCES courses(id)
);
