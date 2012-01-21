{% extends main/base %}

{% block title %}Login{% endblock %}

{% block content %}
User Login
<form action='/user/login' method='post'>
    <label>Username: <input type='text' name='username' /></label>
    <label>Password: <input type='password' name='password' /></label>
    {% if exists returnURL %}
        <input type="hidden" name="return" value="{{returnURL}}" />
    {% endif %}
    <input type='submit' />
</form>
{% endblock %}