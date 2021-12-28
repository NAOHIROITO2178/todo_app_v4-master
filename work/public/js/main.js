'use strict';

{
  const token = document.querySelector('main').dataset.token;
  const input = document.querySelector('[name="title"]');
  const ul = document.querySelector('ul');

  input.focus();

  ul.addEventListener('click', e => {
    if (e.target.type === 'checkbox') {
      console.log("id取得".e.target.parentNode.dataset.id);
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

    function addTodo(id, titleValue) {
      const li = document.createElement('li');
      li.dataset.id = id;
      const checkbox = document.createElement('input');
      checkbox.type = 'checkbox';
      const title = document.createElement('span');
      title.textContent = titleValue;
      const deleteSpan = document.createElement('span');
      deleteSpan.textContent = 'x';
      deleteSpan.classList.add('delete');
  
      li.appendChild(checkbox);
      li.appendChild(title);
      li.appendChild(deleteSpan);
  
      ul.insertBefore(li, ul.firstChild);
    }
 
    // 勉強カテゴリフォーム
  document.getElementById('study_btn').addEventListener('click', e=> {
    e.preventDefault();

    const title = document.study_form.title.value;

    fetch('?action=add', {
      method: 'POST',
      body: new URLSearchParams({
        category: 'study',
        title: title,
        token: token,
      }),
    })
    .then(response => response.json())
    .then(json => {
      addTodo(json.id, title);
    });

    input.value = '';
    input.focus();
  });

    // 部活動カテゴリフォーム
  document.getElementById('club_btn').addEventListener('click', e=> {
    e.preventDefault();

    const title = document.club_form.title.value;

    fetch('?action=add', {
      method: 'POST',
      body: new URLSearchParams({
        category: 'club',
        title: title,
        token: token,
      }),
    })
    .then(response => response.json())
    .then(json => {
      addTodo(json.id, title);
    });

    input.value = '';
    input.focus();
    location.reload();
  });

  // 友達関係カテゴリフォーム
  document.getElementById('friend_btn').addEventListener('click', e=> {
    e.preventDefault();

    const title = document.friend_form.title.value;

    fetch('?action=add', {
      method: 'POST',
      body: new URLSearchParams({
        category: 'friend',
        title: title,
        token: token,
      }),
    })
    .then(response => response.json())
    .then(json => {
      addTodo(json.id, title);
    });

    input.value = '';
    input.focus();
    location.reload();
  });

  // 恋愛カテゴリフォーム
  document.getElementById('love_btn').addEventListener('click', e=> {
    e.preventDefault();

    const title = document.love_form.title.value;

    fetch('?action=add', {
      method: 'POST',
      body: new URLSearchParams({
        category: 'love',
        title: title,
        token: token,
      }),
    })
    .then(response => response.json())
    .then(json => {
      addTodo(json.id, title);
    });

    input.value = '';
    input.focus();
    location.reload();
  });

  // 進路カテゴリフォーム
  document.getElementById('course_btn').addEventListener('click', e=> {
    e.preventDefault();

    const title = document.course_form.title.value;

    fetch('?action=add', {
      method: 'POST',
      body: new URLSearchParams({
        category: 'course',
        title: title,
        token: token,
      }),
    })
    .then(response => response.json())
    .then(json => {
      addTodo(json.id, title);
    });

    input.value = '';
    input.focus();
    location.reload();
  });

  // 学校行事カテゴリフォーム
  document.getElementById('event_btn').addEventListener('click', e=> {
    e.preventDefault();

    const title = document.event_form.title.value;

    fetch('?action=add', {
      method: 'POST',
      body: new URLSearchParams({
        category: 'event',
        title: title,
        token: token,
      }),
    })
    .then(response => response.json())
    .then(json => {
      addTodo(json.id, title);
    });

    input.value = '';
    input.focus();
    location.reload();
  });



  const purge = document.querySelector('.purge');
  purge.addEventListener('click', () => {
    if (!confirm('本当によろしいですか?')) {
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

