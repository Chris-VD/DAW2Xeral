from django.shortcuts import render

# Create your views here.
def home(request):
    return render(request, "NSApp/home.html")

def next(request):
    info = {}
    info["user"] = request.GET.get("user")
    info["pssw"] = request.GET.get("pssw")
    info["city"] = request.GET.get("city")
    info["webS"] = request.GET.get("webS")
    info["role"] = request.GET.get("role")
    info["mail"] = request.GET.get("mail")
    info["payroll"] = request.GET.get("payroll")
    info["selfS"] = request.GET.get("selfS")
    return render(request, "NSApp/next.html", {"info":info})