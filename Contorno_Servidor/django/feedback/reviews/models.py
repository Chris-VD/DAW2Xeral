from django.db import models
from django.core.validators import MaxValueValidator, MinValueValidator

# Create your models here.

class Review(models.Model):
    user_name = models.CharField(max_length=100)
    review_text = models.TextField(max_length=300)
    rating = models.IntegerField(validators=[MaxValueValidator(5), MinValueValidator(1)])
    def __str__(self):
        return f"{self.user_name}'s review"