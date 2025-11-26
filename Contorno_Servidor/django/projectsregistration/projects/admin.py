from django.contrib import admin
from .models import Project

# Register your models here.
class Admin(admin.ModelAdmin):
    list_filter = ("manager",)
    list_display = ("title", "manager",)

admin.site.register(Project, Admin)