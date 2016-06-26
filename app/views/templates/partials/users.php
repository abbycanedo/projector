{% extends 'templates/default.php' %}

{% block title %}
	Create User
{% endblock %}

{% block style %}
	<link rel='stylesheet' href='../../public/body.css'>	
{% endblock %}

{% block content %}
	{% include 'header.php' %}
	<div class="main_content">
		<div class="sidebar">
			<nav>
				<ul>
					<li>
						<a href="{{ urlFor('dashboard') }}">Dashboard</a>
					</li>
					<li>
						<a href="projects.php">Create Project</a>
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
			<form class="users">
				<label>First Name</label>
				<input type="text"/>
				<label>Last Name</label>
				<input type="text"/>
				<label>Username</label>
				<input type="number"/>
				<label>Password</label>
				<input type="password"/>
			</form>
			<button type="submit">Save</Button>
		</div>
	</div>
{% endblock %}