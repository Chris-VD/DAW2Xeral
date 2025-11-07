from django.shortcuts import render
from django.http import HttpResponse
import random

# Create your views here.
def home(request):
    return render(request, 'generator/home.html')

def password(request):
    charlist = list("qwertyuiopasdfghjklñzxcvbnm")
    if (request.GET.get("upper")):
        charlist.extend("QWERTYUIOPASDFGHJKLÑZXCVBNM")
    leng = int(request.GET.get("length"))
    passw =""
    for x in range(leng):
        passw += random.choice(charlist)
    return render(request, 'generator/password.html', {"password":passw})

def about(request):
    return render(request, 'generator/about.html')