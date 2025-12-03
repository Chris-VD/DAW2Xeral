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
    # book_set é o nome por defecto, podes cambialo en models.py engadindo related_name="..." á foreign key de authors en books
    # author = models.ForeignKey(Author, on_delete=models.CASCADE, null=True, related_name="calqueranome")
    # rowling = Author.objects.get(last_name="Rowling").fkbooks.all()

    books = Book.objects.all()

    return render(request, "outlet/home.html", {"highest":highest, "query":query, "jkr":jkr, "rowling":rowling, "books":books})