from django.shortcuts import render, redirect, get_object_or_404
from django.contrib.auth.forms import UserCreationForm, AuthenticationForm
from django.contrib.auth.models import User
from django.contrib.auth import login as lin
from django.contrib.auth import logout as lout
from django.contrib.auth import authenticate
from django.db import IntegrityError
from django.contrib.auth.decorators import login_required
from .models import Project
from .forms import ProjForm


# Create your views here.
def home(request):
    return render(request, "proj/home.html")

def signup(request):
    if (request.method == "GET"):
        return render(request, "auth/signup.html", {"form": UserCreationForm()})
    if (request.POST["password1"] != request.POST["password2"]):
        return render(request, "auth/signup.html", {"form": UserCreationForm(), "error": "Passwords did not match!"})
    try:
        user = User.objects.create_user(request.POST["username"], password=request.POST["password1"])
        user.save()
        lin(request, user)
        # return render(request, "auth/signup.html", {"form": UserCreationForm(), "error": "Success"})
        return redirect("home")   
    except IntegrityError:
        return render(request, "auth/signup.html", {"form": UserCreationForm(), "error": "Username is already taken!"})

def login(request):
    if request.method != "POST":
        return render(request, "auth/login.html", {"form": AuthenticationForm()})
    user = authenticate(request, username=request.POST["username"], password=request.POST["password"])
    if user is None:
        return render(request, "auth/login.html", {"form": AuthenticationForm(), "error": "User and password did not match!"})
    else:
        lin(request, user)
        return redirect("home")


def logout(request):
    if request.method == "POST":
        lout(request)
        return redirect("home")
    
@login_required
def manager(request):
    projList = Project.objects.filter(manager=request.user).order_by("-date")
    return render(request, "proj/manager.html", {"list": projList})

@login_required
def proj(request, proj_id):
    project = get_object_or_404(Project, pk=proj_id)
    form = ProjForm(request.POST or None, instance=project)
    if request.method != "POST":
        return render(request, "proj/proj.html", {"proj": project, "form":form})
    else:
        typeSubmit = request.POST["submit"]
        if typeSubmit == "Edit":
            form = ProjForm(request.POST or None, instance=project)
            if form.is_valid:
                form.save()
        elif typeSubmit == "Delete":
            project.delete()
        return redirect("manager")
    
@login_required
def addnew(request):
    form = ProjForm()
    if request.method != "POST":
        return render(request, "proj/addnew.html", {"form": form})
    else:
        form = ProjForm(request.POST)
        if form.is_valid:
            nuform = form.save(commit=False)
            nuform.manager = request.user
            nuform.save()
        return redirect("manager")