from django.shortcuts import render
from .models import Book
from django.db.models import Q

# Create your views here.
def home(request):
    highest = Book.objects.order_by("-rating")[:3]
    query = Book.objects.filter(Q(title__icontains="Potter"), Q(Q(is_bestselling=True) | Q(rating__gte=3)))
    jkr = Book.objects.filter(author="J.K. Rowling", is_bestselling=True)

    return render(request, "outlet/home.html", {"highest":highest, "query":query, "jkr":jkr})