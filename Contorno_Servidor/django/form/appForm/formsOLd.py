from django import forms

class FormForm(forms.Form):
    username = forms.CharField(label="Username:", max_length=50, error_messages={
        "required": "Username is required.",
        "max_length": "Username exceeds max character limit."
    })
    password = forms.CharField(label="Password:", min_length=8, widget=forms.PasswordInput(),error_messages={
        "required": "Password is required.",
        "min_length": "Password must be at least 8 characters long."
    })
    city = forms.CharField(label="City of employment:", max_length=50, required=False)
    web_server = forms.ChoiceField(choices=(("Apache", "Apache"),
                                            ("Nginx", "Nginx"),
                                            ("Tomcat", "Tomcat")), label="Web Server: ")
    
    role = forms.ChoiceField(widget=forms.RadioSelect, choices=(("Admin", "Admin"),
                                      ("Engineer", "Engineer"),
                                      ("Manager", "Manager"),
                                      ("Guest", "Guest")), label="Please specify your role:")
    
    sign_ins = forms.MultipleChoiceField(widget=forms.CheckboxSelectMultiple, choices=(("Mail", "Mail"),
                                                                                       ("Payroll", "Payroll"),
                                                                                       ("Self-Service", "Self-Service")), label="Single Sign-on to the following:")
    
