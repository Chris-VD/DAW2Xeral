from django.http import HttpResponseRedirect
from django.shortcuts import render
from .forms import FormForm

# Create your views here.

def form(request):
    if request.method == "POST":
        form = FormForm(request.POST)
        if form.is_valid():
            print(form.cleaned_data)
            form.save()
            return render(request, "form.html", {"form": form})
    form = FormForm()
    return render(request, "form.html", {"form": form})

def succ(request):
    return render(request, "success.html")