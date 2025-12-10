from django.core.validators import MinLengthValidator
from django.db import models

# Create your models here.
class Form(models.Model):
    username = models.CharField(max_length=50)
    password = models.CharField(max_length=100, validators=[MinLengthValidator(8)])
    city = models.CharField(max_length=50, blank=True)
    web_server = models.CharField(max_length=20)
    role = models.CharField(max_length=20)
    sign_ins = models.CharField(max_length=100)
    def __str__(self):
        return f"{self.username}'s form"    
