from django import forms
from .models import Post, Comment

class PostForm(forms.ModelForm):
    class Meta:
        model = Post
        fields = "__all__"

class CommentForm(forms.ModelForm):
    user_name = forms.CharField(required=False)
    user_email = forms.EmailField(required=False)
    class Meta:
        model = Comment
        fields = ('comment', 'user_name', 'user_email')