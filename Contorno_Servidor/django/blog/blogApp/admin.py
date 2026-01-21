from django.contrib import admin
from .models import Author, Post, Tag, Comment

# Register your models here.
class AdminPost(admin.ModelAdmin):
    list_display=("title", "date", "author")
    list_filter=("author", "tag", "date")

admin.site.register(Author)
admin.site.register(Post, AdminPost)
admin.site.register(Tag)
admin.site.register(Comment)
