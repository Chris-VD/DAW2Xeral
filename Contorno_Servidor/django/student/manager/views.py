from django.shortcuts import render, get_object_or_404
from .forms import StudentForm
from .models import Student

# Create your views here.
def addStudent(request):
    if (request.method == "POST"):
        student = StudentForm(request.POST)
        if student.is_valid():
            student.save()
            return render(request, "manager/succ.html")
    form = StudentForm()
    return render(request, "manager/addStudent.html", {"form": form})

def home(request):
    students = Student.objects.all()
    return render(request, "manager/home.html", {"students":students})
    
def student(request, student_id):
    student = get_object_or_404(Student, pk=student_id)
    return render(request, "manager/student.html", {"student":student}) 
