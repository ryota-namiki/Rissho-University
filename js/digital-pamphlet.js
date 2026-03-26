/**
 * デジタルパンフレット：卒業生コメント表示・モーダル開閉（学生ボイス写真のホバーは CSS クロスフェード）
 */
(function () {
	'use strict';

	/* 卒業生：voice-text SVG を .ru-grad__row 下にトグル表示 */
	var voicePanel = document.getElementById('ru-grad-voice-text');
	var voiceImg = voicePanel ? voicePanel.querySelector('.ru-grad__voice-text-img') : null;
	var voiceButtons = document.querySelectorAll('[data-ru-grad-voice-text]');
	var voiceCloseCleanupTimer = null;

	function gradVoiceIsOpen() {
		return voicePanel && voicePanel.classList.contains('is-expanded');
	}

	function gradVoiceCloseDelayMs() {
		return window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 50 : 330;
	}

	function closeGradVoicePanel() {
		if (!voicePanel || !voiceImg) {
			return;
		}
		if (!voicePanel.classList.contains('is-expanded')) {
			return;
		}
		clearTimeout(voiceCloseCleanupTimer);
		voicePanel.classList.remove('is-expanded');
		voicePanel.setAttribute('aria-hidden', 'true');
		voiceButtons.forEach(function (b) {
			b.setAttribute('aria-expanded', 'false');
		});
		voiceCloseCleanupTimer = setTimeout(function () {
			voiceCloseCleanupTimer = null;
			if (!voicePanel.classList.contains('is-expanded')) {
				voiceImg.removeAttribute('src');
			}
		}, gradVoiceCloseDelayMs());
	}

	function openGradVoicePanel(url) {
		if (!voicePanel || !voiceImg || !url) {
			return;
		}
		clearTimeout(voiceCloseCleanupTimer);
		voiceCloseCleanupTimer = null;
		voiceImg.setAttribute('src', url);
		voicePanel.setAttribute('aria-hidden', 'false');
		requestAnimationFrame(function () {
			requestAnimationFrame(function () {
				voicePanel.classList.add('is-expanded');
			});
		});
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
			var sameOpen = gradVoiceIsOpen() && voiceImg && voiceImg.getAttribute('src') === url;
			if (sameOpen) {
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

