from django import forms
from .models import Form

class FormForm(forms.ModelForm):   
    class Meta:
        model = Form
        fields = ["username", "password", "city", "web_server", "role", "sign_ins"]
        labels = {
            "username": "Username:",
            "password": "Password:",
            "city": "City of employment:",
            "web_server": "Web Server:",
            "role": "Please specify your role:",
            "sign_ins": "Single Sign-on to the following:",
        }
        error_messages = {
            "username": {
                "required": "Name is required!",
                "max_length": "Max length exceeded."
            },
            "password": {
                "required": "Password is required.",
                "min_length": "Must be at least 8 characters."
            }
        }
        widgets = {
            "password": forms.PasswordInput(),
            "role": forms.RadioSelect(choices=(("Admin", "Admin"),
                                            ("Engineer", "Engineer"),
                                            ("Manager", "Manager"),
                                            ("Guest", "Guest"))),
            "sign_ins":forms.CheckboxSelectMultiple(choices=(("Mail", "Mail"),
                                                            ("Payroll", "Payroll"),
                                                            ("Self-Service", "Self-Service"))),
            "web_server": forms.Select(choices=(("Apache", "Apache"),
                                            ("Nginx", "Nginx"),
                                            ("Tomcat", "Tomcat"))), 
        }
