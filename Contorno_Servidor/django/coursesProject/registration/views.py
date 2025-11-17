from django.shortcuts import render
from datetime import datetime
from .models import Registration

# Create your views here.
def registration(request):
    return render(request, "registration/registration.html")

def result(request):
    info = {}
    info["name"] = str(request.GET.get("name"))
    info["surname"] = str(request.GET.get("surname"))
    info["age"] = int(request.GET.get("age"))
    info["date"] = datetime.now().date()
    r = Registration(name=info["name"], surname=info["surname"], age=info["age"], date=info["date"])
    r.save()
    return render(request, "registration/result.html", {"info": info})