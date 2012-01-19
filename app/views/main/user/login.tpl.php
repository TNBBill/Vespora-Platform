{% extends main/base %}

{% block title %}Login{% endblock %}

{% block content %}
User Login
<form action='/user/login' method='post'>
    <label>Username: <input type='text' name='username' /></label>
    <label>Password: <input type='password' name='password' /></label>
    <input type='submit' />
</form>
{% endblock %}