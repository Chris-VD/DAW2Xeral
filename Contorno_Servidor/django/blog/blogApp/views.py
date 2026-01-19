from django.shortcuts import render, get_object_or_404
from django.views.generic.edit import CreateView
from .forms import PostForm
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

class CreatePost(CreateView):
    template_name = "blog/addPost.html"
    model = Post
    form_class = PostForm
    success_url = "/allPosts"