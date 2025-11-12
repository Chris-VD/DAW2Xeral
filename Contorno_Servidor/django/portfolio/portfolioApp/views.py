from django.shortcuts import render
from .models import Project

# Create your views here.

def portfolio(request):
    return render(request, "portfolio.html")

def home(request):
    projects = Project.objects.all()
    return render(request, "home.html", {"projects": projects})