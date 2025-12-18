from django.http import HttpResponseRedirect
from django.views import View
from django.views.generic import ListView
from django.views.generic.edit import CreateView
from django.shortcuts import render
from .forms import ReviewForm, ProfileForm
from .models import Review, UserProfile

# Create your views here.

class CreateProfileView(CreateView):
    template_name = "reviews/imaxe.html"
    model = UserProfile
    form_class = ProfileForm
    success_url = "thank-you"

class ProfilesView(ListView):
    template_name = "reviews/imaxes.html"
    model = UserProfile
    context_object_name = "profiles"

def review(request):
    if request.method == 'POST':
        form = ReviewForm(request.POST)
        if form.is_valid():
            # review = Review(
            #     user_name = form.cleaned_data["user_name"],
            #     review_text = form.cleaned_data["review_text"],
            #     rating = form.cleaned_data["rating"]
            # )
            # review.save() -> Se usamos foro e modelo separado
            form.save() # -> Se usamos ModelFrom
            return HttpResponseRedirect("/thank-you")
    form = ReviewForm()
    return render(request, "reviews/review.html", {"form": form})

def thank_you(request):
    return render(request, "reviews/thank_you.html")

