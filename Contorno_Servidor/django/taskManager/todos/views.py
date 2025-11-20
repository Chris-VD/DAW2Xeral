from django.shortcuts import render, redirect, get_list_or_404
from django.db import IntegrityError
from django.contrib.auth.forms import UserCreationForm, AuthenticationForm
from django.contrib.auth import login as lin
from django.contrib.auth import logout as lout
from django.contrib.auth import authenticate
from django.contrib.auth.models import User
from .forms import TodoForm
from .models import Todo

# Create your views here.
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
        return redirect("currenttodos")   
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

def currenttodos(request):
    listTodos = Todo.objects.filter(user=request.user, completed__isnull=True)
    return render(request, "todos/currenttodos.html", {"list":listTodos})

def home(request):
    return render(request, "todos/home.html")

def createtodo(request):
    if request.method != "POST":
        return render(request,"todos/createtodo.html", {"form": TodoForm()})
    try:
        newForm = TodoForm(request.POST).save(commit=False)
        newForm.user = request.user
        newForm.save()
        return redirect("home")
    except:
        return render(request,"todos/createtodo.html", {"form": TodoForm(), "error": "Houbo un erro"})
    