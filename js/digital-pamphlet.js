/**
 * デジタルパンフレット：学生ボイス写真のホバー差し替え・卒業生コメント表示・モーダル開閉
 */
(function () {
	'use strict';

	/* .ru-sv-card__photo の src を data-src-hover / data-src-rest で切り替え */
	document.querySelectorAll('.ru-sv-card__photo[data-src-hover][data-src-rest]').forEach(function (img) {
		var rest = img.getAttribute('data-src-rest');
		var hover = img.getAttribute('data-src-hover');
		if (!rest || !hover) {
			return;
		}
		var card = img.closest('.ru-sv-card');
		if (!card) {
			return;
		}

		function showHover() {
			img.setAttribute('src', hover);
		}

		function showRest() {
			img.setAttribute('src', rest);
		}

		card.addEventListener('mouseenter', showHover);
		card.addEventListener('mouseleave', showRest);
		card.addEventListener('focusin', showHover);
		card.addEventListener('focusout', function (e) {
			if (!card.contains(e.relatedTarget)) {
				showRest();
			}
		});
	});

	/* 卒業生：voice-text SVG を .ru-grad__row 下にトグル表示 */
	var voicePanel = document.getElementById('ru-grad-voice-text');
	var voiceImg = voicePanel ? voicePanel.querySelector('.ru-grad__voice-text-img') : null;
	var voiceButtons = document.querySelectorAll('[data-ru-grad-voice-text]');

	function gradVoiceIsOpen() {
		return voicePanel && !voicePanel.hasAttribute('hidden');
	}

	function closeGradVoicePanel() {
		if (!voicePanel || !voiceImg) {
			return;
		}
		voicePanel.setAttribute('hidden', '');
		voiceImg.removeAttribute('src');
		voiceButtons.forEach(function (b) {
			b.setAttribute('aria-expanded', 'false');
		});
	}

	function openGradVoicePanel(url) {
		if (!voicePanel || !voiceImg || !url) {
			return;
		}
		voiceImg.setAttribute('src', url);
		voicePanel.removeAttribute('hidden');
		voiceButtons.forEach(function (b) {
			if (b.getAttribute('data-ru-grad-voice-text') === url) {
				b.setAttribute('aria-expanded', 'true');
			} else {
				b.setAttribute('aria-expanded', 'false');
			}
		});
	}

	voiceButtons.forEach(function (btn) {
		btn.addEventListener('click', function (e) {
			e.preventDefault();
			var url = btn.getAttribute('data-ru-grad-voice-text');
			if (!url) {
				return;
			}
			var same = gradVoiceIsOpen() && voiceImg && voiceImg.getAttribute('src') === url;
			if (same) {
				closeGradVoicePanel();
			} else {
				openGradVoicePanel(url);
			}
		});
	});

	var overlay = document.getElementById('ru-interview-modal');
	/* voice-text パネル用ボタンと属性が重なってもモーダルを開かない */
	var openers = overlay
		? document.querySelectorAll('[data-open-interview-modal]:not([data-ru-grad-voice-text])')
		: [];
	var closeBtn = overlay ? overlay.querySelector('.ru-modal__close') : null;

	function openModal() {
		if (!overlay) {
			return;
		}
		overlay.classList.add('is-open');
		overlay.setAttribute('aria-hidden', 'false');
		document.body.classList.add('ru-modal-open');
		if (closeBtn) {
			closeBtn.focus();
		}
	}

	function closeModal() {
		if (!overlay) {
			return;
		}
		overlay.classList.remove('is-open');
		overlay.setAttribute('aria-hidden', 'true');
		document.body.classList.remove('ru-modal-open');
	}

	openers.forEach(function (el) {
		el.addEventListener('click', function (e) {
			e.preventDefault();
			openModal();
		});
	});

	if (closeBtn) {
		closeBtn.addEventListener('click', closeModal);
	}

	if (overlay) {
		overlay.addEventListener('click', function (e) {
			if (e.target === overlay) {
				closeModal();
			}
		});
	}

	document.addEventListener('keydown', function (e) {
		if (e.key !== 'Escape') {
			return;
		}
		if (gradVoiceIsOpen()) {
			closeGradVoicePanel();
			return;
		}
		if (overlay && overlay.classList.contains('is-open')) {
			closeModal();
		}
	});
})();

