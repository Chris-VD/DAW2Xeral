from django.db import models
from django.core.validators import MinValueValidator, MaxValueValidator

# Create your models here.

class Country(models.Model):
    name = models.CharField(max_length=50)
    code = models.CharField(max_length=10)
    
    def __str__(self):
        return f'{self.name}, {self.code}'
    
    class Meta:
        verbose_name_plural = "Countries"

class Address(models.Model):
    street = models.CharField(max_length=200)
    postal_code = models.CharField(max_length=10)
    city = models.CharField(max_length=150)

    def __str__(self):
        return f'{self.street}, {self.postal_code}, {self.city}'
    
    class Meta:
        verbose_name_plural = "Addresses"

class Author(models.Model):
    first_name = models.CharField(max_length=30)
    last_name = models.CharField(max_length=50)
    address = models.OneToOneField(Address, on_delete=models.SET_NULL, null=True)

    def __str__(self):
        return f'{self.last_name}, {self.first_name}'

class Book(models.Model):
    title = models.CharField(max_length=50)
    rating = models.IntegerField(validators=[MinValueValidator(1), MaxValueValidator(5)])
    author = models.ForeignKey(Author, on_delete=models.CASCADE, null=True)
    is_bestselling = models.BooleanField(default=False) #We are setting a default value
    published_countries = models.ManyToManyField(Country)

    def __str__(self):
        return f'{self.title}, {self.author if self.author else "no author"} ({self.rating})'