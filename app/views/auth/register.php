{% extends '/templates/default.php' %}

{% block title %}
Create User
{% endblock %}

{% block style %}
<link rel='stylesheet' href='../../public/projector.css'>
<link rel='stylesheet' href='../../public/body.css'>
{% endblock %}

{% block content %}
	{% include '/templates/partials/header.php' %}
	<div class="main_content">
		<div class="sidebar">
			<nav>
				<ul>
					<li>
						<a href="{{ urlFor('dashboard') }}">Dashboard</a>
					</li>
					<li>
						<a href="{{ urlFor('projects') }}">Create Project</a>
					</li>
					<li>
						<a href="{{ urlFor('register') }}" class="on">Create User</a>
					</li>
					<li>
						<a href="{{ urlFor('logout') }}">Sign Out</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="content">
			<h2>CREATE USER</h2>
			<form class="users" action="{{ urlFor('register.post') }}" method="post" autocomplete="off">
				<label for="first_name">First Name (2-5O alphabet characters)</label>
				<input type="text" name="first_name" id="first_name"/>
				<label for="last_name">Last Name (2-5O alphabet characters)</label>
				<input type="text" name="last_name" id="last_name"/>
				<label for="username">Email</label>
				<input type="email" name="username" id="username"/>
				<label for="password">Password (7-11 characters)</label>
				<input type="password" name="password" id="password"/>
				<label for="password">Confirm Password</label>
				<input type="password" name="password_confirm" id="password_confirm"/>
				<button class="bottom_user" type="submit" value="Register">Create User</Button>
			</form>
		</div>
	</div>
{% endblock %}