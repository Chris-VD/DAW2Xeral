from django import forms

class ReviewForm(forms.Form):
    user_name = forms.CharField(label="Your Name", max_length=100, error_messages={
        "required": "Name cannot be empty.",
        "max_length": "Name exceeds max length",
    })
    review_text = forms.CharField(label="Your Feedback", widget=forms.Textarea, max_length=300)
    rating = forms.IntegerField(label="Rating", min_value=1, max_value=5)