/**
 * デジタルパンフレット：卒業生コメント表示・モーダル開閉（学生ボイス写真のホバーは CSS クロスフェード）
 */
(function () {
	'use strict';

	/* 卒業生：voice-text SVG を .ru-grad__row 下にトグル表示 */
	var voicePanel = document.getElementById('ru-grad-voice-text');
	var voiceImg = voicePanel ? voicePanel.querySelector('.ru-grad__voice-text-img') : null;
	var voiceButtons = document.querySelectorAll('[data-ru-grad-voice-text]');
	var voiceCloseBtn = voicePanel ? voicePanel.querySelector('.ru-grad__voice-text-close') : null;
	var voiceCloseCleanupTimer = null;
	var gradVoiceSpMql =
		typeof window.matchMedia === 'function'
			? window.matchMedia('(max-width: 768px)')
			: null;

	function gradVoiceIsSpViewport() {
		if (gradVoiceSpMql && gradVoiceSpMql.matches) {
			return true;
		}
		var w =
			typeof document !== 'undefined' && document.documentElement
				? document.documentElement.clientWidth
				: typeof window.innerWidth === 'number'
					? window.innerWidth
					: 9999;
		return w <= 768;
	}

	function gradVoiceSpDataUrl(btn) {
		var sp =
			btn.getAttribute('data-ru-grad-voice-text-sp') ||
			(btn.dataset && btn.dataset.ruGradVoiceTextSp);
		return sp || '';
	}

	function gradVoiceDisplayUrl(btn) {
		var desk = btn.getAttribute('data-ru-grad-voice-text');
		var sp = gradVoiceSpDataUrl(btn);
		if (gradVoiceIsSpViewport() && sp) {
			return sp;
		}
		return desk;
	}

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

	function openGradVoicePanel(canonicalUrl, displayUrl) {
		if (!voicePanel || !voiceImg || !canonicalUrl || !displayUrl) {
			return;
		}
		clearTimeout(voiceCloseCleanupTimer);
		voiceCloseCleanupTimer = null;
		voiceImg.setAttribute('src', displayUrl);
		voicePanel.setAttribute('aria-hidden', 'false');
		requestAnimationFrame(function () {
			requestAnimationFrame(function () {
				voicePanel.classList.add('is-expanded');
			});
		});
		voiceButtons.forEach(function (b) {
			if (b.getAttribute('data-ru-grad-voice-text') === canonicalUrl) {
				b.setAttribute('aria-expanded', 'true');
			} else {
				b.setAttribute('aria-expanded', 'false');
			}
		});
	}

	voiceButtons.forEach(function (btn) {
		btn.addEventListener('click', function (e) {
			e.preventDefault();
			var canonical = btn.getAttribute('data-ru-grad-voice-text');
			if (!canonical) {
				return;
			}
			var display = gradVoiceDisplayUrl(btn);
			var sameOpen =
				gradVoiceIsOpen() && voiceImg && voiceImg.getAttribute('src') === display;
			if (sameOpen) {
				closeGradVoicePanel();
			} else {
				openGradVoicePanel(canonical, display);
			}
		});
	});

	if (voiceCloseBtn) {
		voiceCloseBtn.addEventListener('click', function (e) {
			e.preventDefault();
			e.stopPropagation();
			closeGradVoicePanel();
		});
	}

	function onGradVoiceSpBreakpointChange() {
		if (!voicePanel || !voiceImg || !gradVoiceIsOpen() || !voiceImg.getAttribute('src')) {
			return;
		}
		var openBtn = null;
		voiceButtons.forEach(function (b) {
			if (b.getAttribute('aria-expanded') === 'true') {
				openBtn = b;
			}
		});
		if (openBtn) {
			voiceImg.setAttribute('src', gradVoiceDisplayUrl(openBtn));
		}
	}

	if (voicePanel && voiceImg && gradVoiceSpMql) {
		if (typeof gradVoiceSpMql.addEventListener === 'function') {
			gradVoiceSpMql.addEventListener('change', onGradVoiceSpBreakpointChange);
		} else if (typeof gradVoiceSpMql.addListener === 'function') {
			gradVoiceSpMql.addListener(onGradVoiceSpBreakpointChange);
		}
	}

	var ytOverlay = document.getElementById('ru-youtube-modal');
	var ytIframe = ytOverlay ? ytOverlay.querySelector('.ru-youtube-modal__embed iframe') : null;
	var ytCloseBtn = ytOverlay ? ytOverlay.querySelector('.ru-modal__close') : null;

	function extractYoutubeVideoIdFromString(s) {
		if (!s) {
			return '';
		}
		var str = String(s).trim();
		var m = str.match(/youtu\.be\/([a-zA-Z0-9_-]{11})/);
		if (m) {
			return m[1];
		}
		m = str.match(/[?&]v=([a-zA-Z0-9_-]{11})/);
		if (m) {
			return m[1];
		}
		m = str.match(/\/embed\/([a-zA-Z0-9_-]{11})/);
		if (m) {
			return m[1];
		}
		m = str.match(/\/shorts\/([a-zA-Z0-9_-]{11})/);
		return m ? m[1] : '';
	}

	function normalizeYoutubeVideoId(input) {
		if (!input) {
			return '';
		}
		var s = String(input).trim();
		if (/^[a-zA-Z0-9_-]{11}$/.test(s)) {
			return s;
		}
		return extractYoutubeVideoIdFromString(s);
	}

	function sanitizeYoutubeModalBg(raw) {
		if (!raw || typeof raw !== 'string') {
			return '';
		}
		var t = raw.trim();
		if (/^#[0-9A-Fa-f]{6}$/.test(t)) {
			return t;
		}
		if (/^[0-9A-Fa-f]{6}$/.test(t)) {
			return '#' + t;
		}
		return '';
	}

	function openYoutubeModal(videoIdOrUrl, openerEl) {
		if (!ytOverlay || !ytIframe) {
			return;
		}
		var id = normalizeYoutubeVideoId(videoIdOrUrl);
		if (!id) {
			return;
		}
		var bgAttr = openerEl && openerEl.getAttribute('data-youtube-modal-bg');
		var bg = sanitizeYoutubeModalBg(bgAttr || '');
		if (bg) {
			ytOverlay.style.setProperty('--ru-youtube-modal-panel-bg', bg);
		} else {
			ytOverlay.style.removeProperty('--ru-youtube-modal-panel-bg');
		}
		ytIframe.setAttribute(
			'src',
			'https://www.youtube.com/embed/' + encodeURIComponent(id) + '?autoplay=1&rel=0'
		);
		ytOverlay.classList.add('is-open');
		ytOverlay.setAttribute('aria-hidden', 'false');
		document.body.classList.add('ru-modal-open');
		if (ytCloseBtn) {
			ytCloseBtn.focus();
		}
	}

	function closeYoutubeModal() {
		if (!ytOverlay || !ytIframe) {
			return;
		}
		ytOverlay.classList.remove('is-open');
		ytOverlay.setAttribute('aria-hidden', 'true');
		document.body.classList.remove('ru-modal-open');
		ytOverlay.style.removeProperty('--ru-youtube-modal-panel-bg');
		ytIframe.removeAttribute('src');
	}

	/* 未同期テーマで <a target="_blank"> のままでも、ここで横取りしてモーダル表示する */
	document.addEventListener('click', function (e) {
		if (!ytOverlay || !ytIframe) {
			return;
		}
		var byId = e.target.closest && e.target.closest('.ru-sv-card[data-youtube-id]');
		if (byId) {
			e.preventDefault();
			openYoutubeModal(byId.getAttribute('data-youtube-id'), byId);
			return;
		}
		var link = e.target.closest && e.target.closest('a.ru-sv-card');
		if (!link) {
			return;
		}
		var href = link.getAttribute('href') || '';
		if (!/youtu\.be|youtube\.com/i.test(href)) {
			return;
		}
		e.preventDefault();
		openYoutubeModal(href, link);
	});

	if (ytCloseBtn) {
		ytCloseBtn.addEventListener('click', closeYoutubeModal);
	}

	if (ytOverlay) {
		ytOverlay.addEventListener('click', function (e) {
			if (e.target === ytOverlay) {
				closeYoutubeModal();
			}
		});
	}

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
		if (fmenuIsOpen()) {
			closeFmenu();
			return;
		}
		if (gradVoiceIsOpen()) {
			closeGradVoicePanel();
			return;
		}
		if (ytOverlay && ytOverlay.classList.contains('is-open')) {
			closeYoutubeModal();
			return;
		}
		if (overlay && overlay.classList.contains('is-open')) {
			closeModal();
		}
	});

	/* SP メニュー（Figma 2828:2661） */
	var fmenuToggle = document.querySelector('.ru-hero__menu-btn');
	var fmenuRoot = document.getElementById('ru-fmenu');
	var fmenuPanel = fmenuRoot ? fmenuRoot.querySelector('.ru-fmenu__panel') : null;
	var fmenuFirstLink = fmenuPanel ? fmenuPanel.querySelector('a.ru-fmenu__item') : null;
	var fmenuLastFocus = null;

	function fmenuIsOpen() {
		return fmenuRoot && fmenuRoot.classList.contains('is-open');
	}

	function openFmenu() {
		if (!fmenuRoot || !fmenuToggle) {
			return;
		}
		fmenuLastFocus = document.activeElement;
		fmenuRoot.classList.add('is-open');
		fmenuRoot.setAttribute('aria-hidden', 'false');
		fmenuToggle.setAttribute('aria-expanded', 'true');
		document.body.classList.add('ru-fmenu-open');
		if (fmenuFirstLink && typeof fmenuFirstLink.focus === 'function') {
			fmenuFirstLink.focus();
		}
	}

	function closeFmenu() {
		if (!fmenuRoot || !fmenuToggle) {
			return;
		}
		fmenuRoot.classList.remove('is-open');
		fmenuRoot.setAttribute('aria-hidden', 'true');
		fmenuToggle.setAttribute('aria-expanded', 'false');
		document.body.classList.remove('ru-fmenu-open');
		if (fmenuLastFocus && typeof fmenuLastFocus.focus === 'function') {
			fmenuLastFocus.focus();
		}
		fmenuLastFocus = null;
	}

	if (fmenuToggle && fmenuRoot) {
		fmenuToggle.addEventListener('click', function () {
			if (fmenuIsOpen()) {
				closeFmenu();
			} else {
				openFmenu();
			}
		});
	}

	if (fmenuPanel) {
		fmenuPanel.addEventListener('click', function (e) {
			var a = e.target && e.target.closest ? e.target.closest('a') : null;
			if (a) {
				closeFmenu();
			}
		});
	}
})();

