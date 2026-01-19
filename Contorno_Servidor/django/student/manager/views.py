from django.shortcuts import render, get_object_or_404, redirect
from .forms import StudentForm
from .models import Student
from django.views.generic.edit import UpdateView, DeleteView

# Create your views here.
class EditStudent(UpdateView):
    template_name = "manager/editStudent.html"
    model = Student
    form_class = StudentForm
    success_url = "/home"

class DeleteStudent(DeleteView):
    template_name = "manager/deleteStudent.html"
    model = Student
    success_url = "/home"

def addStudent(request):
    if (request.method == "POST"):
        student = StudentForm(request.POST)
        if student.is_valid():
            student.save()
            return redirect("/home/")
    form = StudentForm()
    return render(request, "manager/addStudent.html", {"form": form})

def home(request):
    students = Student.objects.all()
    return render(request, "manager/home.html", {"students":students})
    
def student(request, student_id):
    student = get_object_or_404(Student, pk=student_id)
    return render(request, "manager/student.html", {"student":student}) 
