const main = document.querySelector("main");
main.addEventListener("click", e => {
	if (e.target.classList.contains("like-btn")) {
		console.dir(e.target);
		if (e.target.querySelector("i").classList.contains("far")) {
			e.target.querySelector("i").classList.remove("far");
			e.target.querySelector("i").classList.add("fas");
		} else {
			e.target.querySelector("i").classList.remove("fas");
			e.target.querySelector("i").classList.add("far");
		}
	}
});
