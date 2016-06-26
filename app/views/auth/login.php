{% extends 'templates/default.php' %}

{% block title %}
	Sign-in
{% endblock %}

{% block style %}
	<link rel='stylesheet' href='../public/index.css'>	
{% endblock %}

{% block content %}
	<header>
		THE PROJECTOR
	</header>
	<form action="{{urlFor('login.post')}}" method="post" autocomplete="off">
		<input type='text' placeholder='email' name='username' id="username"/>
		<input type='password' placeholder='password' name='password' id="password"/>
		<button type='submit' value="login"/> LOGIN </button>
	</form>
{% endblock %}