use `details_db`;
create table students(student_usn VARCHAR(255) PRIMARY KEY, student_name VARCHAR(255), student_email VARCHAR(255), student_class VARCHAR(255));
create table marks(mark_id integer, student_usn VARCHAR(255) PRIMARY KEY, course_code VARCHAR(255), exam_type VARCHAR(255), mark integer);
create table subjects(course_code VARCHAR(255) PRIMARY KEY, title VARCHAR(255));
create table faculty(faculty_code VARCHAR(255) PRIMARY KEY, faculty_name VARCHAR(255), faculty_email VARCHAR(255));
create table classes(class VARCHAR(255), class_name VARCHAR(255));
create table subject_faculty(course_code VARCHAR(255), faculty_code VARCHAR(255), class VARCHAR(255));