'use strict';

{
  const token = document.querySelector('main').dataset.token;
  const input = document.querySelector('[name="title"]');
  const ul = document.querySelector('ul');

  input.focus();

  ul.addEventListener('click', e => {
    if (e.target.type === 'checkbox') {
      fetch('?action=toggle', {
        method: 'POST',
        body: new URLSearchParams({
          id: e.target.parentNode.dataset.id,
          token: token,
        }),
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('This todo has been deleted!');
        }

        return response.json();
      })
      .then(json => {
        if (json.is_done !== e.target.checked) {
          alert('This Todo has been updated. UI is being updated.');
          e.target.checked = json.is_done;
        }
      })
      .catch(err => {
        alert(err.message);
        location.reload();
      });
    }

    if (e.target.classList.contains('delete')) {
      if (!confirm('Are you sure?')) {
        return;
      }
      
      fetch('?action=delete', {
        method: 'POST',
        body: new URLSearchParams({
          id: e.target.parentNode.dataset.id,
          token: token,
        }),
      });

      e.target.parentNode.remove();
    }
  });

  // study用todo追加処理
  document.getElementById("form-study").addEventListener("submit", (e) => {
		e.preventDefault();

		const title = input.value;

		fetch("?action=add", {
			method: "POST",
			body: new URLSearchParams({
				title: title,
        category: "study",
				token: token,
			}),
		})
			.then((response) => response.json())
			.then((json) => {
				addTodo(json.id, title);
			});

		input.value = "";
		input.focus();
    location.reload();
	});

  const purge = document.querySelector('.purge');
  purge.addEventListener('click', () => {
    if (!confirm('Are you sure?')) {
      return;
    }
    
    fetch('?action=purge', {
      method: 'POST',
      body: new URLSearchParams({
        token: token,
      }),
    });

    const lis = document.querySelectorAll('li');
    lis.forEach(li => {
      if (li.children[0].checked) {
        li.remove();
      }
    });
  });
}