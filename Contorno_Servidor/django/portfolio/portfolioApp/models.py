from django.db import models

# Create your models here.

class Project(models.Model):
    title = models.CharField(max_length=50)
    description = models.CharField(max_length=200)
    image = models.ImageField(upload_to="portfolio/images/")
    url = models.URLField(blank=True)

    def __str__(self): # No /admin mostra o nome por defecto dos obxetos tipo "object1...", este __str__ fai que apareza o nome que lle digas, neste caso titulo
        return(self.title)