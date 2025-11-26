from django.forms import ModelForm
from .models import Project

class ProjForm(ModelForm):
    class Meta:
        model = Project
        fields = ["title", "description"]