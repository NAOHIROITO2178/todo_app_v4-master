"use strict";

{
	const token = document.querySelector("main").dataset.token;
	const input = document.querySelector('[name="title"]');

	input.focus();

	// イベントリスナを複数要素にまとめて登録する(クラス名から取得)
	// toggle_checkboxクラスがついている要素を全て取得
	const toggle_checkboxes = document.getElementsByClassName("toggle_checkbox");
	for (let toggle_checkbox of toggle_checkboxes) {
		toggle_checkbox.addEventListener("click", (e) => {
			fetch("?action=toggle", {
				method: "POST",
				body: new URLSearchParams({
					id: e.target.parentNode.dataset.id,
					token: token,
				}),
			})
				.then((response) => {
					if (!response.ok) {
						throw new Error("This todo has been deleted!");
					}
					return response.json();
				})
				.then((json) => {
					if (json.is_done !== e.target.checked) {
						e.target.checked = json.is_done;
					}
				})
				.catch((err) => {
					alert(err.message);
					location.reload();
				});
			e.preventDefault(); //イベントのキャンセル
		});
	}

	// イベントリスナを複数要素にまとめて登録する(クラス名から取得)
	// deleteクラスがついている要素を全て取得
	const delete_buttons = document.getElementsByClassName("delete");
	for (let delete_button of delete_buttons) {
		delete_button.addEventListener("click", (e) => {
			if (!confirm("Are you sure?")) {
				return;
			}
			fetch("?action=delete", {
				method: "POST",
				body: new URLSearchParams({
					id: e.target.parentNode.dataset.id,
					token: token,
				}),
			});
			e.target.parentNode.remove();
			e.preventDefault(); //イベントのキャンセル
		});
	}

	// study用todo追加処理
	document.querySelector("form").addEventListener("submit", (e) => {
		e.preventDefault();

		const title = input.value;

		// チェックされているラジオボタンの値を取得
		let elements = document.getElementsByName("category");
		let len = elements.length;
		let checkValue = "";
		for (let i = 0; i < len; i++) {
			if (elements.item(i).checked) {
				checkValue = elements.item(i).value;
			}
		}
		fetch("?action=add", {
			method: "POST",
			body: new URLSearchParams({
				title: title,
				category: checkValue,
				token: token,
			}),
		}).then((response) => response.json());
		input.value = "";
		input.focus();
		location.reload();
	});

	// purgeクラスがついている要素を全て取得
	const purges = document.getElementsByClassName("purge");
	for (let purge of purges) {
		purge.addEventListener("click", (e) => {
		console.log("purgeOK");
		console.log(e.target.parentNode.dataset.id);
			if (!confirm("Are you sure?")) {
				return;
			}
			fetch("?action=purge", {
				method: "POST",
				body: new URLSearchParams({
					category: e.target.parentNode.dataset.id,
					token: token,
				}),
			});
			e.preventDefault(); //イベントのキャンセル
			location.reload();
		});
	}
}
