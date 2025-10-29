class Person:
    def __init__(self, id, name, age):
        self.id = id
        self.name = name
        self.age = age
    
    def __str__(self):
        return f"{self.id}, {self.name}, {self.age}"

class Student:
    def __init__(self, id, name, age, degree):
        self.degree = degree
        self.person = Person(id, name, age)

    def __str__(self):
        return f"{self.person.__str__()}, {self.degree}"
    
class StudentGroup:
    def __init__(self, id, group_name):
        self.id = id
        self.group_name = group_name
        self.students = []
    
    def __str__(self):
        stri = f"Group name: {self.group_name}\nID: {self.id}"
        for student in self.students:
            stri += str(student.__str__())
        return stri

    def remove(self, index):
        self.students.pop(index)
    
    def add(self, student):
        if (type(student) != Student):
            raise Exception("Not an student")
        self.students.append(student)
    
stu1 = Student(0, "Erm", 10, None)
print(stu1)
stu2 = Student(1, "Ermm", 11, None)
print(stu2)
stu3 = Student(2, "Errm", 12, None)
print(stu3)

group = StudentGroup(0, "Group")
group.add(stu1)
group.add(stu2)
group.add(stu3)
print(group)

group.remove(1)
print(group)

group.add(Student(3, "Eerm", 13, None))
print(group)