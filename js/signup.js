var form = document.getElementById('forms');
            form.onsubmit = function vaildate() {
		    
                if(form.fname.value=='')
                    {
                        alert('misssing first name');
                        return false;
                    }
                else if(form.lname.value=='')
                    {
                        alert('missing last name');
                        return false;
                    }
                else if (form.email.value == '')
                {
                    alert('missing email');
                    return false;
                }
                else if (form.password.value == '')
                {
                    alert('missing password');
                    return false;
                }
		        else if(form.password.value.length<6)
		        {
			         alert('short password');
			         return false;
		        }
                else if (form.password.value != form.cpassword.value)
                {
                    alert('passwords don\'t match');
                    return false;
                }
                else if (form.college.value=='')
                {
                    alert('missing college');
                    return false;
                }
                else if(form.course.value=='')
                    {
                        alert('missing course');
                    }
                
                return true;

            };