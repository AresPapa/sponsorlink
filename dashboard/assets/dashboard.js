document.addEventListener("DOMContentLoaded", function () {
	const root = document.getElementById("sl-dashboard");
	const content = document.getElementById("sl-dash-content");
	if (!root || !content || typeof SL_DASHBOARD_VARS === "undefined") return;

	const links = root.querySelectorAll(".sl-dash__link");

<<<<<<< HEAD
	function setActive(target) {
		links.forEach((a) => a.classList.remove("is-active"));
		target.classList.add("is-active");
	}
=======

  const toggle = document.querySelector('.sl-dash__toggle');
  const sidebar = document.querySelector('.sl-dash__side');

  if (toggle && sidebar) {
    toggle.addEventListener('click', () => {
      sidebar.classList.toggle('is-open');
    });
  }

  function setActive(target) {
    links.forEach(a => a.classList.remove('is-active'));
    target.classList.add('is-active');
  }
>>>>>>> 82b57320625aea6fa91d08fafe7a2681aedc03d1

	function loadSection(section) {
		content.innerHTML = "<p>Loading…</p>";

		const body = new URLSearchParams({
			action: "sl_load_dashboard_section",
			section: section,
			nonce: SL_DASHBOARD_VARS.nonce,
		});

		fetch(SL_DASHBOARD_VARS.ajax_url, {
			method: "POST",
			headers: { "Content-Type": "application/x-www-form-urlencoded" },
			body,
		})
			.then((r) => r.json())
			.then((json) => {
				if (
					json &&
					json.success &&
					json.data &&
					typeof json.data.html === "string"
				) {
					content.innerHTML = json.data.html;
				} else {
					content.innerHTML = "<p>Sorry, something went wrong.</p>";
				}
			})
			.catch(() => {
				content.innerHTML = "<p>Network error. Please try again.</p>";
			});
	}

	links.forEach((link) => {
		link.addEventListener("click", function (e) {
			e.preventDefault();
			setActive(this);
			loadSection(this.dataset.section);
		});
	});

<<<<<<< HEAD
	// initial load
	const first = root.querySelector(".sl-dash__link.is-active") || links[0];
	if (first) loadSection(first.dataset.section);
=======

  // initial load
  const first = root.querySelector('.sl-dash__link.is-active') || links[0];
  if (first) loadSection(first.dataset.section);
>>>>>>> 82b57320625aea6fa91d08fafe7a2681aedc03d1
});
