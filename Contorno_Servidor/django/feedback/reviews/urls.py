from django.urls import path
from . import views

urlpatterns = [
    path("", views.review, name="review"),
    path("thank-you", views.thank_you, name="thank_you"),
    path("imaxe", views.CreateProfileView.as_view(), name="imaxe"),
    path("imaxes", views.ProfilesView.as_view(), name="imaxes")
]