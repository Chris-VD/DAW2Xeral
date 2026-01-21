from django.db import models
from django.core.validators import MinLengthValidator

# Create your models here.

class Author(models.Model):
    FName = models.CharField(max_length=50)
    LName = models.CharField(max_length=100)
    email = models.EmailField()

    def __str__(self):
        return f"{self.FName} {self.LName}"

class Tag(models.Model):
    caption = models.CharField(max_length=50)

    def __srt__(self):
        return self.caption

class Post(models.Model):
    title = models.CharField(max_length=100)
    excerpt = models.CharField(max_length=200)
    image = models.ImageField(upload_to="images", null=True)
    slug = models.SlugField(db_index=True)
    date = models.DateField(auto_now=True)
    content = models.TextField(validators=[MinLengthValidator(10)])
    author = models.ForeignKey(Author, on_delete=models.SET_NULL, null=True)
    tag = models.ManyToManyField(Tag)

    def __str__(self):
        return f"{self.title} by {self.author}"
    
class Comment(models.Model):
    comment = models.TextField(max_length=200)
    user_name = models.CharField(max_length=100, null=True)
    user_email = models.EmailField(null=True)
    post = models.ForeignKey(Post, on_delete=models.CASCADE, null=False)

    def __srt__(self):
        return self.id