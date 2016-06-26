{% extends 'templates/default.php' %}

{% block title %}
	Home
{% endblock %}

{% block style %}
	<link rel='stylesheet' href='../../public/index.css'>	
{% endblock %}

{% block content %}
	<header>
		THE PROJECTOR
	</header>
	<form>
		<input type='text' placeholder='email' name='username'/>
		<input type='password' placeholder='password' name='password'/>
		<button type='submit'/> LOGIN </button>
	</form>
{% endblock %}