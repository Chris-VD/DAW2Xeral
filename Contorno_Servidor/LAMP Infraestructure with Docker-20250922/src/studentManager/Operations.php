<?php require_once "./Student.php";
    class Operations{
        private $conn;
        public function openConnection(){
            $this->conn = include "./MySQLConnect.php";
        }
        public function closeconnection(){
            $this->conn = null;
        }
        public function addStudent(Student $student): bool{
            $sqlString = "insert into student(dni, name, surname, age) values (?, ?, ?, ?)";
            $querry = $this->conn->prepare($sqlString);
            return $querry->execute([$student->getDni(), $student->getName(), $student->getSurname(), (int)$student->getAge()]);
        }
        public function getStudent(string $dni): Student{
            $sqlString = "select * from student where dni=?";
            $querry = $this->conn->prepare($sqlString);
            $querry->execute([$dni]);
            $student = $querry->fetchObject(Student::class);
            if (!($student instanceof Student)) return new Student();
            return $student;
        }
        public function deleteStudent(string $dni): bool{
            $sqlString = "delete from student where dni=?";
            $querry = $this->conn->prepare($sqlString);
            return $querry->execute([$dni]);
        }
        public function modifyStudent(Student $student): bool{
            if (!($this->getStudent($student->getDni()))){
                return false;
            }
            $sqlString = "update student set name=?, surname=?, age=? where dni=?";
            $querry = $this->conn->prepare($sqlString);   
            return $querry->execute([$student->getName(), $student->getSurname(), $student->getAge(), $student->getDni()]);
        }
        public function studentList() : array{
            $sqlString = "select * from student";
            $querry = $this->conn->prepare($sqlString);
            $querry->execute();
            $studentList = [];
            while ($student = $querry->fetchObject(Student::class)) $studentList[] = $student;
            return $studentList;
        }
    }
?>