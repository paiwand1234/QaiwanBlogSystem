-- CREATE STUDENTS TABLE
CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    matrix_name VARCHAR(255),
    email VARCHAR(255),
    subject_id INT
);

-- CREATE SUBJECTS TABLE
CREATE TABLE subjects (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255),
    course_code VARCHAR(50),
    session VARCHAR(50),
    course_lecturer VARCHAR(255),
    report_date DATE
);

-- CREATE CLOs TABLE
CREATE TABLE clos (
    clo_id INT AUTO_INCREMENT PRIMARY KEY,
    clo_caption VARCHAR(255),
    clo_description TEXT,
    percentage DECIMAL(5, 2)
);

-- CREATE GRADES TABLE
CREATE TABLE grades (
    grade_id INT AUTO_INCREMENT PRIMARY KEY,
    activity_name VARCHAR(255),
    percentage DECIMAL(5, 2),
    student_id INT,
    subject_id INT,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (subject_id) REFERENCES subjects(subject_id)
);

-- CREATE CLO_DETAILS TABLE
CREATE TABLE clo_details (
    clo_detail_id INT AUTO_INCREMENT PRIMARY KEY,
    grade_id INT,
    clo_id INT,
    percentage DECIMAL(5, 2),
    FOREIGN KEY (grade_id) REFERENCES grades(grade_id),
    FOREIGN KEY (clo_id) REFERENCES clos(clo_id)
);
