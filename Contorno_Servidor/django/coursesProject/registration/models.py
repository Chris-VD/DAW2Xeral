from django.db import models

# Create your models here.
class Registration(models.Model):
    name = models.CharField(max_length=20)
    surname = models.CharField(max_length=30)
    age = models.IntegerField()
    date = models.DateField()

    def __str__(self):
        return(self.name + self.surname)