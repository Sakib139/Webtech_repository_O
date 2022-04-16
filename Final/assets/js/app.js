function setErrorFor(input, message){
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');

	small.innerText = message;

	formControl.className = 'form-control error';
}

function setSuccessFor(input){
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}

function isUsername(username){
	return /^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/.test(username);
}

function isPassword(password){
	return /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/.test(password);
}
function checkInputs(input, iType= null){
	const inputEl = document.getElementById(input);
	const inputVal = inputEl.value.trim();

	if (inputVal === '') {		
		setErrorFor(inputEl, input+' can not be blank');
		return false;
	}else if(iType != null){
		if(iType == 'username' && !isUsername(inputVal)){
			setErrorFor(inputEl, 'Invalid username format');
			return false;
		}else if(iType == 'password' && !isPassword(inputVal)){
			setErrorFor(inputEl, 'Password must have at least 8 characters, numbers and spcial characters');
			return false;
		}else{
			setSuccessFor(inputEl);
			return true;
		}
	}else{
		setSuccessFor(inputEl);
		return true;
	}
}
const loginForm = document.getElementById('login-form');
if(loginForm != null){
	loginForm.addEventListener('submit', (e)=>{
		e.preventDefault();
		var elems = ['username', 'password'];
		if(runFullValidation(elems)){
			data = makePostString(elems);
			action = loginForm.action;
			postForm(action, data, function(response){
				if(response == 'success'){
					window.location.href = base_url+'index.php/admin/view_profile';
				}else{
					document.getElementById('loginFailed').style.display = 'block';
				}
			});
		}
	});
}
const editProfileForm = document.getElementById('edit-profile-form');
if(editProfileForm != null){
	editProfileForm.addEventListener('submit', (e)=>{
		e.preventDefault();
		var elems = ['first_name', 'last_name', 'email', 'blood_group', 'present_address', 'permanent_address'];
		if(runFullValidation(elems)){
			data = makePostString(elems);
			action = editProfileForm.action;
			postForm(action, data, function(response){
				if(response == 'success'){
					window.location.href = base_url+'index.php/admin/view_profile';
				}else{
					document.getElementById('editProfileFailed').style.display = 'block';
				}
			});
		}
	});
}
const changePasswordForm = document.getElementById('change-password-form');
if(changePasswordForm != null){
	changePasswordForm.addEventListener('submit', (e)=>{
		e.preventDefault();
		var elems = ['current_password', 'new_password'];
		if(runFullValidation(elems)){
			data = makePostString(elems);
			action = changePasswordForm.action;
			postForm(action, data, function(response){
				if(response == 'success'){
					window.location.href = base_url+'index.php/admin/view_profile';
				}else{
					document.getElementById('changePasswordFailed').style.display = 'block';
				}
			});
		}
	});
}
const addTeacherForm = document.getElementById('add-teacher-form');
if(addTeacherForm != null){
	addTeacherForm.addEventListener('submit', (e)=>{
		e.preventDefault();
		var elems = ['first_name', 'last_name', 'email', 'username', 'password', 'gender', 'date_of_birth', 'blood_group', 'present_address', 'permanent_address'];
		if(runFullValidation(elems)){
			data = makePostString(elems);
			action = addTeacherForm.action;
			postForm(action, data, function(response){
				if(response == 'success'){
					window.location.href = base_url+'index.php/admin/view_teacher';
				}else{
					document.getElementById('addTeacherFailed').style.display = 'block';
				}
			});
		}
	});
}
const addNoticeForm = document.getElementById('add-notice-form');
if(addNoticeForm != null){
	addNoticeForm.addEventListener('submit', (e)=>{
		e.preventDefault();
		var elems = ['title', 'description'];
		if(runFullValidation(elems)){
			data = makePostString(elems);
			action = addNoticeForm.action;
			postForm(action, data, function(response){
				if(response == 'success'){
					window.location.href = base_url+'index.php/admin/view_notice';
				}else{
					document.getElementById('addTeacherFailed').style.display = 'block';
				}
			});
		}
	});
}
function runFullValidation(elems){
	var flag = true;
	for(i = 0; i < elems.length; i++){
		if(elems[i] == 'username'){
			if(!checkInputs(elems[i], 'username')){
				flag = false;
			}
		}else if(elems[i] == 'password'){
			if(!checkInputs(elems[i], 'password')){
				flag = false;
			}
		}else{
			if(!checkInputs(elems[i])){
				flag = false;
			}
		}
	}
	return flag;
}
function makePostString(elems){
	var str = '';
	for(i = 0; i < elems.length; i++){
		if(i > 0){
			str += '&'
		}
		let val = encodeURIComponent(document.getElementById(elems[i]).value);
		str += elems[i]+'='+val;
	}
	return str;
}
function postForm(action, data, callback){
	var http = new XMLHttpRequest();
	http.open('POST', action, true);

	
	http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			callback(http.responseText);
		}
	}
	http.send(data);
}
function setClockTime(){
	var date = new Date();
	var ampm = 'AM';
	var hour = date.getHours();
	if(hour > 11){
		hour = hour - 12;
		ampm = 'PM';
	}
	if(hour == 0){
		hour = 12;
	}
	var minutes = date.getMinutes();
	var seconds = date.getSeconds();
	var time = hour+':'+minutes+':'+seconds+' '+ampm;
	document.getElementById('clock').innerText = time;
}
setClockTime();
setInterval(setClockTime, 100);