{% extends 'templates/default.php' %}

{% block title %}
	Add Members
{% endblock %}

{% block style %}
	<link rel='stylesheet' href='../../../public/projector.css'>
	<link rel='stylesheet' href='../../../public/body.css'>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="../../../public/script.js"></script>	
{% endblock %}

{% block content %}
	{% include '/templates/partials/header.php' %}
	<div class="main_content">

		<div class="sidebar">
			<nav>
				<ul>
					<li>
						<a href="{{ urlFor('dashboard') }}" class="on">Dashboard</a>
					</li>
					<li>
						<a href="{{ urlFor('projects') }}">Create Project</a>
					</li>
					<li>
						<a href="{{ urlFor('register') }}">Create User</a>
					</li>
					<li>
						<a href="{{ urlFor('logout') }}">Sign Out</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="content">
			<h2>{{project.name|upper}}'S MEMBERS</h2>
<!--			
			<form class="projects" action="{{ urlFor('addMembers.post', {'projectId':project.id}) }}" method="post" autocomplete="off">

-->
			<form class="projects">
				<section class="left">
					<label for='code'>Current Members</label>
					<div class="members_view">
						<ul class="members_list">
							{% for mem in members %}
								<li>
									<button title="Delete User" value="{{mem.id}}" class="delete">x</button>
									<span>{{mem.firstname}} {{mem.lastname}}</span>
									<input type="hidden" id="{{mem.id}}" value="{{mem.id}}" name="{{mem.firstname}} {{mem.lastname}}"></input>
								</li>
							{% else %}
								<li id="empty"> No members found. </li>
							{% endfor %}
						</ul>
					</div>
				</section>
				<section class="right">
					<label for='remark'>New Member</label>
					<select name="new_member" id="new_member">
							{% for user in available %}
								<option value='{{user.id}}'>
									{{user.firstname}} {{user.lastname}}
								</option>
							{% else %}
								<option disabled class="empty_options">No users available</option>
							{% endfor %}
					</select>
					<input type="hidden" id="project_id" name="project_id" value="{{project.id}}">
					<button id="add" type="submit" value="Add">Add Member</Button>
				</section>				
			</form>
		</div>
	</div>
{% endblock %}