from django.shortcuts import render, get_object_or_404
from .models import Post, Author, Tag

# Create your views here.

def home(request):
    posts = Post.objects.all().order_by("-date")[:3]
    return render(request, "blog/index.html",{"posts":posts})

def details(request, post_id):
    post = get_object_or_404(Post, pk=post_id)
    return render(request, "blog/details.html", {"post":post})

def all(request):
    posts = Post.objects.all()
    return render(request, "blog/all.html", {"posts":posts})