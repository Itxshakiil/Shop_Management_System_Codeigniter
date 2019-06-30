// Add Asterisk

const formElement = document.querySelector("form");
var x = formElement.querySelectorAll(
	"input:not([type='submit']):not([type='checkbox']):not([type='hidden'])"
);
window.addEventListener("load", addAsterisk);

function addAsterisk(e) {
	for (i = 0; i < x.length; i++) {
		{
			if (x[i].hasAttribute("required")) {
				// x[i].previousElementSibling.insertinnerHTML("afterend",
				//     '<span style="color:red;margin-left:.2em;">*</span>');
				x[i].previousElementSibling.innerHTML +=
					'<span style="color:red;margin-left:.2em;">*</span>';
			} else {
				try {
					x[i].previousElementSibling.innerHTML += "<span> (Optional)</span>";
				} catch (error) {
					console.error(error);
				}
			}
		}
	}
}

// Show/Hide Password
const password = document.forms[0].querySelector("#password");
const show_password = document.forms[0].querySelector("#show-password");
if (show_password) {
	show_password.addEventListener("change", e => {
		if (password.getAttribute("type") === "password") {
			password.setAttribute("type", "text");
			show_password.nextElementSibling.innerHTML = "Hide Password";
		} else {
			password.setAttribute("type", "password");
			show_password.nextElementSibling.innerHTML = "Show Password";
		}
	});
}
