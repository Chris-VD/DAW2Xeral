from django.shortcuts import render, get_object_or_404
from django.views.generic.edit import CreateView
from django.views.generic import ListView, DetailView
from django.views import View
from .forms import PostForm, CommentForm
from .models import Post, Author, Tag, Comment
from django.http import HttpResponseRedirect
from django.urls import reverse

# Create your views here.

# def home(request):
#     posts = Post.objects.all().order_by("-date")[:3]
#     return render(request, "blog/index.html",{"posts":posts})

# def details(request, post_id):
#     post = get_object_or_404(Post, pk=post_id)
#     return render(request, "blog/details.html", {"post":post})

# def all(request):
#     posts = Post.objects.all()
#     return render(request, "blog/all.html", {"posts":posts})

class Home(View):
    def get(self, request):
        posts = Post.objects.all().order_by("-date")[:3]
        return render(request, "blog/index.html",{"posts":posts})

class PostDetailView(View):
    def get(self, request, pk):
        post = get_object_or_404(Post, pk=pk)
        form = CommentForm()
        comments = Comment.objects.filter(post=post)
        return render(request, "blog/details.html", {"post": post, "form":form, "comments": comments})
    
    def post(self, request, pk):
        post = get_object_or_404(Post, pk=pk)
        comment_raw = CommentForm(request.POST)
        if comment_raw.is_valid():
            comment = Comment()
            comment.comment = comment_raw.cleaned_data["comment"]
            comment.post = post
            comment.user_name = comment_raw.cleaned_data["user_name"]
            comment.user_email = comment_raw.cleaned_data["user_email"]
            comment.save()
            return HttpResponseRedirect(reverse("details", args=[post.id]))

class ReadLaterView(View):
    def get(self, request):
        id = request.GET.get("id", 0)
        stored_posts = request.session.get("rll", [])
        if int(id) > 0:
            stored_posts.append(int(id))
        if int(id) < 0:
            stored_posts.remove(abs(int(id)))
        request.session['rll'] = stored_posts
        posts = Post.objects.filter(id__in=stored_posts)
        return render(request, "blog/readLater.html", {"list":posts})

class PostListView(ListView):
    template_name = "blog/all.html"
    model = Post
    context_object_name = "posts"

class CreatePost(CreateView):
    template_name = "blog/addPost.html"
    model = Post
    form_class = PostForm
    success_url = "/allPosts"
