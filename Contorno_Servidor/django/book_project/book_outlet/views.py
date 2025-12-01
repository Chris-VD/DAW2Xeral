from django.shortcuts import render
from .models import Book, Author
from django.db.models import Q

# Create your views here.
def home(request):
    highest = Book.objects.order_by("-rating")[:3]
    query = Book.objects.filter(Q(title__icontains="Potter"), Q(Q(is_bestselling=True) | Q(rating__gte=3)))
    jkr = Book.objects.filter(author=1, is_bestselling=True)

    rowling = Book.objects.filter(author__last_name = "Rowling")
    rowling = Author.objects.get(last_name="Rowling").book_set.all()

    return render(request, "outlet/home.html", {"highest":highest, "query":query, "jkr":jkr, "rowling":rowling})