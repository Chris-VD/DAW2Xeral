from django import forms
from .models import Review, UserProfile

class ReviewForm(forms.ModelForm):
    class Meta:
        model = Review
        fields = "__all__"
        # exclude = ["raing"]
        labels = {
            "user_name":"Your Name",
            "review_text":"Review",
            "rating":"Rating"
        }
        error_messages = {
            "user_name": {
                "required": "Name is required!",
                "max_length": "Max length exceeded."
            }
        }

class ProfileForm(forms.ModelForm):
    class Meta:
        model = UserProfile
        fields = "__all__"